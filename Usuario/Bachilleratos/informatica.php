<?php
// Conectar a la base de datos
include_once "../modelo/conexion.php";
$database = new Database();
$conexion = $database->getConnection();

// Consulta para la tabla de Bachilleratos (específicamente para Artes y Letras)
$query_bachillerato = "SELECT * FROM bachilleratos WHERE nombre = 'Informática'";
$stmt_bachillerato = $conexion->prepare($query_bachillerato);
$stmt_bachillerato->execute();
$bachillerato = $stmt_bachillerato->fetch(PDO::FETCH_ASSOC);

// Verificar si se encontró el bachillerato
if (!$bachillerato) {
    die("Error: Bachillerato no encontrado.");
}

// Consulta para la tabla de Coordinadores
$query_coordinadores = "SELECT * FROM coordinadores WHERE bachillerato_id = :bachillerato_id";
$stmt_coordinadores = $conexion->prepare($query_coordinadores);
$stmt_coordinadores->bindParam(':bachillerato_id', $bachillerato['id']);
$stmt_coordinadores->execute();
$coordinadores = $stmt_coordinadores->fetchAll(PDO::FETCH_ASSOC);

// Verificar si se encontraron coordinadores
if ($stmt_coordinadores->rowCount() === 0) {
    echo "No se encontraron coordinadores para el bachillerato de Informatica.<br>";
}

// Consulta para la tabla de Cursos
$query_cursos = "SELECT * FROM cursos WHERE bachillerato_id = :bachillerato_id";
$stmt_cursos = $conexion->prepare($query_cursos);
$stmt_cursos->bindParam(':bachillerato_id', $bachillerato['id']);
$stmt_cursos->execute();
$cursos = $stmt_cursos->fetchAll(PDO::FETCH_ASSOC);

