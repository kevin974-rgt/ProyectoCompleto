<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Lista de Productos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <style>
        body {
            background: linear-gradient(to right, #f8fafc, #e9f0f4);
            padding: 2rem;
            font-family: 'Segoe UI', sans-serif;
        }

        .card {
            border-radius: 1rem;
            box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.08);
            padding: 2rem;
            background: white;
        }

        h2 {
            font-weight: 700;
            color: #0d6efd;
            text-align: center;
            margin-bottom: 2rem;
        }

        .table th {
            background-color: #f1f3f5;
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1.5rem;
        }

        .mensaje-success {
            text-align: center;
            font-weight: bold;
            color: green;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Título -->
        <h2><i class="bi bi-box-seam"></i> Productos Registrados</h2>

        <!-- Mensaje flash -->
        <?php if(session()->getFlashdata('mensaje')): ?>
            <div class="mensaje-success">
                <i class="bi bi-check-circle-fill me-2"></i>
                <?= session()->getFlashdata('mensaje') ?>
            </div>
        <?php endif; ?>

        <a href="<?= base_url('/usuarios') ?>" class="btn btn-secondary mb-3">
            <i class="bi bi-arrow-left"></i> Volver
        </a>

        <!-- Contenido en tarjeta -->
        <div class="card">
            <!-- Botones de acción -->
            <div class="btn-group mb-4">
                <a href="<?= base_url('compras/registrar') ?>" class="btn btn-primary">
                    <i class="bi bi-cart-plus"></i> Registrar Compra
                </a>
                <a href="<?= base_url('/productos/crear') ?>" class="btn btn-success">
                    <i class="bi bi-plus-circle"></i> Nuevo Producto
                </a>
            </div>

            <!-- Tabla de productos -->
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead>
         <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
         </tr>
                    </thead>

                        <?php foreach($productos as $producto): ?>
                            <tr>
    <td><?= esc($producto['id_producto']) ?></td>
    <td><?= esc($producto['nombre']) ?></td>
    <td>$<?= number_format($producto['precio'], 2) ?></td>
    <td><?= esc($producto['stock']) ?></td>
    <td>
        <a href="<?= base_url('productos/editar/' . $producto['id_producto']) ?>" class="btn btn-warning btn-sm">
            <i class="bi bi-pencil-square"></i> Editar
        </a>
    </td>
</tr>

                        <?php endforeach; ?>
                        <?php if (empty($productos)): ?>
                            <tr>
                                <td colspan="4" class="text-center text-muted">No hay productos registrados.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
