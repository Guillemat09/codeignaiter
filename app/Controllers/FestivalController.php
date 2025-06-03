<?php

namespace App\Controllers;

use App\Models\FestivalModel;

class FestivalController extends BaseController
{
    public function index()
{
    $festivalModel = new FestivalModel();
    $filters = $this->request->getGet();  // Obtener filtros del formulario

    // Configurar paginación
    $perPage = $this->request->getVar('perPage') ? $this->request->getVar('perPage') : 10; // 10 es el valor predeterminado
    $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1; // Página actual
    $sort = $this->request->getVar('sort') ? $this->request->getVar('sort') : 'nombre'; // Orden por defecto: 'nombre'
    $direction = $this->request->getVar('direction') ? $this->request->getVar('direction') : 'ASC'; // Orden ascendente por defecto

    // Eliminar los parámetros de paginación y ordenación de los filtros antes de pasarlos al modelo
    unset($filters['sort']);
    unset($filters['direction']);
    unset($filters['page']);
    unset($filters['perPage']); // Eliminar el parámetro de cantidad por página de los filtros

    // Obtener los festivales filtrados y paginados
    $data['festivales'] = $festivalModel->filter($filters)  // Aplicar filtros
                                        ->orderBy($sort, $direction)  // Aplicar ordenación
                                        ->paginate($perPage, 'default', $currentPage);  // Paginación

    // Pasar a la vista los datos necesarios
    $data['pager'] = $festivalModel->pager;  // Pasar el objeto de paginación a la vista
    $data['filters'] = $filters;  // Pasar los filtros aplicados a la vista
    $data['sort'] = $sort;  // Campo de ordenación
    $data['direction'] = $direction;  // Dirección de ordenación
    $data['perPage'] = $perPage;  // Número de registros por página
    $data['currentPage'] = $currentPage;  // Página actual

    return view('festival_list', $data);  // Pasar los datos a la vista
}

    

public function saveFestival($id = null)
{
    $festivalModel = new FestivalModel();
    helper(['form', 'url']);

    $data['festival'] = $id ? $festivalModel->find($id) : null;

    if ($this->request->getMethod() == 'POST') {
        // Reglas de validación
        $validationRules = [
            'nombre' => 'required|min_length[3]|max_length[255]',
            'descripcion' => 'required|min_length[10]',
            'fecha_inicio' => 'required|valid_date[Y-m-d]',
            'fecha_fin' => 'required|valid_date[Y-m-d]',
            'lugar' => 'required|min_length[3]|max_length[255]',
        ];

        $validationMessages = [
            'nombre' => [
                'required' => 'El nombre del festival es obligatorio.',
                'min_length' => 'El nombre debe tener al menos 3 caracteres.',
                'max_length' => 'El nombre no puede superar los 255 caracteres.'
            ],
            'descripcion' => [
                'required' => 'La descripción es obligatoria.',
                'min_length' => 'La descripción debe tener al menos 10 caracteres.'
            ],
            'fecha_inicio' => [
                'required' => 'La fecha de inicio es obligatoria.',
                'valid_date' => 'La fecha de inicio debe ser válida.'
            ],
            'fecha_fin' => [
                'required' => 'La fecha de fin es obligatoria.',
                'valid_date' => 'La fecha de fin debe ser válida.'
            ],
            'lugar' => [
                'required' => 'El lugar es obligatorio.',
                'min_length' => 'El lugar debe tener al menos 3 caracteres.',
                'max_length' => 'El lugar no puede superar los 255 caracteres.'
            ]
        ];

        $validation = \Config\Services::validation();
        $validation->setRules($validationRules, $validationMessages);

        $validationPassed = $this->validate($validationRules, $validationMessages);

        // Guardar siempre, aunque la validación falle
        $festivalData = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'fecha_inicio' => $this->request->getPost('fecha_inicio'),
            'fecha_fin' => $this->request->getPost('fecha_fin'),
            'lugar' => $this->request->getPost('lugar'),
        ];

               if ($id) {
            $festivalModel->update($id, $festivalData);
            session()->setFlashdata('success', 'Festival actualizado correctamente.');
        } else {
            // Festival nuevo => marcar como activo
            $festivalData['is_active'] = 1;
            $festivalModel->save($festivalData);
            session()->setFlashdata('success', 'Festival creado correctamente.');
            $data['festival_creado'] = true;
        }


        // Opcional: puedes guardar errores en session para mostrarlos si quieres
        if (!$validationPassed) {
            session()->setFlashdata('validation_errors', $this->validator->getErrors());
        }

        return redirect()->to('/festivales');
    }

    return view('festival_form', $data);
}


    

    public function delete($id)
    {
        $festivalModel = new FestivalModel();
        $festivalModel->delete($id); // Eliminar Festival
        return redirect()->to('/festivales')->with('success', 'Festival eliminado correctamente.');
    }

    public function deactivate($id)
    {
        $festivalModel = new FestivalModel();
        $festival = $festivalModel->find($id);

        if ($festival) {
            $festivalModel->update($id, ['is_active' => 0]); // Marcar festival como inactivo
            return redirect()->to('/festivales')->with('success', 'festival dado de baja correctamente.');
        } else {
            return redirect()->to('/festivales')->with('error', 'El festival no existe.');
        }
    }

    public function toggleActive($id)
    {
        $festivalModel = new FestivalModel();
        $festival = $festivalModel->find($id);

        if ($festival) {
            // Cambiar el estado actual
            $newStatus = $festival['is_active'] ? 0 : 1;
            $message = $newStatus ? 'Festival dado de alta correctamente.' : 'Festival dado de baja correctamente.';

            // Actualizar en la base de datos
            $festivalModel->update($id, ['is_active' => $newStatus]);

            return redirect()->to('/festivales')->with('success', $message);
        } else {
            return redirect()->to('/festivales')->with('error', 'El festival no existe.');
        }
    }

   public function exportFestivales()
{
    $festivalModel = new FestivalModel();
    $festivales = $festivalModel->findAll();

    // Encabezados para descarga CSV
    header('Content-Type: text/csv; charset=UTF-8');
    header('Content-Disposition: attachment; filename="festivales.csv"');

    // Agregar BOM para que Excel detecte UTF-8 correctamente
    echo "\xEF\xBB\xBF";

    $output = fopen('php://output', 'w');

    // Encabezado del CSV
    fputcsv($output, ['Nombre', 'Lugar', 'Descripción', 'Fecha Inicio', 'Fecha Fin']);

    // Datos de los festivales con formato de fecha en español (dd/mm/yyyy)
    foreach ($festivales as $festival) {
        $fechaInicio = date('d/m/Y', strtotime($festival['fecha_inicio']));
        $fechaFin = date('d/m/Y', strtotime($festival['fecha_fin']));

        fputcsv($output, [
            $festival['nombre'],
            $festival['lugar'],
            $festival['descripcion'],
            $fechaInicio,
            $fechaFin,
        ]);
    }

    fclose($output);
    exit;
}

}

