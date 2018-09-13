<?php

     include_once('../classes/Admin.php');
    $ad =new Admin();
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
    	$question = $_POST["question"];
    	$op1    = $_POST["op1"];
    	$op2 = $_POST["op2"];
    	$op3 = $_POST["op3"];
    	$op4 = $_POST["op4"];
    	$ans = $_POST["ans"];
    	$select = $_POST["select"];
    	$userregi = $ad->AddQuestion($question,$op1,$op2,$op3,$op4,$ans,$select);
    }

?>