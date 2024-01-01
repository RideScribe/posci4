<?php

namespace App\Controllers;

use App\Libraries\Keranjang;
use App\Models\KeranjangModel;
// use App\Models\PelangganModel;
use App\Models\PenjualanModel;
use App\Models\TransaksiModel;
use Irsyadulibad\DataTables\DataTables;

class Penjualan extends BaseController
{
    // protected $pelangganModel;
    protected $keranjangModel;
    protected $penjualanModel;
    protected $transaksi;

    public function __construct()
    {
        // $this->pelangganModel = new PelangganModel();
        $this->penjualanModel = new PenjualanModel();
        $this->transaksi      = new TransaksiModel();
        $this->keranjangModel = new KeranjangModel();
        helper('form');
    }
    public function index()
    {
        $data = [
            'title'     => 'Input Penjualan',
            // 'pelanggan' => $this->pelangganModel->detailPelanggan(),
        ];
        echo view('penjualan/index', $data);
    }

    public function cekStok()
    {
        $barcode = $this->request->getGet('barcode');
        $respon  = $this->keranjangModel->cekStokProduk($barcode);

        return $this->response->setJSON($respon);
    }

    public function tambah()
    {
        if ($this->request->getMethod() == 'post') {
            $id   = $this->request->getPost('iditem', FILTER_SANITIZE_NUMBER_INT);
            $item = [
                'id'      => $id,
                // 'barcode' => htmlspecialchars($this->request->getPost('barcode')),
                'nama'    => htmlspecialchars($this->request->getPost('nama')),
                'harga'   => $this->request->getPost('harga', FILTER_SANITIZE_NUMBER_INT),
                'jumlah'  => $this->request->getPost('jumlah', FILTER_SANITIZE_NUMBER_INT),
                'stok'    => $this->request->getPost('stok', FILTER_SANITIZE_NUMBER_INT),
            ];
            $hasil = Keranjang::tambah($id, $item); // masukan item ke keranjang
            if ($hasil == 'error') {
                $respon = [
                    'status' => false,
                    'pesan'  => 'Item yang ditambahkan melebihi stok',
                ];
            } else {
                $respon = [
                    'status' => true,
                    'pesan'  => 'Item berhasil ditambahkan ke keranjang.',
                ];
            }

            return $this->response->setJSON($respon);
        }
    }

    public function ubah()
    {
        if ($this->request->getMethod() == 'post') {
            $id   = $this->request->getPost('item_id', FILTER_SANITIZE_NUMBER_INT);
            $item = [
                'jumlah' => $this->request->getPost('item_jumlah', FILTER_SANITIZE_NUMBER_INT),
                'diskon' => $this->request->getPost('item_diskon', FILTER_SANITIZE_NUMBER_INT),
                'total'  => $this->request->getPost('harga_setelah_diskon', FILTER_SANITIZE_NUMBER_INT),
            ];
            Keranjang::ubah($id, $item); // masukan item ke keranjang
            $respon = [
                'pesan' => 'Item berhasil diubah.',
            ];

            return $this->response->setJSON($respon);
        }
    }

    public function hapus()
    {
        if ($this->request->isAJAX()) {
            $iditem = $this->request->getPost('iditem', FILTER_SANITIZE_NUMBER_INT);
            if (empty($iditem)) {
                // hapus session keranjang
                session()->remove('keranjang');
                $respon = [
                    'status' => true,
                    'pesan'  => 'Transaksi berhasil dibatalkan.',
                ];
            } else {
                $hapus = Keranjang::hapus($iditem);
                if ($hapus) {
                    $respon = [
                        'status' => true,
                        'pesan'  => 'Item berhasil dihapus dari keranjang.',
                    ];
                } else {
                    $respon = [
                        'status' => false,
                        'pesan'  => 'Gagal menghapus item dari keranjang',
                    ];
                }
            }

            return $this->response->setJSON($respon);
        }
    }

    public function clear_cart()
    {
        session()->remove('keranjang');
        return $this->response->setJSON([
            'status' => true,
            'pesan'  => 'Keranjang berhasil dibersihkan.',
        ]);
    }

    public function bayar()
    {
        if ($this->request->getMethod() == 'post') {
            // tambahkan record ke tabel penjualan
            $tunai     = $this->request->getPost('tunai', FILTER_SANITIZE_NUMBER_INT);
            $kembalian = $this->request->getPost('kembalian', FILTER_SANITIZE_NUMBER_INT);

            // if in request post has invoice get id from penjualan table
            if ($this->request->getPost('invoice')) {
                $id_penjualan = $this->penjualanModel->select('id')->where('invoice', $this->request->getPost('invoice'))->first()['id'];
            }

            $data      = [
                'invoice'      => $this->request->getPost('invoice') ?? $this->penjualanModel->invoice(),
                'pelanggan'    => htmlspecialchars($this->request->getPost('pelanggan')),
                'total_harga'  => $this->request->getPost('subtotal', FILTER_SANITIZE_NUMBER_INT),
                'diskon'       => $this->request->getPost('diskon', FILTER_SANITIZE_NUMBER_INT),
                'total_akhir'  => $this->request->getPost('total_akhir', FILTER_SANITIZE_NUMBER_INT),
                'tunai'        => str_replace('.', '', $tunai),
                'kembalian'    => str_replace('.', '', $kembalian),
                'catatan'      => htmlspecialchars($this->request->getPost('catatan')),
                'tanggal'      => htmlspecialchars($this->request->getPost('tanggal')),
                'id_user'      => session('id') ?? 1,
                'ip_address'   => $this->request->getIPAddress(),
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ];

            // add id penjualan if invoice is exist
            if (isset($id_penjualan)) {
                $data['id_penjualan'] = $id_penjualan;
            }

            if ($this->request->getPost('pelanggan') == '' || empty($this->request->getPost('pelanggan'))) {
                return $this->response->setJSON([
                    'status' => false,
                    'pesan'  => 'Pelanggan tidak boleh kosong.',
                ]);
            }

            $result = $this->penjualanModel->simpanPenjualan($data);
            if ($result['status']) {
                $respon = [
                    'status'      => $result['status'],
                    'pesan'       => 'Transaksi berhasil.',
                    'idpenjualan' => $result['id'],
                    'no_invoice'  => $data['invoice'],
                ];
            } else {
                $respon = [
                    'status' => $result['status'],
                    'pesan'  => 'Transaksi gagal',
                    'data'   => $result,
                    'no_invoice'  => $data['invoice'],
                ];
            }

            return $this->response->setJSON($respon);
        }
    }

