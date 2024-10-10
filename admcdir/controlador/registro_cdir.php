<?php
if (isset($_POST['btnregistrar'])) {
    $nombre = $_POST['nombre'] ?? '';
    $apellido = $_POST['apellido'] ?? '';
    $descripcion = $_POST['descripcion'] ?? '';
    $trayectoria = $_POST['trayectoria'] ?? '';

    if (empty($nombre) || empty($apellido) || empty($descripcion) || empty($trayectoria)) {
        echo "<div class='alert alert-danger'>Todos los campos son obligatorios.</div>";
    } else {
        // Aquí va la lógica para insertar en la base de datos
        $sql = "INSERT INTO directivo (nombre, apellido, descripcion, trayectoria) 
                VALUES ('$nombre', '$apellido', '$descripcion', '$trayectoria')";

        if ($conexion->query($sql)) {
            echo "<div class='alert alert-success'>Registro guardado exitosamente.</div>";
        } else {
            echo "<div class='alert alert-danger'>Error al guardar el registro: " . $conexion->error . "</div>";
        }
    }
}
?>

