<?php

    session_start();
    require_once 'connect.php';

    $login = $_POST['login'];
    $password = $_POST['password'];

    $check_user = mysqli_query($connect, "SELECT * FROM `user` WHERE `name` = '$login' AND `password` = '$password'");
    if (mysqli_num_rows($check_user) > 0) {

        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "id_user" => $user['id_user'],
            "name" => $user['name']
        ];

        header('Location: ../');

    } else {
        $_SESSION['message'] = 'Не верный логин или пароль';
        header('Location: ../auth.php');
    }
    ?>
