<?php

namespace App\Controllers;

use App\Models\ArtistaModel;

class ArtistaController extends BaseController
{
    public function index()
    {
        $artistaModel = new ArtistaModel();
        $filters = $this->request->getGet();  // Obtener filtros del formulario
        
        // Configurar paginación
        $perPage = 10;
        $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;

        // Obtener datos paginados con filtros
        $data['artistas'] = $artistaModel->filter($filters)
                                         ->paginate($perPage, 'default', $currentPage);
        $data['pager'] = $artistaModel->pager;  // Aquí se asegura de pasar `pager` a la vista
        $data['filters'] = $filters; // Pasar filtros a la vista

        return view('artista_list', $data);
    }

    public function saveArtista($id = null)
    {
        $artistaModel = new ArtistaModel();
        helper(['form', 'url']);
        // Cargar datos del usuario si es edición
        $data['artista'] = $id ? $artistaModel->find($id) : null;

        if ($this->request->getMethod() == 'POST') {
            $artistaData = [
                'nombre' => $this->request->getPost('nombre'),
                'descripcion' => $this->request->getPost('descripcion'),
                'genero' => $this->request->getPost('genero')
            ];

            if ($id) {
                $artistaModel->update($id, $artistaData);
                $message = 'Artista actualizado correctamente.';
            } else {
                $artistaModel->save($artistaData);
                $message = 'Artista creado correctamente.';
            }

            return redirect()->to('/artistas')->with('success', $message);
        }

        return view('artista_form', $data);
    }

    public function delete($id)
    {
        $artistaModel = new ArtistaModel();
        $artistaModel->delete($id); // Eliminar artista
        return redirect()->to('/artistas')->with('success', 'Artista eliminado correctamente.');
    }
}


