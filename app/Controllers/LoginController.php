<?php

namespace App\Controllers;

use App\Models\PegawaiModel;
use App\Controllers\BaseController;
use PhpParser\Node\Stmt\Echo_;

class LoginController extends BaseController
{
    public function index()
    {
        $data = [];
        helper(['form']);


        if ($this->request->getMethod() == 'post') {

            $rules = [
                'NAMA' => 'required|min_length[1]|max_length[50]',
                'PASSWORD' => 'required|min_length[6]|max_length[50]',
            ];

            $errors = [
                'PASSWORD' => [
                    'validateUser' => 'Nama dan Password tidak cocok'
                ]
            ];

            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new PegawaiModel();
                // Ambil nilai 'NAMA' dari input pengguna
                $nama = $this->request->getVar('NAMA');
                $user = $model->where('NAMA', $nama)->first();

                // Periksa apakah kata sandi sesuai dengan yang ada di database
                if ($user && $this->request->getVar('PASSWORD') == $user->PASSWORD) {
                    $this->setUserMethod($user);
                    return redirect()->to('pegawai');
                } else {
                    if (!$user) {
                        $data['usernameError'] = 'Username belum ada';
                    } else {
                        $data['passwordError'] = 'Password salah';
                    }
                }
            }
        }


        echo view('templates/header', $data);
        echo view('login');
        echo view('templates/footer');
    }

    private function setUserMethod($user)
    {
        $data = [
            'NO' => $user->NO,
            'NAMA' => $user->NAMA,
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }

    public function logout()
    {
        // Destroy the user's session
        session()->destroy();

        // Redirect to the login page or any other desired page
        return redirect()->to('login');
    }
}
