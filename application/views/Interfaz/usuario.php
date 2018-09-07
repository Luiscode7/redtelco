<script type="text/javascript">
$(function(){

    /* --- BLOQUEA EL USO DE SCRIPT DESDE CONSOLA --- */
    var _z = console;
    Object.defineProperty( window, "console", {
        get : function(){
            if( _z._commandLineAPI ){
            throw "Lo siento, no está permitido ejecutar scripts!";
                }
            return _z; 
        },
        set : function(val){
            _z = val;
        }
    });

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
                window.location="usuario";
                $('#postUsuario')[0].reset();
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
                           var firsthijo = secondhijo.children().eq(1).html(data.datos);
                           //var megusta = firsthijo.children().eq(1).html(data.datos);
                           console.log($(firsthijo));
                    }
                        
                });
                return false; 
        });

    /* -------- FUNCION PARA NO ME GUSTA ----------- */
    $(document).on('submit', '.NomeGustaUsu', function(event){
            var form2=$(this);
            var url="<?php echo base_url()?>";
                $.ajax({
                    url: $('.NomeGustaUsu').attr('action')+"?"+$.now(), 
                    type: 'POST',
                    dataType: "json",
                    data: form2.serialize(),
                    processData:false,
                    success: function (data) {
                        var padre = $(form2).parent().parent();
                        var secondhijo = padre.children().eq(1);
                        var twosecondthijo = secondhijo.children().eq(3).html(data.datos);
                    }
                });
                return false; 
        });

    /* -------- FUNCION PARA PUBLICAR COMENTARIOS ----------- */
    $(document).on('submit', '.ComentariosUsu', function(event){
            var url="<?php echo base_url()?>";
            var formdata=$(this);
                $.ajax({
                    url: $('.ComentariosUsu').attr('action')+"?"+$.now(), 
                    type: 'POST',
                    dataType: "json",
                    data: formdata.serialize(),
                    processData:false,
                    success: function (data) {
                        if(data.res == 'ok'){
                            var nomostrarmsj = formdata.parent();
                            var nomostrarmsj2 = nomostrarmsj.children().eq(1);
                            var nomostrarmsj3 = nomostrarmsj2.children().eq(2);
                            $(nomostrarmsj3).hide();
                            var pd = $(formdata);
            
                            for(dato in data.datos){
                                var coment = pd.append('<div id ="publicarusu" class="col p-0 pt-4 d-flex"><div><img class="perfil-comments mr-4" src="<?php echo base_url()?>assest/imagenes/login1.png" alt=""></div><div><p id="commentsusu" class="mb-0">'+data.datos[dato].comentario_usu+'</p></div></div>');
                            }
                            $(formdata)[0].reset();
                        }
                        else
                        if(data.res == 'error'){
                            var foco = formdata.children().eq(2);
                            $(foco).focus();
                        }      
                    }
                        
                });
                return false; 
        });


    /* -------- FUNCION PARA VER COMENTARIOS ----------- */
    $(document).on('submit', '.mostrarComPublicadosUsu', function(event){
            var url="<?php echo base_url()?>";
            var formdata2=$(this);
                $.ajax({
                    url: $('.mostrarComPublicadosUsu').attr('action')+"?"+$.now(), 
                    type: 'POST',
                    dataType: "json",
                    data: formdata2.serialize(),
                    processData:false,
                    success: function (data) {
                        if(data.res == 'ok'){
                            $("#publicarusu").empty();
                            var showmore = $(formdata2);
                            console.log($(showmore));
                            for(dato in data.datos){
                                var comentarios = data.datos[dato].comments;
                                var showmore2 = showmore.append('<div class="col p-0 pt-1 muestra2 d-flex"><div><img class="perfil-comments mr-4" src="<?php echo base_url()?>assest/imagenes/login1.png" alt=""></div><div><p id="commentusu">'+comentarios+'</p></div></div>');
                            }
                            $(".btn-showmoreusu").hide();
                        }
                        else
                        if(data.res == 'error'){
                            var ocultar = $(formdata2).children().eq(1);
                            var ocultar2 = ocultar.children();
                            var ocultarboton = ocultar2.hide();
                            var mostrarmsj = formdata2.addClass("row justify-content-center").append('<p>'+"no hay comentarios..."+'</p>');
                        }
                        
                    }
                        
                });
                return false; 
        });
    
        Comments2();


  /*--- FUNCION PARA UTILIZAR LINK COMO INPUT FILE ---*/
  $("#imagen").click(function(){
      $("#uploadimagen").trigger("click");
  });

});

function Comments2(){
    $(".btn-commentusu1").click(function(){
        var boton = $(this);
        var mostrarcom2 = boton.parent().parent();
        var mostrarcom3 = mostrarcom2.children().eq(2);
        if(mostrarcom3.hasClass("ocultarComment")){
            $(mostrarcom3).toggle(function(){
                $(mostrarcom3).addClass("mostrarComment");
            });
        }else if(mostrarcom3.hasClass("mostrarComment")){
            $(mostrarcom3).toggle(function(){
                $(mostrarcom3).addClass("ocultarComment");
            });
        }

        /* ELIMINA EL MENSAJE NO HAY COMENTARIO */
        var nocomment3 = mostrarcom3.children().eq(1);
        var nocomment4 = nocomment3.children().eq(2);
        $(nocomment4).remove();


        $("div").remove(".muestra2"); //elimina el div de mostrar comentarios
        $("div").remove("#publicarusu");//elimina el div de publicar comentarios
        $(".btn-showmoreusu").show();//muestra el boton ver comentarios, nuevamente

        
        /* DIRIGE EL SCROLL A LA CAJA DE COMENTARIOS */
        var buscar = $(mostrarcom3).offset().top;
        $("html").animate({scrollTop:buscar}, 500);
    });
}

