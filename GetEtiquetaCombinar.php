<?php

session_start();
$_SESSION['etq'] = $_POST["etiqueta"];
$_SESSION['cat'] = $_POST["etiquetas"];

echo $_SESSION['etq'];
echo $_SESSION['cat'];

header("Location: CombinacionAtuendosEtiquetas.html");
?>