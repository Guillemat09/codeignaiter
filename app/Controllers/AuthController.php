<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RolModel;

class AuthController extends BaseController
{
    public function login()
    {
        helper(['form']);
        if ($this->request->getMethod() == 'POST') {
            $session = session();
            $model = new UserModel();
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');
            $data = $model->where('email', $email)->first(); // Obtener usuario por email
            
            if ($data) {
                if (password_verify($password, $data['password'])) { // Verificación segura
                    $sessionData = [
                        'id' => $data['id'],
                        'name' => $data['name'],
                        'email' => $data['email'],
                        'role' => $data['role_id'],
                        'isLoggedIn' => TRUE
                    ];
                    $session->set($sessionData);
                    return redirect()->to('/principal');
                } else {
                    $session->setFlashdata('error', 'Contraseña incorrecta.');
                    return redirect()->to('/login');
                }
            } else {
                $session->setFlashdata('error', 'Email no encontrado.');
                return redirect()->to('/login');
            }
        }
        return view('login');
    }

    public function register()
    {
        helper(['form']);
        $rolModel = new RolModel();
        $data['roles'] = $rolModel->findAll();

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'name' => 'required|min_length[3]|max_length[100]',
                'email' => 'required|min_length[6]|max_length[100]|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[8]|max_length[255]',
                'password_confirm' => 'required|matches[password]',
                'role' => 'required'
            ];

            if ($this->validate($rules)) {
                $model = new UserModel();
                $data = [
                    'name' => $this->request->getPost('name'),
                    'email' => $this->request->getPost('email'),
                    'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                    'role_id' => $this->request->getPost('role')
                ];
                $model->insert($data); // Usar insert() para evitar problemas con id automáticos
                session()->setFlashdata('success', 'Registro exitoso. Puedes iniciar sesión.');
                return redirect()->to('/login');
            } else {
                $data['validation'] = $this->validator;
            }
        }

        return view('register', $data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
