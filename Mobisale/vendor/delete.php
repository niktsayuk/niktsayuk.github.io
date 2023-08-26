<?php

    session_start();
    require_once 'connect.php';

    $id =  $_SESSION['user']['id_user'];

     mysqli_query($connect, "DELETE FROM `user` WHERE `user`.`id_user` = '$id'");
     header('Location: logout.php');
    ?>
