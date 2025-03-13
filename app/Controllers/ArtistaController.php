<?php

namespace App\Controllers;

use App\Models\ArtistaModel;

class ArtistaController extends BaseController
{
    public function index()
    {
        $artistaModel = new ArtistaModel();
    
        // Captura y validación de parámetros
        $filters = [
            'nombre' => $this->request->getGet('nombre'),
            'descripcion' => $this->request->getGet('descripcion'),
            'genero' => $this->request->getGet('genero'),
        ];
    
        $sort = $this->request->getGet('sort') ?? 'id'; 
        $order = $this->request->getGet('order') ?? 'asc';
    
        // Aplicar filtros si existen
        foreach ($filters as $campo => $valor) {
            if (!empty($valor)) {
                $artistaModel->like("artistas.$campo", $valor);
            }
        }
    
        // Aplicar ordenación
        $artistaModel->orderBy($sort, $order);
    
        // Configurar paginación
        $perPage = 10;
        $page = $this->request->getVar('page') ?? 1;
    
        // Obtener datos paginados con filtros y ordenación
        $data = [
            'artistas' => $artistaModel->paginate($perPage),
            'pager' => $artistaModel->pager,
            'filters' => $filters, // Pasar los filtros a la vista
            'sort' => $sort,
            'order' => $order,
            'perPage' => $perPage,
            'page' => $page,
        ];
    
        return view('artista_list', $data);
    }
    
    public function saveArtista($id = null)
    {
        $artistaModel = new ArtistaModel();
        helper(['form', 'url']);
        // Cargar datos del artista si es edición
        $data['artista'] = $id ? $artistaModel->find($id) : null;

        if ($this->request->getMethod() == 'POST') {
            // Reglas de validación
            $validation = \Config\Services::validation();
            $rules = [
                'nombre' => 'required|min_length[3]|max_length[50]',
                'descripcion' => 'required|min_length[3]|max_length[255]',
                'genero' => 'required|min_length[3]|max_length[50]',
            ];

            $validation->setRules($rules);

            if (!$validation->withRequest($this->request)->run()) {
                // Mostrar errores de validación
                $data['validation'] = $validation;
            } else {
                // Preparar datos del formulario
                $artistaData = [
                    'nombre' => $this->request->getPost('nombre'),
                    'descripcion' => $this->request->getPost('descripcion'),
                    'genero' => $this->request->getPost('genero'),
                ];

                if ($id) {
                    // Actualizar artista existente
                    $artistaModel->update($id, $artistaData);
                    $message = 'Artista actualizado correctamente.';
                } else {
                    // Crear nuevo artista
                    $artistaModel->save($artistaData);
                    $message = 'Artista creado correctamente.';
                }

                // Redirigir al listado con un mensaje de éxito
                return redirect()->to('/artistas')->with('success', $message);
            }
        }

        // Cargar la vista del formulario (crear/editar)
        return view('artista_form', $data);
    }

    public function delete($id)
    {
        $artistaModel = new ArtistaModel();
        $artista = $artistaModel->find($id);
        
        if ($artista) {
            $artistaModel->delete($id); // Eliminar artista
            return redirect()->to('/artistas')->with('success', 'Artista eliminado correctamente.');
        } else {
            return redirect()->to('/artistas')->with('error', 'El artista no existe.');
        }
    }

    public function deactivate($id)
    {
        $artistaModel = new ArtistaModel();
        $artista = $artistaModel->find($id);

        if ($artista) {
            $artistaModel->update($id, ['is_active' => 0]); // Marcar artista como inactivo
            return redirect()->to('/artistas')->with('success', 'Artista dado de baja correctamente.');
        } else {
            return redirect()->to('/artistas')->with('error', 'El artista no existe.');
        }
    }

    public function toggleActive($id)
    {
        $artistaModel = new ArtistaModel();
        $artista = $artistaModel->find($id);

        if ($artista) {
            // Cambiar el estado actual
            $newStatus = $artista['is_active'] ? 0 : 1;
            $message = $newStatus ? 'Artista dado de alta correctamente.' : 'Artista dado de baja correctamente.';

            // Actualizar en la base de datos
            $artistaModel->update($id, ['is_active' => $newStatus]);

            return redirect()->to('/artistas')->with('success', $message);
        } else {
            return redirect()->to('/artistas')->with('error', 'El artista no existe.');
        }
    }
}