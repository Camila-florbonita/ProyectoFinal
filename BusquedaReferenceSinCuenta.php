<?php

session_start();
$_SESSION['Busqueda'] = $_POST["Busqueda"];

header("Location: BusquedaSinCuenta.html");
?>