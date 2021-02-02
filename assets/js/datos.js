var ParseDatos = {

    json_codificado : function(strCode){
        //codificamos el json del producto en un string y un tipo de datos codificador en una cadena
        return btoa(JSON.stringify(strCode));
    },

    json_decodificado : function(strDecode){
        return JSON.parse(atob(strDecode));
    }

}
