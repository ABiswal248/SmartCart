<?php
session_start();
include("db.php");
include("header.php");

$total = 0;

if(empty($_SESSION['cart'])){
    echo "<div class='alert alert-warning'>
            Your cart is empty.
          </div>";
    include("footer.php");
    exit();
}

foreach($_SESSION['cart'] as $id=>$qty){

    $res = mysqli_query($conn,
    "SELECT * FROM products WHERE id=$id");

    $row = mysqli_fetch_assoc($res);

    $total += ($row['price'] * $qty);
}
?>

<h2>Checkout</h2>

<form method="post" action="place_order.php">

<div class="mb-3">
<label>Name</label>
<input type="text"
name="customer_name"
class="form-control"
required>
</div>

<div class="mb-3">
<label>Address</label>
<textarea
name="address"
class="form-control"
required></textarea>
</div>

<div class="mb-3">
<label>Phone</label>
<input type="text"
name="phone"
class="form-control"
required>
</div>

<div class="alert alert-success">
<h4>Total Amount: ₹<?= $total ?></h4>
</div>

<button
class="btn btn-success">
Place Order
</button>

</form>

<?php include("footer.php"); ?>