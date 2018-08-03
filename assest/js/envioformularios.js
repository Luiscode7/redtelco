/* ---- Creacion de usuario con AJAX ---- */
$(document).off('submit', '#registro').on('submit', '#registro',function(event) {
    var url="<?php echo base_url()?>";
    var formElement = document.querySelector("#registro");
    var formData = new FormData(formElement);
      $.ajax({
          url: $('#registro').attr('action')+"?"+$.now(),  
          type: 'POST',
          data: formData,
          cache: false,
          processData: false,
          dataType: "json",
          contentType : false,
          beforeSend:function(){
            $("#btn_registrar").attr("disabled", true);
            $("#registro input,#registro button,#registro").prop("disabled", true);
          },
          success: function (data) {
            if(data.res == "error"){
               $("#btn_registrar").attr("disabled", false);
                $.notify(data.msg, {
                  className:'error',
                  globalPosition: 'top right',
                  autoHideDelay:5000,
                });
                $("#registro input,#registro button,#registro").prop("disabled", false);
            }else if(data.res == "ok"){
              $("#btn_registrar").attr("disabled", false);
              $("#registro input,#registro button,#registro").prop("disabled", false);
              $.notify(data.msg, {
                className:'success',
                globalPosition: 'top right',
                autoHideDelay:5000,
              });
            }
          }
    });
    return false; 
});
