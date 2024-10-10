<?php
include_once "../modelo/conexion.php";
$id = $_GET["id"];

if (isset($id)) {
    $sql = $conexion->query("SELECT * FROM bachilleratos WHERE id = $id");
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

// Obtener la lista de énfasis para el desplegable
$sql_enfasis = $conexion->query("SELECT * FROM enfasis");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Bachillerato</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-info-subtle">
   
    <h1 class="text-center p-3 bg-info-sutil text-info-emphasis">Modificar Bachillerato</h1>
    <form class="col-4 p-3 m-auto" method="POST" action="../controlador/modificar_bach.php">
        <input type="hidden" name="id" value="<?= htmlspecialchars($id, ENT_QUOTES, 'UTF-8') ?>">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Bachillerato</label>
            <input type="text" class="form-control" name="nombre" value="<?= htmlspecialchars($datos->nombre, ENT_QUOTES, 'UTF-8') ?>" required>
        </div>
        <div class="mb-3">
            <label for="enfasis_id" class="form-label">Énfasis</label>
            <select class="form-select" name="enfasis_id" required>
                <option value="">Seleccione un énfasis</option>
                <?php while ($enfasis = $sql_enfasis->fetch_object()): ?>
                    <option value="<?= htmlspecialchars($enfasis->id, ENT_QUOTES, 'UTF-8') ?>" <?= ($enfasis->id == $datos->enfasis_id) ? 'selected' : ''; ?>>
                        <?= htmlspecialchars($enfasis->nombre, ENT_QUOTES, 'UTF-8') ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" name="btnmodificar" value="ok">Modificar</button>
    </form>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>