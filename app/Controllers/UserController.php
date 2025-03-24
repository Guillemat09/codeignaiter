<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $filters = $this->request->getGet();  // Obtener filtros del formulario
        
        // Configurar paginación
        $perPage = 10;
        $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $sort = $this->request->getVar('sort') ? $this->request->getVar('sort') : 'name';
        $direction = $this->request->getVar('direction') ? $this->request->getVar('direction') : 'ASC';

        // Remover los parámetros 'sort', 'direction' y 'page' de los filtros
        unset($filters['sort']);
        unset($filters['direction']);
        unset($filters['page']);

        // Obtener datos paginados con filtros y ordenación
        $data['users'] = $userModel->filter($filters)
                                   ->orderBy($sort, $direction)
                                   ->paginate($perPage, 'default', $currentPage);
        $data['pager'] = $userModel->pager;  // Aquí se asegura de pasar `pager` a la vista
        $data['filters'] = $filters; // Pasar filtros a la vista
        $data['sort'] = $sort;
        $data['direction'] = $direction;

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
               $errores ="";
               foreach ($validation->getErrors() as $key => $value) {
                  $errores.=$key.":".$value."<br>";
                }
                return redirect()->to('/users')->withInput()->with('error', $errores);
            } else {
                // Preparar datos del formulario
                $userData = [
                    'name' => $this->request->getPost('name'),
                    'email' => $this->request->getPost('email'),
                    'password' => $this->request->getPost('password'),
                    'role_id' => 3,  // Por defecto, todos los usuarios tienen el rol de usuario
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
    // var_dump($data['user']);die();
        return redirect()->to('/users')->with('activarFormulario',true)->with('user', $data['user']);
    }

    public function delete($id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);
        
        if ($user) {
            $userModel->delete($id); // Eliminar usuario
            return redirect()->to('/users')->with('success', 'Usuario eliminado correctamente.');
        } else {
            return redirect()->to('/users')->with('error', 'El Usuario no existe.');
        }
    }
    public function deactivate($id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);

        if ($user) {
            $userModel->update($id, ['is_active' => 0]); // Marcar user como inactivo
            return redirect()->to('/users')->with('success', 'Usuario dado de baja correctamente.');
        } else {
            return redirect()->to('/users')->with('error', 'El Usuario no existe.');
        }
    }

    public function toggleActive($id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);

        if ($user) {
            // Cambiar el estado actual
            $newStatus = $user['is_active'] ? 0 : 1;
            $message = $newStatus ? 'Usuario dado de alta correctamente.' : 'Usuario dado de baja correctamente.';

            // Actualizar en la base de datos
            $userModel->update($id, ['is_active' => $newStatus]);

            return redirect()->to('/users')->with('success', $message);
        } else {
            return redirect()->to('/users')->with('error', 'El user no existe.');
        }
    }

}
