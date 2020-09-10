<?php

    //$nombre = $_POST["nombre"];
    $error = '';
    if(empty($_POST["nombre"])){
        $error = 'Ingresa un nombre <br>';
    }else{
        $nombre = $_POST["nombre"];
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
    }

    if(empty($_POST["email"])){
        $error .= 'Ingresa un Email <br>';
    }else{
        $email = $_POST["email"];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error .= "Ingresa un E-mail correcto. <br>";
        }else{
            $email = filter_var(FILTER_SANITIZE_EMAIL);
        }
    }

    if(empty($_POST["mensaje"])){
        $error .= 'Ingresa un mensaje <br>';
    }else{
        $mensaje = $_POST["mensaje"];
        
        $mensaje = filter_var($nombre, FILTER_SANITIZE_STRING);
    }

    //MENSAJE PARA ENVIAR 
    $cuerpo = 'Nombre: ' . $nombre . '\n';
    $cuerpo .= 'Email: ' . $email . '\n';
    $cuerpo .= 'Mensaje: ' . $mensaje .'\n';

    $EnviarA = 'Camilacp4699@gmail.com';
    $asunto = 'Simple prueba de mensajes';

    if($error==''){
        $success = mail($EnviarA, $asunto, $cuerpo, 'from: '.$email, 'hola');
        
        echo "exito";
    }else{
        echo $error;
    }
?>