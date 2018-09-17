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
    
    $(".btn-perfil").click(function(){
        $(".upload").trigger("click");
    });

    $(".upload").change(function(){
        imagenPreview(this);
    });
    
});

function imagenPreview(input){
    if(input.files && input.files[0]){
        var reader = new FileReader();

        reader.onload = function(e){
            var imagen = '<img class="img-edit-perfil" src='+e.target.result+' />';
            $("#previewImagen").html(imagen);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
</script>
<div class="container-central col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
    <?php echo form_open_multipart("editarPerfil",array("id"=>"editarPerfil","class"=>"editarPerfil"))?>
        <input type="hidden" name="id_usuario" value="<?php echo $this->session->userdata("id");?>">
        <div class="form-group">
          <input type="text" name="nombre" id="nombre" autocomplete="off" class="form-control form-control-sm input-indent" value="<?php echo $this->session->userdata("nombre");?>">
        </div>
        <div class="form-group">
            <input type="text" name="apellidos" id="apellidos" autocomplete="off" class="form-control form-control-sm input-indent" value="<?php echo $this->session->userdata("apellidos");?>">                 
        </div>
        <div class="row">
            <div class="form-group upload-perfil col-5">
                <input type="file" role="button" class="upload" name="imagenGrande" id="imagenGrande" hidden="hidden"> 
                <input type="button" class="btn btn-perfil" value="Subir Imagen"/>                
            </div>
            <div id="previewImagen" class="mb-3 col-7"></div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>                 
        </div>
    <?php echo form_close();?>
</div>
