<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Irsyadulibad\DataTables\DataTables;

class Tempat extends BaseController
{
    protected $tempat;

    private $rules = [
        'tempat' => ['rules' => 'required|alpha_numeric_punct|is_unique[tb_tempat.tempat]'],
    ];

    public function __construct() {
        $this->tempat = new \App\Models\TempatModel();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'Data Tempat',
            'tempat' => $this->tempat->findAll(),
        ];
        return view('tempat/index', $data);
    }

    public function ajax()
    {
        if ($this->request->isAJAX()) {
            return DataTables::use('tb_tempat')
                ->select('id, tempat, keterangan')
                ->make(true);
        }
    }

    public function tambah()
    {
        if ($this->request->isAJAX()) {
            if (!$this->validate($this->rules)) {
                // validasi form gagal
                $respon = [
                    'validasi' => false,
                    'error'   => $this->validator->getErrors()
                ];
            } else {
                // sukses
                $data = [
                    'tempat'     => ucwords(htmlspecialchars($this->request->getPost('tempat'))),
                    'keterangan'        => ucfirst(htmlspecialchars($this->request->getPost('keterangan')))
                ];
                $this->tempat->save($data);
                if ($this->tempat->getInsertID() > 0) {
                    $respon = [
                        'validasi' => true,
                        'sukses' => true,
                        'pesan'   => 'Data berhasil ditambahkan :)',
                    ];
                }else{
                    $respon = [
                        'validasi' => true,
                        'sukses' => false,
                        'pesan'   => 'Gagal menambahkan data!',
                    ];
                }
            }
            return $this->response->setJSON($respon);
        }
    }

    public function ubah()
    {
        // cek apakah method yang dikirim dari ajax 
        if ($this->request->isAJAX()) {
            if (!$this->validate($this->rules)) {
                // validasi form gagal
                $respon = [
                    'validasi' => false,
                    'error'   => $this->validator->getErrors()
                ];
            } else {
                // validasi form sukses
                $data = [
                    'id'       => $this->request->getPost('id', FILTER_SANITIZE_NUMBER_INT),
                    'tempat'     => ucwords(htmlspecialchars($this->request->getPost('tempat'))),
                    'keterangan'        => ucfirst(htmlspecialchars($this->request->getPost('keterangan')))
                ];
                $this->tempat->save($data); // update data
                $respon = [
                    'validasi' => true,
                    'sukses' => true,
                    'pesan'   => 'Data berhasil diubah!',
                ];
            }
            return $this->response->setJSON($respon);
        }
    }

    public function hapus()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getGet('id', FILTER_SANITIZE_NUMBER_INT);
            $role = 1; // role admin / superadmin
            if($this->tempat->find($id) && $role == 1){
                $this->tempat->delete($id);
                $respon = [
                    'status' => true,
                    'pesan' => 'Data berhasil dihapus :)'
                ];
            } else {
                $respon = [
                    'status' => false,
                    'pesan' => 'Gagal menghapus data'
                ];
            }
            return $this->response->setJSON($respon);
        }
    }
}
