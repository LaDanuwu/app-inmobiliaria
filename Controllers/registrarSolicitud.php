<?php
require_once(__DIR__ . '/../Models/conexiondb.php');

class SolicitudModel {
    private $conexion;

    public function __construct() {
        $this->conexion = (new ConexionBd())->getConexion();
    }

    public function crearSolicitud($idInmueble, $idUsuario) {
        $sql = "INSERT INTO solicitudes (id_inm, id_user, fecha) VALUES (:id_inmueble, :id_usuario, NOW())";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([
            ':id_inmueble' => $idInmueble,
            ':id_usuario' => $idUsuario
        ]);
    }
}
?>
