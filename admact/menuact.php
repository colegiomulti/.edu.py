<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5;
        }
        .navbar {
            margin-bottom: 20px;
        }
        .navbar-brand img {
            width: 50px;
            height: auto;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: white;
            font-size: 1.25rem;
            font-weight: bold;
        }
        .card-body {
            padding: 2rem;
        }
        .dropdown-item {
            font-size: 1.1rem;
        }
        footer {
            background-color: #e9ecef;
        }
        .title-header {
            font-size: 1.5rem;
            font-weight: bold;
        }
    </style>
</head>
<body>
<main class="container mt-5">
    <h1 class="title-header text-center mb-4">Seleccione la actividad</h1>
    <div class="row justify-content-center">
        <div class="col-md-5 mb-5 mx-auto">
            <div class="card text-center">
                <div class="card-header">
                    Sección Actividades Curriculares
                </div>
                <div class="card-body">
                    <p class="card-text">Administrar aquí.</p>
                    <a href="admin_acti.php" class="btn btn-primary">Gestionar</a>
                </div>
            </div>
        </div>
        <div class="col-md-5 mb-5 mx-auto">
            <div class="card text-center">
                <div class="card-header">
                    Sección Actividades Extracurriculares
                </div>
                <div class="card-body">
                    <p class="card-text">Administrar aquí.</p>
                    <a href="admin_acte.php" class="btn btn-primary">Gestionar</a>
                </div>
            </div>
            <!-- Botón de Volver a Inicio -->
            
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
             <a href="../index.php" class="btn btn-info text-white mt-3">
            <i class="fa-solid fa-arrow-left"></i> Volver a Inicio
            </a>
         </div>
    </div>

 </div>
</main>
</body>
</html>
