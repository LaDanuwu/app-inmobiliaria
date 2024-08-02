<?php
// Enlazamos las dependencias
require_once(__DIR__ . '/../Models/conexiondb.php');

// Capturamos el ID del inmueble a eliminar
$idInmueble = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($idInmueble) {
    // Crear una conexión a la base de datos
    $objConexionBd = new ConexionBd();
    $conexion = $objConexionBd->getConexion();

    try {
        // Iniciar una transacción
        $conexion->beginTransaction();

        // Primero eliminamos las solicitudes asociadas
        $sqlSolicitudes = "DELETE FROM solicitudes WHERE id_inm = :id";
        $stmtSolicitudes = $conexion->prepare($sqlSolicitudes);
        $stmtSolicitudes->bindParam(':id', $idInmueble);
        $stmtSolicitudes->execute();

        // Luego eliminamos el inmueble
        $sqlInmueble = "DELETE FROM inmuebles WHERE id = :id";
        $stmtInmueble = $conexion->prepare($sqlInmueble);
        $stmtInmueble->bindParam(':id', $idInmueble);
        $stmtInmueble->execute();

        // Confirmar la transacción
        $conexion->commit();

        echo "<script>
                alert('Inmueble eliminado exitosamente');
                location.href='../Views/html/interfaces/Inmobiliaria/InmoApartamentos.php';
              </script>";
    } catch (Exception $e) {
        // Revertir la transacción en caso de error
        $conexion->rollBack();
        echo "<script>
                alert('Error al eliminar el inmueble: " . $e->getMessage() . "');
                location.href='../Views/html/interfaces/Inmobiliaria/InmoApartamentos.php';
              </script>";
    }
} else {
    echo "<script>
            alert('ID de inmueble inválido');
            location.href='../Views/html/interfaces/Inmobiliaria/InmoApartamentos.php';
          </script>";
}
?>

