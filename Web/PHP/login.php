<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require_once "conexion.php";

$email = trim($_POST["email"]);
$password = $_POST["password"];

$sql = "SELECT * FROM usuarios WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();

$resultado = $stmt->get_result();

if ($resultado->num_rows == 1) {

    $usuario = $resultado->fetch_assoc();

    if (password_verify($password, $usuario["password"])) {

        $_SESSION["id_usuario"] = $usuario["id_usuario"];
        $_SESSION["nombre"] = $usuario["nombre"];
        $_SESSION["apellido"] = $usuario["apellido"];
        $_SESSION["email"] = $usuario["email"];

        header("Location: ../HTML/Perfil.php");
        exit();

    } else {
        echo "Contraseña incorrecta.";
    }

} else {
    echo "No existe una cuenta con ese correo.";
}

$conn->close();
?>