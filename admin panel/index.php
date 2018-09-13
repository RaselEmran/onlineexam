<?php
  include_once('../classes/Admin.php');
  $admin =new Admin();
  if (!isset($_SESSION['username'])) {
   $admin->url("adminlogin.php");
  }

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
 include_once('head.php');


    ?>
</head>
<body>
    <div class="container-fluid">

<?php

include_once('nav.php');

?>


    </div>
    <div class="container-fluid">
<?php
include_once('sidenav.php');

?>


        <div class="sidebar left">
<?php
include_once('sideleft.php');

?>     
        </div>

        <div class="contan-body">
            <div class="col-12">
                <!-- Main Content -->

                    <div class="side-body pl-5 ml-3">
    <?php 
                //load every categoy of page in side...
                  if(isset($_GET["public"]))
                  {
                    if(file_exists($_GET["public"]))
                    {
                          include_once $_GET["public"];
                    }
                    else
                    {
                       include_once '404.php';  
                    }
                  
                  }
                  else
                  {
                     
                  }


                

                    ?> 
                    </div>
  
            </div>
        </div>

    </div>

</body>
</html>