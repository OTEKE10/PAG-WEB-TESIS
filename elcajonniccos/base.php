<?php
    
    require 'includes/funciones.php';
    
    incluirTemplate('header');

?>

    <main class="contenedor seccion">
        <h1>EL CAJON DE NICCOS</h1>
    </main>

    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="nosotros.php">Nosotros</a>
                <a href="anuncios.php">Anuncios</a>
                <a href="blog.php">Blog</a>
                <a href="contacto.php">Contacto</a>
            </nav>
        </div>

        <p class="copyright">Todos los derechos Reservados 2024 &copy;</p>
    <?php
        incluirTemplate('footer');
    ?>   
</body>
</html>