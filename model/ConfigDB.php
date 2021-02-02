<?php

class ConfigDB {

    public static function getConfig(){
        $db_config = array();

        // switch de $_SERVER['SERVER_NAME'] para cargar la configuracion de la
        // BD para que funcione en local o en la nube
        switch ($_SERVER['SERVER_NAME']){
            default:
                $db_config['host'] = 'localhost';
                $db_config['port'] = '3306';
                $db_config['user'] = 'root';
                $db_config['password'] = '';
                $db_config['data_base'] = 'mi_tienda_unir';
                break;
        }
        return $db_config;
    }

}