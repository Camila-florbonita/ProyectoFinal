<?php
    session_start();
    if(isset($_SESSION['id_us'])) session_destroy();
?>