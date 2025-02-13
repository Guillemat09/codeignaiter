<?php

namespace App\Models;

use CodeIgniter\Model;

class FestivalModel extends Model
{
    protected $table = 'festivales'; // Nombre de la tabla en la base de datos

    protected $primaryKey = 'id'; // Clave primaria de la tabla

    protected $useTimesLamps = true; 

    protected $allowedFields = ['nombre', 'descripcion', 'fecha_inicio','fecha_fin','lugar','created_at']; // Campos permitidos para inserción/actualización

}