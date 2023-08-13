<?php
include 'config.php'; 

$message="";
if(isset($_POST['save']))
{
    ////userid,sq,sa,newPw1,newPw2
   
	
	 $data = $_POST;
     $userid= $data['userid'];
     $sq= $data['sq'];
     $sa= $data['sa'];
    $newPw1=$data['newPw1'];
    $newPw2=$data['newPw2'];


	
	

 if($data['newPw1']==$data['newPw2']) 
{ 
    // Get file info 
   
    $result = $con->query("SELECT * FROM `users`  where  `userid`='$userid' and `secrete_question`='$sq' and `secrete_answer`='$sa'"); 
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


      <form action="forgetPassword.php" method="post">
    
<table>
<tr> <td>Enter User id </td> <td> <input type="text" name="userid" required>   <span class="error" >*</span > </td>   </tr>
<tr> <td>Enter your Secrete Question </td> <td><input type="text" name="sq" required>   <span class="error" >*</span > </td>   </tr>
<tr> <td>Enter your Secrete Answer</td> <td><input type="text" name="sa" required>   <span class="error" >*</span > </td>   </tr>
<tr> <td>Enter new Password  </td> <td><input type="password" name="newPw1" required>   <span class="error" >*</span > </td>   </tr>
<tr> <td>Enter new Password Again </td> <td><input type="password" name="newPw2" required>   <span class="error" >*</span > </td>   </tr>


<tr> <td> </td>
 <td> <button class="btn btn-success btn-lg btn-block mt-3" type="submit" name="save"> save </button>  </td>   </tr>
</table>
<?php
echo $message;
?>





      </div>
  
  
   

</main>
    


