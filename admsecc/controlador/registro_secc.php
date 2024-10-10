<?php
if (isset($_POST['btnregistrar'])) {
    // Recoger los datos del formulario
    $nombre = $_POST['nombre'] ?? '';
    $turno = $_POST['turno'] ?? '';
    $curso_id = $_POST['curso_id'] ?? '';

    // Validar que los campos no estén vacíos
    if (empty($nombre) || empty($turno) || empty($curso_id)) {
        echo "<div class='alert alert-danger'>Todos los campos son obligatorios.</div>";
    } else {
        // Preparar la consulta SQL para insertar en la tabla
        $sql = "INSERT INTO secciones (nombre, turno, curso_id) VALUES ('$nombre', '$turno', $curso_id)";

        // Ejecutar la consulta y comprobar si se guarda correctamente
        if ($conexion->query($sql)) {
            echo "<div class='alert alert-success'>Registro guardado exitosamente.</div>";
        } else {
            echo "<div class='alert alert-danger'>Error al guardar el registro: " . $conexion->error . "</div>";
        }
    }
}
?>





