<?php
session_start();

// Verificar si el usuario está autenticado y tiene el rol adecuado
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

// Incluye la conexión a la base de datos
include "modelo/conexion.php";
$database = new Database();
$conexion = $database->getConnection();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="ProyectoBorrador.css"> <!-- Llamar a las propiedades de diseño de la página web -->
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
  <header class="bg-primary text-white p-3">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        
        <nav class="navbar navbar-expand-md navbar-light">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Gestión de Secciones
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="admhist/admin_hist.php">Historia</a></li>
                  <li><a class="dropdown-item" href="admcdir/admin_cdir.php">Cuerpo Directivo</a></li>
                  <li><a class="dropdown-item" href="admcdo/admin_cdo.php">Cuerpo Docente</a></li>
                  <li><a class="dropdown-item" href="admact/menuact.php">Actividades</a></li>
                  <li><a class="dropdown-item" href="admenf/admin_enf.php">Enfasis</a></li>
                  <li><a class="dropdown-item" href="admbach/admin_bach.php">Bachilleratos</a></li>
                  <li><a class="dropdown-item" href="admcoor/admin_coor.php">Coordinadores</a></li>
                  <li><a class="dropdown-item" href="admcurso/admin_curso.php">Curso</a></li>
                  <li><a class="dropdown-item" href="admsecc/admin_secc.php">Secciones</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
        <a href="logout.php" class="btn btn-danger">Cerrar Sesión</a>
      </div>
    </div>
  </header>

  <main class="container mt-5">
    <h1 class="title-header text-center mb-4">Panel de Administración</h1>
    <div class="row">
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="card-header">
           Historia
          </div>
          <div class="card-body">
            <p class="card-text">Administra la sección de Historia aquí.</p>
            <a href="admhist/admin_hist.php" class="btn btn-primary">Gestionar</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="card-header">
            Cuerpo Directivo
          </div>
          <div class="card-body">
            <p class="card-text">Administra el cuerpo directivo aquí.</p>
            <a href="admcdir/admin_cdir.php" class="btn btn-primary">Gestionar</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="card-header">
            Cuerpo Docente
          </div>
          <div class="card-body">
            <p class="card-text">Administra el cuerpo docente aquí.</p>
            <a href="admcdo/admin_cdo.php" class="btn btn-primary">Gestionar</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="card-header">
            Actividades
          </div>
          <div class="card-body">
            <p class="card-text">Administra las actividades aquí.</p>
            <a href="admact/menuact.php" class="btn btn-primary">Gestionar</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="card-header">
            Enfasis
          </div>
          <div class="card-body">
            <p class="card-text">Administra el enfasis aquí.</p>
            <a href="admenf/admin_enf.php" class="btn btn-primary">Gestionar</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="card-header">
            Bachilleratos
          </div>
          <div class="card-body">
            <p class="card-text">Administra el Bachillerato aquí.</p>
            <a href="admbach/admin_bach.php" class="btn btn-primary">Gestionar</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="card-header">
            Coordinadores
          </div>
          <div class="card-body">
            <p class="card-text">Administra los Coordinadores aquí.</p>
            <a href="admcoor/admin_coor.php" class="btn btn-primary">Gestionar</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="card-header">
            Curso
          </div>
          <div class="card-body">
            <p class="card-text">Administra el curso aquí.</p>
            <a href="admcurso/admin_curso.php" class="btn btn-primary">Gestionar</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="card-header">
            Secciones
          </div>
          <div class="card-body">
            <p class="card-text">Administra el Secciones.</p>
            <a href="admsecc/admin_secc.php" class="btn btn-primary">Gestionar</a>
          </div>
        </div>
      </div>
      
      </div>
    </div>
  </main>

  <footer class="bg-light text-center py-3 mt-5">
    <p>&copy; 2024 Infodrive. Todos los derechos reservados.</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

