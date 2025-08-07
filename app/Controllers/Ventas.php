<?php

namespace App\Controllers;

use App\Models\VentaModel;
use App\Models\ProductoModel;

class Ventas extends BaseController
{
    protected $ventaModel;
    protected $productoModel;

    public function __construct()
    {
        $this->ventaModel = new VentaModel();
        $this->productoModel = new ProductoModel();
    }

    // Mostrar formulario para registrar venta
    public function crear()
    {
        $data['productos'] = $this->productoModel->obtenerProductos();
        return view('ventas/crear', $data);
    }

    // Guardar venta (llama al SP)
    public function guardar()
    {
        $id_producto = $this->request->getPost('id_producto');
        $cantidad = $this->request->getPost('cantidad');

        try {
            $this->ventaModel->registrarVentaSP($id_producto, $cantidad);
            return redirect()->to('/ventas/crear')->with('mensaje', 'Venta registrada correctamente');
        } catch (\Exception $e) {
            return redirect()->to('/ventas/crear')->with('error', $e->getMessage());
        }
    }
}
