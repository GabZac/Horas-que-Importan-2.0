<?php
session_start();

if (!isset($_SESSION["id_usuario"])) {
    $destinoPerfil = "Login.php";
} else {
    $destinoPerfil = "Perfil.php";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horas Que Importan - Productos</title>

    <link rel="stylesheet" href="../CSS/Style.css?v=15.0">
    <link rel="stylesheet" href="../CSS/Mistemas.css?v=15.0">
    <link rel="stylesheet" href="../CSS/Navegacion.css?v=2.0">
</head>
<body>

<?php $paginaActiva = 'productos'; $rutaBase = '../'; require __DIR__ . '/../includes/header.php'; ?>

<main class="main-container">

<div class="glass-card">

<h1 class="titulo-principal" style="text-align:left;">
Memot
</h1>

<p class="subtitulo" style="text-align:left; margin-bottom:25px;">
Tu compañero tecnológico para un sueño perfecto
</p>

<div class="contenedor-foto">

<img
src="../IMAGENES/Producto-prototipo.png"
style="width:250px;height:auto;display:block;margin:20px auto;"
alt="Memot Prototipo">

</div>

<div class="texto-historia">

<p><strong>Características:</strong></p>

<p>
• Conectividad WiFi para control a distancia.<br>
• Sistema de audio integrado para reproducción de temas MP3.<br>
• Matriz de luces NeoPixel con regulación de intensidad y color.<br>
• Motor con movimientos predeterminados para proyecciones en el techo.
</p>

<p><strong>Descripción:</strong></p>

<p>
Memot es un proyector inteligente diseñado especialmente para la mesita de luz.
Su objetivo principal es ayudarte a conciliar el sueño de manera óptima
combinando estímulos visuales, colores relajantes y sonidos ambientales
personalizados que podés controlar directamente desde esta web.
</p>

<span class="precio-tag">
Precio: $59.999
</span>

</div>

</div>

</main>

    <script src="../JS/menu.js"></script>
    
</body>
</html>
