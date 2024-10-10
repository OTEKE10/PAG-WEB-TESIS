<?php
    
    
    require 'includes/funciones.php';
    
    incluirTemplate('header');

?>



    <main class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">   
                <h3>Variedad</h3>
                <p>Ofrecemos los mejores productos en tendencia que reflejan una variedad entre estilo y comfort.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Precios accesibles y justos para productos de calidad que reflejan lo mejor de cada persona.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>A Tiempo</h3>
                <p>Entregas a tiempo y seguras para que puedas tener tus productos lo mas rapido posible.</p>
            </div>
        </div>
    </main>

    <section class="seccion contenedor">
        <h2>Categorias de Productos</h2>

        <?php 
            
            $limite = 3;
            
            include 'includes/templates/anuncios.php';
            

        ?>

        <div class="alinear-derecha">
            <a href="anuncios.php" class="boton-amarillo">Ver Todas</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra los productos que desees</h2>
        <a href="contacto.php" class="boton-amarillo">Contactános</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/bien.webp" type="image/webp">
                        <source srcset="build/img/bien.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/bien.jpg" alt="Texto Entrada Blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Sientete bien contigo mism@</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2024</span> por: <span>Admin</span> </p>

                        <p>
                            Sentirte bien contigo mismo es vestir lo que te hace feliz, sin importar lo que piensen los demás.
                        </p>
                    </a>
                </div>
            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/oro.webp" type="image/webp">
                        <source srcset="build/img/oro.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/oro.jpg" alt="Texto Entrada Blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada2.php">
                        <h4>Tendencias de Moda, Cuidado Personal y Accesorios para esta Temporada</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2024</span> por: <span>Admin</span> </p>

                        <p>
                        Descubre las últimas tendencias en moda, cuidado personal y accesorios que te harán brillar esta temporada con los mejores looks y consejos para completar tu estilo.
                        </p>
                    </a>
                </div>
            </article>
        </section>

        <section class="testimoniales">
            <h3>Testimonios</h3>
            <img src="https://mms.img.susercontent.com/3880b612112770f1bea2404c8b31ac23" class="testimonial-img" alt="">
            <div class="testimonial">
                <blockquote>
                    El personal se comportó de una excelente forma, muy buena atención y los productos que me ofrecieron cumplen con todas mis expectativas.
                </blockquote>
                <p>- Amanda Ventura</p>
            </div>
        </section>
    </div>

    <?php
        incluirTemplate('footer');
    ?>    