<div class="row principal" style="min-height:100vh">
    <div class="colaside1 col-lg-3 col-xl-3">
        <div class="aside-1">
            <div class="col" style="padding:0">
            <?php if(empty($fotoperfil)):?>
                <img class="img-perfil-grande" src="<?php echo base_url()?>assest/imagenes/user.png" alt="">
            <?php else:?>
                <img class="img-perfil-grande" src="<?php echo base_url()?>assest/imagenes/perfil/<?php echo $fotoperfil;?>" alt="">
            <?php endif?>
            </div>
            <div class="col" style="padding:0">
                <h5>Multimedia</h5>
            </div>
            <div class="col" style="padding:0">
                <div>
                    <a class="nav-link" href="#"><i class="far fa-images" style="color:#04B404"></i>&nbsp;Im&aacute;genes</a>
                    <!--<a class="nav-link" href="#"><i class="fas fa-video" style="color:#0174DF"></i>&nbsp;Videos</a>-->
                    <a class="nav-link" href="#"><i class="far fa-file" style="color:#DF7401"></i>&nbsp;Archivos</a>
                </div>
            </div>
            <div class="mt-4">
                <h5>Páginas de Empleos</h5>
            </div>
            <div class="col" style="padding:0">
                <ul class="list-group">
                <li class="mb-2 d-flex justify-content-between align-items-center">
                    <a class="list-paginas container-paginas" href="https://www.laborum.cl/" target="_blank">Laborum</a>
                </li>
                <li class="mb-2 d-flex justify-content-between align-items-center">
                    <a class="list-paginas container-paginas" href="https://www.computrabajo.cl/" target="_blank">CompuTrabajo</a>
                </li>
                <li class="mb-2 d-flex justify-content-between align-items-center">
                    <a class="list-paginas container-paginas" href="https://www.indeed.cl/" target="_blank">Indeed</a>
                </li>
                <li class="d-flex justify-content-between align-items-center">
                    <a class="list-paginas container-paginas" href="https://www.trabajando.cl/" target="_blank">Trabajando</a>
                </li>
                </ul>
            </div>
        </div>
    </div>

