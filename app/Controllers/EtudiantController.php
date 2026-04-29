<?php

namespace App\Controllers;
use App\Models\EtudiantsModel;

class EtudiantController extends BaseController
{
    public function list() {
        $model = new EtudiantsModel();
        $data['etudiants'] = $model->getEtudiants();
        $data['title'] = 'SysInfo - Etudiants';
        $data['titre'] = 'Liste des étudiants';
        return view('etudiants/list', $data);
    }

    public function listPaginated($page = 1) {
        $model = new EtudiantsModel();
        $perPage = 10;
        $data['etudiants'] = $model->paginateEtudiants($perPage, $page);
        $data['pager'] = $model->pager;
        $data['title'] = 'Liste des étudiants paginée';
        return view('etudiants/list_paginated', $data);
    }
}
