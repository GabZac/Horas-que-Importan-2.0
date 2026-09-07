<?php
session_start();

$destinoPerfil = "Login.php";
if (isset($_SESSION["id_usuario"])) {
    $destinoPerfil = "Perfil.php";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horas Que Importan - Encuesta de Sueño</title>
<link rel="stylesheet" href="../CSS/Style.css?v=15.0">
    <link rel="stylesheet" href="../CSS/Mistemas.css?v=15.0">
    <link rel="stylesheet" href="../CSS/Cuestionario.css?v=4.0">
    <link rel="stylesheet" href="../CSS/Navegacion.css?v=2.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

<?php $paginaActiva = ''; $rutaBase = '../'; require __DIR__ . '/../includes/header.php'; ?>

<main class="main-container">
    <div class="glass-card encuesta-card">
        <h1>Encuesta de Sueño</h1>
        <p class="subtitulo">¡Queremos conocer tu experiencia para mejorar tus noches con Memot! </p>

        <form action="../PHP/ProcesarCuestionario.php" method="POST" class="form-cuestionario">
            
            <div class="pregunta-group">
                <label class="titulo-pregunta">1. ¿Cuántas horas promedio dormís por noche?</label>
                <div class="opciones-grid">
                    <label class="opcion-card"><input type="radio" name="horas_sueño" value="menos_6" required> Menos de 6 horas</label>
                    <label class="opcion-card"><input type="radio" name="horas_sueño" value="6_a_8"> Entre 6 y 8 horas</label>
                    <label class="opcion-card"><input type="radio" name="horas_sueño" value="mas_8"> Más de 8 horas</label>
                </div>
            </div>

            <div class="pregunta-group">
                <label class="titulo-pregunta">2. ¿Cuál es tu mayor dificultad al momento de descansar?</label>
                <div class="opciones-grid">
                    <label class="opcion-card"><input type="radio" name="dificultad" value="conciliar" required> Tardar en conciliar el sueño</label>
                    <label class="opcion-card"><input type="radio" name="dificultad" value="interrupciones"> Despertarme varias veces en la noche</label>
                    <label class="opcion-card"><input type="radio" name="dificultad" value="ruido_luz"> Molestias por luz o ruidos exteriores</label>
                    <label class="opcion-card"><input type="radio" name="dificultad" value="estres"> Estrés y pensamientos antes de dormir</label>
                </div>
            </div>

            <div class="pregunta-group">
                <label class="titulo-pregunta">3. ¿Qué métodos usás habitualmente para relajarte?</label>
                <div class="opciones-grid">
                    <label class="opcion-card"><input type="checkbox" name="metodos[]" value="musica"> Música / Sonidos blancos</label>
                    <label class="opcion-card"><input type="checkbox" name="metodos[]" value="luces"> Luces tenues / Proyecciones</label>
                    <label class="opcion-card"><input type="checkbox" name="metodos[]" value="lectura"> Lectura / Meditación</label>
                    <label class="opcion-card"><input type="checkbox" name="metodos[]" value="ninguno"> Ninguno</label>
                </div>
            </div>

            <div class="pregunta-group">
                <label class="titulo-pregunta">4. De las características principales de Memot, ¿cuál te llama más la atención?</label>
                <div class="opciones-grid">
                    <label class="opcion-card"><input type="radio" name="funcion_interes" value="luces_proyeccion" required> Proyección de luces y colores en tiempo real</label>
                    <label class="opcion-card"><input type="radio" name="funcion_interes" value="audio_relajante"> Reproducción de sonidos y temas de audio relajantes</label>
                    <label class="opcion-card"><input type="radio" name="funcion_interes" value="control_web"> Personalización total y control remoto desde la Web</label>
                    <label class="opcion-card"><input type="radio" name="funcion_interes" value="chat_ia"> Asesoramiento de hábitos de descanso con el Chat IA</label>
                </div>
            </div>

            <div class="pregunta-group">
                <label class="titulo-pregunta" for="sugerencias">5. ¿Alguna idea o comentario adicional?</label>
                <textarea id="sugerencias" name="sugerencias" rows="3" placeholder="Contanos qué otra función o detalle te ayudaría..." class="input-textarea"></textarea>
            </div>

            <div class="cuestionario-container">
                <button type="submit" class="btn-cuestionario btn-enviar">Enviar Respuestas </button>
            </div>

        </form>
    </div>
</main>

    <script src="../JS/menu.js"></script>
    
</body>
</html>
