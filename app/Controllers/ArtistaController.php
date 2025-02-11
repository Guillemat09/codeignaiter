<?php

namespace App\Controllers;

use App\Models\ArtistaModel;
use CodeIgniter\Controller;

class ArtistaController extends Controller
{
    public function index()
    {
        $model = new ArtistaModel();
        $data['artistas'] = $model->findAll();

        return view('artistas/index', $data);
    }

    public function create()
    {
        return view('artistas/create');
    }

    public function store()
    {
        $model = new ArtistaModel();

        $model->save([
            'nombre' => $this->request->getPost('nombre'),
            'género' => $this->request->getPost('género'),
        ]);

        return redirect()->to('/artistas');
    }

    public function edit($id)
    {
        $model = new ArtistaModel();
        $data['artista'] = $model->find($id);
        $message = 'Usuario editado correctamente'

        return view('artistas/edit', $data);

    }

    public function update($id)
    {
        $model = new ArtistaModel();

        $model->update($id, [
            'nombre' => $this->request->getPost('nombre'),
            'género' => $this->request->getPost('género'),
        ]);
        $message = 'Usuario actualizado correctamente'

        return redirect()->to('/artistas');
    }

    public function delete($id)
    {
        $model = new ArtistaModel();
        $model->delete($id);
        $message = 'Usuario borrado correctamente'

        return redirect()->to('/artistas');
        
    }
}
