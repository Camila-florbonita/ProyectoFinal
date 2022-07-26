<?php
    // session_start(); 
    // if(isset($_SESSION['id_us'])) $id_usuario = $_SESSION['id_us'];
    // if(($id_usuario) != '0'){
    //     echo json_encode(array(
    //         'id_us' => $id_usuario,
    //         'id_name' => $_SESSION['id_name'],
    //         'id_email' => $_SESSION['id_email']
    //     ));
    // }else{
    //     echo json_encode(array('id_us' => 0));
    // }

    session_start(); 
    if (isset($_SESSION['id_us']))
    {
        echo 1;
    }
    else
    {
        echo 0;
    }
?>
