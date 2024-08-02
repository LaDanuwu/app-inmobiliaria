<?php
class ConexionBd
{
    private $host = 'localhost';
    private $dbname = 'inmobiliaria';
    private $username = 'root';
    private $password = '';
    private $conexion;

    public function getConexion()
    {
        $this->conexion = null;
        try {
            $this->conexion = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->username, $this->password);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Error de conexión: ' . $e->getMessage();
        }
        return $this->conexion;
    }
}
?>
