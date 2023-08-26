<?php

    session_start();
    require_once 'connect.php';

    $first_name = $_POST['first-name'];
    $name = $_POST['name'];
    $second_name = $_POST['second-name'];
    $login = $_POST['login'];
    $e_mail = $_POST['e-mail'];
    $password = $_POST['password'];

    mysqli_query($connect, "INSERT INTO `user` (`first_name`, `name`, `second_name`,`login`,`e-mail`, `password`) 
                                        VALUES ('$first_name', '$name', '$second_name','$login','$e_mail', '$password')");

    $_SESSION['message'] = 'Регистрация прошла успешно!';
     header('Location: ../signin.php');
?>
