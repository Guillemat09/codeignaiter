<?php

namespace App\Controllers;

use App\Models\PatrocinadorModel;

class PatrocinadorController extends BaseController
{
    public function index()
    {
        $patrocinadorModel = new PatrocinadorModel();
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
        $data['patrocinadores'] = $patrocinadorModel->filter($filters)
                                                    ->orderBy($sort, $direction)
                                                    ->paginate($perPage, 'default', $currentPage);
        $data['pager'] = $patrocinadorModel->pager;  // Aquí se asegura de pasar `pager` a la vista
        $data['filters'] = $filters; // Pasar filtros a la vista
        $data['sort'] = $sort;
        $data['direction'] = $direction;

        return view('patrocinador_list', $data);
    }

    public function savePatrocinador($id = null)
    {
        $patrocinadorModel = new PatrocinadorModel();
        helper(['form', 'url']);
        $data['patrocinador'] = $id ? $patrocinadorModel->find($id) : null;

        if ($this->request->getMethod() == 'POST') {
            $patrocinadorData = [
                'nombre' => $this->request->getPost('nombre'),
                'descripcion' => $this->request->getPost('descripcion'),
                'contacto' => $this->request->getPost('contacto'),
                'festival_id' => $this->request->getPost('festival_id')
            ];

            if ($id) {
                $patrocinadorModel->update($id, $patrocinadorData);
                $message = 'Patrocinador actualizado correctamente.';
            } else {
                $patrocinadorModel->save($patrocinadorData);
                $message = 'Patrocinador creado correctamente.';
            }

            return redirect()->to('/patrocinadores')->with('success', $message);
        }

        return view('patrocinador_form', $data);
    }

    public function delete($id)
    {
        $patrocinadorModel = new PatrocinadorModel();
        $patrocinadorModel->delete($id); // Eliminar patrocinador
        return redirect()->to('/patrocinadores')->with('success', 'Patrocinador eliminado correctamente.');
    }
}