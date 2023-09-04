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
}
