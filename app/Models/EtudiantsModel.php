<?php

namespace App\Models;

use CodeIgniter\Model;

class EtudiantsModel extends Model
{
    protected $table = 'etudiants';
    protected $primaryKey = 'id_etudiant';

    protected $allowedFields = [
        'nom',
        'prenom',
        'date_naisssance'
    ];

    protected $useTimestamps = false;

    public function getEtudiants() {
        return $this->findAll();
    }

    public function getById($id) {
        return $this->where('id_etudiant', $id)->first();
    }

    public function paginateEtudiants($perPage, $page) {
        return $this->paginate($perPage, 'default', $page);
    }

    
}