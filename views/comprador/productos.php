<div id="contenedor_productos_comprador">
    <div class="row" id="contenedor_listado_productos">
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_producto_comprador" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalle del producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-lg-6">
                        <div id="carreteDetalleProducto" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner" id="fotosCarreteDetProd">
                                <div class="carousel-item active">
                                    <img src="/assets/img/slider/Diapositiva1.JPG" class="d-block w-100" alt="Promoción Balones">
                                </div>
                                <div class="carousel-item ">
                                    <img src="/assets/img/slider/Diapositiva2.JPG" class="d-block w-100" alt="Promoción Ropa Deportiva">
                                </div>
                                <div class="carousel-item ">
                                    <img src="/assets/img/slider/Diapositiva3.JPG" class="d-block w-100" alt="Promoción playeras">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carreteDetalleProducto" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carreteDetalleProducto" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <div class="form-group col-lg-6" id="detalleProducto">

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>