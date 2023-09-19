<?php

namespace App\Controllers;

use App\Models\CoreModel;
use App\Controllers\BaseController;

class PagesController extends BaseController
{
    public function index(): string
    {
        $data = [
            "title" => "Dashboard",
            "sub_menu" => "data-dashboard",
            'depth' => [
                'kurang1000' => $this->db->query('SELECT COUNT(No) AS jumlah FROM db_corestorage2007 WHERE DEPTH >= -1000')->getRow(),
                'kurang2000' => $this->db->query('SELECT COUNT(No) AS jumlah FROM db_corestorage2007 WHERE DEPTH >= -2000 AND DEPTH < -1000')->getRow(),
                'kurang3000' => $this->db->query('SELECT COUNT(No) AS jumlah FROM db_corestorage2007 WHERE DEPTH >= -3000 AND DEPTH < -2000')->getRow(),
                'kurang4000' => $this->db->query('SELECT COUNT(No) AS jumlah FROM db_corestorage2007 WHERE DEPTH >= -4000 AND DEPTH < -3000')->getRow(),
                'kurang5000' => $this->db->query('SELECT COUNT(No) AS jumlah FROM db_corestorage2007 WHERE DEPTH >= -5000 AND DEPTH < -4000')->getRow(),
            ],
            "jumlah" => $this->db->query('SELECT COUNT(No) AS jumlah FROM db_corestorage2007')->getRow(),
        ];
        return view('dashboard/index', $data);
    }
}
