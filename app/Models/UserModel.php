<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users'; // Nombre de la tabla en la base de datos

    protected $primaryKey = 'id'; // Clave primaria de la tabla

    protected $useTimesLamps = true; 

    protected $allowedFields = ['name', 'email', 'password','created_at','role']; // Campos permitidos para inserción/actualización

    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }
}
