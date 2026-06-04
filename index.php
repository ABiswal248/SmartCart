<?php
session_start();
include("db.php");
include("header.php");

$search = "";

if(isset($_GET['search'])){
    $search = mysqli_real_escape_string($conn,$_GET['search']);

    $res = mysqli_query($conn,
    "SELECT * FROM products
     WHERE name LIKE '%$search%'
     OR description LIKE '%$search%'");
}
else{
    $res = mysqli_query($conn,
    "SELECT * FROM products");
}
?>

<!-- Hero Banner -->
<div class="bg-dark text-white p-5 rounded mb-4 text-center shadow">
    <h1>🔥 SmartCart Electronics Store</h1>
    <p class="mb-0">
        Laptops • Mobiles • Gaming • Accessories
    </p>
</div>

<!-- Search Box -->
<form method="GET" class="mb-4">
    <div class="input-group">
        <input
        type="text"
        name="search"
        class="form-control"
        placeholder="Search Products..."
        value="<?= $search; ?>">

        <button class="btn btn-primary">
            Search
        </button>
    </div>
</form>

<h3 class="mb-4">Best Deals For You</h3>

<div class="row">

<?php

if(mysqli_num_rows($res) > 0){

while($row = mysqli_fetch_assoc($res)){
?>

<div class="col-lg-3 col-md-4 col-sm-6 mb-4">

<div class="card h-100 shadow border-0">

<img
src="Images/<?php echo $row['image']; ?>"
class="card-img-top p-3"
style="height:220px; object-fit:contain;">

<div class="card-body text-center">

<h5 class="fw-bold">
<?= $row['name']; ?>
</h5>

<?php if(isset($row['description'])){ ?>
<p class="text-muted small">
<?= substr($row['description'],0,60); ?>
</p>
<?php } ?>

<h4 class="text-success fw-bold">
₹<?= number_format($row['price']); ?>
</h4>

<a href="cart.php?id=<?= $row['id']; ?>"
class="btn btn-primary w-100">

🛒 Add To Cart

</a>

</div>

</div>

</div>

<?php
}

}else{

echo "
<div class='alert alert-warning'>
No products found.
</div>";
}
?>

</div>

<?php include("footer.php"); ?>