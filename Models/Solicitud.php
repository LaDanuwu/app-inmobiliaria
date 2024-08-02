<?php
class Solicitud {
    private $conn;
    private $table_name = "solicitudes";

    public $id_sol;
    public $id_inm;
    public $id_user;
    public $fecha;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT inmuebles.tipo, inmuebles.ciudad, inmuebles.barrio, usuarios.nombres, usuarios.apellidos, inmuebles.foto 
                  FROM " . $this->table_name . " 
                  JOIN inmuebles ON solicitudes.id_inm = 1
                  JOIN usuarios ON solicitudes.id_user = 1";
        $stmt = $this->conn->query($query);
        return $stmt;
    }
}
?>
