<?php
include '../config.php'; 
session_start();// start the session
$userid=$_SESSION['userid'];
//$id;

$query = "SELECT * FROM products "; 
$result = $con->query($query);



include("header.php");
include("nav.php");

?>
   <main>
   
   <h1>Wellcome <?php echo $userid;?></h1>
   
        <section id="portfolio" class="portfolio section-padding ">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="section-header text-center pb-5">
                
                  
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
                    <h3 class="card-title"><?php echo $row['title'] ?></h3>
                    <p class="lead"><?php echo $row['description'] ?></p>
                    <p class="lead"><?php echo $row['price'] ?>$</p>
                   
                    <input type="hidden" id="id" name="id" value="<?php echo $row['id']?>">

                   
                    <a class="btn btn-success btn-lg btn-block mt-3" href="viewProducts.php?id=<?php echo $row['id']; ?>" style="text-decoration: none;">Buy Now</a> 
               
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



