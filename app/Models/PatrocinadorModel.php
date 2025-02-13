<?php

namespace App\Models;

use CodeIgniter\Model;

class PatrocinadorModel extends Model
{
    protected $table = 'patrocinadores'; // Nombre de la tabla en la base de datos

    protected $primaryKey = 'id'; // Clave primaria de la tabla

    protected $useTimesLamps = true; 

    protected $allowedFields = ['nombre', 'descripcion', 'contacto','festival_id','created_at']; // Campos permitidos para inserción/actualización

}