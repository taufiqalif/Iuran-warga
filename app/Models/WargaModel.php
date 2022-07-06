<?php

namespace App\Models;

use CodeIgniter\Model;

class WargaModel extends Model
{
  protected $table = 'warga';
  protected $allowedFields = ['nik', 'nama', 'kelamin', 'alamat', 'no_rumah', 'status'];


  public function getDaftar($nik = false)
  {

    if ($nik === false) {
      return $this->paginate(10, 'warga');
    }

    return $this->where([
      'nik' => $nik
    ])->first();
  }

  // public function getDetail()
  // {
  //   $builder = $this->table('warga');
  //   $builder->join('iuran', 'iuran.warga_id = warga.id');
  //   $builder->select('id as warga_id');
  //   $query = $builder->get();
  //   return $query->getResultArray();
  // }

  public function getOtomatis()
  {
    $kode = $this->db->table('warga')
      ->select('MAX(id) AS id', false)
      ->orderBy('id', 'DESC')
      ->limit(1)->get()->getRowArray();

    if ($kode['id'] == null) {
      $no = 1;
    } else {
      $no = intval($kode['id']) + 1;
    }

    return $no;
  }

  // public function getUpdate($id = false)
  // {

  //   if ($id === false) {
  //     return $this->findAll();
  //   }

  //   return $this->where([
  //     'id' => $id
  //   ])->first();
  // }

  public function getAll()
  {
    $builder = $this->table('warga');
    $builder->join('iuran', 'iuran.warga_id = warga.id');
    $builder->select('*');
    $query = $builder->get();
    return $query->getResultArray();
  }
}