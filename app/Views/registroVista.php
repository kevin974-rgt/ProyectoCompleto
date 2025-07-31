<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario</title>

    <!-- Incluye Bootstrap Icons desde CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Incluye Bootstrap 5 desde CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Estilo personalizado para los inputs con iconos */
        .input-with-icon {
            position: relative; /* Permite posicionar el icono sobre el input */
        }
        .input-with-icon i {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d; /* Color gris para el icono */
        }
        .input-with-icon input {
            padding-left: 2.5rem; /* Da espacio para que no se sobreponga el icono al texto */
        }
    </style>
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="height: 100vh;">
    
    <!-- Contenedor principal del formulario -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <!-- Tarjeta de Bootstrap que contiene el formulario -->
                <div class="card shadow">
                    <div class="card-header text-center bg-primary text-white">
                        <h3 class="mb-0">Registrar Usuario</h3>
                    </div>
                    <div class="card-body">

                        <!-- Verifica si hay un mensaje flash 'error' en la sesión y lo muestra -->
                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger">
                                <?= session()->getFlashdata('error') ?>
                            </div>
                        <?php endif; ?>

                        <!-- Formulario de registro -->
                        <form method="post" action="<?= base_url('login/guardar') ?>" novalidate>
                            
                            <!-- Campo: Nombre completo -->
                            <div class="mb-3 input-with-icon">
                                <i class="bi bi-person"></i> <!-- Icono de persona -->
                                <input type="text" class="form-control" name="nombre" placeholder="Nombre completo" required>
                            </div>

                            <!-- Campo: Correo electrónico -->
                            <div class="mb-3 input-with-icon">
                                <i class="bi bi-envelope"></i> <!-- Icono de sobre (email) -->
                                <input type="email" class="form-control" name="email" placeholder="Correo electrónico" required>
                            </div>

                            <!-- Campo: Contraseña -->
                            <div class="mb-3 input-with-icon">
                                <i class="bi bi-lock"></i> <!-- Icono de candado -->
                                <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
                            </div>

                            <!-- Botón de envío del formulario -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Registrarse</button>
                            </div>
                        </form>

                        <!-- Enlace para ir a la página de inicio de sesión -->
                        <div class="text-center mt-3">
                            <p>¿Ya tienes una cuenta? 
                                <a href="<?= base_url('/') ?>" class="text-decoration-none fw-semibold">Inicia sesión aquí</a>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Scripts de Bootstrap (JS) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
