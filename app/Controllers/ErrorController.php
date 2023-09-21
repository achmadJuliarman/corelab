<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class ErrorController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Error',
            'message' => 'Anda tidak memiliki akses ke halaman ini.'
        ];

        echo view('error_view', $data);
    }
}
