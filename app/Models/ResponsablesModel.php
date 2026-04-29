<?php

namespace App\Models;

use CodeIgniter\Model;

class ResponsablesModel extends Model
{
    protected $table = 'responsables';
    protected $primaryKey = 'id_responsable';

    protected $allowedFields = [
        'nom',
        'prenom',
        'id_parcours'
    ];

    // (optionnel) activer les timestamps si tu ajoutes created_at / updated_at
    protected $useTimestamps = false;
}