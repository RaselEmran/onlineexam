<?php require_once('classes/User.php'); 
//create object in user class....
$qus = new User();
//create another object in user class.,...
$totalqus =new User();
//this is send page/exampartsec "form part "input name cat is define form section..
$cat =$_POST["catt"];
//call qus_show method to pass $cat variable..
$qus->qus_show($cat);

//echo $qus->msg;
//print_r($qus->qus);
include_once('pages/head.php');
?>

 <?php
 //if msg this is define qus_show method that no number of row...then show no question..
if ($qus->msg) {
     ?>
<div class="container text-center py-5">
       <div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Hiii..</h4>
  <p><b>Your Selected Category Have no Questions</b></p>
  <hr>
  <p class="mb-0">To Strat your exam Back to <a  class="btn btn-outline-dark" href="index.php">Strat Exam</a></p>
</div>
</div>

     <?php
    }
    //orrr.....
    else{
      //query to pass showCount method ....
    	 $sql ="SELECT * FROM questions WHERE cat_id ='$cat'";
    $totalqus->showCount($sql);
    ?>
    <div class="container">
    	 <div class="row justify-content-center py-2">
     <div class="col-md-10">
     	<div class="jumbotron">
     		      <div class="alert alert-primary" role="alert">
  <h4 class="alert-heading">Hiii..</h4>
  <h4>Your Selected Category Have total <b><?php echo $totalqus->count." "; ?>Questions</b><div class="float-right"><h6>Total Time 2 Minute</h6></div></h4>
  <hr>
       <div class="row row justify-content-between py-2">
     	<div class="col-md-6">
     		<p class="mb-0">To Strat your exam Back to <a  class="btn btn-outline-dark" href="index.php">Strat Exam</a></p>
     	</div>
     	<div class="col-md-6">
     		<form action="catshow.php" method="post">
     			<input type="hidden" name="cat" value="<?php echo $cat ?>">
     			<input type="submit" class="btn btn-outline-dark"  name="submit" value="Start exam">
     		</form>
     	</div>
     </div>
  
     	</div>
     </div>

    </div>
</div>
</div>




    <?php
  
}
    	?>    
