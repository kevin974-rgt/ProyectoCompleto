<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Registrar Producto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <style>
        body {
            background: linear-gradient(to right, #eef2f7, #ffffff);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .form-container {
            width: 100%;
            max-width: 500px;
            background-color: white;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 1rem 2rem rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #0d6efd;
            font-weight: bold;
        }

        .btn-primary {
            width: 100%;
            font-weight: bold;
        }

        .back-link {
            display: block;
            margin-top: 1.5rem;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2><i class="bi bi-box"></i> Registrar Producto</h2>

        <!-- Mensaje de éxito -->
        <?php if(session()->getFlashdata('mensaje')): ?>
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                <?= session()->getFlashdata('mensaje') ?>
            </div>
        <?php endif; ?>

        <!-- Formulario -->
        <form action="<?= base_url('/productos/guardar') ?>" method="post" novalidate>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del producto</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required />
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio ($)</label>
                <input type="number" step="0.01" name="precio" id="precio" class="form-control" required />
            </div>

            <div class="mb-4">
                <label for="stock" class="form-label">Stock disponible</label>
                <input type="number" name="stock" id="stock" class="form-control" required />
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Guardar Producto
            </button>
        </form>

        <!-- Volver -->
        <a href="<?= base_url('/productos') ?>" class="back-link text-decoration-none text-secondary">
            <i class="bi bi-arrow-left-circle"></i> Volver al listado
        </a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

