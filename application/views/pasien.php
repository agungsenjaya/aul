<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5">Halaman Pasien</h1>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>page">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pasien</li>
        </ol>
        </nav>
      </div>
      <div class="row">
        <div class="col-md-4">
          <a href="javascript:void(0)" class="btn btn-block btn-success text-uppercase mb-3" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-user-circle mr-1"></i>Tambah Pasien</a>
        </div>
        <div class="col-md-4">
          <a href="javascript:void(0)" class="btn btn-success btn-block text-uppercase" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-search mr-1"></i>Cari Pasien</a>
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content bg-transparent border-0">
      <div class="modal-body">
        <button type="button" class="close mb-3" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="input-group asearch">
            <input type="text" id="search1" class="form-control form-control-lg rounded-0" placeholder="Cari nama pasien / nomor nik.." aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <span class="input-group-text rounded-0" id="basic-addon2"><i class="fa fa-sort grs"></i></span>
            </div>
          </div>
          <ul class="list-group" id="result"></ul>
      </div>
      
    </div>
  </div>
</div>
        </div>
      </div>
            <table class="table table-bordered">
                <thead class="bg-success text-white">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Nomor Nik</th>
                        <th>Jenis Kelamin</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php 
                  $no = 1;
                  foreach ($pasien as $data) {
                  ?>
                  <tr>
                    <td class="bg-light"><?php echo $no++; ?></td>
                    <td class="text-capitalize font-weight-bold"><?php echo $data->pasien_nama ?></td>
                    <td class="bg-light"><?php echo $data->pasien_ktp ?></td>
                    <td><?php 
                    if($data->pasien_kelamin == 'L'){
                      echo "Laki - Laki";
                    }else{
                      echo "Perempuan";
                    }
                     ?></td>
                    <td class="bg-light">
                      <?php if ($data->pasien_status == 1 ): ?>
                      <span class="badge badge-success">Active</span>
                      <?php elseif($data->pasien_status == 2): ?>
                      <span class="badge badge-warning">Prosess</span>
                      <?php else: ?>
                      <span class="badge badge-dark">Deactive</span>
                      <?php endif ?>
                    </td>
                    <td>
                      <a href="<?php echo base_url();?>page/edit/<?php echo $data->pasien_id ?>" class="btn btn-success">Action</a>
                    </td>
                  </tr>
                  <?php }?>
                </tbody>
            </table>
      </div>
    </main>
    <!-- Modal  Tambah-->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title ml-auto" id="exampleModalCenterTitle">Tambah Pasien</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?php echo base_url(). 'page/tambah_pasien'; ?>" method="post">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputNama">Nama Lengkap</label>
              <input required type="text" name="pasien_nama" class="form-control" id="inputNama" placeholder="Masukan Nama">
            </div>
            <div class="form-group col-md-6">
              <label for="inputKtp">Nomor Nik</label>
              <input required type="text" class="form-control" name="pasien_ktp" id="inputKtp" placeholder="Masukan Nomor">
            </div>
          </div>
          <div class="form-group">
            <label for="inputKelamin">Jenis Kelamin</label>
            <select required name="pasien_kelamin" id="" class="form-control">
              <option value="">Pilih Jenis Kelamin</option>
              <option value="L">Laki - Laki</option>
              <option value="P">Perempuan</option>
            </select>
          </div>
          <div class="form-group">
            <label for="inputAddress">Alamat</label>
            <textarea required name="pasien_alamat" class="form-control" id="inputAddress" placeholder="Masukan Alamat"></textarea>
          </div>
          <button type="submit" class="btn btn-success text-uppercase btn-lg">Insert Pasien</button>
        </form>
      </div>
    </div>
  </div>
</div>
    <!-- End Modal  Tambah-->