<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    // Nombre de la tabla asociada en la base de datos
    protected $table = 'tbl_usuarios';

    // Clave primaria de la tabla
    protected $primaryKey = 'id';

    // Campos que se pueden insertar o actualizar mediante métodos como insert(), save(), update()
    protected $allowedFields = ['nombre', 'email', 'password'];

    // Desactiva el uso automático de campos created_at y updated_at
    protected $useTimestamps = false;

    // Puedes agregar reglas de validación si deseas validación automática antes de insertar
}
