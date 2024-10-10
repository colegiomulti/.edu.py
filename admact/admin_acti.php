<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infodrive</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/4d303b9660.js" crossorigin="anonymous"></script>
</head>

<body class="bg-info-subtle">
<script>
    function confirmarEliminacion() {
        return confirm("¿Desea eliminar el registro?");
    }
</script>

    <h1 class="text-center p-3 bg-info-sutil text-info-emphasis">Datos de Actividades Curriculares</h1>

    <div class="container-fluid row">
        <form class="border border-primary p-4 rounded col-4 p-3" method="POST" enctype="multipart/form-data">
            <?php
            include_once "modelo/conexion.php";
            include_once "controlador/registro_act.php";
            ?>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" required>
            </div>
            <div class="mb-3">
                <label for="lugar" class="form-label">Lugar</label>
                <input type="text" class="form-control" id="lugar" name="lugar" required>
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required>
            </div>
            <button type="submit" class="btn btn-primary" name="btnregistrar" value="Ok">Registrar</button>
        </form>

        <div class="col-8 p-4">
            <?php if (isset($_GET['msg']) && $_GET['msg'] == 'success'): ?>
                <div class="alert alert-success">Registro eliminado correctamente</div>
            <?php endif; ?>

            <table class="table table-bordered border-primary">
                <thead class="bg-info">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Lugar</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once "modelo/conexion.php"; // Incluye la conexión aquí
                    $sql = $conexion->query("SELECT * FROM actc");
                    while ($datos = $sql->fetch_object()) { ?>
                        <tr>
                            <td><?= htmlspecialchars($datos->id, ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($datos->descripcion, ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($datos->lugar, ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($datos->fecha, ENT_QUOTES, 'UTF-8') ?></td>
                            <td>
                                <a href="vista/modificar_act.php?id=<?= htmlspecialchars($datos->id, ENT_QUOTES, 'UTF-8') ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a onclick="return confirmarEliminacion()" href="controlador/eliminar_act.php?id=<?= htmlspecialchars($datos->id, ENT_QUOTES, 'UTF-8') ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <!-- Botón de Volver a Inicio -->
            <div class="mt-3 text-center">
                <a href="menuact.php" class="btn btn-info text-white"><i class="fa-solid fa-arrow-left"></i> Volver a Inicio</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
