<?php
$conn = new mysqli("localhost", "root", "", "gestion_aprendices");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>