<?php

namespace App\Controllers;
use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {
        return view('custom_view');
    }

    public function getUsers()  
    {
        $userModel = new \App\Models\UserModel();
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

        if (!$this->validate($rules)) {
            return view('create_user', [
                'validation' => $this->validator
            ]);
        } else {
            $userModel = new \App\Models\UserModel();
            $userModel->save([
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
            ]);
            return redirect()->to('/home');
        }
    }

    return view('create_user');
}
}