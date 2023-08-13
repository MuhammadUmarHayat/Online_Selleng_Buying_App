<?php include '../config.php'; 

session_start();
$customerID="";
$customerID=$_SESSION['userid'] ;


if(isset($_POST['order']))
{
	header('Location:'.'payments.php');
}
?>
<?php include_once "header.php";
include_once "nav.php";
 ?>
<main>


            <div id="right">
<center>
<table border=1>
    <tr>
    <td>#</td>
    <td>Customer</td>
    <td>Product </td>
    <td>Unit Price</td>
    <td>Quantity</td>
    <td>Total Price</td>
    </tr>
<?php

    $result = $con->query("SELECT * FROM `carts` WHERE `customerid`='$customerID'"); 


    if ($result->num_rows > 0) 
    {
       while ($row = $result->fetch_assoc())
        {
            echo"<tr><td>".$row['id']."</td><td>".$row['customerid']."</td><td>".$row['productid']."</td><td>".$row['unitprice']."</td><td>".$row['qty']."</td><td>".$row['total']."</td></tr>";
        }
    }
     ?>


</table>     
</center>      
<?php
       


    $result = mysqli_query($con, 'SELECT SUM(`total`) AS value_sum FROM carts where `customerid`="'.$customerID.'"');
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];
echo "<br> <h2>Total Amount : ".$sum."</h2>";
?>
<form action="checkout.php" method="post">
<button type="submit" name="order">Place Order</button>
                </form>
 </div>

</div>
</div>
<div id="footer">
   
</div>


</main>