<?php
session_start();
include("../db.php");

$error = "";

if(isset($_POST['login'])){

    $username = mysqli_real_escape_string($conn,$_POST['user']);
    $password = mysqli_real_escape_string($conn,$_POST['pass']);

    $query = mysqli_query($conn,
    "SELECT * FROM admins WHERE username='$username'");

    if(mysqli_num_rows($query) > 0){

        $admin = mysqli_fetch_assoc($query);

        if(password_verify($password,$admin['password'])){

            $_SESSION['admin'] = $admin['username'];

            header("Location: products.php");
            exit();

        }else{
            $error = "Invalid Password";
        }

    }else{
        $error = "Admin Not Found";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>SmartCart Admin Login</title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f4f6f9;
}

.login-card{
    margin-top:100px;
    border-radius:15px;
}

</style>

</head>

<body>

<div class="container">

<div class="row justify-content-center">

<div class="col-md-5">

<div class="card shadow login-card">

<div class="card-header bg-primary text-white text-center">

<h3>🛒 SmartCart Admin Panel</h3>

</div>

<div class="card-body">

<?php if($error!=""){ ?>

<div class="alert alert-danger">
    <?= $error; ?>
</div>

<?php } ?>

<form method="POST">

<div class="mb-3">

<label class="form-label">
Username
</label>

<input
type="text"
name="user"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label">
Password
</label>

<input
type="password"
name="pass"
class="form-control"
required>

</div>

<button
name="login"
class="btn btn-primary w-100">

Login

</button>

</form>

</div>

</div>

</div>

</div>

</div>

</body>
</html>