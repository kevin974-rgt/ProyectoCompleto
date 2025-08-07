<?php

namespace App\Models;

use CodeIgniter\Model;

class VentaModel extends Model
{
    protected $table = 'ventas';
    protected $primaryKey = 'id_venta';
    protected $allowedFields = ['id_producto', 'cantidad'];

    // Registrar venta usando SP
    public function registrarVentaSP($id_producto, $cantidad)
    {
        $sql = "CALL SP_INSERT_VENTA(?, ?)";
        return $this->db->query($sql, [$id_producto, $cantidad]);
    }

    // Obtener todas las ventas
    public function obtenerVentas()
    {
        return $this->findAll();
    }
}
