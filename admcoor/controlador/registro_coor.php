<?php
if (isset($_POST['btnregistrar'])) {
    // Recoger los datos del formulario
    $nombre = $_POST['nombre'] ?? '';
    $bachillerato_id = $_POST['bachillerato_id'] ?? ''; // Asegúrate de que este campo esté presente en tu formulario

    // Validar que los campos no estén vacíos
    if (empty($nombre) || empty($bachillerato_id)) {
        echo "<div class='alert alert-danger'>Todos los campos son obligatorios.</div>";
    } else {
        // Escapar los valores para evitar inyección SQL
        $nombre = $conexion->real_escape_string($nombre);
        $bachillerato_id = $conexion->real_escape_string($bachillerato_id);

        // Preparar la consulta SQL para insertar en la tabla coordinadores
        $sql = "INSERT INTO coordinadores (nombre, bachillerato_id) VALUES ('$nombre', '$bachillerato_id')";

        // Ejecutar la consulta y comprobar si se guarda correctamente
        if ($conexion->query($sql)) {
            echo "<div class='alert alert-success'>Registro guardado exitosamente.</div>";
        } else {
            echo "<div class='alert alert-danger'>Error al guardar el registro: " . $conexion->error . "</div>";
        }
    }
}
?> 





