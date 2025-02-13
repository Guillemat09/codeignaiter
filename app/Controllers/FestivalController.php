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

        // Obtener datos paginados con filtros
        $data['festivales'] = $festivalModel->filter($filters)
                                            ->paginate($perPage, 'default', $currentPage);
        $data['pager'] = $festivalModel->pager;  // Aquí se asegura de pasar `pager` a la vista
        $data['filters'] = $filters; // Pasar filtros a la vista

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
}

