<?php include '../config.php';
 
$id= $_GET['id'];


$con->query("DELETE FROM `products` WHERE `id`='$id'"); 
header('Location:'.'products.php');

?>