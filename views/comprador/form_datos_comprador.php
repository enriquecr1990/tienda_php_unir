<form id="form_mis_datos">
    <input type="hidden" id="id_datos_usuario" name="id">
    <div class="form-group">
        <label for="nombre_cliente">Nombre</label>
        <input type="text" class="form-control" id="nombre_cliente" name="nombre" placeholder="Nombre(s)" data-rule-required="true">
    </div>
    <div class="form-group">
        <label for="paterno_cliente">Apellido paterno</label>
        <input type="text" class="form-control" id="paterno_cliente" name="paterno" placeholder="Apellido paterno" data-rule-required="true">
    </div>
    <div class="form-group">
        <label for="materno_cliente">Apellido materno</label>
        <input type="text" class="form-control" id="materno_cliente" name="materno" placeholder="Apellido materno">
    </div>
    <div class="form-group">
        <label for="genero_cliente">Genero</label>
        <div class="custom-control custom-radio">
            <input type="radio" id="genero_hombre_cliente" name="genero" class="custom-control-input" value="h" data-rule-required="true">
            <label class="custom-control-label" for="genero_hombre_cliente">Hombre</label>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" id="genero_mujer_cliente" name="genero" class="custom-control-input" value="m">
            <label class="custom-control-label" for="genero_mujer_cliente">Mujer</label>
        </div>
    </div>
    <div class="form-group">
        <label for="correo_cliente">Correo electronico</label>
        <input type="text" class="form-control" id="correo_cliente" name="correo" placeholder="Correo electrónico principal"
               data-rule-required="true" data-rule-email="true">
    </div>
    <div class="form-group">
        <label for="telefono_cliente">Telefono</label>
        <input type="text" class="form-control" id="telefono_cliente" name="telefono" placeholder="Telefono" data-rule-required="true" data-rule-number="true">
    </div>
</form>