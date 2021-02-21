<script src="/assets/framework/jquery/jquery-3.5.1.min.js"></script>
<script src="/assets/framework/bootstrap45/js/bootstrap.min.js"></script>
<script src="/assets/framework/bootstrap45/js/bootstrap.bundle.min.js"></script>

<script src="/assets/framework/jquery/js_validate/jquery.validate.min.js"></script>
<script src="/assets/framework/jquery/js_validate/localization/messages_es.min.js"></script>

<script src="/assets/framework/watnotif/js/watnotif-1.0.min.js"></script>

<!--<script src="/assets/framework/fileinput/js/fileinput.js"></script>-->
<script src="/assets/framework/fileupload/js/vendor/jquery.ui.widget.js"></script>
<script src="/assets/framework/fileupload/js/jquery.iframe-transport.js"></script>
<script src="/assets/framework/fileupload/js/jquery.fileupload.js"></script>

<!-- scripts del carrito -->
<script src="/assets/js/master.js"></script>
<script src="/assets/js/html.js"></script>
<script src="/assets/js/datos.js"></script>
<script src="/assets/js/catalogos.js"></script>
<?php if($sitio == 'admin'): ?>
    <script src="/assets/js/admin/login.js"></script>
    <script src="/assets/js/admin/productos.js"></script>
    <script src="/assets/js/admin/clientes.js"></script>
    <script src="/assets/js/admin/ventas.js"></script>
<?php endif; ?>
<?php if($sitio == 'comprador'): ?>
    <script src="/assets/js/comprador/login.js"></script>
    <script src="/assets/js/comprador/menu.js"></script>
    <script src="/assets/js/comprador/productos.js"></script>
    <script src="/assets/js/comprador/carrito.js"></script>
    <script src="/assets/js/comprador/compra.js"></script>
<?php endif; ?>

<!--<script>alert('peligro sistema')</script>-->

<footer>
    Enrique Corona Ricaño Estudiante de Maestria en UNIR
</footer>

</body>
</html>
