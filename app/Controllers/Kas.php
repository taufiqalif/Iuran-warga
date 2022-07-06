<?php

namespace App\Controllers;

use App\Models\WargaModel;
use App\Models\IuranModel;


class Kas extends BaseController
{
  protected $DaftarModel;
  public function __construct()
  {
    $this->WargaModel = new WargaModel();
    $this->IuranModel = new IuranModel();
  }

  public function index()
  {
    $data = [
      'title' => 'Daftar Kas Warga',
      'all' => $this->IuranModel->getAll(),
    ];
    return view('kas/index', $data);
  }

  public function lunas()
  {
    $data = [
      'title' => 'Daftar Kas Lunas',
      'lunas' => $this->IuranModel->getLunas(),
      'total' => $this->IuranModel->total(),
      // 'ambil' => $this->IuranModel->getAmbil(),
    ];
    return view('kas/lunas', $data);
  }

  public function edit($id)
  {
    $data = [
      'title' => 'Form Tambah Kas Data Warga',
      'validation' => \Config\Services::validation(),
      'warga' => $this->IuranModel->getUpdate($id)
    ];



    return view('/kas/bayar', $data);
  }

  public function update($id)
  {
    $keterangan = 'Lunas';

    $this->IuranModel->save([
      'id' => $id,
      'keterangan' => $keterangan,
      'tanggal' => $this->request->getPost('tanggal'),
      'jumlah' => $this->request->getPost('jumlah'),
    ]);
    session()->setFlashdata('pesan', 'Data warga berhasil diubah');
    return redirect()->to('/kas/lunas');
  }

  public function hapus($id)
  {
    $this->IuranModel->delete($id);
    session()->setFlashdata('pesan', 'Data warga berhasil dihapus');
    return redirect()->to('/kas/lunas');
  }
}