<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tempat extends Migration
{
    public function up()
    {
        // tempat duduk / meja
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 3,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'tempat' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'keterangan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('tb_tempat', true);
    }

    public function down()
    {
        $this->forge->dropTable('tb_tempat', true);
    }
}
