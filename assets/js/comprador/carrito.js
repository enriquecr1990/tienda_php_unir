$(document).ready(function(){

    $(document).on('click','.agregar_producto_cesta',function(){
        var id_producto = $(this).data('id_producto');
        Carrito.agregar_producto_cesta(id_producto);
    });

    $(document).on('click','.btn_quitar_producto',function(){
        var input = $(this).closest('div.input-group').find('.add_numero_productos');
        var cantidad = parseInt(input.val()) - parseInt(1);
        input.val(cantidad);
        Carrito.validar_input_add_producto(input);
        Carrito.agregar_producto_cesta($(this).data('id_producto'),-1);
        Carrito.carrito_cesta_detalle();
    });

    $(document).on('click','.btn_add_producto',function(){
        var input = $(this).closest('div.input-group').find('.add_numero_productos');
        var cantidad = parseInt(input.val()) + parseInt(1);
        input.val(cantidad);
        Carrito.validar_input_add_producto(input);
        Carrito.agregar_producto_cesta($(this).data('id_producto'));
        Carrito.carrito_cesta_detalle();
    });

    $(document).on('click','.btn_eliminar_producto',function(){
        var id_producto = $(this).data('id_producto');
        Carrito.eliminar_product_cesta(id_producto);
    });

    $(document).on('click','.moneda_opcion',function(){
        var valor_moneda = $(this).data('valor_moneda');
        Carrito.moneda_select = valor_moneda;
        if(valor_moneda == 'USD'){
            Carrito.valor_dollar_peso_mexicano();
        }else if(valor_moneda == 'EUR'){
            Carrito.valor_dollar_euro();
        }
        $('#menuTiendaEcommerse').find('a.active').trigger('click');
        Carrito.etiqueta_moneda_menu();
    });

    $(document).on('click','#btn_pagar_proceso_compra',function(){
        Master.obtener_contenido_peticion_json(
            'routes/login_comprador.php?name=valida_login',{},
            function(response_json){
                if(response_json.status){
                    $('#contenedor_proceso_pago_invitado').fadeOut();
                    $('#contenedor_proceso_pago_usr_registrado').fadeIn();
                }else{
                    $('#contenedor_proceso_pago_invitado').fadeIn();
                    $('#contenedor_proceso_pago_usr_registrado').fadeOut();
                }
                Master.mostrar_modal_bootstrap('#modal_proceso_compra',true);
            },'get'
        );
    });

    $(document).on('click','.direccion_envio_checked',function(){
        var checked_direccion = $('.direccion_envio_checked:checked').val();
        var paramentros = {
            direccion_usuario_id : checked_direccion,
            monto : parseFloat($('#Importe').val() / 100).toFixed(2),
            moneda : Carrito.moneda_select,
        }
        Master.obtener_contenido_peticion_json(
            'routes/carrito.php?name=preparar_sesion_compra',paramentros,
            function(response_json){
                if(!response_json.status){
                    Master.mensajes_operacion_sistema(response_json.msg,'error');
                }else{
                    $('#Num_operacion').val(response_json.data.folio);
                    Carrito.preparar_form_pago_cecabank();
                }
            }
        );
    });

    Carrito.num_productos_cesta();

    if(location.href == Cecabank.URL_OK){
        Master.mostrar_modal_bootstrap('#modal_pago_cecabank_finalizado',true);
        //pagado
        Master.obtener_contenido_peticion_json(
            'routes/carrito.php?name=actualizar_compra',{estatus_id : 1},
            function(response_json){

            },'post'
        )
        setTimeout(function(){
            location.href = '/';
        },7000);
    }if(location.href == Cecabank.URL_NOK){
        Master.mostrar_modal_bootstrap('#modal_pago_cecabank_rechazado',true);
        //pago rechazado
        Master.obtener_contenido_peticion_json(
            'routes/carrito.php?name=actualizar_compra',{estatus_id : 5},
            function(response_json){

            },'post'
        )
        setTimeout(function(){
            location.href = '/';
        },7000);
    }

    Carrito.valor_dollar_peso_mexicano(true);
    Carrito.valor_dollar_euro(true);

});

