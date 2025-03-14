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
        $sort = $this->request->getVar('sort') ? $this->request->getVar('sort') : 'fecha_compra';
        $direction = $this->request->getVar('direction') ? $this->request->getVar('direction') : 'ASC';

        // Remover los parámetros 'sort', 'direction' y 'page' de los filtros
        unset($filters['sort']);
        unset($filters['direction']);
        unset($filters['page']);

        // Obtener datos paginados con filtros y ordenación
        $data['entradas'] = $entradaModel->filter($filters)
                                         ->orderBy($sort, $direction)
                                         ->paginate($perPage, 'default', $currentPage);
        $data['pager'] = $entradaModel->pager;  // Aquí se asegura de pasar `pager` a la vista
        $data['filters'] = $filters; // Pasar filtros a la vista
        $data['sort'] = $sort;
        $data['direction'] = $direction;

        return view('entrada_list', $data);
    }

    public function saveEntrada($id = null)
    {
        $entradaModel = new EntradaModel();
        helper(['form', 'url']);
    
        $data['entrada'] = $id ? $entradaModel->find($id) : null;
    
        if ($this->request->getMethod() == 'POST') {
            // Reglas de validación
            $validation = \Config\Services::validation();
            $rules = [
                'usuario_id' => 'required|integer',
                'festival_id' => 'required|integer',
                'tipo_entrada' => 'required|min_length[3]|max_length[50]',
                'precio' => 'required|decimal',
                'fecha_compra' => 'required|valid_date[Y-m-d]'
            ];
    
            $validation->setRules($rules);
    
            if (!$validation->withRequest($this->request)->run()) {
                $data['validation'] = $validation;
            } else {
                // Datos del formulario
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
        }
    
        return view('entrada_form', $data);
    }
    
    public function delete($id)
    {
        $entradaModel = new EntradaModel();
        $entradaModel->delete($id); // Eliminar entrada
        return redirect()->to('/entradas')->with('success', 'Entrada eliminada correctamente.');
    }
    public function deactivate($id)
    {
        $entradaModel = new EntradaModel();
        $entrada = $entradaModel->find($id);

        if ($entrada) {
            $entradaModel->update($id, ['is_active' => 0]); // Marcar entrada como inactivo
            return redirect()->to('/entradas')->with('success', 'entrada dado de baja correctamente.');
        } else {
            return redirect()->to('/entradas')->with('error', 'El entrada no existe.');
        }
    }

    public function toggleActive($id)
    {
        $entradaModel = new EntradaModel();
        $entrada = $entradaModel->find($id);

        if ($entrada) {
            // Cambiar el estado actual
            $newStatus = $entrada['is_active'] ? 0 : 1;
            $message = $newStatus ? 'entrada dado de alta correctamente.' : 'entrada dado de baja correctamente.';

            // Actualizar en la base de datos
            $entradaModel->update($id, ['is_active' => $newStatus]);

            return redirect()->to('/entradas')->with('success', $message);
        } else {
            return redirect()->to('/entradas')->with('error', 'El entrada no existe.');
        }
    }
}