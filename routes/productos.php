<?php

require_once '../controller/ProductosController.php';

$productosController = new ProductosController();

$peticion = $_GET['name'];
$data = $_POST;
switch ($peticion){
    case 'listado':
        $productosController->listaProductos($data);
        break;
    case 'guardar':
        $productosController->guardar($data);
        break;
    case 'ventas' :
        $productosController->ventas($data);
        break;
    case 'productos_venta':
        $productosController->productosVenta($data);
        break;
    case 'actualizar_venta':
        $productosController->actualizarVenta($data);
        break;
    default:
        echo json_encode(array(
            'status' => false,
            'msg' => ['Petición no encontrada']
        ));
        break;
}