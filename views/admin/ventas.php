<div id="contenedor_ventas" style="display: none">
    <div class="row">
        <div class="form-group col-lg-12">
            <div class="card">
                <div class="card-header">
                    <label class="card-title">Listado de ventas</label>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-lg-4"></div>
                        <div class="form-group col-lg-4">
                            <label for="busqueda_detalle">Filtro</label>
                            <input class="form-control ventas_filtro" id="busqueda_detalle_ventas" placeholder="Nombre, apellidos, datos de contacto">
                            <small id="busquedaHelpVentas" class="form-text text-muted">Describa un texto del cliente incluyendo mayúsculas, de enter o salga del recuadro</small>
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="busqueda_detalle">Fecha</label>
                            <input class="form-control ventas_filtro" type="date" id="busqueda_fecha_ventas" placeholder="Fecha de compra">
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="busqueda_genero">Genero</label>
                            <select class="custom-select ventas_filtro" name="busqueda_genero_ventas" id="busqueda_genero_clientes">
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
                                <th>Folio</th>
                                <th>Fecha</th>
                                <th>Cliente</th>
                                <th>Monto</th>
                                <th>Moneda</th>
                                <th>Estatus</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="tbody_ventas_admin">

                        </tbody>
                    </table>
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

<div class="modal fade" id="modal_actualizar_venta" tabindex="-1" aria-labelledby="modal_label_actualizar_venta" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_label_actualizar_venta">Actualizar venta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="actualizar_venta">
                <input type="hidden" id="id_compra" name="id">
                <div class="modal-body" >

                    <div class="row">
                        <div class="form-group col-lg-6">
                            Folio de venta: <span class="badge badge-info" id="folio_venta_actualizar"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="mensajeria">Clave del producto</label>
                        <input type="text" class="form-control" id="mensajeria" name="mensajeria" placeholder="Mensajeria" data-rule-required="true">
                    </div>
                    <div class="form-group">
                        <label for="numero_guia">Número de guía/Código de rastreo</label>
                        <input type="text" class="form-control" id="numero_guia" name="numero_guia" placeholder="Número de guía" data-rule-required="true" data-rule-number="true">
                    </div>
                    <div class="form-group">
                        <label for="numero_guia">Estatus</label>
                        <select class="custom-select" data-rule-required="true" name="cat_compra_estatus_id" id="cat_compra_estatus_id">
                            <option value="">--Seleccione--</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success btn-sm" id="actualizar_venta_admin">Actualizar</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>