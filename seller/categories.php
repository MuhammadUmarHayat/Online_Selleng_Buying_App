<?php
include '../config.php'; 
session_start();// start the session
$userid=$_SESSION['userid'];

$query = "SELECT * FROM categories where `authority` = '$userid'"; 
$result = $con->query($query);
include("header.php");
include("nav.php");

?>
   <main>
    

        <section id="portfolio" class="portfolio section-padding ">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="section-header text-center pb-5">
                <h3>   
   <a  href="newCategory.php">Add New Category</a>
</h3>
                  
                </div>
              </div>
            </div>
            <div class="row">
              
            <?php
            if ($result->num_rows > 0) 
            {
               while ($row = $result->fetch_assoc())
                {
                    ?>
           <div class="col-12 col-md-12 col-lg-4">
                <div class="card  text-center bg-white pb-2 ">
                  <div class="card-body text-dark">
                    <div class="img-area mb-4">
                     <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['photo']); ?>" alt="" class="img-fluid">
                   
                    </div>
                    <h3 class="card-title"><?php echo $row['category'] ?></h3>
                    <p class="lead"><?php echo $row['description'] ?></p>
                    <p><?php  echo '<a style="color: #1BA098; text-decoration: none;"  href="editCategory.php?id=' . $row['id'] .'">Edit Details</a>';?></p>
                    <p> <?php echo '<a style="color: #1BA098; text-decoration: none;" href="deleteCategory.php?id=' . $row['id'] .'">Delete Details</a>';?> </p>
                    <input type="hidden" id="id" name="id" value="<?php echo $row['id']?>">
                    
                    </div>
                </div>
                </div>
              <?php
                    }
                }
            ?>

              
             

              

            </div>

            </div>
          </div>
        </section>

        




</main>



