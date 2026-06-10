<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<style>
body {
    height: 100vh;
    background: linear-gradient(135deg, #667eea, #764ba2);
    display: flex;
    align-items: center;
    justify-content: center;
}

.login-card {
    width: 100%;
    max-width: 400px;
    border-radius: 15px;
}

.input-group-text {
    background-color: #764ba2;
    color: white;
}
</style>
</head>

<body>

<div class="card login-card shadow p-4">

    <h3 class="text-center mb-3">🔐 Iniciar Sesión</h3>
    <p class="text-center text-muted">Sistema de Gestión de Aprendices</p>

    <form action="validar.php" method="POST">

        <div class="mb-3">
            <label>Usuario</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-person"></i></span>
                <input type="text" name="usuario" class="form-control" required>
            </div>
        </div>

        <div class="mb-3">
            <label>Contraseña</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                <input type="password" name="password" class="form-control" required>
            </div>
        </div>

        <button class="btn btn-primary w-100">Ingresar</button>

    </form>

    <hr>

    <div class="text-center">
        <small class="text-muted">© Sistema SENA</small>
    </div>

</div>

</body>
</html>