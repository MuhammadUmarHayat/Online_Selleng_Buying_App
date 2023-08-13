<?php include '../config.php'; ?>

<?php
session_start(); // Start the session
$customerID = null; // Initialize customer ID variable
if (isset($_POST['checkout'])) {
    header('Location:'.'checkout.php');
    exit; // Add exit after redirection
}
if (isset($_SESSION['userid']) && $_SESSION['userid'] != null) {
    $customerID = $_SESSION['userid'];
}

$productid = $_GET['id'];

$_SESSION["productid"] = $productid;
$productid = $_SESSION["productid"];

if (isset($_POST['done'])) // Add to cart
{
    $cusId = $customerID;
    $productid = $_POST['id'];

    $result = $con->query("SELECT * FROM products WHERE id = '$productid'");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $price = $row['price'];
        $qty = $_POST['qty'];
        $TotalPrice = $price * $qty;

        //echo "<br> cusId " . $cusId . " productid " . $productid . " price " . $price . " qty " . $qty . " TotalPrice " . $TotalPrice;

        $status = "added";
        $q1 = "INSERT INTO `carts`(`customerid`, `productid`, `qty`, `unitprice`, `total`, `status`) VALUES ('$cusId','$productid','$qty','$price','$TotalPrice','$status')";
        $query = mysqli_query($con, $q1);
        echo "thank you";

        header('Location:'.'buyercart.php');
        exit; // Add exit after redirection
    }
}

$result = $con->query("SELECT * FROM `products` WHERE `id`='$productid'");
?>

<?php
 include_once "header.php";
 include("nav.php");
 ?>

<main>
            <div >
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
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                     
                            <form action="viewProducts.php" method="post">
                            <div class="col-12 col-md-12 col-lg-4">
                <div class="card  text-center bg-white pb-2 ">
                  <div class="card-body text-dark">
                    <div class="img-area mb-4">
                     <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['photo']); ?>" alt="" class="img-fluid">
                   
                    </div>
                    <h3 class="card-title"><?php echo $row['title'] ?></h3>
                    <p class="lead"><?php echo $row['description'] ?></p>
                    <p class="lead"><?php echo $row['price'] ?>$</p>
                   <p> <input type="hidden" id="id" name="id" value="<?php echo $row['id']?>"> <p>
                              <p>      Quantity:
                                    <select name="qty" id="qty">
                                        <option value="Select">--Select--</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </p>
                                <p><button id="done" name="done">Add to Cart</button></p>
                                
                            </form>
                        </div>
                <?php
                    }
                }
                ?>
                <div style="text-align: center; margin-top: 20px;">
                    <a href="buyercart.php" class="btn">View My Cart</a>
                </div>
            </main>