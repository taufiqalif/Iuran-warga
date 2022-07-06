<?= $this->extend('layout/index'); ?>


<?= $this->section('konten'); ?>

<?php
$tz = 'Asia/Jakarta';
$dt = new DateTime("now", new DateTimeZone($tz));
$timestamp = $dt->format('Y-m-d');
?>

<div id="layoutAuthentication_content">
  <main>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-7">
          <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header">
              <h3 class="text-center font-weight-light my-4"><?= $title; ?></h3>
            </div>
            <div class="card-body">
              <form action="/daftar/update/<?= $warga['id']; ?>" method="post">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                      <input class="form-control" name="nik" id="inputFirstName" type="text" placeholder=""
                        value="<?= $warga['nik']; ?>" />
                      <label for="inputFirstName">Maksukan NIK anda</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-floating">
                      <input class="form-control" name="nama" id="inputLastName" type="text" placeholder=""
                        value="<?= $warga['nama']; ?>" />
                      <label for="inputLastName">Masukan Nama</label>
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                      <select class="form-select form-control" name="kelamin" aria-label="Default select example">
                        <option selected value="<?= $warga['kelamin']; ?>"><?= $warga['kelamin']; ?></option>
                        <option value="L">Laki - Laki</option>
                        <option value="P">Perempuan</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                      <input class="form-control" name="no_rumah" id="inputPasswordConfirm" type="text" placeholder=""
                        value="<?= $warga['no_rumah']; ?>" />
                      <label for="inputPasswordConfirm">No.Rumah</label>
                    </div>
                  </div>
                </div>
                <div class="form-floating mb-3">
                  <!-- <textarea class="form-control" id="inputEmail" type="email" placeholder="name@example.com" /> -->
                  <textarea class="form-control" id="inputEmail" name="alamat" id="" cols="30"
                    rows="10"><?= $warga['alamat']; ?></textarea>
                  <label for="inputEmail">Masukan Alamat Anda</label>
                </div>
                <div class="mt-4 mb-0">
                  <!-- <div class="d-grid"><a type="submit" class="btn btn-primary btn-block" href="">Tambah Warga</a></div> -->
                  <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-block">Edit warga</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</div>

<?= $this->endSection(); ?>