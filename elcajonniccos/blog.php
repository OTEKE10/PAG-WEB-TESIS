<?php
    
    require 'includes/funciones.php';
    
    incluirTemplate('header');

?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Nuestro Blog</h1>

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
                    <p>Escrito el: <span>20/10/2024</span> por: <span>Admin</span> </p>

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
                    <p>Escrito el: <span>20/10/2024</span> por: <span>Admin</span> </p>

                    <p>
                    Descubre las últimas tendencias en moda, cuidado personal y accesorios que te harán brillar esta temporada con los mejores looks y consejos para completar tu estilo.
                    </p>
                </a>
            </div>
        </article>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog5.webp" type="image/webp">
                    <source srcset="build/img/blog5.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog5.jpg" alt="Texto Entrada Blog">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada3.php">
                    <h4>Cómo Cuidar tu Joyería para Mantenerla Siempre Brillante</h4>
                    <p>Escrito el: <span>20/10/2024</span> por: <span>Admin</span> </p>

                    <p>
                        Aprende consejos prácticos para mantener tu joyería impecable y reluciente durante más tiempo.
                    </p>
                </a>
            </div>
        </article>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog6.webp" type="image/webp">
                    <source srcset="build/img/blog6.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog6.jpg" alt="Texto Entrada Blog">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada4.php">
                    <h4>Moda Accesible: Cómo Vestir las Últimas Tendencias sin Romper el Banco</h4>
                    <p>Escrito el: <span>20/10/2024</span> por: <span>Admin</span> </p>

                    <p>
                        Descubre cómo estar a la moda sin gastar una fortuna con nuestros tips de estilo accesible.
                    </p>
                </a>
            </div>
        </article>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog7.webp" type="image/webp">
                    <source srcset="build/img/blog7.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog7.jpg" alt="Texto Entrada Blog">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada5.php">
                    <h4>Accesorios Esenciales para Complementar tu Estilo Diario</h4>
                    <p>Escrito el: <span>20/10/2024</span> por: <span>Admin</span> </p>

                    <p>
                        Explora los accesorios clave que realzan cualquier look y transforman tu estilo cotidiano.
                    </p>
                </a>
            </div>
        </article>
    </main>

    
    <?php
        incluirTemplate('footer');
    ?>   
</body>
</html>