<?php
include('./../../PhpGenerales/conexion.php');
session_start();
$id_usuario = $_SESSION['id_usuario'];
$query = "SELECT imagen FROM imagen_perfil WHERE id_usuario = $id_usuario";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $imgDatos = mysqli_fetch_array($result);
    echo json_encode(array('imagen' => base64_encode($imgDatos['imagen'])));
} else {
    echo json_encode(array('imagen' => 'No existe'));
}
