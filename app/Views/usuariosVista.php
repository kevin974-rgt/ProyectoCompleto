<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Gestión de Usuarios</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <style>
        body {
            background: linear-gradient(135deg, #f0f4f8, #d9e2ec); 
            min-height: 100vh;
            padding: 2rem;
            font-family: 'Segoe UI', sans-serif;
        }

        .card {
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.05);
            border-radius: 0.75rem;
            padding: 1.5rem;
            background: white;
        }

        h2, h4 {
            font-weight: 600;
        }

        .btn {
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: scale(1.02);
        }

        /* Botón "Ir a Productos" personalizado */
        .btn-productos {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            padding: 2rem;
            height: 200px;
            width: 200px;
            border-radius: 1rem;
            margin: 2rem auto 0 auto;
            background: linear-gradient(to right, #0d6efd, #4a90e2);
            color: white;
            text-decoration: none;
        }

        .btn-productos i {
            font-size: 3rem;
            margin-bottom: 0.5rem;
        }

        .btn-productos:hover {
            background: linear-gradient(to right, #0b5ed7, #3f7dc6);
            transform: scale(1.05);
        }

        .btn-logout {
            display: block;
            margin: 2rem auto 0 auto;
            max-width: 220px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mb-4 text-center">Gestión de Usuarios</h2>

        <!-- Mensajes Flash -->
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <div class="row gy-4">
            <!-- Formulario de Registro -->
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
                        <button type="submit" class="btn btn-success w-100">
                            <i class="bi bi-person-plus"></i> Registrar
                        </button>
                    </form>
                </div>
            </div>

            <!-- Tabla de Usuarios -->
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
                            <?php if (!empty($usuarios)): ?>
                                <?php foreach ($usuarios as $user): ?>
                                    <tr>
                                        <td><?= esc($user['id']) ?></td>
                                        <td><?= esc($user['nombre']) ?></td>
                                        <td><?= esc($user['email']) ?></td>
                                        <td>
                                            <form method="post" action="<?= base_url('usuarios/eliminar/' . $user['id']) ?>" onsubmit="return confirm('¿Estás seguro de eliminar este usuario?');">
                                                <?= csrf_field() ?>
                                                <button type="submit" class="btn btn-danger btn-sm" <?= (count($usuarios) <= 1) ? 'disabled' : '' ?>>
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center">No hay usuarios registrados.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Botones principales muy juntos -->
<div class="d-flex justify-content-center flex-wrap my-4" style="gap: 0;">

    <!-- Botón Ir a Productos -->
    <a href="<?= base_url('productos') ?>" class="btn-productos">
        <i class="bi bi-box-seam"></i>
        <span>Ir a Productos</span>
    </a>

    <!-- Botón Ver Compras -->
    <a href="<?= base_url('compras/listar') ?>" class="btn-productos">
        <i class="bi bi-receipt"></i>
        <span>Ver Compras</span>
    </a>
</div>





        <!-- Botón Cerrar Sesión -->
        <a href="<?= base_url('login/logout') ?>" class="btn btn-secondary btn-logout text-center">
            <i class="bi bi-box-arrow-left me-2"></i> Cerrar sesión
        </a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
