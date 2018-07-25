<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $titulo?></title>
    <script src="<?php echo base_url();?>assest/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url();?>assest/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assest/js/datatables.min.js"></script>
    <script defer src="<?php echo base_url();?>assest/js/all.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>assest/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assest/css/datatables.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assest/css/normalize.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assest/css/styles_principal.css">
</head>
<body>
<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">TELCO-SOCIAL</a>
  <div class="collapse navbar-collapse col-md-8" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="#"><i class="fas fa-home mr-2 align-baseline icon-size"></i>Home</a>
      <a class="nav-item nav-link" href="#"><i class="fas fa-calendar-alt mr-2 align-baseline"></i>Timeline</a>
      <a class="nav-item nav-link" href="#"><i class="fas fa-users mr-2 align-baseline"></i>Personas</a>
    </div>
  </div>
  <div style="color:#fff;">
    <img class="perfil mr-2" src="<?php echo base_url()?>assest/imagenes/user.png" alt="">Nombre usuario
  </div>
</header>

<aside class="aside-1 col-md-3">
  <div>
        <h5>Multimedia</h5>
  </div>
    <div>
    <nav class="nav flex-column">
    <a class="nav-link" href="#"><i class="far fa-images" style="color:#04B404"></i>&nbsp;Imagenes</a>
    <a class="nav-link" href="#"><i class="fas fa-video" style="color:#0174DF"></i>&nbsp;Videos</a>
    <a class="nav-link" href="#"><i class="far fa-file" style="color:#DF7401"></i>&nbsp;Archivos</a>
    </nav>
    </div><br><br>

  <div>
        <h5>Estadisticas</h5>
  </div>
  <div class="">
  <ul class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Cras justo odio
    <span class="badge badge-primary badge-pill">14</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Dapibus ac facilisis in
    <span class="badge badge-primary badge-pill">2</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Morbi leo risus
    <span class="badge badge-primary badge-pill">1</span>
  </li>
</ul>
  </div>
</aside>

<aside class="aside-2 col-md-3">
  <div>
    <h5 class="mb-4">Seguidores</h5>
  </div>
  <div class="row justify-content-center">
    <img class="perfil mr-2 mt-2" src="<?php echo base_url()?>assest/imagenes/user.png" alt="">
    <img class="perfil mr-2 mt-2" src="<?php echo base_url()?>assest/imagenes/user.png" alt="">
    <img class="perfil mr-2 mt-2" src="<?php echo base_url()?>assest/imagenes/user.png" alt="">
    <img class="perfil mr-2 mt-2" src="<?php echo base_url()?>assest/imagenes/user.png" alt="">
    <img class="perfil mr-2 mt-2" src="<?php echo base_url()?>assest/imagenes/user.png" alt="">
    <img class="perfil mr-2 mt-2" src="<?php echo base_url()?>assest/imagenes/user.png" alt="">
    <img class="perfil mr-2 mt-2" src="<?php echo base_url()?>assest/imagenes/user.png" alt="">
    <img class="perfil mr-2 mt-2" src="<?php echo base_url()?>assest/imagenes/user.png" alt="">
  </div>
</aside>
