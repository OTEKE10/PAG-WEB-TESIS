<?php
    //Autenticar el usuario

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        var_dump($_POST);


        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

        var_dump($email);
        $password = $_POST['password'];



    }
    
    //Incluye el header
    require 'includes/funciones.php';
    incluirTemplate('header');

?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesion</h1>

        <form method="POST" class="formulario">
        <fieldset>
                <legend>Correo y Contraseña</legend>

                <label for="email">Correo</label>
                <input type="email" name="email" placeholder="Tu Correo" id="email">

                <label for="password">Contraseña</label>
                <input type="password" name="password" placeholder="Tu Contraseña" id="password">

                
        </fieldset>
        <input type="submit" value="Iniciar sesion" class="boton boton-verde">



        </form>
    </main>

    
    <?php
        incluirTemplate('footer');
    ?>   