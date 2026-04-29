<?php

namespace App\Models;
use CodeIgniter\Model;

class EtudiantModel extends Model {
    protected $table = 'etudiant';
    protected $allowedFields = ['nom', 'prenom', 'email'];
}