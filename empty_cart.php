<?php
include('settings.php');
unset($_SESSION["cart_products"]);
header('Location:index.php');
?>