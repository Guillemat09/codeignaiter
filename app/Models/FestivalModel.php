<?php

namespace App\Models;

use CodeIgniter\Model;

class FestivalModel extends Model
{
    protected $table      = 'festivales';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'fecha_inicio', 'fecha_fin', 'ubicación', 'descripción'];
}
