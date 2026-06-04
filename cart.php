<?php
session_start();
include("db.php");

/* Create cart session */
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}

/* Get product id */
if(isset($_GET['id'])){

    $product_id = $_GET['id'];

    if(isset($_SESSION['cart'][$product_id])){
        $_SESSION['cart'][$product_id]++;
    }else{
        $_SESSION['cart'][$product_id] = 1;
    }

    header("Location:view_cart.php");
}
?>