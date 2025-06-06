<?php

namespace App\Controllers;

use App\Models\FestivalModel;

class FestivalController extends BaseController
{
public function index()
    {
        $festivalModel = new FestivalModel();

        // Capturamos los filtros del GET
        $filters = [
            'nombre' => $this->request->getGet('nombre'),
            'descripcion' => $this->request->getGet('descripcion'),
            'fecha_inicio' => $this->request->getGet('fecha_inicio'),
            'fecha_fin' => $this->request->getGet('fecha_fin'),
            'lugar' => $this->request->getGet('lugar'),
            'fecha_creacion' => $this->request->getGet('fecha_creacion'),
        ];

        // Parámetros de orden y paginación
        $sort = $this->request->getGet('sort') ?? 'id';
        $order = strtoupper($this->request->getGet('order') ?? 'ASC');
        $perPage = (int) ($this->request->getGet('perPage') ?? 10);
        $page = (int) ($this->request->getGet('page') ?? 1);

        // Aplicar filtros con like si tienen valor
        foreach ($filters as $key => $value) {
            if (!empty($value)) {
                $festivalModel->like($key, $value);
            }
        }

        // Aplicar orden
        $festivalModel->orderBy($sort, $order);

        // Obtener total para mostrar en la vista (opcional)
        $totalRegistros = $festivalModel->countAllResults(false);

        // Obtener datos paginados
        $festivales = $festivalModel->paginate($perPage, 'default', $page);

        // Pasar datos a la vista
        $data = [
            'festivales' => $festivales,
            'pager' => $festivalModel->pager,
            'filters' => $filters,
            'sort' => $sort,
            'order' => $order,
            'perPage' => $perPage,
            'page' => $page,
            'totalRegistros' => $totalRegistros,
        ];

        return view('festival_list', $data);
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

