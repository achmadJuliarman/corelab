<?php

namespace App\Controllers;

use App\Models\CoreModel;
use App\Controllers\BaseController;

class PagesController extends BaseController
{
    public function index(): string
    {
        $data = [
            "title" => "Pages",
            "sub_menu" => "dashboard",
        ];
        // dd($data['core']);
        return view('dashboard/index', $data);
    }

    public function getDataFromDatabase()
    {
        $coreModel = new CoreModel();
        $depthData = $coreModel->select('DEPTH')->findAll();
        return json_encode($depthData);
    }

    public function getDataForChart()
    {
        $coreModel = new CoreModel();
        // $depthData = $coreModel->select('DEPTH')->findAll();
        $dataPerDepth = $this->hitungDataPerDepth();

        // Ubah data kedalaman menjadi array
        // $depthArray = [];
        // foreach ($depthData as $data) {
        //     $depthArray[] = $data->DEPTH;
        // }

        return json_encode($dataPerDepth);
        // return json_encode($depthArray);
    }

    public function hitungDataPerDepth()
    {
        $coreModel = new CoreModel();

        // Gunakan SQL Builder untuk mengelompokkan dan menghitung data berdasarkan depth
        $query = $coreModel->select('DEPTH, COUNT(*) as jumlah_row')
            ->groupBy('DEPTH')
            ->findAll();

        // Buat array untuk menyimpan data hasil perhitungan
        $dataPerDepth = [];

        // Iterasi hasil query dan tambahkan ke array
        foreach ($query as $result) {
            $dataPerDepth[$result->DEPTH] = $result->jumlah_row;
        }

        return json_encode($dataPerDepth);
    }
}
