<?php 
include("../config/auth.php");
include("../config/funciones.php");
include("../config/conexion.php");

if ($_SESSION['rol'] != 'instructor' && $_SESSION['rol'] != 'admin') {
    header("Location: ../dashboard.php");
    exit();
}

/* CREAR */
if (isset($_POST['crear'])) {
    crearObservacion($_POST['aprendiz_id'], $_POST['comentario']);
}

/* EDITAR */
if (isset($_POST['editar'])) {
    $id = $_POST['id'];
    $comentario = $_POST['comentario'];

    $conn->query("UPDATE observaciones SET comentario='$comentario' WHERE id=$id");
}

/* TRAER OBSERVACIONES */
$obs = $conn->query("SELECT o.id, o.comentario, o.fecha, a.nombre 
                     FROM observaciones o 
                     JOIN aprendices a ON o.aprendiz_id = a.id");
?>

<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
<h3>Observaciones</h3>

<!-- CREAR -->
<form method="POST" class="mb-4">
    <input name="aprendiz_id" class="form-control mb-2" placeholder="ID Aprendiz" required>
    <textarea name="comentario" class="form-control mb-2" placeholder="Comentario"></textarea>
    <button name="crear" class="btn btn-primary">Guardar</button>
</form>

<hr>

<table class="table table-bordered">
<tr>
    <th>Aprendiz</th>
    <th>Comentario</th>
    <th>Fecha</th>
    <th>Acciones</th>
</tr>

<?php while($row = $obs->fetch_assoc()): ?>
<tr>
    <td><?= $row['nombre'] ?></td>
    <td><?= $row['comentario'] ?></td>
    <td><?= $row['fecha'] ?></td>
    <td>

        <!-- BOTÓN EDITAR -->
        <button class="btn btn-warning btn-sm" 
                data-bs-toggle="collapse" 
                data-bs-target="#edit<?= $row['id'] ?>">
            Editar
        </button>

        <div id="edit<?= $row['id'] ?>" class="collapse mt-2">
            <form method="POST">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <textarea name="comentario" class="form-control mb-2"><?= $row['comentario'] ?></textarea>
                <button name="editar" class="btn btn-success btn-sm">Actualizar</button>
            </form>
        </div>

    </td>
</tr>
<?php endwhile; ?>

</table>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>