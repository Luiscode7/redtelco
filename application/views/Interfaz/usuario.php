<script type="text/javascript">
$(function(){

    /* ---- Creacion de publicacion con AJAX ----*/
    $(document).on('submit', '#postUsuario',function(event) {
      var url="<?php echo base_url()?>";
      var formElement = document.querySelector("#postUsuario");
      var formData = new FormData(formElement);
        $.ajax({
            url: $('#postUsuario').attr('action')+"?"+$.now(),  
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
                    autoHideDelay:5000
                  });
              }else if(data.res == "ok"){
                
                $.notify(data.msg, {
                  className:'success',
                  globalPosition: 'top right',
                  autoHideDelay:5000
                });
                $('#postUsuario')[0].reset();
                window.location="usuario";
              }
            }
      });
      return false; 
  });

  /* -------- FUNCION PARA ME GUSTA ----------- */
  $(document).off('submit', '.meGustaUsu').on('submit', '.meGustaUsu', function(event){
            var form=$(this);
            var url="<?php echo base_url()?>";
                $.ajax({
                    url: $('.meGustaUsu').attr('action')+"?"+$.now(), 
                    type: 'POST',
                    dataType: "json",
                    data: form.serialize(),
                    processData:false,
                    success: function (data) {    
                           var padre = $(form).parent().parent();
                           var secondhijo = padre.children().eq(1);
                           var firsthijo = secondhijo.children().eq(1);
                           //var megusta = firsthijo.children().eq(1).html(data.datos);
                           console.log($(firsthijo));
                    }
                        
                });
                return false; 
        });

  /*--- FUNCION PARA UTILIZAR IMAGEN COMO INPUT FILE ---*/
  $("#imagen").click(function(){
      $("#uploadimagen").trigger("click");
  });

});
</script>
<div class="container-central col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
    <?php echo form_open_multipart("postUsuario",array("id"=>"postUsuario","class"=>"postUsuario"))?>
    <input type="hidden" name="id_post_usuario" id="id_post_usuario">
    <input type="hidden" name="id_usuario" id="id_post_usuario" value="<?php echo $this->session->userdata("id")?>">
    <div class="col container-public p-cero">
        <textarea name="contenido_usuario" id="contenido_usuario" class="textarea-post" placeholder="Escriba lo que desee..." cols="30" rows="10"></textarea>
        <button type="submit" name="Comentar" id="Comentar" class="btn btn-primary btn-post_u">Publicar</button>
        <input type="file" name="uploadimagen" id="uploadimagen" style="display:none">
        <a href="#"><i class="fas fa-smile ml-4 mr-4"></i></a>
        <a id="imagen" href="#"><i class="far fa-image mr-4"></i></a>
        <a href="#"><i class="fas fa-video"></i></a>
        <hr>
    </div> 
    <?php echo form_close();?> 

    <div id="publicarusu"></div>

    <?php if(!empty($posteos_usu)): ?>
        <?php foreach($posteos_usu as $usu): ?>
            <div class="col container-post border-post">
                <div class="perfil-post">
                    <img class="perfil mr-2" src="<?php echo base_url()?>assest/imagenes/user.png" alt="">
                    <span><?php echo $usu["nombre"]?></span>
                </div>
                <p class="p-post"><?php echo $usu["contenido"]?></p>
                <img style="width:100%" src="<?php echo base_url();?>assest/imagenes/subidas/<?php echo $usu["imagen"]?>" alt="">
                <div class="row">
                    <div class="col-6 container-button-post d-flex justify-content-start">
                        <?php echo form_open_multipart("meGustaUsu",array("id"=>"meGustaUsu","class"=>"meGustaUsu"))?>
                            <input type="hidden" name="id_usuariomg" id="id_usuariomg" value="<?php echo $this->session->userdata("id")?>">
                            <button type="submit" class="btn btn-secondary form-control">Me gusta</button>
                        <?php echo form_close();?> 
                        <button type="submit" class="btn btn-secondary form-control">No me gusta</button>
                        <button type="submit" class="btn btn-secondary form-control">Comentar</button>
                    </div>
                    <div class="col-6 d-flex justify-content-end align-items-center">
                        <a class="pr-2" href=""><i class="far fa-thumbs-up"></i></a>
                        <span><?php echo $usu["mgustas"]?></span>
                        <a class=" pr-2 pl-2" href=""><i class="far fa-thumbs-down"></i></a>
                        <span></span>
                    </div>
                </div>
                
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <!--<div class="container-post border-post">
        <img class="col img-post" src="<?php echo base_url();?>assest/imagenes/t1.jpg" alt="">
    </div>-->
</div>
