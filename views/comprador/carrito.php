<div id="contenedor_carrito" style="display: none;">
    <div class="row">
        <div class="form-group col-lg-12">
            <div class="row">
                <div class="form-group col-lg-8 col-md-8 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            Mis productos
                        </div>
                        <div class="card-body" id="card_body_mi_carrito_comprados">

                        </div>
                    </div>
                </div>
                <div class="form-group col-lg-4 col-md-4 col-sm-12" >
                    <div class="card">
                        <div class="card-header">
                            Detalle de compra
                        </div>
                        <div class="card-body" id="">
                            <div id="card_body_mi_carrito_comprar">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <td class="text-left">Subtotal:</td>
                                        <td class="text-right" id="detalle_subtotal"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Impuesto:</td>
                                        <td class="text-right" id="detalle_impuesto"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Envio:</td>
                                        <td class="text-right" id="detalle_envio"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left"><strong>Total</strong></td>
                                        <td class="text-right" ><strong id="detalle_total"></strong></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="text-center">
                                    <button id="btn_pagar_proceso_compra" type="button" class="btn btn-success">PAGAR <i class="fa fa-money-bill"></i></button>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <button type="button" class="btn btn-outline-info btn-sm mostrar_modal_boton" data-id_modal_mostrar="#modal_politica_seguridad">Politicas de seguridad</button><br>
                                <button type="button" class="btn btn-outline-primary btn-sm mostrar_modal_boton mt-2 mb-2" data-id_modal_mostrar="#modal_politica_entrega">Politicas de entrega</button><br>
                                <button type="button" class="btn btn-outline-secondary btn-sm mostrar_modal_boton" data-id_modal_mostrar="#modal_politica_devolucion">Politicas de devolución</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once 'politicas_seguridad.php' ?>

<?php include_once 'politica_entrega.php' ?>

<?php include_once 'politica_devolucion.php' ?>

<?php include_once 'pago.php' ?>
