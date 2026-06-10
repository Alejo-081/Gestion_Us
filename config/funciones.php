<?php
include("conexion.php");

// LOGIN
function login($usuario, $password) {
    global $conn;

    $password = md5($password);
    $sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND password='$password'";
    $res = $conn->query($sql);

    return ($res->num_rows > 0) ? $res->fetch_assoc() : false;
}

// CREAR APRENDIZ
function crearAprendiz($nombre, $documento, $ficha, $programa) {
    global $conn;

    $sql = "INSERT INTO aprendices(nombre, documento, ficha, programa)
            VALUES('$nombre','$documento','$ficha','$programa')";
    return $conn->query($sql);
}

// LISTAR APRENDICES
function obtenerAprendices() {
    global $conn;
    return $conn->query("SELECT * FROM aprendices");
}

// CREAR OBSERVACIÓN
function crearObservacion($aprendiz_id, $comentario) {
    global $conn;

    $sql = "INSERT INTO observaciones(aprendiz_id, comentario)
            VALUES('$aprendiz_id','$comentario')";
    return $conn->query($sql);
}

// LISTAR OBSERVACIONES
function obtenerObservaciones() {
    global $conn;

    $sql = "SELECT o.*, a.nombre 
            FROM observaciones o
            JOIN aprendices a ON o.aprendiz_id = a.id";

    return $conn->query($sql);
}
?>