<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Irsyadulibad\DataTables\DataTables;

class Laporan extends BaseController
{
    protected $penjualan;
    protected $transaksi;
    protected $transaksi_barang;
    protected $dompdf;

    public function __construct()
    {
        $this->penjualan = new \App\Models\PenjualanModel();
        $this->transaksi = new \App\Models\TransaksiModel();
        $this->transaksi_barang = new \App\Models\TransaksiBarangModel();

        $this->dompdf = new \Dompdf\Dompdf([
            'defaultPaperSize' => 'A4',
            'defaultFont' => 'sans-serif',
            'isRemoteEnabled' => TRUE,
        ]);
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
            ->orderBy('tb_penjualan.id', 'asc');

        if ($tanggal) {
            $dataPenjualan->where('MONTH(tanggal)', date('m', strtotime($tanggal)))->where('YEAR(tanggal)', date('Y', strtotime($tanggal)));
        } else {
            $dataPenjualan->where('MONTH(tanggal)', date('m'))->where('YEAR(tanggal)', date('Y'));
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
            'title'     => 'Laporan Penjualan | ' . ($tanggal ? date('M Y', strtotime($tanggal)) : date('M Y')),
            'data'      => $dataPenjualan,
            'transaksi' => $dataTransaksi,
            'filter'    => $this->request->getGet()
        ];

        return view('laporan/penjualan', $data);
    }

    public function penjualanPrint()
    {
        $tanggal = $this->request->getGet('tanggal');
        $status = $this->request->getGet('status');

        $dataPenjualan = $this->penjualan->select('tb_penjualan.*, tb_users.nama as kasir')
            ->join('tb_users', 'tb_users.id = tb_penjualan.id_user', 'left')
            ->orderBy('tb_penjualan.id', 'asc');

        if ($tanggal) {
            $dataPenjualan->where('MONTH(tanggal)', date('m', strtotime($tanggal)))->where('YEAR(tanggal)', date('Y', strtotime($tanggal)));
        } else {
            $dataPenjualan->where('MONTH(tanggal)', date('m'))->where('YEAR(tanggal)', date('Y'));
        }

        $dataPenjualan->where('tunai >', 0);

        // if ($status) {
        //     if ($status == 1) {
        //         $dataPenjualan->where('tunai >', 0);
        //     } else {
        //         $dataPenjualan->where('tunai', 0)->orWhere('tunai', null);
        //     }
        // }

        $dataPenjualan = $dataPenjualan->findAll();

        // total akhir penjualan
        $totalPendapatan = 0;
        foreach ($dataPenjualan as $item) {
            $totalPendapatan += $item['total_akhir'];
        }

        // persen untung penjualan dibandingkan dengan bulan sebelumnya
        $totalPemdapatanBulanLalu = $this->penjualan->selectSum('total_akhir')->where('tunai >', 0)->where('tunai !=', null)->where('MONTH(tanggal)', date('m', strtotime('-1 month', strtotime($tanggal ?? date('Y-m')))))->where('YEAR(tanggal)', date('Y', strtotime('-1 month', strtotime($tanggal ?? date('Y-m')))))->first();

        $persenUntung = 0;
        if ($totalPemdapatanBulanLalu['total_akhir'] > 0) {
            $persenUntung = ($totalPendapatan - $totalPemdapatanBulanLalu['total_akhir']) / $totalPemdapatanBulanLalu['total_akhir'] * 100;
        }

        // total item terjual
        $totalItemTerjual = 0;
        $dataTransaksi = [];
        foreach ($dataPenjualan as $item) {
            $dataTransaksi[$item['id']] = $this->transaksi->select('tb_transaksi.*, tb_item.nama_item, tb_item.barcode, tb_item.stok')
                ->join('tb_item', 'tb_item.id = tb_transaksi.id_item', 'left')
                ->where('id_penjualan', $item['id'])
                ->findAll();

            foreach ($dataTransaksi[$item['id']] as $t) {
                $totalItemTerjual += $t['jumlah_item'];
            }
        }

        $data = [
            'title'     => 'Laporan Penjualan | ' . ($tanggal ? date('M Y', strtotime($tanggal)) : date('M Y')),
            'data'      => $dataPenjualan,
            'transaksi' => $dataTransaksi,
            'totalPendapatan' => $totalPendapatan,
            'persenUntung' => $persenUntung,
            'totalItemTerjual' => $totalItemTerjual,
            'totalPendapatanBulanLalu' => $totalPemdapatanBulanLalu['total_akhir'] ?? 0,
            'filter'    => $this->request->getGet() ? $this->request->getGet() : ['tanggal' => date('Y-m')],
        ];

        $html = view('laporan/penjualan-print', $data);

        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'potrait');
        $this->dompdf->render();

