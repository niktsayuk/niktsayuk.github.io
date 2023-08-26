<?php

    session_start();
    require_once 'connect.php';

    mysqli_query($connect, "DELETE FROM `buy_user`");
    header('Location: ../index.php');
?>
