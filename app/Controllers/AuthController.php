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
            $data = $model->getUserByEmail($email);
            if ($data) {
                $pass = $data['password'];
                // $authenticatePassword = password_verify($password, $pass);
                // var_dump($data);die();
                $authenticatePassword = ($password == $pass);
                if ($authenticatePassword) {
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
                    'role' => $this->request->getPost('role')
                ];
                $model->save($data);
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
