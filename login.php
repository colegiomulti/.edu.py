<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc); /* Fondo degradado atractivo */
            color: #fff;
            font-family: 'Arial', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            background: rgba(255, 255, 255, 0.9); /* Fondo blanco semi-translúcido */
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
            font-size: 1.5rem;
            font-weight: bold;
            border-bottom: 1px solid #e0e0e0;
            text-align: center;
        }
        .card-body {
            padding: 2rem;
        }
        .form-control {
            border-radius: 5px;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, border-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #00408a;
        }
        .alert {
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-header">Inicio de Sesión</div>
                    <div class="card-body">
                        <form action="login.php" method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Usuario</label>
                                <input type="text" class="form-control" name="username" id="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
                        </form>
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            include "modelo/conexion.php";
                            $database = new Database();
                            $db = $database->getConnection();

                            $username = $_POST['username'];
                            $password = md5($_POST['password']);

                            $query = "SELECT * FROM usuarios WHERE usuario = ? AND contrasena = ? LIMIT 1";
                            $stmt = $db->prepare($query);
                            $stmt->bindParam(1, $username);
                            $stmt->bindParam(2, $password);
                            $stmt->execute();

                            if ($stmt->rowCount() > 0) {
                                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                $_SESSION['user_id'] = $row['id'];
                                $_SESSION['role'] = $row['rol'];
                                header("Location: index.php");
                                exit();
                            } else {
                                echo "<div class='alert alert-danger mt-3'>Usuario o contraseña incorrectos</div>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-7Q+8kK/4f0l0VfLqLRq9d6A0JHcibzE0lS5uC8Gzqz8FfEJq6ZsG8NfVAMj8cEJf" crossorigin="anonymous"></script>
</body>
</html>


