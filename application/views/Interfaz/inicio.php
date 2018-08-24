<script type="text/javascript">
$(function(){

    /* ---- FUNCION PUBLICACIONES ----*/
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
                for(datito in data.datos){
                            var html = '<div class="col container-post border-post">'
                                + '<div class="perfil-post">'
                                + '<img class="perfil mr-2" src="<?php echo base_url()?>assest/imagenes/login1.png" alt="">'
                                + '<span id="nombreP">'+data.datos[datito].nombre+'</span>'
                                + '</div>'
                                + '<p id="p-post" class="p-post">'+data.datos[datito].contenido+'</p>'    
                                + '<div class="row">'
                                + '<div class="col-6 container-button-post d-flex justify-content-start">'
                                + '<input type="hidden" name="id_publicacion" value="'+data.datos[datito].id+'">'
                                + '<button type="submit" class="btn btn-secondary form-control">Me gusta</button>'
                                + '<button type="submit" class="btn btn-secondary form-control">No me gusta</button>'
                                + '<button type="submit" class="btn btn-secondary form-control">Comentar</button>'
                                + '</div>'
                                + '<div class="col-6 d-flex justify-content-end align-items-center">'
                                + '<a class="pr-2" href=""><i class="far fa-thumbs-up"></i></a>'
                                + '<span></span>'
                                + '<a class=" pr-2 pl-2" href=""><i class="far fa-thumbs-down"></i></a>'
                                + '<span></span>'
                                + '</div>'
                                + '</div>';
                            $("#publicar").html(html);
                  }
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

  
        /* -------- FUNCION PARA ME GUSTA ----------- */
        $(document).off('submit', '.meGusta').on('submit', '.meGusta', function(event){
            var form=$(this);
            var url="<?php echo base_url()?>";
                $.ajax({
                    url: $('.meGusta').attr('action')+"?"+$.now(), 
                    type: 'POST',
                    dataType: "json",
                    data: form.serialize(),
                    processData:false,
                    success: function (data) {
                        /*var html = '<div>'
                            + '<a class="pr-2 icon1" href="#"><i class="far fa-thumbs-up"></i></a>'
                            + '<span>'+data.datos+'</span>'
                            + '</div>'
                            + '<div>'
                            + '<a class="pr-2 icon1" href="#"><i class="far fa-thumbs-up"></i></a>'
                            + '<span></span>'
                            + '</div>';
                            console.log($("#mg").html(html));*/
                        /*for(dato in data.datos){
                            var html = '<div>'
                            + '<a class="pr-2 icon1" href="#"><i class="far fa-thumbs-up"></i></a>'
                            + '<span>'+data.datos[dato].mg_fk+'</span>'
                            + '</div>'
                            + '<div>'
                            + '<a class="pr-2 icon1" href="#"><i class="far fa-thumbs-up"></i></a>'
                            + '<span></span>'
                            + '</div>';
                            console.log($("#mg").html(html));
                        }*/
                        $("span .mg").each(function(i,value){
                            console.log($(value).html(data.datos));

                        });
                        //console.log(data);
                        //console.log($(".mg").html(data.datos));
                    }
                        
                });
                return false; 
        });


        /*$(".btn-megusta").click(function(){
            console.log($("#id_publicacion").val());
        });*/

        /* -------- FUNCION PARA NO ME GUSTA ----------- */
        $(document).on('submit', '.nomeGusta', function(event){
            var form=$(this);
            var url="<?php echo base_url()?>";
                $.ajax({
                    url: $('.nomeGusta').attr('action')+"?"+$.now(), 
                    type: 'POST',
                    data: form.serialize(),
                    success: function (data) {
                        console.log($(".nmg").html(data));
                    }
                });
                return false; 
        });

        
        /* -------- FUNCION PARA COMENTARIOS ----------- */
        $(document).on('submit', '.Comentarios', function(event){
            var url="<?php echo base_url()?>";
            var formdata=$(this);
                $.ajax({
                    url: $('.Comentarios').attr('action')+"?"+$.now(), 
                    type: 'POST',
                    data: formdata.serialize(),
                    success: function (data) {
                        /*for(datito in data){
                            console.log($(".comments").html(data));
                        }*/
                        /*$.each(data, function(i,valor){
                            console.log($(".comments").html(valor));
                        });*/
                        console.log($("#comments").append(data));
                        //console.log(data);
                                                                                 
                    }
                        
                });
                return false; 
        });

        /*$(".btn-comment1").click(function(){
            if($(".btn-comment1").val()==$("#id_publicacion").val()){
                $('#collapseExample').collapse('show');
            }
        });*/
        
        
});
</script>

