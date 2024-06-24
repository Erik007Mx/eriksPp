<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas</title>
    <!-- Import Materialize CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h3>Consultas de Compras</h3>
    <form action="consultas.php" method="POST">
        <div class="input-field">
            <select name="consulta">
                <option value="" disabled selected>Elige una consulta</option>
                <option value="full">FULL JOIN</option>
                <option value="inner">INNER JOIN</option>
                <option value="left">LEFT JOIN</option>
                <option value="right">RIGHT JOIN</option>
                <option value="outer">OUTER JOIN</option>
            </select>
            <label>Tipo de Consulta</label>
        </div>
        <button type="submit" class="btn waves-effect waves-light">Consultar</button>
    </form>
    <div>
        <?php
        include("ConexionFerrari.php");

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $consulta = $_POST['consulta'];

            switch ($consulta) {
                case 'inner':
                    $sql = "SELECT * FROM comprar INNER JOIN coches ON comprar.claveM = coches.claveM";
                    break;
                case 'left':
                    $sql = "SELECT * FROM comprar LEFT JOIN coches ON comprar.claveM = coches.claveM";
                    break;
                case 'right':
                    $sql = "SELECT * FROM comprar RIGHT JOIN coches ON comprar.claveM = coches.claveM";
                    break;
                case 'outer':
                    $sql = "SELECT * FROM comprar FULL OUTER JOIN coches ON comprar.claveM = coches.claveM";
                    break;
                default:
                    $sql = "";
                    break;
                    case 'full':
                        $sql = "SELECT * FROM coches";
                        break;
            }

            $result = $conexion->query($sql);

            if ($result->num_rows > 0) {
                echo "<table class='striped'><thead><tr><th>Clave Usuario</th><th>Clave Modelo</th><th>Precio</th><th>Año</th><th>Modelo</th><th>Nombre Modelo</th></tr></thead><tbody>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>{$row['claveU']}</td><td>{$row['claveM']}</td><td>{$row['precio']}</td><td>{$row['año']}</td><td>{$row['modelo']}</td><td>{$row['nombreModelo']}</td></tr>";
                }

                echo "</tbody></table>";
            } else {
                echo "0 resultados";
            }
        }

        $conexion->close();
        ?>
    </div>
</div>
<!-- Import jQuery and Materialize JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var selectElems = document.querySelectorAll('select');
        M.FormSelect.init(selectElems);
    });
</script>
</body>
</html>
