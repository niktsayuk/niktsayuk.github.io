<?php

    session_start();
    require_once 'connect.php';

    $login = $_POST['login'];
    $password = $_POST['password'];
    mysqli_query($connect, "INSERT INTO `user` (`name`, `password`) VALUES ('$login','$password')");

    $_SESSION['message'] = 'Регистрация прошла успешно!';
     header('Location: ../auth.php');
?>
