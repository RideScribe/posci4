<?php

namespace App\Controllers;

use App\Models\ItemModel;
use App\Models\PelangganModel;
use App\Models\PemasokModel;
use App\Models\PenjualanModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    protected $produk;
    protected $pemasok;
    // protected $pelanggan;
    protected $pengguna;
    protected $penjualan;

    public function __construct()
    {
        $this->produk = new ItemModel();
        $this->pemasok = new PemasokModel();
        // $this->pelanggan = new PelangganModel();
        $this->pengguna = new UserModel();
        $this->penjualan = new PenjualanModel();
    }
    public function index()
    {
        $tahun = $this->request->getGet('tahun');

        $data = [
            'title'     => 'Dashboard',
            'produk'    => $this->produk->countAllResults(),
            'pemasok'  => $this->pemasok->countAllResults(),
            'invoice_hari_ini' => $this->penjualan->invoiceHariIni(),
            // 'pelanggan' => $this->pelanggan->countAllResults(),
            'pengguna'  => $this->pengguna->countAllResults(),
            'harian'    => $this->penjualan->penjualanHarian(date('Y-m-d')),
            // 'bulanan'   => $this->penjualan->penjualanBulanan(date('m'), date('Y')),
            'bulanan'   => $this->penjualan->penjualanBulanan(date('m', strtotime($tahun ?? date('Y-m'))), date('Y', strtotime($tahun ?? date('Y-m')))),
            'tahun'     => $tahun ?? date('Y-m'),
        ];

        echo view('dashboard', $data);
    }

    public function laporan_pengunjung()
    {
        $data = $this->penjualan->laporanPengunjung(date('Y'));
        return $this->response->setJSON($data);
    }

    public function laporan_pendapatan()
    {
        $tahun = $this->request->getGet('tahun');
        
        $data = $this->penjualan->laporanPendapatan($tahun ?? date('Y'));
        return $this->response->setJSON($data);
    }
}
