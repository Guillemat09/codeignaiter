<?php
namespace App\Models;

use CodeIgniter\Model;

class EventModel extends Model
{
    protected $table = 'EVENT';  // Asegúrate de que el nombre coincide con tu base de datos
    protected $primaryKey = 'PK_ID_EVENT';
    protected $allowedFields = ['TITLE', 'START_DATE', 'END_DATE', 'DESCRIPTION_ES', 'DESCRIPTION_ENG', 'DELETION_DATE'];
}

