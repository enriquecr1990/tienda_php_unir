<div id="contenedor_clientes" style="display: none">
    <div class="row">
        <div class="form-group col-lg-12">
            <div class="card">
                <div class="card-header">
                    <label class="card-title">Listado de clientes</label>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-lg-6"></div>
                        <div class="form-group col-lg-4">
                            <label for="busqueda_detalle">Filtro</label>
                            <input class="form-control clientes_filtro" id="busqueda_detalle_clientes" placeholder="Nombre, apellidos, datos de contacto">
                            <small id="busquedaHelpCliente" class="form-text text-muted">Describa un texto del cliente incluyendo mayúsculas, de enter o salga del recuadro</small>
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="busqueda_genero">Genero</label>
                            <select class="custom-select clientes_filtro" name="busqueda_genero_clientes" id="busqueda_genero_clientes">
                                <option value="">--Todos--</option>
                                <option value="h">Caballero</option>
                                <option value="m">Dama</option>
                            </select>
                        </div>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre del cliente</th>
                                <th>Datos de contacto</th>
                                <th>Tienda</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_clientes_admin">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_cliente_venta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Compras de cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="body_modal_cliente_venta">
                <div class="row">
                    <div class="form-group col-lg-12">
                        Cliente: <span class="badge badge-info" id="nombre_cliente_compras"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-12">
                        <table class="table table-striped">
                            <thead>
                            <th>Fecha</th>
                            <th>Monto</th>
                            <th>Moneda de pago</th>
                            <th>Estatus</th>
                            </thead>
                            <tbody id="tbody_compras_cliente">

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