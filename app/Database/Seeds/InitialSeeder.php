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

        // Master data seeders
        $kategori = new \App\Models\KategoriModel();
        $kategori->insertBatch([
            ['nama_kategori' => 'Makanan'],
            ['nama_kategori' => 'Minuman'],
            ['nama_kategori' => 'Snack'],
            ['nama_kategori' => 'Lainnya']
        ]);

        $unit = new \App\Models\UnitModel();
        $unit->insertBatch([
            ['nama_unit' => 'Porsi'],
            ['nama_unit' => 'CUP'],
            ['nama_unit' => 'Item'],
        ]);

        $item = new \App\Models\ItemModel();
        $item->insertBatch([
            [
                'barcode' => 'MKN-0001',
                'nama_item' => 'Nasi Goreng',
                'id_kategori' => 1,
                'id_unit' => 1,
                'id_pemasok' => 1,
                'harga' => 20000,
                'stok' => 100,
                'gambar' => 'gambar.jpg',
            ],
            [
                'barcode' => 'MKN-0002',
                'nama_item' => 'Mie Goreng',
                'id_kategori' => 1,
                'id_unit' => 1,
                'id_pemasok' => 1,
                'harga' => 20000,
                'stok' => 100,
                'gambar' => 'gambar.jpg',
            ],
            [
                'barcode' => 'MKN-0003',
                'nama_item' => 'Nasi Goreng Seafood',
                'id_kategori' => 1,
                'id_unit' => 1,
                'id_pemasok' => 1,
                'harga' => 25000,
                'stok' => 100,
                'gambar' => 'gambar.jpg',
            ],
            [
                'barcode' => 'MKN-0004',
                'nama_item' => 'Nasi Goreng Ayam',
                'id_kategori' => 1,
                'id_unit' => 1,
                'id_pemasok' => 1,
                'harga' => 25000,
                'stok' => 100,
                'gambar' => 'gambar.jpg',
            ],
            [
                'barcode' => 'MNM-0001',
                'nama_item' => 'Es Teh Manis',
                'id_kategori' => 2,
                'id_unit' => 2,
                'id_pemasok' => 1,
                'harga' => 5000,
                'stok' => 100,
                'gambar' => 'gambar.jpg',
            ],
            [
                'barcode' => 'MNM-0002',
                'nama_item' => 'Matcha Latte',
                'id_kategori' => 2,
                'id_unit' => 2,
                'id_pemasok' => 1,
                'harga' => 10000,
                'stok' => 100,
                'gambar' => 'gambar.jpg',
            ],
            [
                'barcode' => 'MNM-0003',
                'nama_item' => 'Taro Latte',
                'id_kategori' => 2,
                'id_unit' => 2,
                'id_pemasok' => 1,
                'harga' => 10000,
                'stok' => 100,
                'gambar' => 'gambar.jpg',
            ],
            [
                'barcode' => 'MNM-0004',
                'nama_item' => 'Es Jeruk',
                'id_kategori' => 2,
                'id_unit' => 2,
                'id_pemasok' => 1,
                'harga' => 5000,
                'stok' => 100,
                'gambar' => 'gambar.jpg',
            ],
        ]);
    }
}
