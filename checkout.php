<?php 
session_start();
if ($_SESSION['user_id'] && $_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['function'] === 'addToCart' ) {
        array_push($_SESSION['cart'],$_POST['itemId']);
        echo count($_SESSION['cart']) ;
    }
}
?>