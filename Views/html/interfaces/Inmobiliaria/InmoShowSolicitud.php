<?php
require_once(__DIR__ . '/../../../../Controllers/mostrarSolicitudesInmoDetalles.php');

// Obtener el ID de la solicitud desde la URL
$id_sol = isset($_GET['id_sol']) ? intval($_GET['id_sol']) : 0;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Solicitud || Tu Inmueble Ya</title>
    <link rel="stylesheet" href="../../css/master.css">
</head>

<body>
    <main class="show">
        <header>
            <h2>Consultar Solicitud</h2>
            <a href="InmoSolicitudes.php" class="back"></a>
            <a href="../../../../index.php" class="close"></a>
        </header>
        <?php
        // Llamar a la función pasando el ID de la solicitud
        mostrarDetallesSolicitud($id_sol);
        ?>
    </main>
</body>

</html>
