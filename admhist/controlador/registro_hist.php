<?php
include_once "../modelo/conexion.php"; 

if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["titulo"]) && !empty($_POST["contenido"]) && !empty($_POST["fecha"])) {
        $titulo = $conexion->real_escape_string($_POST["titulo"]);
        $contenido = $conexion->real_escape_string($_POST["contenido"]);
        $fecha = $conexion->real_escape_string($_POST["fecha"]);
        

        // Mover archivo de imagen a la carpeta deseada
     
        $query = "INSERT INTO historia_colegio (titulo, contenido, fecha) VALUES ('$titulo', '$contenido', '$fecha')";

        $sql = $conexion->query($query);

        if ($sql) {
            echo "<div class='alert alert-success'>Registro Exitoso</div>";
        } else {
            echo "<div class='alert alert-danger'>Error al Registrar: " . $conexion->error . "</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Algunos de los campos están vacíos</div>";
    }
} else {
    echo "<div class='alert alert-warning'>Botón registrar no fue presionado</div>";
}
?>




