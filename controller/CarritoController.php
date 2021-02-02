<?php

require_once '../model/CarritoModel.php';
require_once '../model/ProductosModel.php';

class CarritoController{

    private $carritoModel;
    private $productoModel;

    function __construct(){
        $this->carritoModel = new CarritoModel();
        $this->productoModel = new ProductosModel();
    }

    public function obtenerProductosCesta(){
        $response = array();
        try{
            $cesta = new stdClass();
            $cesta->total_productos = 0;
            $cesta->subtotal = 0;
            $cesta->impuesto = 0;
            $cesta->total = 0;
            $cesta->productos = array();
            //validamos si existe la sesión del usuario para poder almacenar en la BD el carrito
            if(isset($_SESSION['data_usuario_comprador']) && is_object($_SESSION['data_usuario_comprador'])){
                $carrito = $this->carritoModel->carritoCesta($_SESSION['data_usuario_comprador']->usuario_id);
                foreach ($carrito as $registro){
                    $cesta->total_productos += (int)$registro->cantidad;
                    $producto_carrito = $this->productoModel->obtenerProductoId($registro->producto_id);
                    $producto_carrito->cantidad_carrito = $registro->cantidad;
                    $cesta->subtotal +=  (int)$registro->cantidad * (float)$producto_carrito->precio;
                    $cesta->productos[] = $producto_carrito;
                }
                $cesta->impuesto = $cesta->subtotal * 0.16;
                $cesta->envio = $this->calcularEnvioNumeroProductos($cesta->total_productos);
                $cesta->total = $cesta->subtotal + $cesta->impuesto + $cesta->envio;
                $response['status'] = true;
                $response['msg'][] = 'Se obtuvieron los productos de la Cesta';
                $response['data'] = $cesta;
            }else{
                //si no existe la sesion, almacenaremos temporalmente en una variable de sesión los productos agregados a la cesta
                if(isset($_SESSION['cesta_productos']) && is_array($_SESSION['cesta_productos'])){
                    foreach ($_SESSION['cesta_productos'] as $id_producto => $registro){
                        $cesta->total_productos = $cesta->total_productos + (int)$registro['cantidad'];
                        $producto_carrito = $this->productoModel->obtenerProductoId($id_producto);
                        $producto_carrito->cantidad_carrito = $registro['cantidad'];
                        $cesta->subtotal +=  (int)$registro['cantidad'] * (float)$producto_carrito->precio;
                        $cesta->productos[] = $producto_carrito;
                    }
                    $cesta->impuesto = $cesta->subtotal * 0.16;
                    $cesta->envio = $this->calcularEnvioNumeroProductos($cesta->total_productos);
                    $cesta->total = $cesta->subtotal + $cesta->impuesto + $cesta->envio;
                    $response['status'] = true;
                    $response['msg'][] = 'Se obtuvieron los productos de la Cesta';
                    $response['data'] = $cesta;
                }else{
                    $response['status'] = true;
                    $response['msg'][] = 'No hay productos agregados en la cesta';
                    $cesta->total_productos = 0;
                    $cesta->productos = array();
                    $response['data'] = $cesta;
                }
            }
        }catch (Exception $ex){
            $response['status'] = false;
            $response['msg'][] = 'Ocurrio un error al agregar el producto a la cesta';
        }
        echo json_encode($response);
    }

