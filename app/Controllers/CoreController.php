<?php

namespace App\Controllers;

class CoreController extends BaseController
{
    public function index(): string
    {
        $data = [
            "title" => "Core",
            "sub_menu" => "data-core",
            "core" => $this->coreModel->orderBy('No', 'DESC')->findAll()
        ];
        // dd($data['core']);
        return view('core/index', $data);
    }

    public function tambah()
    {
        $config['upload_path']   = './assets/img';

        // ambil file foto spesimen
        $fotoSpesimen = $this->request->getFile('foto');

        // cek apakah ada foto atau tidak
        if($fotoSpesimen->getError() == 4){
            $fotoName = 'default.jpg';
        }else{
            $fotoName = $fotoSpesimen->getRandomName();
            $fotoSpesimen->move(ROOTPATH . 'public/assets/img', $fotoName);
        }

        $data = [
            'SHIP' => $this->request->getVar('ship'),
            'CRUISE_' => $this->request->getVar('cruise'),
            'SAMPEL_NUM' => $this->request->getVar('sampel_num'),
            'DEVICE' => $this->request->getVar('device'),
            'SUM' => $this->request->getVar('sum'),
            'DATE' => $this->request->getVar('date'),
            'DEPTH' => $this->request->getVar('depth'),
            'LENGTH' => $this->request->getVar('length'),
            'LOCATION' => $this->request->getVar('location'),
            'SED_TYPE' => $this->request->getVar('sed_type'),
            'STORAGE' => $this->request->getVar('storage'),
            'REMARK' => $this->request->getVar('remark'),
            'LATITUDE' => $this->request->getVar('latitude'),
            'LONGITUDE' => $this->request->getVar('longitude'),
            'FOTO_SPESIMEN' => $fotoName,
        ];

        $this->coreModel->save($data);
        return redirect()->to('core/')->with('success', 'Berhasil Tambah Data CORE');
    }


    public function hapus()
    {
        // cari gambar berdasarkan id
        $no = $this->request->getVar('no'); 
        $foto = $this->coreModel->find($no);
        // hapus gambar 
        if ($foto->FOTO_SPESIMEN != 'default.png') {
            unlink('assets/img/'.$foto->FOTO_SPESIMEN);
        }
        $this->coreModel->delete($no);
        return redirect()->to('core/')->with('success', 'Berhasil Hapus Data CORE');
    }
}
