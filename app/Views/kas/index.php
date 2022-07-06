<?= $this->extend('layout/index'); ?>


<?= $this->section('konten'); ?>

<div class="container-fluid px-4">
  <h1 class="mt-4"><?= $title; ?></h1>
  <div class="card mb-4">
    <div class="card-header">
      <a href="/kas/lunas" class="btn btn-primary btn-sm">Kas Lunas</a>
    </div>
    <div class="card-body">
      <table id="datatablesSimple">
        <thead>
          <tr>
            <th>Keteranagan</th>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Keterangan</th>
            <th>Name</th>
            <th>Tanggal</th>
            <th>Aksi</th>
          </tr>
        </tfoot>
        <tbody>
          <?php foreach ($all as $a => $values) : ?>
          <tr>
            <td><?= $values->keterangan ?></td>
            <td><?= $values->nama ?></td>
            <td><?= $values->tanggal ?></td>
            <td>
              <a href="/kas/bayar/<?= $values->id; ?>" class="btn btn-primary btn-sm">Bayar kas</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>


<?= $this->endSection(); ?>