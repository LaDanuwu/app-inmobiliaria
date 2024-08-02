<?php
// Incluir el controlador
require_once(__DIR__ . '/../../../../Models/conexiondb.php');
require_once(__DIR__ . '/../../../../Controllers/mostrarInmueblesShowCliente.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Inmueble - Tu Inmueble Ideal</title>
    <link rel="stylesheet" href="../../css/master.css">
</head>
<body>
    <main class="show">
        <header>
            <h2>Consultar Inmueble</h2>
            <a href="UserDashboard.php" class="back"></a>
            <a href="../../../../index.php" class="close"></a>
        </header>  

        <?php
            if (isset($_GET['id'])) {
                $id = (int)$_GET['id'];
                mostrarInmueblesCliente($id);
            } else {
                echo "ID del inmueble no especificado.";
            }
        ?>  

    </main>
</body>
</html>

