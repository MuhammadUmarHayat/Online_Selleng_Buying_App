<?php
include '../config.php'; 
session_start();// start the session
$userid=$_SESSION['userid'];
$result ;


?>


<?php 

$message="";

if(isset($_POST['save']))
{

	$authority=$userid;
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

        $title = $_POST['title'];

        $category = $_POST['category'];
	
        $size = $_POST['size'];


        $unit = $_POST['unit'];

        $price = $_POST['price'];
	
        $vendor = $_POST['vendor'];
        $qty = $_POST['qty'];

        $manDate = $_POST['manDate'];
	
        $description = $_POST['description'];
        $status="ok";


                
        $query="INSERT INTO `products`(`title`, `category`, `photo`, `size`, `unit`, `price`, `vendor`, `qty`, `manDate`, `status`, `description`, `authority`) VALUES ('$title','$category','$imgContent','$size','$unit','$price','$vendor','$qty','$manDate','$status',' $description','$authority')";
        $insert = mysqli_query($con,$query);
        
     
        $message=" New product is added successfully";
    
        }
    }
        
    }
    
    
    include("header.php");
    include("nav.php");
       
?>

 <main>
 <div >
      <h2>Add New Product</h2>        

           
              <form method="post" action="newProduct.php" enctype="multipart/form-data">
      <div class="center">
  <table>
  
  <tr> <td>Title </td> <td><input type="text" name="title" required>   <span class="error" >*</span > </td>   </tr>
  <tr> <td>Category </td> 
  <td>
  <select name="category">
      <option disabled selected>-- Select Category--</option>
      <?php
      //choose category
          include "../config.php";  // Using database connection file here
          $records = mysqli_query($con, "SELECT `category` FROM `categories`");  // Use select query here 
  
          while($data = mysqli_fetch_array($records))
          {
              echo "<option value='". $data['category'] ."'>" .$data['category'] ."</option>";  // displaying data in option menu
          }	
      ?>  
    </select>
    <span class="error" >*</span >
        </td>   </tr>
  <tr> <td>Description </td> <td><input type="text" name="description" required>   <span class="error" >*</span > </td>   </tr>
  
  <tr> 
      <td>   
  <label>Select Image File:</label>
  </td>
  <td> <input type="file" name="image">
       </td>
  </tr>
  <tr> <td>Size </td> <td><input type="text" name="size" required>   <span class="error" >*</span > </td>   </tr>
  
  <tr> <td>Unit </td> <td><input type="text" name="unit" required>   <span class="error" >*</span > </td>   </tr>
  <tr> <td>Price </td> <td><input type="number" name="price" required>   <span class="error" >*</span > </td>   </tr>
  <tr> <td>Vendor </td> <td><input type="text" name="vendor" required>   <span class="error" >*</span > </td>   </tr>
  <tr> <td>Quantity </td> <td><input type="text" name="qty" required>   <span class="error" >*</span > </td>   </tr>
  <tr> <td>Manufacturing Date </td> <td><input type="date" name="manDate" required>   <span class="error" >*</span > </td>   </tr>
  
  <tr> <td> </td>
   <td> <button  class="btn btn-success btn-lg btn-block mt-3" type="submit" name="save"> save </button>  </td>   </tr>
  </table>
  <?php
  echo $message;
  ?>
  </div>
  
  
   

</main>
    
