<?php 
include("../config/auth.php");
include("../config/funciones.php");

$aprendices = obtenerAprendices();
?>

<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
<h3>Lista de Aprendices</h3>

<table class="table table-bordered">
<tr>
    <th>Nombre</th>
    <th>Documento</th>
    <th>Ficha</th>
    <th>Programa</th>
</tr>

<?php while($row = $aprendices->fetch_assoc()): ?>
<tr>
    <td><?= $row['nombre'] ?></td>
    <td><?= $row['documento'] ?></td>
    <td><?= $row['ficha'] ?></td>
    <td><?= $row['programa'] ?></td>
</tr>
<?php endwhile; ?>

</table>
</div>

</body>
</html>