<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pengaturan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => true,
			],
			'nama_toko' => [
				'type' => 'VARCHAR',
				'constraint' => 20,
			],
			'no_telp' => [
				'type' => 'VARCHAR',
				'constraint' => 20,
			],
			'alamat' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('tb_pengaturan', true);
	}

	public function down()
	{
		$this->forge->dropTable('tb_pengaturan', true);
	}
}
