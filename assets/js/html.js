$(document).ready(function(){

});

var CodHTML = {

    //funciones comunes
    fecha_html : function(strFecha){
        var d = new Date(strFecha);
        return d.toLocaleDateString();
    },

    /**
     * funciones para los productos admin
     */

    listado_tabla : function(productos){
        var html = '';
        if(productos.length == 0){
            html = '<tr><td class="text-center" colspan="7">Sin registros encontrados</td></tr>';
        }else{
            $.each(productos,function(index,product){
                html += CodHTML.registro_producto(product);
            });
        }
        return html;
    },

    registro_producto : function(producto){
        var html = '';
        var imgs = '';
        var row_codificado = ParseDatos.json_codificado(producto);
        $.each(producto.galeria_fotos,function(index, img){
            imgs += '<img src="'+img.url_foto+'" class="img-thumbnail" width="75px" alt="'+producto.nombre+'">';
        });
        html = '<tr>' +
            '<td>'+producto.clave_producto+'</td>' +
            '<td>'+producto.nombre+'</td>' +
            '<td>'+producto.descripcion+'</td>' +
            '<td>$'+producto.precio+'</td>' +
            '<td>' +imgs+ '</td>' +
            '<td>'+producto.tipo_producto+'</td>' +
            '<td>' +
            '    <button type="button" class="btn btn-warning btn-sm btn_modificar_producto" data-producto="'+row_codificado+'"><i class="fa fa-pen"></i></button><br>' +
            '    <button type="button" class="btn btn-danger btn-sm" data-id_producto="'+producto.id+'" ><i class="fa fa-trash"></i></button>' +
            '</td>' +
            '</tr>';
        return html;
    },

    select_catalogo : function(catalogo){
        var html = '';
        $.each(catalogo,function(index,tp){
            html += '<option value="'+tp.id+'">'+tp.nombre+'</option>';
        });
        return html;
    },

    row_nueva_foto : function(){
        var numero_registros = $('#tbody_producto_galeria').find('tr').length;
        return CodHTML.row_html_foto(numero_registros,'');
    },

    row_html_foto : function(id,valor){
        var html_registro_foto = '<tr>' +
            '   <td>' +
            '       <input class="form-control foto_galeria" placeholder="URL de la foto" data-rule-required="true" name="foto_galeria['+id+']" value="'+valor+'">' +
            '   </td>' +
            '   <td class="text-center">' +
            '       <button type="button" class="btn btn-danger btn-sm btn_eliminar_registro"><i class="fa fa-trash"></i></button>' +
            '   </td>' +
            '</tr>';
        return html_registro_foto;
    },

    /**
     * funciones para los clientes admin
     */
    listado_clientes_admin : function(clientes){
        var html = '';
        if(clientes.length == 0){
            html = '<tr><td class="text-center" colspan="4">Sin registros encontrados</td></tr>';
        }else{
            $.each(clientes,function(index, cliente){
                html += CodHTML.registro_cliente_admin(cliente);
            });
        }
        return html;
    },

    registro_cliente_admin : function(cliente){
        var html = '';
        var cliente_codificado = ParseDatos.json_codificado(cliente);
        html += '' +
            '<tr>' +
                '<td>'+cliente.id+'</td>' +
                '<td>'+cliente.nombre+' '+cliente.paterno+' '+cliente.materno+'</td>' +
                '<td>' +
                    'Correo: <span class="badge badge-info">' + cliente.correo+ '</span><br>'+
                    'Teléfono: <span class="badge badge-info">' + cliente.telefono+'</span>'+
                '</td>' +
                '<td>' +
                    'Compras totales: <span class="badge badge-primary">' + cliente.ventas_totales+ '</span><br>'+
                    'Carrito activo: <span class="badge badge-success">'+ cliente.carrito_activo+'</span> <br>'+
                    '<button type="button" class="btn btn-success btn-sm btn_cliente_ventas" data-id_usuario="'+cliente.usuario_id+'" data-cliente="'+cliente_codificado+'"><i class="fa fa-eye"> Compras</i></button>'+
                '</td>' +
            '</tr>';
        return html;
    },

    compras_cliente_admin : function(compras){
        var html = '';
        if(compras.length == 0){
            html = '<tr><td colspan="4" class="text-center">Sin registros encontrados</td></tr>';
        }else{
            $.each(compras,function(index,compra){
                html += CodHTML.registro_compra_cliente_admin(compra);
            });
        }
        return html;
    },

    registro_compra_cliente_admin : function(compra){
        var html_estatus = '';
        if(compra.historia_estatus != undefined && compra.historia_estatus.length > 0){
            $.each(compra.historia_estatus,function(index,estatus){
                var color_badge = '';
                switch (parseInt(estatus.cat_compra_estatus_id)) {
                    case 1 : color_badge = 'warning';break;
                    case 2 : color_badge = 'secondary';break;
                    case 3 : color_badge = 'primary';break;
                    case 4 : color_badge = 'success';break;
                    case 5 : color_badge = 'danger';break;
                    case 6 : color_badge = 'info';break;
                }
                html_estatus += '<li><span class="badge badge-'+color_badge+'">'+estatus.nombre_estatus+'</span> '+estatus.fecha+'</li>';
            });
        }
        var html = '<tr>' +
            '<td>'+CodHTML.fecha_html(compra.fecha_compra)+'</td>' +
            '<td>$'+compra.monto+'</td>' +
            '<td>'+compra.moneda+'</td>' +
            '<td>' +
                '<li>Mensajeria: <span class="badge badge-danger">'+compra.mensajeria+'</span></li>' +
                '<li>Número de guía/Código de rastreo: <span class="badge badge-dark">'+compra.numero_guia+'</span></li>'
                +html_estatus+'' +
            '</td>' +
            '</tr>';
        return html;
    },

    /**
     * funciones para las ventas admin
     */
    listado_ventas_admin : function(ventas){
        var html = '';
        if(ventas.length == 0){
            html = '<tr><td class="text-center" colspan="7">Sin registros encontrados</td></tr>';
        }else{
            $.each(ventas,function(index,venta){
                html += CodHTML.registro_venta_admin(venta);
            });
        }
        return html;
    },

    registro_venta_admin : function(venta){
        var venta_codificado = ParseDatos.json_codificado(venta);
        var html_estatus = '';
        var btn_actualizar_venta = '<button type="button" class="btn btn-danger btn-sm btn_actualizar_venta mt-1" data-id_compra="'+venta.id+'" data-venta="'+venta_codificado+'"><i class="fa fa-file"></i>Actualizar venta</button>';
        if(venta.historia_estatus != undefined && venta.historia_estatus.length > 0){
            $.each(venta.historia_estatus,function(index,estatus){
                var color_badge = '';
                switch (parseInt(estatus.cat_compra_estatus_id)) {
                    case 1 : color_badge = 'warning';break;
                    case 2 : color_badge = 'secondary';break;
                    case 3 : color_badge = 'primary';break;
                    case 4 : color_badge = 'success'; btn_actualizar_venta = ''; break;
                    case 5 : color_badge = 'danger';break;
                    case 6 : color_badge = 'info';break;
                }
                html_estatus += '<li><span class="badge badge-'+color_badge+'">'+estatus.nombre_estatus+'</span> '+estatus.fecha+'</li>';
            });
        }
        var html = '' +
            '<tr>' +
                '<td>'+venta.id+'</td>' +
                '<td>'+venta.folio+'</td>' +
                '<td>'+CodHTML.fecha_html(venta.fecha_compra)+'</td>' +
                '<td>'+venta.cliente+'</td>' +
                '<td>$'+venta.monto+'</td>' +
                '<td>'+venta.moneda+'</td>' +
                '<td>' +
                    '<li>Mensajeria: <span class="badge badge-danger">'+venta.mensajeria+'</span></li>' +
                    '<li>Número de guía/Código de rastreo: <span class="badge badge-dark">'+venta.numero_guia+'</span></li>'
                    +html_estatus+'' +
                '</td>' +
                '<td>' +
                    '<button type="button" class="btn btn-info btn-sm btn_productos_ventas" data-id_compra="'+venta.id+'" data-venta="'+venta_codificado+'"><i class="fa fa-eye"></i>Ver productos</button>' +
                    '' + btn_actualizar_venta +
                '</td>' +
            '</tr>';
        return html;
    },

    listado_productos_venta_admin : function(productos){
        var html = '';
        if(productos.length == 0){
            html = '<tr><td class="text-center" colspan="6">Sin registros encontrados</td></tr>';
        }else{
            $.each(productos,function(index,producto){
                html += CodHTML.registro_producto_venta_admin(producto);
            });
        }
        return html;
    },

    registro_producto_venta_admin : function(producto){
        var imgs = '';
        $.each(producto.galeria_fotos,function(index, img){
            imgs += '<img src="'+img.url_foto+'" class="img-thumbnail" width="75px" alt="'+producto.nombre+'">';
        });
        var html = '' +
            '<tr>' +
            '<td>'+producto.clave_producto+'</td>' +
            '<td>'+producto.nombre+'</td>' +
            '<td>'+producto.descripcion+'</td>' +
            '<td>$'+producto.precio+' MXN</td>' +
            '<td>'+imgs+'</td>' +
            '<td>'+producto.tipo_producto+'</td>' +
            '</tr>';
        return html;
    },

    /**
     * funciones para los productos comprador
     */
    listado : function(productos){
        var html = '';
        $.each(productos,function(index,producto){
            html += CodHTML.tarjeta_producto(producto);
        });
        return html;
    },

    tarjeta_producto : function(producto){
        var url_img = '/assets/img/logo.png';
        var row_codificado = ParseDatos.json_codificado(producto);
        if(producto.galeria_fotos.length > 0){
            url_img = producto.galeria_fotos[0].url_foto;
        }
        var html = '<div class="col-lg-3 col-md-3 col-sm-6 mb-4">' +
            '                            <div class="card"">' +
            '                                <img src="'+url_img+'" data-producto="'+row_codificado+'" class="card-img-top img-fluid img_detalle_producto" alt="'+producto.nombre+'">' +
            '                                <div class="card-body">' +
            '                                    <h5 class="card-title">'+producto.nombre+'</h5>' +
            '                                    <h5 class="card-title">$ '+CodHTML.precio_producto_moneda(producto.precio)+ ' '+ Carrito.moneda_select+'</h5>' +
            '                                    <p class="card-text">'+producto.descripcion+'</p>' +
            '                                    <button type="button" data-id_producto="'+producto.id+'" class="btn btn-sm btn-success agregar_producto_cesta">Agregar<i class="fa fa-shopping-cart"></i></button>' +
            '                                </div>' +
            '                            </div>' +
            '                        </div>';
        return html;
    },

    productos_cesta_detalle : function (productos) {
        var html = '';
        if(productos.length == 0){
            html = 'No cuentas con productos en la cesta';
        }else{
            html += '';
            $.each(productos,function(index,producto){
                html += CodHTML.producto_cesta_detalle(producto);
            });
        }
        return html;
    },

    producto_cesta_detalle : function(producto){
        var img_carrete = '<div id="carreteProductosCesta'+producto.id+'" class="carousel slide" data-ride="carousel">' +
            '<div class="carousel-inner">';
        $.each(producto.galeria_fotos,function(index, img){
            var active = '';
            if(index == 0){
                active = 'active';
            }
            img_carrete += '<div class="carousel-item '+active+'">' +
                    '<img src="'+img.url_foto+'" class="d-block w-100 img-thumbnail" alt="'+producto.nombre+'">' +
                '</div>';
        });
        img_carrete +='<a class="carousel-control-prev" href="#carreteProductosCesta'+producto.id+'" role="button" data-slide="prev">' +
            '            <span class="carousel-control-prev-icon" aria-hidden="true"></span>' +
            '            <span class="sr-only">Previous</span>' +
            '        </a>' +
            '        <a class="carousel-control-next" href="#carreteProductosCesta'+producto.id+'" role="button" data-slide="next">' +
            '            <span class="carousel-control-next-icon" aria-hidden="true"></span>' +
            '            <span class="sr-only">Next</span>' +
            '        </a>' +
            '   </div>' +
            '</div>';
        var html = '' +
            '<div class="carrito_producto" id="carrito_producto_'+producto.id+'">' +
                '<div class="row">' +
                    '<div class="form-group col-lg-3">' +
                        img_carrete +
                    '</div>' +
                    '<div class="form-group col-lg-5">' +
                        '<h5>'+producto.nombre+'</h5>' +
                        '<p>'+producto.descripcion+'</p>' +
                    '</div>' +
                    '<div class="form-group col-lg-4">' +
                        '<div class="row">' +
                            '<div class="form-group col-lg-8">' +
                                '<div class="input-group mb-3">' +
                                    '<div class="input-group-prepend"><button type="button" class="btn btn-secondary btn-sm btn_quitar_producto" data-id_producto="'+producto.id+'"><i class="fa fa-minus"></i></button></div>' +
                                    '<input type="text" class="form-control add_numero_productos text-center" value="'+producto.cantidad_carrito+'" readonly="readonly">' +
                                    '<div class="input-group-append"><button type="button" class="btn btn-secondary btn-sm btn_add_producto" data-id_producto="'+producto.id+'"><i class="fa fa-plus"></i></button></div>' +
                                '</div>' +
                            '</div>' +
                            '<div class="form-group col-lg-4">' +
                                '<button type="button" class="btn btn-sm btn-danger btn_eliminar_producto" data-id_producto="'+producto.id+'"><i class="fa fa-trash"></i></button>' +
                            '</div>' +
                        '</div>' +
                    '</div>' +
                '</div>' +
            '</div>';
        return html;
    },

    precio_producto_moneda : function(precio){
        precio = parseFloat(precio);
        var html = ''+precio.toFixed(2)+'';
        if(Carrito.moneda_select == 'USD'){
            var conversion = precio / Carrito.dolar_peso_mexicano;
            html =  ''+conversion.toFixed(2)+'';
        }if(Carrito.moneda_select == 'EUR'){
            var conversion = (precio / Carrito.dolar_peso_mexicano) * Carrito.dolar_euro;
            html =  ''+conversion.toFixed(2)+'';
        }
        return html;
    },

    listado_direcciones : function(direcciones){
        var html = '';
        if(direcciones.length == 0){
            html = '<span class="badge badge-primary">No cuenta con direcciones registradas</span>';
        }else{
            $.each(direcciones,function(index, direccion){
                html += CodHTML.tarjeta_direccion(direccion);
            });
        }
        return html;
    },

    tarjeta_direccion : function(direccion){
        var parse_direccion = ParseDatos.json_codificado(direccion);
        var html = '<div class="row">' +
            '<div class="form-group col-lg-4 col-md-4 col-sm-6 mb-4">' +
                '<div class="card"">' +
                    '<div class="card-header">' +
                        '<div class="row">' +
                        '</div>' +
                    '</div>' +
                    '<div class="card-body">' +
                        '<li><strong>Recibe: </strong>'+direccion.quien_recibe+'</li>' +
                        '<li><strong>Dirección: </strong>'+direccion.calle+' #'+direccion.numero_ext+ ' - INT: '+direccion.numero_int+'</li>' +
                        '<li>'+direccion.localidad+', '+direccion.municipio+', '+direccion.estado+ ', CP: '+direccion.codigo_postal+'</li>' +
                        '<li><strong>Referencias: </strong>'+direccion.referencias+'</li>' +
                        '<div class="row">' +
                            '<div class="form-group col-lg-12 text-right">' +
                                '<button type="button" data-id_direccion="'+direccion.id+'" data-direccion="'+parse_direccion+'" class="btn btn-sm btn-success btn_modal_direccio">Modificar <i class="fa fa-edit"></i></button>' +
                            '</div>' +
                        '</div>' +
                    '</div>' +
                '</div>' +
            '</div></div>';
        return html;
    },

    listado_direcciones_envio : function (direcciones){
        var html = '<div class="form-group">';
        $.each(direcciones,function(index, direccion){
            html += '' +
                '<div class="custom-control custom-radio">' +
                    '<input type="radio" id="direccion_envio_'+direccion.id+'" name="direccion_envio" class="custom-control-input direccion_envio_checked" ' +
                        'value="'+direccion.id+'" data-rule-required="true">' +
                    '<label class="custom-control-label" for="direccion_envio_'+direccion.id+'">'+direccion.calle+' #'+direccion.numero_ext+ ' - INT: '+direccion.numero_int + '' +
                        ' '+ direccion.localidad+', '+direccion.municipio+', '+direccion.estado+ ', CP: '+direccion.codigo_postal+'</label>' +
                '</div>';
        })
        html += '</div>';
        return html;
    },

    listado_ventas_comprador : function(ventas){
        var html = '';
        if(ventas.length == 0){
            html = '<tr><td class="text-center" colspan="7">Sin registros encontrados</td></tr>';
        }else{
            $.each(ventas,function(index,venta){
                html += CodHTML.registro_venta_comprador(venta);
            });
        }
        return html;
    },

    registro_venta_comprador : function(venta){
        var venta_codificado = ParseDatos.json_codificado(venta);
        var html_estatus = '';
        if(venta.historia_estatus != undefined && venta.historia_estatus.length > 0){
            $.each(venta.historia_estatus,function(index,estatus){
                var color_badge = '';
                switch (parseInt(estatus.cat_compra_estatus_id)) {
                    case 1 : color_badge = 'warning';break;
                    case 2 : color_badge = 'secondary';break;
                    case 3 : color_badge = 'primary';break;
                    case 4 : color_badge = 'success'; btn_actualizar_venta = ''; break;
                    case 5 : color_badge = 'danger';break;
                    case 6 : color_badge = 'info';break;
                }
                html_estatus += '<li><span class="badge badge-'+color_badge+'">'+estatus.nombre_estatus+'</span> '+estatus.fecha+'</li>';
            });
        }
        var html = '' +
            '<tr>' +
            '<td>'+venta.id+'</td>' +
            '<td>'+venta.folio+'</td>' +
            '<td>'+CodHTML.fecha_html(venta.fecha_compra)+'</td>' +
            '<td>$'+venta.monto+'</td>' +
            '<td>'+venta.moneda+'</td>' +
            '<td>' +
            '<li>Mensajeria: <span class="badge badge-danger">'+venta.mensajeria+'</span></li>' +
            '<li>Número de guía/Código de rastreo: <span class="badge badge-dark">'+venta.numero_guia+'</span></li>'
            +html_estatus+'' +
            '</td>' +
            '<td>' +
            '<button type="button" class="btn btn-info btn-sm btn_productos_compras" data-id_compra="'+venta.id+'" data-venta="'+venta_codificado+'"><i class="fa fa-eye"></i>Ver productos</button>' +
            '</td>' +
            '</tr>';
        return html;
    },

}