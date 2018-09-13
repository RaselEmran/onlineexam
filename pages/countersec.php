
<?php

include_once('connection/Connect.php');
//create object.....
$conect =new Connect();
?>
    <?php
//category show to call showcount method in user class
     $sql ="SELECT * FROM category";
     $catcount->showCount($sql);
    
//question show to call showcount method in user class
     $sql ="SELECT * FROM questions";
    $quscount->showCount($sql);
    
//member show to call showcount method in user class
         $sql ="SELECT * FROM regi";
    $memcount->showCount($sql);
  


     ?>
<div class="count">
        <div class="container">
            <div class="heading text-center">
                <h5>WHAT WE SERVICES YOU</h5>
                <img src="images/hdg-01.png" alt="">
                <div class="row mt-4">
                    <div class="col-md-2">
                        <h2 class="mt-0"> <span class="counter">
                    <?php   //echo counter
                      echo $catcount->count;?>

                       </span>+</h2>
                        <hr>
                    </div>
                    <div class="col-md-2">
                        <p class="h5 pt-2 pb-2">Category</p>
                    </div>
                    <div class="col-md-2 ">
                        <h2 class="mt-0"> <span class="counter">
                            <?php  //echo counter
                              echo $quscount->count; ?>
                        </span>+</h2>
                        <hr>
                    </div>
                    <div class="col-md-2">
                        <p class="h5 pt-2 pb-2">Total question</p>
                    </div>
                    <div class="col-md-2 ">
                        <h2 class="mt-0"> <span class="counter">
                            <?php //echo count
                              echo $memcount->count;



                            ?>
                        </span>+</h2>
                        <hr>
                    </div>
                    <div class="col-md-2">
                        <p class="h5 pt-2">Toatal exam</p>
                    </div>
                </div>
            </div>
        </div>
    </div>