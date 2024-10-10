<?php
include_once "../modelo/conexion.php"; 

if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["descripcion"]) && !empty($_POST["lugar"]) && !empty($_POST["fecha"])) {
        $descripcion = $conexion->real_escape_string($_POST["descripcion"]);
        $lugar = $conexion->real_escape_string($_POST["lugar"]);
        $fecha = $conexion->real_escape_string($_POST["fecha"]);
        

        // Mover archivo de imagen a la carpeta deseada
     
        $query = "INSERT INTO actc (descripcion, lugar, fecha) VALUES ('$descripcion', '$lugar', '$fecha')";

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