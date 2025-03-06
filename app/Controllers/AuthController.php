<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    /**
     * Muestra el formulario de registro.
     */
    public function register()
    {
        return view('register');
    }

    /**
     * Procesa el registro de un nuevo usuario.
     */
    public function processRegister()
    {
        helper(['form', 'url']);

        $rules = [
            'name' => 'required|min_length[3]|max_length[50]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'password_confirm' => 'required|matches[password]',
        ];

        if (!$this->validate($rules)) {
            return view('register', ['validation' => $this->validator]);
        }

        $userModel = new UserModel();
        $userModel->save([
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ]);

        return redirect()->to('/login')->with('success', 'Usuario registrado correctamente.');
    }

    /**
     * Muestra el formulario de inicio de sesión.
     */
    public function login()
    {
        return view('login');
    }

    /**
     * Procesa el inicio de sesión.
     */
    public function processLogin()
    {
        helper(['form', 'url']);
        $session = session();

        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required',
        ];

        if (!$this->validate($rules)) {
            return view('login', ['validation' => $this->validator]);
        }

        $userModel = new UserModel();
        $user = $userModel->where('email', $this->request->getPost('email'))->first();

        if (!$user) {
            return redirect()->to('/login')->with('error', 'Usuario no encontrado.');
        }

        if (!password_verify($this->request->getPost('password'), $user['password'])) {
            return redirect()->to('/login')->with('error', 'Correo o contraseña incorrectos.');
        }

        $session->set([
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'isLoggedIn' => true,
            'created_at' => $user['created_at'],
        ]);

        return redirect()->to('/dashboard')->with('success', 'Inicio de sesión exitoso.');
    }

    /**
     * Cierra la sesión del usuario.
     */
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Has cerrado sesión correctamente.');
    }
}








