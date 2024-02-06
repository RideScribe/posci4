<?php

namespace App\Models;

use CodeIgniter\Model;

class StokModel extends Model
{
    protected $table      = 'tb_stok';
    protected $primaryKey = 'id_stok';
    // protected $useSoftDeletes = true;
    protected $allowedFields = ['tipe', 'id_barang', 'id_pemasok', 'id_trbrg', 'jumlah', 'keterangan', 'id_user', 'ip_address'];
    protected $useTimestamps = true;
}
