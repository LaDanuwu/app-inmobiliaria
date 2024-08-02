<?php
require_once(__DIR__ . '/../Models/conexiondb.php');
require_once(__DIR__ . '/../Models/validarSesion.php');

$emailUser = $_POST["emailUser"];
$claveUser = $_POST["claveUser"];

// Encriptamos la contraseña
$claveHash = md5($claveUser);

$objValidarSesion = new ValidarSesion();

$result = $objValidarSesion->iniciarSesion($emailUser, $claveHash);

if ($result) {
    // Redirección según el rol del usuario, esto se maneja dentro de la clase ValidarSesion
} else {
    echo "<script>
            alert('Error en el inicio de sesión');
            location.href='../Views/html/interfaces/login.html';
          </script>";
}
?>
