<?php
include_once "../modelo/conexion.php"; 

if (isset($_POST["btnmodificar"])) {
    if (!empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["descripcion"]) && !empty($_POST["trayectoria"])) {
        $nombre = $conexion->real_escape_string($_POST["nombre"]);
        $apellido = $conexion->real_escape_string($_POST["apellido"]);
        $descripcion = $conexion->real_escape_string($_POST["descripcion"]);
        $trayectoria = $conexion->real_escape_string($_POST["trayectoria"]);
        $id = $conexion->real_escape_string($_POST["id"]);
        
        // Consulta para actualizar el registro correctamente
        $query = "UPDATE directivo SET 
                    nombre = '$nombre', 
                    apellido = '$apellido', 
                    descripcion = '$descripcion',
                    trayectoria = '$trayectoria'
                  WHERE id = $id";

        $sql = $conexion->query($query);

        if ($sql) {
            echo "<div class='alert alert-success'>Modificación Exitosa</div>";
            if ($conexion->affected_rows > 0) {
                // Redirección al panel de administración después de 3 segundos
                header("Refresh:3; url=../../admcdir/admin_cdir.php");
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
    <a href="../../admcdir/admin_cdir.php" class="btn btn-primary">Volver al panel de administración</a>
</div>