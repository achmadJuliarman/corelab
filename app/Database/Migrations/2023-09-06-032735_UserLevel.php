<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserLevel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_level' => [
                'type'           => 'INT',
                'constraint'     => 11
            ],
            'nama_level' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ]
        ]);
        $this->forge->addKey('id_level', true);
        $this->forge->createTable('user_levels');
    }

    public function down()
    {
        $this->forge->dropTable('user_levels', true);
    }
}