    public function agregarProductoCesta($data){
        $response = array();
        try{
            $operacion = $data['cantidad'] < 1 ? 'quitó' : 'agregó';
            //validamos si existe la sesión del usuario para poder almacenar en la BD el carrito
            if(isset($_SESSION['data_usuario_comprador']) && is_object($_SESSION['data_usuario_comprador'])){
                //almacenaremos los productos que existan en la sesion si no habia login y eliminamos la variable temporal usada en la sesion
                $data['usuario_id'] = $_SESSION['data_usuario_comprador']->usuario_id;
                if(isset($_SESSION['cesta_productos']) && is_array($_SESSION['cesta_productos'])){
                    foreach ($_SESSION['cesta_productos'] as $id_producto => $cantidad){
                        $data_producto['id_producto'] = $id_producto;
                        $data_producto['usuario_id'] = $_SESSION['data_usuario_comprador']->usuario_id;
                        $data_producto['cantidad'] = $cantidad;
                        $this->carritoModel->agregarProducto($data_producto);
                    }
                    unset($_SESSION['cesta_productos']);
                }
                $agregar = $this->carritoModel->agregarProducto($data);
                if($agregar){
                    $response['status'] = true;
                    $response['msg'][] = 'Se '.$operacion.' el producto con exito';
                }else{
                    $response['status'] = false;
                    $response['msg'][] = 'No fue posible '.$operacion.' el productos, favor de intentar más tarde';
                }
            }else{
                //si no existe la sesion, almacenaremos temporalmente en una variable de sesión los productos agregados a la cesta
                if(isset($_SESSION['cesta_productos']) && is_array($_SESSION['cesta_productos'])){
                    $cantidad = isset($_SESSION['cesta_productos'][$data['id_producto']]) ? $_SESSION['cesta_productos'][$data['id_producto']]['cantidad'] : 0;
                    $cantidad += (int)$data['cantidad'];
                    $_SESSION['cesta_productos'][$data['id_producto']]['cantidad'] = $cantidad;
                }else{
                    $_SESSION['cesta_productos'] = array();
                    $_SESSION['cesta_productos'][$data['id_producto']]['cantidad'] = $data['cantidad'];
                }
                $response['status'] = true;
                $response['msg'][] = 'Se '.$operacion.' el producto con exito';
            }

        }catch (Exception $ex){
             $response['status'] = false;
             $response['msg'][] = 'Ocurrio un error al '.$operacion.' el producto a la cesta';
        }
        echo json_encode($response);
    }

    public function eliminarProductoCesta($data){
        $response = array();
        try{
            //validamos si existe la sesión del usuario para poder almacenar en la BD el carrito
            if(isset($_SESSION['data_usuario_comprador']) && is_object($_SESSION['data_usuario_comprador'])){
                $data['usuario_id'] = $_SESSION['data_usuario_comprador']->usuario_id;
                if($this->carritoModel->eliminarProductoCesta($data)){
                    $response['status'] = true;
                    $response['msg'][] = 'Se eliminó el producto de la cesta con exito';
                }else {
                    $response['status'] = false;
                    $response['msg'][] = 'No fue posible eliminar el producto de la cesta, favor de intentar más tarde';
                }
            }else{
                //si no existe la sesion, almacenaremos temporalmente en una variable de sesión los productos agregados a la cesta
                if(isset($_SESSION['cesta_productos'][$data['producto_id']])){
                    unset($_SESSION['cesta_productos'][$data['producto_id']]);
                    $response['status'] = true;
                    $response['msg'][] = 'Se eliminó el producto con exito';
                }else {
                    $response['status'] = false;
                    $response['msg'][] = 'No fue posible eliminar el producto de la cesta, favor de intentar más tarde';
                }
            }
        }catch (Exception $ex){
            $response['status'] = false;
            $response['msg'][] = 'Ocurrio un error al eliminar el producto a la cesta';
        }
        echo json_encode($response);
    }

