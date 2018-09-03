<script type="text/javascript">
$(function(){
    $("#publicar").hide();

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
                $.notify(data.msg, {
                  className:'success',
                  globalPosition: 'top right',
                  autoHideDelay:5000
                });
                window.location="anonimo";
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
                        if(data.res == 'ok'){
                            var nomostrarmsj = formdata.parent();
                            var nomostrarmsj2 = nomostrarmsj.children().eq(1);
                            var nomostrarmsj3 = nomostrarmsj2.children().eq(2);
                            $(nomostrarmsj3).hide();
                            var pd = $(formdata);
            
                            for(dato in data.datos){
                                var coment = pd.append('<div id ="publicar" class="col p-0 pt-4"><p id="comments" class="mb-0"><img class="perfil-comments mr-4" src="<?php echo base_url()?>assest/imagenes/login1.png" alt="">'+data.datos[dato].comentario+'</p></div>');
                            }
                            $('.Comentarios')[0].reset();
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
                                var showmore2 = showmore.append('<div class="col p-0 pt-1 muestra"><p id="comment"><img class="perfil-comments mr-4" src="<?php echo base_url()?>assest/imagenes/login1.png" alt="">'+comentarios+'</p></div>');
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

        //mostrarComment();
        ocultarVerMasComments();
         //limpiarCampo();
        
});

/*---- OCULTA LOS COMENTARIOS ----*/
function ocultarVerMasComments(){
    $(".btn-comment1").click(function(){
        $("div").remove(".muestra"); //elimina el div de mostrar comentarios
        $("div").remove("#publicar");//elimina el div de publicar comentarios
        $(".btn-showmore").show();//muestra el boton ver comentarios, nuevamente
    });
}

function mostrarComment(){
    $(".btn-comment1").click(function(){
        var mostrarcom = $(this);
        var mostrarcom2 = mostrarcom.parent().parent();
        var mostrarcom3 = mostrarcom2.children().eq(2);
        $(mostrarcom3);
    });
}

function limpiarCampo(){
    $(".textarea-comment").blur(function(){
        $(this).val("").delay(2000);
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
        <hr>
    </div> 
    <?php echo form_close();?>
    
    <div id="publicar">
        <!--<div class="col container-post border-post">
            <div class="row">
                <div class="padre col-md-10 col-lg-6 block-comment container-button-post d-flex justify-content-start">
                    <?php echo form_open_multipart("meGusta",array("id"=>"meGusta2","class"=>"meGusta"))?>
                    <?php echo form_close();?>
                    <?php echo form_open_multipart("nomeGusta",array("id"=>"nomeGusta1","class"=>"nomeGusta"))?>
                    <?php echo form_close();?>
                </div>
                <div class="block-likes col-md-2 col-lg-6 d-flex justify-content-end align-items-center">
                </div>
                <div class="col pt-3 pb-1 collapse" id="collapseExample">
                    <?php echo form_open_multipart("Comentarios",array("id"=>"Comentarios","class"=>"Comentarios"))?>
                    <?php echo form_close();?>
                </div>
             </div>
        </div>-->
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
                        <input type="hidden" name="id_publicacionc" value="<?php echo $post["id_publi"]?>">
                        <textarea name="comentario" class="textarea-comment" placeholder="Comentario..." cols="30" rows="10"></textarea>
                        <button type="submit" class="btn btn-primary btn-comment2">Comentar</button>
                    <?php echo form_close();?>
                    <?php echo form_open_multipart("mostrarComPublicados",array("id"=>"mostrarComPublicados","class"=>"mostrarComPublicados"))?>
                        <input type="hidden" name="id_publicacionshow" value="<?php echo $post["id_publi"]?>">
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
