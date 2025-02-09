<?php

namespace App\Controllers;

use App\Models\EntradaModel;
use CodeIgniter\Controller;

class EntradaController extends Controller
{
    public function index()
    {
        $model = new EntradaModel();
        $data['entradas'] = $model->findAll();

        return view('entradas/index', $data);
    }
}
