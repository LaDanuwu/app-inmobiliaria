<?php
require_once(__DIR__ . '/conexiondb.php');

class ValidarSesion{
    public function iniciarSesion($email, $clave){
        $objConexionBd = new ConexionBd();
        $conexion = $objConexionBd->getConexion();

        // Consulta
        $consulta = "SELECT * FROM usuarios WHERE correo = :email";
        $result = $conexion->prepare($consulta);
        $result->bindParam(':email', $email);
        $result->execute();

        if ($f = $result->fetch()) {
            if ($f["clave"] == $clave){
                
                    session_start();
                    $_SESSION["id"] = $f["id"];
                    $_SESSION["correo"] = $f["correo"];
                    $_SESSION["rol"] = $f["rol"];

                    switch ($f["rol"]) {
                        case 'Usuario':
                            echo 
                            "<script>
                                alert ('Bienvenido Usuario');
                                location.href='../Views/html/interfaces/Cliente/UserDashboard.php';
                            </script>";
                            break;
                        
                        case "Inmobiliaria":
                            echo 
                            "<script>
                                alert ('Bienvenido Inmobiliaria');
                                location.href='../Views/html/interfaces/Inmobiliaria/InmoDashboard.html';
                            </script>";
                            break;
                    }
            } else {
                echo "
                <script>
                    alert('La contraseña no existe en la base de datos');
                    location.href='../Views/html/interfaces/login.html';
                </script>
                ";
            }
        } else {
            echo "
                <script>
                    alert('El email no existe en la base de datos');
                    location.href='../Views/html/interfaces/login.html';
                </script>
            ";
        }
    }
}
?>

