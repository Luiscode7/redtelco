<div class="row" style="min-height:100vh">
    <div class="col-lg-3 col-xl-3">
        <div class="aside-1 position-fixed">
            <div class="col">
            <?php if(empty($fotoperfil)):?>
                <img class="img-perfil-grande" src="<?php echo base_url()?>assest/imagenes/user.png" alt="">
            <?php else:?>
                <img class="img-perfil-grande" src="<?php echo base_url()?>assest/imagenes/perfil/<?php echo $fotoperfil;?>" alt="">
            <?php endif?>
            </div>
            <div class="col">
                <h5 class="h5-usuario">Multimedia</h5>
            </div>
            <div class="col">
                <div>
                    <a class="nav-link" href="#"><i class="far fa-images" style="color:#04B404"></i>&nbsp;Im&aacute;genes</a>
                    <!--<a class="nav-link" href="#"><i class="fas fa-video" style="color:#0174DF"></i>&nbsp;Videos</a>-->
                    <a class="nav-link" href="#"><i class="far fa-file" style="color:#DF7401"></i>&nbsp;Archivos</a>
                </div>
            </div>
        </div>
    </div>

