<?php
if (isset($_POST['btnregistrar'])) {
    // Recoger los datos del formulario
    $nombre = $_POST['nombre'] ?? '';
    $bachillerato_id = $_POST['bachillerato_id'] ?? '';

    // Validar que los campos no estén vacíos
    if (empty($nombre) || empty($bachillerato_id)) {
        echo "<div class='alert alert-danger'>Todos los campos son obligatorios.</div>";
    } else {
        // Preparar la consulta SQL para insertar en la tabla cursos
        // Es recomendable usar sentencias preparadas para evitar inyecciones SQL
        $sql = "INSERT INTO cursos (nombre, bachillerato_id) VALUES (?, ?)";

        // Preparar la consulta
        if ($stmt = $conexion->prepare($sql)) {
            // Vincular parámetros
            $stmt->bind_param("si", $nombre, $bachillerato_id);

            // Ejecutar la consulta y comprobar si se guarda correctamente
            if ($stmt->execute()) {
                echo "<div class='alert alert-success'>Registro guardado exitosamente.</div>";
            } else {
                echo "<div class='alert alert-danger'>Error al guardar el registro: " . $stmt->error . "</div>";
            }

            // Cerrar la declaración
            $stmt->close();
        } else {
            echo "<div class='alert alert-danger'>Error al preparar la consulta: " . $conexion->error . "</div>";
        }
    }
}
?>




