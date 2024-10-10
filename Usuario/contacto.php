    <?php
    // Conexión a la base de datos
    $host = 'localhost'; // Cambia esto si tu base de datos está en otro servidor
    $dbname = 'infodriveproyecto';
    $username = 'root'; // Cambia esto por tu usuario de MySQL
    $password = '2006'; // Cambia esto por tu contraseña de MySQL

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
    }

    // Manejo del envío del formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        // Preparar la consulta SQL
        $sql = "INSERT INTO mensajes (nombre, email, mensaje) VALUES (:name, :email, :message)";
        $stmt = $conn->prepare($sql);

        // Vincular los parámetros
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            $success_message = "¡Mensaje enviado con éxito!";
        } else {
            $error_message = "Error al enviar el mensaje.";
        }
    }
    ?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>¡Conéctate con Nosotros! - Colegio XYZ</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <style>
            body {
                background-color: #1c1c1c;
                font-family: 'Arial', sans-serif;
                padding-top: 3rem;
            }

            h2 {
                color: #ff4b5c;
                margin-bottom: 30px;
                text-transform: uppercase;
                letter-spacing: 1px;
                font-weight: bold;
            }
            .contact-section {
        text-align: center;
        padding: 20px;
        background-color: #f9f9f9;
    }

            .contact-form {
                background-color: #1c1c1c;
                border-radius: 10px;
                padding: 40px;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 1.1);
                transition: transform 0.3s;
            }

            .contact-form:hover {
                transform: scale(1.05);
            }

            .contact-info {
                margin-top: 30px;
                background-color: #1c1c1c;
                border-radius: 10px;
                padding: 30px;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 1.1);
                text-align: center;
                margin-bottom: 2rem;
                font-size: 1.2em;

            }
            .contact-info a {
        color: #007bff;
        text-decoration: none;
        word-break: break-word; /* Esto hace que el correo se divida en líneas si es muy largo */
    }

            .map-responsive {
                overflow: hidden;
                padding-top: 56.25%;
                position: relative;
                height: 0;
            }

            .map-responsive iframe {
                border: 0;
                height: 100%;
                width: 100%;
                position: absolute;
                top: 0;
                left: 0;
            }

            .button-group {
                display: flex;
                justify-content: space-between;
            }

            .btn-primary {
                background-color: #ff4b5c;
                border: none;
                transition: background-color 0.3s;
            }

            .btn-primary:hover {
                background-color: #ff4b5c;
            }

            .alert {
                border-radius: 5px;
            }

            footer {
                margin-top: 40px;
                text-align: center;
                color: #ff4b5c;
            }

            .icon {
                font-size: 20px;
                margin-right: 10px;
            }

            .section-title {
                color: #ff4b5c;
                margin-bottom: 15px;
                font-weight: bold;
                border-bottom: 2px solid #ff4b5c;
                padding-bottom: 5px;
            }

            .form-group {
                color: #fff;
            }

            .p {
                color: #fff;
                font-size: 1.2rem;
            }

            /* Estilos del botón Volver a Inicio */
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

            .btn-back-to-top i {
                margin-left: 8px;
            }
            .alert-success {
        background-color: #28a745;
        color: white;
        border: none;
        box-shadow: 0 5px 15px rgba(0, 255, 0, 0.4);
        font-weight: bold;
        text-align: center;
        opacity: 1;
        transition: opacity 0.5s ease-in-out;
    }

    .alert-success.fade-out {
        opacity: 0;
        transition: opacity 1s ease-in-out;
    }
    h2 {
        opacity: 0;
        transform: translateY(-20px);
        transition: opacity 0.7s ease, transform 0.7s ease;
        font-size: 2.5rem;
    }

    h2.animate {
        opacity: 1;
        transform: translateY(0);
    }
    .icon:hover {
        transform: scale(1.2);
        transition: transform 0.3s ease-in-out;
    }
    .btn-back-to-top.blink {
        animation: blink-animation 1.5s infinite;
    }

    @keyframes blink-animation {
        0% { opacity: 1; }
        50% { opacity: 0.6; }
        100% { opacity: 1; }
    }
    .map-responsive iframe:hover {
        transform: scale(1.05);
        transition: transform 0.3s ease;
    }
    body {
        background-color: #000;
        transition: background-color 2s ease-in-out;
    }

    body.loaded {
        background-color: #1c1c1c;
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
    /* Asegura que el iframe sea responsive */
    .map-container {
                position: relative;
                width: 100%;
                padding-bottom: 56.25%; /* Relación de aspecto 16:9 */
                height: 0;
                overflow: hidden;
            }

            .map-container iframe {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                border: 0;
            }

        </style>
    </head>

    <body>

        <div class="container mt-5">
        <h2 class="text-center glowing-text">¡Conéctate con Nosotros!</h2>
            <div class="row">
                <div class="col-md-6 contact-info">
                    <h4 class="section-title glowing-text"><i class="fas fa-info-circle icon"></i> Información de Contacto</h4>
                    <p class="p"><strong><i class="fas fa-map-marker-alt"></i> Dirección:</strong> JVF3+2GC, Dr. Venancio Pino, Caacupé 3000, Paraguay</p>
                    <p class="p"><strong><i class="fas fa-phone"></i> Teléfono:</strong> 0511 242 392</p>
                    <p class="p"><strong><i class="fas fa-envelope"></i> Email:</strong> <a href="mailto:Colegiomulticaaacupe@hotmail.com">Colegiomulticaaacupe@hotmail.com</a></p>
                    <div class="map-responsive">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3604.78443529004!2d-57.14763885054112!3d-25.378540121000515!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x945c331d5cba19a1%3A0x62be8a88bbb55254!2sColegio%20Nacional%20de%20Ense%C3%B1anza%20Media%20Diversificada%20Dr.%20Ra%C3%BAl%20Pe%C3%B1a%20Caacup%C3%A9!5e0!3m2!1ses-419!2sus!4v1727710176069!5m2!1ses-419!2sus" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-form">
                        <h4 class="section-title glowing-text"><i class="fas fa-envelope-open-text icon"></i> Envíanos un mensaje</h4>
                        <div class="form-group mb-4"> <!-- Añade clase 'mb-4' para más espacio abajo -->

                        <?php if (isset($success_message)): ?>
                            <div class="alert alert-success"><?php echo $success_message; ?></div>
                        <?php elseif (isset($error_message)): ?>
                            <div class="alert alert-danger"><?php echo $error_message; ?></div>
                        <?php endif; ?>

                        <form id="contactForm" action="" method="POST">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Correo Electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="message">Mensaje</label>
                                <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                            </div>
                            <div class="button-group">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Botón Volver a Inicio -->
        <div class="text-center my-5">
            <a href="../index.html" class="btn-back-to-top">Volver a Inicio <i class="fas fa-arrow-up"></i></a>
        </div>

        <footer>
            <p>&copy; Colegio Nacional de E.M.D Dr. Raúl Peña.</p>
        </footer>
        <script>
        // Efecto de fade-in para el formulario de contacto
        window.addEventListener('load', function () {
            const form = document.querySelector('.contact-form');
            form.style.opacity = 0;
            form.style.transform = 'translateY(20px)';
            setTimeout(() => {
                form.style.transition = 'opacity 0.6s, transform 0.6s';
                form.style.opacity = 1;
                form.style.transform = 'translateY(0)';
            }, 200);
        });
    </script>
    <script>
        // Animación de rebote en el botón "Enviar"
        document.querySelector('button[type="submit"]').addEventListener('click', function () {
            this.style.transition = 'transform 0.2s ease';
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = 'scale(1)';
            }, 150);
        });
        
    </script>
    <script>
        // Animación de desplazamiento suave al mapa
        document.querySelector('.map-link').addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector('.map-responsive').scrollIntoView({
                behavior: 'smooth'
            });
        });
        
    </script>
    <script>
        // Efecto de fade-in para el formulario de contacto
        window.addEventListener('load', function () {
            const form = document.querySelector('.contact-form');
            form.style.opacity = 0;
            form.style.transform = 'translateY(20px)';
            setTimeout(() => {
                form.style.transition = 'opacity 0.6s, transform 0.6s';
                form.style.opacity = 1;
                form.style.transform = 'translateY(0)';
            }, 200);
        });

        // Desaparición automática del mensaje de éxito
        window.addEventListener('load', function () {
            const successAlert = document.querySelector('.alert-success');
            if (successAlert) {
                setTimeout(() => {
                    successAlert.classList.add('fade-out');
                    setTimeout(() => {
                        successAlert.style.display = 'none';
                    }, 1000); // Tiempo para completar la animación de desvanecimiento
                }, 3000); // Tiempo antes de que comience a desaparecer (3 segundos)
            }
        });
        </script>

    <script>
        // Activar la animación del título cuando se carga la página
    window.addEventListener('load', function () {
        const title = document.querySelector('h2');
        title.classList.add('animate');
    });

    </script>
    <script>
    // Activar parpadeo del botón "Volver a Inicio" después de unos segundos
    window.setTimeout(function () {
        document.querySelector('.btn-back-to-top').classList.add('blink');
    }, 5000);
    </script>
    <script>
    // Cambiar el fondo de forma progresiva al cargar la página
    window.addEventListener('load', function () {
        document.body.classList.add('loaded');
    });
    </script>
    </body>
    </html>