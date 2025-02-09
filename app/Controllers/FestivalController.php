<?php

namespace App\Controllers;

use App\Models\FestivalModel;
use CodeIgniter\Controller;

class FestivalController extends Controller
{
    public function index()
    {
        $model = new FestivalModel();
        $data['festivales'] = $model->findAll();

        return view('festivales/index', $data);
    }

    public function create()
    {
        return view('festivales/create');
    }

    public function store()
    {
        $model = new FestivalModel();

        $model->save([
            'nombre'       => $this->request->getPost('nombre'),
            'fecha_inicio' => $this->request->getPost('fecha_inicio'),
            'fecha_fin'    => $this->request->getPost('fecha_fin'),
            'ubicación'    => $this->request->getPost('ubicación'),
            'descripción'  => $this->request->getPost('descripción'),
        ]);

        return redirect()->to('/festivales');
    }

    public function edit($id)
    {
        $model = new FestivalModel();
        $data['festival'] = $model->find($id);

        return view('festivales/edit', $data);
    }

    public function update($id)
    {
        $model = new FestivalModel();

        $model->update($id, [
            'nombre'       => $this->request->getPost('nombre'),
            'fecha_inicio' => $this->request->getPost('fecha_inicio'),
            'fecha_fin'    => $this->request->getPost('fecha_fin'),
            'ubicación'    => $this->request->getPost('ubicación'),
            'descripción'  => $this->request->getPost('descripción'),
        ]);

        return redirect()->to('/festivales');
    }

    public function delete($id)
    {
        $model = new FestivalModel();
        $model->delete($id);

        return redirect()->to('/festivales');
    }
}
