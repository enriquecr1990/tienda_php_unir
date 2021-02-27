<script src="<?=base_url()?>assets/framework/jquery/jquery-3.5.1.min.js"></script>
<script src="<?=base_url()?>assets/framework/bootstrap45/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/framework/bootstrap45/js/bootstrap.bundle.min.js"></script>

<script src="<?=base_url()?>assets/framework/jquery/js_validate/jquery.validate.min.js"></script>
<script src="<?=base_url()?>assets/framework/jquery/js_validate/localization/messages_es.min.js"></script>

<script src="<?=base_url()?>assets/framework/watnotif/js/watnotif-1.0.min.js"></script>

<!--<script src="<?=base_url()?>assets/framework/fileinput/js/fileinput.js"></script>-->
<script src="<?=base_url()?>assets/framework/fileupload/js/vendor/jquery.ui.widget.js"></script>
<script src="<?=base_url()?>assets/framework/fileupload/js/jquery.iframe-transport.js"></script>
<script src="<?=base_url()?>assets/framework/fileupload/js/jquery.fileupload.js"></script>

<!-- scripts del carrito -->
<script>
    var base_url = '<?=base_url()?>';
</script>
<script src="<?=base_url()?>assets/js/master.js"></script>
<script src="<?=base_url()?>assets/js/html.js"></script>
<script src="<?=base_url()?>assets/js/datos.js"></script>
<script src="<?=base_url()?>assets/js/catalogos.js"></script>
<?php if($sitio == 'admin'): ?>
    <script src="<?=base_url()?>assets/js/admin/login.js"></script>
    <script src="<?=base_url()?>assets/js/admin/productos.js"></script>
    <script src="<?=base_url()?>assets/js/admin/clientes.js"></script>
    <script src="<?=base_url()?>assets/js/admin/ventas.js"></script>
<?php endif; ?>
<?php if($sitio == 'comprador'): ?>
    <script src="<?=base_url()?>assets/js/comprador/login.js"></script>
    <script src="<?=base_url()?>assets/js/comprador/menu.js"></script>
    <script src="<?=base_url()?>assets/js/comprador/productos.js"></script>
    <script src="<?=base_url()?>assets/js/comprador/carrito.js"></script>
    <script src="<?=base_url()?>assets/js/comprador/compra.js"></script>
<?php endif; ?>

<footer>
    Enrique Corona Ricaño Estudiante de Maestria en UNIR
</footer>

</body>
</html>
