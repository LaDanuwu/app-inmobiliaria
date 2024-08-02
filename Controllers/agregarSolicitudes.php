<?php
session_start(); // Inicia la sesión

require_once(__DIR__ . '/../Models/conexiondb.php');

function agregarSolicitud($id_inm, $id_user, $fecha) {
    $objConexionBd = new ConexionBd();
    $conexion = $objConexionBd->getConexion();

    $sql = "INSERT INTO solicitudes (id_inm, id_user, fecha) VALUES (:id_inm, :id_user, :fecha)";
    $stmt = $conexion->prepare($sql);

    $stmt->bindParam(':id_inm', $id_inm, PDO::PARAM_INT);
    $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
    $stmt->bindParam(':fecha', $fecha);

    if ($stmt->execute()) {
        echo "<script>
                alert('Solicitud agregada exitosamente.');
                location.href='../Views/html/interfaces/Cliente/UserDashboard.php';
              </script>       
        ";
    } else {
        echo "<script>
                alert('Error al agregar la solicitud.');
                location.href='../Views/html/interfaces/Cliente/UserDashboard.php';
              </script> ";
    }
}

// Obtén los datos del formulario
$id_inm = isset($_POST['id_inm']) ? (int)$_POST['id_inm'] : 0;
$id_user = isset($_POST['id_user']) ? (int)$_POST['id_user'] : 0;
$fecha = isset($_POST['fecha']) ? $_POST['fecha'] : date('Y-m-d');

agregarSolicitud($id_inm, $id_user, $fecha);
?>
