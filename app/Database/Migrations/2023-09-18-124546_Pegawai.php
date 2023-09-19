<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pegawai extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'NO' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'NAMA' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'PASSWORD' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'NIP' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'TELP' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'ID_LEVEL' => [
                'type'       => 'INT',
                'constraint' => '250',
            ]
        ]);
        $this->forge->addKey('NO', true);
        $this->forge->createTable('tbl_pegawai');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_pegawai', true);
    }
}
