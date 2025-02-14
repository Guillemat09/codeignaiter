<?php

namespace App\Models;

use CodeIgniter\Model;

class EntradaModel extends Model
{
    protected $table = 'entradas'; // Nombre de la tabla en la base de datos

    protected $primaryKey = 'id'; // Clave primaria de la tabla

    protected $useTimesLamps = true; 

    protected $allowedFields = ['usuario_id', 'festival_id', 'tipo_entrada', 'precio', 'fecha_compra']; // Campos permitidos para inserción/actualización

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
