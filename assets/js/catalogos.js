$(document).ready(function(){

    $(document).on('change','.slt_cat_estado',function(){
        var destino = $(this).data('destino');
        var id_estado = $(this).val();
        if(id_estado != ''){
            Catalogos.municipios(id_estado,destino);
        }
    });

    $(document).on('change','.slt_cat_municipio',function(){
        var destino = $(this).data('destino');
        var id_municipio = $(this).val();
        Catalogos.localidades(id_municipio,destino);
    });

    Catalogos.tipo_producto();
    Catalogos.estatus_compra();

});

var Catalogos = {

    tipo_producto : function(){
        Master.obtener_contenido_peticion_json(
            'routes/catalogos.php?name=tipo_producto',{},
            function(response_json){
                if(response_json.status){
                    var html_opt = CodHTML.select_catalogo(response_json.data);
                    $('#tipo_producto').append(html_opt);
                    $('#busqueda_categoria').append(html_opt);
                }else{
                    Master.mensajes_operacion_sistema(response_json.msg)
                }
            },'post'
        );
    },

    estatus_compra : function(){
        Master.obtener_contenido_peticion_json(
            'routes/catalogos.php?name=estatus_compra',{},
            function(response_json){
                if(response_json.status){
                    var html_opt = CodHTML.select_catalogo(response_json.data);
                    $('#cat_compra_estatus_id').append(html_opt);
                }else{
                    Master.mensajes_operacion_sistema(response_json.msg);
                }
            },'post'
        );
    },

    estados : function(destino,value = false){
        var html_opt = '<option value="">--Seleccione--</option>';
        Master.obtener_contenido_peticion_json(
            'routes/catalogos.php?name=estados',{},
            function(response_json){
                if(response_json.status){
                    html_opt += CodHTML.select_catalogo(response_json.data);
                    $(destino).html(html_opt);
                    if(value){
                        $(destino).val(value);
                    }
                }else{
                    Master.mensajes_operacion_sistema(response_json.msg);
                }
            },'get'
        );
    },

    municipios : function(id_estado,destino,value = false){
        var opt_mun = '<option value="">--Seleccione--</option>';
        Master.obtener_contenido_peticion_json(
            'routes/catalogos.php?name=municipios&id_search='+id_estado,{},
            function(response_json){
                if(response_json.status){
                    opt_mun += CodHTML.select_catalogo(response_json.data);
                    $(destino).html(opt_mun);
                    if(value){
                        $(destino).val(value)
                    }
                }else{
                    Master.mensajes_operacion_sistema(response_json.msg);
                }
            },'get'
        );
    },

    localidades : function(id_municipio,destino,value = false){
        var opt_loc = '<option value="">--Seleccione--</option>';
        Master.obtener_contenido_peticion_json(
            'routes/catalogos.php?name=localidades&id_search='+id_municipio,{},
            function(response_json){
                if(response_json.status){
                    opt_loc += CodHTML.select_catalogo(response_json.data);
                    $(destino).html(opt_loc);
                    if(value){
                        $(destino).val(value);
                    }
                }else{
                    Master.mensajes_operacion_sistema(response_json.msg);
                }
            },'get'
        );
    }

};