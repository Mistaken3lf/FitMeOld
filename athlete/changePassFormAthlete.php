<?php
  session_start();

  if (($_SESSION['loggedIn'] == false) || ($_SESSION["myPermission"] != "Athlete")) {
      header('location: ../index.php');
  }
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>FitMe</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="PRAGMA" content="NO-CACHE">
    <!-- Latest compiled and minified CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/paper/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/stylesheet.css">
    <link rel="icon" type="image/png" sizes="96x96" href="../img/logo/FitMe-favicon-96x96.png">
  </head>
  <body>
    <header>
      <!--Navigation bar-->
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarCollapsed">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="athleteLanding.php">FitMe</a>
          </div>
          <div class="collapse navbar-collapse" id="navbarCollapsed">
            <ul class="nav navbar-nav">
              <li><a href="athleteLanding.php">Home</a></li>
              <li><a href="athleteWorkouts.php">Current Training Cycle</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                <?php
                  echo '<style>p{display:inline;}</style><p color="white"><span class="glyphicon glyphicon-user"></span></p>&nbsp&nbsp '.
                  $_SESSION["myFirstName"]. ' ' .$_SESSION["myLastName"];
                  ?>
                <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="athleteProfile.php">My Profile</a></li>
                  <li><a href="changePassFormAthlete.php">Change Password</a></li>
                  <li><a href="userGuide.pdf" target="_blank">User Guide</a></li>
                  <li><a href=".../lib/logout.php">Logout</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <section>
      <div class="container-fluid">
        <img class="center-block img-responsive" src="../img/headers/fitMeChangePassword2.png" width="500" height="300">
        <hr class="colored">
        <div class="row">
          <div class="col-md-5">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Change Password</h3>
              </div>
              <div class="panel-body">
                <form action="../lib/changePassword.php" id="changePassForm" name="changePassForm" method="POST">
                  <div class="errorDiv">
                    <!--Print out errors from the add user form.-->
                    <?php
                      if (isset($_SESSION['changeErrors']) && isset($_SESSION['changeAttempt'])) {
                          unset($_SESSION['changeAttempt']);
                          print "Errors occured <br>\n";

                          foreach ($_SESSION['changeErrors'] as $error) {
                              print $error."<br>\n";
                          }
                      }
                      ?>
                  </div>
                  <div class="form-group">
                    <label for="curPassword">Current Password: </label>
                    <input required class="form-control" type="text" name="curPassword" id="curPassword"><br>
                  </div>
                  <div class="form-group">
                    <label for="newPassword1">New Password: </label>
                    <input required class="form-control" type="password" name="newPassword1" id="newPassword1"><br>
                  </div>
                  <div class="form-group">
                    <label for="newPassword2">Re-enter New Password: </label>
                    <input required class="form-control" type="password" name="newPassword2" id="newPassword2"><br>
                  </div>
                  <br>
                  <button type="submit" name="submit" class="btn btn-success" value="Change Password"><span class="glyphicon glyphicon-ok"></span>&nbsp&nbsp Change Password</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
      <br>
    </section>
    <?php
      require_once("../templates/printFooter.php");
      printFooter();
      ?>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</html>
