<?php
include_once "../modelo/conexion.php"; 

if (!empty($_GET['id'])) {
    $id = $conexion->real_escape_string($_GET['id']);
    $sql = $conexion->query("DELETE FROM actc WHERE id = $id");

    if ($sql) {
        // Redirige a la página principal después de la eliminación
        header("Location: ../admin_acti.php?");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Error al eliminar: " . $conexion->error . "</div>";
    }
} else {
    echo "<div class='alert alert-danger'>ID no proporcionado.</div>";
}
?>