<?php

require_once 'conexiondb.php';

class Inmueble {

    private $pdo;

    public function __construct() {
        $this->pdo = ConexionBd::getConexion();
    }

    public function getAllInmuebles() {
        $stmt = $this->pdo->prepare("SELECT * FROM inmuebles");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
