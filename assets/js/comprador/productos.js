$(document).ready(function(){

    Productos.listado({});

});

var Productos = {

    listado : function(paramentros){
        Master.spiner_procesando('#contenedor_listado_productos');
        Master.obtener_contenido_peticion_json(
            'routes/productos?name=listado',
            paramentros,function(response_json){
                if(response_json.status){
                    var tarjetas_productos = CodHTML.listado(response_json.data);
                    $('#contenedor_listado_productos').html(tarjetas_productos);
                }else{
                    Master.mensajes_operacion_sistema(response_json.msg);
                }
            },'post'
        );
    }

}