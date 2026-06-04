<?php
session_start();
include("db.php");
include("header.php");

$total = 0;
?>

<h3>Your Cart</h3>

<table class="table">
<tr>
<th>Product</th>
<th>Price</th>
<th>Qty</th>
<th>Total</th>
</tr>

<?php
if(!empty($_SESSION['cart'])){

foreach($_SESSION['cart'] as $id=>$qty){

$res = mysqli_query($conn,
"SELECT * FROM products WHERE id=$id");

$row = mysqli_fetch_assoc($res);

$subtotal = $row['price'] * $qty;
$total += $subtotal;
?>

<tr>
<td><?= $row['name']; ?></td>
<td>₹<?= $row['price']; ?></td>
<td><?= $qty; ?></td>
<td>₹<?= $subtotal; ?></td>
</tr>

<?php }} ?>

<tr>
<td colspan="3"><b>Grand Total</b></td>
<td><b>₹<?= $total; ?></b></td>
</tr>

</table>

<?php include("footer.php"); ?>