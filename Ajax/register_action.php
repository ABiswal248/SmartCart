<?php
include("../db.php");

$name = $_POST['name'];
$email = $_POST['email'];
$pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

$check = mysqli_query($conn,"SELECT id FROM users WHERE email='$email'");
if(mysqli_num_rows($check)>0){
  echo "<div class='alert alert-danger'>Email already exists</div>";
}
else{
  mysqli_query($conn,"INSERT INTO users(name,email,password) VALUES('$name','$email','$pass')");
  echo "<div class='alert alert-success'>Registration Successful</div>";
}
?>