var Carrito = {

    /**
     * codigo ISO del tipo moneda
     * USD = 840
     * MXN = 484
     * https://es.wikipedia.org/wiki/ISO_4217
     */
    moneda_select : 'MXN',

    obtener_moneda_iso : function(strMoneda){
        var iso_moneda = 484;
        switch (strMoneda) {
            case 'MXN': iso_moneda = 484; break;
            case 'USD': iso_moneda = 840; break;
            case 'EUR': iso_moneda = 978; break;
        }
        return iso_moneda;
    },

    dolar_peso_mexicano : 20,

    dolar_euro : 1.1,

    etiqueta_moneda_menu : function(){
        $('#moneda_select_pago').html(Carrito.moneda_select);
    },

    num_productos_cesta : function(){
        Master.obtener_contenido_peticion_json(
            'routes/carrito.php?name=productos_cesta',{},
            function (response_json) {
                if(response_json.status){
                    if(response_json.data.total_productos > 0){
                        $('#bdg_carrito').html(response_json.data.total_productos);
                    }else{
                        $('#bdg_carrito').html('');
                    }
                }else{
                    Master.mensajes_operacion_sistema(response_json.msg,'error');
                }
            },'post',
        );
    },

    carrito_cesta_detalle : function(){
        Master.spiner_procesando('#card_body_mi_carrito_comprados');
        Master.obtener_contenido_peticion_json(
            'routes/carrito.php?name=productos_cesta',{},
            function (response_json) {
                if(response_json.status){
                    var productos_carrito = CodHTML.productos_cesta_detalle(response_json.data.productos);
                    $('#detalle_subtotal').html('$ ' +CodHTML.precio_producto_moneda(response_json.data.subtotal) + Carrito.moneda_select);
                    $('#detalle_impuesto').html('$ ' +CodHTML.precio_producto_moneda(response_json.data.impuesto) + Carrito.moneda_select);
                    $('#detalle_envio').html('$ ' +CodHTML.precio_producto_moneda(response_json.data.envio) + Carrito.moneda_select);
                    $('#detalle_total').html('$ ' +CodHTML.precio_producto_moneda(response_json.data.total) + Carrito.moneda_select);
                    $('#card_body_mi_carrito_comprados').html(productos_carrito);
                    if(response_json.data.total_productos > 0){
                        $('#bdg_carrito').html(response_json.data.total_productos);
                        $('#btn_pagar_compra').fadeIn();
                    }else{
                        $('#bdg_carrito').html('');
                        $('#btn_pagar_compra').fadeOut();
                    }
                    Carrito.validar_input_add_productos();
                    $('#URL_OK').val(Cecabank.URL_OK);
                    $('#URL_NOK').val(Cecabank.URL_NOK);
                    $('#Importe').val(parseInt(CodHTML.precio_producto_moneda(response_json.data.total) * 100));
                    $('#TipoMoneda').val(Carrito.obtener_moneda_iso(Carrito.moneda_select)); //para solventar el tipo de moneda seleccionada
                }else{
                    Master.mensajes_operacion_sistema(response_json.msg,'error');
                }
            },'post',
        );
    },

    preparar_form_pago_cecabank : function(){
        var paramentros = {
            Importe : $('#Importe').val(),
            TipoMoneda : $('#TipoMoneda').val(),
            URL_OK : $('#URL_OK').val(),
            URL_NOK : $('#URL_NOK').val(),
            Num_operacion : $('#Num_operacion').val()
        };
        //datos que se procesesan en el banckend
        Master.obtener_contenido_peticion_json(
            'routes/carrito.php?name=preparar_comprar_pago',
            paramentros,
            function(response_json){
                if(response_json.status){
                    $('#MerchantID').val(response_json.data.MerchantID);
                    $('#AcquirerBIN').val(response_json.data.AcquirerBIN);
                    $('#TerminalID').val(response_json.data.TerminalID);
                    $('#Num_operacion').val(response_json.data.Num_operacion);
                    $('#Firma').val(response_json.data.Firma);
                    $('#btn_pagar_form_cecabank').removeAttr('disabled');
                }else{
                    Master.mensajes_operacion_sistema(response_json.msg,'error');
                }
            },'post'
        );
    },

    agregar_producto_cesta : function(id_producto,cantidad = 1){
        var parametros = {
            id_producto : id_producto,
            cantidad : cantidad
        };
        Master.obtener_contenido_peticion_json(
            'routes/carrito.php?name=agregar_producto',parametros,
            function(response_json){
                if(response_json.status){
                    Master.mensajes_operacion_sistema(response_json.msg,'success');
                    Carrito.num_productos_cesta();
                }else{
                    Master.mensajes_operacion_sistema(response_json.msg,'error');
                }
            },'post'
        );
    },

    eliminar_product_cesta : function(id_producto){
        Master.obtener_contenido_peticion_json(
            'routes/carrito.php?name=eliminar_producto', {producto_id : id_producto},
            function(response_json){
                if(response_json.status){
                    Master.mensajes_operacion_sistema(response_json.msg,'success');
                    Carrito.carrito_cesta_detalle();
                }else{
                    Master.mensajes_operacion_sistema(response_json.msg,'error');
                }
            },'post'
        );
    },

    validar_input_add_productos : function(){
        $('.add_numero_productos').each(function(){
            var input = $(this);
            Carrito.validar_input_add_producto(input);
        });
    },

    validar_input_add_producto : function(input){
        var btn_minus = input.closest('div').find('.btn_quitar_producto');
        if(input.val() == 1){
            btn_minus.attr('disabled',true);
        }else{
            btn_minus.removeAttr('disabled');
        }
    },

    valor_dollar_peso_mexicano : function(is_loading = false){
        $.ajax({
            url : 'https://www.banxico.org.mx/SieAPIRest/service/v1/series/SF43718/datos/oportuno?token=4a58ce5006f7edc14c8a6e3c74aaebb3af01888ae3625dfece3c19a52905c685',
            jsonp : 'callback',
            dataType : 'jsonp',
            success : function (response) {
                var respuesta = {
                    dolar_mxn : response.bmx.series[0].datos[0].dato,
                    fecha_cambio : response.bmx.series[0].datos[0].fecha,
                    id_serie : response.bmx.series[0].idSerie,
                    titulo : response.bmx.series[0].titulo
                };
                if(!is_loading){
                    Master.mensajes_operacion_sistema([
                            //'Consumo del servicio de BANXICO - '+ respuesta.titulo,
                            //'Serie consultada :'+respuesta.id_serie,
                            'Cambio: 1 dolar = ' + respuesta.dolar_mxn + ' MXN - al ' +respuesta.fecha_cambio + ' según el Banco de México BANXICO'
                        ],
                        'success');
                }
                Carrito.dolar_peso_mexicano = respuesta.dolar_mxn;
            },
            error : function(){
                Master.mensajes_operacion_sistema(['Ocurrio un error en el consumo del servicio de BANXICO, intentar mas tarde'])
            }
        });
    },

    valor_dollar_euro : function(is_loading){
        $.ajax({
            url : 'https://www.banxico.org.mx/SieAPIRest/service/v1/series/SF57922/datos/oportuno?token=4a58ce5006f7edc14c8a6e3c74aaebb3af01888ae3625dfece3c19a52905c685',
            jsonp : 'callback',
            dataType : 'jsonp',
            success : function (response) {
                var respuesta = {
                    dolar_mxn : response.bmx.series[0].datos[0].dato,
                    fecha_cambio : response.bmx.series[0].datos[0].fecha,
                    id_serie : response.bmx.series[0].idSerie,
                    titulo : response.bmx.series[0].titulo
                };
                if(!is_loading){
                    Master.mensajes_operacion_sistema([
                            //'Consumo del servicio de BANXICO - '+ respuesta.titulo,
                            //'Serie consultada :'+respuesta.id_serie,
                            'Cambio: 1 dolar = ' + respuesta.dolar_mxn + ' EUR - al ' +respuesta.fecha_cambio + ' según el Banco de México BANXICO'
                        ],
                        'success');
                }
                Carrito.dolar_euro = respuesta.dolar_mxn;
            },
            error : function(){
                Master.mensajes_operacion_sistema(['Ocurrio un error en el consumo del servicio de BANXICO, intentar mas tarde'])
            }
        });
    },

};

var hostname = location.hostname;
switch (hostname) {
    case 'tienda-php.enriquecr-mx.info':
        var Cecabank = {
            URL_OK : 'http://tienda-php.enriquecr-mx.info/pago_finalizado.php',
            URL_NOK : 'http://tienda-php.enriquecr-mx.info/pago_rechazado.php'
        }
        break;
    default:
        var Cecabank = {
            URL_OK : 'http://mi-tienda-unir.local.com/pago_finalizado',
            URL_NOK : 'http://mi-tienda-unir.local.com/pago_rechazado'
        }
        break;
}