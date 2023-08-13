<?php
include 'config.php';
$message="";

if(isset($_POST['submit']))
{
   
    $userType=$_POST["userType"];
	$userid = $_POST['userid'];
	$password = $_POST['password'];

if($userid=="admin" && $password=="admin")
{
    session_start();// start the session
    $_SESSION['userid'] = $userid;
    header('Location:'.'admin/index.php');
}
else
{
    if($userType=="buyar")
    {

        $query="SELECT * FROM  `users` where  `userid`= '$userid' and  `password`='$password' ";

         $result = mysqli_query($con, $query);
            if ($result->num_rows > 0) 
                {
                    $row = $result->fetch_assoc();
                    session_start();
                    $_SESSION['userid'] =$userid;
                    $_SESSION['username'] = $row['name'];
                    header('Location:'.'buyer/index.php');
            
                }
            else{
            
                $message ="Wrong user id or password";
                }
    }
    if($userType=="seller")
    {

        $query="SELECT * FROM  `users` where  `userid`= '$userid' and  `password`='$password' ";

         $result = mysqli_query($con, $query);
            if ($result->num_rows > 0) 
                {
                    $row = $result->fetch_assoc();
                    session_start();
                    $_SESSION['userid'] =$userid;
                    $_SESSION['username'] = $row['name'];
                    header('Location:'.'seller/index.php');
            
                }
            else{
            
                $message="Wrong user id or password";
                }
    }




    $message="Wrong user id or password";



}


}

?>


<?php
include("header.php");
include("nav.php");
?>
<main>
<section>
    
    <form action="login.php" method="post">
    <table>
    <tr><td><h2>Login</h2></td>  <td></td></tr>
    <tr>
<td></td> 
    <td>
<input type="radio" name="userType"
<?php if (isset($userType) && $userType=="buyar") echo "checked";?>
 value="buyar">Buyar
 <input type="radio" name="userType"
<?php if (isset($userType) && $userType=="seller") echo "checked";?>
 value="seller">Seller<br>
 </td>   </tr>

<tr> <td>User ID </td> <td><input type="text" name="userid" required> <span class="error" >*</span >   </td>   </tr>
<tr><td> Password </td> <td><input type="password" name="password" required><span class="error" >*</span > </td>   </tr>

    
    <tr>
            <td></td>
            <td><input class="btn btn-success btn-lg btn-block mt-3" type="submit" name="submit" value="submit"/></td>
            <td><?php echo $message?></td>
        </tr> 
        <tr><td></td>
        <td><a style="color:blue;"href="forgetPassword.php">Forget Password</a></td>
    </table>
</form>
</section>
</main>
