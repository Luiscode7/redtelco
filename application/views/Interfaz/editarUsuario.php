<script type="text/javascript">
$(function(){

    $(document).on('submit', '.editarPerfil', function(event){
            $(".btn-editarp").html('<i class="fas fa-spinner fa-lg fa-spin"></i>');
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
        $("#previewImagen").css("display", "block");
        $(".cancelarpreview").css("display", "inline");
        imagenPreview(this);
    });

     $(".cancelarpreview").click(function(){
        $(".upload").val("");
        $("#previewImagen").css("display", "none");
        $(".cancelarpreview").css("display", "none");
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
            <div class="form-group col-5 mb-3">
                <input type="file" role="button" class="upload" name="imagenGrande" id="imagenGrande" hidden="hidden"> 
                <input type="button" class="btn btn-perfil" value="Subir Imagen"/>                
            </div>
            <div class="col">
                <div id="previewImagen" class="col-7 mb-2" style="display:none"></div>
                <span class="cancelarpreview" role="button" style="display:none;margin-left:15px;"><i class="fas fa-trash mr-2"></i>cancelar</span>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-editarp btn-sinshadow">Guardar Cambios</button>                 
        </div>
    <?php echo form_close();?>
</div>
