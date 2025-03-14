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
        // Reglas de validación
        $validation = \Config\Services::validation();
        $rules = [
            'nombre' => 'required|min_length[3]|max_length[255]',
            'descripcion' => 'required|min_length[5]',
            'contacto' => 'required|min_length[5]|max_length[100]',
        ];

        // Mensajes personalizados
        $messages = [
            'nombre' => [
                'required' => 'El nombre es obligatorio.',
                'min_length' => 'El nombre debe tener al menos 3 caracteres.',
                'max_length' => 'El nombre no puede superar los 255 caracteres.'
            ],
            'descripcion' => [
                'required' => 'La descripción es obligatoria.',
                'min_length' => 'La descripción debe tener al menos 10 caracteres.'
            ],
            'contacto' => [
                'required' => 'El contacto es obligatorio.',
                'min_length' => 'El contacto debe tener al menos 5 caracteres.',
                'max_length' => 'El contacto no puede superar los 100 caracteres.'
            ],
        ];

        $validation->setRules($rules, $messages);

        // Si la validación falla
        if (!$validation->withRequest($this->request)->run()) {
            return view('patrocinador_form', [
                'patrocinador' => $data['patrocinador'],
                'validation' => $validation
            ]);
        }

        // Datos del patrocinador
        $patrocinadorData = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'contacto' => $this->request->getPost('contacto'),
        ];

        if ($id) {
            $patrocinadorModel->update($id, $patrocinadorData);
            session()->setFlashdata('success', 'Patrocinador actualizado correctamente.');
        } else {
            $patrocinadorModel->save($patrocinadorData);
            session()->setFlashdata('success', 'Patrocinador añadido correctamente.');
        }

        return redirect()->to('/patrocinadores');
    }

    return view('patrocinador_form', $data);
}


    public function delete($id)
    {
        $patrocinadorModel = new PatrocinadorModel();
        $patrocinadorModel->delete($id); // Eliminar patrocinador
        return redirect()->to('/patrocinadores')->with('success', 'Patrocinador eliminado correctamente.');
    }

    public function deactivate($id)
    {
        $patrocinadorModel = new PatrocinadorModel();
        $patrocinador = $patrocinadorModel->find($id);

        if ($patrocinador) {
            $patrocinadorModel->update($id, ['is_active' => 0]); // Marcar patrocinador como inactivo
            return redirect()->to('/patrocinadores')->with('success', 'patrocinador dado de baja correctamente.');
        } else {
            return redirect()->to('/patrocinadores')->with('error', 'El patrocinador no existe.');
        }
    }

    public function toggleActive($id)
    {
        $patrocinadorModel = new PatrocinadorModel();
        $patrocinador = $patrocinadorModel->find($id);

        if ($patrocinador) {
            // Cambiar el estado actual
            $newStatus = $patrocinador['is_active'] ? 0 : 1;
            $message = $newStatus ? 'patrocinador dado de alta correctamente.' : 'patrocinador dado de baja correctamente.';

            // Actualizar en la base de datos
            $patrocinadorModel->update($id, ['is_active' => $newStatus]);

            return redirect()->to('/patrocinadores')->with('success', $message);
        } else {
            return redirect()->to('/patrocinadores')->with('error', 'El patrocinador no existe.');
        }
    }

}