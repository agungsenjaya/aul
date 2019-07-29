<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5">Hasil Pencarian</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>page/dokter">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Search</li>
        </ol>
      </div>

<div class="col-md-6 offset-md-3 mt-4 border py-4 border-success">
<div class="d-flex justify-content-between">
<div class="media">
	<i class="text-success fa fa-user-circle mr-2 fa-4x"></i>
	<div class="media-body">
		<?php foreach ($pasien as $key) { ?>
		<h5 class="text-capitalize mb-0"><?php echo $key->pasien_nama ?></h5>
		<p class="lead"><?php echo $key->pasien_ktp ?></p>
	</div>
</div>
<div>
	<a href="#" class="btn btn-success text-uppercase btn-small">Lihat Histori</a>
		<?php } ?>
</div>
</div>
</div>
</main>