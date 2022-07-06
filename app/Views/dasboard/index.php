<?= $this->extend('layout/index'); ?>


<?= $this->section('konten'); ?>

<h1>halaman dasboard</h1>

<div class="row">
  <div class="col">
    <a href="/daftar" type="button" class="btn btn-primary btn-lg">Daftar Warga</a>
  </div>
  <div class="col">
    <a href="/kas" type="button" class="btn btn-primary btn-lg">Kas Warga</a>
  </div>
  <div class="col">
    <a href="/kas/lunas" type="button" class="btn btn-primary btn-lg">Kas Lunas</a>
  </div>
</div>


<?= $this->endSection(); ?>