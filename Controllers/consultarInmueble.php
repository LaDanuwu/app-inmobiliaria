<?php
require_once(__DIR__ . '/../Models/conexiondb.php');

// Capturamos el ID del inmueble a consultar
$idInmueble = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($idInmueble) {
    // Crear una conexión a la base de datos
    $objConexionBd = new ConexionBd();
    $conexion = $objConexionBd->getConexion();

    // Consulta para obtener los datos del inmueble
    $sql = "SELECT * FROM inmuebles WHERE id = :id";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':id', $idInmueble);
    $stmt->execute();

    $inmueble = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($inmueble) {
        // Pasar los datos a la vista
        echo json_encode($inmueble);
    } else {
        echo "No se encontró el inmueble";
    }
} else {
    echo "ID de inmueble inválido";
}
?>
