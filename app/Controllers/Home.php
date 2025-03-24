<?php

namespace App\Controllers;

use App\Models\RolModel;
use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function principal()
    {
        $session = session();
        $rolModel = new RolModel();

        // Verificar si la sesión tiene los valores antes de acceder a ellos
        $name = $session->get('name') ?? 'Invitado';
        $email = $session->get('email') ?? 'Sin correo';

        // Buscar el rol en la base de datos
        $rol = $rolModel->find($session->get('role'));
        $rolNombre = $rol['nombre'] ?? 'Sin rol'; // Evitar errores si no se encuentra el rol

        $data = [
            'name' => $name,
            'email' => $email,
            'rol' => $rolNombre,
            'mensajeflash' => $session->get('mensajeflash'),
        ];

        return view('principal', $data);
    }

    public function getUsers()
    {
        $userModel = new UserModel();
        $users = $userModel->findAll();
        return view('user_list', ['users' => $users]);
    }

    public function create()
    {
        $session = session();
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'name' => 'required|min_length[3]|max_length[50]',
                'email' => 'required|valid_email|is_unique[users.email]',
            ];

            $messages = [
                'name' => [
                    'required' => 'El nombre es obligatorio.',
                    'min_length' => 'El nombre debe tener al menos 3 caracteres.',
                    'max_length' => 'El nombre no puede tener más de 50 caracteres.',
                ],
                'email' => [
                    'required' => 'El email es obligatorio.',
                    'valid_email' => 'El email no es válido.',
                    'is_unique' => 'El email ya está en uso.',
                ],
            ];

            if (!$this->validate($rules, $messages)) {
                return view('create_user', ['validation' => $this->validator]);
            } else {
                $userModel = new UserModel();
                
                // Sanitizar los datos antes de guardar
                $userData = [
                    'name' => esc($this->request->getPost('name')),
                    'email' => esc($this->request->getPost('email')),
                ];

                $userModel->save($userData);
                return redirect()->to('/home');
            }
        }

        return view('create_user');
    }
}
