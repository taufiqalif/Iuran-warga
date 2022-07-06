<?= $this->extend('layout/index'); ?>


<?= $this->section('konten'); ?>

<div class="container-fluid px-4">
  <h1 class="mt-4"><?= $title; ?></h1>
  <div class="card mb-4">
    <div class="card-header">
      <div class="row">
        <div class="col">
          <a href="/kas" class="btn btn-primary btn-sm">Kas Yang Belum Bayar</a>
        </div>
        <div class="col-md-3">
          <h3 class="text-end">Total :</h3>
        </div>
        <div class="col-md-3">
          <?php foreach ($total as $t => $values) : ?>
          <input class="form-control" type="text" value="Rp. <?= $values->jumlah ?>000"
            aria-label="readonly input example" readonly>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
    <div class="card-body">
      <table id="datatablesSimple">
        <thead>
          <tr>
            <th>Keteranagan</th>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Keterangan</th>
            <th>Name</th>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Aksi</th>
          </tr>
        </tfoot>
        <tbody>
          <?php foreach ($lunas as $a => $values) : ?>
          <tr>
            <td><?= $values->keterangan ?></td>
            <td><?= $values->nama ?></td>
            <td><?= $values->tanggal ?></td>
            <td><?= $values->jumlah ?></td>
            <td>
              <a href="/kas/hapus/<?= $values->id; ?>" class="btn btn-danger btn-sm">Hapus</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>


<?= $this->endSection(); ?>