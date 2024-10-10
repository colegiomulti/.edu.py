<?php
include_once "../modelo/conexion.php";
$id = $_GET["id"];

if (isset($id)) {
    $sql = $conexion->query("SELECT * FROM cursos WHERE id = $id");
    if ($sql->num_rows > 0) {
        $datos = $sql->fetch_object();
    } else {
        echo "Curso no encontrado.";
        exit;
    }
} else {
    echo "ID no especificado.";
    exit;
}

// Obtener la lista de bachilleratos para el select
$bachilleratos = $conexion->query("SELECT id, nombre FROM bachilleratos");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Curso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-info-subtle">
   
    <h1 class="text-center p-3 bg-info-sutil text-info-emphasis">Modificar Curso</h1>
    <form class="col-4 p-3 m-auto" method="POST" action="../controlador/modificar_curso.php">
        <input type="hidden" name="id" value="<?= htmlspecialchars($id, ENT_QUOTES, 'UTF-8') ?>">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Curso</label>
            <input type="text" class="form-control" name="nombre" value="<?= htmlspecialchars($datos->nombre, ENT_QUOTES, 'UTF-8') ?>" required>
        </div>
        <div class="mb-3">
            <label for="bachillerato" class="form-label">Bachillerato</label>
            <select class="form-select" name="bachillerato_id" required>
                <option selected disabled value="">Seleccione un bachillerato</option>
                <?php while ($bach = $bachilleratos->fetch_object()) { ?>
                    <option value="<?= htmlspecialchars($bach->id, ENT_QUOTES, 'UTF-8') ?>" <?= ($bach->id == $datos->bachillerato_id) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($bach->nombre, ENT_QUOTES, 'UTF-8') ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" name="btnmodificar" value="ok">Modificar Registro</button>
    </form>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>