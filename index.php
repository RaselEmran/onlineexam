<?php require_once('classes/User.php'); 
$use = new User();
//category show in coundown page object...
$catcount =new User();
//question show in coundown page object...
$quscount =new User();
//member show in coundown page object...
$memcount= new User();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  
    <?php
  include_once('pages/head.php')


    ?>
</head>

<body>

    <?php
//top nav section...
 include_once('pages/topnav.php');


    ?>
    <?php
    //navigation section...
  include_once('pages/navigation.php');
  //top slider section...
   include_once('pages/firstslaid.php');
   //first section....
      include_once('pages/firstsec.php');
      //second section....
        include_once('pages/secondsec.php');
        //counter section....
     include_once('pages/countersec.php');
         //exampart section....
     include_once('pages/exampartsec.php');
        //exampart section....
     include_once('pages/bottomslider.php');
         //top footer  section....
     include_once('pages/fotertop.php');
      //bottom footer  section....
     include_once('pages/foterbottom.php');
    ?>
    
   
  
   
    
    
    
    
    
<?php

     //script section....
     include_once('pages/scriptsec.php');

?>

</body>
</html>