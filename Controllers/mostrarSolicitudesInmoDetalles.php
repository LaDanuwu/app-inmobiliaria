<?php
require_once(__DIR__ . '/../Models/conexiondb.php');

function mostrarDetallesSolicitud($id_sol) {
    // Crear una conexión a la base de datos
    $objConexionBd = new ConexionBd();
    $conexion = $objConexionBd->getConexion();

    // Consultar los detalles de la solicitud
    $sql = "SELECT inmuebles.tipo, inmuebles.categoria, inmuebles.precio, inmuebles.ciudad, inmuebles.barrio, solicitudes.fecha, usuarios.nombres, usuarios.apellidos, usuarios.telefono, usuarios.correo, inmuebles.foto
            FROM solicitudes
            JOIN inmuebles ON solicitudes.id_inm = inmuebles.id
            JOIN usuarios ON solicitudes.id_user = usuarios.id
            WHERE solicitudes.id_sol = :id_sol";
    $result = $conexion->prepare($sql);
    $result->bindParam(':id_sol', $id_sol, PDO::PARAM_INT);
    $result->execute();

    // Obtener el resultado de la consulta
    $row = $result->fetch(PDO::FETCH_ASSOC);
    
    if ($row) {
        $tipo = htmlspecialchars($row['tipo']);
        $categoria = htmlspecialchars($row['categoria']);
        $precio = htmlspecialchars(number_format($row['precio'], 0, ',', '.')); // Formatear el precio
        $ciudad = htmlspecialchars($row['ciudad']);
        $barrio = htmlspecialchars($row['barrio']);
        $fecha = htmlspecialchars($row['fecha']);
        $nombres = htmlspecialchars($row['nombres']);
        $apellidos = htmlspecialchars($row['apellidos']);
        $telefono = htmlspecialchars($row['telefono']);
        $correo = htmlspecialchars($row['correo']);
        $foto = htmlspecialchars($row['foto']);
        
        echo '
        <figure class="photo-preview">
            <img src="../../../../Uploads/' . $foto . '" alt="Foto del inmueble">
        </figure>
        <div class="cont-details">
            <div>
                <article class="info-name">
                    <p>' . $tipo . '</p>
                </article>
                <article class="info-category">
                    <p>' . $categoria . '</p>
                </article>
                <article class="info-precio">
                    <p>$' . $precio . '</p>
                </article>
                <article class="info-direccion">
                    <p>' . $barrio . '/' . $ciudad . '</p>
                </article>
                <hr>
                <br>
                <article class="info-fecha">
                    <p>' . $fecha . '</p>
                </article>
                <article class="info-usuario">
                    <p>' . $nombres . ' ' . $apellidos . '</p>
                </article>
                <article class="info-telefono">
                    <p>' . $telefono . '</p>
                </article>
                <article class="info-correo">
                    <p>' . $correo . '</p>
                </article>
            </div>
        </div>';
    } else {
        echo '<p>No se encontraron detalles para la solicitud especificada.</p>';
    }
}
?>
