<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id_producto';
    protected $allowedFields = ['nombre', 'descripcion', 'precio', 'stock'];

    // Obtener todos los productos
    public function obtenerProductos()
    {
        return $this->findAll();
    }

    // Insertar producto usando SP
    public function insertarProductoSP($nombre, $precio, $stock)
    {
        $db = \Config\Database::connect();
        $query = $db->query("CALL SP_INSERT_PRODUCTO(?, ?, ?)", [$nombre, $precio, $stock]);
        return $query;
    }


    public function obtenerProductosSP()
    {
    $db = \Config\Database::connect();
    $query = $db->query("CALL SP_OBTENER_PRODUCTOS()");
    return $query->getResultArray();
    }

    public function eliminarProductoSP($id)
    {
    $db = \Config\Database::connect();
    return $db->query("CALL SP_ELIMINAR_PRODUCTO(?)", [$id]);
    }


    public function actualizarProductoSP($id, $nombre, $precio, $stock)
{
    $db = \Config\Database::connect();
    return $db->query("CALL SP_ACTUALIZAR_PRODUCTO(?, ?, ?, ?)", [$id, $nombre, $precio, $stock]);
}





}

