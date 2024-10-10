<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infodrive - Administración de Énfasis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/4d303b9660.js" crossorigin="anonymous"></script>
</head>

<body class="bg-info-subtle">
<script>
    function confirmarEliminacion() {
        return confirm("¿Desea eliminar el registro?");
    }
</script>

    <h1 class="text-center p-3 bg-info-sutil text-info-emphasis">Administración de Énfasis</h1>

    <div class="container-fluid row">
        <form class="border border-primary p-4 rounded col-4 p-3" method="POST" enctype="multipart/form-data">
            <?php
            include_once "modelo/conexion.php";
            include_once "controlador/registro_enf.php";
            ?>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Énfasis</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
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
                        <th scope="col">Nombre del Énfasis</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once "modelo/conexion.php";
                    $sql = $conexion->query("SELECT * FROM enfasis");
                    while ($datos = $sql->fetch_object()) { ?>
                        <tr>
                            <td><?= htmlspecialchars($datos->id, ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($datos->nombre, ENT_QUOTES, 'UTF-8') ?></td>
                            <td>
                                <a href="vista/modificar_enf.php?id=<?= htmlspecialchars($datos->id, ENT_QUOTES, 'UTF-8') ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a onclick="return confirmarEliminacion()" href="controlador/eliminar_enf.php?id=<?= htmlspecialchars($datos->id, ENT_QUOTES, 'UTF-8') ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="row">
          <div class="col-md-12 text-center">
             <a href="../index.php" class="btn btn-info text-white mt-3">
            <i class="fa-solid fa-arrow-left"></i> Volver a Inicio
            </a>
         </div>
    </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

