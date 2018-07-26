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
<style>
    body{
    background-image: linear-gradient(
        rgba(0, 0, 0, 0.5),
        rgba(0, 0, 0, 0.5)
    ),url("assest/imagenes/teleco.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    min-height:100vh;
    }

    .container-login{
        min-height:100vh;
    }
</style>
</head>
<body>
    <div class="d-flex container-login align-items-center">
        <div class="container" style="width:40%">
            <div class="form-group">
                <input type="email" name="correo" id="correo" class="form-control form-control-sm">
            </div>
            <div class="form-group">
                <input type="password" name="pass" id="pass" class="form-control form-control-sm">
            </div>
            <button type="submit" class="btn btn-primary">Ingresar</button>
        </div>
    </div>
</body>
</html>