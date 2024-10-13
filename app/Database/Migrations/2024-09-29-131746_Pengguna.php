<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pengguna extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'username' => [
                'type'           => 'VARCHAR',
                'constraint'     => 50,
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
        ]);
        $this->forge->addKey('username', true);
        $this->forge->createTable('pengguna');
    }

    public function down()
    {
        $this->forge->dropTable('pengguna');
    }
}
