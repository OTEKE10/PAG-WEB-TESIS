<?php
    session_start();

    if(!isset($_SESSION)){
        session_start();
    }
    
    $auth = $_SESSION['login'] ?? false;

    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EL CAJON DE NICCOS</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
    
    <header class="header inicio">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <img src="/build/img/logo cajon.svg" alt="Logotipo de cajon">
                </a>

                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="icono menu responsive">
                </div>

                <div class="derecha">
                    <nav class="navegacion">
                        <a href="../nosotros.php">Sobre Nosotros</a>
                        <a href="../anuncios.php">Productos</a>
                        <a href="../blog.php">Blog</a>
                        <a href="../contacto.php">Contacto</a>
                        <?php if($auth): ?>
                            <a href="../cerrar-sesion.php">Cerrar Sesion</a>
                        <?php endif; ?>
                    </nav>
                </div>
   
                
            </div> <!--.barra-->

            

            <h1>Hecho con amor. De todo un poco</h1>
        </div>
    </header>