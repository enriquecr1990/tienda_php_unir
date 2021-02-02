<form id="form_direccion_usuario">
    <input type="hidden" id="id_direccion" name="id" value="">
    <input type="hidden" id="id_data_usuario" name="data_usuario_id" value="">
    <input type="hidden" id="eliminado" name="eliminado" value="no">
    <div class="form-group">
        <label for="calle">Calle</label>
        <input type="text" class="form-control" id="calle" name="calle" placeholder="Calle" data-rule-required="true">
    </div>
    <div class="row">
        <div class="form-group col-lg-4">
            <label for="numero_ext">Número Ext.</label>
            <input type="text" class="form-control" id="numero_ext" name="numero_ext" placeholder="Número exterior" data-rule-required="true">
        </div>
        <div class="form-group col-lg-4">
            <label for="numero_int">Número Int.</label>
            <input type="text" class="form-control" id="numero_int" name="numero_int" placeholder="Número interior">
        </div>
        <div class="form-group col-lg-4">
            <label for="calle">Código postal</label>
            <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" placeholder="Código postal" data-rule-required="true">
        </div>
    </div>

    <div class="form-group">
        <label for="quien_recibe">Quien recibe</label>
        <input type="text" class="form-control" id="quien_recibe" name="quien_recibe" placeholder="Quien recibe" data-rule-required="true">
    </div>
    <div class="form-group">
        <label for="referencias">Referencias</label>
        <textarea class="form-control" id="referencias" name="referencias" placeholder="Referencias, color de casa, calle..."></textarea>
    </div>
    <div class="row">
        <div class="form-group col-lg-4">
            <label for="cat_estado">Estado</label>
            <select class="custom-select slt_cat_estado" data-destino="#cat_municipio" name="id_cat_estado" id="cat_estado" data-rule-required="true">
                <option value="">--Seleccione--</option>
            </select>
        </div>
        <div class="form-group col-lg-4">
            <label for="cat_municipio">Municipio</label>
            <select class="custom-select slt_cat_municipio" data-destino="#cat_localidad" name="id_cat_municipio" id="cat_municipio" data-rule-required="true">
                <option value="">--Seleccione estado--</option>
            </select>
        </div>
        <div class="form-group col-lg-4">
            <label for="cat_localidad">Localidad</label>
            <select class="custom-select" name="id_cat_localidad" id="cat_localidad" data-rule-required="true">
                <option value="">--Seleccione municipio--</option>
            </select>
        </div>
    </div>
</form>