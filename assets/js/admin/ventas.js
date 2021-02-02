$(document).ready(function(){

    $(document).on('click','#admin_ventas',function(){
        $('#menu_admin_tienda_unir').find('a.active').removeClass('active');
        $('#admin_ventas').addClass('active');
        $('#contenedor_productos').fadeOut();
        $('#contenedor_clientes').fadeOut();
        $('#contenedor_ventas').fadeIn();
        Ventas.listado({});
    });

    $(document).on('change','.ventas_filtro',function(){
        var datos_filtro = {
            busqueda_detalle_ventas : $('#busqueda_detalle_ventas').val(),
            busqueda_fecha_ventas : $('#busqueda_fecha_ventas').val(),
            busqueda_genero_ventas : $('#busqueda_genero_ventas').val(),
        };
        Ventas.listado(datos_filtro);
    });

    $(document).on('click','.btn_productos_ventas',function(){
        Ventas.productos_venta($(this));
    });

    $(document).on('click','.btn_actualizar_venta',function(){
        Ventas.modal_actualizar_venta($(this));
    });

    $(document).on('click','#actualizar_venta_admin',function(){
        Ventas.guardar_actualizar_venta();
    });

});

var Ventas = {

    listado : function(parametros){
        Master.spiner_procesando('#tbody_ventas_admin');
        Master.obtener_contenido_peticion_json(
            'routes/productos.php?name=ventas',parametros,
            function(response_json){
                if(response_json.status){
                    var listado_ventas = CodHTML.listado_ventas_admin(response_json.data);
                    $('#tbody_ventas_admin').html(listado_ventas);
                }else{
                    Master.mensajes_operacion_sistema(response_json.msg,'error');
                }
            },'post'
        );
    },

    productos_venta : function (btn) {
        var id_compra = btn.data('id_compra');
        var venta = ParseDatos.json_decodificado(btn.data('venta'));
        $('#folio_venta').html(venta.folio);
        $('#monto_venta').html('$'+venta.monto);
        $('#moneda_venta').html(venta.moneda);
        Master.mostrar_modal_bootstrap('#modal_ventas_productos',true);
        Master.spiner_procesando('#tbody_productos_venta');
        Master.obtener_contenido_peticion_json(
            'routes/productos.php?name=productos_venta',{id_compra : id_compra},
            function(response_json){
                if(response_json.status){
                    var listado_productos = CodHTML.listado_productos_venta_admin(response_json.data);
                    $('#tbody_productos_venta').html(listado_productos);
                }else{
                    Master.mensajes_operacion_sistema(response_json.msg,'error');
                }
            },'post'
        );
    },

    modal_actualizar_venta : function(btn){
        var id_compra = btn.data('id_compra');
        var venta = ParseDatos.json_decodificado(btn.data('venta'));
        $('#folio_venta_actualizar').html(venta.folio);
        $('#id_compra').val(venta.id);
        $('#mensajeria').val(venta.mensajeria);
        $('#numero_guia').val(venta.numero_guia);
        $('#cat_compra_estatus_id').val('');
        Master.mostrar_modal_bootstrap('#modal_actualizar_venta',true);
    },

    validar_form_actualizar_venta : function(){
        return Master.validar('#actualizar_venta',Master.reglas_validate());
    },

    guardar_actualizar_venta : function(){
        if(Ventas.validar_form_actualizar_venta()){
            Master.obtener_contenido_peticion_json(
                'routes/productos.php?name=actualizar_venta',
                Master.obtener_post_formulario('#actualizar_venta'),
                function(response_json){
                    if(response_json.status){
                        Master.mostrar_modal_bootstrap('#modal_actualizar_venta',false);
                        Master.mensajes_operacion_sistema(response_json.msg,'success');
                        Ventas.listado({});
                    }else{
                        Master.mensajes_operacion_sistema(response_json.msg);
                    }
                },'post'
            );
        }else{
            Master.mensajes_operacion_sistema(['Hay campos requeridos en el formulario, favor de validar']);
        }
    }

}