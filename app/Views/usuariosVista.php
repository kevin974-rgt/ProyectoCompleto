<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Configuración básica del documento HTML -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Gestión de Usuarios</title>

    <!-- Inclusión del CSS de Bootstrap desde CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Inclusión de iconos de Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Estilos personalizados -->
    <style>
        body {
            background: #f8f9fa; /* Color de fondo gris claro */
            min-height: 100vh;   /* Altura mínima: toda la pantalla */
            padding: 2rem;
        }
        .card {
            box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,0.075); /* Sombra ligera */
            border-radius: 0.5rem; /* Bordes redondeados */
            padding: 1.5rem;
            background: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Título principal -->
        <h2 class="mb-4">Gestión de Usuarios</h2>

        <!-- Mensaje de error si hay algún flashdata de error -->
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <!-- Mensaje de éxito si hay algún flashdata de success -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <div class="row gy-4">
            <!-- Formulario para registrar nuevos usuarios -->
            <div class="col-md-5">
                <div class="card">
                    <h4>Registrar Nuevo Usuario</h4>
                    <form action="<?= base_url('usuarios/registrar') ?>" method="post" novalidate>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre completo</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required />
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" required />
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required />
                        </div>

                        <!-- Botón para registrar usuario -->
                        <button type="submit" class="btn btn-success w-100">
                            <i class="bi bi-person-plus"></i> Registrar
                        </button>
                    </form>
                </div>
            </div>

            <!-- Tabla de usuarios existentes -->
            <div class="col-md-7">
                <div class="card">
                    <h4>Usuarios Existentes</h4>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Verifica si hay usuarios disponibles -->
                            <?php if (!empty($usuarios)): ?>
                                <!-- Itera sobre cada usuario y lo muestra en una fila -->
                                <?php foreach ($usuarios as $user): ?>
                                    <tr>
                                        <td><?= esc($user['id']) ?></td>
                                        <td><?= esc($user['nombre']) ?></td>
                                        <td><?= esc($user['email']) ?></td>
                                        <td>
                                            <!-- Formulario para eliminar usuario -->
                                            <form method="post" action="<?= base_url('usuarios/eliminar/' . $user['id']) ?>" onsubmit="return confirm('¿Estás seguro de eliminar este usuario?');">
                                                <?= csrf_field() ?> <!-- Protección CSRF -->
                                                <!-- Botón eliminar (deshabilitado si hay solo un usuario) -->
                                                <button type="submit" class="btn btn-danger btn-sm" <?= (count($usuarios) <= 1) ? 'disabled' : '' ?>>
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <!-- Mensaje cuando no hay usuarios -->
                                <tr>
                                    <td colspan="4" class="text-center">No hay usuarios registrados.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Botón para cerrar sesión -->
        <div class="mt-4">
            <a href="<?= base_url('login/logout') ?>" class="btn btn-secondary">
                <i class="bi bi-box-arrow-left"></i> Cerrar sesión
            </a>
        </div>
    </div>

    <!-- Scripts de Bootstrap (JS + Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
