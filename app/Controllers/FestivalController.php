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
    
        if ($this->request->getMethod() == 'POST') {
            // Reglas de validación
            $validationRules = [
                'nombre' => 'required|min_length[3]|max_length[255]',
                'descripcion' => 'required|min_length[10]',
                'fecha_inicio' => 'required|valid_date[Y-m-d]',
                'fecha_fin' => 'required|valid_date[Y-m-d]',
                'lugar' => 'required|min_length[3]|max_length[255]',
            ];
    
            // Mensajes de validación en español
            $validationMessages = [
                'nombre' => [
                    'required' => 'El nombre del festival es obligatorio.',
                    'min_length' => 'El nombre debe tener al menos 3 caracteres.',
                    'max_length' => 'El nombre no puede superar los 255 caracteres.'
                ],
                'descripcion' => [
                    'required' => 'La descripción es obligatoria.',
                    'min_length' => 'La descripción debe tener al menos 10 caracteres.'
                ],
                'fecha_inicio' => [
                    'required' => 'La fecha de inicio es obligatoria.',
                    'valid_date' => 'La fecha de inicio debe ser válida (formato: YYYY-MM-DD).'
                ],
                'fecha_fin' => [
                    'required' => 'La fecha de fin es obligatoria.',
                    'valid_date' => 'La fecha de fin debe ser válida (formato: YYYY-MM-DD).'
                ],
                'lugar' => [
                    'required' => 'El lugar es obligatorio.',
                    'min_length' => 'El lugar debe tener al menos 3 caracteres.',
                    'max_length' => 'El lugar no puede superar los 255 caracteres.'
                ]
            ];
    
            $validation = \Config\Services::validation();
            $validation->setRules($validationRules, $validationMessages);
    
            if (!$this->validate($validationRules, $validationMessages)) {
                // Si la validación falla, se muestra el formulario con los errores
                return view('festival_form', [
                    'festival' => $data['festival'],
                    'validation' => $this->validator
                ]);
            }
    
            // Datos del formulario
            $festivalData = [
                'nombre' => $this->request->getPost('nombre'),
                'descripcion' => $this->request->getPost('descripcion'),
                'fecha_inicio' => $this->request->getPost('fecha_inicio'),
                'fecha_fin' => $this->request->getPost('fecha_fin'),
                'lugar' => $this->request->getPost('lugar'),
            ];
    
            if ($id) {
                // Si existe el ID, actualizar el festival
                $festivalModel->update($id, $festivalData);
                session()->setFlashdata('success', 'Festival actualizado correctamente.');
            } else {
                // Si no existe el ID, crear un nuevo festival
                $festivalModel->save($festivalData);
                session()->setFlashdata('success', 'Festival creado correctamente.');
                $data['festival_creado'] = true; // Variable para el botón de éxito
            }
    
            // Redirigir al listado de festivales
            return redirect()->to('/festivales');
        }
    
        // Si no es una solicitud POST, mostrar el formulario
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

