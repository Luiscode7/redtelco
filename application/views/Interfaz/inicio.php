<script type="text/javascript">
$(function(){

    /* ---- Creacion de publicacion con AJAX ----*/
    $(document).on('submit', '#postCualquiera',function(event) {
        event.preventDefault();
      var url="<?php echo base_url()?>";
      var formElement = document.querySelector("#postCualquiera");
      var formData = new FormData(formElement);
        $.ajax({
            url: $('#postCualquiera').attr('action')+"?"+$.now(),  
            type: 'POST',
            data: formData,
            cache: false,
            processData: false,
            dataType: "json",
            contentType : false,
            success: function (data) {
              if(data.res == "error"){
                 $(".btn-post").attr("disabled", false);
                  $("#postCualquiera input,#postCualquiera button,#postCualquiera").prop("disabled", false);
                  $.notify(data.msg, {
                    className:'error',
                    globalPosition: 'top right',
                    autoHideDelay:5000
                  });
              }else if(data.res == "ok"){
                $(".btn-post").attr("disabled", false);
                $("#postCualquiera input,#postCualquiera button,#postCualquiera").prop("disabled", false);
                $.notify(data.msg, {
                  className:'success',
                  globalPosition: 'top right',
                  autoHideDelay:5000
                });
                $('#postCualquiera')[0].reset();
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
        
});

</script>

<!-- Muro -->
<div class="container-central col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
    <?php echo form_open_multipart("postCualquiera",array("id"=>"postCualquiera","class"=>"postCualquiera"))?>
    <input type="hidden" name="id_post" id="id_post">
    <div class="col container-public p-cero">
        <input type="text" class="form-control form-control-sm mb-3" style="text-indent:15px" autofocus placeholder="ingrese un nombre" name="anonimo" id="anonimo">
        <textarea name="contenido" id="contenido" class="textarea-post" placeholder="Escriba lo que desee..." cols="30" rows="10"></textarea>
        <button type="submit" name="Comentar" id="Comentar" class="btn btn-primary btn-post">Publicar</button>
        <hr>
    </div> 
    <?php echo form_close();?>

    <div class="col container-post border-post">
        <div class="perfil-post">
            <img class="perfil mr-2" src="<?php echo base_url()?>assest/imagenes/user.png" alt="">
            <span id="nombreP"></span>
        </div>
        <p id="p-post" class="p-post"></p>
        <img style="width:100%" src="<?php echo base_url();?>assest/imagenes/t5.jpg" alt="">
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
