<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TempatSeeder extends Seeder
{
    public function run()
    {
        $tempat = new \App\Models\TempatModel();
        for ($i = 1; $i <= 5; $i++) {
            $tempat->insert([
                'tempat' => 'Meja ' . $i,
                'keterangan' => 'Keterangan Meja ' . $i,
            ]);
        }
    }
}
