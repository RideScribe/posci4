<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\TransaksiModel;
use App\Models\ItemModel;

class PenjualanModel extends Model
{
    protected $table      = 'tb_penjualan';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'invoice',
        'pelanggan',
        'total_harga',
        'diskon',
        'total_akhir',
        'tunai',
        'kembalian',
        'catatan',
        'tanggal',
        'id_user',
        'ip_address'
    ];
    protected $useTimestamps = true;

    public function invoice()
    {
        // ambil invoice terakhir sesuai tanggal hari ini
        $builder = $this->builder($this->table)->selectMax('invoice')->where('tanggal', date('Y-m-d'))->get(1)->getRow();
        // buat format invoice baru
        if (empty($builder->invoice)) {
            $no = '0001';
        } else {
            $data = substr($builder->invoice, -4); // ambil 4 angka ke belakang
            $angka = ((int) $data) + 1;
            $no = sprintf("%'.04d", $angka);
        }
        return "INV" . date('ymd') . $no;
    }

    public function invoiceHariIni()
    {
        $builder = $this->builder($this->table)->selectCount('invoice', 'total')->where('tanggal', date('Y-m-d'))->get(1)->getRow();
        return $builder->total;
    }

    public function simpanPenjualan($post = [])
    {
        $item = new ItemModel();
        $transaksi = new TransaksiModel();

        $db = \Config\Database::connect();
        $db->transBegin();
        // $this->save($post); // simpan transaksi ke tabel penjualan
        if (isset($post['id_penjualan'])) {
            $this->set($post);
            $this->where('id', $post['id_penjualan']);
            $this->update();
        } else {
            $this->insert($post);
        }

        $id_penjualan = $post['id_penjualan'] ?? $this->insertID(); // ambil id penjualan terakhir
        $keranjang = session('keranjang'); // menampung session keranjang
        $data = [];
        foreach ($keranjang as $val) {
            $itemTransaksi = [
                'id_penjualan'  => $id_penjualan,
                'id_item'       => $val['id'],
                'harga_item'    => $val['harga'],
                'jumlah_item'   => $val['jumlah'],
                'diskon_item'   => $val['diskon'],
                'subtotal'      => $val['total'],
                'ip_address'    => $post['ip_address'],
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ];
            array_push($data, $itemTransaksi); // masukan item transaksi ke variabel $data
            // update stok item sesuai idnya
            $item->set('stok', 'stok-' . $val['jumlah'], false);
            $item->where('id', $val['id']);
            $item->update();
        }
        $transaksi->where('id_penjualan', $id_penjualan)->delete();
        $transaksi->insertBatch($data); // tambahkan ke tabel transaksi

        if ($db->transStatus() === FALSE) {
            $db->transRollback();
            return ['status' => false, 'data' => $data];
        } else {
            // kosongkang keranjang
            unset($_SESSION['keranjang']);
            unset($_SESSION['pelanggan']);
            return ['status' => $db->transCommit(), 'id' => $id_penjualan];
        }
    }


    public function laporanPengunjung($tahun)
    {
        return $this->builder('tb_bulan_tahun')->select('bulan')->selectCount('jumlah_item', 'total')->join('tb_transaksi', 'date_format(created_at, "%m-%Y") = bln_thn', 'left')->where('tahun', $tahun)->groupBy('bln_thn')->get()->getResult();
    }

    public function laporanPendapatan($tahun)
    {
        return $this->builder('tb_bulan_tahun')->select('bulan')->selectSum('subtotal', 'total')->join('tb_transaksi', 'date_format(created_at, "%m-%Y") = bln_thn', 'left')->where('tahun', $tahun)->groupBy('bln_thn')->get()->getResult();
    }

    

    public function bayarInvoice($id, $data)
    {
        $this->set($data);
        $this->where('id', $id);
        $this->update();

        return $this->affectedRows();
    }

    // penjualan harian
    public function penjualanHarian($tanggal)
    {
        $builder = $this->builder($this->table)->selectSum('total_akhir', 'total')->where('tanggal', $tanggal)->get(1)->getRow();
        return $builder->total;
    }

    // penjualan bulanan
    public function penjualanBulanan($bulan, $tahun)
    {
        $builder = $this->builder($this->table)->selectSum('total_akhir', 'total')->where('month(tanggal)', $bulan)->where('year(tanggal)', $tahun)->get(1)->getRow();
        return $builder->total;
    }

    public function cekInvoice($invoice)
    {
        return $this->builder($this->table)->where('invoice', $invoice)->get(1)->getRow();
    }
}
