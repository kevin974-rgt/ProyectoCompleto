<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;

class ProductoAPI extends ResourceController
{
    protected $modelName = 'App\Models\ProductoModel';
    protected $format = 'json';

    public function update($id = null)
    {
        $json = $this->request->getJSON(); // Captura datos JSON desde el cuerpo del PUT

        if (!$json) {
            return $this->fail('Datos inválidos o faltantes', 400);
        }

        $data = [
            'nombre' => $json->nombre ?? null,
            'precio' => $json->precio ?? null,
            'stock'  => $json->stock ?? null,
        ];

        // Intentar actualizar
        if ($this->model->update($id, $data)) {
            // Recuperar el registro actualizado
            $productoActualizado = $this->model->find($id);
            return $this->respond($productoActualizado, 200); // Status 200 OK
        }

        return $this->failServerError('Error al actualizar el producto');
    }
}
