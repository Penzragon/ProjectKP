<?php

namespace App\Controllers;

use App\Models\LoginModel;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->LoginModel = new LoginModel();
    }

    public function index()
    {
        return view('/admin/login');
    }

    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->LoginModel->loginCheck($username, $password);

        if (($user['username'] == $username) && ($user['password'] == $password)) {
            return redirect()->to(base_url('admin/dashboard'));
        } else {
            session()->setFlashdata('gagal', 'Username atau Password salah!');
            return redirect()->to(base_url('auth'));
        }
    }
}

// if (!$this->validate([
//     'username' => 'required',
//     'password' => 'required'
// ])) {
//     $validation = \Config\Services::validation();
//     return view('admin/login');
// } else {
//     $username = $this->request->getPost('username');
//     $password = $this->request->getPost('password');

//     $user = $this->LoginModel->loginCheck($username, $password);

//     if (($user['username'] == $username) && ($user['password'] == $password)) {
//         return redirect()->to(base_url('admin'));
//     } else {
//         session()->setFlashdata('gagal', 'Username atau Password salah!');
//         return redirect()->to(base_url('auth'));
//     }
// }