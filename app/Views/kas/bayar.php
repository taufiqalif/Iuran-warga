<?= $this->extend('layout/index'); ?>


<?= $this->section('konten'); ?>

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
              <form action="/kas/update/<?= $warga['id']; ?>" method="post">
                <div class="row mb-3">
                  <div class="col-md-6">
                    <!-- <div class="form-floating mb-3 mb-md-0">
                      <select class="form-select form-control" name="kelamin" aria-label="Default select example">
                        <option selected><?= $warga['keterangan']; ?></option>
                        <option value="Lunas">Lunas</option>
                      </select>
                    </div> -->
                  </div>
                  <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                      <input class="form-control" name="tanggal" id="inputFirstName" type="tanggal" placeholder=""
                        value="<?= $warga['tanggal']; ?>" readonly />
                      <!-- <label for=" inputFirstName">Masukan No</label> -->
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                      <input class="form-control" name="jumlah" id="inputFirstName" type="number" placeholder="" />
                      <label for="inputFirstName">Masukan Nominal</label>
                    </div>
                  </div>
                  <div class="mt-4 mb-0">
                    <!-- <div class="d-grid"><a type="submit" class="btn btn-primary btn-block" href="">Tambah Warga</a></div> -->
                    <div class="d-grid">
                      <button type="submit" class="btn btn-primary btn-block">Tambah Data</button>
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