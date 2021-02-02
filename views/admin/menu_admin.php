<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <img src="/assets/img/logo_ecr.png" width="50" height="50" class="d-inline-block align-top" alt="" loading="lazy">
        <a class="navbar-brand" href="#">Tienda UNIR v2</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu_admin_tienda_unir" aria-controls="menuTiendaEcommerse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu_admin_tienda_unir">
            <ul class="navbar-nav mr-auto" id="menu_admin_operaciones" style="display: none;">
                <li class="nav-item">
                    <a role="button" class="nav-link active" id="admin_productos" >Productos</a>
                </li>
                <li class="nav-item">
                    <a role="button" class="nav-link" id="admin_clientes" >Clientes</a>
                </li>
                <li class="nav-item">
                    <a role="button" class="nav-link" id="admin_ventas">Ventas</a>
                </li>
            </ul>
            <ul class="navbar-nav mr-5" id="menu_admin_login">
                <li class="nav-item" id="lnk_msg_sistema" style="display: none;">
                    <span class="nav-link active">Bienvenido <i id="nombre_usuario_login"></i></span>
                </li>
                <li class="nav-item" id="lnk_cerrar_sesion" style="display: none">
                    <span class="nav-link active">Cerrar sesión</span>
                </li>
            </ul>
        </div>
    </nav>
</div>