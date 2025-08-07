<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Registrar Compra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="p-4">
    <div class="container">
        <h2>Registrar Compra</h2>

        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <?php if(session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <form action="<?= base_url('compras/guardar') ?>" method="post">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label for="id_producto" class="form-label">Producto</label>
                <select id="id_producto" name="id_producto" class="form-select" required>
                    <option value="" selected disabled>Seleccione un producto</option>
                    <?php foreach($productos as $producto): ?>
                        <option value="<?= $producto['id_producto'] ?>">
                            <?= esc($producto['nombre']) ?> - $<?= number_format($producto['precio'], 2) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="number" id="cantidad" name="cantidad" class="form-control" min="1" required />
            </div>

            <button type="submit" class="btn btn-primary">Registrar Compra</button>
        </form>
    </div>
</body>
</html>
