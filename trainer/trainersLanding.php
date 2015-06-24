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
    <meta http-equiv="PRAGMA" content="NO-CACHE">
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
              <li class="active"><a href="trainersLanding.php">Home</a></li>
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
                  <li><a href="../logout.php">Logout</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <section>
      <!--Jumbotron and motivation quotes-->
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="jumbotron">
              <h1 style="text-align:center">
                Welcome to <font face="roboto black" color="#2196f3">FitMe</font>
              </h1>
              <h3 style="text-align:center">
                <font face="roboto" color="#2196f3">Training  |  Dedication  |  Results </font>
              </h3>
              <center>
                <p>
                  Through our assistance with training and with your dedication, we can strive to achieve results.
                </p>
              </center>
              <br>
              <img class="center-block img-responsive" src="../img/logo/FitMe-logo.png" width="500" height="100">
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row text-center">
          <div class="col-md-6">
            <h2>
              Our Mission
            </h2>
            <p>
              FitMe is committed to providing trainers and individuals with a time saving, more functional, and more user friendly strength training website, by using educational learning and practical experience, portrayed in a new, fun, creative, and interesting way.
            </p>
          </div>
          <div class="col-md-6">
            <h2>
              Core Values
            </h2>
            <ul>
              <li>Athlete-centric</li>
              <li>Unified</li>
              <li>Integrity</li>
              <li>Driven</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <br><br>
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
            <!--<h6>A Product by <img class="img-responsive" class="footer divelop" src="divelop-logo-blue 2.png" width="100" height="50">.</h6>-->
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
          <!--©--> 2015 FitMe
        </div>
      </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
