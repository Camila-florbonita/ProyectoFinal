<?php

// $conexion = mysqli_connect("bkbu27crk4q6qk5o4l3a-mysql.services.clever-cloud.com", "uomkosaniursjqop", "RV6pM11EVvCQ5JlniERW") or die ("No se ha podido conectar al servidor de Base de datos");
// $db = mysqli_select_db($conexion, 'bkbu27crk4q6qk5o4l3a') or die ( "No se ha podido conectar a la base de datos");

$conexion = mysqli_connect("localhost", "root", "") or die ("No se ha podido conectar al servidor de Base de datos");
$db = mysqli_select_db($conexion, 'proyecto') or die ( "No se ha podido conectar a la base de datos");


?>