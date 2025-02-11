<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class UserController extends BaseController
{
    public function index()
    {
        // Crear instancia del modelo
        $userModel = new UserModel();

        // Obtener todos los usuarios
        $data['usuarios'] = $userModel->findAll();

        // Pasar los datos a la vista
        return view('user_list', $data);
    }
}
