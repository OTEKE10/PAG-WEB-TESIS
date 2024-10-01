<?php
    include '.\includes\templates\header.php';

?>

    <main class="contenedor seccion">
        <h1>Contacto</h1>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen Contacto">
        </picture>


    </main>

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

    <?php

      include '.\includes\templates\footer.php';
    ?>   
</body>
</html>
