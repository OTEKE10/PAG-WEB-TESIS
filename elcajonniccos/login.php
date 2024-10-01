<?php
    //IMportar bas e de datos

    require 'includes/config/database.php';
    $db = conectarDB();
    
    
    //Autenticar el usuario

    $errores = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        //var_dump($_POST);


        $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
        $password = mysqli_real_escape_string($db, $_POST['password']);

        if(!$email) {
            $errores[] = "El correo es obligatorio o no valido";

        }

        if(!$password) {
            $errores[] = "El password es obligatorio o no valido";
            
        }

        if(empty($errores)) {
            //Revisar si existe el usuario

            $query = "SELECT * FROM usuarios WHERE email = '${email}' ";
            $resultado = mysqli_query($db, $query);
            

            if( $resultado->num_rows) {
                //Revisar si el password existe
                $usuario = mysqli_fetch_assoc($resultado);

                // Verificar si el password es correcto o no

                $auth = password_verify($password, $usuario['password']);

                if($auth) {
                    //El usuario esta autenticado
                    session_start();

                    //Llenar el arreglo de la sesion
                    $_SESSION['usuario'] = $usuario['email'];
                    $_SESSION['login'] = true;

                    header('Location: /admin');

                   

                } else {
                    $errores[] = 'El password es incorrecto';
                }


            } else {
                $errores[] = "El usuario no existe";
            }




        }

       



    }
    
    //Incluye el header
    require 'includes/funciones.php';
    incluirTemplate('header');

?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesion</h1>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>


            </div>

         <?php endforeach; ?>   

        <form method="POST" class="formulario">
        <fieldset>
                <legend>Correo y Contraseña</legend>

                <label  for="email">Correo</label>
                <input class="form-control" type="email" name="email" placeholder="Tu Correo" id="email" required>

                <label for="password">Contraseña</label>
                <input class="form-control" type="password" name="password" placeholder="Tu Contraseña" id="password" required>

                
        </fieldset>
        <input type="submit" value="Iniciar sesion" class="boton boton-login" id="btn-login">



        </form>
    </main>

    
    <?php
        incluirTemplate('footer');
    ?>   
