<script type="text/javascript">
$(function(){

    $(".imagenes").click(function(){
        var url = "<?php echo base_url();?>";
        $.ajax({
          url: "seccionImgPerfil",
          type:"POST",
          data:{},
          success:function(){
            window.location="seccionImgPerfil";
          }
        });
        return false;
    });
});
</script>
<div class="row principal" style="min-height:100vh">
    <div class="colaside1 col-lg-3 col-xl-3">
        <div class="aside-1">
            <div class="col" style="padding:0">
            <?php if(empty($fotoperfil)):?>
                <img class="img-perfil-grande" src="<?php echo base_url()?>assets/imagenes/user.png" alt="">
            <?php else:?>
                <img class="img-perfil-grande" src="<?php echo base_url()?>assets/imagenes/perfil/<?php echo $fotoperfil;?>" alt="">
            <?php endif?>
            </div>
            <div class="col" style="padding:0">
                <h5>Multimedia</h5>
            </div>
            <div class="col" style="padding:0">
                <div>
                    <a class="nav-link imagenes" href="#"><i class="far fa-images" style="color:#04B404"></i>&nbsp;Im&aacute;genes</a>
                    <!--<a class="nav-link" href="#"><i class="fas fa-video" style="color:#0174DF"></i>&nbsp;Videos</a>-->
                    <!--<a class="nav-link" href="#"><i class="far fa-file" style="color:#DF7401"></i>&nbsp;Archivos</a>-->
                </div>
            </div>
            <div class="mt-4 mb-4">
                <h5>Páginas de Empleos</h5>
            </div>
            <div class="col" style="padding:0">
                <ul class="list-group">
                <li class="mb-2 d-flex justify-content-between align-items-center">
                    <a class="list-paginas container-paginas" href="https://www.laborum.cl/empleos-busqueda-tecnico-telecomunicaciones.html" target="_blank">Laborum</a>
                </li>
                <li class="mb-2 d-flex justify-content-between align-items-center">
                    <a class="list-paginas container-paginas" href="https://www.computrabajo.cl/ofertas-de-trabajo/?q=tecnico%20telecomunicaciones" target="_blank">CompuTrabajo</a>
                </li>
                <li class="mb-2 d-flex justify-content-between align-items-center">
                    <a class="list-paginas container-paginas" href="https://www.indeed.cl/jobs?q=tecnico+telecomunicaciones&l=Santiago+de+Chile%2C+Regi%C3%B3n+Metropolitana" target="_blank">Indeed</a>
                </li>
                <li class="d-flex justify-content-between align-items-center">
                    <a class="list-paginas container-paginas" href="https://www.trabajando.cl/ofertas-trabajo-empleo/tecnico-telecomunicaciones/1Z_82V9uYQycK0paAPW2nTYIbjqPJb09lx8JvCPm8Oc7E004kxs1S5FKWIb-qZZfOfQ74JTKo6kY1SX8jn6ddA" target="_blank">Trabajando</a>
                </li>
                </ul>
            </div>
        </div>
    </div>

