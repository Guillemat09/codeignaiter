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
            session()->setFlashdata('error', 'Datos no validos.');
            return view('register', ['validation' => $this->validator]);
        }

        $userModel = new UserModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'role_id' => 3,
        ];
        // $userModel->save([
        //     'name' => $this->request->getPost('name'),
        //     'email' => $this->request->getPost('email'),
        //     // 'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        //     'password' => $this->request->getPost('password'),
        //     'role_id' => 3,
        // ]);

        if ($userModel->save($data)) {
            session()->setFlashdata('success', 'Usuario registrado correctamente.');
            return redirect()->to('/login');
        } else {
            session()->setFlashdata('error', 'No se pudo registrar el usuario.');
            return redirect()->back()->withInput();
        }
    }
    /**
     * Muestra el formulario de inicio de sesión.
     */
    public function login()
    {
        $request = service('request');
    if ($request->getMethod() === 'POST') {
        $email = $request->getPost('email');
        $password = $request->getPost('password');

        // Cargar el modelo de usuario
        $userModel = new \App\Models\UserModel();

        // Buscar el usuario en la base de datos
        $user = $userModel->where('email', $email)->first();

        if ($user && $password == $user['password']) {
            // Autenticación exitosa
            $roleModel = new \App\Models\RolModel();

            // Buscar el rol correspondiente en la base de datos
            $role = $roleModel->find($user['role_id']);

            // Guardar el usuario y el rol en la sesión
            session()->set('user', $user);
            session()->set('role', $role);
            return view('principal');
        } else {
            // Autenticación fallida
            session()->setFlashdata('error', 'Email o contraseña incorrectos.');
            return view('login');
        }
    }
return view ('login');
    }
    

    /**
     * Procesa el inicio de sesión.
     */
    public function processLogin()
    {
        helper(['form', 'url']);
        $session = session();

        $rules = [
            'email' => 'required|',
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








