<?php 
include("../config/auth.php");
include("../config/conexion.php");

// 🔥 SIN FILTRO → todos ven todas las observaciones
$sql = "SELECT * FROM observaciones ORDER BY fecha DESC";
$res = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
<h3>Todas las Observaciones</h3>

<?php if($res && $res->num_rows > 0): ?>
<table class="table table-striped">
<tr>
    <th>Comentario</th>
    <th>Fecha</th>
</tr>

<?php while($row = $res->fetch_assoc()): ?>
<tr>
    <td><?= $row['comentario'] ?></td>
    <td><?= $row['fecha'] ?></td>
</tr>
<?php endwhile; ?>

</table>
<?php else: ?>
<div class="alert alert-warning">No hay observaciones registradas.</div>
<?php endif; ?>

</div>

</body>
</html>