<?php
include('database.php');
$revisar = getimagesize($_FILES["image"]["tmp_name"]);
session_start(); 
$id_usuario = $_SESSION['id_usuario'];
if($revisar !== false){
    $image = $_FILES['image']['tmp_name'];
    $imgContenido = addslashes(file_get_contents($image));
    echo json_encode(array('imagen' => $imgContenido));
    $query = "DELETE FROM imagen_perfil WHERE id_usuario = $id_usuario";
    $insertar = mysqli_query($conn,$query);
    $query = "INSERT INTO imagen_perfil (imagen, id_usuario) VALUES ('$imgContenido',$id_usuario)";
    $insertar = mysqli_query($conn,$query);
    if(true){
        echo json_encode(array('status' => 1));
    }else{
        echo json_encode(array('status' => 0));
    } 
}else{
    echo json_encode(array('status' => -1));
}
?>