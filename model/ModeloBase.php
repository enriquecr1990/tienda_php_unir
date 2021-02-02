<?php

date_default_timezone_set('America/Mexico_City');

require ('DB.php');

class ModeloBase
{

    public $db;

    function __construct()
    {
        $this->db = new DB();
    }

    function __destruct()
    {
        $this->db = null;
    }
}