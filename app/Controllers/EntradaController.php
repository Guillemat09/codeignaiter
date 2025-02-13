<?php

namespace App\Controllers;

use App\Models\EntradaModel;

class EntradaController extends BaseController
{
    public function index()
    {
        $entradaModel = new EntradaModel();
        $filters = $this->request->getGet();  // Obtener filtros del formulario
        
        // Configurar paginación
        $perPage = 10;
        $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;

        // Obtener datos paginados con filtros
        $data['entradas'] = $entradaModel->filter($filters)
                                         ->paginate($perPage, 'default', $currentPage);
        $data['pager'] = $entradaModel->pager;  // Aquí se asegura de pasar `pager` a la vista
        $data['filters'] = $filters; // Pasar filtros a la vista

        return view('entrada_list', $data);
    }

    public function saveEntrada($id = null)
    {
        $entradaModel = new EntradaModel();
        helper(['form', 'url']);
        // Cargar datos de la entrada si es edición
        $data['entrada'] = $id ? $entradaModel->find($id) : null;

        if ($this->request->getMethod() == 'POST') {
            $entradaData = [
                'usuario_id' => $this->request->getPost('usuario_id'),
                'festival_id' => $this->request->getPost('festival_id'),
                'tipo_entrada' => $this->request->getPost('tipo_entrada'),
                'precio' => $this->request->getPost('precio'),
                'fecha_compra' => $this->request->getPost('fecha_compra')
            ];

            if ($id) {
                $entradaModel->update($id, $entradaData);
                $message = 'Entrada actualizada correctamente.';
            } else {
                $entradaModel->save($entradaData);
                $message = 'Entrada creada correctamente.';
            }

            return redirect()->to('/entradas')->with('success', $message);
        }

        return view('entrada_form', $data);
    }

    public function delete($id)
    {
        $entradaModel = new EntradaModel();
        $entradaModel->delete($id); // Eliminar entrada
        return redirect()->to('/entradas')->with('success', 'Entrada eliminada correctamente.');
    }
}
