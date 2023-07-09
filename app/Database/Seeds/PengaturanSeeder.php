<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PengaturanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'nama_toko' => 'Restoran Legita',
            'no_telp' => '081234567890',
            'alamat' => 'Jl. Raya Jember No. 123',
        ];
        $this->db->table('tb_pengaturan')->insert($data);
    }
}
