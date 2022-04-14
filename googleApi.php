<?php

//index.php

//Include Configuration File
include('loginGoogle.php');

$login_button = '';


if(isset($_GET["code"]))
{

 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


 if(!isset($token['error']))
 {
 
  $google_client->setAccessToken($token['access_token']);

 
  $_SESSION['access_token'] = $token['access_token'];

  $google_service = new Google_Service_Oauth2($google_client);

 
  $data = $google_service->userinfo->get();

 
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
 }
}


if(!isset($_SESSION['access_token']))
{

 $login_button = '<a href="'.$google_client->createAuthUrl().'"><button type="button" style="background:#4285f4; margin-top: 15px; margin-bottom: 15px; color:white; border:none; width:300px; height:40px; border-radius:3%;"><img src="googleIcono.png" style="width:30px; background:white; border-radius:50%;" alt=""><b style="top: auto; left: 15px; position: relative">Inicia sesión con Google</b></button></a></a>';
}

?>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <!-- <title>PHP Login using Google Account</title> -->
  <title>Iniciar sesion</title>
  <link rel="stylesheet" href="styleLogin.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
 
 </head>
 <body>
 <header class="header">
            <img class="logo" src="logo_provisional.jpg">
            <form class="buscar" action="#">
                <input class="busqueda" type="text" name="busqueda" placeholder="Buscar...">
                <button class="lupa" type="submit">
                    <img src="lupa.png">
                </button>
            </form>
            <span class="companyname">
                FashionChoice
            </span>
        </header>

        
        <form class="formLogin" action="#">
            <h1 class="labelLogin">
                Inicia sesión
            </h1>

            <div class="contenedor">
                <div class="input-contenedor">
                    <img src="email.png" class="icono">
                    <input class="input" type="email" name="email" placeholder="Correo electrónico" required>
                </div>

                <div class="input-contenedor">
                    <img src="password.png" class="icono">
                    <input class="input" type="password" name="password" placeholder="Contraseña" required>
                </div>

                <button class="botonLogin" type="submit">
                    Iniciar sesión
                </button>

                <div class="panel panel-default">
                    <?php
                    if($login_button == '')
                    {
                     echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
                     echo '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" />';
                     echo '<h3><b>Name :</b> '.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</h3>';
                     echo '<h3><b>Email :</b> '.$_SESSION['user_email_address'].'</h3>';
                     echo '<h3><a href="logoutGoogle.php">Logout</h3></div>';
                    }
                    else
                    {
                     echo '<div align="center">'.$login_button . '</div>';
                    }
                    ?>
                    </div>
                    <!-- <button class="botonLoginGoogle">
                        Iniciar con Google
                    </button> -->
                

                <p class="aviso">Al registrarse aceptas nuestras Condiciones de uso y Política de privacidad.</p>

                <p class="notienescuenta">
                    ¿No tienes cuenta?
                    <a href="registro.html" class="link">
                        Regístrate
                    </a>
                </p>
            </div>
        </form>
        <!--
            
        -->

        

        <footer class="footer">
            <a class="foot" href="">
                Aviso legal
            </a>
            <a class="foot" href="">
                Politica de privacidad
            </a>
            <p class="foot">
                No se que mas vaya aqui :P
            </p>
        </footer>
 </body>
</html>