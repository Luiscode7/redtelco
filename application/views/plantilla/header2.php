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
  <div class="collapse navbar-collapse col-md-10" id="navbarNavDropdown">
    <ul class="navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="#"><i class="fas fa-home mr-2 align-baseline"></i>Inicio</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#"><i class="fas fa-info-circle mr-2 align-baseline"></i>Acerca De</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-envelope mr-2 align-baseline"></i>Mensajes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-bell mr-2 align-baseline"></i>Notificaciones</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-calendar-alt mr-2 align-baseline"></i>Publicaciones
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Recientes</a>
          <a class="dropdown-item" href="#">M&aacute;s Populares</a>
          <a class="dropdown-item" href="#">Antiguas</a>
        </div>
      </li>
    </ul>
  <div class="ml-auto" style="color:#fff;">
    <img class="perfil mr-2" src="<?php echo base_url()?>assest/imagenes/user.png" alt="">Nombre usuario
  </div>
</nav>
        </div>
    </div>
  
  
<!--<aside class="aside-1 col-md-3 col-lg-3 col-xl-3">
  <div>
        <h5>Multimedia</h5>
  </div>
    <div>
    <nav class="nav flex-column">
    <a class="nav-link" href="#"><i class="far fa-images" style="color:#04B404"></i>&nbsp;Im&aacute;genes</a>
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
  <div>
    <h5 class="mb-4">Seguidores</h5>
  </div>
  <div class="container row justify-content-center" style="margin:0">
    <img class="perfil mr-2 mt-2" src="<?php echo base_url()?>assest/imagenes/user.png" alt="">
    <img class="perfil mr-2 mt-2" src="<?php echo base_url()?>assest/imagenes/user.png" alt="">
    <img class="perfil mr-2 mt-2" src="<?php echo base_url()?>assest/imagenes/user.png" alt="">
    <img class="perfil mr-2 mt-2" src="<?php echo base_url()?>assest/imagenes/user.png" alt="">
    <img class="perfil mr-2 mt-2" src="<?php echo base_url()?>assest/imagenes/user.png" alt="">
    <img class="perfil mr-2 mt-2" src="<?php echo base_url()?>assest/imagenes/user.png" alt="">
    <img class="perfil mr-2 mt-2" src="<?php echo base_url()?>assest/imagenes/user.png" alt="">
    <img class="perfil mr-2 mt-2" src="<?php echo base_url()?>assest/imagenes/user.png" alt="">
    <a class="mr-auto mt-4" href="#">Ver todos</a>
  </div><br><br><br>
    
  <div>
    <h5 class="mb-4">Encuesta</h5>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Ir a Encuesta</button>
  </div>-->

  <!-- Modal -->
<!--<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>-->

