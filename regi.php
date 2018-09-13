<?php
//link User class.....
include_once('classes/User.php');
//create object.....
$user = new User();
//if login then not show this page...
if (isset($_SESSION['userid'])) {
  $user->url("index.php");
}
//registration will use ajax...
?>
<!DOCTYPE html>
<html lang="en">
 <head>
 <script src="js/jquery.min.js"></script>
  <script src=js/bootstrap.min.js"></script>
    <script src="custom.js"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css">
 </head>
<body style="background-color: #2f2525">
<div style="max-width: 550px; margin: 50px auto;background-color: #fff;padding: 15px">
	<h2 class="text-center py-4">User Registration Form</h2>
<form action="" method="post">
   <div class="form-group">
  <input type="text" class="form-control" name="username" id="username" placeholder="User
  ">
</div>
 <div class="form-group">
  <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email">
</div>
<div class="form-group">
  <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
</div>
  <input type="submit" class="btn btn-primary btn-lg btn-block" id="regi" value="SET">
</form>
<span id ="state" class="mt-5 pt-5" style="padding-top: 50px"></span>
</div>

</body>
</html>