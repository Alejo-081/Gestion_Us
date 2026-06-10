<?php 
include("../config/auth.php");
include("../config/conexion.php");

$id = $_SESSION['aprendiz_id'] ?? 0;

$sql = "SELECT * FROM aprendices WHERE id='$id'";
$res = $conn->query($sql);
$data = $res->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
<h3>Mis Datos</h3>

<?php if($data): ?>
<table class="table table-bordered">
<tr><th>Nombre</th><td><?= $data['nombre'] ?></td></tr>
<tr><th>Documento</th><td><?= $data['documento'] ?></td></tr>
<tr><th>Ficha</th><td><?= $data['ficha'] ?></td></tr>
<tr><th>Programa</th><td><?= $data['programa'] ?></td></tr>
</table>
<?php else: ?>
<div class="alert alert-warning">No tienes datos asociados.</div>
<?php endif; ?>

</div>

</body>
</html>