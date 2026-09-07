<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Memot - Iniciar Sesión</title>
    <link rel="stylesheet" href="../CSS/Login.css?v=4.0">
    <link rel="stylesheet" href="../CSS/Navegacion.css?v=3.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<?php $paginaActiva = ''; $rutaBase = '../'; require __DIR__ . '/../includes/header.php'; ?>

<div class="login-container">
    <h2>Iniciar Sesión en Memot</h2>

    <form action="../PHP/login.php" method="POST">

        <div class="form-group">
            <label>Correo Electrónico:</label>
            <input
                type="email"
                name="email"
                required
                placeholder="ejemplo@memot.com">
        </div>

        <div class="form-group">
            <label>Contraseña:</label>
            <input
                type="password"
                name="password"
                required
                placeholder="Tu contraseña">
        </div>

        <button type="submit" class="btn-submit">
            Ingresar
        </button>

    </form>

    <br>

    <p>
        ¿No tenés una cuenta?
        <a href="Registro.php">Crear cuenta</a>
    </p>

</div>

<script src="../JS/menu.js"></script>
</body>
</html>
