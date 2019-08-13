<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5">Dashboard <?php if($this->session->userdata('level')==='1'):?>Pegawai<?php elseif($this->session->userdata('level')==='2'):?>Dokter<?php else:?>
          <?php endif;?></h1>
          <div class="border px-3 py-2 border-success rounded text-success">
          <span class="text-capitalize">Selamat Datang , <?php if($this->session->userdata('level')==='1'):?><?php elseif($this->session->userdata('level')==='2'):?>Dr.<?php else:?>
          <?php endif;?> <?php echo $this->session->userdata('username');?></span>
          </div>
      </div>
      <!-- Content -->
      <div class="row">
      <div class="col-md-4">
      <div class="media bg-success text-white p-3 rounded">
      	<i class="fa fa-user-circle fa-4x mr-2"></i>
      	<div class="media-body">
      		<h5 class="mb-0">Total Panggilan</h5>
          <?php
          $dat = date('Y-m-d'); 
          $sql = "SELECT * FROM tbl_pasiens WHERE pasien_status=1 AND pasien_reg LIKE '$dat%' ";
          $noa = $this->db->query($sql)->result();
          function pass($noa){
            $data = count($noa);
            switch ($data) {
              case 0:
                echo "0";
                break;
                case $data:
                if (strlen($data) >1) {
                  echo $data;
                }else{
                  echo '0'.$data;
                }
                  break;
              default:
                break;
            }
          }
          ?>  
      		<h2>
          <?php pass($noa); ?>
          </h2>
      	</div>
      </div>
      </div>
      <div class="col-md-4">
      <div class="media bg-success text-white p-3 rounded">
      	<i class="fa fa-list fa-4x mr-2"></i>
      	<div class="media-body">
      		<h5 class="mb-0">Total Obat</h5>
          <?php
          $dae = date('Y-m-d'); 
          $rrq = "SELECT * FROM tbl_pasiens WHERE pasien_status=3 AND pasien_reg LIKE '$dae%' ";
          $nia = $this->db->query($rrq)->result();
          function piss($nia){
            $dot = count($nia);
            switch ($dot) {
              case 0:
                echo "0";
                break;
                case $dot:
                if (strlen($dot) >1) {
                  echo $dot;
                }else{
                  echo '0'.$dot;
                }
                  break;
              default:
                break;
            }
          }
          ?>
      		<h2>
          <?php piss($nia) ?>  
          </h2>
      	</div>
      </div>
      </div>
      </div>
      <!-- End Content -->
      <?php if($this->session->userdata('level')==='1'):?><?php elseif($this->session->userdata('level')==='2'):?>
      <!-- Panggilan -->
      <div class="mt-4">
        <h1 class="h5">Proses Pengobatan</h1>
        <hr>
        <div class="row">
        <div class="col-md-4">
        <?php 
        $sql = "SELECT * FROM tbl_pasiens WHERE pasien_status=2";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
          foreach ($query->result() as $keya) {
         ?>

         <div class="media border rounded border-success p-4">
          <i class="fa fa-user-circle fa-4x mr-2 text-success"></i>
          <div class="media-body">
            
            <h5 class="text-capitalize mb-0"><?php echo $keya->pasien_nama ?></h5>
            <p class="mb-0"><?php echo $keya->pasien_ktp ?></p>
            <?php if ($keya->pasien_status == 1): ?>
              <div class="badge badge-success">
                Active
              </div>
              <?php elseif($keya->pasien_status == 2): ?>
                <div class="badge badge-warning">
                Proses
              </div>
              <?php else: ?>
              <div class="badge badge-dark">
                Deactive
              </div>
            <?php endif ?>
          
          </div>
        </div>

        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title ml-auto" id="exampleModalCenterTitle">Diagnosa Pasien</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?php echo base_url(). 'page/tambah_diagnosa'; ?>" method="post">
          <div class="form-group">
            <label for="inputJudul">Nama Penyakit</label>
            <input type="hidden" name="pasien_id" value="<?php echo $keya->pasien_id; ?>">
            <textarea required name="konsultan_judul" class="form-control" id="inputJudul" placeholder="Masukan Penyakit"></textarea>
          </div>
          <div class="form-group">
            <label for="inputObat">Obat Penyakit</label>
            <textarea required name="konsultan_obat" class="form-control" id="inputObat" placeholder="Masukan Obat"></textarea>
          </div>
          <button type="submit" class="btn btn-success text-uppercase btn-lg">Insert Diagnosa</button>
        </form>
      </div>
    </div>
  </div>
</div>
         
        </div>
        <div class="col-md">
          <a href="javascript:void(0)" class="btn btn-success text-uppercase"  data-toggle="modal" data-target="#exampleModalCenter">Diagnosa pasien</a>
        </div>
       <?php }} ?>
        </div>
        <!-- <form action="<?php echo base_url(). 'page/search'; ?>" method="post">
        <input type="search" name="keyword" class="form-control form-control-lg w-50" placeholder="Masukan nomor ktp.." required="">
        <button type="submit" class="btn btn-success mt-4 text-uppercase">Cari pasien<i class="ml-2 fa fa-search"></i></button>
        </form> -->

      </div>

      <div class="mt-4">
        <h1 class="h5">Record History</h1>
        <hr>
        <table class="table table-bordered">
          <thead class="bg-success text-white">
            <tr>
              <th>#</th>
              <th>Tanggal</th>
              <th>Penyakit</th>
              <th>Obat</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $sql = "SELECT * FROM tbl_pasiens WHERE pasien_status=2";
            $query = $this->db->query($sql);
             if ($query->num_rows() > 0) {
              foreach ($query->result() as $keya) {
             ?>
            <?php 
            $no = 1;
            $nuno = $keya->pasien_id;
            $rql ="SELECT * FROM tbl_konsultans WHERE pasien_id=$nuno";
            $qlr = $this->db->query($rql);
            if ($qlr->num_rows() > 0) {
            foreach ($qlr->result() as $raa) {
            ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $raa->konsultan_tgl ?></td>
              <td><?php echo $raa->konsultan_judul ?></td>
              <td><?php echo $raa->konsultan_obat ?></td>
            </tr>
          <?php }} ?>
          <?php }} ?>
          </tbody>
        </table>
      </div>
      <!-- End Panggilan -->
      <?php else:?>
          <?php endif;?>
    </main>