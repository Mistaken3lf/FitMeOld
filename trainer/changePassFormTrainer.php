<?php
  session_start();

  if (($_SESSION['loggedIn'] == false) || ($_SESSION["myPermission"] != "Trainer")) {
      header('location: ../index.php');
  }
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
      require_once("../templates/printHeader.php");
      printHeader();
      ?>
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
            <b><a class="navbar-brand" href="trainersLanding.php">FitMe</a></b>
          </div>
          <div class="collapse navbar-collapse" id="navbarCollapsed">
            <ul class="nav navbar-nav">
              <li><a href="trainersLanding.php">Home</a></li>
              <li><a href="trainersAthletes.php">Athletes</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Manage
                <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="createExerciseTrainers.php">Exercise</a></li>
                  <li><a href="createWorkoutTrainers.php">Workout</a></li>
                  <li><a href="trainersAssessment.php">Assessment</a></li>
                  <li><a href="createUser.php">User</a></li>
                </ul>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                <?php
                  echo '<style>p{display:inline;}</style><p color="white"><span class="glyphicon glyphicon-user"></span></p>&nbsp&nbsp '.
                  $_SESSION["myFirstName"] . ' ' . $_SESSION["myLastName"];
                  ?>
                <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="trainersProfile.php">My Profile</a></li>
                  <li><a href="changePassFormTrainer.php">Change Password</a></li>
                  <li><a href="userGuide.pdf" target="_blank">User Guide</a></li>
                  <li><a href="../lib/logout.php">Logout</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <section>
      <div class="container-fluid">
        <img class="center-block img-responsive" src="../img/headers/fitMeChangePassword2.png" width="550" height="350">
        <hr class="colored">
        <div class="row">
          <div class="col-md-5">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Change Password</h3>
              </div>
              <div class="panel-body">
                <form action="../lib/changePassword.php" method="POST" id="changePassForm" name="changePassForm">
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
                    <input required class="form-control" type="text" name="curPassword" id="curPassword" placeholder="Current Password"><br>
                  </div>
                  <div class="form-group">
                    <label for="newPassword1">New Password: </label>
                    <input required class="form-control" type="password" name="newPassword1" id="newPassword1" placeholder="New Password"><br>
                  </div>
                  <div class="form-group">
                    <label for="newPassword2">Re-enter New Password: </label>
                    <input required class="form-control" type="password" name="newPassword2" id="newPassword2" placeholder="Re-enter New Password"><br>
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
    <br><br>
    <?php
      require_once("../templates/printFooter.php");
      printFooter();
      ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
