<?php
    include '.\includes\templates\header.php';

?>

    <main class="contenedor seccion">
        <h1>Nuestras Redes Sociales</h1>
        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/niccos.webp" type="image/webp">
                    <source srcset="build/img/niccos.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/niccos.jpg" alt="Sobre Nosotros">
                </picture>
            </div>
            
            <style>
              .social-links i {
                font-size: 80px; /* Ajusta este valor al tamaño deseado */
              }
            </style>

          <div class="d-flex flex-center flex-gap social-links">
            <a href="https://www.facebook.com/elcajoniccos?mibextid=ZbWKwL">
              <i class="fa-brands fa-facebook"></i>
            </a>
            <a href="https://www.instagram.com/elcajoniccos?igsh=emkyOXM0aGt1Zzdt">
              <i class="fa-brands fa-instagram"></i>
            </a>
            <a href="https://api.whatsapp.com/send?phone=50259462166">
              <i class="fa-brands fa-whatsapp"></i>
            </a>
          </div>

            
        </div>
    </main>

    

    

    <?php

      include '.\includes\templates\footer.php';
    ?>   
</body>
</html>
