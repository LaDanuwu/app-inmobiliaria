<?php
require_once(__DIR__ . '/../Models/conexiondb.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tipo = $_POST['tipo'];
    $categoria = $_POST['categoria'];
    $precio = $_POST['precio'];
    $tamano = $_POST['tamano'];
    $ciudad = $_POST['ciudad'];
    $barrio = $_POST['barrio'];
    $foto = $_FILES['foto'];

    // Procesar la subida del archivo
    $fotoNombre = basename($foto['name']);
    $fotoTmpNombre = $foto['tmp_name'];
    $fotoRuta = __DIR__ . '/../Uploads/' . $fotoNombre;

    if (move_uploaded_file($fotoTmpNombre, $fotoRuta)) {
        $fotoRutaRelativa =  $fotoNombre; // Ruta relativa para almacenar en la base de datos
    } else {
        echo "<script>
                alert('Error al mover el archivo');
                location.href='../Views/html/interfaces/Inmobiliaria/InmoAdd.html';
              </script>";
        exit;
    }

    $objConexionBd = new ConexionBd();
    $conexion = $objConexionBd->getConexion();

    $sql = "INSERT INTO inmuebles (tipo, categoria, precio, tamano, ciudad, barrio, foto) VALUES (:tipo, :categoria, :precio, :tamano, :ciudad, :barrio, :foto)";
    $stmt = $conexion->prepare($sql);

    $stmt->bindParam(':tipo', $tipo);
    $stmt->bindParam(':categoria', $categoria);
    $stmt->bindParam(':precio', $precio);
    $stmt->bindParam(':tamano', $tamano);
    $stmt->bindParam(':ciudad', $ciudad);
    $stmt->bindParam(':barrio', $barrio);
    $stmt->bindParam(':foto', $fotoRutaRelativa);

    if ($stmt->execute()) {
        echo "<script>
                alert('Inmueble agregado exitosamente');
                location.href='../Views/html/interfaces/Inmobiliaria/InmoAdd.html';
              </script>";
    } else {
        echo "<script>
                alert('Error al agregar el inmueble');
                location.href='../Views/html/interfaces/Inmobiliaria/InmoAdd.html';
              </script>";
    }
} else {
    echo "<script>
            alert('Método no permitido');
            location.href='../Views/html/interfaces/Inmobiliaria/InmoAdd.html';
          </script>";
}
?>
