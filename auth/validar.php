<?php

// 🔐 Verifica si ya existe una sesión activa
// Si no existe, la inicia
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 📦 Incluye la conexión a la base de datos
include("../config/conexion.php");

// 📥 Captura los datos enviados por el formulario
// Si no vienen, asigna cadena vacía
$usuario = $_POST['usuario'] ?? '';
$password = md5($_POST['password'] ?? ''); 
// 🔒 Convierte la contraseña en MD5 para compararla con la BD

// 🔍 Consulta SQL para buscar el usuario con ese usuario y contraseña
$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND password='$password'";
$res = $conn->query($sql);

// ✅ Si la consulta devuelve resultados (usuario existe)
if ($res && $res->num_rows > 0) {

    // 📄 Convierte el resultado en un array asociativo
    $user = $res->fetch_assoc();

    // 🔐 Guarda datos del usuario en la sesión
    $_SESSION['usuario'] = $user['usuario'];         // nombre de usuario
    $_SESSION['rol'] = $user['rol'];                 // rol (admin, instructor, aprendiz)
    $_SESSION['aprendiz_id'] = $user['aprendiz_id'] ?? null; // id del aprendiz (si existe)

    // 🚨 VALIDACIÓN DE SEGURIDAD DE ROLES
    // Si el rol no es válido, cierra sesión y bloquea acceso
    if (!in_array($_SESSION['rol'], ['admin', 'instructor', 'aprendiz'])) {
        session_destroy(); // destruye la sesión
        header("Location: login.php?error=rol_invalido"); // redirige con error
        exit();
    }

    // 🚀 Si todo está bien, envía al dashboard
    header("Location: ../dashboard.php");
    exit();

} else {

    // ❌ Si no encuentra usuario o contraseña incorrecta
    header("Location: login.php?error=1");
    exit();
}