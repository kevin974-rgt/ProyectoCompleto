<?php
require_once("../conexion/conexion.php");

// Verificar si se recibió el ID del producto por GET
if (!isset($_GET['id'])) {
    echo "Producto no especificado.";
    exit();
}

$id_producto = $_GET['id'];

// Consultar los datos actuales del producto
$sql = "SELECT * FROM productos WHERE id_producto = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_producto);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 0) {
    echo "Producto no encontrado.";
    exit();
}

$producto = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2>Editar Producto</h2>
    <form action="actualizar.php" method="post">
        <input type="hidden" name="id_producto" value="<?php echo $producto['id_producto']; ?>">

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Producto</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $producto['nombre']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" name="precio" id="precio" class="form-control" value="<?php echo $producto['precio']; ?>" step="0.01" required>
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" name="stock" id="stock" class="form-control" value="<?php echo $producto['stock']; ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="../productos/index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
