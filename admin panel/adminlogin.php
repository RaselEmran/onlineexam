<?php
include_once("../classes/Admin.php");
$ad = new Admin();
if (isset($_SESSION['username'])) {
  //call url method to user class....
  $ad->url("index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
<?php
include_once("head.php");
?>
<style>
	body{
		margin: 0;
		padding: 0;
		background-color: #444;

	}
	.main{
		max-width: 700px;
		margin: 50px auto;
		border: 1px solid;
		padding: 100px;
		box-shadow: 5px 10px 5px 10px 
	}
	.main h2{
		padding: 10px;
		text-align: center;
		color: #fff;
		background-color: #2f2f2f;
	}
	.main .login{
		max-width: 500px;
		border: 1px solid;
		margin: 0 auto;
	}
	.main .login form{
		background-color: #eee;
		padding: 10px 15px
	}
	.main .login form table{
		width: 100%;
	}
	.main .login input[type="text"],input[type="password"]
	{
		outline: 0;
		border: none;
	}
	.main .login input[type="text"]:focus,input[type="password"]:focus
	{
		background-color: #252525;
		color: #fff;
	}
	.main .login input[type="submit"]:active
	{
		background-color: red;


	}
</style>
</head>
<body>
<?php
$user_err= $pass_err= $match="";
if (isset($_POST["submit"])) {
	if (empty($_POST["username"])) {
		$user_err ="User-Name not be empty";
	}
	else{
		$username =$_POST["username"];
		$username =mysqli_real_escape_string($ad->db->conn,$username);
	}
	if (empty($_POST["password"])) {
		$pass_err ="password not be empty";
	}
	else{
		$password =$_POST["password"];
		$password =mysqli_real_escape_string($ad->db->conn,$password);
	}
	if ($user_err =="" && $pass_err=="") {
		$login = $ad->adminLogin($username,$password);
		if ($login) {
			$ad->url("index.php");
		}
		else{
			$match ="username and password does not match";
		}
	}
}



?>	
<div class="container">
		<div class="main">
			<h2>Admin Login</h2>
		<div class="login">
			<form action="" method="post">
				<table>
					<tr>
						<td>User-Name</td>
						<td> 
							<div class="form-group">
								<input type="text" class="form-control" name="username" id="username">
							</div>
							<span><?php echo $user_err ?></span>

						</td>
					</tr>
					<tr>
						<td>Password</td>
						<td>
						   <div class="form-group">
							<input type="password" class="form-control" name="password" id="password">
						  </div> 
						  <span><?php echo $pass_err ?></span>
						</td>
					</tr>
				</table>
				<center><input type="submit" class="btn btn-primary btn-lg btn-block" name="submit" value="login"></center>
				<span><?php echo $match ?></span>
			</form>
		</div>
	</div>
</div>
</body>
</html>