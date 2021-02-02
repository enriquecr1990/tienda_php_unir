<?php
session_start();
session_cache_expire(30); //expirar la sesion en 30 minutos
require_once '../controller/CarritoController.php';

$carritoController = new CarritoController();

$peticion = $_GET['name'];
$data = $_POST;
switch ($peticion){
    case 'productos_cesta':
        $carritoController->obtenerProductosCesta();;
        break;
    case 'agregar_producto':
        $carritoController->agregarProductoCesta($data);
        break;
    case 'eliminar_producto':
        $carritoController->eliminarProductoCesta($data);
        break;
    case 'preparar_sesion_compra':
        $carritoController->prepararSesionCompra($data);
        break;
    case 'preparar_comprar_pago':
        $carritoController->prepararComprarPago($data);
        break;
    case 'actualizar_compra':
        $carritoController->actualizarCompraPago($data);
        break;
    default:
        echo json_encode(array(
            'status' => false,
            'msg' => ['Petición no encontrada']
        ));
        break;
}