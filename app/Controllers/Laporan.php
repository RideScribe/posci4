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
            'title'     => 'Laporan Penjualan Harian',
            'data'      => $dataPenjualan,
            'transaksi' => $dataTransaksi,
            'filter'    => $this->request->getGet()
        ];

        return view('laporan/penjualan', $data);
    }

    public function pendapatan()
    {
        $month = $this->request->getGet('bulan');

        if ($month) {
            $bulan = date('m', strtotime($month));
            $tahun = date('Y', strtotime($month));
            
        } else {
            $bulan = date('m');
            $tahun = date('Y');            
        }

        $pendapatanBulananDetail = $this->penjualan->select('tanggal, SUM(total_akhir) as total')->where('tunai >', 0)->where('tunai !=', null)->where('YEAR(tanggal)', $tahun)->groupBy('MONTH(tanggal)')->findAll();
        
        $pendapatan_bulanan_array_total = [];
        foreach ($pendapatanBulananDetail as $key => $value) {
            $pendapatan_bulanan_array_total[] = $value['total'];
        }
        
        $averageTahunan = array_sum($pendapatan_bulanan_array_total) / count($pendapatan_bulanan_array_total);
        $minTahunan = min($pendapatan_bulanan_array_total);
        $maxTahunan = max($pendapatan_bulanan_array_total);

        $data = [
            'title'                     => 'Laporan Pendapatan',
            'filter'                    => $this->request->getGet() ? $this->request->getGet() : ['bulan' => date('Y-m')],

            'pendapatanHarianDetail'    => $this->penjualan->select('tanggal, SUM(total_akhir) as total')->where('tunai >', 0)->where('tunai !=', null)->where('YEAR(tanggal)', $tahun)->where('MONTH(tanggal)', $bulan)->groupBy('tanggal')->findAll(),
            'pendapatanBulananDetail'   => $pendapatanBulananDetail,
            'pendapatanHariIniDetail'   => $this->penjualan->select('tanggal, SUM(total_akhir) as total')->where('tunai >', 0)->where('tunai !=', null)->where('tanggal', date('Y-m-d'))->groupBy('tanggal')->findAll(),
            
            'pendapatanBulanan'         => $this->penjualan->selectSum('total_akhir')->where('tunai >', 0)->where('tunai !=', null)->where('YEAR(tanggal)', $tahun)->where('MONTH(tanggal)', $bulan)->first(),
            'pendapatanTahunan'         => $this->penjualan->selectSum('total_akhir')->where('tunai >', 0)->where('tunai !=', null)->where('YEAR(tanggal)', $tahun)->first(),
            'pendapatanHariIni'         => $this->penjualan->selectSum('total_akhir')->where('tunai >', 0)->where('tunai !=', null)->where('tanggal', date('Y-m-d'))->first(),

            'averageBulanan'            => $this->penjualan->selectAvg('total_akhir')->where('tunai >', 0)->where('tunai !=', null)->where('YEAR(tanggal)', $tahun)->where('MONTH(tanggal)', $bulan)->first(),
            'averageTahunan'            => $averageTahunan,
            'averageHariIni'            => $this->penjualan->selectAvg('total_akhir')->where('tunai >', 0)->where('tunai !=', null)->where('tanggal', date('Y-m-d'))->first(),
            
            'minBulanan'                => $this->penjualan->selectMin('total_akhir')->where('tunai >', 0)->where('tunai !=', null)->where('YEAR(tanggal)', $tahun)->where('MONTH(tanggal)', $bulan)->first(),
            'minTahunan'                => $minTahunan,
            'minHariIni'                => $this->penjualan->selectMin('total_akhir')->where('tunai >', 0)->where('tunai !=', null)->where('tanggal', date('Y-m-d'))->first(), // 'minHariIni'                => '

            'maxBulanan'                => $this->penjualan->selectMax('total_akhir')->where('tunai >', 0)->where('tunai !=', null)->where('YEAR(tanggal)', $tahun)->where('MONTH(tanggal)', $bulan)->first(),
            'maxTahunan'                => $maxTahunan,
            'maxHariIni'                => $this->penjualan->selectMax('total_akhir')->where('tunai >', 0)->where('tunai !=', null)->where('tanggal', date('Y-m-d'))->first(),
            
        ];

        return view('laporan/pendapatan', $data);
    }
}
