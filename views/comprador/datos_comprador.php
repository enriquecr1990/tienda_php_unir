<div class="container" id="contenedor_mis_datos_comprador" style="display: none;">
    <div class="row">
        <div class="form-group col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6">
                            Mis datos personales
                        </div>
                        <div class="col-lg-6 text-right">
                            <button type="button" class="btn btn-dark btn-sm" id="btn_actualizar_datos_comprador"><i class="fa fa-edit"></i> Actualizar</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-lg-2">
                            <label>Nombre: </label>
                        </div>
                        <div class="form-group col-lg-4">
                            <label class="datos_comprador_nombre"></label>
                        </div>

                        <div class="form-group col-lg-2">
                            <label>Genero: </label>
                        </div>
                        <div class="form-group col-lg-4">
                            <label class="datos_comprador_genero"></label>
                        </div>

                        <div class="form-group col-lg-2">
                            <label>Correo: </label>
                        </div>
                        <div class="form-group col-lg-4">
                            <label class="datos_comprador_correo"></label>
                        </div>

                        <div class="form-group col-lg-2">
                            <label>Telefono: </label>
                        </div>
                        <div class="form-group col-lg-4">
                            <label class="datos_comprador_telefono"></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6">
                            Mis direcciones
                        </div>
                        <div class="col-lg-6 text-right">
                            <button type="button" class="btn btn-dark btn-sm btn_modal_direccio" data-id_direccion="" data-direccion=""><i class="fa fa-plus"></i> Agregar</button>
                        </div>
                    </div>
                </div>
                <div class="card-body" id="card_body_direcciones">

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal datos comprador-->
<div class="modal fade" id="modal_form_datos_comprador" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mis datos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php include_once 'views/comprador/form_datos_comprador.php'; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn_guardar_mis_datos">Guardar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal direcciones-->
<div class="modal fade" id="modal_form_comprador_direccion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Domicilio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php include_once 'views/comprador/form_direccion.php'; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn_guardar_mi_direccion">Guardar</button>
                <button type="reset" class="btn btn-primary" id="btn_reiniciar_form_comprador_direccion" style="display: none;">Reset</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
