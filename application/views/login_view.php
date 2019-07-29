<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIK | Login Area</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/app.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/login.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<form class="form-signin" action="<?php echo site_url('login/auth');?>" method="post">
  <div class="text-center mb-4">
    <div class="mb-3">
        <h5 class="font-bold text-uppercase"><i class="fa border border-success fa-plus text-success p-2 bg-white  mr-2"></i>Klinik PT Glostar Indonesia</h5>
    </div>
    <hr>
    <p>Selamat datang di halaman login akses <br> <b>Dashboard</b> klinik kesehatan.</p>
  </div>
  <div class="text-center mb-3">
    <span class="text-danger"><?php echo $this->session->flashdata('msg');?></span>
    </div>
  
  <div class="form-label-group">
    <input type="text" id="inputName" name="name" class="form-control" placeholder="User Name" required autofocus>
    <label for="inputName">User Name</label>
  </div>

  <div class="form-label-group">
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
    <label for="inputPassword">Password</label>
  </div>

  <button class="btn btn-lg btn-success btn-block text-uppercase" type="submit">Login now</button>
  <p class="mt-5 mb-3 text-muted text-center small">&copy; Hak cipta dibuat oleh <b class="text-success">Aulida Ardini</b> 2019</p>
</form>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>