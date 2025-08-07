<?php

namespace App\Controllers;

use App\Models\ProductoModel;
use App\Models\CompraModel;

class Compras extends BaseController
{
    protected $productoModel;
    protected $compraModel;

    public function __construct()
    {
        $this->productoModel = new ProductoModel();
        $this->compraModel = new CompraModel();
    }

    // Mostrar formulario para registrar compra
    public function registrar()
    {
        $data['productos'] = $this->productoModel->obtenerProductos();
        return view('compras/registrar', $data);
    }

    // Guardar compra (recibir post)
    public function guardar()
    {
        $id_producto = $this->request->getPost('id_producto');
        $cantidad = $this->request->getPost('cantidad');

        if (!$id_producto || !$cantidad) {
            return redirect()->back()->with('error', 'Complete todos los campos');
        }

        $this->compraModel->insertarCompraSP($id_producto, $cantidad);

        return redirect()->to('/compras/registrar')->with('success', 'Compra registrada correctamente');
    }

    public function listar()
{
    $db = \Config\Database::connect();
    $builder = $db->table('compras');
    $builder->select('compras.id_compra, compras.id_producto, compras.cantidad, compras.fecha, productos.nombre as nombre_producto');
    $builder->join('productos', 'productos.id_producto = compras.id_producto');
    $query = $builder->get();
    $data['compras'] = $query->getResultArray();

    return view('compras/listar', $data);
}

}
