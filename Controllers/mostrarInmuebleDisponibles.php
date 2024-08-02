<?php
require_once(__DIR__ . '/../Models/conexiondb.php');

function mostrarInmueblesDisponiblesCliente() {
    // Crear una conexión a la base de datos
    $objConexionBd = new ConexionBd();
    $conexion = $objConexionBd->getConexion();

    // Consultar los inmuebles
    $sql = "SELECT * FROM inmuebles";
    $result = $conexion->prepare($sql);
    $result->execute();

    // Mostrar inmuebles en formato HTML
    // Mostrar inmuebles en formato HTML
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $idmueble = number_format($row['id']);
        $tipo = htmlspecialchars($row['tipo']);
        $precio = number_format($row['precio'], 0, ',', '.');
        $ciudad = htmlspecialchars($row['ciudad']);
        $tamaño = number_format($row['tamano']);
        $barrio = htmlspecialchars($row['barrio']);
        $foto = htmlspecialchars($row['foto']);

        echo '
            <div class="card-inmueble">
                <img src="../../../../Uploads/' . $foto . '" alt="">
                <div class="info-card">
                    <h4>Valor de Arriendo:</h4>
                    <h2>' . $precio . '</h2>
                    <p>' . $tipo . ' - '.$tamaño.'m2</p>
                    <p class="direccion">' . $ciudad . ' / ' . $barrio . '</p>
                    <a href="UserShowInmueble.php?id=' . $row['id'] . '">Ver Más</a>
                </div>
            </div>
        ';
    }

}
?>
