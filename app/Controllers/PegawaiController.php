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
        $validInput = $this->validate([
            'nama' => [
                'rules' => 'required|is_unique[tbl_pegawai.NAMA]',
                'errors' => [
                    'required' => 'Nama Pegawai Tidak Boleh Kosong',
                    'is_unique' => 'Nama / Username Pegawai sudah ada'
                ]
            ],
            'telp' => [
                'rules' => 'required|min_length[11]|numeric',
                'errors' => [
                    'required' => 'No Telp Tidak Boleh Kosong',
                    'min_length' => 'No telp Minimal 11 karakter',
                    'numeric' => 'No telp Harus Berupa Angka'
                ]
            ]
        ]);

        if(!$validInput) {
            $validation = $this->validator;
            return redirect()->to('pegawai')->withInput()->with('validation', $validation); // $validation ini akan digenerate sebagai data session
        }

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
