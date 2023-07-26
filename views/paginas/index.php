<main class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>

        <div class="iconos-nosotros">
                <div class="icono">
                    <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                    <h3>Seguridad</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit necessitatibus atque ratione nihil accusantium recusandae? Dignissimos aliquid esse veniam error quas quisquam.</p>
                </div>
                <div class="icono">
                    <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                    <h3>Precio</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit necessitatibus atque ratione nihil accusantium recusandae? Dignissimos aliquid esse veniam error quas quisquam.</p>
                </div>
                <div class="icono">
                    <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                    <h3>Tiempo</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit necessitatibus atque ratione nihil accusantium recusandae? Dignissimos aliquid esse veniam error quas quisquam.</p>
                </div>
        </div>
    </main>
    <section class="seccion contenedor">
        <h2>Casas y pisos en Venta</h2>

        <?php  
        $limite =3;
         include 'listado.php'
        ?>

        <div class="alinear-derecha"><!--contactanos-->
            <a href="/propiedades" class="boton-verde">Ver todas</a>
        </div>
    </section>
    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Rellena el furmulario de contacto y uno de nuestros asesores se pondrá en contacto contigo a la mayor brevedad posible.</p>
        <a href="/contacto" class="boton-amarillo">Contáctanos</a>
    </section>
    <div class="contenedor seccion seccion-inferior"><!--Empieza el blog-->
        <section class="blog">
            <h3>Nuestro Blog</h3>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpg">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="texto entrada blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="/entrada">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el: <span>13/6/2023 </span>por: <span>Admin</span></p>

                        <p>
                            Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero.
                        </p>
                    </a>
                </div>
            </article>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpg">
                        <img loading="lazy" src="build/img/blog2.jpg" alt="texto entrada blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="/entrada">
                        <h4>Guía para la decoración de tu hogar</h4>
                        <p class="informacion-meta">Escrito el: <span> 16/6/2023 </span> por: <span>Admin</span> </p>

                        <p>
                           Maximiza el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para darle vida a tu espacio.
                        </p>
                    </a>
                </div>
            </article>
        </section>
        <section class="testimoniales">
            <h3>Testimoniales</h3>

            <div class="testimonial">
                <blockquote>
                    El personal se comportó de una excelente forma, muy buena atención y la casa es increíble.
                </blockquote>
                <p>-Laura Subrá Devis</p>
            </div>

        </section>
    </div>