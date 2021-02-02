<?php

require_once 'ModeloBase.php';

class CatalogosModel extends ModeloBase
{

    function __construct()
    {
        parent::__construct();
    }

    public function estado(){
        $this->db->consulta("select ce.*,ce.id_cat_estado id from cat_estado ce order by ce.nombre asc");
        return $this->db->resultado();
    }

    public function municipio($idEstado){
        $this->db->consulta("select cm.*, cm.id_cat_municipio id from cat_municipio cm where cm.id_cat_estado = $idEstado order by cm.nombre asc");
        return $this->db->resultado();
    }

    public function localidad($idMunicipio){
        $this->db->consulta("select cl.*, cl.id_cat_localidad id from cat_localidad cl where cl.id_cat_municipio = $idMunicipio order by cl.nombre asc");
        return $this->db->resultado();
    }

    public function tipoProducto(){
        $this->db->consulta("select * from cat_tipo_producto ctp");
        return $this->db->resultado();
    }

    public function estatusCompra(){
        $this->db->consulta("select * from cat_compra_estatus cce");
        return $this->db->resultado();
    }

}