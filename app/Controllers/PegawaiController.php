<?php

namespace App\Controllers;

class PegawaiController extends BaseController
{
    public function index(): string
    {
        $data = [
            "title" => "Pegawai",
            "sub_menu" => "data-pegawai",
            "pegawai" => $this->pegawaiModel->orderBy('NO', 'DESC')->findAll(),
            "levels" => $this->userLevelModel->findAll()
        ];
        // dd($data['pegawai']);
        return view('pegawai/index', $data);
    }

    public function tambah()
    {
        $data = [
            'NAMA' => $this->request->getVar('nama'),
            'PASSWORD' => $this->request->getVar('pass'),
            'NIP' => $this->request->getVar('nip'),
            'TELP' => $this->request->getVar('telp'),
            'USERLEVELID' => $this->request->getVar('level')
        ];

        $this->pegawaiModel->save($data);

        return redirect()->to('pegawai/')->with('success', 'Berhasil Tambah Data Pegawai');
    }


    public function hapus()
    {
        $no = $this->request->getVar('no');
        $this->pegawaiModel->delete($no);
        return redirect()->to('pegawai/')->with('success', 'Berhasil Hapus Data Pegawai');
    }
}
