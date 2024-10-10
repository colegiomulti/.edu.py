<?php
if (isset($_POST['btnregistrar'])) {
    // Recoger los datos del formulario
    $nombre = $_POST['nombre'] ?? '';

    // Validar que el campo no esté vacío
    if (empty($nombre)) {
        echo "<div class='alert alert-danger'>Todos los campos son obligatorios.</div>";
    } else {
        // Preparar la consulta SQL para insertar en la tabla
        $sql = "INSERT INTO enfasis (nombre) VALUES ('$nombre')";

        // Ejecutar la consulta y comprobar si se guarda correctamente
        if ($conexion->query($sql)) {
            echo "<div class='alert alert-success'>Registro guardado exitosamente.</div>";
        } else {
            echo "<div class='alert alert-danger'>Error al guardar el registro: " . $conexion->error . "</div>";
        }
    }
}
?>




