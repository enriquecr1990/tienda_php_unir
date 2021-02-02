<?php

require_once '../model/CatalogosModel.php';

class CatalogosController{

    private $catModel;

    function __construct(){
        $this->catModel = new CatalogosModel();
    }

    public function estados(){
        try{
            $estados = $this->catModel->estado();
            echo json_encode(['status' => true,'data' => $estados]);
        }catch (Exception $ex){
            echo json_encode(
                [
                    'status' => false,
                    'msg' => ['No se pudo obtener los estados']
                ]
            );
        }
    }

    public function municipios($idEstado){
        try{
            $municipios = $this->catModel->municipio($idEstado);
            echo json_encode(['status' => true,'data' => $municipios]);
        }catch (Exception $ex){
            echo json_encode(
                [
                    'status' => false,
                    'msg' => ['No se pudo obtener los estados']
                ]
            );
        }
    }

    public function localidades($idMunicipio){
        try{
            $localidades = $this->catModel->localidad($idMunicipio);
            echo json_encode(['status' => true,'data' => $localidades]);
        }catch (Exception $ex){
            echo json_encode(
                [
                    'status' => false,
                    'msg' => ['No se pudo obtener los estados']
                ]
            );
        }
    }

    public function tipoProducto(){
        try{
            $tipo_producto = $this->catModel->tipoProducto();
            echo json_encode(['status' => true,'data' => $tipo_producto]);
        }catch (Exception $ex){
            echo json_encode(
                [
                    'status' => false,
                    'msg' => ['No se pudo obtener los estados']
                ]
            );
        }
    }

    public function estatusCompra(){
        try{
            $estatus_compra = $this->catModel->estatusCompra();
            echo json_encode(['status' => true,'data' => $estatus_compra]);
        }catch (Exception $ex){
            echo json_encode(
                [
                    'status' => false,
                    'msg' => ['No se pudo obtener los estados']
                ]
            );
        }
    }

}