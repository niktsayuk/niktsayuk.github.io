<?php

    $connect = mysqli_connect('localhost', 'root', '', 'portal');
    
    if (!$connect) {
        die('Error connect to DataBase');
    }
?>