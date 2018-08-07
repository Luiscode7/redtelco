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
                 $(".btn-post_u").attr("disabled", false);
                  $.notify(data.msg, {
                    className:'error',
                    globalPosition: 'top right',
                    autoHideDelay:5000
                  });
              }else if(data.res == "ok"){
                /*html += '<div class="col container-post border-post">'
                            + '<div class="perfil-post">'
                            + '<span id="nombreP">'<?php echo $anonimo?>'</span>'
                            + '</div>'
                            + '<p id="p-post" class="p-post">'<?php echo $contenido?>'</p>'
                            + '<img style="width:100%" src="<?php echo base_url();?>assest/imagenes/t5.jpg" alt="">'    
                            + '</div>';
                $(".container-principal").append(html);*/
                $(".btn-post_u").attr("disabled", false);
                $.notify(data.msg, {
                  className:'success',
                  globalPosition: 'top right',
                  autoHideDelay:5000
                });
                $('#postUsuario')[0].reset();
                $("#id_post_usuario").val("");
              }
            }
      });
      return false; 
  });

});
</script>
<div class="container-central col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
    <?php echo form_open_multipart("postUsuario",array("id"=>"postUsuario","class"=>"postUsuario"))?>
    <input type="hidden" name="id_post_usuario" id="id_post_usuario">
    <div class="col container-public p-cero">
        <textarea name="contenido_usuario" id="contenido_usuario" class="textarea-post" placeholder="Escriba lo que desee..." cols="30" rows="10"></textarea>
        <button type="submit" name="Comentar" id="Comentar" class="btn btn-primary btn-post_u">Publicar</button>
        <a href="#"><i class="fas fa-smile ml-4 mr-4"></i></a>
        <a id="imagen" href="#"><i class="far fa-image mr-4"></i></a>
        <a href="#"><i class="fas fa-video"></i></a>
        <hr>
    </div> 
    <?php echo form_close();?> 
    <div class="col container-post border-post">
        <p class="p-post">
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facere, fuga labore. 
        Dignissimos ipsam facilis veniam alias repudiandae recusandae enim, assumenda,
         dolor error praesentium esse quod, cum voluptatibus reprehenderit nobis dolorum.
        </p>
    </div>

    <div class="col container-post border-post">
        <div class="perfil-post">
            <img class="perfil mr-2" src="<?php echo base_url()?>assest/imagenes/user.png" alt="">
            <span>Nombre Usuario</span>
        </div>
        <p class="p-post">
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facere, fuga labore. 
        Dignissimos ipsam facilis veniam alias repudiandae recusandae enim, assumenda,
         dolor error praesentium esse quod, cum voluptatibus reprehenderit nobis dolorum.
        </p>
        <img style="width:100%" src="<?php echo base_url();?>assest/imagenes/t5.jpg" alt="">
        <div class="row">
            <div class="col-6 container-button-post d-flex justify-content-start">
                <button type="submit" class="btn btn-secondary form-control">Me gusta</button>
                <button type="submit" class="btn btn-secondary form-control">No me gusta</button>
                <button type="submit" class="btn btn-secondary form-control">Comentar</button>
            </div>
            <div class="col-6 d-flex justify-content-end align-items-center">
                <a class="pr-2" href=""><i class="far fa-thumbs-up"></i></a>
                <span>5</span>
                <a class=" pr-2 pl-2" href=""><i class="far fa-thumbs-down"></i></a>
                <span>10</span>
            </div>
        </div>
        
    </div>

    <div class="container-post border-post">
        <img class="col img-post" src="<?php echo base_url();?>assest/imagenes/t1.jpg" alt="">
    </div>
    <div class="container-post border-post">
        <img class="col img-post" src="<?php echo base_url();?>assest/imagenes/t2.jpg" alt="">
    </div>
    <div class="container-post border-post">
        <img class="col img-post" src="<?php echo base_url();?>assest/imagenes/t3.jpg" alt="">
    </div>
    <div class="container-post border-post">
        <img class="col img-post" src="<?php echo base_url();?>assest/imagenes/t4.jpg" alt="">
    </div>
</div>
