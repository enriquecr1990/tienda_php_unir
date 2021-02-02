<div class="row" id="contenedor_login_sistema" style="display: none;">
    <div class="form-group col-lg-4"></div>
    <div class="form-group col-lg-4 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">
                <form id="form_login">
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
                        <button type="button" class="btn btn-success" id="btn_login_admin"><i class="fa fa-sign-in"></i>Iniciar sesión</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="form-group col-lg-4"></div>
</div>