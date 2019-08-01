<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5">List Panggilan / <span class="text-success"><?php echo date('d-m-Y') ?></span></h1>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>page">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">List Panggilan</li>
        </ol>
        </nav>
      </div>
      <table class="table table-bordered">
      	<thead class="thead-light">
      		<tr>
      			<th>#</th>
      			<th>Nama</th>
      			<th>Nomor Ktp</th>
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
                <form action="<?php echo base_url(). 'page/pasien_proses'; ?>" method="post">
              <input type="hidden" name="pasien_id" value="<?php echo $key->pasien_id ?>">
                <button type="submit" class="btn btn-success">Proses</button>
              </form>
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
          <thead class="thead-light">
            <tr>
              <th>#</th>
              <th>Nama</th>
              <th>Nomor Ktp</th>
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
              <td><a href="javascript:void(0)" title="" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">Details</a></td>
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
      <?php 
        $dd = date('Y-m-d');
        $jkl = "SELECT * FROM tbl_konsultans WHERE pasien_id=$lp->pasien_id";
        $fi = $this->db->query($jkl);
        if ($fi->num_rows() > 0) {
          foreach ($fi->result() as $kela) {
       ?>
       <p><?php echo $kela->konsultan_judul ?></p>
       <p><?php echo $kela->konsultan_obat ?></p>
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