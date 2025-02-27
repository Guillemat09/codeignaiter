<?php

namespace App\Controllers;

use App\Models\EventModel;
use CodeIgniter\Controller;

class EventController extends BaseController
{
    protected $eventModel;

    public function __construct()
    {
        $this->eventModel = new EventModel();
    }

    // Obtener todos los eventos activos
    public function fetchEvents()
    {
        $eventos = $this->eventModel->where('DELETION_DATE', null)->findAll();
        $formattedEvents = array_map(function($evento) {
            return [
                'id' => $evento['PK_ID_EVENT'],
                'title' => $evento['TITLE'],
                'start' => $evento['START_DATE'],
                'end' => $evento['END_DATE'] ?? $evento['START_DATE'],
            ];
        }, $eventos);

        return $this->response->setJSON($formattedEvents);
    }

    // Agregar un nuevo evento
    public function addEvent()
    {
        log_message('debug', 'Datos recibidos en addEvent: ' . json_encode($this->request->getPost()));
    
        $datos = $this->request->getPost();
    
        if (!$this->validate([
            'TITLE'       => 'required',
            'START_DATE'  => 'required|valid_date[Y-m-d H:i:s]',
        ])) {
            log_message('error', 'Validación fallida en addEvent');
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Datos inválidos']);
        }
    
        if ($this->eventModel->insert($datos)) {
            log_message('debug', 'Evento agregado correctamente');
            return $this->response->setJSON(['mensaje' => 'Evento agregado correctamente']);
        }
    
        log_message('error', 'Error al insertar evento en la base de datos');
        return $this->response->setStatusCode(500)->setJSON(['error' => 'Error al agregar el evento']);
    }
    

    // Eliminar un evento (borrado lógico)
    public function deleteEvent($id)
    {
        if ($this->eventModel->find($id)) {
            $this->eventModel->update($id, ['DELETION_DATE' => date('Y-m-d H:i:s')]);
            return $this->response->setJSON(['mensaje' => 'Evento eliminado correctamente']);
        }
        return $this->response->setStatusCode(404)->setJSON(['error' => 'Evento no encontrado']);
    }
}
