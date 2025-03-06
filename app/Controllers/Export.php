<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\AdminModel;
use App\Models\ReportModel;
use App\Models\ArtistaModel;
use App\Models\FestivalModel;  // Asegúrate de tener este modelo
use App\Models\PatrocinadorModel;  // Asegúrate de tener este modelo
use App\Models\EntradaModel;  // Asegúrate de tener este modelo

class Export extends BaseController
{
    public function exportCSV($type = 'users')
    {
        switch ($type) {
            case 'users':
                $model = new UserModel();
                $filename = "usuarios.csv";
                $headers = ['ID', 'Nombre', 'Correo', 'Rol', 'Fecha de Creación'];
                break;

            case 'artistas':
                $model = new ArtistaModel();
                $filename = "artistas.csv";
                $headers = ['ID', 'Nombre', 'Descripción', 'Género', 'Fecha de Creación'];
                break;

            case 'festivales':
                $model = new FestivalModel();
                $filename = "festivales.csv";
                $headers = ['ID', 'Nombre', 'Descripción', 'Fecha de Inicio', 'Fecha de Fin', 'Lugar', 'Fecha de Creación'];
                break;

            case 'patrocinadores':
                $model = new PatrocinadorModel();
                $filename = "patrocinadores.csv";
                $headers = ['ID', 'Nombre', 'Descripción', 'Contacto', 'Festival ID', 'Fecha de Creación'];
                break;

            case 'entradas':
                $model = new EntradaModel();
                $filename = "entradas.csv";
                $headers = ['ID', 'Usuario ID', 'Festival ID', 'Tipo de Entrada', 'Precio', 'Fecha de Compra'];
                break;

            default:
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

