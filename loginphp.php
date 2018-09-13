<?php
//this is not use when we use ajax then this page use in login progress..
session_start();
include_once('classes/User.php');
$user = new User();
$msg ="";
if (isset($_REQUEST["submit"])) {
	if (empty($_POST["emailusername"])) {
	$msg="field empty";
		
	}
	else{
	$username =$_POST["emailusername"];
	$username =mysqli_real_escape_string($user->db->conn,$username);

}
	
}


?>