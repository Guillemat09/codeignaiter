<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll(); // Obtener todos los usuarios
        return view('user_list', $data);
    }

    public function saveUser($id = null)
    {
        $userModel = new UserModel();
        helper(['form', 'url']);
        // Cargar datos del usuario si es edición
        $data['user'] = $id ? $userModel->find($id) : null;

        if ($this->request->getMethod() == 'POST') {
            // Reglas de validación
            $validation = \Config\Services::validation();
            $rules = [
                'name' => 'required|min_length[3]|max_length[50]',
                'email' => 'required|valid_email',
            ];

            if (!$id) { // Si es un nuevo usuario, verificar que el email sea único
                $rules['email'] .= '|is_unique[users.email]';
            }

            $validation->setRules($rules);

            if (!$validation->withRequest($this->request)->run()) {
                // Mostrar errores de validación
                $data['validation'] = $validation;
            } else {
                // Preparar datos del formulario
                $userData = [
                    'name' => $this->request->getPost('name'),
                    'email' => $this->request->getPost('email'),
                ];

                if ($id) {
                    // Actualizar usuario existente
                    $userModel->update($id, $userData);
                    $message = 'Usuario actualizado correctamente.';
                } else {
                    // Crear nuevo usuario
                    $userModel->save($userData);
                    $message = 'Usuario creado correctamente.';
                }

                // Redirigir al listado con un mensaje de éxito
                return redirect()->to('/users')->with('success', $message);
            }
        }

        // Cargar la vista del formulario (crear/editar)
        return view('user_form', $data);
    }

    public function delete($id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);
        
        if ($user) {
            $userModel->delete($id); // Eliminar usuario
            return redirect()->to('/users')->with('success', 'Usuario eliminado correctamente.');
        } else {
            return redirect()->to('/users')->with('error', 'El usuario no existe.');
        }
    }
}
