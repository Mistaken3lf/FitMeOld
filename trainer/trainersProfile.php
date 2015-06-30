<?php
  session_start();

  if (($_SESSION['loggedIn'] == false) || ($_SESSION["myPermission"] != "Trainer")) {
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
        <img class="center-block img-responsive" src="../img/headers/fitMeProfile2.png" width="550" height="350">
        <hr class="colored">
        <div class="row">
          <div class="col-md-5">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Profile Page</h3>
              </div>
              <div class="panel-body">
                <!--Form to collect all athletes information-->
                <?php
                  include("../lib/connect.php");
                  $curUser = $_SESSION["myUsername"];

                  $sql = "SELECT username, firstName, lastName, DOB, officeNumber, cellPhone, workPhone, otherPhone, email, otherEmail, biography
                                            FROM users WHERE username = '$curUser'";

                  $result = mysqli_query($connection, $sql);

                  while ($row = mysqli_fetch_array($result)) {
                    $username = $row["username"];
                    $firstName    = $row['firstName'];
                    $lastName     = $row['lastName'];
                    $DOB          = $row['DOB'];
                    $officeNumber = $row['officeNumber'];
                    $cellPhone    = $row['cellPhone'];
                    $workPhone    = $row['workPhone'];
                    $otherPhone   = $row['otherPhone'];
                    $email        = $row['email'];
                    $otherEmail   = $row['otherEmail'];
                    $biography    = $row['biography'];
                  }
                  ?>
                <form role="form" method="POST" id="profileForm" name="profileForm" action="../lib/updateProfile.php" >
                  <div class="errorDiv">
                    <?php
                      if (isset($_SESSION["profileErrors"]) && isset($_SESSION["profileAttempt"])) {
                        unset($_SESSION["profileAttempt"]);
                        print "Errors occured <br>\n";

                        foreach ($_SESSION["profileErrors"] as $error) {
                          print $error . "<br>\n";
                        }
                      }
                      ?>
                  </div>
                  <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" style="background-color:#FFFFFF"
                      name="username" readonly value="<?= $username ?>">
                  </div>
                  <div class="form-group">
                    <label for="firstName">First Name:</label>
                    <input type="text" required class="form-control" id="firstName" style="background-color:#FFFFFF"
                      name="firstName" value="<?= $firstName ?>">
                  </div>
                  <div class="form-group">
                    <label for="lastName">Last Name:</label>
                    <input type="text" required class="form-control" id="lastName" style="background-color:#FFFFFF"
                      name="lastName" value="<?= $lastName ?>">
                  </div>
                  <div class="form-group">
                    <label for="DOB">Date of Birth:</label>
                    <input type="text" class="form-control" id="DOB" style="background-color:#FFFFFF"
                      name="DOB" value="<?= $DOB ?>" placeholder="YYYY/MM/DD">
                  </div>
                  <div class="form-group">
                    <label for="officeNumber" >Office Number:</label>
                    <input type="tel"  id="officeNumber" class="form-control" name="officeNumber" style="background-color:#FFFFFF" value="<?= $officeNumber ?>" placeholder="EX. 999-999-9999">
                  </div>
                  <div class="form-group">
                    <label for="cellPhone">Cell Phone:</label>
                    <input type="tel" class="form-control" id="cellPhone" name="cellPhone" style="background-color:#FFFFFF"
                      value="<?= $cellPhone ?>" placeholder="EX. 999-999-9999">
                  </div>
                  <div class="form-group">
                    <label for="workPhone">Work Phone:</label>
                    <input type="tel" class="form-control" id="workPhone" style="background-color:#FFFFFF"
                      name="workPhone" value="<?= $workPhone ?>" placeholder="EX. 999-999-9999">
                  </div>
                  <div class="form-group">
                    <label for="otherPhone">Other Phone:</label>
                    <input type="tel" class="form-control" id="otherPhone" style="background-color:#FFFFFF"
                      name="otherPhone" value="<?= $otherPhone ?>" placeholder="EX. 999-999-9999">
                  </div>
                  <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" required class="form-control" id="email" style="background-color:#FFFFFF"
                      name="email" value="<?= $email ?>" placeholder="email@address.com">
                  </div>
                  <div class="form-group">
                    <label for="otherEmail">Other Email:</label>
                    <input type="email" class="form-control" id="otherEmail" style="background-color:#FFFFFF"
                      name="otherEmail" value="<?= $otherEmail ?>" placeholder="email@address.com">
                  </div>
                  <div class="form-group">
                    <label for="biography">Biography:</label>
                    <input type="text" class="form-control" id="biography" style="background-color:#FFFFFF"
                      name="biography" value="<?= $biography ?>" placeholder="Tell Us About Yourself.">
                  </div>
                  <button type="submit" class="btn btn-primary" value="Save Profie"><span class="glyphicon glyphicon-ok"></span>&nbsp&nbsp Save Profile</button>
                </form>
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
