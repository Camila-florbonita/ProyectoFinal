<?php

session_start();
include "database.php";
$_SESSION['Busqueda'] = $_POST["Busqueda"];
$busq = $_SESSION['Busqueda'];
$_SESSION['f1'] = "";
$_SESSION['f2'] = "";
$_SESSION['f3'] = "";
$_SESSION['f4'] = "";
$_SESSION['f5'] = "";
$_SESSION['f6'] = "";
$_SESSION['f7'] = "";
$_SESSION['f8'] = "";
$_SESSION['f9'] = "";


$ingreso = "INSERT into busqueda (busqueda) VALUES ('$busq')";
mysqli_query($conexion, $ingreso);

header("Location: BusquedaConCuenta.html");
?>