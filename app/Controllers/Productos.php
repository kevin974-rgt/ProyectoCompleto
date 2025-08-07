<?php

namespace App\Controllers;

use App\Models\ProductoModel;

class Productos extends BaseController
{
    protected $productoModel;

    public function __construct()
    {
        $this->productoModel = new ProductoModel();
    }

    // Mostrar lista de productos
    public function index()
    {
        $data['productos'] = $this->productoModel->obtenerProductos();
        return view('productos/index', $data);
    }

    // Mostrar formulario para crear producto
    public function crear()
    {
        return view('productos/crear');
    }

    // Guardar producto (llama al SP)
    public function guardar()
    {
        $nombre = $this->request->getPost('nombre');
        $precio = $this->request->getPost('precio');
        $stock = $this->request->getPost('stock');

        $this->productoModel->insertarProductoSP($nombre, $precio, $stock);

        return redirect()->to('/productos')->with('mensaje', 'Producto registrado correctamente');
    }


   // En app/Controllers/Productos.php

public function editar($id = null)
{
    $producto = $this->productoModel->find($id);

    if (!$producto) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Producto no encontrado: $id");
    }

    $data['producto'] = $producto;
    return view('productos/actualizar', $data);
}

public function actualizar($id = null)
{
    $producto = $this->productoModel->find($id);

    if (!$producto) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Producto no encontrado: $id");
    }

    $datos = [
        'nombre' => $this->request->getPost('nombre'),
        'descripcion' => $this->request->getPost('descripcion'),
        'precio' => $this->request->getPost('precio'),
        'stock' => $this->request->getPost('stock'),
    ];

    $this->productoModel->update($id, $datos);

    return redirect()->to(base_url('productos'))->with('mensaje', 'Producto actualizado correctamente');
}





}
