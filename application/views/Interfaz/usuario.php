<script type="text/javascript">
$(function(){
    $(".iconomg").tooltip('disable');

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

                           var icono = secondhijo.children().eq(0);
                           //var megusta = firsthijo.children().eq(1).html(data.datos);
                           console.log($(firsthijo));
                    }
                        
                })
                .fail(function(){
                    var padre = $(form).parent().parent();
                    var secondhijo = padre.children().eq(1);
                    var icono = secondhijo.children().eq(0);
                    $(icono).css("color", "red");
                    $(icono).mouseover(function(){
                        $(this).tooltip('enable');
                    });
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
                        var padre2 = $(form2).parent().parent();
                        var secondhijo2 = padre2.children().eq(1);
                        var twosecondthijo = secondhijo2.children().eq(3).html(data.datos);
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

        $(document).on('submit', '.encuesta', function(event){
            var url="<?php echo base_url()?>";
            var formdata2=$(this);
                $.ajax({
                    url: $('.encuesta').attr('action')+"?"+$.now(), 
                    type: 'POST',
                    dataType: "json",
                    data: formdata2.serialize(),
                    processData:false,
                    success: function (data) {
                        if(data.res == 'ok'){
                        $("#exampleModalCenter").modal("toggle");
                        //var encu = $("#publicarusu").children();
                         /*for(dato in data.datose){
                            var html = '<p class="mb-2">'+data.datose[dato].opciones+'</p>';
                            $(encu).append(html);
                         }*/
                         
                        }
                        else
                        if(data.res == 'error'){
                            
                        }
                        
                    }
                        
                });
                return false; 
        });

        $(".nuevoitem").click(function(){
            var data =$(this);
            var item = data.parent().parent().children().eq(0);
            var nuevo = '<div class="row justify-content-end mb-1">'
                    + '<input type="text" class="form-control form-control-sm texto1 col-11" name="texto1[]">'
                    + '</div>';
            $(item).append(nuevo);
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
        <!--<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Encuesta
        </button>-->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Encuesta</button>
        <input type="file" name="uploadimagen" id="uploadimagen" style="display:none">
        <a href="#"><i class="fas fa-smile ml-4 mr-4"></i></a>
        <a id="imagen" href="#"><i class="far fa-image mr-4"></i></a>
        <hr>
    </div> 
    <?php echo form_close();?> 

    
    <div id="publicausu">
    <?php foreach($encuesta as $en): ?>
        <div class="col container-post border-post">
            <!--<div class="perfil-post">
                <img class="perfil mr-2" src="<?php echo base_url()?>assest/imagenes/perfil/<?php echo $en["foto"]?>" alt="">
                <span><?php echo $en["nombre"]?></span>
            </div>-->
            <p class="p-post"><?php echo $en["titulo"]?></p>
            <p class="mb-3"><?php echo $en["opciones"]?></p>  
        </div>
    <?php endforeach; ?>
    </div>
   
    

    <?php if(!empty($posteos_usu)): ?>
        <?php foreach($posteos_usu as $usu): ?>
            <div class="col container-post border-post">
                <div class="perfil-post">
                <?php if(empty($usu["foto"])):?>
                    <img class="perfil mr-2" src="<?php echo base_url()?>assest/imagenes/user.png" alt="">
                <?php else: ?>
                    <img class="perfil mr-2" src="<?php echo base_url()?>assest/imagenes/perfil/<?php echo $usu["foto"]?>" alt="">
                <?php endif ?>
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
                        <a class="pr-2 iconomg" href="" data-toggle="tooltip" data-placement="bottom" title="ya ha dado me gusta"><i class="far fa-thumbs-up"></i></a>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Encuesta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open_multipart("encuesta",array("id"=>"encuesta","class"=>"encuesta"))?>
                    <div class="modal-body">
                        <?php $id_usuario=$this->session->userdata("id"); $clave = $this->encryption->encrypt($id_usuario);?>
                        <input type="hidden" name="id_usuencuesta" value="<?php echo $clave;?>">
                        <div>
                            <textarea class="textarea-encuesta" name="titulo" id="titulo" cols="30" rows="10"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-6">
                            </div>
                            <div class="col-6 d-flex justify-content-end">
                                <a class="nuevoitem" href="#">agregar item</a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary btn-encuesta">Publicar</button>
                    </div>
                <?php echo form_close();?>
            </div>
        </div>
    </div> 
</div>

