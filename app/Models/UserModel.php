<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id'; // Clave primaria de la tabla
    protected $useTimestamps = true; // Corrección del uso de timestamps

    protected $allowedFields = ['name', 'email', 'password', 'role_id', 'created_at', 'is_active','updated_at']; // Corrección en los campos permitidos

    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    public function filter($filters)
    {
        foreach ($filters as $key => $value) {
            if (!empty($value)) {
                $this->like($key, $value); // Asegúrate de que el método 'like' exista y funcione correctamente.
            }
        }
        return $this;
    }
}

