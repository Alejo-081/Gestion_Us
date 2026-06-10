<?php

session_start();

if(!isset($_SESSION["usuario"])){

header("Location: ../login.php");
exit();

}

$archivo = "riesgos.json";

$riesgos = json_decode(file_get_contents($archivo), true);

?>

<!DOCTYPE html>
<html>

<head>

<title>Lista Riesgos</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<!-- HEADER -->

<div class="card-header d-flex justify-content-between align-items-center">

<h4 class="mb-0">Matriz de Riesgos</h4>

<div>

<!-- BOTON VOLVER -->

<a href="../dashboard.php" class="btn btn-dark">

Volver al Panel

</a>

<!-- SOLO ADMIN VE REGISTRAR -->

<?php if($_SESSION["rol"]=="admin"){ ?>

<a href="registrar_riesgo.php" class="btn btn-primary">

Registrar Riesgo

</a>

<?php } ?>

</div>

</div>

<!-- BODY -->

<div class="card-body">

<table class="table table-bordered table-hover text-center">

<thead class="table-dark">

<tr>

<th>Activo</th>
<th>Amenaza</th>
<th>Vulnerabilidad</th>
<th>Riesgo</th>
<th>Probabilidad</th>
<th>Impacto</th>
<th>Tratamiento</th>

<?php if($_SESSION["rol"]=="admin"){ ?>

<th>Acciones</th>

<?php } ?>

</tr>

</thead>

<tbody>

<?php foreach($riesgos as $i => $r){ ?>

<tr>

<td><?php echo $r["activo"]; ?></td>

<td><?php echo $r["amenaza"]; ?></td>

<td><?php echo $r["vulnerabilidad"]; ?></td>

<td><?php echo $r["riesgo"]; ?></td>

<td><?php echo $r["probabilidad"]; ?></td>

<td><?php echo $r["impacto"]; ?></td>

<td><?php echo $r["tratamiento"]; ?></td>

<?php if($_SESSION["rol"]=="admin"){ ?>

<td>

<a href="eliminar_riesgo.php?id=<?php echo $i; ?>" class="btn btn-danger btn-sm">

Eliminar

</a>

</td>

<?php } ?>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</div>

</body>

</html>