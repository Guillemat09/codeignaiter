<?php

namespace App\Controllers;

use App\Models\PatrocinadorModel;

class PatrocinadorController extends BaseController
{
    public function index()
    {
        $patrocinadorModel = new PatrocinadorModel();
        $data['patrocinadores'] = $patrocinadorModel->findAll(); // Obtener todos los artistas
        return view('patrocinador_list', $data);
    }

    public function savePatrocinador($id = null)
    {
        $patrocinadorModel = new PatrocinadorModel();
        helper(['form', 'url']);
        // Cargar datos del usuario si es edición
        $data['patrocinador'] = $id ? $patrocinadorModel->find($id) : null;

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
                $patrocinadorData = [
                    'nombre' => $this->request->getPost('nombre'),
                    'descripcion' => $this->request->getPost('descripcion'),
                    'contacto' => $this->request->getPost('contacto'),
                    'festival_id' => $this->request->getPost('festival_id')
                ];

                if ($id) {
                    // Actualizar usuario existente
                    $patrocinadorModel->update($id, $patrocinadorData);
                    $message = 'Patrocinador actualizado correctamente.';
                } else {
                    // Crear nuevo usuario
                    $patrocinadorModel->save($patrocinadorData);
                    $message = 'Patrocinador creado correctamente.';
                }

                // Redirigir al listado con un mensaje de éxito
                return redirect()->to('/patrocinadores')->with('success', $message);
            // }
        }

        // Cargar la vista del formulario (crear/editar)
        return view('patrocinador_form', $data);
    }

    public function delete($id)
    {
        $patrocinadorModel = new PatrocinadorModel();
        $patrocinadorModel->delete($id); // Eliminar artista
        return redirect()->to('/patrocinadores')->with('success', 'Patrocinador eliminado correctamente.');
    }
}