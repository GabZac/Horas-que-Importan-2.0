<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Si id_usuario viene vacío o no existe la sesión, asignamos NULL
    $id_usuario = !empty($_SESSION["id_usuario"]) ? (int)$_SESSION["id_usuario"] : NULL;
    
    $horas_sueño = $_POST["horas_sueño"] ?? "";
    $dificultad = $_POST["dificultad"] ?? "";
    $metodos = isset($_POST["metodos"]) ? implode(", ", $_POST["metodos"]) : "";
    $funcion_interes = $_POST["funcion_interes"] ?? "";
    $sugerencias = $_POST["sugerencias"] ?? "";

    // Usamos comillas invertidas (backticks ` `) alrededor de los nombres de columna
    $sql = "INSERT INTO `encuestas` (`id_usuario`, `horas_sueño`, `dificultad`, `metodos_relajacion`, `funcion_deseada`, `sugerencias`) 
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    $stmt->bind_param("isssss", $id_usuario, $horas_sueño, $dificultad, $metodos, $funcion_interes, $sugerencias);

    if ($stmt->execute()) {
        echo "<script>
                alert('¡Muchas gracias por completar la encuesta! 🌙');
                window.location.href = '../index.php';
              </script>";
    } else {
        echo "Error al guardar la encuesta: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>