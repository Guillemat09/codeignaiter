<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'usuarios';  // La tabla en la base de datos
    protected $primaryKey = 'id';  // La clave primaria
    protected $allowedFields = ['name', 'email'];  // Campos que se pueden insertar/actualizar
    protected $useTimestamps = true;  // Usar marcas de tiempo
}
