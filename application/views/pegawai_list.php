<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5">Daftar Pegawai</h1>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>page/dokter">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pegawai</li>
        </ol>
        </nav>
      </div>
      <!-- Content -->
      <div class="mb-3">
      	<a href="javascript:void(0)" class="btn btn-success text-uppercase" title="" data-toggle="modal" data-target="#modalCreate"><i class="fa fa-users mr-2"></i>Tambah Pegawai</a>
      </div>
      <table class="table table-bordered">	
      	<thead class="thead-light">
      		<tr>
      			<th>#</th>
      			<th>Nama Lengkap</th>
      			<th>Jenis Kelamin</th>
      			<th><span class="text-danger">*</span> No Identitas / KTP</th>
      			<th>Tanggal Masuk</th>
      			<th>Edit Pegawai</th>
      		</tr>
      	</thead>
      	<tbody>
      		<?php 
      		$non = 1;
      		$sql = "SELECT * FROM tbl_users WHERE user_level=1";
      		$qq = $this->db->query($sql);
      		if ($qq->num_rows() > 0) {
      			foreach ($qq->result() as $peg) {
      		?>
      		<tr>
      			<th><?php 	echo $non++; ?></th>
      			<th class="text-capitalize bg-light"><?php 	echo $peg->user_name; ?></th>
      			<td>
              <?php if ($peg->user_kelamin == 'L'): ?>
                Laki-Laki
                <?php else: ?>
                  Perempuan
              <?php endif ?>
            </td>
      			<td class="bg-light"><?php 	echo $peg->user_ktp; ?></td>
      			<th><?php 	echo $peg->user_reg; ?></th>
            <td class="bg-light"><a href="javascript:void(0)" title="" data-toggle="modal" data-target="#modalC-<?php echo $peg->user_id?>">Actions</a></td>
            <!-- Modal Update -->
            <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" id="modalC-<?php echo $peg->user_id?>">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title ml-auto" id="exampleModalCenterTitle">Tambah Pegawai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="<?php echo base_url(). 'page/pegawai_update'; ?>" method="post">
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputNama">Nama Lengkap</label>
                          <input type="hidden" value="<?php echo $peg->user_id ?>" name="user_id">
                          <input required type="text" name="user_name" class="form-control" id="inputNama" placeholder="Masukan Nama" value="<?php echo $peg->user_name ?>">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputKtp">Nomor KTP</label>
                          <input required type="text" class="form-control" name="user_ktp" id="inputKtp" placeholder="Masukan Nomor" disabled value="<?php echo $peg->user_ktp ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputKtp">Password</label>
                        <input required type="password" class="form-control" name="user_password" id="inputKtp" placeholder="Masukan Password">
                      </div>
                      <div class="form-group">
                        <label for="inputKelamin">Jenis Kelamin</label>
                        <select required name="user_kelamin" id="" class="form-control">
                          <option value="">Pilih Jenis Kelamin</option>
                          <option value="L">Laki - Laki</option>
                          <option value="P">Perempuan</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="inputAddress">Alamat</label>
                        <textarea required name="user_alamat" class="form-control" id="inputAddress" placeholder="Masukan Alamat"><?php echo $peg->user_alamat ?></textarea>
                      </div>
                      <button type="submit" class="btn btn-success text-uppercase btn-lg">Insert Pegawai</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          <!-- End Modal Update -->
      		</tr>
      	<?php 	}} ?>
      	</tbody>
      </table>
</main>
<!-- Modal Create -->
<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title ml-auto" id="exampleModalCenterTitle">Tambah Pegawai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(). 'page/pegawai_tambah'; ?>" method="post">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputNama">Nama Lengkap</label>
              <input required type="text" name="user_name" class="form-control" id="inputNama" placeholder="Masukan Nama">
            </div>
            <div class="form-group col-md-6">
              <label for="inputKtp">Nomor KTP</label>
              <input required type="text" class="form-control" name="user_ktp" id="inputKtp" placeholder="Masukan Nomor">
            </div>
          </div>
          <div class="form-group">
            <label for="inputKtp">Password</label>
            <input required type="password" class="form-control" name="user_password" id="inputKtp" placeholder="Masukan Password">
          </div>
          <div class="form-group">
            <label for="inputKelamin">Jenis Kelamin</label>
            <select required name="user_kelamin" id="" class="form-control">
              <option value="">Pilih Jenis Kelamin</option>
              <option value="L">Laki - Laki</option>
              <option value="P">Perempuan</option>
            </select>
          </div>
          <div class="form-group">
            <label for="inputAddress">Alamat</label>
            <textarea required name="user_alamat" class="form-control" id="inputAddress" placeholder="Masukan Alamat"></textarea>
          </div>
          <button type="submit" class="btn btn-success text-uppercase btn-lg">Insert Pegawai</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Create -->