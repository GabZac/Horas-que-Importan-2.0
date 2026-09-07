<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horas Que Importan - Chat IA</title>
    <link rel="stylesheet" href="../CSS/Asistente.css?v=4.0">
	<link rel="stylesheet" href="../CSS/Style.css?v=15.0">
    <link rel="stylesheet" href="../CSS/Mistemas.css?v=15.0">
    <link rel="stylesheet" href="../CSS/Navegacion.css?v=2.0">
</head>

<body>

<?php $paginaActiva = 'chat'; $rutaBase = '../'; require __DIR__ . '/../includes/header.php'; ?>

<main class="main-container">

    <div class="glass-card">

        <h1 class="titulo-principal">
            Chat con Memo
        </h1>

        <p class="subtitulo">
            Tu guía personal para mejorar tus horas de sueño
        </p>

        <div class="cuadro-info">

            <p>
                Si necesitás ayuda para armar una rutina de descanso,
                tenés dudas sobre cómo usar tu proyector Memot
                o simplemente querés charlar sobre tus hábitos de sueño,
                la versión inteligente de Memo está acá para acompañarte.
            </p>

        </div>

        <div class="floating-note">
            El asistente inteligente te espera abajo a la derecha
        </div>

    </div>

</main>

<script>
(function(){
if(!window.chatbase||window.chatbase("getState")!=="initialized"){
window.chatbase=(...arguments)=>{
if(!window.chatbase.q){window.chatbase.q=[]}
window.chatbase.q.push(arguments)
};
window.chatbase=new Proxy(window.chatbase,{
get(target,prop){
if(prop==="q"){return target.q}
return(...args)=>target(prop,...args)
}
})
}
const onLoad=function(){
const script=document.createElement("script");
script.src="https://www.chatbase.co/embed.min.js";
script.id="licjY2IQQ0Av16q_YfIwn";
script.domain="www.chatbase.co";
document.body.appendChild(script)
}
if(document.readyState==="complete"){
onLoad()
}else{
window.addEventListener("load",onLoad)
}
})();
</script>
    
    <script src="../JS/menu.js"></script>

</body>
</html>
