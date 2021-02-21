<?php

require_once '../controller/UploadsController.php';

$uploadsController = new UploadsController();

$peticion = $_GET['name'];
$data = $_POST;
switch ($peticion){
    case 'imagenes':
        $uploadsController->imagenes();
        break;
    default:
        echo json_encode(array(
            'status' => false,
            'msg' => ['Petición no encontrada']
        ));
        break;
}