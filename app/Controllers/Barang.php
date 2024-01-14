<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Barang extends BaseController
{
    protected $brg;
    protected $trbrg;
    protected $pemasok;
    protected $stok;

    public function __construct()
    {
        $this->stok = new \App\Models\StokModel();
        $this->brg = new \App\Models\BarangModel();
        $this->pemasok = new \App\Models\PemasokModel();
        $this->trbrg = new \App\Models\TransaksiBarangModel();

        helper('form');
    }

    public function index()
    {
        $barangWithPemasok = $this->brg
            ->select('tb_barang.*, tb_pemasok.nama_pemasok')
            ->join('tb_pemasok', 'tb_pemasok.id = tb_barang.id_pemasok')->findAll();

        $historyBarang = $this->stok
            ->select('tb_stok.*, tb_barang.barang, tb_barang.stok as total_stok, tb_pemasok.nama_pemasok, tb_transaksi_barang.harga, tb_transaksi_barang.total')
            ->join('tb_barang', 'tb_barang.id = tb_stok.id_barang')
            ->join('tb_pemasok', 'tb_pemasok.id = tb_stok.id_pemasok')
            ->join('tb_transaksi_barang', 'tb_transaksi_barang.id_barang = tb_stok.id_barang')
            ->orderBy('tb_stok.id_stok', 'DESC')
            ->findAll();

        $data = [
            'title' => 'Daftar Barang',
            'barang' => $barangWithPemasok,
            'pemasok' => $this->pemasok->findAll(),
            'history' => $historyBarang,
        ];

        return view('barang/index', $data);
    }

    // save data
    public function save()
    {
        $request = \Config\Services::request();
        $validation = \Config\Services::validation();

        $validation->setRules([
            'barang' => 'required',
            'harga_beli' => 'required',
            'jml_item' => 'required',
            'pemasok' => 'required',
        ]);

        if (!$validation->run($request->getPost())) {
            $errors = $validation->getErrors();
            return redirect()->to('/barang')->withInput()->with('validation', $errors);
        }

        $data_barang = [
            'kode' => rand(100000000, 999900000),
            'barang' => $request->getPost('barang'),
            'id_pemasok' => $request->getPost('pemasok'),
            'stok' => $request->getPost('jml_item'),
        ];

        $this->brg->insert($data_barang);
        $id_barang =  $this->brg->insertID();

        $data_transaksi_barang = [
            'id_barang' => $id_barang,
            'id_pemasok' => $request->getPost('pemasok'),
            'harga' => $request->getPost('harga_beli'),
            'jml_beli' => $request->getPost('jml_item'),
            'total' => $request->getPost('harga_beli') * $request->getPost('jml_item'),
        ];

        $this->trbrg->insert($data_transaksi_barang);

        $data_stok = [
            'tipe' => 'masuk',
            'id_barang' => $id_barang,
            'id_pemasok' => $request->getPost('pemasok'),
            'jumlah' => $request->getPost('jml_item'),
            'keterangan' => 'Penambahan stok barang',
            'id_user' => session()->get('id'),
            'ip_address' => $request->getIPAddress(),
        ];

        $this->stok->insert($data_stok);

        return redirect()->to('/barang')->with('success', 'Data berhasil disimpan');
    }

    // barang/update
    public function update()
    {
        $request = \Config\Services::request();
        $validation = \Config\Services::validation();

        // nama barang, pemasok only
        $validation->setRules([
            'barang' => 'required',
            'pemasok' => 'required',
        ]);

        if (!$validation->run($request->getPost())) {
            $errors = $validation->getErrors();
            return redirect()->to('/barang')->withInput()->with('validation', $errors);
        }

        $data = [
            'barang' => $request->getPost('barang'),
            'id_pemasok' => $request->getPost('pemasok'),
        ];

        if ($this->brg->find($request->getPost('id_barang'))) {
            $this->brg->update($request->getPost('id_barang'), $data);
            return redirect()->to('/barang')->with('success', 'Data berhasil diubah');
        }

        return redirect()->to('/barang')->with('error', 'Data tidak ditemukan');
    }

    // barang/delete
    public function delete($id)
    {
        $request = \Config\Services::request();

        if ($this->brg->find($id)) {
            $this->brg->delete($id);
            return response()->setJSON(['success' => true, 'message' => 'Data berhasil dihapus']);
        }

        return response()->setJSON(['success' => false, 'message' => 'Data tidak ditemukan']);
    }
    
    // stok plus
    public function stok_plus()
    {
        $request = \Config\Services::request();
        $validation = \Config\Services::validation();

        $validation->setRules([
            'id_barang' => 'required',
            'pemasok' => 'required',
            'harga' => 'required',
            'jml_item' => 'required',
        ]);

        if (!$validation->run($request->getPost())) {
            $errors = $validation->getErrors();
            return redirect()->to('/barang')->withInput()->with('validation', $errors);
        }

        if (!$this->brg->find($request->getPost('id_barang'))) {
            return redirect()->to('/barang')->with('error', 'Data tidak ditemukan');
        }

        // stok_lama
        $stok_lama = $this->brg->find($request->getPost('id_barang'))->stok;

        $data_stok = [
            'tipe' => 'masuk',
            'id_barang' => $request->getPost('id_barang'),
            'id_pemasok' => $request->getPost('pemasok'),
            'jumlah' => $request->getPost('jml_item'),
            'keterangan' => $request->getPost('keterangan') ?? 'Penambahan stok barang',
            'id_user' => session()->get('id'),
            'ip_address' => $request->getIPAddress(),
        ];

        $data_transaksi_barang = [
            'id_barang' => $request->getPost('id_barang'),
            'id_pemasok' => $request->getPost('pemasok'),
            'harga' => $request->getPost('harga'),
            'jml_beli' => $request->getPost('jml_item'),
            'total_harga' => $request->getPost('harga') * $request->getPost('jml_item'),
        ];

        $this->stok->insert($data_stok);
        $this->trbrg->insert($data_transaksi_barang);

        // update stok on tb_barang
        $this->brg->where('id', $request->getPost('id_barang'))->set('stok', 'stok+' . $request->getPost('jml_item'), false)->update();

        return redirect()->to('/barang')->with('success', 'Data berhasil disimpan');
    }

    // stok minus
    public function stok_minus()
    {
        $request = \Config\Services::request();
        $validation = \Config\Services::validation();

        $validation->setRules([
            'jml_item' => 'required',
        ]);

        if (!$validation->run($request->getPost())) {
            $errors = $validation->getErrors();
            return redirect()->to('/barang')->withInput()->with('validation', $errors);
        }

        // $data = [
        //     'stok' => $request->getPost('jml_item'),
        // ];

        if ($this->brg->find($request->getPost('id_barang'))) {
            // $this->brg->update($request->getPost('id_barang'), $data);
            $this->brg->where('id', $request->getPost('id_barang'))->set('stok', 'stok-' . $request->getPost('jml_item'), false)->update();
            return redirect()->to('/barang')->with('success', 'Data berhasil diubah');
        }

        return redirect()->to('/barang')->with('error', 'Data tidak ditemukan');
    }
}
