<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Actualizar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container mt-5">
    <h2>Actualizar Producto</h2>

    <form action="<?= base_url('productos/actualizar/' . $producto['id_producto']) ?>" method="post">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="<?= esc($producto['nombre']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción:</label>
            <textarea id="descripcion" name="descripcion" class="form-control"><?= esc($producto['descripcion']) ?></textarea>
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio:</label>
            <input type="number" id="precio" name="precio" step="0.01" class="form-control" value="<?= esc($producto['precio']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stock:</label>
            <input type="number" id="stock" name="stock" class="form-control" value="<?= esc($producto['stock']) ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="<?= base_url('productos') ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>

