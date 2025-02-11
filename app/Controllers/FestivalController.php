<?php

namespace App\Controllers;

use App\Models\FestivalModel;
use CodeIgniter\Controller;

class FestivalController extends Controller
{
    public function index()
    {
        $festivalModel = new FestivalModel();
        $perPage = 5; // Número de festivales por página

        // Obtener los filtros desde la URL
        $nombre = $this->request->getGet('nombre');
        $fecha_inicio = $this->request->getGet('fecha_inicio');
        $ubicacion = $this->request->getGet('ubicacion');

        // Filtrar resultados según los valores ingresados
        if ($nombre) {
            $festivalModel->like('nombre', $nombre);
        }
        if ($fecha_inicio) {
            $festivalModel->where('fecha_inicio', $fecha_inicio);
        }
        if ($ubicacion) {
            $festivalModel->like('ubicación', $ubicacion);
        }

        $data['festivales'] = $festivalModel->paginate($perPage);
        $data['pager'] = $festivalModel->pager;

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

