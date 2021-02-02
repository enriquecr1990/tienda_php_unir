<?php

require_once '../helpers/validaciones.php';
require_once '../model/UsuarioModel.php';

class LoginAdminController {

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
                    $_SESSION['data_usuario_admin'] = $dataUsuario;
                    $response['status'] = true;
                    $response['msg'][] = 'Inicio de sessión correcto, Bienvenido al administrador de la tienda';
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
            if(isset($_SESSION['data_usuario_admin'])){
                $response['status'] = true;
                $response['msg'] = ['Sessión existente, puedes seguir configurando tu tienda'];
                $response['data'] = $_SESSION['data_usuario_admin'];
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

    public function logout(){
        $response = array();
        try {
            if(isset($_SESSION['data_usuario_admin'])){
                unset($_SESSION['data_usuario_admin']);
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