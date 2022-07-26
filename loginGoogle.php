<?php


require 'google-api-php-client--PHP8.0/vendor/autoload.php';
include "database.php";

session_start();
 
// init configuration
$clientID = '495801222005-278r2r4ojcehbgrq9o1t8d0g4flbj985.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/ProyectoFinal/loginGoogle.php';
  
// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");
 
// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token['access_token']);
  
  // get profile info
  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $email =  $google_account_info->email;
  $name =  $google_account_info->name;

  $query = "SELECT * from usuarios WHERE correo_electronico = '$email'";
  $result = mysqli_query($conexion, $query);
  if($registro = mysqli_fetch_array($result))
  {
    echo "<script>
    window.location.href = 'InicioConCuenta.html';
    </script>
    ";
    $_SESSION["id_us"] = $registro['id_usuario'];
    $_SESSION["id_name"] = $registro['nombre_usuario'];
    $_SESSION["id_email"] = $registro['correo_electronico'];
  }
  else
  {
    $ingreso = "INSERT into usuarios (nombre_usuario, correo_electronico, password) VALUES ('$name','$email','$name')";
    mysqli_query($conexion, $ingreso);
    $query2 = "SELECT * from usuarios WHERE correo_electronico = '$email'";
    $result2 = mysqli_query($conexion, $query2);
    $registro2 = mysqli_fetch_array($result2);
    $_SESSION["id_us"] = $registro['id_usuario'];
    $_SESSION["id_name"] = $registro['nombre_usuario'];
    $_SESSION["id_email"] = $registro['correo_electronico'];

    echo "<script>
    window.location.href = 'InicioConCuenta.html';
    </script>
    ";
    
  }

  

 
  // now you can use this profile info to create account in your website and make user logged in.
} else {
  echo "";
    echo "<a href='".$client->createAuthUrl()."'>
    <button id='botonuwu'>
    Google Login
    </button>
    </a>";
    echo "";

    echo "<script>
    document.getElementById('botonuwu').click();
    </script>
    ";
}
?>