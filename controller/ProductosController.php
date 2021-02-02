<?php

require_once '../helpers/validaciones.php';
require_once '../model/ProductosModel.php';

class ProductosController {

    private $productosModel;

    function __construct()
    {
        $this->productosModel = new ProductosModel();
    }

    public function listaProductos($data){
        $response = array();
        try{
            $productos = $this->productosModel->obtenerProductos($data);
            $response['status'] = true;
            $response['msg'][] = 'Se obtuvo el listado de productos con exito';
            $response['data'] = $productos;
        }catch (Exception $ex){
            $response['status'] = false;
            $response['msg'][] = 'No se pudo obtener los productos del sistema, favor de intentar más tarde';
        }
        echo json_encode($response);
    }

    public function guardar($data){
        $response = array();
        try{
            $validacion = Validaciones::validarFormProducto($data);
            if($validacion['status']){
                $guardar = $this->productosModel->guardarProducto($data);
                if($guardar){
                    $response['status'] = true;
                    $response['msg'][] = 'Se guardo el producto con éxito';
                }else{
                    $response['status'] = false;
                    $response['msg'][] = 'No fue posible guardar el producto, intente nuevamente';
                }
            }else{
                $response['status'] = false;
                $response['msg'] = $validacion['msg'];
            }
        }catch (Exception $ex){
            $response['status'] = false;
            $response['msg'][] = 'No se pudo guardar el producto en el sistema, favor de intentar más tarde';
        }
        echo json_encode($response);
    }

    public function ventas($parametros){
        $response = array();
        try{
            $ventas = $this->productosModel->ventas($parametros);
            $response['status'] = true;
            $response['msg'][] = '';
            $response['data'] = $ventas;
        }catch (Exception $ex){
            $response['status'] = false;
            $response['msg'][] = 'No se pudo cargar las ventas de productos, favor de intentar más tarde';
        }
        echo json_encode($response);
    }

    public function productosVenta($parametros){
        $response = array();
        try{
            $productos = $this->productosModel->productosVenta($parametros['id_compra']);
            $response['status'] = true;
            $response['msg'][] = '';
            $response['data'] = $productos;
        }catch (Exception $ex){
            $response['status'] = false;
            $response['msg'][] = 'No se pudo cargar los productos de la venta, favor de intentar más tarde';
        }
        echo json_encode($response);
    }

    public function actualizarVenta($data){
        $response = array();
        try{
            $validacion = Validaciones::validarFormActualizarVenta($data);
            if($validacion['status']){
                $actualizar = $this->productosModel->actualizarVenta($data);
                if($actualizar){
                    $response['status'] = true;
                    $response['msg'][] = 'Se actualizó la venta con éxito';
                }else{
                    $response['status'] = false;
                    $response['msg'][] = 'No fue posible actualizar la venta, intente nuevamente';
                }
            }else{
                $response['status'] = false;
                $response['msg'] = $validacion['msg'];
            }
        }catch (Exception $ex){
            $response['status'] = false;
            $response['msg'][] = 'No se pudo actualizar la venta, favor de intentar más tarde';
        }
        echo json_encode($response);
    }

}