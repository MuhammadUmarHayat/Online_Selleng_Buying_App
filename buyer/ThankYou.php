<?php include '../config.php';?>
<?php
	session_start();
    $customerID="";

$customerID=$_SESSION["userid"] ;
$orderid=$_SESSION["orderid"];
if(isset($_POST['done']))
{
	
	
}


?>


<?php
$query="SELECT * FROM orders WHERE customerid = '$customerID' and order_number='$orderid'";
$result = $con->query($query); 

?>
<?php include_once "header.php"; 
include_once "nav.php";
?>
<main>            <div id="right">
               	<script>
    function doPrint() {
        var prtContent = document.getElementById('div1');
        prtContent.border = 0; //set no border here
        var WinPrint = window.open('', '', 'left=100,top=100,width=1000,height=1000,toolbar=0,scrollbars=1,status=0,resizable=1');
        WinPrint.document.write(prtContent.outerHTML);
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();
    }
</script>

<section>
    <form method="POST" action="ThankYou.php">
<div id="div1">

<h2>Your Receipet</h2>
<table border=1>
<tr>
<th>Order No</th>
 <th>Customer ID </th>
    <th>Product ID</th>
    <th>Unit Price</th>
    <th>Quantity</th>
    <th>Total</th>
    
    
</tr>
<?php
if($result->num_rows > 0)
 {
	while($row = $result->fetch_assoc())
	{		
	
?>
<tr>
<td><?php  echo $row['order_number'];?></td>
 <td><?php echo $row['customerid']; ?></td>
    <td><?php echo  $row['productId']; ?></td>
    <td><?php echo $row['price'];?></td>
    <td><?php echo $row['quantity'];?></td>
    <td><?php echo $row['total'];?> </td>

    </tr>


<?php
 }
 }
 ?>
 </table>
 <?php
 
 
        ?> 



	
</div>
<button type="submit" name="print" onclick="doPrint()" >Print Receipet</button>
<br>


                </form>
            
                </div>

</main>

