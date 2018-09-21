<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $titulo?></title>
    <script src="<?php echo base_url();?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script defer src="<?php echo base_url();?>assets/js/all.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/datatables.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/normalize.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/styles_principal.css">
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

    .container-login{
        padding:30px 30px 10px 30px;;
        background: #fff;
    }

    img{
        width:155px;
        height:155px;
    }

    .icon-user{
        margin-left:3px;
        position:absolute;
        top:222px;
        left:50px;
    }

    .icon-pass{
        margin-left:3px;
        position:absolute;
        top:270px;
        left:50px;
    }

    .input-indent{
        text-indent:30px;
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

        $(document).on('submit', '.procesoLogin', function(event){
                var url="<?php echo base_url()?>";
                var post = $(this);
                var formElement = document.querySelector(".procesoLogin");
                var formData = new FormData(formElement);
                    $.ajax({
                        url: $('.procesoLogin').attr('action')+"?"+$.now(),  
                        type: 'POST',
                        data: formData,
                        cache: false,
                        processData: false,
                        dataType: "json",
                        contentType : false,
                        success: function (data) {
                            if(data.res == "error"){
                                $.notify(data.msg, {
                                className:'error',
                                globalPosition: 'top right',
                                autoHideDelay:5000,
                                });
                            $("#correo").focus();
                            }else if(data.res == "ok"){
                                $('.procesoLogin')[0].reset();
                                window.location="usuario";
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
            <?php echo form_open_multipart("procesoLogin",array("id"=>"procesoLogin","class"=>"procesoLogin"))?>
                <div class="container-login">
                    <div class="text-center" style="padding-bottom:30px">
                        <img src="<?php base_url();?>assets/imagenes/login1.png" alt="">
                    </div>
                    <div class="form-group">
                        <i class="fas fa-user icon-user"></i>
                        <input type="email" name="correo" id="correo" autocomplete="off" placeholder="Ingrese su correo" class="form-control form-control-sm input-indent">
                    </div>
                    <div class="form-group">
                        <i class="fas fa-key icon-pass"></i>
                        <input type="password" name="pass" id="pass" autocomplete="off" placeholder="Ingrese su contrase&ntilde;a" class="form-control form-control-sm input-indent">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary col-12">Ingresar</button>
                    </div>
                    <div class="row pl-2">
                        <p>¿No tiene cuenta?, por favor</p>&nbsp;
                        <a class="a-login" href="<?php base_url();?>registro">Registrese</a>
                    </div>
                </div>
            <?php echo form_close();?>
        </div>
    </div>


    <script src="<?php echo base_url();?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/notify.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
</body>
</html>