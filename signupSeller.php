<!-- php scritp  -->

<?php 
include 'config.php';
$message="";

if(isset($_POST['signup']))
{
//register now	
	
	 $data = $_POST;
	
	if (empty($data['name']) ||
    empty($data['password']) ||
    empty($data['userid']) ||
    empty($data['retypePassword'])) 
{
    
    die('Please fill all required fields!');
}

	
if ($data['password'] !== $data['retypePassword']) 
{
   die('Password and Confirm password should match!');   
}


	
	
	 $name = $_POST['name'];
	
		 $userid = $_POST['userid'];
		 	 $password = $_POST['password'];
			 	 $retypepassword = $_POST['retypePassword'];
                  $address = $_POST['address'];
                  $phoneNo = $_POST['phoneNo'];
                  $sq = $_POST['sq'];
                  $sa = $_POST['sa'];
                  $status = "active";
                  $userType="seller";

	

		

		
		$query="INSERT INTO `users`(`userid`,  `password`, `name`, `mobile`, `address`, `userType`, `status`, `secrete_question`, `secrete_answer`) VALUES ('$userid','$password','$name','$phoneNo','$address','$userType','$status','$sq','$sa')";
	
	$insert = mysqli_query($con,$query);
	
 
 
    $message="You are registered successfully";

	
	
}



include "header.php";
include "nav.php";
 ?>

<main>

            <div id="right">
               
            <form method="post" action="signupSeller.php">
    <div class="center">
<table>
<tr> <td><h2> Seller Registration </h2> </td> <td></td>   </tr>
<tr> <td>Name </td> <td><input type="text" name="name" required>   <span class="error" >*</span > </td>   </tr>
<tr> <td>User ID </td> <td><input type="text" name="userid" required> <span class="error" >*</span >   </td>   </tr>
<tr><td> Password </td> <td><input type="password" name="password" required><span class="error" >*</span > </td>   </tr>
<tr><td> Retype Password </td> <td><input type="password" name="retypePassword" required> <span class="error" >*</span ></td>   </tr>
<tr> <td>Address</td> <td><input type="text" name="address" required>   <span class="error" >*</span > </td>   </tr>
<tr> <td>Phone Number</td> <td><input type="text" name="phoneNo" required>   <span class="error" >*</span > </td>   </tr>
<tr> <td>   </td>
<tr> <td>Enter your secrete Question </td> <td><input type="text" name="sq" required>   <span class="error" >*</span > </td>   </tr>
<tr> <td>Enter your answer </td> <td><input type="text" name="sa" required>   <span class="error" >*</span > </td>   </tr>
 <tr><td></td><td> <button type="submit" name="signup"> Register Now </button>  </td>   </tr>
</table>
<?php
echo $message;
?>
</div>
</form>

            </div>

</main>