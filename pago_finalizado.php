<?php $sitio = 'comprador'; ?>
<?php include_once 'views/default/header.php'; ?>

<?php include_once 'views/comprador/menu_comprador.php'; ?>

    <!-- carousel -->
    <?php include_once 'views/comprador/carrete_productos.php'?>

    <div class="container">

        <?php include_once 'views/comprador/login.php'?>

        <?php include_once 'views/comprador/productos.php'?>

        <?php include_once 'views/comprador/carrito.php'?>

        <?php include_once 'views/comprador/compras.php'?>

        <?php include_once 'views/comprador/datos_comprador.php'?>

        <?php include_once 'views/quienes_somos.php'?>

        <?php include_once 'views/contacto.php'?>

    </div>

    <!-- modal pago satisfactorio -->
    <div class="modal fade" id="modal_pago_cecabank_finalizado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Notificación de pago</h5>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success">
                        El pago se finalizó correctamente, el vendedor se contactara con usted para su número de guia;
                        puede dar seguimiento a su pedido en la seccion de "Mis compras"
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php include_once 'views/default/footer.php'; ?>