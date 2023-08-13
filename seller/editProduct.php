<?php

session_start();// start the session
$result ;
$sum ;




?>
<?php 
include '../config.php';
$message="";

$id= $_GET['id'];
$category="";
$description="";
$qty="";


$result = $con->query("SELECT * FROM `products`  where  `id`='$id'"); 
if($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {
      //`category`, `photo`, `description`      
    $id=	$row['id'];
$category= $row['category'];
        $description= $row['description'];
        $qty= $row['qty'];
        
       
        
}
           

}  





if(isset($_POST['save']))
{

	$id= $_GET['id'];
	 $data = $_POST;
	
	

 
   
       $category = $_POST['category'];
	
       $description = $_POST['description'];
       $qty=$_POST['qty'];
         $query="update `products` set `category`='$category',  `description`='$description', `qty`=$qty  where `id`='$id'";
        $insert = mysqli_query($con,$query);
        
     
        $message="Record is updated successfully";
        header('Location:'.'products.php');
    
        }
    
        
    
    
        include_once "header.php";    
        include_once "nav.php"; 
    
?>




<main>
    <h3>Edit Products</h3>
               
         
<form action="editProduct.php?id=<?php echo $id; ?>" method="post">
    <div class="center">
<table>
 
<tr><td>ID</td><td><?php echo $id; ?></td></tr>  

<tr> <td>Title </td> <td><input type="text" name="category" value="<?php echo $category; ?>" >   </td>   </tr>
<tr> <td>Description </td> <td><input type="text" name="description" value="<?php echo $description; ?>">  </td>   </tr>

<tr> <td>Quantity</td> <td><input type="text" name="qty" value="<?php echo $qty; ?>">  </td>   </tr>
<tr> <td> </td>
 <td> <button type="submit" name="save"> Save changes </button>  </td>   </tr>
</table>
<?php
echo $message;
?>
</div>
    </form>

            </div>

    </main>