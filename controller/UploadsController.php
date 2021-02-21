<?php

class UploadsController{

    public function imagenes(){
        $response = array();
        try{
            if(isset($_FILES) && count($_FILES) != 0){
                foreach ($_FILES as $name => $file){
                    if($file['error'] == 0){
                        $dir_uploads_response = '/assets/uploads/';
                        $dir_uploads = '..'.$dir_uploads_response;
                        $file_bn = basename($file['name']);
                        $file_upload = $dir_uploads . $file_bn;
                        if(move_uploaded_file($file['tmp_name'],$file_upload)){
                            $response['status'] = true;
                            $response['msg'][] = 'Se recibieron y cargaron con exito las imagenes';
                            $response['data'] = array(
                                'archivo' => $file_bn,
                                'ruta' => $dir_uploads_response.$file_bn
                            );
                        }else{
                            $response['status'] = false;
                            $response['msg'][] = 'No se recibieron las imagenes, vuelva a intentar';
                        }
                    }else{
                        $response['status'] = false;
                        $response['msg'][] = 'No se recibieron las imagenes, vuelva a intentar';
                    }
                }
            }else{
                $response['status'] = false;
                $response['msg'][] = 'No se recibieron las imagenes, vuelva a intentar';
            }
        }catch (Exception $ex){
            $response['status'] = false;
            $response['msg'][] = 'No se pudo cargar la imagen en el sistema, favor de intentar mas tarde';
        }
        echo json_encode($response);
        exit;
    }

}