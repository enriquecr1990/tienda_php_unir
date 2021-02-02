<!-- Modal -->
<div class="modal fade" id="modal_proceso_compra" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Felicidades.... Proceso de compra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="contenedor_proceso_pago_invitado">
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <div class="alert alert-info">
                                Actualmente no tiene cuenta en la tienda, Favor de registrarse y llenar los datos de la sección de "Mis datos".
                            </div>
                        </div>
                        <div class="form-group col-lg-12">

                        </div>
                    </div>
                </div>
                <div id="contenedor_proceso_pago_usr_registrado">
                    <!-- card de mis datos -->
                    <div class="card">
                        <div class="card-header">
                            Datos personales
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

                    <!-- card direccion -->
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-6">
                                    Enviar pedido a:
                                </div>
                                <div class="col-lg-6 text-right">
                                    <button type="button" class="btn btn-dark btn-sm btn_modal_direccio" data-id_direccion="" data-direccion=""><i class="fa fa-plus"></i> Agregar</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" id="card_body_direcciones_envio">

                        </div>
                    </div>

                    <input type="hidden" id="id_compra" value="">

                    <div class="row">
                        <div class="form-group col-lg-12">
                            <div class="alert alert-info">
                                Para poder realizar el pago selecciona primeramente una dirección de envio;
                            </div>
                        </div>
                    </div>

                    <!-- boton de pago cecabank -->
                    <form action="https://tpv.ceca.es/tpvweb/tpv/compra.action" method="post" enctype="application/x-www-form-urlencoded">
                        <input id="MerchantID" name="MerchantID" type="hidden" value=""> <!-- solventado en backend -->
                        <input id="AcquirerBIN" name="AcquirerBIN" type="hidden" value=""> <!-- solventado en backend -->
                        <input id="TerminalID" name="TerminalID" type="hidden" value=""> <!-- solventado en backend -->
                        <input id="URL_OK" name="URL_OK" type="hidden" value=""> <!-- solventado en JS Carrito -->
                        <input id="URL_NOK" name="URL_NOK" type="hidden" value=""> <!-- solventado en JS Carrito -->
                        <input id="Firma" name="Firma" type="hidden" value=""> <!-- solventado en backend -->
                        <input id="Cifrado" name="Cifrado" type="hidden" value="SHA2">
                        <input id="Num_operacion" name="Num_operacion" type="hidden" value=""> <!-- solventado en backend -->
                        <input id="Importe" name="Importe" type="hidden" value=""> <!-- solventado en JS Carrito -->
                        <input id="TipoMoneda" name="TipoMoneda" type="hidden" value=""> <!-- solventado en JS Carrito -->
                        <input id="Exponente" name="Exponente" type="hidden" value="2">
                        <input id="Pago_soportado" name="Pago_soportado" type="hidden" value="SSL">
                        <input id="Idioma" name="Idioma" type="hidden" value="1">
                        <!--<input id="datos_acs_20" name="datos_acs_20" type="hidden" value="">
                        <input id="firma_acs_20" name="firma_acs_20" type="hidden" value="">-->
                        <div class="row mt-3">
                            <div class="form-group col-lg-12 text-right">
                                <input type="submit" id="btn_pagar_form_cecabank" disabled="disabled" class="btn btn-success btn-sm" value="Pagar con CecaBank">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>