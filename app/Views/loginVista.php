<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Configuración del documento -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Iniciar Sesión</title>

    <!-- Bootstrap CSS desde CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Íconos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Estilos personalizados para centrar la tarjeta -->
    <style>
        body {
            background: #f8f9fa; /* Fondo claro */
            min-height: 100vh;   /* Altura completa de la ventana */
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            width: 100%;
            max-width: 420px; /* Tamaño máximo de la tarjeta */
            padding: 1.5rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075); /* Sombra ligera */
            border-radius: 0.5rem;
        }
        /* Estilo para íconos dentro de los campos */
        .form-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
        }
        .input-with-icon {
            position: relative;
        }
        .input-with-icon input {
            padding-left: 2.5rem; /* Espacio para el ícono */
        }
    </style>
</head>
<body>

    <!-- Tarjeta central para el formulario -->
    <div class="card bg-white">
        <h3 class="text-center mb-4 fw-bold">Iniciar Sesión</h3>

        <!-- Mensaje de error si lo hay (flashdata) -->
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <!-- Mensaje de éxito si lo hay (flashdata) -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <!-- Formulario de inicio de sesión -->
        <form method="post" action="<?= base_url('login/autenticar') ?>" novalidate>
            <!-- Campo de correo con ícono -->
            <div class="mb-3 input-with-icon">
                <i class="bi bi-envelope form-icon"></i>
                <input type="email" class="form-control" name="email" placeholder="Correo electrónico" required autofocus />
            </div>

            <!-- Campo de contraseña con ícono -->
            <div class="mb-4 input-with-icon">
                <i class="bi bi-lock form-icon"></i>
                <input type="password" class="form-control" name="password" placeholder="Contraseña" required />
            </div>

            <!-- Botón de envío -->
            <button type="submit" class="btn btn-primary w-100">
                <i class="bi bi-box-arrow-in-right me-2"></i> Ingresar
            </button>
        </form>

        <hr />
        <!-- Aquí podrías poner un enlace a "¿No tienes cuenta? Registrarse", si lo deseas -->
    </div>

    <!-- JavaScript de Bootstrap (incluye Popper para funcionalidad completa) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

