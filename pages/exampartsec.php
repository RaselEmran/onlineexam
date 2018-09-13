            <?php 
            include_once('classes/User.php');
            //create object.....
            $user = new User();

            if( isset($_SESSION['userid']) && !empty($_SESSION['userid']) )
                        //if session is okkk.. and not empty...then show this page...
                    {
                        ?>
                         <div class="container">
                            <div class="heading text-center py-5 mt-4">
            <h5>Selected to your exam Category</h5>
            <img src="images/hdg-01.png" alt="">
        </div>

       <div class="owl-carousel owl-theme">
        <?php 
        //call cat_show method to already define user class...
        $user->cat_shows();
        foreach ($user->cat as  $category) {
            ?>
                <div>
                    
                    <div class="team">
                          <div class="xm-card mb-2">
                    <img class="img-fluid p-1" src=" Admin/<?php  echo $category['path'] ?>" alt="" width="100%">
                    <h4 class="pt-3"></h4><?php echo $category["name"] ?></h4>
                    <p><?php echo $category["title"] ?> <span class="float-right font-weight-bold">Price:inr <span class="px-1"><?php echo $category["price"] ?></span></span>
                    </p>
                    <form action="stratexam.php" method="post">
                        <input type="hidden" name="catt" value="<?php echo $category['id'] ?>">
                        <div>
                            <input type="submit" class="btn btn-outline-primary" name="submit" value="Strat Exam">
                        </div>
                    </form>
                    <!--
                    <div class="xm-btn text-center pb-4 pt-2">
                        <a href="?id=<?php //echo $category['id'] ?>" class="btn"> <button>Strat Exam</button></a>
                    </div>
                -->
                </div>
                    </div>
                </div>

            <?php
        }
        ?>

        
            </div>
        </div>
            <!--

                       <div class="container">
        <div class="heading text-center py-5 mt-4">
            <h5>Selected to your exam Category</h5>
            <img src="images/hdg-01.png" alt="">
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="xm-card mb-2">
                    <img class="img-fluid p-1" src="images/xmc1.jpg" alt="" width="100%">
                    <h4 class="pt-3">Computer Awareness</h4>
                    <p>Awareness Question Answers <span class="float-right font-weight-bold">Price:inr <span class="px-1">20</span></span>
                    </p>
                    <div class="xm-btn text-center pb-4 pt-2">
                        <a href="#" class="btn"> <button>Strat Exam</button></a>
                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <div class="xm-card mb-2">
                    <img class="img-fluid p-1" src="images/xmc2.jpg" alt="" width="100%">
                    <h4 class="pt-3">Python Expert</h4>
                    <p>Python experter Question Answer <span class="float-right font-weight-bold">Price:inr <span class="px-1">20</span></span>
                    </p>
                    <div class="xm-btn text-center pb-4 pt-2">
                        <a href="#" class="btn"> <button>Strat Exam</button></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="xm-card mb-2">
                    <img class="img-fluid p-1" src="images/xmc3.jpg" alt="" width="100%">
                    <h4 class="pt-3">CSS3 Expert</h4>
                    <p>CSS3 Question Answers <span class="float-right font-weight-bold">Price:inr <span class="px-1">20</span></span>
                    </p>
                    <div class="xm-btn text-center pb-4 pt-2">
                        <a href="#" class="btn"> <button>Strat Exam</button></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="all-btn text-center pt-4 mt-3 pb-4">
            <a href="#"> <button>Show all</button></a>
        </div>
    </div>
-->

                        <?php
        

                     }else{

    //not okkk and empty.. ?>
                       <div class="exam-head">
                           <h4><b>Strat your Exam</b></h4>
                           <img src="images/hdg-01.png" alt="">
                       </div>
                        
                        <div class="withoutlogin">
                           <div class="container text-center"> 
                            <p class="h5"><b>Perfomance to your Skill text</b></p>
                            <p>To Chose your Exam Category</p>
                            <div class="all-btn text-center pt-4 mt-3 pb-4">
            <a href="login.php"> <button>Click Here</button></a>
        </div>
                        </div>
                        <div>
                           
                        </div>
                    </div>

                    
       <?php } ?>


