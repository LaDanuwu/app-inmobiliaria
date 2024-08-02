<?php
require_once(__DIR__ . '/../Models/conexiondb.php');

function mostrarInmuebles() {
    // Crear una conexión a la base de datos
    $objConexionBd = new ConexionBd();
    $conexion = $objConexionBd->getConexion();

    // Consultar los inmuebles
    $sql = "SELECT * FROM inmuebles";
    $result = $conexion->prepare($sql);
    $result->execute();
    
    // Mostrar inmuebles en formato HTML
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $tipo = htmlspecialchars($row['tipo']);
        $precio = number_format($row['precio'], 0, ',', '.');
        $ciudad = htmlspecialchars($row['ciudad']);
        $barrio = htmlspecialchars($row['barrio']);
        $foto = htmlspecialchars($row['foto']);

        echo '<tr>
                <td>
                    <figure class="photo">
                        <img src="../../../../Uploads/' . $foto . '" alt="Foto del inmueble">
                    </figure>
                    <div class="info">
                        <h3>' . $tipo . '</h3>
                        <h4>$' . $precio . '</h4>
                        <p>' . $ciudad . '/' . $barrio . '</p>
                    </div>
                    <div class="controls">
                        <a href="InmoEdit.php?id=' . $row['id'] . '" class="edit"></a>
                        <a href="../../../../Controllers/deleteInmueble.php?id=' . $row['id'] . '" class="delete"></a>
                    </div>
                </td>
            </tr>';
    }
}
?>
