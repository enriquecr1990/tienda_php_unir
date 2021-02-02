$(document).ready(function(){

    $(document).on('click','#admin_clientes',function(){
        $('#menu_admin_tienda_unir').find('a.active').removeClass('active');
        $('#admin_clientes').addClass('active');
        $('#contenedor_productos').fadeOut();
        $('#contenedor_clientes').fadeIn();
        $('#contenedor_ventas').fadeOut();
        Clientes.listado({});
    });

    $(document).on('click','.btn_cliente_ventas',function(){
        var btn = $(this);
        Clientes.compras_cliente(btn);
    });

    $(document).on('change','.clientes_filtro',function () {
        var datos_filtro = {
            busqueda_detalle : $('#busqueda_detalle_clientes').val(),
            busqueda_genero : $('#busqueda_genero_clientes').val()
        };
        Clientes.listado(datos_filtro);
    });

});

var Clientes = {

    listado : function(parametros){
        Master.spiner_procesando('#tbody_clientes_admin');
        Master.obtener_contenido_peticion_json(
            'routes/usuario.php?name=clientes',
            parametros,function(response_json){
                if(response_json.status){
                    var clientes = CodHTML.listado_clientes_admin(response_json.data);
                    $('#tbody_clientes_admin').html(clientes);
                }else{
                    Master.mensajes_operacion_sistema(response_json.msg,'error');
                }
            },'post'
        );
    },

    compras_cliente : function(btn){
        Master.mostrar_modal_bootstrap('#modal_cliente_venta',true);
        Master.spiner_procesando('#tbody_compras_cliente');
        var id_usuario_cliente = btn.data('id_usuario');
        var cliente = ParseDatos.json_decodificado(btn.data('cliente'));
        $('#nombre_cliente_compras').html(cliente.nombre+' '+cliente.paterno+' '+cliente.materno);
        Master.obtener_contenido_peticion_json(
            'routes/usuario.php?name=compras_cliente',
            {id_usuario : id_usuario_cliente},
            function(response_json){
                if(response_json.status){
                    var html_compras_cliente = CodHTML.compras_cliente_admin(response_json.data);
                    $('#tbody_compras_cliente').html(html_compras_cliente);
                }else{
                    Master.mensajes_operacion_sistema(response_json.msg,'error');
                }
            },'post'
        );
    }

};