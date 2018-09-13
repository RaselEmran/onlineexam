<?php
 if (isset($_GET['logout'])) {
    //send logout to get url
    session_destroy();
    unset($_SESSION['userid']);
   $use->url("index.php");
  }
?>

<nav class="main-nav navbar navbar-expand-lg">
        <div class="container">
            <h1><a class="navbar-brand " href="">
           <img  class="img-fluid" src="images/logo.png" alt=""></a>
            </h1>
            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler  navbar-toggler-right" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"><i class="fa fa-list-ul"></i></span>
            </button>
            <!-- Brand -->
            <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                <ul id="navScrollspy" class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="index.php" class="nav-link active">Home</a></li>
                    <li class="nav-item"><a href="#ss-about" class="nav-link">ABOUT</a></li>
                         <?php if( isset($_SESSION['userid']) && !empty($_SESSION['userid']) )
                        //if session is okkk.. and not empty...
                    {
                        ?>
                        <li class="nav-item"><a  href="index.php?logout='1'" class="nav-link">logout</a></li>

                        <?php
        

                     }else{

    //not okkk and empty.. ?>
                        <li class="nav-item"><a href="regi.php" class="nav-link">Sign UP</a></li>
                    <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
       <?php } ?>
                  
                    <li class="nav-item"><a href="#ss-works" class="nav-link">WORKS</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Category
        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="exm1.html">Type One</a>
                            <a class="dropdown-item" href="exm2.html">Type Two</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Others</a>
                    
                        </div>
                    </li>
                    <li class="nav-item"><a href="#ss-contact" class="nav-link">CONTACT</a></li>
                </ul>
            </div>
        </div>
    </nav>