<?php require_once('classes/User.php'); 
//create user object.....
$qus = new User();
//this is send stratexam page "form part "input name cat is define form section..
$cat =$_POST["cat"];
//pass $cat variable to qus_show...because question show accroding to category id.....
$qus->qus_show($cat);
//cattegory id store to session variable to use different secction...
$_SESSION['cat'] =$cat;
//echo $qus->msg;
//print_r($qus->qus);
include_once('pages/head.php');
 include_once('pages/topnav.php');
    //navigation section...
  include_once('pages/navigation.php');
 ?>
 <script>
   function timeout()
   {
    var minute=Math.floor(timeLeft/60);
    var second=timeLeft%60;
    if (timeLeft<=0) {
      clearTimeout(tm);
      document.getElementById("form1").submit();
    }
    else
    {
      if (minute<10) {
        minute ="0"+minute;
      }
      if (second<10) {
        second ="0"+second;
      }
      document.getElementById("time").innerHTML=minute+":"+second;
    }
    timeLeft--;
   var tm= setTimeout(function(){timeout()},1000);
   }
 </script>
<body onload="timeout()">

      <div class="row justify-content-center py-2">
     <div class="col-md-6">
            <div class="xm">
                <h3 class="text-center ">Online CSS Quiz
                  <script>
                    var timeLeft =.5*60;
                    
                  </script>

                  <div id="time" style="float: right;">Timeout</div></h3>
               
                <div class="jumbotron">
                
                <form action="answer.php" method="post" id="form1">
<?php
//difine $i to question number dynamicaly...
$i =1;
//access qus variable to access qus_show method using $qus object which is create this page top section..
foreach ($qus->qus as $qust) {
                  
                
?>
    
            <ul style="list-style-type: none;">
            
                <li>
                
                    <h3 class="bg-danger" style="color: #fff"><?php echo $i.")" ;?><?php echo $qust["question"] ?></h3>
 <?php if (isset($qust["ans1"])) {
  //if click first option to store...
?>
                      <div>
                          0) <input type="radio" name="<?php echo $qust['id'] ?>"  value="0" />
                     <?php echo $qust["ans1"] ?>
                    </div>

<?php
} 
//end first option
?>
                   
                    
 <?php if (isset($qust["ans2"])) {
  //if click  Second option...
?>
                      <div>
                       1) <input type="radio" name="<?php echo $qust['id'] ?>"  value="1" />
                        <?php echo $qust["ans2"] ?>
                    </div>
 <?php
}
//end second option... 
?>
                    
<?php if (isset($qust["ans3"])) {
  //if click third option.....
?>
                      <div>
                        2) <input type="radio" name="<?php echo $qust['id'] ?>"  value="2" />
                       <?php echo $qust["ans3"] ?>
                    </div>

<?php
}
//end third option.....
 ?>
                    
<?php if (isset($qust["ans4"])) {
  //if click four option.....
?>
                      <div>
                       3) <input type="radio" name="<?php echo $qust['id'] ?>"  value="3" />
                        <?php echo $qust["ans4"] ?>
                    </div>

<?php
} 
//end four option....
//if user not click to any option then automatycaly checked this defult option that is hide..
?>
                     <div>
                        <input type="radio" checked="checked" name="<?php echo $qust['id'] ?>"  value="no_attempt" style ="display: none;"/>
                      
                    </div>
                
                </li>
     
            </ul>
<?php
//increment question number...
 $i++ ;}

?>

             <center> <input class="btn btn-primary submit" type="submit" value="Submit Quiz" name="submit1"  /></center>
    
    </form>
              
                </div>
                
         </div>
        
     </div>
 </div>
 


<?php
    
 ?>

 <?php

     //script section....
     include_once('pages/scriptsec.php');
        //top footer  section....
     include_once('pages/fotertop.php');
      //bottom footer  section....
     include_once('pages/foterbottom.php');

?>
</body>