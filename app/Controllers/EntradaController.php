<?php

namespace App\Controllers;

use App\Models\EntradaModel;

class EntradaController extends BaseController
{
   public function index()
{
    $entradaModel = new EntradaModel();

    // Obtener filtros desde GET
    $filters = [
        'tipo_entrada' => $this->request->getGet('tipo_entrada'),
        'precio' => $this->request->getGet('precio'),
        'fecha_compra' => $this->request->getGet('fecha_compra'),
    ];

    // Aplicar filtros
    foreach ($filters as $campo => $valor) {
        if (!empty($valor)) {
            $entradaModel->like($campo, $valor);
        }
    }

    // Ordenación por defecto
    $sort = $this->request->getGet('sort') ?? 'fecha_compra';
    $direction = $this->request->getGet('direction') ?? 'asc';

    $entradaModel->orderBy($sort, $direction);

    // Cantidad por página
    $perPage = $this->request->getGet('perPage') ?? 10;

    // Obtener datos paginados
    $entradas = $entradaModel->paginate($perPage);
    $pager = $entradaModel->pager;

    // Total registros con filtros
    $totalRegistros = $entradaModel->pager->getTotal();

    // Pasar variables a la vista
    return view('entrada_list', [
        'entradas' => $entradas,
        'pager' => $pager,
        'filters' => $filters,
        'sort' => $sort,
        'direction' => $direction,
        'perPage' => $perPage,
        'totalRegistros' => $totalRegistros,
    ]);
}

    

    public function saveEntrada($id = null)
    {
        $entradaModel = new EntradaModel();
        helper(['form', 'url']);
    
        $data['entrada'] = $id ? $entradaModel->find($id) : null;
    
        if ($this->request->getMethod() == 'POST') {
            // Reglas de validación
            $validationRules = [
                'usuario_id' => 'required|integer',
                'festival_id' => 'required|integer',
                'tipo_entrada' => 'required|min_length[3]|max_length[50]',
                'precio' => 'required|decimal',
                'fecha_compra' => 'required|valid_date[Y-m-d]'
            ];
    
            // Mensajes de validación en español
            $validationMessages = [
                'usuario_id' => [
                    'required' => 'El usuario es obligatorio.',
                    'integer' => 'El ID del usuario debe ser un número entero.'
                ],
                'festival_id' => [
                    'required' => 'El festival es obligatorio.',
                    'integer' => 'El ID del festival debe ser un número entero.'
                ],
                'tipo_entrada' => [
                    'required' => 'El tipo de entrada es obligatorio.',
                    'min_length' => 'El tipo de entrada debe tener al menos 3 caracteres.',
                    'max_length' => 'El tipo de entrada no puede superar los 50 caracteres.'
                ],
                'precio' => [
                    'required' => 'El precio es obligatorio.',
                    'decimal' => 'El precio debe ser un número decimal válido.'
                ],
                'fecha_compra' => [
                    'required' => 'La fecha de compra es obligatoria.',
                    'valid_date' => 'La fecha de compra debe tener el formato YYYY-MM-DD.'
                ]
            ];
    
            $validation = \Config\Services::validation();
            $validation->setRules($validationRules, $validationMessages);
    
            if (!$this->validate($validationRules, $validationMessages)) {
                return view('entrada_form', [
                    'entrada' => $data['entrada'],
                    'validation' => $this->validator
                ]);
            }
    
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
                session()->setFlashdata('success', 'Entrada actualizada correctamente.');
            } else {
                $entradaModel->save($entradaData);
                session()->setFlashdata('success', 'Entrada creada correctamente.');
            }
    
            return redirect()->to('/entradas');
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
            return redirect()->to('/entradas')->with('success', 'Entrada dado de baja correctamente.');
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
            $message = $newStatus ? 'Entrada dado de alta correctamente.' : 'Entrada dado de baja correctamente.';

            // Actualizar en la base de datos
            $entradaModel->update($id, ['is_active' => $newStatus]);

            return redirect()->to('/entradas')->with('success', $message);
        } else {
            return redirect()->to('/entradas')->with('error', 'El entrada no existe.');
        }
    }
}