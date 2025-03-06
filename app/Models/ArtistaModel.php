<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtistaModel extends Model
{
    protected $table = 'artistas'; // Nombre de la tabla en la base de datos

    protected $primaryKey = 'id'; // Clave primaria de la tabla

    protected $useTimesLamps = true; 

    protected $allowedFields = ['nombre', 'descripcion', 'genero','is_active', 'created_at']; // Campos permitidos para inserción/actualización

    // Añadir filtros
    public function filter($filters)
    {
        foreach ($filters as $key => $value) {
            if (!empty($value)) {
                $this->like($key, $value);
            }
        }
        return $this;
    }
}



