<?php
session_start();
if(isset($_POST['login'])){
  if($_POST['user']=="ABiswal" && $_POST['pass']=="238666"){
    $_SESSION['admin']=true;
    header("Location: products.php");
  }else{
    $error = "Invalid Admin Credentials";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5 col-md-4">
<h3>Admin Login</h3>
<?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

<form method="post">
<input type="text" name="user" class="form-control mb-2" placeholder="Username">
<input type="password" name="pass" class="form-control mb-2" placeholder="Password">
<button name="login" class="btn btn-primary w-100">Login</button>
</form>
</div>
</body>
</html>
