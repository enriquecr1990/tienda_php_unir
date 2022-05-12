<?php
mb_internal_encoding("UTF-8");

session_cache_expire(30); //expirar la sesion en 30 minutos
session_start();
require_once '../controller/LoginAdminController.php';

$loginAdmin = new LoginAdminController();

$peticion = $_GET['name'];
$data = $_POST;
switch ($peticion){
    case 'login':
        $loginAdmin->login($data);
        break;
    case'valida_login' :
        $loginAdmin->validarLogin();
        break;
    case 'logout':
        $loginAdmin->logout();
        break;
    default:
        echo json_encode(array(
            'status' => false,
            'msg' => ['Petición no encontrada']
        ));
        break;
}