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

    $(".personasusu").click(function(){
        var url = "<?php echo base_url();?>";
        $.ajax({
          url: "mostrarUsuariosAno",
          type:"POST",
          data:{},
          success:function(){
            window.location="mostrarUsuariosAno";
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
      <div class="container-navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="<?php base_url();?>anonimo">TELCO-SOCIAL</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="#"><i class="fas fa-info-circle mr-2 align-baseline"></i>Acerca De</a>
              </li>
              <li class="nav-item">
                <a class="nav-link personasusu" href="#"><i class="fas fa-users mr-2 align-baseline"></i>Personas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="anonimo"><i class="fas fa-home mr-2 align-baseline"></i>Inicio</a>
              </li>
              <li class="nav-item">
                <a href="<?php base_url();?>login" class="btn btn-secondary btn-sinshadow ml-4">Iniciar Sesi&oacute;n</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </div>
  
