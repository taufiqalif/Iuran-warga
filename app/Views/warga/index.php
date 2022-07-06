<?= $this->extend('layout/index'); ?>


<?= $this->section('konten'); ?>

<div class="container-fluid px-4">
  <h1 class="mt-4"><?= $title; ?></h1>
  <div class="card mb-4">
    <div class="card-header">
      <a href="/daftar/tambah" class="btn btn-primary btn-sm">Tambah Warga</a>
    </div>
    <div class="card-body">
      <table id="datatablesSimple">
        <thead>
          <tr>
            <th>NIK</th>
            <th>Name</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>No Rumah</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>NIK</th>
            <th>Name</th>
            <th>Jenis kelamin</th>
            <th>Alamat</th>
            <th>No Rumah</th>
            <th>Aksi</th>
          </tr>
        </tfoot>
        <tbody>
          <?php foreach ($all as $a) : ?>
          <tr>
            <td><?= $a['nik']; ?></td>
            <td><?= $a['nama']; ?></td>
            <td><?= $a['kelamin']; ?></td>
            <td><?= $a['alamat']; ?></td>
            <td><?= $a['no_rumah']; ?></td>
            <td>
              <a href="/daftar/edit/<?= $a['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
              <a href="/daftar/hapus/<?= $a['id']; ?>" class="btn btn-danger btn-sm">Hapus</a>
              <a href="/daftar/detail/<?= $a['id']; ?>" class="btn btn-secondary btn-sm">Detail</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>


<?= $this->endSection(); ?>