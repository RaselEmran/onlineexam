<?php
//link User class....
include_once('classes/User.php');
//create object....
$user = new User();
//if user login then show exam category....and not show this page..
if (isset($_SESSION['userid'])) {
  //call url method to user class....
  $user->url("index.php");
}
//define variable.....
$msg = $pass =$match="";
//strat login script...
if (isset($_REQUEST["submit"])) {
	if (empty($_POST["emailusername"])) {
	$msg="field empty";
		
	}
	else{
	$username =$_POST["emailusername"];
  //call conection to define user class.....
	$username =mysqli_real_escape_string($user->db->conn,$username);
}
 if(empty($_POST["password"]))
  {
    $pass ="password is required";

  }
  else{
        $password = ($_POST["password"]);
        //call conection to define user class.....
        $password =mysqli_real_escape_string($user->db->conn,$password);
    }
    if ( $msg == "" && $pass =="")
    {
      //if no error then call signin method to define user class....
    	$login =$user->signin($username,$password);
    	if ($login) {
        //if login to redirect to index page.....
    		$user->url("index.php");
    	}
    	else{
    	$match= "Username and password does not match!";
    	}
    }
	
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<script src="js/jquery.min.js"></script>
  <script src=js/bootstrap.min.js"></script>
    <script src="custom.js"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body style="background-color: #2f3c2f">
	<div style="max-width: 550px; margin: 50px auto;background-color: #fff;padding: 15px">
		<h1 class="text-center" style="padding: 15px 0;background-color: #eee">Login Here</h1>
<form action="" method="post" name="login">
<table>
<tbody>
<tr>
<th>UserName or Email:</th>
<td>
<div class="form-group">
	<input type="text" class="form-control" name="emailusername" id="emailusername" />
	<span><?php echo $msg ;?></span>
</div>
</td>
</tr>
<tr>
<th>Password:</th>
<td>
<div class="form-group">
	<input type="password" class="form-control" name="password" id="password"  />
<span><?php echo $pass ?></span>
</div>
</td>
</tr>
<tr>
<td></td>
<td><input  type="submit" class="btn btn-primary btn-lg btn-block" name="submit" value="Login" id="login" />
</td>
</tr>
<tr>
	<td></td>
	<td><span><?php echo $match ?></span></td>
</tr>

<tr>
<td></td>
<td><a href="regi.php">Register new user</a></td>
</tr>
</tbody>
</table>
</form>
	</div>
	
</body>
</html>