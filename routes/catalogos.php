<?php

require_once '../controller/CatalogosController.php';

$catalogos = new CatalogosController();

$peticion = $_GET['name'];
$id = isset($_GET['id_search']) ? $_GET['id_search'] : '';
switch ($peticion){
    case 'estados':
        $catalogos->estados();
        break;
    case 'municipios':
        $catalogos->municipios($id);
        break;
    case 'localidades':
        $catalogos->localidades($id);
        break;
    case 'tipo_producto':
        $catalogos->tipoProducto();
        break;
    case 'estatus_compra':
        $catalogos->estatusCompra();
        break;
    default:
        echo json_encode(array(
           'status' => false,
           'msg' => ['Petición no encontrada']
        ));
        break;
}