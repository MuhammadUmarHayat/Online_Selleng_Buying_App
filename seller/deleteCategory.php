<?php include '../config.php';
 
$id= $_GET['id'];


$con->query("DELETE FROM `categories` WHERE `id`='$id'"); 
header('Location:'.'categories.php');

?>