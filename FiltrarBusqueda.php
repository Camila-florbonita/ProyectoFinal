<?php
session_start();

$valueBoton = $_POST["boton"];

if($valueBoton == "aplicar")
{
$_SESSION['f1'] = $_POST["genero"];
$_SESSION['f2'] = $_POST["estilo"];
$_SESSION['f3'] = $_POST["edad"];
$_SESSION['f4'] = $_POST["color"];
$_SESSION['f5'] = $_POST["tipodeprenda"];
$_SESSION['f6'] = $_POST["temporada"];
$_SESSION['f7'] = $_POST["ocasion"];
$_SESSION['f8'] = $_POST["formalidad"];
$_SESSION['f9'] = $_POST["material"];
echo $_SESSION['f1'];
echo $_SESSION['f2'];
echo $_SESSION['f3'];
echo $_SESSION['f4'];
echo $_SESSION['f5'];
echo $_SESSION['f6'];
echo $_SESSION['f7'];
echo $_SESSION['f8'];
echo $_SESSION['f9'];
}

if($valueBoton == "borrar")
{
    $_SESSION['f1'] = "";
    $_SESSION['f2'] = "";
    $_SESSION['f3'] = "";
    $_SESSION['f4'] = "";
    $_SESSION['f5'] = "";
    $_SESSION['f6'] = "";
    $_SESSION['f7'] = "";
    $_SESSION['f8'] = "";
    $_SESSION['f9'] = "";
}
header("Location: BusquedaConCuenta.html");
?>