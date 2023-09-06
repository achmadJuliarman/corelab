<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserLevelSeeder extends Seeder
{
    public function run()
    {
        //

        $data = [
            [
                'id_level' => 1,
                'nama_level' => 'admin'
            ],
            [
                'id_level' => 2,
                'nama_level' => 'pimpinan'
            ],
            [
                'id_level' => 3,
                'nama_level' => 'guest'
            ]
        ];


        // Simple Queries
        $this->db->query('TRUNCATE user_levels');

        // Using Query Builder
        $this->db->table('user_levels')->insertBatch($data);
    }
}
