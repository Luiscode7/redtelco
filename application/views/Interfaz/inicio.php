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
                window.location="inicio";
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
                           var padre = $(form).parent().parent();
                           var secondhijo = padre.children().eq(1);
                           var firsthijo = secondhijo.children().eq(0);
                           var megusta = firsthijo.children().eq(1).html(data.datos);
                    }
                        
                });
                return false; 
        });


        /* -------- FUNCION PARA NO ME GUSTA ----------- */
        $(document).on('submit', '.nomeGusta', function(event){
            var form2=$(this);
            var url="<?php echo base_url()?>";
                $.ajax({
                    url: $('.nomeGusta').attr('action')+"?"+$.now(), 
                    type: 'POST',
                    dataType: "json",
                    data: form2.serialize(),
                    processData:false,
                    success: function (data) {
                        var padre = $(form2).parent().parent();
                        var secondhijo = padre.children().eq(1);
                        var twosecondthijo = secondhijo.children().eq(1);
                        var nomegusta = twosecondthijo.children().eq(1).html(data.datos);
                    }
                });
                return false; 
        });

        
        /* -------- FUNCION PARA PUBLICAR COMENTARIOS ----------- */
        $(document).on('submit', '.Comentarios', function(event){
            var url="<?php echo base_url()?>";
            var formdata=$(this);
                $.ajax({
                    url: $('.Comentarios').attr('action')+"?"+$.now(), 
                    type: 'POST',
                    dataType: "json",
                    data: formdata.serialize(),
                    processData:false,
                    success: function (data) {
                        var pd = $(formdata).children().eq(4);
                        for(dato in data.datos){ 
                            var coment = pd.children().html(data.datos[dato].comentario);
                            //var comentario = pd.children();
                            console.log(coment);
                            //console.log(data.datos[dato].contenido);
                        }
                    $('.Comentarios')[0].reset();
                    $("#id_comment").val("");
                    }
                        
                });
                return false; 
        });

        /* -------- FUNCION PARA VER COMENTARIOS ----------- */
        $(document).on('click', '.btn-showmore', function(event){
            var url="<?php echo base_url()?>";
            var formdata2=$(this);
                $.ajax({
                    url: "mostrarComPublicados"+"?"+$.now(), 
                    type: 'POST',
                    dataType: "json",
                    data: formdata2,
                    processData:false,
                    success: function (data) {
                        /*var showmore = $(formdata2).parent().parent();
                        var showmore2 = showmore.children().eq(4);
                        var showmore3 = showmore2.children();*/
                            //var comentario = pd.children();
                            console.log(data);
                            //console.log(data.datos[dato].contenido);
                    }
                        
                });
                return false; 
        });

        /*$(document).off('click', '.btn-comment1').on('click', '.btn-comment1', function(){
            if($(this).val()==$("#id_publicacionmg").val()){
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
                <div class="padre col-md-10 col-lg-6 block-comment container-button-post d-flex justify-content-start">
                    <?php echo form_open_multipart("meGusta",array("id"=>"meGusta","class"=>"meGusta"))?>
                        <input type="hidden" id="id_publicacionmg" name="id_publicacionmg" value="<?php echo $post["id_publi"]?>">
                        <button type="submit" name="publicacion" id="publicacion" class="btn btn-secondary form-control btn-megusta" value="<?php echo $post["id_publi"]?>">Me gusta</button>
                    <?php echo form_close();?>
                    <?php echo form_open_multipart("nomeGusta",array("id"=>"nomeGusta","class"=>"nomeGusta"))?>
                        <input type="hidden" id="id_publicacionomg" name="id_publicacionomg" value="<?php echo $post["id_publi"]?>">
                        <button type="submit" name="no_me_gusta" class="btn btn-secondary form-control">No me gusta</button>
                    <?php echo form_close();?>
                    <button type="button" class="btn btn-secondary form-control btn-comment1" value="<?php echo $post["id_publi"]?>" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Comentar</button>
                </div>
                <div class="block-likes col-md-2 col-lg-6 d-flex justify-content-end align-items-center">
                    <div>
                        <a class="pr-2 icon1" href="#"><i class="far fa-thumbs-up"></i></a>
                        <span id="mg"><?php echo $post["mgustas"]?></span>
                    </div>
                    <div>
                        <a class=" pr-2 pl-2" href="#"><i class="far fa-thumbs-down"></i></a>
                        <span id="nmg"><?php echo $post["nmgustas"]?></span>
                    </div>
                </div>
    
                <div class="col pt-3 pb-1 collapse" id="collapseExample">
                    <?php echo form_open_multipart("Comentarios",array("id"=>"Comentarios","class"=>"Comentarios"))?>
                        <input type="hidden" name="id_comment" id="id_comment">
                        <input type="hidden" name="id_publicacionc" value="<?php echo $post["id_publi"]?>" data-id="<?php echo $post["id_publi"]?>">
                        <textarea name="comentario" class="textarea-comment" placeholder="Comentario..." cols="30" rows="10"></textarea>
                        <button type="submit" class="btn btn-primary btn-comment2">Comentar</button>
                        <div class="col p-0 pt-2">
                            <p id="comment"></p>
                        </div>
                        <div class="d-flex justify-content-center mb-3">
                            <button class="btn btn-primary btn-showmore" type="button" id="showmore" name="showmore">ver comentarios</button>
                        </div>
                    <?php echo form_close();?>
                </div>
        </div>
        
    </div>
    <?php
    endforeach;
    ?> 
    <?php endif; ?>
</div>
