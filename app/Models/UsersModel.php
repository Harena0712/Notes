<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id_user';

    protected $allowedFields = [
        'email', 'password'
    ];


    public function getUserByEmail($email, $password) {
        return $this->where('email', $email)->where('password', $password)->first();
    }

    protected $useTimestamps = false;
}