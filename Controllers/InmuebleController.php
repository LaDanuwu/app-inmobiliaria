<?php
require_once '../Model/Database.php';
require_once '../Model/Inmueble.php';

class InmuebleController {
    private $inmueble;
    
    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->inmueble = new Inmueble($db);
    }
    
    public function index() {
        $result = $this->inmueble->getAllInmuebles();
        $inmuebles = array();
        
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            array_push($inmuebles, $row);
        }
        
        return $inmuebles;
    }
}

$controller = new InmuebleController();
$inmuebles = $controller->index();
?>

