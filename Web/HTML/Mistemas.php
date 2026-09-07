<?php
session_start();

if (!isset($_SESSION["id_usuario"])) {
    header("Location: Login.php");
    exit();
}

$destinoPerfil = "Perfil.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horas Que Importan - Personalizar Tema</title>

<link rel="stylesheet" href="../CSS/Style.css?v=15.0">
    <link rel="stylesheet" href="../CSS/Mistemas.css?v=15.0">
    <link rel="stylesheet" href="../CSS/Navegacion.css?v=2.0">
</head>

<body>

<?php $paginaActiva = 'temas'; $rutaBase = '../'; require __DIR__ . '/../includes/header.php'; ?>

<main class="main-container">
    <div class="glass-card">
        <div class="status-bar">
            <span>Dispositivo: Memot</span>
            <span id="status-texto" class="status-conectado">
                <span class="status-dot"></span><span id="texto-conexion">Conectando...</span>
            </span>
        </div>

        <h2 style="color: #181818; text-align: center; margin-bottom: 20px;">Tema Personalizado</h2>

        <div class="control-group">
            <label for="slider-volumen">Volumen del Audio</label>
            <input type="range" id="slider-volumen" class="slider" min="0" max="100" value="50">
        </div>

        <div class="control-group">
            <label for="select-audio">Pista de Audio Relajante</label>
            <select id="select-audio" class="input-select" style="width:100%; padding:10px; border-radius:15px; border:1px solid rgba(0,0,0,0.1); background:rgba(255,255,255,0.9); font-size:1rem;">
                <option value="lluvia.wav">Lluvia</option>
                <option value="oceano.wav">Océano</option>
                <option value="bosque.wav">Sonidos del Bosque</option>
                <option value="fuego.wav">Fuego</option>
            </select>
        </div>

        <div class="control-group">
            <label for="slider-luz">Intensidad de la Luz</label>
            <input type="range" id="slider-luz" class="slider" min="5" max="255" value="100">
        </div>

        <div class="control-group">
            <label for="picker-color">Color de las Luces</label>
            <input type="color" id="picker-color" class="picker-color" value="#9b59b6">
        </div>

        <div class="toggle-row">
            <label for="check-efecto">Efecto de Iluminación</label>
            <input type="checkbox" id="check-efecto" style="transform:scale(1.3); accent-color:#e67e22;">
        </div>

        <div class="toggle-row">
            <label for="check-apagado">Apagado Automático (30 min)</label>
            <input type="checkbox" id="check-apagado" style="transform:scale(1.3); accent-color:#e67e22;">
        </div>

        <button type="button" class="btn-listo">Guardar configuración</button>
    </div>
</main>

<script src="../JS/Mistemas.js"></script>

    <script src="../JS/menu.js"></script>
    
</body>
</html>
