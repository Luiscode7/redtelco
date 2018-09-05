<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $titulo?></title>
    <script src="<?php echo base_url();?>assest/js/jquery-3.3.1.min.js"></script>
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
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="#"><i class="fas fa-info-circle mr-2 align-baseline"></i>Acerca De</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fas fa-users mr-2 align-baseline"></i>Personas</a>
            </li>
            <!--<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-calendar-alt mr-2 align-baseline"></i>Publicaciones</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Recientes</a>
                <a class="dropdown-item" href="#">M&aacute;s Populares</a>
                <a class="dropdown-item" href="#">Antiguas</a>
              </div>
            </li>-->
            <li class="nav-item">
              <a class="nav-link" href="anonimo"><i class="fas fa-home mr-2 align-baseline"></i>Inicio</a>
            </li>
            <li class="nav-item">
              <a href="<?php base_url();?>login" class="btn btn-secondary ml-4">Iniciar Sesi&oacute;n</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
  
