<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Core extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'No' => [
                'type'           => 'INT',
                'constraint'     => 254,
                'auto_increment' => true,
            ],
            'SHIP' => [
                'type'       => 'VARCHAR',
                'constraint' => '16',
            ],
            'CRUISE_' => [
                'type'       => 'VARCHAR',
                'constraint' => '15',
            ],
            'SAMPEL_NUM' => [
                'type'       => 'VARCHAR',
                'constraint' => '17',
            ],
            'DEVICE' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'SUM' => [
                'type'       => 'VARCHAR',
                'constraint' => '11',
            ],
            'DATE' => [
                'type'       => 'DATE',
            ],
            'DEPTH' => [
                'type'       => 'VARCHAR',
                'constraint' => '9',
            ],
            'LENGTH' => [
                'type'       => 'VARCHAR',
                'constraint' => '8',
            ],
            'LOCATION' => [
                'type'       => 'VARCHAR',
                'constraint' => '23',
            ],
            'SED_TYPE' => [
                'type'       => 'VARCHAR',
                'constraint' => '34',
            ],
            'STORAGE' => [
                'type'       => 'VARCHAR',
                'constraint' => '18',
            ],
            'REMARK' => [
                'type'       => 'VARCHAR',
                'constraint' => '29',
            ],
            'VOL' => [
                'type'       => 'VARCHAR',
                'constraint' => '6',
            ],
            'LATITUDE' => [
                'type'       => 'DOUBLE',
            ],
            'LONGITUDE' => [
                'type'       => 'DOUBLE',
            ],
            'LOKASI_RAK' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'FOTO_SPESIMEN' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'NO_KLASIFIKASI_LAPORAN' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'PETA_LINTASAN' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'STATUS_ANALISA' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
        ]);
        $this->forge->addKey('No', true);
        $this->forge->createTable('db_corestorage2007');
    }

    public function down()
    {
        $this->forge->dropTable('db_corestorage2007', true);
    }
}
