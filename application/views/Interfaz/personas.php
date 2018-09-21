<script type="text/javascript">
/*$(function(){

    $(document).on('submit', '.agregarAmigo',function(event) {
      var url="<?php echo base_url()?>";
      formdata = $(this);
     /* var formElement = document.querySelector(".agregarAmigo");
      var formData = new FormData(formElement);*/
        /*$.ajax({
            url: $('.agregarAmigo').attr('action')+"?"+$.now(),  
            type: 'POST',
            data: formdata.serialize(),
            cache: false,
            processData: false,
            dataType: "json",
            success: function (data) {
              if(data.res == "error"){
                  /*$.notify(data.msg, {
                    className:'error',
                    globalPosition: 'top right',
                    autoHideDelay:5000
                  });
              }else if(data.res == "ok"){
               
              }
            }
      });
      return false; 
  });


});*/
</script>
<div class="container-central col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
    <div class="pl-0 mb-4">
        <h5>Usuarios de Redtelco</h5>
    </div>
    <?php if(!empty($usuarios)):?>
        <?php foreach($usuarios as $per):?>
                <div class="row container-mostrarper d-flex align-items-center">
                    <?php $id_usuario=$per["id"]; $clave = $this->encryption->encrypt($id_usuario);?>
                    <input type="hidden" name="id_seramigo" value="<?php echo $clave ?>">
                    <!--<input type="text" name="id_seramigo2" value="<?php echo $per["id"] ?>">-->
                    <div class="col-2" style="margin:10px 0 10px 0;">
                    <img class="img-mostrarper" src="<?php echo base_url()?>assets/imagenes/perfil/<?php echo $per["foto"];?>" alt="">
                    </div>
                    <div class="col-4">
                        <span><?php echo $per["nombre"];?></span>
                    </div>
                </div> 
        <?php endforeach; ?>
    <?php endif; ?>
</div>