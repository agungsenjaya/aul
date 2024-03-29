<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5">List Panggilan / <span class="text-success"><?php echo date('d-m-Y') ?></span>
          <a href="javascript:void(0)" class="btn btn-success ml-3" title="" data-toggle="modal" data-target="#modalClear"><i class="fa fa-refresh mr-2"></i>CLEAR PANGGILAN</a>
        </h1>
        <!-- Modal Clear -->
        <div class="modal fade" id="modalClear" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content border-0">
              <div class="modal-body">
                <button type="button" class="close ml-2" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <p class="lead"><i class="fa fa-info-circle mr-2 text-success"></i>Apakah anda yakin akan melakukan clearing list pasien & obat.</p>
                <hr>
                <form action="<?php echo base_url(); ?>page/pasien_clear" method="POST">
                  <button type="submit" class="btn btn-lg btn-success text-uppercase">Ya, Saya Yakin</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- End Modal Clear -->
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>page">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">List Panggilan</li>
        </ol>
        </nav>
      </div>
      <table class="table table-bordered">
      	<thead class="bg-success text-white">
      		<tr>
      			<th>#</th>
      			<th>Nama</th>
      			<th>Nomor Nik</th>
      			<th>Panggilan</th>
      			<th>Status</th>
      		</tr>
      	</thead>
      	<tbody>
          <?php 
          $no = 1;
          foreach ($pasien as $key) {?>
      		<tr>
            <td class="bg-light"><?php echo $no++; ?></td>
            <td class="text-capitalize font-weight-bold"><?php echo $key->pasien_nama ?></td>
      			<td class="bg-light"><?php echo $key->pasien_ktp ?></td>
            <td>
              <?php if ($key->pasien_status == 1): ?>
                <div class="d-flex">
                  <div class="mr-2">
                  <form action="<?php echo base_url(). 'page/pasien_proses'; ?>" method="post">
                  <input type="hidden" name="pasien_id" value="<?php echo $key->pasien_id ?>">
                    <button type="submit" class="btn btn-success">Proses</button>
                  </form>
                  </div>
                  <div>
                    <form action="<?php echo base_url(); ?>page/pasien_rc" method="POST">
                      <input type="hidden" name="pasien_id" value="<?php echo $key->pasien_id; ?>">
                        <button type="submit" title="" class="btn btn-danger">Hapus</button>
                    </form>
                  </div>
                </div>
                <?php else: ?>
                  <button type="button" disabled class="btn btn-dark">Proses</button>
              <?php endif ?>
            </td>
            <td class="bg-light">
              <?php if ($key->pasien_status == 1): ?>
                <span class="badge badge-success">Active</span>
                <?php else:?>
                <span class="badge badge-warning">Proses</span>
              <?php endif ?>
            </td>
      		</tr>
        <?php } ?>
      	</tbody>
      </table>
      <div class="mt-4">
        <h1 class="h5">Pasien Obat</h1>
        <hr>
        <table class="table table-bordered">
          <thead class="bg-success text-white">
            <tr>
              <th>#</th>
              <th>Nama</th>
              <th>Nomor Nik</th>
              <th>Actions</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no =1;
            $mld = "SELECT * FROM tbl_pasiens WHERE pasien_status=3";
            $tu = $this->db->query($mld);
            if ($tu->num_rows() > 0) {
              foreach ($tu->result() as $lp) {?>
            <tr>
              <td class="bg-light"><?php echo $no++; ?></td>
              <td class="text-capitalize font-weight-bold"><?php echo $lp->pasien_nama; ?></td>
              <td class="bg-light"><?php echo $lp->pasien_ktp; ?></td>
              <td><a href="javascript:void(0)" title="" class="btn btn-success" data-toggle="modal" data-target="#md-<?php  echo $lp->pasien_id ?>">Details</a></td>
              <div class="modal fade" id="md-<?php  echo $lp->pasien_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content border-0">
      <div class="modal-header border-0">
        <h5 class="modal-title ml-auto" id="exampleModalCenterTitle">Obat Pasien</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php 
        $dd = date('Y-m-d');
        $jkl = "SELECT * FROM tbl_konsultans WHERE pasien_id=$lp->pasien_id AND konsultan_tgl LIKE '$dd%'  ";
        $fi = $this->db->query($jkl);
        if ($fi->num_rows() > 0) {
          foreach ($fi->result() as $kela) {
       ?>
       <p class="font-weight-bold mb-0">Penyakit Pasien</p>
       <p><?php echo $kela->konsultan_judul ?></p>
       <hr>
       <p class="font-weight-bold mb-0">Obat Pasien</p>
       <p><?php echo $kela->konsultan_obat ?></p>

        <div class="py-3 mx-auto">
          <form action="<?php echo base_url(). 'page/pasien_finish'; ?>" method="post">
            <input type="hidden" name="pasien_id" value="<?php echo $lp->pasien_id ?>">
            <button type="submit" class="btn btn-success">Finish Pasien</button>
          </form>
        </div>

     <?php }} ?>
      </div>
    </div>
  </div>
</div>
              <td class="bg-light">
                <span class="badge badge-success">Ambil Obat</span>
              </td>
            </tr>
          <?php }} ?>
          </tbody>
        </table>
      </div>
  </main>