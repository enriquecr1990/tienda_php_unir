$(document).ready(function(){

    $(document).on('click','#admin_productos',function(){
        $('#menu_admin_tienda_unir').find('a.active').removeClass('active');
        $('#admin_productos').addClass('active');
        $('#contenedor_productos').fadeIn();
        $('#contenedor_clientes').fadeOut();
        $('#contenedor_ventas').fadeOut();
        Productos.listado({});
    });

    $(document).on('click','#btn_agregar_producto',function(){
        $('#btn_reiniciar_form_producto').trigger('click');
        $('.is-valid').removeClass('is-valid');
        $('.is-invalid').removeClass('is-invalid');
        $('.error ').remove();
        Master.mostrar_modal_bootstrap('#modal_productos',true);
    });

    $(document).on('click','.btn_modificar_producto',function(){
        var btn = $(this);
        Productos.cargar_datos_producto_modificar(btn);
        $('.is-valid').removeClass('is-valid');
        $('.is-invalid').removeClass('is-invalid');
        $('.error ').remove();
        Master.mostrar_modal_bootstrap('#modal_productos',true);
    });

    $(document).on('click','#btn_nueva_ruta_imagen',function(){
        var html_nueva_foto = CodHTML.row_nueva_foto();
        $('#tbody_producto_galeria').append(html_nueva_foto);
    });

    $(document).on('click','#btn_guardar_producto',function(){
        if(Productos.validar_formulario_producto()){
            Master.obtener_contenido_peticion_json(
                'routes/productos?name=guardar',
                Master.obtener_post_formulario('#form_producto'),
                function(response_json){
                    if(response_json.status){
                        Master.mostrar_modal_bootstrap('#modal_productos',false);
                        Master.mensajes_operacion_sistema(response_json.msg,'success');
                        Productos.listado({});
                    }else{
                        Master.mensajes_operacion_sistema(response_json.msg);
                    }
                },'post'
            );
        }else{
            Master.mensajes_operacion_sistema(['Hay campos requeridos en el formulario, favor de validar']);
        }
    });

    $(document).on('change','.productos_filtro',function(){
        var datos_filtro = {
            busqueda_detalle : $('#busqueda_detalle').val(),
            busqueda_genero : $('#busqueda_genero').val(),
            busqueda_tipo : $('#busqueda_categoria').val(),
        };
        Productos.listado(datos_filtro);
    });

    //Productos.listado({}); //se quita para poderlo procesar desde los links y de cuando se vaya a iniciar sesion con el administrador

});

var Productos = {

    listado : function(paramentros){
        Master.spiner_procesando('#tbody_productos_admin');
        Master.obtener_contenido_peticion_json(
            'routes/productos?name=listado',
            paramentros,function(response_json){
                if(response_json.status){
                    var registro_productos = CodHTML.listado_tabla(response_json.data);
                    $('#tbody_productos_admin').html(registro_productos);
                }else{
                    Master.mensajes_operacion_sistema(response_json.msg);
                }
            },'post'
        );
    },

    validar_formulario_producto : function(){
        //tbody_producto_galeria
        var valido = Master.validar('#form_producto',Master.reglas_validate());
        if(valido){
            if($('#tbody_producto_galeria').find('tr').length == 0){
                valido = false;
                Master.mensajes_operacion_sistema(['Se requiere por lo menos una foto del producto']);
            }
        }
        return valido;
    },

    cargar_datos_producto_modificar : function(btn){
        var producto = ParseDatos.json_decodificado(btn.data('producto'));
        $('#id').val(producto.id);
        $('#clave').val(producto.clave_producto);
        $('#nombre').val(producto.nombre);
        $('#descripcion').val(producto.descripcion);
        $('#precio').val(producto.precio);
        $('#genero').val(producto.genero);
        $('#tipo_producto').val(producto.cat_tipo_producto_id);
        var rows_fotos = '';
        $.each(producto.galeria_fotos,function(index,foto){
            rows_fotos += CodHTML.row_html_foto(index,foto.url_foto);
        });
        $('#tbody_producto_galeria').html(rows_fotos);
    },

}