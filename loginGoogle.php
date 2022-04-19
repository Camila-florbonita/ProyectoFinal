<?php

//start session on web page
session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('614500226004-kj43csb97d21edr7ahb47f1pgg67dmp7.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/ProyectoFinal/InicioConCuenta.html');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?>