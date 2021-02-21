$(document).ready(function(){

    //ver detalle producto
    $(document).on('click','.img_detalle_producto',function(){
        var data_producto = $(this).data('producto');
        var producto = ParseDatos.json_decodificado(data_producto);
        var html_carrete_prods = '';
        if(producto.galeria_fotos.length > 0){
            $.each(producto.galeria_fotos,function(index,foto){
                if(index == ''){
                    html_carrete_prods += '<div class="carousel-item active">\n' +
                        '                                    <img src="'+foto.url_foto+'" class="d-block w-100" alt="'+producto.nombre+'">\n' +
                        '                                </div>';
                }else{
                    html_carrete_prods += '<div class="carousel-item">\n' +
                        '                                    <img src="'+foto.url_foto+'" class="d-block w-100" alt="'+producto.nombre+'">\n' +
                        '                                </div>';
                }
            });
        }
        var detalleProd = '                                    ' +
            '<h5 class="card-title">'+producto.nombre+'</h5>' +
        '<h5 class="card-title">$ '+CodHTML.precio_producto_moneda(producto.precio)+ ' '+ Carrito.moneda_select+'</h5>' +
        '<p class="card-text">'+producto.descripcion+'</p>' +
        '<button type="button" data-id_producto="'+producto.id+'" class="btn btn-sm btn-success agregar_producto_cesta">Agregar<i class="fa fa-shopping-cart"></i></button>';
        $('#fotosCarreteDetProd').html(html_carrete_prods);
        $('#detalleProducto').html(detalleProd);
        Master.mostrar_modal_bootstrap('#modal_producto_comprador',true);
    });

    Productos.listado({});

});

var Productos = {

    listado : function(paramentros){
        Master.spiner_procesando('#contenedor_listado_productos');
        Master.obtener_contenido_peticion_json(
            'routes/productos.php?name=listado',
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