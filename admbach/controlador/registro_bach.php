<?php
if (isset($_POST['btnregistrar'])) {
    // Recoger los datos del formulario
    $nombre = $_POST['nombre'] ?? '';
    $enfasis_id = $_POST['enfasis_id'] ?? '';

    // Validar que los campos no estén vacíos
    if (empty($nombre) || empty($enfasis_id)) {
        echo "<div class='alert alert-danger'>Todos los campos son obligatorios.</div>";
    } else {
        // Preparar la consulta SQL para insertar en la tabla
        $stmt = $conexion->prepare("INSERT INTO bachilleratos (nombre, enfasis_id) VALUES (?, ?)");
        $stmt->bind_param("si", $nombre, $enfasis_id); // 'si' indica tipos de datos: string, integer

        // Ejecutar la consulta y comprobar si se guarda correctamente
        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>Registro guardado exitosamente.</div>";
        } else {
            echo "<div class='alert alert-danger'>Error al guardar el registro: " . $stmt->error . "</div>";
        }

        $stmt->close(); // Cerrar la declaración
    }
}
?>


