<?php
session_start();
include("../db.php");

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

$res = mysqli_query($conn, "SELECT * FROM products");
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin - Products</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
<h3>Product Management</h3>

<a href="add_product.php" class="btn btn-success mb-3">Add Product</a>

<table class="table table-bordered">
<tr>
  <th>ID</th>
  <th>Name</th>
  <th>Price</th>
  <th>Stock</th>
  <th>Action</th>
</tr>

<?php
if(mysqli_num_rows($res)>0){
while($row = mysqli_fetch_assoc($res)){
?>
<tr>
  <td><?= $row['id']; ?></td>
  <td><?= $row['name']; ?></td>
  <td><?= $row['price']; ?></td>
  <td><?= $row['stock']; ?></td>
  <td>
    <a href="edit_product.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
    <a href="delete_product.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
  </td>
</tr>
<?php
}}
?>
</table>
</div>
</body>
</html>
