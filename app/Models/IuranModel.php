<?php

namespace App\Models;

use CodeIgniter\Model;

class IuranModel extends Model
{
  protected $table = 'iuran';
  protected $allowedFields = ['keterangan', 'tanggal', 'bulan', 'tahun', 'jumlah', 'warga_id'];

  public function getAll($id = false)
  {
    $builder = $this->table('iuran');
    $builder->join('warga', 'warga.id = iuran.warga_id');
    $builder->select('*');
    $builder->like('keterangan', 'Belum Bayar');
    $query = $builder->get();
    return $query->getResult();

    if ($builder->countAllResults() > null) {
      return $query->getResult();
    } else {
      return false;
    }

    if ($id === false) {
      return $this->paginate(10, 'iuran');
    }

    return $this->where([
      'id' => $id
    ])->first();
  }

  public function total()
  {
    $builder = $this->table('iuran');
    $builder->selectSum('jumlah');
    $query = $builder->get();
    return $query->getResult();
  }

  public function getUpdate($id = false)
  {

    // $builder = $this->table('iuran');
    // $builder->join('warga', 'warga.id = iuran.warga_id');
    // $builder->select('iuran, warga.nama');
    // $query = $builder->get();
    // return $query->getResult();

    if ($id === false) {
      return $this->findAll();
    }

    return $this->where([
      'id' => $id
    ])->first();
  }

  public function getLunas()
  {


    $builder = $this->table('iuran');
    $builder->join('warga', 'warga.id = iuran.warga_id');
    $builder->select('*');
    $builder->like('keterangan', 'Lunas');
    $query = $builder->get();

    if ($builder->countAllResults() > null) {
      return $query->getResult();
    } else {
      return false;
    }

    return $query->getResult();
  }
}