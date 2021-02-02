<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <img src="/assets/img/logo_ecr.png" width="50" height="50" class="d-inline-block align-top" alt="" loading="lazy">
        <a class="navbar-brand" href="#">Tienda UNIR v2</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuTiendaEcommerse" aria-controls="menuTiendaEcommerse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menuTiendaEcommerse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a role="button" class="nav-link active" id="menu_inicio">Inicio</a>
                </li>
                <li class="nav-item">
                    <a role="button" class="nav-link" id="menu_comprador_ropa">Ropa</a>
                </li>
                <li class="nav-item">
                    <a role="button" class="nav-link" id="menu_comprador_tennis">Tennis</a>
                </li>
                <li class="nav-item">
                    <a role="button" class="nav-link" id="menu_comprador_balones">Balones</a>
                </li>
                <li class="nav-item">
                    <a role="button" class="nav-link" id="menu_quienes_somos">Quienes Somos</a>
                </li>
                <li class="nav-item">
                    <a role="button" class="nav-link" id="menu_contacto" >Contacto</a>
                </li>
            </ul>
            <ul class="navbar-nav mr-5">
                <li class="nav-item dropdown" id="menu_comprador_moneda">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-money-check-alt"></i>Moneda: <span id="moneda_select_pago">MXN</span>
                    </a>
                    <div class="dropdown-menu" id="menu_comprador_moneda_opciones" aria-labelledby="menu_comprador_moneda">
                        <a role="button" class="dropdown-item moneda_opcion" data-valor_moneda="MXN" >Peso mexicano - MXN</a>
                        <a role="button" class="dropdown-item moneda_opcion" data-valor_moneda="USD" >Dollar estadounidense - USD</a>
                        <a role="button" class="dropdown-item moneda_opcion" data-valor_moneda="EUR" >Euro - EUR</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a role="button" class="nav-link" id="lnk_login_comprador">Iniciar sesión/Registrate</a>
                </li>
                <li class="nav-item dropdown" id="menu_comprador">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i>
                    </a>
                    <div class="dropdown-menu" id="menu_comprador_login" aria-labelledby="menu_comprador">
                        <a role="button" class="dropdown-item" id="lnk_mis_compras"><i class="fa fa-shopping-bag"></i> Mis Compras</a>
                        <a role="button" class="dropdown-item" id="lnk_datos_comprador" ><i class="fa fa-id-card"></i> Mis datos</a>
                        <a role="button" class="dropdown-item" id="lnk_loguout_comprador" ><i class="fa fa-sign-out-alt"></i> Salir</a>
                    </div>
                </li>
                <li class="nav-item" id="msg_logeado_comprador">
                    <span class="nav-link active">Bienvenido <i id="nombre_comprador_login"></i></span>
                </li>
                <li class="nav-item">
                    <a class="nav-link cursor_pointer" id="lnk_carrito_comprador">
                        <i class="fas fa-shopping-cart"></i>
                        <span id="bdg_carrito" class="badge badge-danger badge_notificacion"></span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>
