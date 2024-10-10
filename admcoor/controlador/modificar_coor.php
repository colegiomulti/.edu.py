<?php
include_once "../modelo/conexion.php"; 

if (isset($_POST["btnmodificar"])) {
    // Verificar que el campo "nombre" no esté vacío
    if (!empty($_POST["nombre"])) {
        // Escapar los valores para evitar inyección SQL
        $nombre = $conexion->real_escape_string($_POST["nombre"]); 
        $id = $conexion->real_escape_string($_POST["id"]);
        
        // Consulta para actualizar el registro en la tabla coordinadores
        $query = "UPDATE coordinadores SET 
                    nombre = '$nombre'
                  WHERE id = $id";

        // Ejecutar la consulta
        $sql = $conexion->query($query);

        if ($sql) {
            echo "<div class='alert alert-success'>Modificación Exitosa</div>";
            if ($conexion->affected_rows > 0) {
                // Redirigir al panel de administración después de 3 segundos
                header("Refresh:3; url=../../admcoor/admin_coor.php"); // Asegúrate de que esta URL sea correcta
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
    <a href="../../admcoor/admin_coor.php" class="btn btn-primary">Volver al panel de administración</a>
</div>
