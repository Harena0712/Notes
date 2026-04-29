<?php

namespace App\Controllers;
use \App\Models\UsersModel;

class UsersController extends BaseController
{
    public function index(): string
    {
        return view('login');
    }

    public function login() {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $usersModel = new UsersModel();
        $user = $usersModel->getUserByEmail($email, $password);

        if ($user) {
            // Authentification réussie
            return redirect()->to('/etudiants');
        } else {
            // Authentification échouée
            return redirect()->back()->with('error', 'Email ou mot de passe incorrect.');
        }
    }
}
