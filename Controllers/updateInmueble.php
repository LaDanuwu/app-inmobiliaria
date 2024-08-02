<?php
require_once(__DIR__ . '/../Models/conexiondb.php');

// Capturamos los datos del formulario
$idInmueble = isset($_POST['id']) ? (int)$_POST['id'] : 0;
$tipo = $_POST['tipo'];
$categoria = $_POST['categoria'];
$precio = $_POST['precio'];
$tamano = $_POST['tamano'];
$ciudad = $_POST['ciudad'];
$barrio = $_POST['barrio'];
$foto = $_POST['foto']; // Asegúrate de que el campo foto esté en el formulario

if ($idInmueble) {
    // Crear una conexión a la base de datos
    $objConexionBd = new ConexionBd();
    $conexion = $objConexionBd->getConexion();

    // Consulta para actualizar el inmueble
    $sql = "UPDATE inmuebles SET tipo = :tipo, categoria = :categoria, precio = :precio, tamano = :tamano, ciudad = :ciudad, barrio = :barrio, foto = :foto WHERE id = :id";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':id', $idInmueble);
    $stmt->bindParam(':tipo', $tipo);
    $stmt->bindParam(':categoria', $categoria);
    $stmt->bindParam(':precio', $precio);
    $stmt->bindParam(':tamano', $tamano);
    $stmt->bindParam(':ciudad', $ciudad);
    $stmt->bindParam(':barrio', $barrio);
    $stmt->bindParam(':foto', $foto);

    if ($stmt->execute()) {
        echo "<script>
                alert('Inmueble actualizado exitosamente');
                location.href='../Views/html/interfaces/Inmobiliaria/InmoApartamentos.php';
              </script>";
    } else {
        echo "<script>
                alert('Error al actualizar el inmueble');
                location.href='../Views/html/interfaces/Inmobiliaria/InmoApartamentos.php';
              </script>";
    }
} else {
    echo "<script>
            alert('ID de inmueble inválido');
            location.href='../Views/html/interfaces/Inmobiliaria/InmoApartamentos.php';
          </script>";
}
?>
