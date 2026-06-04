<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>SmartCart - Online Shopping System</title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<link rel="stylesheet" href="assets/css/style.css">

<style>
.navbar-brand{
    font-size:24px;
    font-weight:bold;
}

.search-box{
    width:300px;
}

@media(max-width:768px){
    .search-box{
        width:100%;
        margin-top:10px;
    }
}
</style>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">

<div class="container">

<a class="navbar-brand" href="index.php">
🛒 SmartCart
</a>

<button
class="navbar-toggler"
type="button"
data-bs-toggle="collapse"
data-bs-target="#navbarNav">

<span class="navbar-toggler-icon"></span>

</button>

<div class="collapse navbar-collapse" id="navbarNav">

<form
class="d-flex mx-auto search-box"
action="index.php"
method="GET">

<input
type="text"
name="search"
class="form-control me-2"
placeholder="Search products...">

<button
class="btn btn-light"
type="submit">

Search

</button>

</form>

<div class="ms-auto">

<a href="view_cart.php"
class="btn btn-warning btn-sm me-2">

🛒 Cart
(
<?php
echo isset($_SESSION['cart'])
? array_sum($_SESSION['cart'])
: 0;
?>
)

</a>

<?php
if(isset($_SESSION['user'])){
?>

<span class="text-white me-2">
Welcome
</span>

<a href="logout.php"
class="btn btn-danger btn-sm">

Logout

</a>

<?php
}else{
?>

<a href="register.php"
class="btn btn-light btn-sm me-2">

Register

</a>

<a href="login.php"
class="btn btn-light btn-sm">

Login

</a>

<?php
}
?>

</div>

</div>

</div>

</nav>

<div class="container mt-4">