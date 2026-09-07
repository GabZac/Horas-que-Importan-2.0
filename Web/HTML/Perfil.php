<?php
session_start();

if (!isset($_SESSION["id_usuario"])) {
    header("Location: Login.php");
    exit();
}

$nombre = $_SESSION["nombre"];
?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Mi Perfil - Memot</title>
<link rel="stylesheet" href="../CSS/Style.css?v=15.0">
    <link rel="stylesheet" href="../CSS/Mistemas.css?v=15.0">
<link rel="stylesheet" href="../CSS/Perfil.css?v=4.0">
<link rel="stylesheet" href="../CSS/Navegacion.css?v=2.0">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

<?php $paginaActiva = ''; $rutaBase = '../'; require __DIR__ . '/../includes/header.php'; ?>

<main class="perfil-container">

<div class="glass-card perfil-card">

<div class="perfil-header">

<div class="avatar">
👤
</div>

<div>

<h1>Hola, <?php echo $nombre; ?></h1>

<p>Bienvenida nuevamente a Memot.</p>

</div>

</div>

<hr>

<div class="perfil-grid">





<div class="bloque">

<h2>Registrar sueño </h2>

<form action="../PHP/guardarSueno.php" method="POST">

<label>Fecha</label>

<input
type="date"
name="fecha"
required>

<label>Hora en que te dormiste</label>

<input
type="time"
name="hora_dormir"
required>

<label>Hora en que despertaste</label>

<input
type="time"
name="hora_despertar"
required>

<label>¿Cómo dormiste?</label>

<select name="calidad_sueno">

<option value="5">⭐⭐⭐⭐⭐ Excelente</option>
<option value="4">⭐⭐⭐⭐ Muy bien</option>
<option value="3">⭐⭐⭐ Normal</option>
<option value="2">⭐⭐ Mal</option>
<option value="1">⭐ Muy mal</option>

</select>

<button type="submit">
Guardar registro
</button>

</form>

</div>




<div class="bloque">

<h2>Tus estadísticas </h2>

<canvas id="graficoSueno"></canvas>

<div class="mensaje-memo">

<h3>Promedio de horas</h3>

<p id="promedio">Calculando...</p>

<h3>Memo dice</h3>

<p id="mensajeMemo">
Analizando tus hábitos de sueño...
</p>

</div>

</div>

</div>

</div>

</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById("graficoSueno");

fetch("../PHP/obtenerGrafico.php")

.then(res=>res.json())

.then(datos=>{

const promedio = datos.horas.length>0
? datos.horas.reduce((a,b)=>a+b,0)/datos.horas.length
:0;

document.getElementById("promedio").innerHTML =
promedio.toFixed(1)+" horas";

let mensaje="";

if(promedio==0){

mensaje="Todavía no registraste suficientes noches.";

}

else if(promedio<6){

mensaje="Estás durmiendo muy poco. Intentá descansar más.";

}

else if(promedio<8){

mensaje="¡Vas por buen camino!";

}

else{

mensaje="¡Excelente! Tenés un muy buen descanso.";

}

document.getElementById("mensajeMemo").innerHTML=mensaje;

new Chart(ctx,{

type:"bar",

data:{

labels:datos.fechas,

datasets:[{

label:"Horas dormidas",

data:datos.horas,

borderWidth:1

}]

},

options:{

responsive:true,

plugins:{

legend:{

display:true

}

},

scales:{

y:{

beginAtZero:true,

max:12

}

}

}

});

});

 </script>
<script src="../JS/menu.js"></script>
    
</body>

</html>
