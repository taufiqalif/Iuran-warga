<?php

namespace App\Controllers;

use App\Models\WargaModel;
use App\Models\IuranModel;

class Home extends BaseController
{
    protected $DaftarModel;
    public function __construct()
    {
        $this->WargaModel = new WargaModel();
        $this->IuranModel = new IuranModel();
    }


    public function index()
    {

        // $daftar = $this->DaftarModel->findAll();

        // $currentPage = $this->request->getVar('page_warga') ? $this->request->getVar('page_warga') : 1;

        // $keyword = $this->request->getVar('keyword');

        // if ($keyword) {
        //     $warga = $this->DaftarModel->search($keyword);
        // } else {
        //     $warga = $this->DaftarModel;
        // }

        $data = [
            'title' => 'Daftar Warga',
            'all' => $this->WargaModel->getDaftar(),
            // 'pager'  => $this->DaftarModel->pager,
            // 'currentPage' => $currentPage
        ];

        return view('warga/index', $data);
    }

    public function tambah()
    {

        session();
        $data = [
            'title' => 'Form Tambah Data Warga',
            'validation' => \Config\Services::validation(),
        ];

        return view('warga/tambah', $data);
    }

    public function save()
    {

        if (!$this->validate([
            'nik' => [
                'rules' => 'required|numeric|is_unique[warga.nik]',
                'errors' => [
                    'required' => 'NIK warga harus diisi',
                    'numeric' => 'NIK warga harus berupa angka',
                    'is_unique' => 'NIK warga sudah terdaftar'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama warga harus diisi'
                ]
            ],
            'kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Kelamin warga harus diisi'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat warga harus diisi'
                ]
            ],
            'no_rumah' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'numeric' => 'No Rumah warga harus berupa angka',
                    'required' => 'No. Rumah warga harus diisi'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/daftar/tambah')->withInput()->with('validation', $validation);
        }




        // $keterangan = $this->IuranModel->getLunas();

        // if ($keterangan == false) {
        //     $keterangan = 'Belum Bayar';
        // } else {
        //     $keterangan = 'Lunas';
        // }

        $keterangan = 'Belum Bayar';

        $tgl = date('Y-m-d');
        $bln = date('m');
        $thn = date('Y');

        $nomer = $this->WargaModel->getOtomatis();

        // $jumlah = $this->IuranModel->getLunas();
        $data = [
            'nik' => $this->request->getPost('nik'),
            'nama' => $this->request->getPost('nama'),
            'kelamin' => $this->request->getPost('kelamin'),
            'alamat' => $this->request->getPost('alamat'),
            'no_rumah' => $this->request->getPost('no_rumah'),
            'keterangan' => $keterangan,
            'warga_id' => $nomer,
            'tanggal' => $tgl,
            'bulan' => $bln,
            'tahun' => $thn,
        ];

        $this->WargaModel->save($data);
        $this->IuranModel->save($data);

        session()->setFlashdata('pesan', 'Data warga berhasil ditambahkan');
        return redirect()->to('/daftar');
    }

    public function edit($id)
    {
        $warga = $this->WargaModel->find($id);
        $data = [
            'title' => 'Form Edit Data Warga',
            'warga' => $warga,
            'validation' => \Config\Services::validation(),
        ];

        return view('warga/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'nik' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'NIK warga harus diisi',
                    'numeric' => 'NIK warga harus berupa angka'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama warga harus diisi'
                ]
            ],
            'kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Kelamin warga harus diisi'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat warga harus diisi'
                ]
            ],
            'no_rumah' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'numeric' => 'No Rumah warga harus berupa angka',
                    'required' => 'No. Rumah warga harus diisi'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/daftar/edit/' . $id)->withInput()->with('validation', $validation);
        }

        $data = [
            'nik' => $this->request->getPost('nik'),
            'nama' => $this->request->getPost('nama'),
            'kelamin' => $this->request->getPost('kelamin'),
            'alamat' => $this->request->getPost('alamat'),
            'no_rumah' => $this->request->getPost('no_rumah'),
        ];

        $this->WargaModel->update($id, $data);

        session()
            ->setFlashdata('pesan', 'Data warga berhasil diubah');
        return redirect()->to('/daftar');
    }


    public function detail($id)
    {
        $warga = $this->WargaModel->find($id);
        $data = [
            'title' => 'Detail Data Warga',
            'warga' => $warga,
        ];

        return view('warga/detail', $data);
    }

    public function hapus($id)
    {
        $this->WargaModel->delete($id);
        session()->setFlashdata('pesan', 'Data warga berhasil dihapus');
        return redirect()->to('/daftar');
    }
}