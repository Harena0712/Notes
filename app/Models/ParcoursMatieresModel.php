<?php

namespace App\Models;

use CodeIgniter\Model;

class ParcoursMatiereModel extends Model
{
    protected $table = 'parcours_matieres';
    protected $primaryKey = 'idParcours_matiere';

    protected $allowedFields = [
        'id_parcours',
        'id_matiere',
        'coefficient'
    ];

    protected $useTimestamps = false;
}