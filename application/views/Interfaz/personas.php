<script type="text/javascript">
$(function(){



});
</script>
<div class="container-central col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
    <?php if(!empty($usuarios)):?>
        <?php foreach($usuarios as $per):?>
            <?php echo form_open_multipart("agregarAmigo",array("id"=>"agregarAmigo","class"=>"agregarAmigo"))?>
                <div class="row container-mostrarper d-flex align-items-center">
                    <?php $id_usuario=$per["id"]; $clave = $this->encryption->encrypt($id_usuario);?>
                    <input type="hidden" name="id_seramigo" value="<?php echo $clave ?>">
                    <div class="col-2" style="margin:10px 0 10px 0;">
                    <img class="img-mostrarper" src="<?php echo base_url()?>assest/imagenes/perfil/<?php echo $per["foto"];?>" alt="">
                    </div>
                    <div class="col-4">
                        <span><?php echo $per["nombre"];?></span>
                    </div>
                    <div class="col-5">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-user-plus mr-2 align-baseline"></i>Agregar como Amigo</button>
                    </div>
                </div>
            <?php echo form_close();?> 
        <?php endforeach; ?>
    <?php endif; ?>
</div>