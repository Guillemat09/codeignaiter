<?php
namespace App\Controllers;

use App\Models\UserModel;
use App\Models\AdminModel;
use App\Models\ReportModel;

class Export extends BaseController
{
    public function exportCSV($type = 'users')
    {
        if ($type == 'users') {
            $model = new UserModel();
            $filename = "usuarios.csv";
            $headers = ['ID', 'Nombre', 'Correo', 'Rol', 'Fecha de Creación'];
        } else {
            return redirect()->to(base_url('/'))->with('error', 'Tipo de exportación no válido');
        }

        $data = $model->findAll();

        // Configurar cabeceras para descarga CSV
        header('Content-Type: text/csv; charset=utf-8');
        header("Content-Disposition: attachment; filename=\"$filename\"");

        $output = fopen('php://output', 'w');

        // Escribir encabezados
        fputcsv($output, $headers);

        // Agregar datos
        foreach ($data as $row) {
            fputcsv($output, $row);
        }

        fclose($output);
        exit();
    }
}
