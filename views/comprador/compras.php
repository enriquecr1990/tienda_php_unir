<div id="contenedor_mis_compras" style="display: none">
    <div class="row">
        <div class="form-group col-lg-12">
            <input id="id_usuario_compras" type="hidden">
            <div class="card">
                <div class="card-header">
                    Mis compras
                </div>
                <div class="card-body" >
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Folio</th>
                            <th>Fecha</th>
                            <th>Monto</th>
                            <th>Moneda</th>
                            <th>Estatus</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody id="tbody_compras_cliente">

                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_ventas_productos" tabindex="-1" aria-labelledby="modal_label_productos" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_label_productos">Productos venta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" >
                <div class="row">
                    <div class="form-group col-lg-6">
                        Folio de venta: <span class="badge badge-info" id="folio_venta"></span>
                    </div>
                    <div class="form-group col-lg-3">
                        Monto: <span class="badge badge-info" id="monto_venta"></span>
                    </div>
                    <div class="form-group col-lg-3">
                        Moneda: <span class="badge badge-info" id="moneda_venta"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-12">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Clave</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Precio venta</th>
                                <th>Galeria</th>
                                <th>Categoria</th>
                            </tr>
                            </thead>
                            <tbody id="tbody_productos_venta">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>