<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5">Dashboard <?php if($this->session->userdata('level')==='1'):?>Pegawai<?php elseif($this->session->userdata('level')==='2'):?>Dokter<?php else:?>
          <?php endif;?></h1>
        <span class="text-capitalize">Selamat Datang , <?php if($this->session->userdata('level')==='1'):?><?php elseif($this->session->userdata('level')==='2'):?>Dr.<?php else:?>
          <?php endif;?> <?php echo $this->session->userdata('username');?></span>
      </div>
      <!-- Content -->
      <div class="row">
      <div class="col-md-4">
      <div class="media border border-success p-3">
      	<i class="fa fa-user-circle fa-4x mr-2 text-success"></i>
      	<div class="media-body">
      		<h5 class="mb-0">Total Pasien</h5>
      		<h2>120</h2>
      	</div>
      </div>
      </div>
      <div class="col-md-4">
      <div class="media border border-success p-3">
      	<i class="fa fa-list fa-4x mr-2 text-success"></i>
      	<div class="media-body">
      		<h5 class="mb-0">Total Panggilan</h5>
      		<h2>0</h2>
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
        <form action="<?php echo base_url(). 'page/search'; ?>" method="post">
        <input type="search" name="keyword" class="form-control form-control-lg w-50" placeholder="Masukan nomor ktp.." required="">
        <button type="submit" class="btn btn-success mt-4 text-uppercase">Cari pasien<i class="ml-2 fa fa-search"></i></button>
        </form>
      </div>
      <!-- End Panggilan -->
      <?php else:?>
          <?php endif;?>
    </main>