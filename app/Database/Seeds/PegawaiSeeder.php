<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'NAMA' => 'NARTO',
                'PASSWORD' => '123456',
                'NIP' => '3272051232004',
                'TELP' => '081222672843',
                'ID_LEVEL' => 1,
            ],
            [
                'NAMA' => 'EDIARUSMAN',
                'PASSWORD' => '123456',
                'NIP' => '3272051232005',
                'TELP' => '081222672843',
                'ID_LEVEL' => 2,
            ],
            [
                'NAMA' => 'DERI',
                'PASSWORD' => '123456',
                'NIP' => '3272051232006',
                'TELP' => '081222672843',
                'ID_LEVEL' => 3,
            ],
        ];


        // Simple Queries
        $this->db->query('TRUNCATE tbl_pegawai');

        // Using Query Builder
        $this->db->table('tbl_pegawai')->insertBatch($data);
    }
}
