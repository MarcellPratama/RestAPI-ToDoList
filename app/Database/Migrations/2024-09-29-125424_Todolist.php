<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Todolist extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idkegiatan' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'kegiatan' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => '10',
            ],
        ]);
        $this->forge->addKey('idkegiatan', true);
        $this->forge->createTable('todolist');
    }

    public function down()
    {
        $this->forge->dropTable('todolist');
    }
}
