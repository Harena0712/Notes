<?php

namespace App\Models;

use CodeIgniter\Model;

class NotesModel extends Model
{
    protected $table = 'notes';
    protected $primaryKey = 'id_note';

    protected $allowedFields = [
        'idParcours_matiere',
        'id_etudiant',
        'note'
    ];

    protected $useTimestamps = false;
}