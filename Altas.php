<?php
include("ConexionFerrari.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $claveU = $_POST['claveU'];
    $Contra = $_POST['Contra'];
    $nombre = $_POST['nombre'];

    $sql = "INSERT INTO usuarios (claveU, Contra, nombre) VALUES ('$claveU', '$Contra', '$nombre')";

    if ($conexion->query($sql) === TRUE) {
        echo "Usuario registrado exitosamente";
        header("Location: registrarCompra.php?claveU=$claveU");
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    $conexion->close();
}
?>
