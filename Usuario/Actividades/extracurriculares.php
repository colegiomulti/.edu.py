<?php
// Conectar a la base de datos
include_once "../modelo/conexion.php";
$database = new Database();
$conexion = $database->getConnection();

// Consultar la información de la tabla `acte`
$query = "SELECT descripcion, lugar, fecha FROM acte";
$stmt = $conexion->prepare($query);
$stmt->execute();

// Verificar si se encontraron filas
$actividades = [];
if ($stmt->rowCount() > 0) {
    $actividades = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    // Manejo cuando no hay filas o hay un error
    $actividades = [
        [
            'descripcion' => 'Actividad no disponible',
            'lugar' => 'N/A',
            'fecha' => 'N/A'
        ]
    ];
}

// Array de imágenes, con rutas relativas
$imagenes = [
    '../img/primerdia.jpg',
    '../img/bienvenidaprimero.jpg',
    '../img/kanguro.jpg',
    '../img/misaaniversario.jpg',
    '../img/cem.jpg',
    '../img/festival.jpg',
    '../img/expo.jpg',
    '../img/sanjuan.png',
    '../img/ajedrez.jpg',
    '../img/missjeen.jpg',
    '../img/jeen.jpg',
    '../img/facen.jpg',
    '../img/omapa.jpg',
    '../img/ajedrezc.jpg',
    '../img/juventud.jpg',
    '../img/aguarandu.jpg',
    '../img/corsoflores.jpg',
    '../img/cablev.jpg',
   
    // Añadir tantas imágenes como sea necesario para cubrir todas las actividades
];

// Verificar si el número de imágenes es menor al número de actividades
if (count($imagenes) < count($actividades)) {
    // Rellenar el array con una imagen predeterminada si no hay suficientes imágenes
    $imagenes = array_pad($imagenes, count($actividades), 'img/default.jpg');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividades Extracurriculares</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Archivo CSS personalizado -->
    <link rel="stylesheet" href="ProyectoBorrador.css">

    <style>
        body {
            background-color: #1c1c1c;
            font-family: 'Arial', sans-serif;
            color: white;
        }

        .heading {
            font-size: 2.5rem;
            font-weight: bold;
            color: #ff4b5c;
            opacity: 0;
            transform: translateY(-20px);
            animation: fadeInMoveDown 1s ease forwards;
        }

        .card {
            background-color: #2c2c2c;
            border: 1px solid #ff4b5c;
            color: white;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(255, 75, 92, 0.5);
        }

        .card-img-top {
            border-bottom: 5px solid #ff4b5c;
            transition: transform 0.3s ease;
        }

        .card-img-top:hover {
            transform: scale(1.05);
        }

        .card-title {
            font-size: 1.5rem;
            color: #ff4b5c;
        }

        .card-text {
            font-size: 1.1rem;
        }

        .btn-back-to-top {
            display: inline-block;
            padding: 12px 20px;
            background-color: #ff4b5c;
            color: #fff;
            text-transform: uppercase;
            font-weight: bold;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.3s;
            box-shadow: 0 8px 15px rgba(255, 75, 92, 0.4);
        }

        .btn-back-to-top:hover {
            background-color: #e43e4d;
            transform: translateY(-3px);
            color: #fff;
        }

        a {
            color: white;
            text-decoration: none;
        }

        a:hover {
            color: #ff4b5c;
        }

        @keyframes fadeInMoveDown {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Ajustes para pantallas más grandes */
@media (min-width: 380px) {
    .content-wrapper h1 {
        font-size: 2.5rem; /* Ajusta el tamaño en pantallas grandes */
    }

    .content-wrapper h2 {
        font-size: 1rem; /* Ajusta el tamaño en pantallas grandes */
    }
}

@media (min-width: 486px) {
    .content-wrapper h1 {
        font-size: 2.8rem; /* Ajusta el tamaño en pantallas grandes */
    }

    .content-wrapper h2 {
        font-size: 1.5rem; /* Ajusta el tamaño en pantallas grandes */
    }
}
@media (min-width: 700px) {
    .content-wrapper h1 {
        font-size: 2.9rem; /* Ajusta el tamaño en pantallas grandes */
    }

    .content-wrapper h2 {
        font-size: 1.8rem; /* Ajusta el tamaño en pantallas grandes */
    }
}
@media (min-width: 723px) {
    .content-wrapper h1 {
        font-size: 3rem; /* Ajusta el tamaño en pantallas grandes */
    }

    .content-wrapper h2 {
        font-size: 1.9rem; /* Ajusta el tamaño en pantallas grandes */
    }
}
@media (min-width: 748px) {
    .content-wrapper h1 {
        font-size: 3.1rem; /* Ajusta el tamaño en pantallas grandes */
    }

    .content-wrapper h2 {
        font-size: 1.9rem; /* Ajusta el tamaño en pantallas grandes */
    }
}

@media (min-width: 768px) {
    .content-wrapper h1 {
        font-size: 3rem; /* Ajusta el tamaño en pantallas grandes */
    }

    .content-wrapper h2 {
        font-size: 1rem; /* Ajusta el tamaño en pantallas grandes */
    }
}
@media (min-width: 800px) {
    .content-wrapper h1 {
        font-size: 3.1rem; /* Ajusta el tamaño en pantallas grandes */
    }

    .content-wrapper h2 {
        font-size: 1.2rem; /* Ajusta el tamaño en pantallas grandes */
    }
}
@media (min-width: 1100px) {
    .content-wrapper h1 {
        font-size: 3.2rem; /* Ajusta el tamaño en pantallas grandes */
    }

    .content-wrapper h2 {
        font-size: 1.3rem; /* Ajusta el tamaño en pantallas grandes */
    }
}
    </style>
</head>
<body>
    <div class="container py-5">
        <h1 class="heading text-center mb-5">Actividades Extracurriculares</h1>
        <div class="row g-4">

            <!-- Iterar sobre las actividades obtenidas de la base de datos -->
            <?php foreach ($actividades as $index => $actividad): ?>
                <div class="col-md-4">
                    <div class="card">
                        <!-- Insertar la imagen correspondiente desde el array de imágenes -->
                        <img src="<?= htmlspecialchars($imagenes[$index]); ?>" class="card-img-top" alt="Imagen de <?= htmlspecialchars($actividad['descripcion']); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($actividad['descripcion']); ?></h5>
                            <p class="card-text">
                                Lugar: <?= htmlspecialchars($actividad['lugar']); ?><br>
                                Fecha: <?= htmlspecialchars($actividad['fecha']); ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
    <div class="text-center py-4">
        <a href="../../index.html" class="btn-back-to-top">Volver al Inicio</a>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>