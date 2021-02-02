<?php
session_start();
session_cache_expire(30); //expirar la sesion en 30 minutos
require_once '../controller/UsuarioController.php';

$usuarioController = new UsuarioController();

$peticion = $_GET['name'];
$data = $_POST;
switch ($peticion){
    case 'registro_comprador':
        $usuarioController->registroComprador($data);
        break;
    case 'clientes':
        $usuarioController->clientes($data);
        break;
    case 'compras_cliente':
        $usuarioController->comprasCliente($data);
        break;
    case 'obtener_direcciones':
        $usuarioController->obtenerDireccionesCliente($data['id_data_usuario']);
        break;
    case 'agregar_direccion':
        $usuarioController->registrarDireccionCliente($data);
        break;
    case 'actualizar_direccion':
        $usuarioController->actualizarDireccionCliente($data);
        break;
    case 'eliminar_direccion':
        $usuarioController->eliminarDireccionCliente($data);
        break;
    default:
        echo json_encode(array(
            'status' => false,
            'msg' => ['Petición no encontrada']
        ));
        break;
}