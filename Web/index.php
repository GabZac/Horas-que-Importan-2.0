<?php
session_start();

$destinoPerfil = "HTML/Login.php";

if (isset($_SESSION["id_usuario"])) {
    $destinoPerfil = "HTML/Perfil.php";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horas Que Importan - Inicio</title>
    <link rel="stylesheet" href="CSS/Style.css?v=4.0">
    <link rel="stylesheet" href="CSS/Navegacion.css?v=2.0">
</head>

<body>

<?php $paginaActiva = 'inicio'; $rutaBase = ''; require __DIR__ . '/includes/header.php'; ?>

<main class="main-container">
    <div class="glass-card">
        <h1>Nuestro Proyecto</h1>
        <p class="subtitulo">Una aventura para mejorar tus horas de descanso</p>

        <div style="line-height:1.8;font-size:1.15rem;">
            <p style="margin-bottom:25px;">
                <strong>¿Quiénes somos?</strong><br>
                Somos alumnos de 5to año y estamos desarrollando un proyecto enfocado en la tecnología y el bienestar. Creamos soluciones pensadas para transformar las noches de las personas, ayudándolas a lograr un sueño reparador mediante la innovación.
            </p>

            <p>
                <strong>La idea del colegio este año:</strong><br>
                En el marco de las propuestas tecnológicas de la institución, se nos planteó el desafío de diseñar un producto comercializable y real. Así nació Memot, integrando hardware, desarrollo web e inteligencia artificial.
            </p>
        </div>

        <!-- Botón del Cuestionario agregado al final de la tarjeta -->
        <div class="cuestionario-container">
            <a href="HTML/cuestionario.php" class="btn-cuestionario">
                Realizar Encuesta de Sueño
            </a>
        </div>

    </div>
</main>

    <script src="JS/menu.js"></script>
    
</body>
</html>
