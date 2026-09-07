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
    <link href="https://googleapis.com" rel="stylesheet">
    <link rel="stylesheet" href="CSS/Style.css">
</head>

<body>

<header class="menu-header">

<nav class="navbar">

<div class="logo">HORAS QUE IMPORTAN</div>

<ul class="menu-links">
    <li><a href="index.php" class="active">Inicio</a></li>
    <li><a href="HTML/Producto.php">Productos</a></li>
    <li><a href="HTML/Mistemas.php">Mis Temas</a></li>
    <li><a href="HTML/Asistente.php">Chat IA</a></li>
</ul>

<div class="user-menu-container">

<a href="<?php echo $destinoPerfil; ?>" class="user-avatar">

<svg xmlns="http://www.w3.org/2000/svg"
viewBox="0 0 24 24"
width="24"
height="24"
fill="currentColor">

<path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>

</svg>

</a>

</div>

</nav>

</header>

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

</div>

</main>

</body>
</html>
