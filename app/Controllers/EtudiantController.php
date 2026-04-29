<?php

namespace App\Controllers;
use App\Models\EtudiantsModel;

class EtudiantController extends BaseController
{
    public function list() {
        $model = new EtudiantsModel();
        $data['etudiants'] = $model->getEtudiants();
        $data['title'] = 'Liste des étudiants';
        return view('etudiants/list', $data);
    }
}
