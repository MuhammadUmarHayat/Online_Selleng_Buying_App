<?php include '../config.php';
 
$id= $_GET['id'];


 $con->query("DELETE FROM `carts` WHERE `id`='$id'"); 
             
               
 header('Location:'.'buyercart.php');

             

?>