    public function keranjang()
    {
        $respon = [
            'invoice'   => $this->penjualanModel->invoice(),
            'keranjang' => Keranjang::keranjang(),
            'sub_total' => Keranjang::sub_total(),
        ];

        return $this->response->setJSON($respon);
    }

    public function keranjang_data($draw = null)
    {
        $keranjang = Keranjang::keranjang();

        $respon = [
            'invoice'           => $this->penjualanModel->invoice(),
            'sub_total'         => Keranjang::sub_total(),
            'draw'              => $draw == null ? 0 : intval($draw),
            'data'              => $keranjang,
        ];

        return $this->response->setJSON($respon);
    }


    public function invoice()
    {
        if ($this->request->isAJAX()) {
            return DataTables::use('tb_penjualan')
                ->select('tb_penjualan.id, tb_penjualan.invoice, tb_penjualan.tanggal, tb_penjualan.tunai, tb_penjualan.pelanggan, tb_users.nama as kasir')
                ->join('tb_users', 'tb_users.id = tb_penjualan.id_user', 'left')
                ->make();
        } else if ($this->request->getMethod() == 'get') {
            $data = ['title' => 'Daftar Invoice'];
            echo view('penjualan/daftar_invoice', $data);
        }
    }

    public function cetak($id)
    {
        $transaksi = $this->transaksi->detailTransaksi($id);
        $penjualan = $this->transaksi
            ->select('tp.invoice, tp.pelanggan')
            ->join('tb_penjualan tp', 'tp.id = tb_transaksi.id_penjualan')
            ->where('tb_transaksi.id_penjualan', $id)
            ->first();

        // jika id penjualan tidak ditemukan redirect ke halaman invoice dan tampilkan error
        if (empty($transaksi)) {
            return redirect()->to('/penjualan/invoice')->with('pesan', 'Invoice tidak ditemukan');
        }
        echo view('penjualan/cetak_termal', ['transaksi' => $transaksi, 'penjualan' => $penjualan]);
    }

    public function invoice_detail($id)
    {
        $transaksi = $this->transaksi->detailTransaksi($id);
        if ($transaksi) {
            return $this->response->setJSON([
                'status' => true,
                'data'   => $transaksi,
            ]);
        } else {
            return $this->response->setJSON([
                'status' => false,
                'pesan'  => 'Data tidak ditemukan',
            ]);
        }
    }

    public function bayar_invoice()
    {
        if ($this->request->getMethod() == 'post') {
            $id = $this->request->getPost('id_penjualan', FILTER_SANITIZE_NUMBER_INT);
            $data = [
                'tunai'     => $this->request->getPost('tunai', FILTER_SANITIZE_NUMBER_INT),
                'kembalian' => $this->request->getPost('kembalian', FILTER_SANITIZE_NUMBER_INT),
                'id_user'   => session('id'),
            ];
            $result = $this->penjualanModel->bayarInvoice($id, $data);
            // barar invoice return affected rows

            if ($result) {
                $respon = [
                    'status' => true,
                    'no_invoice' => $this->request->getPost('no_invoice'),
                    'pesan'  => 'Pembayaran berhasil.',
                ];
            } else {
                $respon = [
                    'status' => false,
                    'no_invoice' => $this->request->getPost('no_invoice'),
                    'pesan'  => 'Pembayaran gagal',
                ];
            }

            return $this->response->setJSON($respon);
        }
    }

    public function cek_invoice()
    {
        if ($this->request->isAJAX()) {
            $invoice = $this->request->getVar('invoice');
            $result = $this->penjualanModel->cekInvoice($invoice);
            if ($result) {
                $respon = [
                    'status' => true,
                    'data'   => $result,
                ];
            } else {
                $respon = [
                    'status' => false,
                    'pesan'  => 'Invoice tidak ditemukan',
                    'no_invoice' => $invoice,
                ];
            }

            return $this->response->setJSON($respon);
        }
    }

    public function get_unpaid_invoice() 
    {
        if ($this->request->isAJAX()) {
            $invoice = $this->request->getVar('id_penjualan');            
            $result = $this->transaksi->select('tb_transaksi.*, tb_item.nama_item as item, tb_item.harga as harga_item')
                ->where('id_penjualan', $invoice)
                ->join('tb_item', 'tb_item.id = tb_transaksi.id_item')
                ->findAll();
            if ($result) {
                $respon = [
                    'status' => true,
                    'data'   => $result,
                ];
            } else {
                $respon = [
                    'status' => false,
                    'pesan'  => 'Invoice tidak ditemukan',
                    'no_invoice' => $invoice,
                ];
            }

            return $this->response->setJSON($respon);
        }
    }
}
