<?php
require_once(__DIR__ . '/../Models/conexiondb.php');

function mostrarSolicitudes() {
    // Crear una conexión a la base de datos
    $objConexionBd = new ConexionBd();
    $conexion = $objConexionBd->getConexion();

    // Consultar las solicitudes, inmuebles y usuarios
    $sql = "SELECT 
                solicitudes.id_sol,
                inmuebles.tipo, 
                inmuebles.ciudad, 
                inmuebles.barrio, 
                usuarios.nombres, 
                usuarios.apellidos, 
                inmuebles.foto 
            FROM solicitudes 
            JOIN inmuebles ON solicitudes.id_inm = inmuebles.id
            JOIN usuarios ON solicitudes.id_user = usuarios.id";
    
    $result = $conexion->prepare($sql);
    $result->execute();

    // Mostrar inmuebles en formato HTML
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $idSolicitudes = htmlspecialchars($row['id_sol']);
        $tipo = htmlspecialchars($row['tipo']);
        $ciudad = htmlspecialchars($row['ciudad']);
        $barrio = htmlspecialchars($row['barrio']);
        $nombres = htmlspecialchars($row['nombres']);
        $apellidos = htmlspecialchars($row['apellidos']);
        $foto = htmlspecialchars($row['foto']);

        echo '<tr>
                <td>
                    <figure class="photo">
                        <img src="../../../../Uploads/' . $foto . '" alt="Foto del inmueble">
                    </figure>
                    <div class="info">
                        <h3>' . $tipo . '</h3>
                        <p>' . $ciudad . '/' . $barrio . '</p>
                        <p>' . $nombres . ' ' . $apellidos . '</p>
                    </div>
                    <div class="controls">
                        <a href="InmoShowSolicitud.php?id_sol=' . $idSolicitudes . '" class="show"></a>
                    </div>
                </td>
            </tr>';
    }
}
?>
