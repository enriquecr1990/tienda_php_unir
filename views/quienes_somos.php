<div id="contenedor_quienes_somos" style="display: none;">
    <div class="row">
        <div class="form-group col-lg-12">
            <div class="card">
                <div class="card-header">
                    <label class="card-title">Maestría en Dirección e Ingeniería de Sitios Web</label>
                </div>
                <div class="card-body">
                    <p>
                        <strong>Materia: </strong>Modelos de negocio y formas de pago en la web<br>
                        <strong>Instructor:</strong> Vanessa Anguiano<br>
                        <strong>Alumno:</strong> Enrique Corona Ricaño<br>
                        <strong>Actividad:</strong> Lectura: Cómo implementar una pasarela de pago (Cecabank)<br>
                        <strong>Descripción:</strong> Lee detenidamente el Manual de implementación de Pasarelas de Pago de Cecabank.
                        Después, siguiendo todos los pasos explicados en dicho manual desarrolla una pequeña aplicación web en la que se utilice dicha pasarela de pago.

                        Aunque, por su sencillez, se recomienda PHP, se podrá elegir libremente el lenguaje de programación deseado para su desarrollo (PHP, Java, C#, etc.).<br>
                        <strong>Objetivos:</strong> La complejidad del trabajo realizado puede variar, pero para obtener la máxima puntuación deberá tener al menos la siguiente funcionalidad:
                    </p>

                    <ul>
                        <li>Un diseño personalizado y amigable, utilizando hojas de estilo CSS.</li>
                        <li>La posibilidad de utilizar un «carrito» de la compra, para poder elegir entre varios productos.</li>
                        <li>La posibilidad de elegir varias unidades de un mismo producto para el carrito.</li>
                        <li>La posibilidad de trabajar con cantidades numéricas en decimal.</li>
                        <li>La posibilidad de trabajar con dos tipos diferentes de monedas (por ejemplo, euros y dólares).</li>
                    </ul>

                    <h2>Desarrollo:</h2>

                    <p>
                        En base a la documentación ofrecida en el documento del entregable, menciona utilizar el metodo
                        de pago de TPV Virtual CecaBank; intente reutilizar la tienda del entregable pasado con el CMS
                        de tiendas en linea Prestashop, pero me encuentro que el plugin es de pago (alrededor de 50 euros)
                        <a href="https://addons.prestashop.com/es/pago-tarjeta-carteras-digitales/4907-tpv-ceca-completo-pago-seguro-devoluciones-sha256.html" target="_blank">Ver plugin de prestashop</a> ,
                        de igual manera se puede instalar gratis desde el código fuente del desarrollador de Cecabank,
                        <a href="https://github.com/cecabank/cecabank-prestashop" target="_blank">Ver código</a>
                        pero en la parte de la configuración no permite tener simultaneamente dos tipos de moneda; por
                        tanto no podremos solventar el poder pagar en dos tipos de monedas con los usuarios que visiten
                        nuestra tienda para comprar productos.<br>
                        Con lo anterior, se decide integrar una tienda en linea muy basica que cumpla con los objetivos
                        del entregable y ademas poder integrar la pasarela de pago de Cecabank y tenga soporte de
                        multimoneda. Con el cambio de moneda haremos uso de un servicio publico del Banco de México para obtener el precio de
                        <strong>Un dolar</strong> en pesos Mexicanos.
                        <a href="https://www.banxico.org.mx/SieAPIRest/service/v1/doc/catalogoSeries#" target="_blank">Ver servicio</a><br>
                        La integración de esta tienda en linea, se basa en las tecnologias de PHP en codigo puro
                        (haciendo uso de la arquitectura de diseño Modelo-Vista-Controlador) y de la creación de
                        peticiones para el acceso a datos que responden exclusivamente en JSON (backend) y el control de
                        las vistas respecto a su contenido son con JavaScript/jQuery (frontend)<br>
                        Se usaron las siguientes tecnologias:
                    </p>

                    <ul>
                        <li>PHP en código puro</li>
                        <li>HTML5, CSS3 y el framework de BootStrap v4.5</li>
                        <li>Motor de Base de Datos MySQL</li>
                        <li>Creador de Modelo Entidad Relación Workbench</li>
                        <li>JavaScript y jQuery</li>
                        <li>Peticiones en JSON (backend)</li>
                        <li>Consumo de servicios REST del Banco de México para el cambio de moneda</li>
                    </ul>

                    <h2>Conclusión</h2>

                    Me gusto mucho realizar la integración del método de pago de cecabank, tanto en la tienda Construida en Prestashop como una integración independiente haciendo uso de las tecnologias de PHP
                </div>
            </div>
        </div>
    </div>
</div>