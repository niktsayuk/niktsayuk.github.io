<?php

    session_start();
    require_once 'connect.php';

    $id = $_GET['id'];

    $products = mysqli_query($connect, "SELECT * FROM `product` WHERE `id_product` = '$id'");
    $products = mysqli_fetch_all($products);
    foreach($products as $product)
    {
        $name = $product[1];
        $path = $product[2];
        $price = $product[3];
    }
    mysqli_query($connect, "INSERT INTO `buy_user` (`name`, `image`, `price`) VALUES ('$name','$path', '$price')");
    header('Location: ../index.php');
?>