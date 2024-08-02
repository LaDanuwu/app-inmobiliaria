<?php
require_once(__DIR__ . '/conexiondb.php');

class ConsultasUser
{
    public function registrarUser($nombres, $apellidos, $telefono, $correo, $clave, $rol)
    {
        $sql = "SELECT * FROM usuarios WHERE correo = :correo";

        $objConexionBd = new ConexionBd();
        $conexion = $objConexionBd->getConexion();
        $result = $conexion->prepare($sql);

        $result->bindParam(":correo", $correo);

        $result->execute();
        $f = $result->fetch();

        if ($f) {
            echo '
            <script>
                alert("Su correo ya está registrado");
                location.href="../Views/html/interfaces/register.html";
            </script>
            ';
        } else {
            $sql = "INSERT INTO usuarios(nombres, apellidos, telefono, correo, clave, rol) VALUES (:nombres, :apellidos, :telefono, :correo, :clave, :rol)";
            $result = $conexion->prepare($sql);

            $result->bindParam(":nombres", $nombres);
            $result->bindParam(":apellidos", $apellidos);
            $result->bindParam(":telefono", $telefono);
            $result->bindParam(":correo", $correo);
            $result->bindParam(":clave", $clave);
            $result->bindParam(":rol", $rol);

            $result->execute();

            echo '
            <script>
                alert("Registro exitoso");
                location.href="../Views/html/interfaces/login.html";
            </script>
            ';
        }
    }
}
?>
