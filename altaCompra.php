<?php
include("ConexionFerrari.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $claveU = $_POST['claveU'];
    $claveM = $_POST['claveM'];
    $precio = $_POST['precio'];
    $año = $_POST['año'];

    $sql = "INSERT INTO comprar (claveU, claveM, precio, año) VALUES ('$claveU', '$claveM', '$precio', '$año')";

    if ($conexion->query($sql) === TRUE) {
        header("Location: altacoches.php?claveM=$claveM");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    $conexion->close();
}
?>
