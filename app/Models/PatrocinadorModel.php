<?php

namespace App\Models;

use CodeIgniter\Model;

class PatrocinadorModel extends Model
{
    protected $table = 'patrocinadores'; // Nombre de la tabla en la base de datos

    protected $primaryKey = 'id'; // Clave primaria de la tabla

    protected $useTimesLamps = true; 

    protected $allowedFields = ['nombre', 'descripcion', 'contacto', 'festival_id', 'created_at', 'is_active']; // Campos permitidos para inserción/actualización

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
