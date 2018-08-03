<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $titulo?></title>
    <script src="<?php echo base_url();?>assest/js/popper.min.js"></script>
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
  <div class="container-fluid">
      <div class="row">
        <div class="col">
          <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">TELCO-SOCIAL</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent2">
              <ul class="navbar-nav d-flex align-items-center w-100">
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
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-calendar-alt mr-2 align-baseline"></i>Publicaciones
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                    <a class="dropdown-item" href="#">Recientes</a>
                    <a class="dropdown-item" href="#">M&aacute;s Populares</a>
                    <a class="dropdown-item" href="#">Antiguas</a>
                  </div>
                </li>
                <li class="nav-item ml-auto col-3" id="perfil-usuario" style="padding-left:0 !important;">
                  <img class="perfil mr-2" src="<?php echo base_url()?>assest/imagenes/user.png" alt="">
                  <span>Nombre&nbsp;Usuario</span>
                </li>
              </ul>
              <!--<div class="col-3 ml-auto" id="perfil" style="color:#fff;padding-left:0 !important;">
                <img class="perfil mr-2" src="<?php echo base_url()?>assest/imagenes/user.png" alt="">
                <span>Nombre&nbsp;Usuario</span>
              </div>-->
            </div>
          </nav>
        </div>
      </div>
