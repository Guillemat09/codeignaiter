<?php

namespace App\Controllers;

use App\Models\ArtistaModel;

class ArtistaController extends BaseController
{
    public function index()
    {
        $artistaModel = new ArtistaModel();
        $data['artistas'] = $artistaModel->findAll(); // Obtener todos los artistas
        return view('artista_list', $data);
    }

    public function saveArtista($id = null)
    {
        $artistaModel = new ArtistaModel();
        helper(['form', 'url']);
        // Cargar datos del usuario si es edición
        $data['artista'] = $id ? $artistaModel->find($id) : null;

        if ($this->request->getMethod() == 'POST') {

            // Reglas de validación
            // $validation = \Config\Services::validation();
            // $validation->setRules([
            //     'name' => 'required|min_length[3]|max_length[50]',
            //     'email' => 'required|valid_email',
            // ]);

            // if (!$validation->withRequest($this->request)->run()) {
            //     // Mostrar errores de validación
            //     $data['validation'] = $validation;
            // } else {
                // Preparar datos del formulario
                $artistaData = [
                    'nombre' => $this->request->getPost('nombre'),
                    'descripcion' => $this->request->getPost('descripcion'),
                    'genero' => $this->request->getPost('genero')
                    
                ];

                if ($id) {
                    // Actualizar usuario existente
                    $artistaModel->update($id, $artistaData);
                    $message = 'Artista actualizado correctamente.';
                } else {
                    // Crear nuevo usuario
                    $artistaModel->save($artistaData);
                    $message = 'Artista creado correctamente.';
                }

                // Redirigir al listado con un mensaje de éxito
                return redirect()->to('/artistas')->with('success', $message);
            // }
        }

        // Cargar la vista del formulario (crear/editar)
        return view('artista_form', $data);
    }

    public function delete($id)
    {
        $artistaModel = new ArtistaModel();
        $artistaModel->delete($id); // Eliminar artista
        return redirect()->to('/artistas')->with('success', 'Artista eliminado correctamente.');
    }
}