<?php 
include("../config/auth.php");
include("../config/funciones.php");

if ($_POST) {
    crearAprendiz($_POST['nombre'], $_POST['documento'], $_POST['ficha'], $_POST['programa']);
}
?>

<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
<h3>Registrar Aprendiz</h3>

<form method="POST">
    <input name="nombre" class
    ="form-control mb-2" placeholder="Nombre" required>
    <input name="documento" class="form-control mb-2" placeholder="Documento" required>
    <input name="ficha" class="form-control mb-2" placeholder="Ficha" required>
    <input name="programa" class="form-control mb-2" placeholder="Programa" required>
    <button class="btn btn-primary">Guardar.</button>
</form>

</div>
</body>
</html>