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
    //  $numeroregistros=$artistaModel->countAllResults();              
    //  var_dump($numeroregistros);
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
            // 'numeroregistros' => $numeroregistros,  // Añadir número de registros a la vista
        ];
    
        return view('artista_list', $data);
    }
    
    public function saveArtista($id = null)
{
    $artistaModel = new ArtistaModel();
    helper(['form', 'url']);

    $data['artista'] = $id ? $artistaModel->find($id) : null;

    if ($this->request->getMethod() == 'POST') {
        // Reglas de validación
        $validationRules = [
            'nombre' => 'required|min_length[3]|max_length[50]',
            'descripcion' => 'required|min_length[3]|max_length[255]',
            'genero' => 'required|min_length[3]|max_length[50]',
        ];

        // Mensajes de validación en español
        $validationMessages = [
            'nombre' => [
                'required' => 'El nombre del artista es obligatorio.',
                'min_length' => 'El nombre debe tener al menos 3 caracteres.',
                'max_length' => 'El nombre no puede superar los 50 caracteres.'
            ],
            'descripcion' => [
                'required' => 'La descripción es obligatoria.',
                'min_length' => 'La descripción debe tener al menos 3 caracteres.',
                'max_length' => 'La descripción no puede superar los 255 caracteres.'
            ],
            'genero' => [
                'required' => 'El género musical es obligatorio.',
                'min_length' => 'El género debe tener al menos 3 caracteres.',
                'max_length' => 'El género no puede superar los 50 caracteres.'
            ]
        ];

        $validation = \Config\Services::validation();
        $validation->setRules($validationRules, $validationMessages);

        if (!$this->validate($validationRules, $validationMessages)) {
            // Si la validación falla, se muestra el formulario con los errores
            return view('artista_form', [
                'artista' => $data['artista'],
                'validation' => $this->validator
            ]);
        }

        // Datos del formulario
        $artistaData = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'genero' => $this->request->getPost('genero'),
        ];

        if ($id) {
            // Si existe el ID, actualizar el artista
            $artistaModel->update($id, $artistaData);
            session()->setFlashdata('success', 'Artista actualizado correctamente.');
        } else {
            // Si no existe el ID, crear un nuevo artista
            $artistaModel->save($artistaData);
            session()->setFlashdata('success', 'Artista creado correctamente.');
            $data['artista_creado'] = true; // Variable para el botón de éxito
        }

        // Redirigir al listado de artistas
        return redirect()->to('/artistas');
    }

    // Si no es una solicitud POST, mostrar el formulario
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