</script>
<div class="container-central col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
    <?php echo form_open_multipart("postUsuario",array("id"=>"postUsuario","class"=>"postUsuario"))?>
    <input type="hidden" name="id_post_usuario" id="id_post_usuario">
    <?php $id_usuario=$this->session->userdata("id"); $clave = $this->encryption->encrypt($id_usuario);?>
    <input type="hidden" name="id_usuario" id="id_post_usuario" value="<?php echo $clave ?>">
    <div class="col container-public p-cero">
        <textarea name="contenido_usuario" id="contenido_usuario" class="textarea-post" placeholder="Escriba lo que desee..." cols="30" rows="10"></textarea>
        <button type="submit" name="Comentar" id="Comentar" class="btn btn-primary btn-post_u">Publicar</button>
        <input type="file" name="uploadimagen" id="uploadimagen" style="display:none">
        <a href="#"><i class="fas fa-smile ml-4 mr-4"></i></a>
        <a id="imagen" href="#"><i class="far fa-image mr-4"></i></a>
        <!--<a href="#"><i class="fas fa-video"></i></a>-->
        <hr>
    </div> 
    <?php echo form_close();?> 

    <div id="publicarusu"></div>

    <?php if(!empty($posteos_usu)): ?>
        <?php foreach($posteos_usu as $usu): ?>
            <div class="col container-post border-post">
                <div class="perfil-post">
                    <img class="perfil mr-2" src="<?php echo base_url()?>assest/imagenes/perfil/<?php echo $usu["foto"]?>" alt="">
                    <span><?php echo $usu["nombre"]?></span>
                </div>
                <p class="p-post"><?php echo $usu["contenido"]?></p>
                <img style="width:100%" src="<?php echo base_url();?>assest/imagenes/subidas/<?php echo $usu["imagen"]?>" alt="">
                <div class="row">
                    <div class="col-6 container-button-post d-flex justify-content-start">
                        <?php echo form_open_multipart("meGustaUsu",array("id"=>"meGustaUsu","class"=>"meGustaUsu"))?>
                            <?php $id_usuario=$usu["id"]; $clave = $this->encryption->encrypt($id_usuario);?>
                            <input type="hidden" name="id_usuariomg" id="id_usuariomg" value="<?php echo $clave?>">
                            <button type="submit" class="btn btn-secondary form-control">Me gusta</button>
                        <?php echo form_close();?>
                        <?php echo form_open_multipart("NomeGustaUsu",array("id"=>"NomeGustaUsu","class"=>"NomeGustaUsu"))?>
                            <?php $id_usuario=$usu["id"]; $clave = $this->encryption->encrypt($id_usuario);?>
                            <input type="hidden" name="id_usuarionomg" id="id_usuarionomg" value="<?php echo $clave?>"> 
                            <button type="submit" class="btn btn-secondary form-control">No me gusta</button>
                        <?php echo form_close();?>
                        <button type="submit" class="btn btn-secondary form-control btn-commentusu1">Comentar</button>
                    </div>
                    <div class="col-6 d-flex justify-content-end align-items-center">
                        <a class="pr-2" href=""><i class="far fa-thumbs-up"></i></a>
                        <span><?php echo $usu["mgustas"]?></span>
                        <a class=" pr-2 pl-2" href=""><i class="far fa-thumbs-down"></i></a>
                        <span><?php echo $usu["nmgustas"]?></span>
                    </div>
                    <div class="col pt-3 pb-1 ocultarComment">
                        <?php echo form_open_multipart("ComentariosUsu",array("id"=>"ComentariosUsu","class"=>"ComentariosUsu"))?>
                            <input type="hidden" name="id_commentusu" id="id_commentusu">
                            <?php $id_usuario=$usu["id"]; $clave = $this->encryption->encrypt($id_usuario);?>
                            <input type="hidden" name="id_publicacionusu" value="<?php echo $clave?>">
                            <textarea name="comentariousu" class="textarea-comment" placeholder="Comentario..." cols="30" rows="10"></textarea>
                            <button type="submit" class="btn btn-primary btn-comment2">Comentar</button>
                        <?php echo form_close();?>
                        <?php echo form_open_multipart("mostrarComPublicadosUsu",array("id"=>"mostrarComPublicadosUsu","class"=>"mostrarComPublicadosUsu"))?>
                            <?php $id_usuario=$usu["id"]; $clave = $this->encryption->encrypt($id_usuario);?>
                            <input type="hidden" name="id_publicacionshowusu" value="<?php echo $clave?>">
                            <div class="d-flex justify-content-center mb-3">
                                <button class="btn btn-primary btn-showmoreusu" type="submit" id="showmoreusu" name="showmoreusu">ver comentarios</button>
                            </div>
                        <?php echo form_close();?>
                    </div>
                </div>    
            </div>
        <?php endforeach; ?>
    <?php endif; ?>    
</div>

