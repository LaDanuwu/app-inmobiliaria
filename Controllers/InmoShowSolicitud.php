<?php
require_once(__DIR__ . '/../../../../Models/conexiondb.php');

$idSolicitud = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($idSolicitud) {
    $objConexionBd = new ConexionBd();
    $conexion = $objConexionBd->getConexion();

    $sql = "SELECT s.*, i.tipo, i.ciudad, i.barrio, u.nombre AS usuario_nombre 
            FROM solicitudes s
            JOIN inmuebles i ON s.id_inm = i.id
            JOIN usuarios u ON s.id_usr = u.id
            WHERE s.id = :id";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':id', $idSolicitud);
    $stmt->execute();
    $solicitud = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($solicitud) {
        // Aquí puedes mostrar los detalles de la solicitud
        echo "<h1>Solicitud de {$solicitud['usuario_nombre']}</h1>";
        echo "<p>Inmueble: {$solicitud['tipo']} en {$solicitud['ciudad']}/{$solicitud['barrio']}</p>";
        // Y más detalles según tu estructura de datos
    } else {
        echo "<p>Solicitud no encontrada</p>";
    }
} else {
    echo "<p>ID de solicitud inválido</p>";
}
?>
