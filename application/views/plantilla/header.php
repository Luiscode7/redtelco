<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $titulo?></title>
    <script src="<?php echo base_url();?>assest/js/popper.min.js"></script>
    <script src="<?php echo base_url();?>assest/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assest/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url();?>assest/js/datatables.min.js"></script>
    <script defer src="<?php echo base_url();?>assest/js/all.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>assest/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assest/css/datatables.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assest/css/normalize.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assest/css/styles_principal.css">
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">TELCO-SOCIAL</a>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="#"><i class="fas fa-info-circle mr-2 align-baseline"></i>Acerca De</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fas fa-users mr-2 align-baseline"></i>Personas</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-calendar-alt mr-2 align-baseline"></i>Publicaciones</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Recientes</a>
                <a class="dropdown-item" href="#">M&aacute;s Populares</a>
                <a class="dropdown-item" href="#">Antiguas</a>
              </div>
            </li>
          </ul>
          <button type="submit" class="btn btn-secondary ml-4">Iniciar Sesi&oacute;n</button>
        </div>
      </nav>
    </div>
  </div>
  
<!--<aside class="aside-1 col-md-3 col-lg-3 col-xl-3">
  <div class="">
  <ul class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Cantidad de publicaciones
    <span class="badge badge-primary badge-pill">14</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Cantidad de comentarios
    <span class="badge badge-primary badge-pill">2</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Cantidad de me gusta
    <span class="badge badge-primary badge-pill">1</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Cantidad de no me gusta
    <span class="badge badge-primary badge-pill">1</span>
  </li>
</ul>
  </div>
</aside>-->

<!--<aside class="aside-2 col-md-3 col-lg-3 col-xl-3">
<div class="card text-center" style="width: 17,5rem;">
  <div class="card-body">
    <h5 class="card-title">Registro</h5>
    <p class="card-text">¿Desea compartir im&aacute;genes y conocer a T&eacute;cnicos como Ud.?
       Comience registrandose en nuestra red y disfrute de todo el contenido.</p>
    <a href="#" class="btn btn-primary">Registrar</a>
  </div>
</div>
</aside>-->
