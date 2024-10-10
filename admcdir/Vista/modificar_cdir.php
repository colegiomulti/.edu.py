<?php
include_once "../modelo/conexion.php"; // Ajusta la ruta si es necesario
$id = $_GET["id"];

if (isset($id)) {
    $sql = $conexion->query("SELECT * FROM directivo WHERE id = $id");
    if ($sql->num_rows > 0) {
        $datos = $sql->fetch_object();
    } else {
        echo "dato no encontrado.";
        exit;
    }
} else {
    echo "ID no especificado.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Contacto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-info-subtle">
   
    <h1 class="text-center p-3 bg-info-sutil text-info-emphasis">Modificar Datos del Cuerpo Directivo</h1>
    <form class="col-4 p-3 m-auto " method="POST" action="../controlador/modificar_cdir.php"> <!-- Asegúrate de que el action es correcto -->
        <input type="hidden" name="id" value="<?= htmlspecialchars($id, ENT_QUOTES, 'UTF-8') ?>">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" value="<?= htmlspecialchars($datos->nombre, ENT_QUOTES, 'UTF-8') ?>">
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" name="apellido" id="apellido" value="<?= htmlspecialchars($datos->apellido, ENT_QUOTES, 'UTF-8') ?>">
        </div>
        <div class="mb-3">
            <label for="numero" class="form-label">Descripción</label>
            <input type="text" class="form-control" name="descripcion" id="descripcion" value="<?= htmlspecialchars($datos->descripcion, ENT_QUOTES, 'UTF-8') ?>">
        </div>
        <div class="mb-3">
            <label for="correo" class="form-label">Trayectoria</label>
            <input type="text" class="form-control" name="trayectoria" id="trayectoria" value="<?= htmlspecialchars($datos->trayectoria, ENT_QUOTES, 'UTF-8') ?>">
        </div>
        <button type="submit" class="btn btn-primary" name="btnmodificar">Modificar Registro </button>
    </form>
</body>
</html>