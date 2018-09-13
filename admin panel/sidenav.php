  <?php
 if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
       $admin->url("adminlogin.php");
    }


  ?>

  <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
            <div class="row">
                <div class="col-sm-12 col-md-12 user-details">
                    <div class="user-image">
                        <img src="../images/rasel.jpg" alt="Pawan Sachitha" title="Pawan Sachitha" class="rounded-circle img-fluid " width="180">
                    </div>
                    <div class="user-info-block">
                        <div class="user-heading">
                            <h3>Rasel Emran</h3>
                            <span class="help-block">Rajshahi Bangladesh</span>
                        </div>
                        <br />
                        <ul class="navigation"></ul>
                        <div class="user-body">

                            <div class="tab-content">
                                <div id="information" class="tab-pane active">

                                    <a href="index.php?logout='1'"><h5>Sign-Out</h5></a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>