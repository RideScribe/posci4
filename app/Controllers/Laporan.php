<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Irsyadulibad\DataTables\DataTables;

class Laporan extends BaseController
{
    protected $penjualan;
    protected $transaksi;

    public function __construct()
    {
        $this->penjualan = new \App\Models\PenjualanModel();
        $this->transaksi = new \App\Models\TransaksiModel();
    }

    public function index()
    {
        return redirect()->to(base_url('laporan/penjualan'));
    }

    public function penjualan()
    {        
        $tanggal = $this->request->getGet('tanggal');
        $status = $this->request->getGet('status');

        $dataPenjualan = $this->penjualan->select('tb_penjualan.*, tb_users.nama as kasir')
            ->join('tb_users', 'tb_users.id = tb_penjualan.id_user', 'left')
            ->orderBy('tb_penjualan.id', 'desc');

        if ($tanggal) {
            $dataPenjualan->where('tanggal', $tanggal);
        } else {
            $dataPenjualan->where('tanggal', date('Y-m-d'));
        }

        if ($status) {
            if ($status == 1) {
                $dataPenjualan->where('tunai >', 0);
            } else {
                $dataPenjualan->where('tunai', 0)->orWhere('tunai', null);
            }

        } 

        $dataPenjualan = $dataPenjualan->findAll();


        $dataTransaksi = [];
        foreach ($dataPenjualan as $item) {
            $dataTransaksi[$item['id']] = $this->transaksi->select('tb_transaksi.*, tb_item.nama_item, tb_item.barcode, tb_item.stok')
                ->join('tb_item', 'tb_item.id = tb_transaksi.id_item', 'left')
                ->where('id_penjualan', $item['id'])
                ->findAll();
        }

        $data = [
            'title'     => 'Laporan Penjualan Hari Ini',
            'data'      => $dataPenjualan,
            'transaksi' => $dataTransaksi,
            'filter'    => $this->request->getGet()
        ];

        return view('laporan/penjualan', $data);
    }

    public function getLaporanPenjualan()
    {
        $data = $this->penjualan->select('tb_penjualan.id, tb_penjualan.invoice, tb_penjualan.tanggal, tb_penjualan.tunai, tb_penjualan.pelanggan, tb_users.nama as kasir')
            ->join('tb_users', 'tb_users.id = tb_penjualan.id_user', 'left')
            ->orderBy('tb_penjualan.id', 'desc')
            ->findAll();

        // loop data id and get the transaksi
        $transaksi = [];
        foreach ($data as $item) {
            $transaksi[$item['id']] = $this->transaksi->where('id_penjualan', $item['id'])->findAll();
        }

        dd($transaksi[3]);

        dd($data);
    }
}
