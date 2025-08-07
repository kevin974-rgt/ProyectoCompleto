<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Compras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Listado de Compras</h2>
        <a href="<?= base_url('/usuarios') ?>" class="btn btn-secondary mb-3">
            <i class="bi bi-arrow-left"></i> Volver
        </a>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID Compra</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($compras)) : ?>
                    <?php foreach ($compras as $compra) : ?>
                        <tr>
                            <td><?= esc($compra['id_compra']) ?></td>
                            <td><?= esc($compra['nombre_producto']) ?></td>
                            <td><?= esc($compra['cantidad']) ?></td>
                            <td><?= esc($compra['fecha']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="4" class="text-center">No hay compras registradas.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
