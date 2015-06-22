<?php
  session_start();

  if ($_SESSION['loggedIn'] == false) {
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
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/paper/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="stylesheet.css">
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
                  $_SESSION['myUsername'];
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
        <img class="center-block img-responsive" src="../img/headers/fitMeChangePassword.png" width="500" height="300">
        <hr>
        <div class="row">
          <div class="col-md-5">
            <div class="panel panel-default">
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
                  <button type="submit" name="submit" class="btn btn-primary" value="Send">Send</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
      <br>
    </section>
    <footer class="footer">
      <div class="container">
        <div class="row">
          <!--<div class="col-md-6">
            <h5 style="color: white;">FitMe</h5>
            <p>You can use rows and columns here to organize your footer content.</p>
            </div>-->
          <div class="col-md-6">
            <!--<h5 style="color: white;">FitMe</h5>-->
            <img class="img-responsive" class="footer image" src="../img/logo/FitMe-text-logo.png" width="100" height="50">
            <h6>
              <ul>
                <li style="color: white;"><a style="color: white;" href="#!">Help</a> &nbsp&nbsp &#124; &nbsp&nbsp </li>
                <li style="color: white;"><a style="color: white;" href="#!">Terms & Services</a> &nbsp&nbsp &#124; &nbsp&nbsp </li>
                <li style="color: white;"><a style="color: white;" href="contact.html">Contact Us</a></li>
              </ul>
            </h6>
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
          <!--©--> 2015 FitMe
        </div>
      </div>
    </footer>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</html>
