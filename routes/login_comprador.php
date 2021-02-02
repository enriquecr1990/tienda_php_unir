<?php
session_start();
session_cache_expire(30); //expirar la sesion en 30 minutos
require_once '../controller/LoginCompradorController.php';

$loginComprador = new LoginCompradorController();

$peticion = $_GET['name'];
$data = $_POST;
switch ($peticion){
    case 'login':
        $loginComprador->login($data);
        break;
    case'valida_login' :
        $loginComprador->validarLogin();
        break;
    case 'logout':
        $loginComprador->logout();
        break;
    case 'actualizar_comprador':
        $loginComprador->actualizarComprador($data);
        break;
    default:
        echo json_encode(array(
            'status' => false,
            'msg' => ['Petición no encontrada']
        ));
        break;
}