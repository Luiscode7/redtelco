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
<script type="text/javascript">
$(function(){

    /* --- BLOQUEA EL USO DE SCRIPT DESDE CONSOLA --- */
    var _z = console;
    Object.defineProperty( window, "console", {
        get : function(){
            if( _z._commandLineAPI ){
            throw "Lo siento, no está permitido ejecutar scripts!";
                }
            return _z; 
        },
        set : function(val){
            _z = val;
        }
    });

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
    
});
</script>
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
                <li class="nav-item active iniciousu">
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
                <!--<li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-calendar-alt mr-2 align-baseline"></i>Publicaciones
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                    <a class="dropdown-item" href="#">Recientes</a>
                    <a class="dropdown-item" href="#">M&aacute;s Populares</a>
                    <a class="dropdown-item" href="#">Antiguas</a>
                  </div>
                </li>-->
                <li class="nav-item ml-auto col-3" id="perfil-usuario" style="padding-left:0 !important;padding-right:0 !important;">
                  <a class="link-usuario" role="button" href="usuario">
                      <img class="perfil mr-2" src="<?php echo base_url()?>assest/imagenes/perfil/<?php echo $fotoperfil;?>" alt="">
                      <span><?php echo $this->session->userdata("nombre")." ".$this->session->userdata("apellidos")?></span>
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
              <!--<div class="col-3 ml-auto" id="perfil" style="color:#fff;padding-left:0 !important;">
                <img class="perfil mr-2" src="<?php echo base_url()?>assest/imagenes/user.png" alt="">
                <span>Nombre&nbsp;Usuario</span>
              </div>-->
            </div>
          </nav>
        </div>
      </div>
