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
    <script defer src="<?php echo base_url();?>assest/js/all.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>assest/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assest/css/normalize.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assest/css/styles_principal.css">
<style>
    body{
        /*background-image: linear-gradient(
            rgba(0, 0, 0, 0.5),
            rgba(0, 0, 0, 0.5)
        ),url("assest/imagenes/teleco.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;*/
        background:#2E2E2E;
        min-height:100vh;
        margin:0;
        padding:0;
        overflow:hidden;
    }

    .container-registro{
        padding:30px 30px 10px 30px;;
        background: #fff;
    }

    .input-indent{
        text-indent:10px;
    }

    .hv-100{
        min-height:100vh;
    }

    .a-login{
        text-decoration:none !important;
    }

    .a-login:hover{
        color:#DF013A !important;
    }

    .btn.btn-primary{
        background:#DF013A !important;
    }

    .btn-primary:hover{
        background:#FE2E64 !important;
    }


</style>

<script type="text/javascript">
$(function(){

    /* ---- Creacion de usuario con AJAX ----*/
    $(document).on('submit', '#procesoRegistro',function(event) {
          var url="<?php echo base_url()?>";
          var formElement = document.querySelector("#procesoRegistro");
          var formData = new FormData(formElement);
            $.ajax({
                url: $('#procesoRegistro').attr('action')+"?"+$.now(),  
                type: 'POST',
                data: formData,
                cache: false,
                processData: false,
                dataType: "json",
                contentType : false,
                success: function (data) {
                  if(data.res == "error"){
                     $(".btn_registro").attr("disabled", true);
                      $("#procesoRegistro input,#procesoRegistro button,#procesoRegistro").prop("disabled", false);
                      $.notify(data.msg, {
                        className:'error',
                        globalPosition: 'top right',
                        autoHideDelay:5000
                      });
                  }else if(data.res == "ok"){
                    $(".btn_registro").attr("disabled", false);
                    $("#procesoRegistro input,#procesoRegistro button,#procesoRegistro").prop("disabled", false);
                    $.notify(data.msg, {
                      className:'success',
                      globalPosition: 'top right',
                      autoHideDelay:5000
                    });
                  }
                }
          });
          return false; 
      });
});
    
    
</script>
</head>
<body>
    <div class="row hv-100 justify-content-center align-items-center">
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            <div class="container-registro">
                <div class="col mb-4 pl-0">
                    <h5>Ingrese sus Datos</h5>
                </div>
                <?php echo form_open_multipart("procesoRegistro",array("id"=>"procesoRegistro","class"=>"procesoRegistro"))?>
                    <input type="hidden" name="id_usuario" id="id_usuario">
                <div class="form-group">
                    <input type="text" name="nombre" id="nombre" autocomplete="off" placeholder="Ingrese su nombre" class="form-control form-control-sm input-indent">
                </div>
                <div class="form-group">
                    <input type="text" name="apellidos" id="apellidos" autocomplete="off" placeholder="Ingrese apellidos" class="form-control form-control-sm input-indent">                 </div>
                <div class="form-group">
                    <input type="email" name="correo" id="correo" autocomplete="off" placeholder="Ingrese su correo" class="form-control form-control-sm input-indent">
                </div>
                <div class="form-group">
                    <input type="password" name="pass" id="pass" autocomplete="off" placeholder="Ingrese su contrase&ntilde;a" class="form-control form-control-sm input-indent">
                </div>
                <div class="form-group">
                    <input type="password" name="pass2" id="pass2" autocomplete="off" placeholder="Repita su contrase&ntilde;a" class="form-control form-control-sm input-indent">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn_registro col-12">Registrarse</button>
                </div>
                <?php echo form_close();?>
                <div class="row pl-2">
                    <p>¿Ya tienes una cuenta?, por favor</p>&nbsp;
                    <a class="a-login" href="<?php base_url();?>login">Inicia sesi&oacute;n</a>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url();?>assest/js/popper.min.js"></script>
    <script src="<?php echo base_url();?>assest/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url();?>assest/js/notify.min.js"></script>
    <script src="<?php echo base_url();?>assest/js/bootstrap.min.js"></script>
    <script defer src="<?php echo base_url();?>assest/js/all.js"></script>
</body>
</html>