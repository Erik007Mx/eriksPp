<html>
<head>
</head>
<body>
    <?php
    $conexion = new mysqli("localhost", "root", "", "ferrari");
    if ($conexion->connect_errno) {
        echo "Falló la conexión: " . $conexion->connect_error;
    } else {
        echo "Conexión exitosa";
    }
    ?>
</body>
</html>
