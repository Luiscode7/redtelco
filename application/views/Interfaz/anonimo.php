<script type="text/javascript">
$(function(){
    $("#publicar").hide();
    var usuarioimagen = "<?php echo $this->session->userdata("procesoLogin")?>";
    if(usuarioimagen){
        $("#emojiusu").removeClass("ocultarImagenAn");
        $("#imagenan").removeClass("ocultarImagenAn");
    }
    $(".icon1").tooltip('disable');
    $(".icon2").tooltip('disable');

    /* ---- FUNCION PUBLICACIONES ----*/
    $(document).on('submit', '#postAnonimo',function(event) {
      var url="<?php echo base_url()?>";
      var post = $(this);
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
                 var focopubli = post.children().eq(1);
                 var focopubli2 = focopubli.children().eq(1);
                 $(focopubli2).focus();
              }else if(data.res == "ok"){
                  var puactual = post.parent();
                  var puactual2 = puactual.children().eq(1);
                  var puactual3 = puactual2.children().eq(0);
                  
                  /* ------------------------------------ */
                for(datito in data.datos){
                        /*var puactual4 = '<div class="perfil-post post1" id="post-p p2">'
                                    + '<img class="perfil mr-2 mg1" src="<?php echo base_url()?>assest/imagenes/login1.png" alt="">'
                                    + '<span id="nom1">'+data.datos[datito].nombre+'</span>'
                                    + '</div>';
                                $(puactual3).prepend(puactual4);
                               
                                var contenido = post.parent();
                                var contenido2 = contenido.children().eq(1);
                                var contenido3 = contenido2.children().eq(0);
                                var contenido4 = contenido3.children().eq(0);
                                var contenido5 = '<p id="p-post p2" class="p-post p2">'+data.datos[datito].contenido+'</p>';
                                $(contenido4).append(contenido5);
                               
                                var mgusta = post.parent();
                                var mgusta2 = mgusta.children().eq(1);
                                var mgusta3 = mgusta2.children().eq(0);
                                var mgusta4 = mgusta3.children().eq(1);
                                var mgusta5 = mgusta4.children();
                                var mgusta6 = mgusta5.children().eq(0);
                                var mgusta7 = '<input type="hidden" name="id_publicacionmg" value="'+data.datos[datito].id+'">'
                                            + '<button type="submit" class="btn btn-secondary form-control btn-megusta">Me gusta</button>';
                                $(mgusta6).append(mgusta7);
                                 
                                    var nmgusta = post.parent();
                                    var nmgusta2 = nmgusta.children().eq(1);
                                    var nmgusta3 = nmgusta2.children().eq(0);
                                    var nmgusta4 = nmgusta3.children().eq(1);
                                    var nmgusta5 = nmgusta4.children();
                                    var nmgusta6 = nmgusta5.children().eq(1);
                                    var nmgusta7 = '<input type="hidden" name="id_publicacionomg" value="'+data.datos[datito].id+'">'
                                                + '<button type="submit" class="btn btn-secondary form-control btn-nomegusta1">No me gusta</button>';
                                $(nmgusta6).append(nmgusta7);
                                 
                                    var likes = post.parent();
                                    var likes2 = likes.children().eq(1);
                                    var likes3 = likes2.children().eq(0);
                                    var likes4 = likes3.children().eq(1);
                                    var likes5 = likes4.children().eq(1); 
                                    var likes6 = '<div>'
                                                + '<a class="pr-2 icon1" href="#"><i class="far fa-thumbs-up"></i></a>'
                                                + '<span id="mg1"></span>'
                                                + '</div>';
                                $(likes5).append(likes6);
                                
                                    var dislikes = post.parent();
                                    var dislikes2 = dislikes.children().eq(1);
                                    var dislikes3 = dislikes2.children().eq(0);
                                    var dislikes4 = dislikes3.children().eq(1);
                                    var dislikes5 = dislikes4.children().eq(1);
                                    var dislikes6 = '<div>'
                                                + '<a class=" pr-2 pl-2" href="#"><i class="far fa-thumbs-down"></i></a>'
                                                + '<span id="nmg1"></span>'
                                                + '</div>'; 
                                $(dislikes5).append(dislikes6);             
                                console.log($(dislikes5));*/
                            
                            var html = '<div class="col container-post border-post">'
                                + '<div class="perfil-post">'
                                + '<img class="perfil mr-2" src="<?php echo base_url()?>assest/imagenes/login1.png" alt="">'
                                + '<span id="nombreP">'+data.datos[datito].nombre+'</span>'
                                + '</div>'
                                + '<p id="p-post" class="p-post">'+data.datos[datito].contenido+'</p>'    
                                + '<div class="row">'
                                + '<div class="col-6 container-button-post d-flex justify-content-start">'
                                + '<input type="hidden" name="id_publicacionmg" value="'+data.datos[datito].id+'">'
                                + '<input type="hidden" name="id_publicacionomg" value="'+data.datos[datito].id+'">'
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
                            $("#publicar").append(html);

                  }
                $("#publicar").show();
                $(".btn-post").attr("disabled", false);
                var usuario = "<?php echo $this->session->userdata("procesoLogin")?>";
                if(usuario){
                    window.location="MuroAnonimo";
                }else{
                    window.location="anonimo";
                }
                
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
                        if(data.res == "ok"){
                            var padre = $(form).parent().parent();
                           var secondhijo = padre.children().eq(1);
                           var firsthijo = secondhijo.children().eq(0);
                           var megusta = firsthijo.children().eq(1).html(data.datos); 
                        }else
                        if(data.res2 == "error"){
                            var padre = $(form).parent().parent();
                           var secondhijo = padre.children().eq(1);
                           var firsthijo = secondhijo.children().eq(0);
                           var icono = firsthijo.children().eq(0); 
                           $(icono).css("color", "#FE2E64");
                           $(icono).tooltip('enable');
                            setTimeout(function(){
                                $(icono).css("color", "#0174DF");
                            },2000);
                        }    
                           
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
                        if(data.res == "ok"){
                            var padre = $(form2).parent().parent();
                            var secondhijo = padre.children().eq(1);
                            var twosecondthijo = secondhijo.children().eq(1);
                            var nomegusta = twosecondthijo.children().eq(1).html(data.datos);
                        }else
                        if(data.res2 == "error"){
                            var padre = $(form2).parent().parent();
                           var secondhijo = padre.children().eq(1);
                           var firsthijo = secondhijo.children().eq(1);
                           var icono = firsthijo.children().eq(0); 
                           $(icono).css("color", "#FE2E64");
                           $(icono).tooltip('enable');
                            setTimeout(function(){
                                $(icono).css("color", "#0174DF");
                            },2000);
                        }    
                        
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
                        if(data.res == 'ok'){
                            var nomostrarmsj = formdata.parent();
                            var nomostrarmsj2 = nomostrarmsj.children().eq(1);
                            var nomostrarmsj3 = nomostrarmsj2.children().eq(2);
                            $(nomostrarmsj3).hide();
                            var pd = $(formdata);
            
                            for(dato in data.datos){
                                var coment = pd.append('<div id ="publicar" class="col p-0 pt-4 d-flex"><div><img class="perfil-comments mr-4" src="<?php echo base_url()?>assest/imagenes/login1.png" alt=""></div><div><p id="comments" class="mb-0">'+data.datos[dato].comentario+'</p></div></div>');
                            }
                            $(formdata)[0].reset();
                            console.log(nomostrarmsj3);
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
        $(document).on('submit', '.mostrarComPublicados', function(event){
            var url="<?php echo base_url()?>";
            var formdata2=$(this);
                $.ajax({
                    url: $('.mostrarComPublicados').attr('action')+"?"+$.now(), 
                    type: 'POST',
                    dataType: "json",
                    data: formdata2.serialize(),
                    processData:false,
                    success: function (data) {
                        if(data.res == 'ok'){
                            $("#publicar").empty();
                            var showmore = $(formdata2);
                            
                            for(dato in data.datos){
                                var comentarios = data.datos[dato].comments;
                                var showmore2 = showmore.append('<div class="col p-0 pt-1 muestra d-flex"><div><img class="perfil-comments mr-4" src="<?php echo base_url()?>assest/imagenes/login1.png" alt=""></div><div><p id="comment">'+comentarios+'</p></div></div>');
                            }
                            $(".btn-showmore").hide();
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


        /*--- FUNCION PARA UTILIZAR LINK COMO INPUT FILE ---*/
        $("#imagenan").click(function(){
            $("#uploadimagenan").trigger("click");
        });

        Comments();
        
});

/*---- OCULTA LOS COMENTARIOS ----*/
function Comments(){
    $(".btn-comment1").click(function(){
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

        $("div").remove(".muestra"); //elimina el div de mostrar comentarios
        $("div").remove("#publicar");//elimina el div de publicar comentarios
        $(".btn-showmore").show();//muestra el boton ver comentarios, nuevamente

        /* DIRIGE EL SCROLL A LA CAJA DE COMENTARIOS */
        var buscar = $(mostrarcom3).offset().top;
        $("html").animate({scrollTop:buscar}, 500);
    });
}

</script>

<!-- Muro -->
<div class="container-central col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
    <?php echo form_open_multipart("postAnonimo",array("id"=>"postAnonimo","class"=>"postAnonimo"))?>
    <input type="hidden" name="id_post" id="id_post">
    <div class="col container-public p-cero">
        <input type="text" class="form-control form-control-sm mb-3" style="text-indent:15px" autofocus placeholder="Ingrese un nombre si lo desea | es opcional" name="nombre" id="nombre" autocomplete="off">
        <textarea name="contenido" id="contenido" class="textarea-post" placeholder="Escriba lo que desee..." cols="30" rows="10"></textarea>
        <button type="submit" name="Comentar" id="Comentar" class="btn btn-primary btn-post">Publicar</button>
        <input type="file" name="uploadimagenan" id="uploadimagenan" style="display:none">
        <a href="#" id="emojiusu" class="ocultarImagenAn"><i class="fas fa-smile ml-4 mr-4"></i></a>
        <a id="imagenan" href="#" class="ocultarImagenAn"><i class="far fa-image mr-4"></i></a>
        <hr>
    </div> 
    <?php echo form_close();?>
    

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
        <img style="width:100%" src="<?php echo base_url();?>assest/imagenes/subidas/<?php echo $post["imagen"]?>" alt="">
        <div class="row">
                <div class="padre col-md-10 col-lg-6 block-comment container-button-post d-flex justify-content-start">
                    <?php echo form_open_multipart("meGusta",array("id"=>"meGusta","class"=>"meGusta"))?>
                        <?php $id_publi=$post["id_publi"]; $clave = $this->encryption->encrypt($id_publi);?>
                        <input type="hidden" id="id_publicacionmg" name="id_publicacionmg" value="<?php echo $clave?>">
                        <button type="submit" name="publicacion" id="publicacion" class="btn btn-secondary form-control btn-megusta" value="<?php echo $post["id_publi"]?>">Me gusta</button>
                    <?php echo form_close();?>
                    <?php echo form_open_multipart("nomeGusta",array("id"=>"nomeGusta","class"=>"nomeGusta"))?>
                        <?php $id_publi=$post["id_publi"]; $clave = $this->encryption->encrypt($id_publi);?>
                        <input type="hidden" id="id_publicacionomg" name="id_publicacionomg" value="<?php echo $clave?>">
                        <button type="submit" name="no_me_gusta" class="btn btn-secondary form-control">No me gusta</button>
                    <?php echo form_close();?>
                    <?php $id_publi=$post["id_publi"]; $clave = $this->encryption->encrypt($id_publi);?>
                    <button type="button" id="btn-comment1" class="btn btn-secondary form-control btn-comment1" value="<?php echo $clave?>">Comentar</button>
                </div>
                <div class="block-likes col-md-2 col-lg-6 d-flex justify-content-end align-items-center">
                    <div>
                        <a class="pr-2 icon1" href="#" data-toggle="tooltip" data-placement="bottom" title="ya ha marcado una opcion"><i class="far fa-thumbs-up"></i></a>
                        <span id="mg"><?php echo $post["mgustas"]?></span>
                    </div>
                    <div>
                        <a class="pr-2 pl-2 icon2" href="#" data-toggle="tooltip" data-placement="bottom" title="ya ha marcado una opcion"><i class="far fa-thumbs-down"></i></a>
                        <span id="nmg"><?php echo $post["nmgustas"]?></span>
                    </div>
                </div>
    
                <div class="col pt-3 pb-1 ocultarComment" id="blockcomments">
                    <?php echo form_open_multipart("Comentarios",array("id"=>"Comentarios","class"=>"Comentarios"))?>
                        <?php $id_publi=$post["id_publi"]; $clave = $this->encryption->encrypt($id_publi);?>
                        <input type="hidden" name="id_comment" id="id_comment">
                        <input type="hidden" name="id_publicacionc" value="<?php echo $clave?>">
                        <textarea name="comentario" class="textarea-comment" placeholder="Comentario..." cols="30" rows="10"></textarea>
                        <button type="submit" class="btn btn-primary btn-comment2">Comentar</button>
                    <?php echo form_close();?>
                    <?php echo form_open_multipart("mostrarComPublicados",array("id"=>"mostrarComPublicados","class"=>"mostrarComPublicados"))?>
                        <?php $id_publi=$post["id_publi"]; $clave = $this->encryption->encrypt($id_publi);?>
                        <input type="hidden" name="id_publicacionshow" value="<?php echo $clave?>">
                        <div class="d-flex justify-content-center mb-3">
                            <button class="btn btn-primary btn-showmore" type="submit" id="showmore" name="showmore">ver comentarios</button>
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
