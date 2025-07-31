<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard</title>

    <!-- Carga de Bootstrap 5 desde CDN para estilos modernos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <!-- Contenedor principal con espaciado vertical -->
    <div class="container py-5">
        <!-- Alerta de bienvenida con estilo de éxito -->
        <div class="alert alert-success" role="alert">
            <!-- Saludo personalizado con el nombre de la sesión -->
            <h4 class="alert-heading">¡Hola, <?= esc(session('usuario')) ?>!</h4>
            <p>Has ingresado correctamente al sistema.</p>
            <hr>
            <!-- Botón para cerrar sesión que redirige a login/logout -->
            <a href="<?= base_url('login/logout') ?>" class="btn btn-danger">
                <!-- Icono de Bootstrap (si estuviera habilitado con Bootstrap Icons) -->
                <i class="bi bi-box-arrow-right"></i> Cerrar sesión
            </a>
        </div>
    </div>

    <!-- JS de Bootstrap para interactividad (opcional si no usas modales, etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

