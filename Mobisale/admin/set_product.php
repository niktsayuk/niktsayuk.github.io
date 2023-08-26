<?php

    session_start();
    require_once '../vendor/connect.php';

    $name = $_POST['name'];
    $price = $_POST['price'];
    $img_name = $_FILES['image']['name'];
    $img_tmp_name = $_FILES['image']['tmp_name'];

    move_uploaded_file($img_tmp_name, '../uploads/'.$img_name);

    $path = 'uploads/'.$img_name;

    mysqli_query($connect, "INSERT INTO `product` (`name`, `image`, `price`) VALUES ('$name','$path', $price)");
    header('Location: index.php');
?>