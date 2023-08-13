<?php
include '../config.php'; 

session_start();// start the session
$userid=$_SESSION['userid'];
$message="";
if(isset($_POST['save']))
{
    ////$userid;oldPw,newPw1,newPw2
    $userid= $_GET['id'];
	
	 $data = $_POST;
    $oldPw= $data['oldPw'];
    $newPw1=$data['newPw1'];
    $newPw2=$data['newPw2'];

	
	if (empty($data['oldPw']) ||
    empty($data['newPw1']) )
{
    
    die('Please fill all required fields!');
}

else if($data['newPw1']==$data['newPw2']) 
{ 
    // Get file info 
   
    $result = $con->query("SELECT * FROM `users`  where  `userid`='$userid' and `password`='$oldPw'"); 
    if($result->num_rows > 0)
    {
       
        $query="update  `users` set `password`='$newPw1' where  `userid`='$userid' ";
        $insert = mysqli_query($con,$query);
        
     
       
        $message="Password has been changed successfuly! ";
    }
    else
    {
        $message=" Old password is wrong .Please try again!";
    }
    }
    else{
        $message="New passwords don't matched ";
    }
        
    }
    



    include("header.php");
    include("nav.php");
       

?>
<main>
 <div >
      <h2>Add New Category</h2>  


      <form action="changePassword.php?id=<?php echo $userid; ?>" method="post">
    
<table>
<tr> <td>User id </td> <td> <?php echo $userid; ?></td>   </tr>
<tr> <td>Enter old Password </td> <td><input type="password" name="oldPw" required>   <span class="error" >*</span > </td>   </tr>
<tr> <td>Enter new Password </td> <td><input type="password" name="newPw1" required>   <span class="error" >*</span > </td>   </tr>
<tr> <td>Enter new Password Again </td> <td><input type="password" name="newPw2" required>   <span class="error" >*</span > </td>   </tr>


<tr> <td> </td>
 <td> <button class="btn btn-success btn-lg btn-block mt-3" type="submit" name="save"> save </button>  </td>   </tr>
</table>
<?php
echo $message;
?>





      </div>
  
  
   

</main>
    


