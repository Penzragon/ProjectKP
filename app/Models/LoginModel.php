<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{

    public function loginCheck($username, $password)
    {
        return $this->db->table('admin')
            ->where(array('username' => $username, 'password' => $password))
            ->get()->getRowArray();
    }
}
