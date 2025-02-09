<?php

namespace App\Models;

use CodeIgniter\Model;

class EntradaModel extends Model
{
    protected $table      = 'entradas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['usuario_id', 'festival_id', 'precio', 'estado'];
}
