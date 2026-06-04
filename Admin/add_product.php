<?php
session_start();
include("../db.php");

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

if(isset($_POST['save'])){
    mysqli_query($conn,"INSERT INTO products(name,price,stock) VALUES(
    '$_POST[name]','$_POST[price]','$_POST[stock]')");
    header("Location: products.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Product</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4 col-md-5">
<h3>Add Product</h3>

<form method="post">
<input type="text" name="name" class="form-control mb-2" placeholder="Product Name" required>
<input type="number" name="price" class="form-control mb-2" placeholder="Price" required>
<input type="number" name="stock" class="form-control mb-2" placeholder="Stock" required>
<button name="save" class="btn btn-success w-100">Save Product</button>
</form>
</div>
</body>
</html>
