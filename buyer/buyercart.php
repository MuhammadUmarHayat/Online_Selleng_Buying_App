<?php
include '../config.php';
session_start(); // Start the session
$username = $_SESSION['username'];
$result = $con->query("SELECT * FROM `carts` WHERE `customerid`='$username'");
?>

<?php
 include("header.php"); 
 include("nav.php"); 
?>
<main>
<section>
    <h2 style="text-align:center">Item list</h2>
    <form action="mycart.php" method="POST">
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th></th>
                <th></th>
            </tr>

            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // `id`, `customer`, `productId`, `price`, `qty`, `total`
                    ?>

                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['customerid'] ?></td>
                        <td><?php echo $row['productid'] ?></td>
                        <td><?php echo $row['unitprice'] ?></td>
                        <td><?php echo $row['qty'] ?></td>
                        <td><?php echo $row['total'] ?></td>
                        <td>
                            <a href="editCart.php?id=<?php echo $row['id']; ?>" style="text-decoration: none;">Edit Quantity</a>
                        </td>
                        <td>
                            <a href="deleteCart.php?id=<?php echo $row['id']; ?>" style="text-decoration: none;">Remove Details</a>
                        </td>
                    </tr>

                <?php
                }
            } else {
                // Display a message if there are no items in the cart
                ?>

                <tr>
                    <td colspan="8" style="text-align: center;">No items in the cart.</td>
                </tr>

            <?php
            }
            ?>
        </table>
    </form>
</section>
        </main>