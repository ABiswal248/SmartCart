<?php include("header.php"); ?>

<h3 class="text-center">User Login</h3>

<form id="loginForm" class="card p-3 col-md-5 mx-auto">
  <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
  <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
  <button class="btn btn-success w-100">Login</button>
</form>

<div id="msg" class="text-center mt-3"></div>

<script>
$("#loginForm").submit(function(e){
  e.preventDefault();
  $.ajax({
    url:"ajax/login_action.php",
    type:"POST",
    data:$(this).serialize(),
    success:function(res){
      if(res=="success"){
        window.location="index.php";
      }else{
        $("#msg").html(res);
      }
    }
  });
});
</script>

<?php include("footer.php"); ?>
