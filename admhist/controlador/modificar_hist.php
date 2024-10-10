<?php
include_once "../modelo/conexion.php"; 

if (isset($_POST["btnmodificar"])) {
    if (!empty($_POST["titulo"]) && !empty($_POST["contenido"]) && !empty($_POST["fecha"])) {
        $titulo = $conexion->real_escape_string($_POST["titulo"]);
        $contenido = $conexion->real_escape_string($_POST["contenido"]);
        $fecha = $conexion->real_escape_string($_POST["fecha"]);
        $id = $conexion->real_escape_string($_POST["id"]);
        
        // Consulta para actualizar el registro sin la imagen
        $query = "UPDATE historia_colegio SET 
                    titulo = '$titulo', 
                    contenido = '$contenido', 
                    fecha = '$fecha'
                  WHERE id = $id";

        $sql = $conexion->query($query);

        if ($sql) {
            echo "<div class='alert alert-success'>Modificación Exitosa</div>";
            if ($conexion->affected_rows > 0) {
                // Redirección al panel de administración después de 3 segundos
                header("Refresh:3; url=../../admhist/admin_hist.php");
                echo "<div class='alert alert-info'>Redirigiendo al panel de administración...</div>";
                exit;
            } else {
                echo "<div class='alert alert-warning'>No se realizaron cambios en el registro.</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Error al modificar el registro: " . $conexion->error . "</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Por favor, complete todos los campos.</div>";
    }
}
?>

<!-- Enlace para volver al panel de administración -->
<div class="mt-3">
    <a href="../../admhist/admin_hist.php" class="btn btn-primary">Volver al panel de administración</a>
</div>