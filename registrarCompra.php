<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Compra</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h3>Registrar Compra</h3>
    <form action="altaCompra.php" method="POST">
        <div class="input-field">
            <input id="claveU" type="text" name="claveU" value="<?php echo $_GET['claveU']; ?>" readonly>
            <label for="claveU">Clave de Usuario</label>
        </div>
        <div class="input-field">
            <input id="claveM" type="text" name="claveM" required>
            <label for="claveM">Clave del Modelo</label>
        </div>
        <div class="input-field">
            <input id="precio" type="text" name="precio" required>
            <label for="precio">Precio</label>
        </div>
        <div class="input-field">
            <input id="ano" type="text" name="ano" required>
            <label for="ano">Año</label>
        </div>
        <button type="submit" class="btn waves-effect waves-light">Registrar</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
