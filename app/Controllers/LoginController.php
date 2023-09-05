<?php

namespace App\Controllers;

use App\Models\PegawaiModel;
use App\Controllers\BaseController;

class LoginController extends BaseController
{
    public function index()
    {
        $data = [];
        helper(['form']);


        if ($this->request->getMethod() == 'post') {

            $rules = [
                'NAMA' => 'required|min_length[5]|max_length[50]',
                'PASSWORD' => 'required|min_length[6]|max_length[50]',
            ];

            $errors = [
                'PASSWORD' => [
                    'validateUser' => 'Nama dan Password don\'t match'
                ]
            ];

            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new PegawaiModel();

                $user = $model->where('NAMA', $this->request->getVar('NAMA'))->first();

                $this->setUserMethod($user);

                return redirect()->to('pegawai');
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
