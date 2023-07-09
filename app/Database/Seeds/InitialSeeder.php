<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InitialSeeder extends Seeder
{
    public function run()
    {
        // call seeders
        $this->call('BulantahunSeeder');
        $this->call('PemasokSeeder');
        $this->call('UserSeeder');
        $this->call('PengaturanSeeder');
        $this->call('TempatSeeder');
    }
}
