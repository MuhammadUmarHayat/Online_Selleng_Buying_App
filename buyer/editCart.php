<?php include '../config.php';
//get data 
$id= $_GET['id'];
$customer="";
 
$productId =""; 
$price="";
  $qty="";
 $total="";

$result = $con->query("SELECT * FROM `carts`  where  `id`='$id'"); 

if($result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
	{
			
    //  $row['id'] 
     $customer=    $row['customerid']; 
      $productId=   $row['productid']; 
      $price=         $row['unitprice'] ;
        $qty= $row['qty'] ;
       $total=  $row['total'] ;
		
	   
		
		
		
}
}


 
if(isset($_POST["submit"]))
{
   // update cart
////`customer`, `productId`, `price`, `qty`, `total`
$id= $_GET['id'];
		
$qty= $_POST['qty'];
	
		

$result = $con->query("SELECT * FROM `carts`  where  `id`='$id'"); 

if($result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
	{
			
    //  $row['id'] 
     $customer=    $row['customerid']; 
      $productId=   $row['productid']; 
      $price=         $row['unitprice'] ;
       
       $total=  $row['total'] ;
		
	   
		
		
		
}
}
$total=$price*$qty;







	echo $sql="UPDATE `carts` SET `qty`='$qty', `total`='$total' where  `id`='$id'";
		
		
		
   
		
	
	$insert = $con->query($sql); 
             if($insert){ 
                $status = 'success'; 
                echo $statusMsg = "Record is updates successfully."; 
                header('Location:'.'buyercart.php');
            }else{ 
               echo $statusMsg = "Failed, please try again."; 
            }  
	
	
	
	
}





?>
<?php
include("header.php");
include("nav.php");
?>
<main>
<form action="editCart.php?id=<?php echo $id; ?>" method="post">
<table>


<tr><td> ID</td><td><?php echo $id; ?></td></tr>
<tr><td>customer</td><td><?php echo $customer; ?></td></tr>
<tr><td>Product </td><td><?php echo $productId; ?></td></tr>
<tr><td>Price</td><td><?php echo $price; ?></td></tr>
<tr><td>Old Quantity</td><td><?php echo $qty; ?></td></tr>
<tr><td>Update Quantity</td><td><input type="number" name="qty" value="<?php echo $qty; ?>"></td></tr>
<tr><td>Total</td><td><?php echo $total; ?></td></tr>


</td></tr>
<tr><td></td><td><input class="btn-success" type="submit" name="submit" value="Save Changes"></td></tr>


</table>
</form>
</main>