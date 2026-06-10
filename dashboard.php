<?php 
include("config/auth.php");
include("config/conexion.php");

/* CONTADOR DE APRENDICES */
$total_aprendices = 0;
$sql = "SELECT COUNT(*) as total FROM aprendices";
$res = $conn->query($sql);
if($res){
    $row = $res->fetch_assoc();
    $total_aprendices = $row['total'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<style>
body {
    background: #eef1f5;
}

.navbar {
    box-shadow: 0 2px 10px rgba(0,0,0,0.2);
}

.card {
    border-radius: 15px;
    transition: 0.3s;
}

.card:hover {
    transform: translateY(-5px);
}

.icon {
    font-size: 40px;
}

.stat-box {
    background: white;
    border-radius: 15px;
    padding: 20px;
    text-align: center;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}
</style>

</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark px-4">
    <span class="navbar-brand fw-bold">📘 Sistema de Aprendices</span>

    <div class="text-white">
        <i class="bi bi-person-circle"></i>
        <?php echo $_SESSION['usuario']; ?> 
        (<?php echo $_SESSION['rol']; ?>)

        <a href="logout.php" class="btn btn-danger btn-sm ms-3">Salir</a>
    </div>
</nav>

<div class="container mt-4">

    <h3 class="mb-4 fw-bold">Panel de Control</h3>

    <!-- 📊 ESTADÍSTICAS (solo admin) -->
    <?php if($_SESSION['rol'] == 'admin'): ?>
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="stat-box">
                <h2><?php echo $total_aprendices; ?></h2>
                <p>Total Aprendices</p>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- 🧩 OPCIONES -->
    <div class="row g-4">

        <!-- ADMIN -->
        <?php if($_SESSION['rol'] == 'admin'): ?>
        <div class="col-md-4">
            <div class="card shadow text-center p-4">
                <div class="icon text-success"><i class="bi bi-person-plus-fill"></i></div>
                <h5 class="mt-3">Registrar Aprendiz</h5>
                <a href="aprendices/crear.php" class="btn btn-success mt-2">Entrar</a>
            </div>
        </div>
        <?php endif; ?>

        <!-- TODOS -->
        <div class="col-md-4">
            <div class="card shadow text-center p-4">
                <div class="icon text-primary"><i class="bi bi-people-fill"></i></div>
                <h5 class="mt-3">Ver Aprendices</h5>
                <a href="aprendices/listar.php" class="btn btn-primary mt-2">Entrar</a>
            </div>
        </div>

        <!-- INSTRUCTOR -->
        <?php if($_SESSION['rol'] == 'instructor'): ?>
        <div class="col-md-4">
            <div class="card shadow text-center p-4">
                <div class="icon text-warning"><i class="bi bi-journal-text"></i></div>
                <h5 class="mt-3">Gestionar Observaciones</h5>
                <a href="reportes/observaciones.php" class="btn btn-warning mt-2">Entrar</a>
            </div>
        </div>
        <?php endif; ?>

        <!-- APRENDIZ -->
        <?php if($_SESSION['rol'] == 'aprendiz'): ?>

        <div class="col-md-4">
            <div class="card shadow text-center p-4">
                <div class="icon text-secondary"><i class="bi bi-person-lines-fill"></i></div>
                <h5 class="mt-3">Mis Datos</h5>
                <a href="aprendices/mis_datos.php" class="btn btn-secondary mt-2">Ver</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow text-center p-4">
                <div class="icon text-info"><i class="bi bi-journal-check"></i></div>
                <h5 class="mt-3">Mis Observaciones</h5>
                <a href="reportes/mis_observaciones.php" class="btn btn-info mt-2">Ver</a>
            </div>
        </div>

        <?php endif; ?>

    </div>

    <!-- MENSAJE -->
    <div class="mt-5">
        <div class="alert alert-light shadow-sm">
            Bienvenido al sistema. Usa las opciones disponibles según tu rol.
        </div>
    </div>

</div>

<div class="col-md-4">

<div class="card shadow text-center">

<div class="card-body">

<h3>Riesgos</h3>

<a href="riesgos/listar_riesgos.php" class="btn btn-dark">

Ver Riesgos

</a>

</div>

</div>

</div>

</body>
</html>