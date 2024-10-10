<?php
include_once "../modelo/conexion.php"; 

if (isset($_POST["btnmodificar"])) {
    if (!empty($_POST["descripcion"]) && !empty($_POST["lugar"]) && !empty($_POST["fecha"])) {
        $descripcion = $conexion->real_escape_string($_POST["descripcion"]);
        $lugar = $conexion->real_escape_string($_POST["lugar"]);
        $fecha = $conexion->real_escape_string($_POST["fecha"]);
        $id = $conexion->real_escape_string($_POST["id"]);
        
        // Consulta para actualizar el registro sin la imagen
        $query = "UPDATE acte SET 
                    descripcion = '$descripcion', 
                    lugar = '$lugar', 
                    fecha = '$fecha'
                  WHERE id = $id";

        $sql = $conexion->query($query);

        if ($sql) {
            echo "<div class='alert alert-success'>Modificación Exitosa</div>";
            if ($conexion->affected_rows > 0) {
                // Redirección al panel de administración después de 3 segundos
                header("Refresh:3; url=../../admact/admin_acte.php");
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
    <a href="../../admact/admin_acte.php" class="btn btn-primary">Volver al panel de administración</a>
</div>