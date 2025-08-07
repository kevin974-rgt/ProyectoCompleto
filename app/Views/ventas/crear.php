<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Venta</title>
</head>
<body>
    <h2>Registrar Venta</h2>

    <?php if(session()->getFlashdata('mensaje')): ?>
        <p style="color:green;"><?= session()->getFlashdata('mensaje') ?></p>
    <?php endif; ?>

    <?php if(session()->getFlashdata('error')): ?>
        <p style="color:red;"><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>

    <form action="<?= base_url('/ventas/guardar') ?>" method="post">
        <label>Producto:</label>
        <select name="id_producto" required>
            <option value="">Seleccione un producto</option>
            <?php foreach($productos as $producto): ?>
                <option value="<?= $producto['id_producto'] ?>"><?= $producto['nombre'] ?> (Stock: <?= $producto['stock'] ?>)</option>
            <?php endforeach; ?>
        </select><br><br>

        <label>Cantidad:</label>
        <input type="number" name="cantidad" min="1" required><br><br>

        <button type="submit">Registrar Venta</button>
    </form>

    <a href="<?= base_url('/') ?>">Inicio</a>
</body>
</html>
