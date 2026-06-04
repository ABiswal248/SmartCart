<?php include("header.php"); ?>

<h3 class="text-center">User Registration</h3>

<form id="regForm" class="card p-3 col-md-5 mx-auto">
  <input type="text" name="name" class="form-control mb-2" placeholder="Full Name" required>
  <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
  <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
  <button class="btn btn-primary w-100">Register</button>
</form>

<div id="msg" class="text-center mt-3"></div>

<script>
$("#regForm").submit(function(e){
  e.preventDefault();
  $.ajax({
    url:"ajax/register_action.php",
    type:"POST",
    data:$(this).serialize(),
    success:function(res){
      $("#msg").html(res);
      $("#regForm")[0].reset();
    }
  });
});
</script>

<?php include("footer.php"); ?>
