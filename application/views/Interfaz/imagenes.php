<script type="text/javascript">
</script>

<div class="container-central col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
    <?php foreach($imgperfil as $per):?>
        <div class="row">
            <div>
                <div class="dropdown d-flex justify-content-end">
                    <button class="btn boton-drop-elimi dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        x
                    </button>
                    <div class="dropdown-menu menu-eliminar" aria-labelledby="dropdownMenuButton">
                        <button class="dropdown-item link-drop-elimi btn-eliminar" type="submit">Eliminar Foto</button>
                    </div>
                </div>
                <img class="img-seccion" src="<?php echo base_url()?>assest/imagenes/perfil/<?php echo $per["fotop"]?>" alt="">
            </div>
        </div>
    <?php endforeach?>
    <hr>
    <div class="row">
    <?php foreach($imgpost as $post):?>
        <div class="mr-3">
            <div class="dropdown d-flex justify-content-end">
                <button class="btn boton-drop-elimi dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    x
                </button>
                <div class="dropdown-menu menu-eliminar" aria-labelledby="dropdownMenuButton2">
                    <button class="dropdown-item link-drop-elimi btn-eliminar" type="submit">Eliminar Foto</button>
                </div>
            </div>
            <img class="img-seccion" src="<?php echo base_url()?>assest/imagenes/subidas/<?php echo $post["imagen"]?>" alt="">
        </div>
    <?php endforeach?>
    </div>
</div>