<!-- Muro -->
<div class="container-central col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
    <?php echo form_open_multipart("postAnonimo",array("id"=>"postAnonimo","class"=>"postAnonimo"))?>
    <input type="hidden" name="id_post" id="id_post">
    <div class="col container-public p-cero">
        <input type="text" class="form-control form-control-sm mb-3" style="text-indent:15px" autofocus placeholder="ingrese un nombre" name="nombre" id="nombre" autocomplete="off">
        <textarea name="contenido" id="contenido" class="textarea-post" placeholder="Escriba lo que desee..." cols="30" rows="10"></textarea>
        <button type="submit" name="Comentar" id="Comentar" class="btn btn-primary btn-post">Publicar</button>
        <hr>
    </div> 
    <?php echo form_close();?>
    
    <div id="publicar">
    </div>

    <?php if(!empty($posteo)): ?>
    <?php
    foreach($posteo as $post):
    ?>
    <div class="col container-post border-post">
        <div class="perfil-post" id="post-p">
            <img class="perfil mr-2" src="<?php echo base_url()?>assest/imagenes/login1.png" alt="">
            <span id="nombreP"><?php echo $post["nombre"]?></span>
        </div>
        <p id="p-post" class="p-post"><?php echo $post["contenido"]?></p>
        <div class="row">
                <div class="col-md-10 col-lg-6 block-comment container-button-post d-flex justify-content-start">
                    <?php echo form_open_multipart("meGusta",array("id"=>"meGusta","class"=>"meGusta"))?>
                        <input type="hidden" id="id_publicacion" name="id_publicacion" value="<?php echo $post["id_publi"]?>">
                        <button type="submit" name="publicacion" class="btn btn-secondary form-control btn-megusta" value="<?php echo $post["id_publi"]?>">Me gusta</button>
                    <?php echo form_close();?>
                    <?php echo form_open_multipart("nomeGusta",array("id"=>"nomeGusta","class"=>"nomeGusta"))?>
                        <input type="hidden" id="id_publicacion" name="id_publicacion" value="<?php echo $post["id_publi"]?>">
                        <button type="submit" name="no_me_gusta" class="btn btn-secondary form-control">No me gusta</button>
                    <?php echo form_close();?>
                    <button type="button" class="btn btn-secondary form-control btn-comment1" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Comentar</button>
                </div>
                <div class="block-likes col-md-2 col-lg-6 d-flex justify-content-end align-items-center">
                    <div>
                        <a class="pr-2 icon1" href="#"><i class="far fa-thumbs-up"></i></a>
                        <span class="mg"><?php echo $post["mgustas"]?></span>
                    </div>
                    <div>
                        <a class=" pr-2 pl-2" href="#"><i class="far fa-thumbs-down"></i></a>
                        <span><?php echo $post["nmgustas"]?></span>
                    </div>
                </div>
                <?php echo form_open_multipart("Comentarios",array("id"=>"Comentarios","class"=>"Comentarios"))?>
                    <div class="col pt-3 pb-1 collapse" id="collapseExample">
                        <input type="hidden" name="id_publicacionc" value="<?php echo $post["id_publi"]?>">
                        <textarea name="comentario" class="textarea-comment" placeholder="Comentario..." cols="30" rows="10"></textarea>
                        <button type="submit" class="btn btn-primary btn-comment2">Comentar</button>
                        <?php foreach($comentarios as $com): ?>
                            <div class="col p-0 pt-2">
                            <p id="comments"><?php echo $com["comentario"]?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php echo form_close();?>
        </div>
        
    </div>
    <?php
    endforeach;
    ?> 
    <?php endif; ?>
</div>
