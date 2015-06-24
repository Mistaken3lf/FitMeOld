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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css">
    <link rel="stylesheet" href="http://cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.css">
    <link rel="stylesheet" href="http://cdn.datatables.net/tabletools/2.2.4/css/dataTables.tableTools.css">
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
              <li class="active" class="dropdown">
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
      <!--End of navigation-->
    </header>
    <section>
      <div class="container-fluid">
        <img class="center-block img-responsive" src="../img/headers/fitMeExerciseManagement2.png" width="550" height="350">
        <hr class="colored">
        <!--Create a tabbed interface to create an exercise-->
        <ul class="nav nav-tabs" id="myTab">
          <li class="active"><a href="#createExercise" data-toggle="tab">Create Exercise</a></li>
          <li><a href="#removeExercise" data-toggle="tab">Remove Exercise</a></li>
          <li><a href="#currentExercises" data-toggle="tab">Current Exercises</a></li>
        </ul>
        <br>
        <!--Create the tabs for the exercisese-->
        <div class="tab-content">
          <div class="tab-pane active" id="createExercise">
            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">Create New Exercise</h3>
                  </div>
                  <div class="panel-body">
                    <form role="form" id="createExerciseForm" action="../lib/insertExercise.php" method="POST">
                      <!--Print out all errors from the login form if there are any.-->
                      <div class="errorDiv">
                        <?php
                          if (isset($_SESSION['exerciseErrors']) && isset($_SESSION['exerciseAttempt'])) {
                              unset($_SESSION['exerciseAttempt']);
                              print "Errors occured <br>\n";

                              foreach ($_SESSION['exerciseErrors'] as $error) {
                                  print $error."<br>\n";
                              }
                          }
                          ?>
                      </div>
                      <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="Exercise Name">Exercise Name:</label>
                            <input type="text" required class="form-control" id="exerciseName" name="exerciseName"
                              placeholder="Enter Exercise Name">
                          </div>
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-md-3">
                          <label>Category:</label>
                          <select class="form-control" required id="workoutCategory"
                            name="workoutCategory" onchange="handleSelect()">
                            <option value="" selected disabled>Choose A Category</option>
                            <option value="Upper Body">Upper Body</option>
                            <option value="Lower Body">Lower Body</option>
                            <option value="Total Body">Total Body</option>
                            <option value="Trunk">Trunk</option>
                          </select>
                        </div>
                        <div class="col-md-3">
                          <label>Plane:</label>
                          <select class="form-control" required id="workoutPlane" name="workoutPlane">
                            <option value="" selected disabled>Choose Plane</option>
                            <option value="Vertical">Vertical</option>
                            <option value="Horizontal">Horizontal</option>
                            <option value="Transitional">Transitional</option>
                            <option value="Flexion" disabled>Flexion</option>
                            <option value="Extension" disabled>Extension</option>
                            <option value="Rotational" disabled>Rotational</option>
                            <option value="Anti-Rotational" disabled>Anti-Rotational</option>
                          </select>
                        </div>
                        <div class="col-md-3">
                          <label>Movement:</label>
                          <select class="form-control" required id="workoutMovement" name="workoutMovement">
                            <option value="" selected disabled>Choose Movement</option>
                            <option value="Push">Push</option>
                            <option value="Pull">Pull</option>
                          </select>
                        </div>
                        <div class="col-md-3">
                          <label>Style:</label>
                          <select class="form-control" required id="workoutStyle" name="workoutStyle">
                            <option value="" selected disabled>Choose Style</option>
                            <option value="Unilateral">Unilateral</option>
                            <option value="Bilateral">Bilateral</option>
                          </select>
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-md-2">
                          <button type="submit" class="btn btn-primary" value="Create Exercise"><span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp Create Exercise</button>
                        </div>
                      </div>
                  </div>
                  </form>
                </div>
              </div>
            </div>
            <!--End of first tab-->
          </div>
          <!--Remove Exercise tab-->
          <div class="tab-pane" id="removeExercise">
            <div class="row">
              <div class="col-md-5">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">Remove Exercise</h3>
                  </div>
                  <div class="panel-body">
                    <form role="form" method="post" id="removeExerciseForm" action="../lib/removeExercise.php">
                      <div class="errorDiv">
                        <?php
                          if (isset($_SESSION['exerciseDeleteErrors']) && isset($_SESSION['exerciseDeleteAttempt'])) {
                              unset($_SESSION['exerciseDeleteAttempt']);
                              print "Errors occured <br>\n";

                              foreach ($_SESSION['exerciseDeleteErrors'] as $error) {
                                  print $error."<br>\n";
                              }
                          }
                          ?>
                      </div>
                      <div class="form-group">
                        <label for="Exercise to delete">Select Exercise To Remove:</label>
                        <select class="form-control" required name="removeExerciseName" id="removeExerciseName">
                          <option value="" selected disabled>Please Select An Exercise</option>
                          <?php
                            include '../lib/connect.php';
                            $curUser = $_SESSION['myUsername'];
                            $sql = "select exercise_name from EXERCISES where whosExercise='$curUser'";
                            $result = mysqli_query($connection, $sql);
                            while ($row = mysqli_fetch_array($result)) {
                                $tempExercise = strstr($row['exercise_name'], '-', true);
                                echo '<option value="'.$row['exercise_name'].'">'.$tempExercise.'</option>';
                            }
                            ?>
                        </select>
                      </div>
                      <br>
                      <button type="submit" class="btn btn-primary" value="Remove Exericse" onclick="return confirmExerciseDelete()"><span class="glyphicon glyphicon-trash"></span>&nbsp&nbsp Remove Exercise</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--End of second tab-->
          <!--Current exercises tab-->
          <div class="tab-pane" id="currentExercises">
            <h3>Current Exercises</h3>
            <div class="container-fluid">
              <div class="row">
                <div clas="col-md-12">
                  <?php
                    #Print all the current exercises created for that user.
                    include '../lib/connect.php';
                    $curUser = $_SESSION['myUsername'];

                    $sql = "select exercise_name, category, plane,
                                        movement, style from EXERCISES where whosExercise = '$curUser'";

                    $result = mysqli_query($connection, $sql);

                    print "<div class='table-responsive'>
                                            <table class='table table-striped table-bordered' id='currentExercisesTable'>
                                                <thead>
                                                    <tr>
                                                        <th>Exercise Name</th>
                                                        <th>Category</th>
                                                        <th>Plane</th>
                                                        <th>Movement</th>
                                                        <th>Style</th>
                                                    </tr>
                                                </thead>";

                    print '<tbody>';

                    while ($row = mysqli_fetch_array($result)) {
                        print '<tr>';
                        $tempExercise = strstr($row['exercise_name'], '-', true);
                        print '<td>'.$tempExercise.'</td>';
                        print '<td>'.$row['category'].'</td>';
                        print '<td>'.$row['plane'].'</td>';
                        print '<td>'.$row['movement'].'</td>';
                        print '<td>'.$row['style'].'</td>';
                        print '</tr>';
                    }

                    print '</tbody>';
                    print '</table>';
                    ?>
                </div>
              </div>
            </div>
          </div>
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
    <!--jquery, bootstrap javascript bootstrap validator our form validation, and the disable -->
    <!-- script when trunk is selected-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
    <script src="../js/disable.js"></script>
    <script type="text/javascript" src="../js/validateExercisePage.js"></script>
    <script src="../js/tabReload.js"></script>
    <script src="http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script src="http://cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    <script src="http://cdn.datatables.net/tabletools/2.2.4/js/dataTables.tableTools.min.js"></script>
    <script src="../js/exerciseDataTable.js"></script>
    <script>
      function confirmExerciseDelete(){
      return confirm("Are you sure you want to remove this Exercise?");
      }
    </script>
  </body>
</html>
