<script type="text/javascript">
$(function(){

    $(document).on('submit', '.editarPerfil', function(event){
            var url="<?php echo base_url()?>";
            var formdata2=$(this);
            var formElement = document.querySelector(".editarPerfil");
            var formData = new FormData(formElement);
                $.ajax({
                    url: $('.editarPerfil').attr('action')+"?"+$.now(), 
                    type: 'POST',
                    dataType: "json",
                    data: formData,
                    processData:false,
                    contentType : false,
                    success: function (data) {
                        if(data.res == 'ok'){
                            var fotogrande = $(formdata2);
                            var fotogrande2 = fotogrande.parent().parent().parent();
                            var fotogrande3 = fotogrande2.children().eq(0);
                            var fotogrande4 = fotogrande3.children().children().children().eq(2);
                            var fotogrande5 = fotogrande4.children().children().eq(4);
                            var fotogrande6 = fotogrande5.children().eq(0);
                            for(dato in data.datos){
                                var fotogrande7 = '<img class="perfil mr-2" src="<?php echo base_url()?>assest/imagenes/perfil/'+data.datos[dato].foto_perfil+'" alt="">';
                                            $(fotogrande6).html(fotogrande7);
                            }
                            console.log($(fotogrande6));
                        }
                        else
                        if(data.res == 'error'){
                            
                             
                        }
                        
                        
                    }
                        
                });
                return false; 
        });
    
});
</script>
<div class="col">
    <?php echo form_open_multipart("editarPerfil",array("id"=>"editarPerfil","class"=>"editarPerfil"))?>
        <input type="hidden" name="id_usuario" value="<?php echo $this->session->userdata("id");?>">
        <div class="form-group">
          <input type="text" name="nombre" id="nombre" autocomplete="off" placeholder="Ingrese su nombre" class="form-control form-control-sm input-indent">
        </div>
        <div class="form-group">
            <input type="text" name="apellidos" id="apellidos" autocomplete="off" placeholder="Ingrese apellidos" class="form-control form-control-sm input-indent">                 
        </div>
        <div class="form-group">
            <input type="file" role="button" name="imagenGrande" id="imagenGrande">                 
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>                 
        </div>
    <?php echo form_close();?>
</div>
