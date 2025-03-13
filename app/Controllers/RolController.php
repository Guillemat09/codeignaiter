<?php

namespace App\Controllers;

use App\Models\RolModel;

class RolController extends BaseController
{
    public function index()
    {
        $RolModel = new RolModel(); // Instanciar el modelo

        $nombre = $this->request->getGet('nombre');

        $sort = $this->request->getGet('sort') ?? 'id'; 
        $order = $this->request->getGet('order') ?? 'asc';

        if ($nombre) {
            $RolModel->like('roles.nombre', $nombre);
        }
        
        // Aplicar ordenación
        $RolModel->orderBy($sort, $order);

        // Configurar paginación
        $perPage = 10;
        $page = $this->request->getVar('page') ? $this->request->getVar('page') : 1;

        // Obtener datos paginados con filtros, búsqueda y ordenación
        $data['roles'] = $RolModel->paginate($perPage, 'default', $page);
        $data['pager'] = $RolModel->pager;  // Aquí se asegura de pasar `pager` a la vista
        $data['nombre'] = $nombre; // Pasar filtros a la vista
        $data['sort'] = $sort;
        $data['perPage'] = $perPage;
        $data['page'] = $page;
        $data['order'] = $order;

        return view('rol_list', $data);
    }

    public function saveRol($id = null)
    {
        $rolModel = new RolModel();
        helper(['form', 'url']);

        // Si es edición, obtener datos del rol
        $data['rol'] = $id ? $rolModel->find($id) : null;

        if ($this->request->getMethod() === 'post') {
            // Validación de datos
            $rules = [
                'nombre' => 'required|min_length[3]|is_unique[roles.nombre,id,{id}]'
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            // Datos del rol
            $rolData = ['nombre' => $this->request->getPost('nombre')];

            try {
                if ($id) {
                    if ($rolModel->update($id, $rolData)) {
                        return redirect()->to('/roles')->with('success', 'Rol actualizado correctamente.');
                    }
                } else {
                    if ($rolModel->insert($rolData)) {
                        return redirect()->to('/roles')->with('success', 'Rol creado correctamente.');
                    }
                }
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->with('error', 'Ocurrió un error al guardar el rol.');
            }
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
