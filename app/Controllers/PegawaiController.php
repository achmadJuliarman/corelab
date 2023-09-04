<?php

namespace App\Controllers;

class PegawaiController extends BaseController
{
    public function index(): string
    {
        $data = [
            "title" => "Pegawai",
            "sub_menu" => "data-pegawai",
            "pegawai" => $this->pegawaiModel->orderBy('NO', 'DESC')->findAll()
        ];
        // dd($data['pegawai']);
        return view('pegawai/index', $data);
    }
}
