<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\ProductoModel;

class ProductoApi extends ResourceController
{
    protected $model;

    public function __construct()
    {
        $this->model = new ProductoModel();
    }

    public function index()
    {
        $productos = $this->model->obtenerProductosSP();
        return $this->respond($productos, 200);
    }


    public function create()
{
    $data = $this->request->getJSON(true);
    $this->model->insertarProductoSP($data['nombre'], $data['precio'], $data['stock']);
    return $this->respondCreated(['mensaje' => 'Producto creado correctamente']);
}

public function delete($id = null)
{
    $this->model->eliminarProductoSP($id);
    return $this->respondDeleted(['mensaje' => 'Producto eliminado correctamente']);
}

public function update($id = null)
{
    $data = $this->request->getJSON(true);
    $this->model->actualizarProductoSP($id, $data['nombre'], $data['precio'], $data['stock']);
    return $this->respond(['mensaje' => 'Producto actualizado'], 200);
}



}
