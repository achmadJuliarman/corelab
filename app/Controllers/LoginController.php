<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class LoginController extends BaseController
{
    public function index()
    {
        $data = [];
        helper(['form']);
        echo view('templates/header', $data);
        echo view('login');
        echo view('templates/footer');
    }
}
