$(document).ready(function(){

    $(document).on('click','#menu_inicio',function(){
        $('#menuTiendaEcommerse').find('a.active').removeClass('active');
        $('#menu_inicio').addClass('active');
        $('#contenedor_login_comprador').fadeOut();
        $('#contenedor_slider_promociones').fadeIn();
        $('#contenedor_productos_comprador').fadeIn();
        $('#contenedor_quienes_somos').fadeOut();
        $('#contenedor_contacto').fadeOut();
        $('#contenedor_carrito').fadeOut();
        $('#contenedor_mis_datos_comprador').fadeOut();
        $('#contenedor_mis_compras').fadeOut();
        Productos.listado({});
    });

    $(document).on('click','#menu_comprador_ropa',function(){
        $('#menuTiendaEcommerse').find('a.active').removeClass('active');
        $('#menu_comprador_ropa').addClass('active');
        $('#contenedor_login_comprador').fadeOut();
        $('#contenedor_slider_promociones').fadeOut();
        $('#contenedor_productos_comprador').fadeIn();
        $('#contenedor_quienes_somos').fadeOut();
        $('#contenedor_contacto').fadeOut();
        $('#contenedor_carrito').fadeOut();
        $('#contenedor_mis_datos_comprador').fadeOut();
        $('#contenedor_mis_compras').fadeOut();
        Productos.listado({cat_tipo_producto : 1});
    });

    $(document).on('click','#menu_comprador_tennis',function(){
        $('#menuTiendaEcommerse').find('a.active').removeClass('active');
        $('#menu_comprador_tennis').addClass('active');
        $('#contenedor_login_comprador').fadeOut();
        $('#contenedor_slider_promociones').fadeOut();
        $('#contenedor_productos_comprador').fadeIn();
        $('#contenedor_quienes_somos').fadeOut();
        $('#contenedor_contacto').fadeOut();
        $('#contenedor_carrito').fadeOut();
        $('#contenedor_mis_datos_comprador').fadeOut();
        $('#contenedor_mis_compras').fadeOut();
        Productos.listado({cat_tipo_producto : 2});
    });

    $(document).on('click','#menu_comprador_balones',function(){
        $('#menuTiendaEcommerse').find('a.active').removeClass('active');
        $('#menu_comprador_balones').addClass('active');
        $('#contenedor_login_comprador').fadeOut();
        $('#contenedor_slider_promociones').fadeOut();
        $('#contenedor_productos_comprador').fadeIn();
        $('#contenedor_quienes_somos').fadeOut();
        $('#contenedor_contacto').fadeOut();
        $('#contenedor_carrito').fadeOut();
        $('#contenedor_mis_datos_comprador').fadeOut();
        $('#contenedor_mis_compras').fadeOut();
        Productos.listado({cat_tipo_producto : 3});
    });

    $(document).on('click','#menu_quienes_somos',function(){
        $('#menuTiendaEcommerse').find('a.active').removeClass('active');
        $('#menu_quienes_somos').addClass('active');
        $('#contenedor_login_comprador').fadeOut();
        $('#contenedor_slider_promociones').fadeOut();
        $('#contenedor_productos_comprador').fadeOut()
        $('#contenedor_quienes_somos').fadeIn();
        $('#contenedor_contacto').fadeOut();
        $('#contenedor_carrito').fadeOut();
        $('#contenedor_mis_datos_comprador').fadeOut();
        $('#contenedor_mis_compras').fadeOut();
    });

    $(document).on('click','#menu_contacto',function(){
        $('#menuTiendaEcommerse').find('a.active').removeClass('active');
        $('#menu_contacto').addClass('active');
        $('#contenedor_login_comprador').fadeOut();
        $('#contenedor_slider_promociones').fadeOut();
        $('#contenedor_productos_comprador').fadeOut()
        $('#contenedor_quienes_somos').fadeOut();
        $('#contenedor_contacto').fadeIn();
        $('#contenedor_carrito').fadeOut();
        $('#contenedor_mis_datos_comprador').fadeOut();
        $('#contenedor_mis_compras').fadeOut();
    });

    $(document).on('click','#lnk_login_comprador',function(){
        $('#menuTiendaEcommerse').find('a.active').removeClass('active');
        $('#lnk_login_comprador').addClass('active');
        $('#contenedor_login_comprador').fadeIn();
        $('#contenedor_slider_promociones').fadeOut();
        $('#contenedor_productos_comprador').fadeOut();
        $('#contenedor_quienes_somos').fadeOut();
        $('#contenedor_contacto').fadeOut();
        $('#contenedor_carrito').fadeOut();
        $('#contenedor_mis_datos_comprador').fadeOut();
        $('#contenedor_mis_compras').fadeOut();
    });

    $(document).on('click','#lnk_carrito_comprador',function(){
        $('#menuTiendaEcommerse').find('a.active').removeClass('active');
        $('#lnk_carrito_comprador').addClass('active');
        $('#contenedor_login_comprador').fadeOut();
        $('#contenedor_slider_promociones').fadeOut();
        $('#contenedor_productos_comprador').fadeOut();
        $('#contenedor_quienes_somos').fadeOut();
        $('#contenedor_contacto').fadeOut();
        $('#contenedor_carrito').fadeIn();
        $('#contenedor_mis_datos_comprador').fadeOut();
        $('#contenedor_mis_compras').fadeOut();
        Carrito.carrito_cesta_detalle();
    });

    $(document).on('click','#lnk_mis_compras',function(){
        $('#menuTiendaEcommerse').find('a.active').removeClass('active');
        $('#lnk_mis_compras').addClass('active');
        $('#contenedor_login_comprador').fadeOut();
        $('#contenedor_slider_promociones').fadeOut();
        $('#contenedor_productos_comprador').fadeOut();
        $('#contenedor_quienes_somos').fadeOut();
        $('#contenedor_contacto').fadeOut();
        $('#contenedor_carrito').fadeOut();
        $('#contenedor_mis_datos_comprador').fadeOut();
        $('#contenedor_mis_compras').fadeIn();
        Compra.listado();
    });

    $(document).on('click','#lnk_datos_comprador',function(){
        $('#menuTiendaEcommerse').find('a.active').removeClass('active');
        $('#lnk_datos_comprador').addClass('active');
        $('#contenedor_login_comprador').fadeOut();
        $('#contenedor_slider_promociones').fadeOut();
        $('#contenedor_productos_comprador').fadeOut();
        $('#contenedor_quienes_somos').fadeOut();
        $('#contenedor_contacto').fadeOut();
        $('#contenedor_carrito').fadeOut();
        $('#contenedor_mis_datos_comprador').fadeIn();
        $('#contenedor_mis_compras').fadeOut();
    });

});