<?php

session_start();

if($_SESSION["rol"] != "admin"){

echo "Acceso restringido";
exit();

}

$id = $_GET["id"];

$archivo = "riesgos.json";

$riesgos = json_decode(file_get_contents($archivo), true);

unset($riesgos[$id]);

$riesgos = array_values($riesgos);

file_put_contents($archivo, json_encode($riesgos, JSON_PRETTY_PRINT));

header("Location: listar_riesgos.php");

?>
