<div id="contenedor_productos" style="display: none">
    <div class="row">
        <div class="form-group col-lg-12">
            <div class="card">
                <div class="card-header">
                    <label class="card-title">Listado de productos</label>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-lg-5">

                        </div>
                        <div class="form-group col-lg-3">
                            <label for="busqueda_detalle">Detalle</label>
                            <input class="form-control productos_filtro" id="busqueda_detalle" placeholder="Detalle del producto">
                            <small id="busquedaHelp" class="form-text text-muted">Describa un producto incluyendo mayúsculas, de enter o salga del recuadro</small>
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="busqueda_genero">Genero</label>
                            <select class="custom-select productos_filtro" name="busqueda_genero" id="busqueda_genero">
                                <option value="">--Todos--</option>
                                <option value="h">Caballero</option>
                                <option value="m">Dama</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="busqueda_categoria">Categoria</label>
                            <select class="custom-select productos_filtro" name="busqueda_categoria" id="busqueda_categoria">
                                <option value="">--Todos--</option>
                            </select>
                        </div>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Clave</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Precio</th>
                                <th>Galeria</th>
                                <th>Categoria</th>
                                <th >
                                    <button type="button" id="btn_agregar_producto" class="btn btn-outline-success btn-sm"><i class="fa fa-plus"></i> Nuevo</button>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tbody_productos_admin">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_productos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Formulario de producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_producto" enctype="multipart/form-data">
                <input type="hidden" id="id" name="id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="clave">Clave del producto</label>
                        <input type="text" class="form-control" id="clave" name="clave_producto" placeholder="Clave del producto" data-rule-required="true">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre del producto</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del producto" data-rule-required="true">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Decripción del producto" data-rule-required="true">
                    </div>
                    <div class="form-group">
                        <label for="tipo_producto">Tipo de producto</label>
                        <select class="custom-select" name="cat_tipo_producto_id" id="tipo_producto">
                            <option value="">--Seleccione--</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="precio">Precio</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">$</div>
                                </div>
                                <input type="text" class="form-control" id="precio" name="precio" placeholder="Precio" data-rule-required="true" data-rule-number="true">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">MXN</div>
                                </div>
                            </div>
                            <small id="precioHelp" class="form-text text-muted">El precio se registrara en Pesos Mexicanos y sin IVA del 16% (al comprador se le realizá el calculo automáticamente)</small>
                        </div>
                        <div class="col-lg-6">
                            <label for="genero">Genero</label>
                            <select class="custom-select" name="genero" id="genero">
                                <option value="">--Seleccione--</option>
                                <option value="h">Caballero</option>
                                <option value="m">Dama</option>
                            </select>
                            <small id="generoHelp" class="form-text text-muted">Seleccione un genero si es que aplica</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input file_upload_galeria_producto" name="foto_galeria_upload" id="customFile">
                                    <label class="custom-file-label" for="customFile">Desde archivo</label>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped">
                            <thead>
                            <th>URL imagen</th>
                            <th class="text-right">
                                <button type="button" id="btn_nueva_ruta_imagen" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>Nueva foto URL</button>
                            </th>
                            </thead>
                            <tbody id="tbody_producto_galeria">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn_guardar_producto">Guardar</button>
                    <button type="reset" class="btn btn-primary" id="btn_reiniciar_form_producto" style="display: none;">Reset</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