        $this->dompdf->stream('laporan-penjualan-' . ($tanggal ? date('M Y', strtotime($tanggal)) : date('M Y')) . '.pdf', ['Attachment' => false]);

        exit(0);
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

    public function pembelian()
    {
        $month = $this->request->getGet('tanggal');

        if ($month) {
            $bulan = date('m', strtotime($month));
            $tahun = date('Y', strtotime($month));
        } else {
            $bulan = date('m');
            $tahun = date('Y');
        }

        $pembalianBulanan = $this->transaksi_barang
            ->select('tb_transaksi_barang.*, tb_barang.kode, tb_barang.barang, tb_barang.stok as total_stok, tb_users.nama as kasir')
            ->join('tb_barang', 'tb_barang.id = tb_transaksi_barang.id_barang', 'left')
            ->join('tb_users', 'tb_users.id = tb_transaksi_barang.id_user', 'left')
            ->where('YEAR(tb_transaksi_barang.created_at)', $tahun)
            ->where('MONTH(tb_transaksi_barang.created_at)', $bulan)
            ->orderBy('tb_transaksi_barang.created_at', 'asc')
            ->findAll();

        $data = [
            'title'                     => 'Laporan Pembelian | ' . ($month ? date('M Y', strtotime($month)) : date('M Y')),
            'filter'                    => $this->request->getGet() ? $this->request->getGet() : ['tanggal' => date('Y-m')],
            'pembelianBulanan'          => $pembalianBulanan,
        ];

        return view('laporan/pembelian-2', $data);
    }

    public function pembelianPrint()
    {
        $month = $this->request->getGet('tanggal');

        if ($month) {
            $bulan = date('m', strtotime($month));
            $tahun = date('Y', strtotime($month));
        } else {
            $bulan = date('m');
            $tahun = date('Y');
        }

        $pembalianBulanan = $this->transaksi_barang
            ->select('tb_transaksi_barang.*, tb_barang.kode, tb_barang.barang, tb_barang.stok as total_stok, tb_users.nama as kasir')
            ->join('tb_barang', 'tb_barang.id = tb_transaksi_barang.id_barang', 'left')
            ->join('tb_users', 'tb_users.id = tb_transaksi_barang.id_user', 'left')
            ->where('YEAR(tb_transaksi_barang.created_at)', $tahun)
            ->where('MONTH(tb_transaksi_barang.created_at)', $bulan)
            ->orderBy('tb_transaksi_barang.created_at', 'desc')
            ->findAll();

        $totalItem = 0;
        $totalUang = 0;

        foreach ($pembalianBulanan as $item) {
            $totalItem += $item->jml_beli;
            $totalUang += $item->total;
        }

        $data = [
            'title'                     => 'Laporan Pembelian | ' . ($month ? date('M Y', strtotime($month)) : date('M Y')),
            'filter'                    => $this->request->getGet() ? $this->request->getGet() : ['tanggal' => date('Y-m')],
            'pembelianBulanan'          => $pembalianBulanan,
            'totalItem'                 => $totalItem,
            'totalUang'                 => $totalUang,
        ];

        $html = view('laporan/pembelian-2-print', $data);

        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'potrait');
        $this->dompdf->render();

        $this->dompdf->stream('laporan-pembelian-' . ($month ? date('M Y', strtotime($month)) : date('M Y')) . '.pdf', ['Attachment' => false]);

        exit(0);
    }
}
