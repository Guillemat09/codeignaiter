<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id'; // Clave primaria de la tabla
    protected $useTimestamps = true; // Corrección del uso de timestamps

    protected $allowedFields = ['name', 'email', 'password', 'role_id', 'created_at', 'updated_at']; // Corrección en los campos permitidos

    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }
}

