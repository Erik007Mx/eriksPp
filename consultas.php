<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Datos</title>
    <!-- Import Materialize CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
  <nav class="black">
    <div class="nav-wrapper">
      
      <a href="#" class="brand-logo center nav-logo">Ferrari</a>
      <a href="GRID.html" class="nav-return left"><i class="material-icons">GRID</i></a>
      <div class="background">
        <img src="play.jpg" alt="background" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: -1;">
      </div>
    </div>
  </nav>

<div class="container">
    <h3>Consulta de Datos</h3>
    <form action="" method="POST">
        <div class="input-field col s12">
            <select name="consulta">
                <option value="" disabled selected>Selecciona el tipo de consulta</option>
                <option value="inner">Inner Join</option>
                <option value="left">Left Join</option>
                <option value="right">Right Join</option>
               
                <option value="comprar">Consultar Tabla Comprar</option>
             
            </select>
            <label>Tipo de Consulta</label>
        </div>
        <button type="submit" class="btn waves-effect waves-light">Consultar</button>
    </form>

    <?php
    // Incluir el archivo de conexión a la base de datos
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
          
            case 'comprar':
                $sql = "SELECT * FROM comprar";
                break;
            
            default:
                $sql = "";
                break;
        }

        if (!empty($sql)) {
            $result = $conexion->query($sql);

            if ($result->num_rows > 0) {
                echo "<table class='striped'><thead><tr><th>Clave Usuario</th><th>Clave Modelo</th><th>Precio</th><th>Año</th><th>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>{$row['claveU']}</td><td>{$row['claveM']}</td><td>{$row['precio']}</td><td>{$row['año']}</td><td>";
                }

                echo "</tbody></table>";
            } else {
                echo "0 resultados";
            }
        } else {
            echo "Consulta no válida.";
        }

        $conexion->close();
    }
    ?>
</div>
<!-- Import jQuery and Materialize JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    $(document).ready(function(){
        $('select').formSelect();
    });
</script>
</body>
</html>
