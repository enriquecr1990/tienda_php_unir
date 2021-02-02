<?php

require_once '../helpers/validaciones.php';
require_once '../model/UsuarioModel.php';

class UsuarioController {

    private $usuarioModel;

    function __construct()
    {
        $this->usuarioModel = new UsuarioModel();
    }

    public function registroComprador($data){
        $response = array();
        try{
            $validaciones = Validaciones::validarFormUsuario($data);
            if($validaciones['status']){
                $data['tipo_usuario'] = 'comprador';
                $usuarioNuevo = $this->usuarioModel->registrarUsuario($data);
                if($usuarioNuevo){
                    $this->usuarioModel->registrarDataUsuarioNuevo($usuarioNuevo->id,$data['usuario']);
                    $response['status'] = true;
                    $response['msg'][] = 'Se registro su cuenta con exito';
                    $response['data']['usuario'] = $usuarioNuevo;
                    $response['data']['data_usuario'] = $this->usuarioModel->getDataUsuario($data['usuario']);
                }else{
                    $response['status'] = false;
                    $response['msg'] = $this->usuarioModel->getMsg();
                }
            }else{
                $response['status'] = false;
                $response['msg'] = $validaciones['msg'];
            }
        }catch (Exception $ex){
            $response['status'] = false;
            $response['msg'][] = 'No se pudo registrar su cuenta, favor de intentar más tarde';
            $response['msg'][] = $ex->getMessage();
        }
        echo json_encode($response);
    }

    public function clientes($parametros){
        $response = array();
        try{
            $clientes = $this->usuarioModel->getClientes($parametros);
            $response['status'] = true;
            $response['msg'][] = '';
            $response['data'] = $clientes;
        }catch (Exception $ex){
            $response['status'] = false;
            $response['msg'][] = 'No es posible obtener los clientes en este momento, favor de intentar mas tarde';
        }
        echo json_encode($response);
    }

    public function comprasCliente($data){
        $response = array();
        try{
            $compras = $this->usuarioModel->getComprasCliente($data['id_usuario']);
            $response['status'] = true;
            $response['msg'][] = '';
            $response['data'] = $compras;
        }catch (Exception $ex){
            $response['status'] = false;
            $response['msg'][] = 'No es posible obtener las compras del cliente seleccionado, favor de intentar mas tarde';
        }
        echo json_encode($response);
    }

    public function obtenerDireccionesCliente($idDataUsuario){
        $response = array();
        try{
            $direcciones = $this->usuarioModel->obtenerDireccionesUsuario($idDataUsuario);
            $response['status'] = true;
            $response['msg'][] = 'Se obtuvieron las direcciones del usuario con exito';
            $response['data'] = $direcciones;
        }catch (Exception $ex){
            $response['status'] = false;
            $response['msg'][] = 'No es posible obtener los clientes en este momento, favor de intentar mas tarde';
        }
        echo json_encode($response);
    }

    public function registrarDireccionCliente($data){
        $response = array();
        try{
            $direccion = $this->usuarioModel->insertarDireccionUsuario($data);
            if($direccion){
                $response['status'] = true;
                $response['msg'][] = 'Se registro la direccion con exito';
            }else{
                $response['status'] = false;
                $response['msg'][] = 'No es posible guardar la dirección del cliente, favor de intentar más tarde';
            }
        }catch (Exception $ex){
            $response['status'] = false;
            $response['msg'][] = 'No es posible obtener los clientes en este momento, favor de intentar mas tarde';
        }
        echo json_encode($response);
    }

    public function actualizarDireccionCliente($data){
        $response = array();
        try{
            $direccion = $this->usuarioModel->actualizarDireccionUsuario($data);
            if($direccion){
                $response['status'] = true;
                $response['msg'][] = 'Se registro la direccion con exito';
            }else{
                $response['status'] = false;
                $response['msg'][] = 'No es posible guardar la dirección del cliente, favor de intentar más tarde';
            }
        }catch (Exception $ex){
            $response['status'] = false;
            $response['msg'][] = 'No es posible obtener los clientes en este momento, favor de intentar mas tarde';
        }
        echo json_encode($response);
    }

    public function eliminarDireccionCliente($data){
        $response = array();
        try{
            $direccion = $this->usuarioModel->eliminarDireccionUsuario($data['id_direccion']);
            if($direccion){
                $response['status'] = true;
                $response['msg'][] = 'Se registro la direccion con exito';
            }else{
                $response['status'] = false;
                $response['msg'][] = 'No es posible guardar la dirección del cliente, favor de intentar más tarde';
            }
        }catch (Exception $ex){
            $response['status'] = false;
            $response['msg'][] = 'No es posible obtener los clientes en este momento, favor de intentar mas tarde';
        }
        echo json_encode($response);
    }

}