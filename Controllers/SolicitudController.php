<?php
require_once(__DIR__ . '/../Models/conexiondb.php');
require_once(__DIR__ . '/../Models/Solicitud.php');

class SolicitudController {
    private $db;
    private $solicitud;

    public function __construct() {
        $database = new ConexionBd();
        $this->db = $database->getConexion();
        $this->solicitud = new Solicitud($this->db);
    }

    public function index() {
        // Obtener los datos de las solicitudes
        $result = $this->solicitud->read();

        // Renderizar la tabla de solicitudes
        $this->renderSolicitudes($result);
    }

    private function renderSolicitudes($result) {
        if ($result && $result->rowCount() > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>
                            <figure class='photo'>
                                <img src='../imgs/" . $row["foto"] . "' alt=''>
                            </figure>
                            <div class='info'>
                                <h3>" . $row["tipo"] . "</h3>                        
                                <p>" . $row["ciudad"] . "/" . $row["barrio"] . "</p>
                                <p>" . $row["nombres"] . " " . $row["apellidos"] . "</p>
                            </div>
                            <div class='controls'>
                                <a href='InmoShowSolicitud.html' class='show'></a>
                            </div>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td>No hay solicitudes</td></tr>";
        }
    }
}
?>
