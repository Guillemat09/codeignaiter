<?php

namespace App\Controllers;

use App\Models\FestivalModel;

class FestivalController extends BaseController
{
    public function index()
    {
        $festivalModel = new FestivalModel();
        $data['festivales'] = $festivalModel->findAll(); // Obtener todos los festivales
        return view('festival_list', $data);
    }

    public function saveFestival($id = null)
    {
        $festivalModel = new FestivalModel();
        helper(['form', 'url']);
        // Cargar datos del festival si es edición
        $data['festival'] = $id ? $festivalModel->find($id) : null;

        if ($this->request->getMethod() == 'post') {

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
            //     Preparar datos del formulario
                $festivalData = [
                    'nombre' => $this->request->getPost('nombre'),
                    'descripcion' => $this->request->getPost('descripcion'),
                    'fecha_inicio' => $this->request->getPost('fecha_inicio'),
                    'fecha_fin' => $this->request->getPost('fecha_fin'),
                    'lugar' => $this->request->getPost('lugar')
                ];

                if ($id) {
                    // Actualizar festival existente
                    $festivalModel->update($id, $festivalData);
                    $message = 'Festival actualizado correctamente.';
                } else {
                    // Crear nuevo festival
                    $festivalModel->save($festivalData);
                    $message = 'Festival creado correctamente.';
                }

                // Redirigir al listado con un mensaje de éxito
                return redirect()->to('/festivales')->with('success', $message);
            // }
        }

        // Cargar la vista del formulario (crear/editar)
        return view('festival_form', $data);
    }

    public function delete($id)
    {
        $festivalModel = new FestivalModel();
        $festivalModel->delete($id); // Eliminar Festival
        return redirect()->to('/festivales')->with('success', 'Festival eliminado correctamente.');
    }
}
