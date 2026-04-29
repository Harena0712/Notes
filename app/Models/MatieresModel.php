<?php

namespace App\Models;

use CodeIgniter\Model;

class MatieresModel extends Model
{
    protected $table = 'matieres';
    protected $primaryKey = 'id_matiere';

    protected $allowedFields = [
        'libelle',
        'semestre',
        'optionnel'
    ];

    protected $useTimestamps = false;
}