<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5">Data Pasien</h1>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>page">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>page/pasien">Pasien</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
        </nav>
      </div>
      <!-- Content -->
      <div class="row">
      <div class="col-md-4">
        <div class="media border border-success p-4">
          <i class="fa fa-user-circle fa-4x mr-2 text-success"></i>
          <div class="media-body">
            <?php foreach ($pasien as $keya) { ?>
            <h5 class="text-capitalize mb-0"><?php echo $keya->pasien_nama ?></h5>
            <p class="mb-0"><?php echo $keya->pasien_ktp ?></p>
            <?php if ($keya->pasien_status == 1): ?>
              <div class="badge badge-success">
                Active
              </div>
              <?php else: ?>
              <div class="badge badge-dark">
                Deactive
              </div>
            <?php endif ?>
          <?php } ?>
          </div>
        </div>
      </div>
      <div class="col-md">
        <?php foreach ($pasien as $keya) { ?>
        <?php if ($keya->pasien_status == 1): ?>
          <button type="" disabled class="btn btn-dark text-uppercase">panggil pasien</button>
          <?php else: ?>
            <form action="<?php echo base_url(). 'page/update_pasien'; ?>" method="post">
              <input type="hidden" name="pasien_id" value="<?php echo $keya->pasien_id ?>">
            <button type="submit" title="" class="btn btn-success text-uppercase">Panggil pasien</button>
          </form>
        <?php endif ?>
        <?php } ?>
      </div>
      </div>
      <!-- End Content -->
      <!-- Editing -->
      <div class="mt-4">
        <!-- <h1 class="h5">Edit Pasien</h1>
        <hr> -->
<?php foreach ($pasien as $key) {?>
        <form action="<?php echo base_url(). 'page/update'; ?>" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputNama">Nama Lengkap</label>
      <input type="hidden" name="pasien_id" value="<?php echo $key->pasien_id ?>">
      <input required type="text" name="pasien_nama" class="form-control" id="inputNama" placeholder="Masukan Nama" value="<?php echo $key->pasien_nama; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputKtp">Nomor KTP</label>
      <input required type="text" class="form-control" name="pasien_ktp" id="inputKtp" placeholder="Masukan Nomor" value="<?php echo $key->pasien_ktp; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputKelamin">Jenis Kelamin</label>
    <input class="una" type="hidden" value="<?php echo $key->pasien_kelamin; ?>">
    <select required name="pasien_kelamin" id="mo" class="form-control">
      <option value="">Pilih Kelamin</option>
      <option value="L">Laki - Laki</option>
      <option value="P">Perempuan</option>
    </select>
    
  </div>
  <div class="form-group">
    <label for="inputAddress">Alamat</label>
    <textarea required name="pasien_alamat" class="form-control" id="inputAddress" placeholder="Masukan Alamat"><?php echo $key->pasien_alamat ?></textarea>
  </div>
  
  <button type="submit" class="btn btn-success text-uppercase ">Update Pasien</button>
</form>
<?php } ?>
    </div>
      <!-- End Editing -->
      <!-- Record -->
      <div class="mt-4">
        <h1 class="h5">Record Pasien</h1>
        <hr>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Tanggal</th>
              <th>Penyakit</th>
              <th>Obat</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>data</td>
              <td>data</td>
              <td>data</td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- End Record -->
</main>