    public function prepararSesionCompra($data){
        $response = array();
        try{
            if(!isset($_SESSION['compra']) || $_SESSION['compra'] == false){
                $data['fecha_compra'] = date('Y-m-d H:i:s');
                $data['folio'] = 'ECR-'.date('Ymd-His');
                $data['usuario_id'] = $_SESSION['data_usuario_comprador']->usuario_id;
                $this->carritoModel->registrarCompra($data);
                $compra = $this->carritoModel->obtenerCompraFolio($data['folio']);
                $_SESSION['compra'] = $compra;
                $response['status'] = true;
                $response['msg'][] = 'Se almaceno en sesión lo de la compra para proceder al pago';
                $response['data'] = $_SESSION['compra'];
            }else{
                $this->carritoModel->actualizarCompraFolio($_SESSION['compra']->folio,$data);
                $compra = $this->carritoModel->obtenerCompraFolio($_SESSION['compra']->folio);
                $_SESSION['compra'] = $compra;
            }
            $response['status'] = true;
            $response['msg'][] = 'Se almaceno en sesión lo de la compra para proceder al pago';
            $response['data'] = $_SESSION['compra'];
        }catch (Exception $ex){
            $response['status'] = false;
            $response['msg'][] = 'Ocurrio un error al preparar el formulario de pago, intentar más tarde';
        }
        echo json_encode($response);
    }

    public function prepararComprarPago($data){
        $response = array();
        try{
            $clv_encriptacion = '87401456';
            $data_cecabank['MerchantID'] = '082108630';
            $data_cecabank['AcquirerBIN'] = '0000554002';
            $data_cecabank['TerminalID'] = '00000003';
            //$data_cecabank['Num_operacion'] = 'ECR-'.date('Ymd-His');
            $data_cecabank['Num_operacion'] = $data['Num_operacion'].'-'.rand(0,9999);
            $cadenaCifrar = $clv_encriptacion . $data_cecabank['MerchantID'] . $data_cecabank['AcquirerBIN'] . $data_cecabank['TerminalID']
                . $data_cecabank['Num_operacion'] . $data['Importe'] . $data['TipoMoneda'] . '2' . 'SHA2' . $data['URL_OK'] . $data['URL_NOK'];
            $cadenaCifrada = hash('sha256',$cadenaCifrar);
            $data_cecabank['Firma'] = $cadenaCifrada;
            $response['status'] = true;
            $response['msg'][] = 'Se obtuvieron los datos para el formulario de cecabank';
            $response['data'] = $data_cecabank;
            //como ya ocurrio lo de la sesion
        }catch (Exception $ex){
            $response['status'] = false;
            $response['msg'][] = 'Ocurrio un error al preparar el formulario de pago, intentar más tarde';
        }
        echo json_encode($response);
    }

    public function actualizarCompraPago($data){
        $response = array();
        try{
            $folio = $_SESSION['compra']->folio;
            $this->carritoModel->registrarCompraEstatus($folio,$data['estatus_id']);
            if($data['estatus_id'] == 1){
                //se ha pagado la compra hay que vaciar la cesta y registrar los productos de la compra
                $carrito = $this->carritoModel->carritoCesta($_SESSION['data_usuario_comprador']->usuario_id);
                $compra = $this->carritoModel->obtenerCompraFolio($folio);
                foreach ($carrito as $registro){
                    $insert_compra_producto['cantidad'] = $registro->cantidad;
                    $insert_compra_producto['producto_id'] = $registro->producto_id;
                    $insert_compra_producto['compra_id'] = $compra->id;
                    $this->carritoModel->insertarCompraProducto($insert_compra_producto);
                }
                //eliminamos el carrito que ya fue pagado
                $eliminar_producto_cesta['usuario_id'] = $_SESSION['data_usuario_comprador']->usuario_id;
                $this->carritoModel->eliminarProductoCesta($eliminar_producto_cesta);
            }
        }catch (Exception $ex){
            $response['status'] = false;
            $response['msg'][] = 'Ocurrio un error al preparar el formulario de pago, intentar más tarde';
        }
        echo json_encode($response);
    }

    private function calcularEnvioNumeroProductos($numProductos){
        $envio = 180;
        if($numProductos > 1){
            $envio = 150;
        }if($numProductos > 3){
            $envio = 130;
        }if($numProductos > 5){
            $envio = 100;
        }if($numProductos > 7){
            $envio = 70;
        }if($numProductos > 9 || $numProductos == 0){
            $envio = 0;
        }
        return $envio;
    }

}