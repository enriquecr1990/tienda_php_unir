$(document).ready(function(){

    $(document).on('click','.btn_productos_compras',function(){
        Compra.productos_compra($(this));
    });

});

var Compra = {

    listado : function(){
        Master.obtener_contenido_peticion_json(
            'routes/usuario.php?name=compras_cliente',
            {id_usuario : $('#id_usuario_compras').val()},
            function(response_json){
                if(response_json.status){
                    var html_compras_cliente = CodHTML.listado_ventas_comprador(response_json.data);
                    $('#tbody_compras_cliente').html(html_compras_cliente);
                }else{
                    Master.mensajes_operacion_sistema(response_json.msg,'error');
                }
            },'post'
        );
    },

    productos_compra : function (btn) {
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

};