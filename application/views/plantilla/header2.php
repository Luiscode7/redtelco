<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $titulo?></title>
    <script src="<?php echo base_url();?>assets/js/jquery-3.3.1.min.js"></script>
    <script defer src="<?php echo base_url();?>assets/js/all.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/datatables.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/normalize.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/styles_principal.css">
</head>
<script type="text/javascript">
$(function(){

    $(".sesion").click(function(){
        var url = "<?php echo base_url();?>";
        $.ajax({
          url: "cerrarSesion",
          type:"POST",
          data:{},
          success:function(){
            window.location.replace("anonimo");
          }
        });
        return false;
    });

    $(".iniciousu").click(function(){
        var url = "<?php echo base_url();?>";
        $.ajax({
          url: "MuroAnonimo",
          type:"POST",
          data:{},
          success:function(){
            window.location="MuroAnonimo";
          }
        });
        return false;
    });

    $(".murousu").click(function(){
        var url = "<?php echo base_url();?>";
        $.ajax({
          url: "MuroUsuarios",
          type:"POST",
          data:{},
          success:function(){
            window.location="MuroUsuarios";
          }
        });
        return false;
    });

     $(".edit-perfil").click(function(){
        var url = "<?php echo base_url();?>";
        $.ajax({
          url: "redirectEditarPerfil",
          type:"POST",
          data:{},
          success:function(){
            window.location="redirectEditarPerfil";
          }
        });
        return false;
    });

    $(".personas").click(function(){
        var url = "<?php echo base_url();?>";
        $.ajax({
          url: "mostrarUsuarios",
          type:"POST",
          data:{},
          success:function(){
            window.location="mostrarUsuarios";
          }
        });
        return false;
    });
    
});
</script>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

  <div class="container-fluid">
      <div class="row">
        <div class="col">
          <div class="container-navbar">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <a class="navbar-brand" href="<?php base_url();?>MuroAnonimo">TELCO-SOCIAL</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent2">
                <ul class="navbar-nav d-flex align-items-center w-100">
                  <!--<li class="nav-item active iniciousu">
                    <a class="nav-link" href="#"><i class="fas fa-home mr-2 align-baseline"></i>Inicio</a>
                  </li>-->
                  <div class="dropdown dropinicio">
                    <a href="#" class="btn dropdown-toggle btn-inicio" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-home mr-2 align-baseline"></i>Inicio</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item iniciousu" href="#">Muro An&oacute;nimo</a>
                      <a class="dropdown-item murousu" href="#">Muro Usuarios</a>
                    </div>
                  </div>
                  <li class="nav-item active personas">
                    <a class="nav-link" href="#"><i class="fas fa-users mr-2 align-baseline"></i>Personas</a>
                  </li>
                  <li class="nav-item ml-auto col-3" id="perfil-usuario" style="padding-left:0 !important;padding-right:0 !important;">
                    <a class="link-usuario" role="button" href="usuario">
                    <?php if(empty($fotoperfil)):?>
                      <img class="perfil mr-2" src="<?php echo base_url()?>assets/imagenes/user.png" alt="">
                    <?php else:?>
                      <img class="perfil mr-2" src="<?php echo base_url()?>assets/imagenes/perfil/<?php echo $fotoperfil;?>" alt="">
                    <?php endif?>
                        <span><?php echo $this->session->userdata("nombre")?></span>
                    </a>
                    <button type="button" class="btn-cerrar-sesion dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                      <span class="sr-only">Toggle Dropdown</span>
                      <i class="fas fa-sort-down fa-lg"></i>
                    </button>
                    <div class="dropdown-menu-session dropdown-menu" aria-labelledby="dropdownMenuReference">
                      <a class="dropdown-item sesion" href="#">Cerrar Sesi&oacute;n</a>
                      <a class="dropdown-item edit-perfil" href="#">Editar Perfil</a>
                    </div>
                  </li>
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
