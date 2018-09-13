<?php require_once('classes/User.php'); 
$ans= new User();
error_reporting(0);
//$_POST is send answer.php page to pass answer method and store $answer variable..
$answer =$ans->answer($_POST);
include_once('pages/head.php');
//calculate total question and attemt question....
$total_qus = $answer["right"]+$answer["wrong"]+$answer["no_answer"];
//$answer["right"] this right accutally Anser method to return in array...
$attemt_qus =$answer["right"]+$answer["wrong"];
$cat = $_SESSION['cat'];


 ?>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<div style="background-color: green;padding: 15px 0px; margin: 10px 0px;">
				<h2 class="text-center"><b>Your Exam Result</b></h2>
			</div>
			<div class="table-responsive">
  <table class="table table-hover">
  <thead>
    <tr class="table-active">
      <th scope="col">Total Numbers of Questions </th>
      <th scope="col"><?php echo $total_qus ?></th>
    
    </tr>
  </thead>
  <tbody>
    <tr class="table-primary">
      <th scope="row">Attempted Questions</th>
      <td><?php echo $attemt_qus ?></td>
   
    </tr>
    <tr class="table-secondary">
      <th scope="row">Your Right Answer</th>
      <td><?php echo $answer["right"] ?></td>
     
    </tr>
    <tr class="table-danger">
      <th scope="row">Your Wrong Answer</th>
        <td><?php echo $answer["wrong"] ?></td>
   
    </tr >
    <tr class="table-warning">
      <th scope="row">No Answer</th>
        <td><?php echo $answer["no_answer"] ?></td>
   
    </tr>
     <tr class="table-info">
      <th scope="row">Your Result</th>
        <td><?php
       $percent =($answer["right"]*100)/($total_qus);
         echo $percent."%" ?></td>
   
    </tr>
      <tr class="bg-info">
      <th scope="row">Your Status</th>
        <td><?php
        //calculate ratio...
       $percent =($answer["right"]*100)/($total_qus);
         if ($percent>='40%') {
          	echo "Pass";
          }
          else{
          echo "Fail";
          } ?></td>
   
    </tr>
  </tbody>
</table>
</div>
  <div class="row justify-content-between">
    <div class="col-4">
  	<a href="index.php" class="btn btn-outline-warning">Back to question</a>
    </div>
    <div class="col-4">
     <form action="rightanswer.php" method="post">
     	<input type="hidden" name="cate" value="<?php echo $cat ?>">
     	<input type="submit" class="btn btn-outline-success" name="submit" value="View Answer Sheet">
     </form>
    </div>
  </div>
		</div>
	</div>
</div>



<?php

     //script section....
     include_once('pages/scriptsec.php');
    
   

?>