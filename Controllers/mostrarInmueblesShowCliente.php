<?php
require_once(__DIR__ . '/../Models/conexiondb.php');
session_start(); // Inicia la sesión para acceder a la información del usuario

function mostrarInmueblesCliente($id) {
    $user_id = isset($_SESSION['id']) ? $_SESSION['id'] : 0; // Obtén el ID del usuario desde la sesión

    // Crear una conexión a la base de datos
    $objConexionBd = new ConexionBd();
    $conexion = $objConexionBd->getConexion();

    // Consultar los inmuebles por id
    $sql = "SELECT * FROM inmuebles WHERE id = :id";
    $result = $conexion->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    $result->execute();

    // Mostrar inmuebles en formato HTML
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $tipo = htmlspecialchars($row['tipo']);        
        $categoria = htmlspecialchars($row['categoria']);        
        $precio = number_format($row['precio'], 0, ',', '.');
        $tamaño = number_format($row['tamano']);
        $ciudad = htmlspecialchars($row['ciudad']);
        $barrio = htmlspecialchars($row['barrio']);
        $foto = htmlspecialchars($row['foto']);
        $id_inmueble = htmlspecialchars($row['id']);  // Asegúrate de capturar el ID del inmueble

        echo '           
            <figure class="photo-preview">
                <img src="../../../../Uploads/' . $foto . '" alt="">
            </figure>
            <div class="cont-details">
                <div>
                    <article class="info-name"><p>'.$tipo.'</p></article>
                    <article class="info-category"><p>'.$categoria.'</p></article>
                    <article class="info-precio"><p>'.$precio.'</p></article>
                    <article class="info-direccion"><p>'.$ciudad.' / '.$barrio.'</p></article>
                    <article class="info-tamano"><p>'.$tamaño.'m2</p></article>

                    <form method="post" action="../../../../Controllers/agregarSolicitudes.php">
                        <input type="hidden" name="id_inm" value="'.$id_inmueble.'">
                        <input type="hidden" name="id_user" value="'.$user_id.'"> <!-- Usa el ID del usuario actual -->
                        <input type="hidden" name="fecha" value="'.date('Y-m-d').'">
                        <button type="submit" class="solicitar">Solicitar cita</button>
                    </form>
                </div>
            </div>';
    }
}
?>
