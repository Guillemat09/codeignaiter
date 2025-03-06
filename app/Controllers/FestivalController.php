<?php

namespace App\Controllers;

use App\Models\FestivalModel;

class FestivalController extends BaseController
{
    public function index()
    {
        $festivalModel = new FestivalModel();
        $filters = $this->request->getGet();  // Obtener filtros del formulario
        
        // Configurar paginación
        $perPage = 10;
        $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $sort = $this->request->getVar('sort') ? $this->request->getVar('sort') : 'nombre';
        $direction = $this->request->getVar('direction') ? $this->request->getVar('direction') : 'ASC';

        // Remover los parámetros 'sort', 'direction' y 'page' de los filtros
        unset($filters['sort']);
        unset($filters['direction']);
        unset($filters['page']);

        // Obtener datos paginados con filtros y ordenación
        $data['festivales'] = $festivalModel->filter($filters)
                                            ->orderBy($sort, $direction)
                                            ->paginate($perPage, 'default', $currentPage);
        $data['pager'] = $festivalModel->pager;  // Aquí se asegura de pasar `pager` a la vista
        $data['filters'] = $filters; // Pasar filtros a la vista
        $data['sort'] = $sort;
        $data['direction'] = $direction;

        return view('festival_list', $data);
    }

    public function saveFestival($id = null)
    {
        $festivalModel = new FestivalModel();
        helper(['form', 'url']);
        $data['festival'] = $id ? $festivalModel->find($id) : null;

        if ($this->request->getMethod() == 'post') {
            $festivalData = [
                'nombre' => $this->request->getPost('nombre'),
                'descripcion' => $this->request->getPost('descripcion'),
                'fecha_inicio' => $this->request->getPost('fecha_inicio'),
                'fecha_fin' => $this->request->getPost('fecha_fin'),
                'lugar' => $this->request->getPost('lugar')
            ];

            if ($id) {
                $festivalModel->update($id, $festivalData);
                $message = 'Festival actualizado correctamente.';
            } else {
                $festivalModel->save($festivalData);
                $message = 'Festival creado correctamente.';
            }

            return redirect()->to('/festivales')->with('success', $message);
        }

        return view('festival_form', $data);
    }

    public function delete($id)
    {
        $festivalModel = new FestivalModel();
        $festivalModel->delete($id); // Eliminar Festival
        return redirect()->to('/festivales')->with('success', 'Festival eliminado correctamente.');
    }

    public function deactivate($id)
    {
        $festivalModel = new FestivalModel();
        $festival = $festivalModel->find($id);

        if ($festival) {
            $festivalModel->update($id, ['is_active' => 0]); // Marcar festival como inactivo
            return redirect()->to('/festivales')->with('success', 'festival dado de baja correctamente.');
        } else {
            return redirect()->to('/festivales')->with('error', 'El festival no existe.');
        }
    }

    public function toggleActive($id)
    {
        $festivalModel = new FestivalModel();
        $festival = $festivalModel->find($id);

        if ($festival) {
            // Cambiar el estado actual
            $newStatus = $festival['is_active'] ? 0 : 1;
            $message = $newStatus ? 'festival dado de alta correctamente.' : 'festival dado de baja correctamente.';

            // Actualizar en la base de datos
            $festivalModel->update($id, ['is_active' => $newStatus]);

            return redirect()->to('/festivales')->with('success', $message);
        } else {
            return redirect()->to('/festivales')->with('error', 'El festival no existe.');
        }
    }

}

