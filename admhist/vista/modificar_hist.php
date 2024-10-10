<?php
include_once "../modelo/conexion.php";  // Asegúrate de que la ruta sea correcta

if (!isset($conexion)) {
    die("Error: No se pudo establecer la conexión con la base de datos.");
}

$id = $_GET["id"];

if (isset($id)) {
    $sql = $conexion->query("SELECT * FROM historia_colegio WHERE id = $id");
    if ($sql->num_rows > 0) {
        $datos = $sql->fetch_object();
    } else {
        echo "Dato no encontrado.";
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
    <title>Modificar Historia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-info-subtle">
   
    <h1 class="text-center p-3 bg-info-sutil text-info-emphasis">Modificar dDatos de la Historia</h1>
    <form class="col-4 p-3 m-auto " method="POST" action="../controlador/modificar_hist.php"> <!-- Asegúrate de que el action es correcto -->
        <input type="hidden" name="id" value="<?= htmlspecialchars($id, ENT_QUOTES, 'UTF-8') ?>">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" name="titulo" id="titulo" value="<?= htmlspecialchars($datos->titulo, ENT_QUOTES, 'UTF-8') ?>">
            </div>
            <div class="mb-3">
                <label for="contenido" class="form-label">Contenido</label>
                <textarea class="form-control" name="contenido" id="contenido" rows="4"><?= htmlspecialchars($datos->contenido, ENT_QUOTES, 'UTF-8') ?></textarea>
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" class="form-control" name="fecha" id="fecha" value="<?= htmlspecialchars($datos->fecha, ENT_QUOTES, 'UTF-8') ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="btnmodificar">Modificar Registro</button>
        </form>
</body>
</html>
