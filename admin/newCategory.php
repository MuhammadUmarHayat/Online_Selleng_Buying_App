<?php
include '../config.php'; 

session_start();// start the session
$userid=$_SESSION['userid'];

$message="";



if(isset($_POST['save']))
{

	$authority=$_SESSION['userid'];
	 $data = $_POST;
	
	if (empty($data['category']) ||
    empty($data['description']) )
{
    
    die('Please fill all required fields!');
}

if(!empty($_FILES["image"]["name"])) { 
    // Get file info 
    $fileName = basename($_FILES["image"]["name"]); 
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
     
    // Allow certain file formats 
    $allowTypes = array('jpg','png','jpeg','gif'); 
    if(in_array($fileType, $allowTypes)){ 
        $image = $_FILES['image']['tmp_name']; 
        $imgContent = addslashes(file_get_contents($image)); 
        $category = $_POST['category'];
	
        $description = $_POST['description'];
        $query="INSERT INTO `categories`( `category`, `photo`, `description`, `authority`) VALUES ('$category','$imgContent','$description','$authority')";
        $insert = mysqli_query($con,$query);
        
     
       
        header('Location:'.'categories.php');
        }
    }
        
    }
    



    include("header.php");
    include("nav.php");
       

?>
<main>
 <div >
      <h2>Add New Category</h2>  


      <form method="post" action="newCategory.php" enctype="multipart/form-data">
    
<table>

<tr> <td>Title </td> <td><input type="text" name="category" required>   <span class="error" >*</span > </td>   </tr>
<tr> <td>Description </td> <td><input type="text" name="description" required>   <span class="error" >*</span > </td>   </tr>

<tr> <td>   
<label>Select Image File:</label></td>
<td> <input type="file" name="image">
     </td>
</tr>
<tr> <td> </td>
 <td> <button class="btn btn-success btn-lg btn-block mt-3" type="submit" name="save"> save </button>  </td>   </tr>
</table>
<?php
echo $message;
?>





      </div>
  
  
   

</main>
    


