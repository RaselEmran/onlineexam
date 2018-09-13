<?php
//link User class....
     include_once('classes/User.php');
     //create object......
    $usr =new User();
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
    	$username = $_POST["username"];
    	$email    = $_POST["email"];
    	$password = $_POST["password"];
    	//call UserRegistration method to define user class....
    	$userregi = $usr->userRegistraion($username,$email,$password);
    }

?>