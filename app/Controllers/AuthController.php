<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RolModel;
use CodeIgniter\Controller;

class AuthController extends BaseController
{
    public function login()
    {
        helper(['form']);
        
        if ($this->request->getMethod() == 'post') {
            $session = session();
            $model = new UserModel();
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');
            $data = $model->where('email', $email)->first();

            if (!$data) {
                $session->setFlashdata('error', 'Email no encontrado.');
                return redirect()->to('/login');
            }

            if (!password_verify($password, $data['password'])) {
                $session->setFlashdata('error', 'Contraseña incorrecta.');
                return redirect()->to('/login');
            }

            // Guardar datos en sesión
            $sessionData = [
                'id' => $data['id'],
                'name' => $data['name'],
                'email' => $data['email'],
                'role' => $data['role_id'],
                'isLoggedIn' => true
            ];
            $session->set($sessionData);

            log_message('info', 'Usuario autenticado correctamente: ' . $data['email']);
            return redirect()->to('/principal');
        }

        return view('principal');
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

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                return view('register', $data);
            }

            $model = new UserModel();
            $passwordHash = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

            $userData = [
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'password' => $passwordHash,
                'role_id' => $this->request->getPost('role')
            ];

            if ($model->insert($userData)) {
                log_message('info', 'Usuario registrado correctamente: ' . $userData['email']);
                session()->setFlashdata('success', 'Registro exitoso. Puedes iniciar sesión.');
                return redirect()->to('/login');
            } else {
                log_message('error', 'Error al registrar usuario: ' . json_encode($userData));
                session()->setFlashdata('error', 'Hubo un problema con el registro.');
                return redirect()->to('/register');
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





