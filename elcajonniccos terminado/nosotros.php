<?php
    
    require 'includes/funciones.php';
    
    incluirTemplate('header');

?>

    <main class="contenedor seccion">
        <h1>Conoce sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/niccos.webp" type="image/webp">
                    <source srcset="build/img/niccos.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/niccos.jpg" alt="Sobre Nosotros">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>
                    4 Años de experiencia
                </blockquote>

                <p>El Cajón de Niccos nació en plena pandemia del 2020, un momento de incertidumbre, pero también de oportunidad, donde detectamos la necesidad de ofrecer productos accesibles y de calidad desde la comodidad del hogar. Durante estos cuatro años de trayectoria, hemos crecido como una tienda en línea especializada en joyería, artículos personales y ropa de SHEIN, siempre enfocados en satisfacer las necesidades y deseos de nuestros clientes.</p>

                <p>Nuestra misión ha sido, desde el inicio, brindar productos de alta calidad a precios sorprendentes, sin comprometer el estilo ni la durabilidad. Sabemos que cada uno de nuestros clientes es único, por eso nos esforzamos en ofrecer una atención personalizada, ayudándolos a encontrar exactamente lo que buscan y asegurándonos de que su experiencia de compra sea excepcional.</p>

                <p>A lo largo de estos años, no solo hemos ampliado nuestra oferta de productos, sino que también hemos aprendido y crecido con el feedback de nuestros clientes. Cada temporada, renovamos nuestro inventario con los artículos más trendy y en tendencia, adaptándonos a las demandas del mercado, para que siempre encuentren lo último en moda y accesorios.</p>

                <p>Nos enorgullece no solo ofrecer una plataforma de compra conveniente y segura, sino también formar parte del día a día de nuestros clientes, ayudándolos a encontrar ese detalle especial, ya sea una joya que ilumine su look, un accesorio personalizado o una prenda que realce su estilo. En El Cajón de Niccos, seguimos comprometidos a mejorar continuamente, escuchando a nuestra comunidad y esforzándonos por superar sus expectativas en cada compra. ¡Gracias por confiar en nosotros y ser parte de este viaje de innovación y estilo!</p>
            </div>
        </div>
    </main>


    <section class="contenedor seccion">
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
    </section>

    
    <?php
        incluirTemplate('footer');
    ?>   
</body>
</html>