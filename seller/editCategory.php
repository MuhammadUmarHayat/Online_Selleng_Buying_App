<?php
include '../config.php'; 
session_start();// start the session
$result ;
$sum ;


$message="";

$id= $_GET['id'];
$category="";
$description="";


$result = $con->query("SELECT * FROM `categories`  where  `id`='$id'"); 
if($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {
      //`category`, `photo`, `description`      
    $id=	$row['id'];
$category= $row['category'];
        $description= $row['description'];
        
       
        
}
           

}  





if(isset($_POST['save']))
{

	$id= $_GET['id'];
	 $data = $_POST;
	
	

 
   
       $category = $_POST['category'];
	
       $description = $_POST['description'];

         $query="update `categories` set `category`='$category',  `description`='$description' where `id`='$id'";
        $insert = mysqli_query($con,$query);
        
     
        $message="Record is updated successfully";
        header('Location:'.'categories.php');
    
        }
    
        
    
    
    
    



        include("header.php");
        include("nav.php");

?>


<main>
     
            <div id="right">
            
            <form action="editCategory.php?id=<?php echo $id; ?>" method="post">
    <div class="center">
<table>
 
<tr><td>ID</td><td><?php echo $id; ?></td></tr>  

<tr> <td>Title </td> <td><input type="text" name="category" value="<?php echo $category; ?>" >  <span class="error" >*</span > </td>   </tr>
<tr> <td>Description </td> <td><input type="text" name="description" value="<?php echo $description; ?>" >  <span class="error" >*</span > </td>   </tr>


<tr> <td> </td>
 <td> <button type="submit" name="save"> Save changes </button>  </td>   </tr>
</table>
<?php
echo $message;
?>
</div>


            
    </main>