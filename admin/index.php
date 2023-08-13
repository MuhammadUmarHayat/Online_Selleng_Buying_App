<?php
include '../config.php'; 
session_start();// start the session
$userid=$_SESSION['userid'];
$result ;
$sum ;


$total_sold_products;
$total_categories;
$total_orders;
$total_products;
$total_users;
$total_earning;
include("header.php");
include("nav.php");

?>
   <main>
<h1>Wellcome <?php echo $userid;?></h1>
   <section id="portfolio" class="portfolio section-padding ">
          <div class="container">
            
            <div class="row">
              <div class="col-12 col-md-12 col-lg-4">
                <div class="card  text-center bg-white pb-2 ">
                  <div class="card-body text-dark">
                    
                    <h3 class="card-title">Total Registered Users</h3>
                    <p class="lead">
                    <?php $countUsers="SELECT count(`userid`) AS total_users FROM `users`";
$result = mysqli_query($con, $countUsers); 
$row = mysqli_fetch_assoc($result); 
echo $total_users = $row['total_users'];?>
                       </p>
                    
                  </div>
                </div>
              </div>

              <div class="col-12 col-md-12 col-lg-4">
                <div class="card  text-center bg-white pb-2 ">
                  <div class="card-body text-dark">
                    
                    <h3 class="card-title">Total Income Generated</h3>
                    <p class="lead">
                    <?php $countEarning="SELECT sum(`total`) AS total_earning FROM `orders`";
$result = mysqli_query($con, $countEarning); 
$row = mysqli_fetch_assoc($result); 
echo $total_earning=$row['total_earning'];?>
                    </p>
                    
                  </div>
                </div>
              </div>

              <div class="col-12 col-md-12 col-lg-4">
                <div class="card  text-center bg-white pb-2 ">
                  <div class="card-body text-dark">
                    
                    <h3 class="card-title">Total Categories </h3>
                    <p class="lead">
                    <?php $countCategories="SELECT count(`id`) AS total_categories FROM `categories`";
$result = mysqli_query($con, $countCategories); 
$row = mysqli_fetch_assoc($result); 
echo $total_categories=$row['total_categories'];
?> 
                    </p>
                   
                  </div>
                </div>
                </div>
                
                <div class="col-12 col-md-12 col-lg-4">
                <div class="card  text-center bg-white pb-2 ">
                  <div class="card-body text-dark">
                    
                    <h3 class="card-title">Total Products </h3>
                    <p class="lead">
                    <?php $countProducts="SELECT count(`id`) AS total_products FROM `products`";

$result = mysqli_query($con, $countProducts); 
$row = mysqli_fetch_assoc($result); 
echo $total_products=$row['total_products'];?>
                    </p>
                   
                  </div>
                </div>
                </div>

                <div class="col-12 col-md-12 col-lg-4">
                <div class="card  text-center bg-white pb-2 ">
                  <div class="card-body text-dark">
                    
                    <h3 class="card-title">Total Sold Products </h3>
                    <p class="lead">
                    <?php 
    $countTotalSoldProducts="SELECT sum(`qty`) AS total_sold_products FROM `products`";
$result = mysqli_query($con, $countTotalSoldProducts); 
$row = mysqli_fetch_assoc($result); 
echo $total_sold_products=$row['total_sold_products'];
?>
                    </p>
                   
                  </div>
                </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4">
                <div class="card  text-center bg-white pb-2 ">
                  <div class="card-body text-dark">
                    
                    <h3 class="card-title">Total Orders</h3>
                    <p class="lead">
                    <?php $countOrders="SELECT count(`orderid`) AS total_orders FROM `orders`";
$result = mysqli_query($con, $countOrders); 
$row = mysqli_fetch_assoc($result); 
echo $total_orders=$row['total_orders'];?>
                    </p>
                   
                  </div>
                </div>
                </div>


              </div>

            </div>

            </div>
          </div>
        </section>

   </main>