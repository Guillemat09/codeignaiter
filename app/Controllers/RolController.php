<?php

namespace App\Controllers;

use App\Models\RolModel;

class RolController extends BaseController
{
    public function index()
    {
        $rolModel = new RolModel();
        $filters = $this->request->getGet();  // Obtener filtros del formulario
        
        // Configurar paginación
        $perPage = 10;
        $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;

        // Obtener datos paginados con filtros
        $data['roles'] = $rolModel->filter($filters)
                                  ->paginate($perPage, 'default', $currentPage);
        $data['pager'] = $rolModel->pager;  // Aquí se asegura de pasar `pager` a la vista
        $data['filters'] = $filters; // Pasar filtros a la vista

        return view('rol_list', $data);
    }

    public function saveRol($id = null)
    {
        $rolModel = new RolModel();
        helper(['form', 'url']);
        // Cargar datos del rol si es edición
        $data['rol'] = $id ? $rolModel->find($id) : null;

        if ($this->request->getMethod() == 'POST') {
            $rolData = [
                'nombre' => $this->request->getPost('nombre')
            ];

            if ($id) {
                $rolModel->update($id, $rolData);
                $message = 'Rol actualizado correctamente.';
            } else {
                $rolModel->save($rolData);
                $message = 'Rol creado correctamente.';
            }

            return redirect()->to('/roles')->with('success', $message);
        }

        return view('rol_form', $data);
    }

    public function delete($id)
    {
        $rolModel = new RolModel();
        $rolModel->delete($id); // Eliminar rol
        return redirect()->to('/roles')->with('success', 'Rol eliminado correctamente.');
    }
}
