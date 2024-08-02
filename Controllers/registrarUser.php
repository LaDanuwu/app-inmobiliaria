<?php

// importamos las dependencias
require_once(__DIR__ . '/../Models/conexiondb.php');
require_once(__DIR__ . '/../Models/consultasUser.php');

// capturamos en variables los datos enviados desde el formulario a partir del método POST y los name de los datos
$identificacion = $_POST['identificacion'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$clave = $_POST['clave'];
$rol = $_POST['rol'];

// verificamos que la contraseña no esté vacía
if (!empty($clave)) {

    // encriptamos la contraseña
    $clave_md = md5($clave);

    // creamos el objeto a partir de la clase ConsultasUser, para enviar los valores a una función específica
    $objConsultas = new ConsultasUser();
    $result = $objConsultas->registrarUser($nombres, $apellidos, $telefono, $correo, $clave_md, $rol);

    if ($result) {
        echo "<script>
                alert('Registro exitoso');
                location.href='../Views/html/interfaces/register.html';
              </script>";
    } else {
        echo "<script>
                alert('Error en el registro');
                location.href='../Views/html/interfaces/register.html';
              </script>";
    }

} else {
    echo "<script>
            alert('La contraseña no puede estar vacía');
            location.href='../Views/html/interfaces/register.html';
          </script>";
}

?>