// Verificar si se encontraron cursos
if ($stmt_cursos->rowCount() === 0) {
    echo "No se encontraron cursos para el bachillerato de Informatica.<br>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informática - Bachillerato</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <!-- Estilos personalizados -->
    <style>
    body {
        background-color: #1c1c1c; /* Gris oscuro en vez de negro */
        font-family: 'Arial', sans-serif;
        color: #ffffff; /* Texto blanco para mejor contraste */
    }

    .header {
        background: linear-gradient(135deg, #800020, #ff4b5c); /* Mantenemos el rojo para contraste */
        color: white;
        padding: 60px 0;
        text-align: center;
        box-shadow: 0 2px 20px rgba(0, 0, 0, 0.5); /* Sombra más suave */
        position: relative;
        overflow: hidden;
    }

    .header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(255, 255, 255, 0.05); /* Suavizar capa blanca */
        animation: pulse 20s infinite;
        z-index: 1;
    }

    @keyframes pulse {
        0% { transform: scale(1); opacity: 1; }
        50% { transform: scale(1.05); opacity: 0.7; }
        100% { transform: scale(1); opacity: 1; }
    }

    .header h1 {
        margin: 0;
        font-size: 3rem;
        text-transform: uppercase;
        position: relative;
        z-index: 2;
    }

    .card-header {
        background-color: #2d2d2d; /* Fondo gris oscuro para las tarjetas */
        color: #fff; /* Texto dorado para contraste */
    }

    .coordinator-card img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        border: 4px solid #ff4b5c; /* Contraste con el fondo oscuro */
        transition: transform 0.3s;
    }

    .coordinator-card:hover img {
        transform: scale(1.1);
    }

    .coordinator-card {
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3); /* Suavizar sombra */
        text-align: center;
        transition: transform 0.3s;
    }

    .coordinator-card:hover {
        transform: translateY(-10px);
    }

    .card {
        border: none;
        text-align: center;
        background-color: #2a2a2a; /* Fondo oscuro pero no completamente negro */
        color: #fff;
    }

    h2 {
        color: #ff4b5c; /* Rojo brillante que contrasta bien sobre gris oscuro */
        margin-bottom: 20px;
        text-align: center;
    }
    

    footer {
            background-color: #1c1c1c;
            color: #ff4b5c; /* Texto en rojo */
            padding: 10px 0;
            text-align: center;
            position: relative;
            bottom: 0;
            width: 100%;
        }
  .glowing-text {
    color: #fff; /* Color de la letra base */
    position: relative;
    background: linear-gradient(90deg, #8B0000, #FF6347, #ff4b5c, #8B0000); /* Rojo oscuro a rojo brillante a rojo base */
    background-size: 200% 200%;
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    animation: shine 3s linear infinite;
}

@keyframes shine {
    0% {
        background-position: 0% 50%;
    }
    100% {
        background-position: 200% 50%;
    }
}

    .accordion-button {
        background-color: #800020;
        color: white;
    }

    .accordion-button:not(.collapsed) {
        background-color: #620015;
        color: white;
    }

    .btn-back-to-top {
        background-color: #ff4b5c;
        border-color: #ff4b5c;
        color: white;
        font-size: 1.2rem;
        padding: 10px 20px;
        transition: background-color 0.3s, transform 0.3s;
    }

    .btn-back-to-top:hover {
        background-color: #800020;
        transform: scale(1.05);
    }
    .accordion-body{
        background-color: #2a2a2a;
        color: #fff
    
    }
    .coordinator-card img {
    width: 100%;
    height: auto; /* Mantiene la relación de aspecto */
    max-width: 120px; /* Tamaño máximo */
    border-radius: 50%;
    border: 4px solid #ff4b5c;
    transition: transform 0.3s;
}
@media (max-width: 768px) {
    .header h1 {
        font-size: 2rem; /* Tamaño de fuente más pequeño en móviles */
    }

    .glowing-text {
        font-size: 1.5rem; /* Tamaño de fuente más pequeño */
    }
}
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
        <!-- Encabezado del Bachillerato -->
        <div class="header mb-5">
        <h1>
            <i class="fas fa-desktop"></i> <!-- Icono de computadora de escritorio -->
            <?php echo htmlspecialchars($bachillerato['nombre']); ?>
        </h1>
        </div>

        <!-- Sección de Coordinadores -->
        <div class="row justify-content-center mb-5">
        <h2 class="glowing-text">Coordinadora</h2>
            <?php foreach ($coordinadores as $coordinador): ?>
                <div class="col-md-4 coordinator-card mb-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="../img/info.jpg" alt="Coordinador" />
                            <h4 class="card-title mt-3"><?php echo htmlspecialchars($coordinador['nombre']); ?></h4>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Sección de Cursos -->
        <div class="row justify-content-center mb-5">
        <h2 class="glowing-text">Cursos</h2>
            <?php foreach ($cursos as $curso): ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5><?php echo htmlspecialchars($curso['nombre']); ?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Plan de Estudios -->
    <section class="estudio">
        <div class="container">
        <h1 class="glowing-text text-center mb-5">Plan de Estudios Informática</h1>

            <div class="accordion" id="planEstudiosAccordion">
                <!-- Acordeón Primer Año -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Materias Primer Año
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#planEstudiosAccordion">
                        <div class="accordion-body">
                            <ul class="list-unstyled">
                            <li>Formación Ética y Ciudadana</li>
                               <li>Física</li>
                               <li>Algorítmica</li>
                               <li>Ciencias Naturales</li>
                               <li>Dibujo Técnico</li>
                               <li>Orientación Educacional y Sociolaboral</li>
                               <li>Química</li>
                               <li>Matemática Aplicada a Informática</li>
                               <li>Educación Física</li>
                               <li>Sociología y Antropología Cultural</li>
                               <li>Gabiente de Informática-Laboratorio</li>
                               <li>Matemática Común</li>
                               <li>Lengua Castellana</li>
                               <li>Historia y Geografia</li>
                               <li>Gabinete de Informática-Software</li>
                               <li>Lengua Extranjera</li>
                               <li>Guaraní</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Acordeón Segundo Año -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Materias Segundo Año
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#planEstudiosAccordion">
                        <div class="accordion-body">
                            <ul class="list-unstyled">
                            <li>Lengua Extranjera</li>
                             <li>Química</li>
                             <li>Gabinete de Informática-Laboratorio</li>
                             <li>Matemática Común</li>
                             <li>Matemática Aplicada a Informática</li>
                             <li>Lengua Castellana</li>
                             <li>Algorítmica</li>
                             <li>Física</li>
                             <li>Educación Física</li>
                             <li>Educación Vial</li>
                             <li>Ciencias Naturales</li>
                             <li>Guaraní</li>
                             <li>Historia y Geografia</li>
                             <li>Administración Financiera</li>
                             <li>Gabinete de Informática-Software</li>
                             <li>Gabinete de Informática-Hardware</li>


                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Acordeón Tercer Año -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Materias Tercer Año
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#planEstudiosAccordion">
                        <div class="accordion-body">
                            <ul class="list-unstyled">
                            <li>Algorítmica</li>
                                <li>Psicología</li>
                                <li>Matemática Aplicada a Informática</li>
                                <li>Gabiente de Informática-Laboratorio</li>
                                <li>Historia y Geografia</li>
                                <li>Desarrollo Personal y Social</li>
                                <li>Economía y Gestión</li>
                                <li>Ciencias Naturales</li>
                                <li>Lengua Castellana</li>
                                <li>Educación Física</li>
                                <li>Administración Financiera</li>
                                <li>Matemática Común</li>
                                <li>Plan Optativo</li>


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Botón Volver a Inicio -->
    <div class="text-center my-5">
        <a href="../../index.html" class="btn btn-back-to-top">Volver a Inicio <i class="fas fa-arrow-up"></i></a>
    </div>

    <!-- Pie de página -->
    <footer class="footer">
        <p>&copy; Colegio Nacional E.M.D. Dr. Raúl Peña. </p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>