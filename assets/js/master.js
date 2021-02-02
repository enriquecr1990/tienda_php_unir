$(document).ready(function(){

    $(document).on('click','.btn_eliminar_registro',function(){
        $(this).closest('tr').remove();
    });

    $(document).on('click','.mostrar_modal_boton',function(){
        Master.mostrar_modal_boton($(this));
    });

    Master.opciones_toogle();

});

var Master = {

    validar : function (id_form,options){
        var validator = $(id_form).validate(options);
        validator.form();
        var result = validator.valid();
        return result;
    },

    reglas_validate : function () {
        //var rules = {};
        var rules = {
            errorElement: "span",
            errorPlacement: function ( error, element ) {
                // Add the `help-block` class to the error element
                error.addClass( "help-block invalid-feedback" );

                // Add `has-feedback` class to the parent div.form-group
                // in order to add icons to inputs
                element.parents( ".form-group" ).addClass( "has-feedback" );

                if ( element.prop( "type" ) === "checkbox" ) {
                    error.insertAfter( element.parent( "label" ) );
                } else {
                    error.insertAfter( element );
                }

                // Add the span element, if doesn't exists, and apply the icon classes to it.
            },
            success: function ( label, element ) {
                // Add the span element, if doesn't exists, and apply the icon classes to it.
            },
            highlight: function ( element, errorClass, validClass ) {
                $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
                //$( element ).next( "span" ).addClass( "fa-exclamation" ).removeClass( "fa-check" );
            },
            unhighlight: function ( element, errorClass, validClass ) {
                $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
                //$( element ).next( "span" ).addClass( "fa-check" ).removeClass( "fa-exclamation" );
            }
        }
        return rules;
    },

    mostrar_modal_bootstrap : function(id_modal,mostrar,position_centered = false){
        if(position_centered){
            $(id_modal).find('div.modal-dialog').addClass('modal-dialog-centered');
        }
        if(mostrar){
            $(id_modal).modal({backdrop: 'static', keyboard: false});
            $(id_modal).modal('show');
        }else{
            $(id_modal).modal('hide');
        }
    },

    //type: "default, "confirmed", "success", "error";
    mensaje_operacion : function(type = 'confirmed',msg,time){
        var time_growl = 6000;
        if(time != undefined && time != '' && time > 6000){
            time_growl = parseInt(time);
        }
        new Notif(msg,type).display(time_growl);
    },

    obtener_contenido_peticion_json : function (url,parametros,processor,metodo) {
        if (!metodo) {
            metodo = "POST";
        }
        $.ajax({
            type : metodo,
            data : parametros,
            dataType: "json",
            url : url,
            success : function (data) {
                processor(data,true);
            },
            error : function (xhr,ajaxOptions,thrownError) {
                alert(xhr.status);
                alert(thrownError);
                processor("No se pudo establecer con el servidor",false);
            }
        });
    },

    //funcion que nos devuel el post de un formulario para enviarlo al controller
    obtener_post_formulario : function (id_formulario) {
        return $(id_formulario).serialize()+Master.serializar_json_formulario(undefined);
    },

    //funcion que nos permite serializar en json el post un formulario
    serializar_json_formulario : function (json) {
        var strSerialized = '';
        if(json != null){
            $.each(json,function (key,value) {
                strSerialized += strSerialized == "" ? '&'+key+'='+value : '&'+key+'='+value;
            });
        }
        return strSerialized;
    },

    mensajes_operacion_sistema : function(msgs,type = 'confirmed'){
        $.each(msgs,function(index,msg){
            Master.mensaje_operacion(type,msg);
        });
    },

    spiner_procesando : function(destino){
        $(destino).html('<div class="spinner-border text-success" role="status">\n' +
            '  <span class="sr-only">Loading...</span>\n' +
            '</div>');
    },

    opciones_toogle : function(){
        $('a[data-toggle="dropdown"]').trigger('click');
        $('[data-toggle="tooltip"]').tooltip();
    },

    mostrar_modal_boton : function (btn) {
        var id_modal_mostrar = btn.data('id_modal_mostrar');
        Master.mostrar_modal_bootstrap(id_modal_mostrar,true);
    },
}