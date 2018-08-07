<script type="text/javascript">
$(function(){

    /* ---- Creacion de publicacion con AJAX ----*/
    $(document).on('submit', '#postAnonimo',function(event) {
      var url="<?php echo base_url()?>";
      var formElement = document.querySelector("#postAnonimo");
      var formData = new FormData(formElement);
        $.ajax({
            url: $('#postAnonimo').attr('action')+"?"+$.now(),  
            type: 'POST',
            data: formData,
            cache: false,
            processData: false,
            dataType: "json",
            contentType : false,
            success: function (data) {
              if(data.res == "error"){
                 $(".btn-post").attr("disabled", false);
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
                $(".btn-post").attr("disabled", false);
                $.notify(data.msg, {
                  className:'success',
                  globalPosition: 'top right',
                  autoHideDelay:5000
                });
                $('#postAnonimo')[0].reset();
                $("#id_post").val("");
              }
            }
      });
      return false; 
  });

        /* ------ Mostrar datos ------ */
        /*function publicarPost(){
            success : function(data){
                var json = JSON.parse(data);
                if(json.res == "success"){              

                    for(datos in json.posteos) {

                        html += '<div class="col container-post border-post">'
                            + '<div class="perfil-post">'
                            + '<span id="nombreP">'+json.'</span>'
                            + '</div>'
                            + '<p id="p-post" class="p-post"></p>'
                            + '<img style="width:100%" src="<?php echo base_url();?>assest/imagenes/t5.jpg" alt="">'    
                            + '</div>';


                    }  
                }    
                $(".content").append(html);
        
            },
        }*/
        
        /*function mostrarMuro(){
            for($posteo in $post){
                html += '<div class="col container-post border-post">'
                            + '<div class="perfil-post">'
                            + '<span id="nombreP">'<?php echo $post["anonimo"]?>'</span>'
                            + '</div>'
                            + '<p id="p-post" class="p-post">'<?php echo $post["contenido"]?>'</p>'
                            + '<img style="width:100%" src="<?php echo base_url();?>assest/imagenes/t5.jpg" alt="">'    
                            + '</div>';
            } 
            $(".container-principal").append(html);      
        }*/
});

</script>

<!-- Muro -->
<div class="container-central col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
    <?php echo form_open_multipart("postAnonimo",array("id"=>"postAnonimo","class"=>"postAnonimo"))?>
    <input type="hidden" name="id_post" id="id_post">
    <div class="col container-public p-cero">
        <input type="text" class="form-control form-control-sm mb-3" style="text-indent:15px" autofocus placeholder="ingrese un nombre" name="nombre" id="nombre">
        <textarea name="contenido" id="contenido" class="textarea-post" placeholder="Escriba lo que desee..." cols="30" rows="10"></textarea>
        <button type="submit" name="Comentar" id="Comentar" class="btn btn-primary btn-post">Publicar</button>
        <hr>
    </div> 
    <?php echo form_close();?>

    <?php
    foreach($posteo as $post){
    ?>
    <div class="col container-post border-post">
        <div class="perfil-post" id="post-p">
            <img class="perfil mr-2" src="<?php echo base_url()?>assest/imagenes/user.png" alt="">
            <span id="nombreP"><?php echo $post["nombre"]?></span>
        </div>
        <p id="p-post" class="p-post"><?php echo $post["contenido"]?></p>
    </div>
    <?php
    }
    ?>

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
        
    <!--<div class="col container-post border-post">
        <div class="perfil-post">
            <img class="perfil mr-2" src="<?php echo base_url()?>assest/imagenes/user.png" alt="">
            <span id="nombreP"></span>
        </div>
        <p id="p-post" class="p-post"></p>
        <img style="width:100%" src="<?php echo base_url();?>assest/imagenes/t5.jpg" alt="">
    </div>-->
</div>
