<?php
    
    require 'includes/funciones.php';
    
    incluirTemplate('header');

?>

    <main class="contenedor seccion">

        <h2>Productos en Venta</h2>

        <?php     
            $limite = 100;
            include 'includes/templates/anuncios.php';
        ?>

       
    </main>

    <?php
        incluirTemplate('footer');
    ?>   
</body>
</html>