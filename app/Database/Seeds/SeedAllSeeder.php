<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeedAllSeeder extends Seeder
{
    public function run()
    {
        $this->call('UserLevelSeeder');
        $this->call('PegawaiSeeder');
        $this->call('CoreSeeder');
    }
}
