<?php

require_once '../helpers/validaciones.php';
require_once '../model/UsuarioModel.php';

class LoginCompradorController {

    private $usuarioModel;

    function __construct()
    {
        $this->usuarioModel = new UsuarioModel();
    }

    public function login($data){
        $response = array();
        try {
            $validaciones = Validaciones::validarFormUsuario($data);
            if($validaciones['status']){
                $login = $this->usuarioModel->login($data);
                if($login){
                    $dataUsuario = $this->usuarioModel->getDataUsuario($data['usuario']);
                    $_SESSION['data_usuario_comprador'] = $dataUsuario;
                    $response['status'] = true;
                    $response['msg'][] = 'Inicio de sessión correcto, Bienvenido a la tienda';
                    $response['data'] = $dataUsuario;
                }else{
                    $response['status'] = false;
                    $response['msg'][] = $this->usuarioModel->getMsg();
                }
            }else{
                $response['status'] = false;
                $response['msg'] = $validaciones['msg'];
            }
        }catch (Exception $ex){
            $response['status'] = false;
            $response['msg'][] = 'No es posible iniciar sesión en este momento';
        }
        echo json_encode($response);
    }

    public function validarLogin(){
        $response = array();
        try{
            if(isset($_SESSION['data_usuario_comprador'])){
                $response['status'] = true;
                $response['msg'] = ['Sessión existente, puede seguir comprando en la tienda'];
                $response['data'] = $_SESSION['data_usuario_comprador'];
            }else{
                $response['status'] = false;
                $response['msg'] = ['Sessión ha caducado, vuelva a iniciar sesión nuevamente'];
            }
        }catch (Exception $ex){
            $response['status'] = false;
            $response['msg'] = 'No es posible iniciar sesión en este momento';
        }
        echo json_encode($response);
    }

    public function actualizarComprador($parametros){
        $response = array();
        try{
            if($this->usuarioModel->actualizarDataUsuario($parametros)){
                $_SESSION['data_usuario_comprador'] = $parametros;
                $response['status'] = true;
                $response['msg'][] = 'Se actualizo sus datos correctamente';
            }else{
                $response['status'] = false;
                $response['msg'][] = 'No fue posible actualizar sus datos, favor de intentar más tardes';
            }
        }catch (Exception $ex){
            $response['status'] = false;
            $response['msg'][] = 'No fue posible actualizar sus datos, favor de intentar más tardes';
        }
        echo json_encode($response);
    }

    public function logout(){
        $response = array();
        try {
            if(isset($_SESSION['data_usuario_comprador'])){
                unset($_SESSION['data_usuario_comprador']);
                session_destroy();
                $response['status'] = true;
                $response['msg'][] = 'Cerro sesión correctamente, vuelva pronto';
            }else{
                $response['status'] = true;
                $response['msg'][] = 'No existia sesión por cerrar, vuelva pronto';
            }
        }catch (Exception $ex){
            $response['status'] = false;
            $response['msg'][] = 'Hubo un error al tratar de cerrar sesión, intente nuevamente';
        }
        echo json_encode($response);
    }

}