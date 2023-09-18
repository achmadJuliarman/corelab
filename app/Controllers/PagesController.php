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
                'kurang2200' => $this->db->query('SELECT COUNT(No) AS jumlah FROM db_corestorage2007 WHERE DEPTH >= -2200')->getRow(),
                'kurang4400' => $this->db->query('SELECT COUNT(No) AS jumlah FROM db_corestorage2007 WHERE DEPTH >= -4400 AND DEPTH < -2200')->getRow(),
                'kurang6600' => $this->db->query('SELECT COUNT(No) AS jumlah FROM db_corestorage2007 WHERE DEPTH >= -6600 AND DEPTH < -4400')->getRow(),
                'kurang8800' => $this->db->query('SELECT COUNT(No) AS jumlah FROM db_corestorage2007 WHERE DEPTH >= -8800 AND DEPTH < -6600')->getRow(),
                'kurang11100' => $this->db->query('SELECT COUNT(No) AS jumlah FROM db_corestorage2007 WHERE DEPTH >= -11100 AND DEPTH < -8800')->getRow(),
            ]
        ];
        return view('dashboard/index', $data);
    }

}
