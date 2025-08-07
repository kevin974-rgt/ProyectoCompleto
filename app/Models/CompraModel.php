<?php

namespace App\Models;

use CodeIgniter\Model;

class CompraModel extends Model
{
    protected $table = 'compras';
    protected $primaryKey = 'id_compra';
    protected $allowedFields = ['id_producto', 'cantidad', 'fecha'];

    // Insertar compra usando SP_INSERT_COMPRA
    public function insertarCompraSP($id_producto, $cantidad)
    {
        $db = \Config\Database::connect();
        $query = $db->query("CALL SP_INSERT_COMPRA(?, ?)", [$id_producto, $cantidad]);
        return $query;
    }


    public function actualizarStockSP($id_producto, $cantidad)
{
    $db = \Config\Database::connect();
    $builder = $db->query("CALL SP_UPDATE_STOCK(?, ?)", [$id_producto, $cantidad]);
}

}
