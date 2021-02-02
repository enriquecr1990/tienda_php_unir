<?php

class Validaciones {

    public static function validarFormUsuario($data){
        $validacion['status'] = true;
        $validacion['msg'] = array();
        if(!isset($data['usuario']) || self::isCampoVacio($data['usuario'])){
            $validacion['status'] = false;
            $validacion['msg'][] = 'El campo usuario es requerido';
        }if(!isset($data['password']) || self::isCampoVacio($data['password'])){
            $validacion['status'] = false;
            $validacion['msg'][] = 'El campo contraseña es requerido';
        }if(!isset($data['tipo_usuario']) || self::isCampoVacio($data['tipo_usuario'])){
            $validacion['status'] = false;
            $validacion['msg'][] = 'El campo tipo de usuario es requerido';
        }
        return $validacion;
    }

    public static function validarFormDireccion($data){

    }

    public static function validarFormProducto($data){
        $validacion['status'] = true;
        $validacion['msg'] = array();
        if(!isset($data['clave_producto']) || self::isCampoVacio($data['clave_producto'])){
            $validacion['status'] = false;
            $validacion['msg'][] = 'El campo clave del producto es requerido';
        }if(!isset($data['nombre']) || self::isCampoVacio($data['nombre'])){
            $validacion['status'] = false;
            $validacion['msg'][] = 'El campo nombre es requerido';
        }if(!isset($data['descripcion']) || self::isCampoVacio($data['descripcion'])){
            $validacion['status'] = false;
            $validacion['msg'][] = 'El campo descripcion es requerido';
        }if(!isset($data['cat_tipo_producto_id']) || self::isCampoVacio($data['cat_tipo_producto_id'])){
            $validacion['status'] = false;
            $validacion['msg'][] = 'El campo tipo de producto es requerido';
        }if(!isset($data['precio']) || self::isCampoVacio($data['precio'])){
            $validacion['status'] = false;
            $validacion['msg'][] = 'El campo precio es requerido';
        }if(!isset($data['genero']) || self::isCampoVacio($data['genero'])){
            $validacion['status'] = false;
            $validacion['msg'][] = 'El campo nombre es requerido';
        }if(!isset($data['foto_galeria']) || sizeof($data['foto_galeria']) == 0){
            $validacion['status'] = false;
            $validacion['msg'][] = 'Se requiere por lo menos una URL de la foto para la galeria del producto';
        }
        return $validacion;
    }

    public static function validarFormActualizarVenta($data){
        $validacion['status'] = true;
        $validacion['msg'] = array();
        if(!isset($data['id']) || self::isCampoVacio($data['id'])){
            $validacion['status'] = false;
            $validacion['msg'][] = 'El campo id de la compra es requerido';
        }if(!isset($data['mensajeria']) || self::isCampoVacio($data['mensajeria'])){
            $validacion['status'] = false;
            $validacion['msg'][] = 'El campo mensajeria es requerido';
        }if(!isset($data['numero_guia']) || self::isCampoVacio($data['numero_guia'])){
            $validacion['status'] = false;
            $validacion['msg'][] = 'El campo número de guía/código de rastreo es requerido';
        }if(!isset($data['cat_compra_estatus_id']) || self::isCampoVacio($data['cat_compra_estatus_id'])){
            $validacion['status'] = false;
            $validacion['msg'][] = 'El campo estatus es requerido';
        }
        return $validacion;
    }

    public static function isCampoVacio($campo){
        $validacion = false;
        if(trim($campo) == '' && strlen($campo)){
            $validacion = true;
        }
        return $validacion;
    }

    public static function isValidRegex($campo,$regla){
        $validacion = true;
        if(!preg_match($regla,$campo)){
            $validacion = false;
        }
        return $validacion;
    }
}