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
                            window.location="usuario";
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
<div class="container-central col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
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
