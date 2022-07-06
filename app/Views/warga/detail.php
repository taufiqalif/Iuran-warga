<?= $this->extend('layout/index'); ?>


<?= $this->section('konten'); ?>

<div class="row justify-content-center">
  <div class="col-6">
    <table class="table">
      <thead class="table-light">
        <h1><?= $title; ?></h1>
      </thead>
      <tbody class="table-group-divider">
        <tr>
          <th scope="row">Nama</th>
          <th>:</th>
          <td><?= $warga['nama']; ?></td>
        </tr>
        <tr>
          <th scope="row">NIK</th>
          <th>:</th>
          <td><?= $warga['nik']; ?></td>
        </tr>
        <tr>
          <th scope="row">Jenis Kelamin</th>
          <th>:</th>
          <td><?= $warga['kelamin']; ?></td>
        </tr>
        <tr>
          <th scope="row">Alamat</th>
          <th>:</th>
          <td><?= $warga['alamat']; ?></td>
        </tr>
        <tr>
          <th scope="row">No.rumah</th>
          <th>:</th>
          <td><?= $warga['no_rumah']; ?></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>


<?= $this->endSection(); ?>