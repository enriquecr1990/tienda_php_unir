<div class="row" id="contenedor_login_comprador" style="display: none;">
    <div class="form-group col-lg-4"></div>
    <div class="form-group col-lg-4 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
                <form id="form_login_comprador">
                    <div class="form-group">
                        <label for="usuario">Usuario</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Nombre de usuario" data-rule-required="true">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" data-rule-required="true">
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="chk_ver_password">
                            <label class="custom-control-label" for="chk_ver_password">Ver contraseña</label>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="button" class="btn btn-success btn-sm" id="btn_login_comprador">Iniciar sesión</button>
                        <button type="button" class="btn btn-info btn-sm" id="btn_registro_comprador" data-toggle="tooltip" data-placement="top" title="Ingresa usuario y contraseña en el formulario de arriba para poder registrarte">Registrarse</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="form-group col-lg-4"></div>
</div>