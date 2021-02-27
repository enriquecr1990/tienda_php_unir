<?php

function base_url()
{
    $scheme = 'http://';
    if (isset($_SERVER['REQUEST_SCHEME'])) {
        $scheme = $_SERVER['REQUEST_SCHEME'] . '://';
    }
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != '' && $_SERVER['HTTPS'] == 'on') {
        $scheme = 'https://';
    }
    $request = $_SERVER['SCRIPT_NAME'];
    if(strpos($request,'index.php') !== false){
        $request = str_replace('index.php','',$request);
    }if(strpos($request,'admin1a2s3d4f.php') !== false){
        $request = str_replace('admin1a2s3d4f.php','',$request);
    }if(strpos($request,'pago_finalizado.php') !== false){
        $request = str_replace('pago_finalizado.php','',$request);
    }if(strpos($request,'pago_rechazado.php') !== false){
        $request = str_replace('pago_rechazado.php','',$request);
    }if(strpos($request,'/routes/uploads.php') !== false){
        $request = str_replace('/routes/uploads.php','',$request);
    }
    $request = explode('/',$request);
    $url = $scheme . $_SERVER['HTTP_HOST'] . implode('/', $request);
    return $url;
}