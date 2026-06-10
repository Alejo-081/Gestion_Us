<?php

session_start();

if($_SESSION["rol"] != "admin"){

echo "Acceso restringido";
exit();

}

if($_SERVER["REQUEST_METHOD"] == "POST"){

$nuevo = [

"activo" => $_POST["activo"],
"amenaza" => $_POST["amenaza"],
"vulnerabilidad" => $_POST["vulnerabilidad"],
"riesgo" => $_POST["riesgo"],
"probabilidad" => $_POST["probabilidad"],
"impacto" => $_POST["impacto"],
"tratamiento" => $_POST["tratamiento"]

];

$archivo = "riesgos.json";

$datos = json_decode(file_get_contents($archivo), true);

$datos[] = $nuevo;

file_put_contents($archivo, json_encode($datos, JSON_PRETTY_PRINT));

header("Location: listar_riesgos.php");

}

?>

<!DOCTYPE html>
<html>

<head>

<title>Registrar Riesgo</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="container mt-5">

<h2>Registrar Riesgo</h2>

<form method="POST">

<input type="text" name="activo" class="form-control mb-3" placeholder="Activo afectado">

<input type="text" name="amenaza" class="form-control mb-3" placeholder="Amenaza">

<input type="text" name="vulnerabilidad" class="form-control mb-3" placeholder="Vulnerabilidad">

<input type="text" name="riesgo" class="form-control mb-3" placeholder="Riesgo identificado">

<select name="probabilidad" class="form-control mb-3">

<option>Alta</option>
<option>Media</option>
<option>Baja</option>

</select>

<select name="impacto" class="form-control mb-3">

<option>Alto</option>
<option>Medio</option>
<option>Bajo</option>

</select>

<textarea name="tratamiento" class="form-control mb-3" placeholder="Tratamiento"></textarea>

<button class="btn btn-success">Guardar</button>

<a href="listar_riesgos.php" class="btn btn-secondary">Volver</a>

</form>

</body>

</html>