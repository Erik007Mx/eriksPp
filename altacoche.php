<?php
include("ConexionFerrari.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $claveM = $_POST['claveM'];
    $motor = $_POST['motor'];
    $suspension = $_POST['suspension'];
    $carroceria = $_POST['carroceria'];
    $regalias = $_POST['regalias'];

    $sql = "INSERT INTO coches (claveM, motor, suspension, carroceria, regalias) VALUES ('$claveM', '$motor', '$suspension', '$carroceria', '$regalias')";

    if ($conexion->query($sql) === TRUE) {
        echo "Coche registrado exitosamente";
        header("Location: hub.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    $conexion->close();
}
?>
