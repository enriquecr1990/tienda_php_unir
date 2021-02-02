$(document).ready(function(){

    $(document).on('click','#btn_login_comprador',function(){
        Login.iniciar_sesion();
        Master.opciones_toogle();
    });

    $(document).on('click','#lnk_loguout_comprador',function(){
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

    $(document).on('click','#btn_guardar_mis_datos',function(){
        Login.actualizar_mis_datos_comprador();
    });

    $(document).on('click','#btn_actualizar_datos_comprador',function(){
        Master.mostrar_modal_bootstrap('#modal_form_datos_comprador',true);
    });

    $(document).on('click','#btn_registro_comprador',function(){
        Login.registrar_usuario();
    });

    $(document).on('click','.btn_modal_direccio',function(){
        var id_direccion = $(this).data('id_direccion');
        var direccion = {};
        if(id_direccion != ''){
            direccion = ParseDatos.json_decodificado($(this).data('direccion'));
        }
        Direcciones.modal_direccion(id_direccion,direccion);
    });

    $(document).on('click','#btn_guardar_mi_direccion',function(){
        if($('#id_direccion').val() == '' || $('#id_direccion').val() == 0){
            Direcciones.registrar();
        }else{
            Direcciones.actualizar();
        }
    });

    $(document).on('click','.btn_eliminar_direccion',function(){
        var id_direccion = $(this).data('id_direccion');
        var confirmacion = confirm('¿Esta seguro de eliminar la dirección?, Está acción no se puede revertir');
        if(confirmacion){
            Direcciones.eliminar(id_direccion);
        }
    });

    Login.validar();

});

var Login = {

    validar_form_login : function(){
        return Master.validar('#form_login_comprador',Master.reglas_validate());
    },

    validar_form_mis_datos_comprador : function(){
        return Master.validar('#form_mis_datos',Master.reglas_validate());
    },

    validar : function(){
        Master.obtener_contenido_peticion_json(
            'routes/login_comprador.php?name=valida_login',{},
            function(response_json){
                if(response_json.status){
                    $('#lnk_login_comprador').fadeOut();
                    $('#menu_comprador').fadeIn();
                    $('#msg_logeado_comprador').fadeIn();
                    if(response_json.data){
                        $('#nombre_comprador_login').html(response_json.data.nombre + ' ' + response_json.data.paterno);
                    }else{
                        $('#nombre_comprador_login').html('Usuario registrado');
                    }
                    $('#contenedor_slider_promociones').fadeIn();
                    $('#contenedor_productos_comprador').fadeIn();
                    $('#contenedor_login_comprador').fadeOut();
                    Carrito.num_productos_cesta();
                    Login.mis_datos_comprador(response_json.data);
                    Login.mis_datos_comprador_form(response_json.data);
                    $('#id_data_usuario').val(response_json.data.id);
                    Direcciones.listado(response_json.data.id);
                    $('#id_usuario_compras').val(response_json.data.usuario_id);
                }else{
                    $('#lnk_login_comprador').fadeIn();
                    $('#menu_comprador').fadeOut();
                    $('#msg_logeado_comprador').fadeOut();
                    Carrito.num_productos_cesta();
                }
            },'get'
        );
    },

    iniciar_sesion : function(){
        if(Login.validar_form_login()){
            var data_login = {
                usuario : $('#usuario').val(),
                password : $('#password').val(),
                tipo_usuario : 'comprador'
            };
            Master.obtener_contenido_peticion_json(
                'routes/login_comprador.php?name=login',
                data_login,
                function(response_json){
                    if(!response_json.status){
                        Carrito.num_productos_cesta();
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
            'routes/login_comprador.php?name=logout',{},
            function(response_json){
                Login.validar();
                $('#menu_inicio').trigger('click');
                Master.mensajes_operacion_sistema(response_json.msg);
            },'get'
        );
    },

    registrar_usuario : function(){
        if(Login.validar_form_login()) {
            var data_login = {
                usuario : $('#usuario').val(),
                password : $('#password').val(),
                tipo_usuario : 'comprador'
            };
            Master.obtener_contenido_peticion_json(
                'routes/usuario.php?name=registro_comprador',
                data_login,
                function(response_json){
                    if(response_json.status){
                        Master.mensajes_operacion_sistema(response_json.msg);
                        Login.iniciar_sesion();
                    }else{
                        Master.mensajes_operacion_sistema(response_json.msg,'error');
                    }
                },'post'
            );
        }else{
            Master.mensajes_operacion_sistema(['Hay campos requeridos en el formulario, favor de validar'],'error');
        }
    },

    mis_datos_comprador : function(data){
        $('.datos_comprador_nombre').html('');
        $('.datos_comprador_genero').html('');
        $('.datos_comprador_correo').html('');
        $('.datos_comprador_telefono').html('');
        if(data){
            $('.datos_comprador_nombre').html(data.nombre + ' ' +data.paterno +' ' + data.materno);
            $('.datos_comprador_genero').html(data.genero == 'h' ? 'Hombre' : 'Mujer');
            $('.datos_comprador_correo').html(data.correo);
            $('.datos_comprador_telefono').html(data.telefono);
        }
    },

    mis_datos_comprador_form : function(data){
        $('#id_datos_usuario').val('');
        $('#nombre_cliente').val('');
        $('#paterno_cliente').val('');
        $('#materno_cliente').val('');
        $('#correo_cliente').val('');
        $('#telefono_cliente').val('');
        $('#genero_hombre_cliente').attr('checked',false);
        $('#genero_mujer_cliente').attr('checked',false);
        if(data){
            $('#id_datos_usuario').val(data.id);
            $('#nombre_cliente').val(data.nombre);
            $('#paterno_cliente').val(data.paterno);
            $('#materno_cliente').val(data.materno);
            $('#correo_cliente').val(data.correo);
            $('#telefono_cliente').val(data.telefono);
            data.genero == 'h' ? $('#genero_hombre_cliente').attr('checked',true) : $('#genero_mujer_cliente').attr('checked',true);
        }
    },

    actualizar_mis_datos_comprador : function(){
        if(Login.validar_form_mis_datos_comprador()){
            Master.obtener_contenido_peticion_json(
                'routes/login_comprador.php?name=actualizar_comprador',
                Master.obtener_post_formulario('#form_mis_datos'),
                function(response_json){
                    if(response_json.status){
                        Master.mostrar_modal_bootstrap('#modal_form_datos_comprador',false);
                        Master.mensajes_operacion_sistema(response_json.msg);
                        Master.obtener_contenido_peticion_json(
                            'routes/login_comprador.php?name=valida_login',{},
                            function(response_json){
                                if(response_json.status){
                                    if(response_json.data){
                                        $('#nombre_comprador_login').html(response_json.data.nombre + ' ' + response_json.data.paterno);
                                    }else{
                                        $('#nombre_comprador_login').html('Usuario registrado');
                                    }
                                    Carrito.num_productos_cesta();
                                    Login.mis_datos_comprador(response_json.data);
                                    Login.mis_datos_comprador_form(response_json.data);
                                }else{
                                    Carrito.num_productos_cesta();
                                }
                            },'get'
                        );
                    }else{
                        Master.mensajes_operacion_sistema(response_json.msg,'error');
                    }
                }
            );
        }else{
            Master.mensajes_operacion_sistema(['Hay campos requeridos en el formulario, favor de validar'],'error');
        }
    },

};

var Direcciones = {

    modal_direccion : function(id_direccion,direccion){
        //cargamos los estados del catalogo
        if($('#cat_estado').find('option').length == 1){
            Catalogos.estados('#cat_estado');
        }
        if(id_direccion != ''){
            $('#id_direccion').val(id_direccion);
            $('#calle').val(direccion.calle);
            $('#numero_ext').val(direccion.numero_ext);
            $('#numero_int').val(direccion.numero_int);
            $('#codigo_postal').val(direccion.codigo_postal);
            $('#quien_recibe').val(direccion.quien_recibe);
            $('#referencias').val(direccion.referencias);
            Catalogos.estados('#cat_estado',direccion.id_cat_estado);
            Catalogos.municipios(direccion.id_cat_estado,'#cat_municipio',direccion.id_cat_municipio);
            Catalogos.localidades(direccion.id_cat_municipio,'#cat_localidad',direccion.id_cat_localidad);
        }
        Master.mostrar_modal_bootstrap('#modal_form_comprador_direccion',true);
    },

    validar_formulario_direccion : function(){
        return Master.validar('#form_direccion_usuario',Master.reglas_validate());
    },

    listado : function(id_data_usuario){
        Master.obtener_contenido_peticion_json(
            'routes/usuario.php?name=obtener_direcciones',
            {id_data_usuario : id_data_usuario},
            function(response_json){
                if(response_json.status){
                    var html_direcciones = CodHTML.listado_direcciones(response_json.data);
                    var html_direcciones_envio = CodHTML.listado_direcciones_envio(response_json.data);
                    $('#card_body_direcciones').html(html_direcciones);
                    $('#card_body_direcciones_envio').html(html_direcciones_envio);
                }else{
                    Master.mensajes_operacion_sistema(response_json.msg,'error');
                }
            }
        );
    },

    registrar : function(){
        if(Direcciones.validar_formulario_direccion()){
            Master.obtener_contenido_peticion_json(
                'routes/usuario.php?name=agregar_direccion',
                Master.obtener_post_formulario('#form_direccion_usuario'),
                function(response){
                    if(response.status){
                        Master.mostrar_modal_bootstrap('#modal_form_comprador_direccion',false);
                        Master.mensajes_operacion_sistema(response.msg);
                        Direcciones.listado($('#id_data_usuario').val());
                    }else{
                        Master.mensajes_operacion_sistema(response.msg,'error');
                    }
                }
            );
        }
    },

    actualizar : function(){
        if(Direcciones.validar_formulario_direccion()){
            Master.obtener_contenido_peticion_json(
                'routes/usuario.php?name=actualizar_direccion',
                Master.obtener_post_formulario('#form_direccion_usuario'),
                function(response){
                    if(response.status){
                        Master.mostrar_modal_bootstrap('#modal_form_comprador_direccion',false);
                        Master.mensajes_operacion_sistema(response.msg);
                        Direcciones.listado($('#id_data_usuario').val());
                    }else{
                        Master.mensajes_operacion_sistema(response.msg,'error');
                    }
                }
            );
        }
    },

    eliminar : function (id_direccion){
        Master.obtener_contenido_peticion_json(
            'routes/usuario.php?name=eliminar_direccion',
            {id_direccion : id_direccion},
            function(response){
                if(response.status){
                    Master.mostrar_modal_bootstrap('#modal_form_comprador_direccion',false);
                    Master.mensajes_operacion_sistema(response.msg);
                    Direcciones.listado($('#id_data_usuario').val());
                }else{
                    Master.mensajes_operacion_sistema(response.msg,'error');
                }
            }
        );
    }
}