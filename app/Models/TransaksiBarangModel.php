<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiBarangModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_transaksi_barang';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_barang', 'id_pemasok', 'id_user', 'harga', 'jml_beli', 'total'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


    public function pembelianBulananSum($bulan, $tahun) 
    {
        $this->select('updated_at, SUM(total) as total');
        $this->where('MONTH(created_at)', $bulan);
        $this->where('YEAR(created_at)', $tahun);
        return $this->first();
    }

    public function pembelianBulananGrouped($bulan, $tahun) 
    {
        $this->select('tb_transaksi_barang.*');
        $this->where('MONTH(tb_transaksi_barang.created_at)', $bulan);
        $this->where('YEAR(tb_transaksi_barang.created_at)', $tahun);
        $this->groupBy('DATE(tb_transaksi_barang.created_at)');
        return $this->findAll();   
    }

    public function pembelianBulananDetail($tanggal)
    {
        $this->select('tb_transaksi_barang.*, tb_barang.barang, tb_barang.stok AS total_stok, tb_pemasok.nama_pemasok, tb_stok.id_user, tb_stok.jumlah, tb_stok.keterangan, tb_stok.tipe, tb_users.nama');
        $this->join('tb_barang', 'tb_barang.id = tb_transaksi_barang.id_barang');
        $this->join('tb_pemasok', 'tb_pemasok.id = tb_transaksi_barang.id_pemasok');
        $this->join('tb_stok', 'tb_stok.id_barang = tb_barang.id');
        $this->join('tb_users', 'tb_stok.id_user = tb_users.id');
        $this->where('DATE(tb_transaksi_barang.created_at)', $tanggal);
        $this->groupBy('tb_transaksi_barang.created_at');
        return $this;
    }

    public function pembelianTahunanSum($tahun) 
    {
        $this->select('updated_at, SUM(total) as total');
        $this->where('YEAR(created_at)', $tahun);
        return $this->first();
    }

    public function pembelianTahunanGrouped($tahun) 
    {
        $this->select('tb_transaksi_barang.*');
        $this->where('YEAR(tb_transaksi_barang.created_at)', $tahun);
        $this->groupBy('MONTH(tb_transaksi_barang.created_at)');
        return $this->findAll();   
    }

    public function pembelianTahunanDetail($tahun) 
    {
        $this->select('tb_transaksi_barang.*, tb_barang.barang, tb_barang.stok AS total_stok, tb_pemasok.nama_pemasok, tb_stok.id_user, tb_stok.jumlah, tb_stok.keterangan, tb_stok.tipe, tb_users.nama');
        $this->join('tb_barang', 'tb_barang.id = tb_transaksi_barang.id_barang');
        $this->join('tb_pemasok', 'tb_pemasok.id = tb_transaksi_barang.id_pemasok');
        $this->join('tb_stok', 'tb_stok.id_barang = tb_barang.id');
        $this->join('tb_users', 'tb_stok.id_user = tb_users.id');
        $this->where('YEAR(tb_transaksi_barang.created_at)', $tahun);
        $this->groupBy('tb_transaksi_barang.id');
        return $this->findAll();   
    }

    public function pembeliaHariIniSum() 
    {
        $this->select('updated_at, SUM(total) as total');
        $this->where('DATE(created_at)', date('Y-m-d'));
        return $this->first();
    }

    public function pembeliaHariIniDetail() 
    {
        $this->select('tb_transaksi_barang.*, tb_barang.barang, tb_barang.stok AS total_stok, tb_pemasok.nama_pemasok, tb_stok.id_user, tb_stok.jumlah, tb_stok.keterangan, tb_stok.tipe, tb_users.nama');
        $this->join('tb_barang', 'tb_barang.id = tb_transaksi_barang.id_barang');
        $this->join('tb_pemasok', 'tb_pemasok.id = tb_transaksi_barang.id_pemasok');
        $this->join('tb_stok', 'tb_stok.id_barang = tb_barang.id');
        $this->join('tb_users', 'tb_stok.id_user = tb_users.id');
        $this->where('DATE(tb_transaksi_barang.created_at)', date('Y-m-d'));
        $this->groupBy('tb_transaksi_barang.id');
        return $this->findAll();   
    }
}
