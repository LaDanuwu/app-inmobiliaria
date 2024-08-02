<?php
// Incluir el controlador
require_once(__DIR__ . '/../../../../Models/conexiondb.php');
require_once(__DIR__ . '/../../../../Controllers/mostrarInmuebleDisponibles.php');

// Función para generar el HTML de los inmueble
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User || Tu Inmueble Ideal</title>
    <link rel="stylesheet" href="../../css/master.css">
</head>
<body>
    <main class="dashboard solicitudes">
        <header>
            <h2>Inmuebles Disponibles</h2>          
            <a href="../../../../index.php" class="close"></a>
        </header>
        <div class="contCards">           
                <?php mostrarInmueblesDisponiblesCliente()?>                
        </div>
    </main>
</body>
</html>
