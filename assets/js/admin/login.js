$(document).ready(function(){

    $(document).on('click','#btn_login_admin',function () {
        Login.iniciar_sesion();
    });

    $(document).on('click','#lnk_cerrar_sesion',function(){
        Login.cerrar_session();
    });

    $(document).on('click','#chk_ver_password',function(){
        var is_checked = $(this).is(':checked');
        if(is_checked){
            $('input#password').attr('type','text');
        }else{
            $('input#password').attr('type','password');
        }
    });

    Login.validar();

});

var Login = {

    validar_form_login : function(){
        return Master.validar('#form_login',Master.reglas_validate());
    },

    validar : function(){
        Master.obtener_contenido_peticion_json(
            'routes/login_admin.php?name=valida_login',{},
            function(response_json){
                if(response_json.status){
                    $('#lnk_cerrar_sesion').fadeIn();
                    $('#lnk_msg_sistema').fadeIn();
                    $('#menu_admin_operaciones').fadeIn();
                    $('#contenedor_login_sistema').fadeOut();
                    $('#admin_productos').trigger('click');
                    $('#nombre_usuario_login').html(response_json.data.nombre + ' ' + response_json.data.paterno);
                }else{
                    $('#lnk_cerrar_sesion').fadeOut();
                    $('#lnk_msg_sistema').fadeOut();
                    $('#menu_admin_operaciones').fadeOut();
                    $('#contenedor_login_sistema').fadeIn();
                    $('#contenedor_productos').fadeOut();
                    $('#contenedor_clientes').fadeOut();
                    $('#contenedor_ventas').fadeOut();
                }
                //Master.mensajes_operacion_sistema(response_json.msg);
            },'get'
        );
    },

    iniciar_sesion : function(){
        if(Login.validar_form_login()){
            var data_login = {
                usuario : $('#usuario').val(),
                password : $('#password').val(),
                tipo_usuario : 'admin'
            };
            Master.obtener_contenido_peticion_json(
                'routes/login_admin.php?name=login',
                data_login,
                function(response_json){
                    if(!response_json.status){
                        Master.mensajes_operacion_sistema(response_json.msg,'error');
                    }else{
                        Master.mensajes_operacion_sistema(response_json.msg);
                    }
                    Login.validar();
                },'post'
            );
        }else{
            Master.mensajes_operacion_sistema(['Hay campos requeridos en el formulario, favor de validar'],'error');
        }
    },

    cerrar_session : function () {
        Master.obtener_contenido_peticion_json(
            'routes/login_admin.php?name=logout',{},
            function(response_json){
                Login.validar();
                Master.mensajes_operacion_sistema(response_json.msg);
            },'get'
        );
    }

};