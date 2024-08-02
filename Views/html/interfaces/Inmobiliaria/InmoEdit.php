<?php
// Enlazamos las dependencias
require_once(__DIR__ . '/../../../../Controllers/consultarInmueble.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Inmueble || Tu Inmueble Ideal</title>
    <link rel="stylesheet" href="../../css/master.css">
</head>
<body>
    <main class="edit">
        <header>
            <h2>Modificar Inmueble</h2>
            <a href="InmoApartamentos.php" class="back"></a>
            <a href="../../../../index.php" class="close"></a>
        </header>
        <form action="../../../../Controllers/updateInmueble.php" method="POST">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($inmueble['id']); ?>">
            <input type="file" name="foto" class="upload" aria-describedby="Foto Inmueble" required value="<?php echo htmlspecialchars($inmueble['foto']); ?>">
            <div class="select">
                <select name="tipo">
                    <option value="Apartamento" <?php echo $inmueble['tipo'] == 'Apartamento' ? 'selected' : ''; ?>>Apartamento</option>
                    <option value="Aparta Estudio" <?php echo $inmueble['tipo'] == 'Aparta Estudio' ? 'selected' : ''; ?>>Aparta Estudio</option>
                    <option value="Casa" <?php echo $inmueble['tipo'] == 'Casa' ? 'selected' : ''; ?>>Casa</option>
                </select>
            </div>
            <div class="select">
                <select name="categoria">
                    <option value="Arriendo" <?php echo $inmueble['categoria'] == 'Arriendo' ? 'selected' : ''; ?>>Arriendo</option>
                    <option value="Venta" <?php echo $inmueble['categoria'] == 'Venta' ? 'selected' : ''; ?>>Venta</option>
                </select>
            </div>
            <input type="number" name="precio" placeholder="Precio..." value="<?php echo htmlspecialchars($inmueble['precio']); ?>">
            <input type="number" name="tamano" placeholder="Tamaño..." value="<?php echo htmlspecialchars($inmueble['tamano']); ?>">
            <input type="text" name="ciudad" placeholder="Ciudad..." value="<?php echo htmlspecialchars($inmueble['ciudad']); ?>">
            <input type="text" name="barrio" placeholder="Localidad/Barrio..." value="<?php echo htmlspecialchars($inmueble['barrio']); ?>">
           
            
            <button class="btn-home" type="submit">Modificar</button>
        </form>
    </main>
</body>
</html>
