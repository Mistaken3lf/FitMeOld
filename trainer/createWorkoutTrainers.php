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
                  <li><a href="../lib/logout.php">Logout</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <section>
      <!--Create workout tabs-->
      <div class="container-fluid">
        <img class="center-block img-responsive" src="../img/headers/fitMeWorkoutManagement2.png" width="550" height="350">
        <hr class="colored">
        <ul class="nav nav-tabs" id="myTab">
          <li class="active"><a href="#createWorkout" data-toggle="tab">Create Workout</a></li>
          <li><a href="#addExercises" data-toggle="tab">Add Exercises</a></li>
          <li><a href="#previousWorkouts" data-toggle="tab">Manage Workout(s)</a></li>
          <li><a href="#removeWorkout" data-toggle="tab">Remove Workout</a></li>
        </ul>
        <br>
        <div class="tab-content">
          <!--Create workout tab-->
          <div class="tab-pane active" id="createWorkout">
            <div class="row">
              <div class="col-md-5">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">Create New Workout</h3>
                  </div>
                  <div class="panel-body">
                    <form role="form" method="POST" id="addWorkoutForm" action="../lib/addWorkout.php">
                      <div class="errorDiv">
                        <!--Print out errors from the add workout form-->
                        <?php
                          if (isset($_SESSION["workoutErrors"]) && isset($_SESSION["workoutAttempt"])) {
                            unset($_SESSION["workoutAttempt"]);
                            print "Errors occured <br>\n";

                            foreach ($_SESSION["workoutErrors"] as $error) {
                              print $error . "<br>\n";
                            }
                          }
                          ?>
                      </div>
                      <div class="form-group">
                        <label for="macro">Macro Name:</label>
                        <input type="text" required class="form-control" id="macro" name="macro" placeholder="Macro Name">
                      </div>
                      <button type="submit" class="btn btn-primary" value="Create Workout"><span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp Create Workout</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--End of create workout tab-->
          <div class="tab-pane" id="addExercises">
            <!--Add Exercise to workout tab-->
            <div class="row">
              <div class="col-md-8">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">Add Exercises</h3>
                  </div>
                  <div class="panel-body">
                    <form role="form" method="POST" id="addExerciseToWorkoutForm" action="../lib/addExerciseToWorkout.php">
                      <div class="errorDiv">
                        <!--Print out errors from the add workout form-->
                        <?php
                          if (isset($_SESSION["addExerciseErrors"]) && isset($_SESSION["addExerciseAttempt"])) {
                            unset($_SESSION["addExerciseAttempt"]);
                            print "Errors occured <br>\n";

                            foreach ($_SESSION["addExerciseErrors"] as $error) {
                              print $error . "<br>\n";
                            }
                          }
                          ?>
                      </div>
                      <div class="row">
                        <div class="col-md-5">
                          <div class="form-group">
                            <label for="workoutName">Macro Name:</label>
                            <select class="form-control" required id="workoutName" name="workoutName">
                              <option value="" selected disabled>Select Macro Name</option>
                              <?php
                                include("../lib/connect.php");
                                $curUser = $_SESSION["myUsername"];
                                $sql     = "select workoutName from CurrentWorkouts where whosWorkout='$curUser'";
                                $result  = mysqli_query($connection, $sql);
                                while ($row = mysqli_fetch_array($result)) {
                                $tempName = $row["workoutName"];
                                $tempName = strstr($tempName, '-', true);
                                echo '<option value="' . $row["workoutName"] . '">' . $tempName . "</option>";
                                }
                                ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="order">Order:</label>
                            <select class="form-control" required id="order" name="order">
                              <option value="" selected disabled>Select Order</option>
                              <option value="A">A</option>
                              <option value="A1">A1</option>
                              <option value="A2">A2</option>
                              <option value="A3">A3</option>
                              <option value="A4">A4</option>
                              <option value="B">B</option>
                              <option value="B1">B1</option>
                              <option value="B2">B2</option>
                              <option value="B3">B3</option>
                              <option value="B4">B4</option>
                              <option value="C">C</option>
                              <option value="C1">C1</option>
                              <option value="C2">C2</option>
                              <option value="C3">C3</option>
                              <option value="C4">C4</option>
                              <option value="D">D</option>
                              <option value="D1">D1</option>
                              <option value="D2">D2</option>
                              <option value="E">E</option>
                              <option value="E1">E1</option>
                              <option value="E2">E2</option>
                              <option value="F">F</option>
                              <option value="F1">F1</option>
                              <option value="F2">F2</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="exercise">Select Exercise:</label>
                            <select class="form-control" required name="exercises" id="exercises">
                              <option value="Please Select An Exercise" selected disabled>Please Select An Exercise</option>
                              <?php
                                include("../lib/connect.php");
                                $curUser = $_SESSION["myUsername"];
                                $sql     = "select exercise_name from EXERCISES where whosExercise='$curUser'";
                                $result  = mysqli_query($connection, $sql);
                                while ($row = mysqli_fetch_array($result)) {
                                  $tempExercise = strstr($row["exercise_name"], '-', true);
                                  echo '<option value="' . $row["exercise_name"] . '">' . $tempExercise . "</option>";
                                }
                                ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="comments">Comments:</label>
                            <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
                          </div>
                        </div>
                      </div>
                      <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a href="#weekOne" data-toggle="tab">Week One</a></li>
                        <li><a href="#weekTwo" data-toggle="tab">Week Two</a></li>
                        <li><a href="#weekThree" data-toggle="tab">Week Three</a></li>
                        <li><a href="#weekFour" data-toggle="tab">Week Four</a></li>
                      </ul>
                      <br>
                      <div class="tab-content">
                        <div class="tab-pane active" id="weekOne">
                          <div class="row">
                            <div class="col-md-5">
                              <h4><b><u> WEEK ONE </u></b></h4>
                              <label for="sets">Sets:</label>
                              <select class="form-control" required id="selectSets" name="selectSets">
                                <option value="" selected disabled>Select Number of Sets</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                              </select>
                            </div>
                          </div>
                          <!-- Start of Set Form -->
                          <div class="row" id="firsttable" name= "firsttable" style="display:none;">
                            <p><b>SET:&nbsp;<input type="number" style="width: 30px" disabled="disabled" value="1"></b></p>
                            <div class="col-md-2">
                              <label for="reps">Reps:</label>
                              <input type="number"  class="form-control" id="reps1W1" name="reps1W1" placeholder="# Of Reps">
                            </div>
                            <div class="col-md-2">
                              <label for="intensity">Weight:</label>
                              <input type="number" class="form-control" id="intensity1W1"
                                name="intensity1W1" placeholder="Weight EX. 150">
                            </div>
                            <div class="col-md-2">
                              <label for="percent">Percentage:</label>
                              <input type="number"  class="form-control" id="percent1W1"
                                name="percent1W1" placeholder="Percentage EX. 55">
                            </div>
                            <div class="col-md-4">
                              <label for="assessmentType">Select Assessment Type: (Percentage Required!)</label>
                              <select disabled class="form-control" name="assessment1W1" id="assessment1W1" onchange="run()">
                                <option value="" selected disabled>Please Select An Assessment</option>
                                <?php
                                  include("../lib/connect.php");
                                  $curUser = $_SESSION["myUsername"];
                                  $sql     = "select Assessment_name from assessmentType";
                                  $result  = mysqli_query($connection, $sql);
                                  while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row["Assessment_name"] . '">' . $row['Assessment_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div class="row" id="secondtable" name= "secondtable" style="display:none;">
                            <p><b>SET:&nbsp;<input type="number" style="width: 30px" disabled="disabled" value="2"></b></p>
                            <div class="col-md-2">
                              <label for="reps">Reps:</label>
                              <input type="number"  class="form-control" id="reps2W1" name="reps2W1" placeholder="# Of Reps">
                            </div>
                            <div class="col-md-2">
                              <label for="intensity">Weight:</label>
                              <input type="number"  class="form-control" id="intensity2W1"
                                name="intensity2W1" placeholder="Weight EX. 150">
                            </div>
                            <div class="col-md-2">
                              <label for="percent">Percentage:</label>
                              <input type="number" class="form-control" id="percent2W1"
                                name="percent2W1" placeholder="Percentage EX. 55">
                            </div>
                            <div class="col-md-4">
                              <label for="assessmentType">Select Assessment Type: (Percentage Required!)</label>
                              <select disabled class="form-control" name="assessment2W1" id="assessment2W1">
                                <option value="" selected disabled>Please Select An Assessment</option>
                                <?php
                                  include("../lib/connect.php");
                                  $curUser = $_SESSION["myUsername"];
                                  $sql     = "select Assessment_name from assessmentType";
                                  $result  = mysqli_query($connection, $sql);
                                  while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row["Assessment_name"] . '">' . $row['Assessment_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div class="row" id="thirdtable" name= "thirdtable" style="display:none;">
                            <p><b>SET:&nbsp;<input type="number" style="width: 30px" disabled="disabled" value="3"></b></p>
                            <div class="col-md-2">
                              <label for="reps">Reps:</label>
                              <input type="number"  class="form-control" id="reps3W1" name="reps3W1" placeholder="# Of Reps">
                            </div>
                            <div class="col-md-2">
                              <label for="intensity">Weight:</label>
                              <input type="number"  class="form-control" id="intensity3W1"
                                name="intensity3W1" placeholder="Weight EX. 150">
                            </div>
                            <div class="col-md-2">
                              <label for="percent">Percentage:</label>
                              <input type="number" class="form-control" id="percent3W1"
                                name="percent3W1" placeholder="Percentage EX. 55">
                            </div>
                            <div class="col-md-4">
                              <label for="assessmentType">Select Assessment Type: (Percentage Required!)</label>
                              <select disabled class="form-control" name="assessment3W1" id="assessment3W1">
                                <option value="" selected disabled>Please Select An Assessment</option>
                                <?php
                                  include("../lib/connect.php");
                                  $curUser = $_SESSION["myUsername"];
                                  $sql     = "select Assessment_name from assessmentType";
                                  $result  = mysqli_query($connection, $sql);
                                  while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row["Assessment_name"] . '">' . $row['Assessment_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div class="row" id="fourthtable" name= "fourthtable" style="display:none;">
                            <p><b>SET:&nbsp;<input type="number" style="width: 30px" disabled="disabled" value="4"></b></p>
                            <div class="col-md-2">
                              <label for="reps">Reps:</label>
                              <input type="number" class="form-control" id="reps4W1" name="reps4W1" placeholder="# Of Reps">
                            </div>
                            <div class="col-md-2">
                              <label for="intensity">Weight:</label>
                              <input type="number" class="form-control" id="intensity4W1"
                                name="intensity4W1" placeholder="Weight EX. 150">
                            </div>
                            <div class="col-md-2">
                              <label for="percent">Percentage:</label>
                              <input type="number" class="form-control" id="percent4W1"
                                name="percent4W1" placeholder="Percentage EX. 55">
                            </div>
                            <div class="col-md-4">
                              <label for="assessmentType">Select Assessment Type: (Percentage Required!)</label>
                              <select disabled class="form-control" name="assessment4W1" id="assessment4W1">
                                <option value="" selected disabled>Please Select An Assessment</option>
                                <?php
                                  include("../lib/connect.php");
                                  $curUser = $_SESSION["myUsername"];
                                  $sql     = "select Assessment_name from assessmentType";
                                  $result  = mysqli_query($connection, $sql);
                                  while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row["Assessment_name"] . '">' . $row['Assessment_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div class="row" id="fifthtable" name= "fifthtable" style="display:none;">
                            <p><b>SET:&nbsp;<input type="number" style="width: 30px" disabled="disabled" value="5"></b></p>
                            <div class="col-md-2">
                              <label for="reps">Reps:</label>
                              <input type="number" class="form-control" id="reps5W1" name="reps5W1" placeholder="# Of Reps">
                            </div>
                            <div class="col-md-2">
                              <label for="intensity">Weight:</label>
                              <input type="number" class="form-control" id="intensity5W1"
                                name="intensity5W1" placeholder="Weight EX. 150">
                            </div>
                            <div class="col-md-2">
                              <label for="percent">Percentage:</label>
                              <input type="number"  class="form-control" id="percent5W1"
                                name="percent5W1" placeholder="Percentage EX. 55">
                            </div>
                            <div class="col-md-4">
                              <label for="assessmentType">Select Assessment Type: (Percentage Required!)</label>
                              <select disabled class="form-control" name="assessment5W1" id="assessment5W1">
                                <option value="" selected disabled>Please Select An Assessment</option>
                                <?php
                                  include("../lib/connect.php");
                                  $curUser = $_SESSION["myUsername"];
                                  $sql     = "select Assessment_name from assessmentType";
                                  $result  = mysqli_query($connection, $sql);
                                  while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row["Assessment_name"] . '">' . $row['Assessment_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div class="row" id="sixthtable" name= "sixthtable" style="display:none;">
                            <p><b>SET:&nbsp;<input type="number" style="width: 30px" disabled="disabled" value="6"></b></p>
                            <div class="col-md-2">
                              <label for="reps">Reps:</label>
                              <input type="number" class="form-control" id="reps6W1" name="reps6W1" placeholder="# Of Reps">
                            </div>
                            <div class="col-md-2">
                              <label for="intensity">Weight:</label>
                              <input type="number" class="form-control" id="intensity6W1"
                                name="intensity6W1" placeholder="Weight EX. 150">
                            </div>
                            <div class="col-md-2">
                              <label for="percent">Percentage:</label>
                              <input type="number"  class="form-control" id="percent6W1"
                                name="percent6W1" placeholder="Percentage EX. 55">
                            </div>
                            <div class="col-md-4">
                              <label for="assessmentType">Select Assessment Type: (Percentage Required!)</label>
                              <select disabled class="form-control" name="assessment6W1" id="assessment6W1">
                                <option value="" selected disabled>Please Select An Assessment</option>
                                <?php
                                  include("../lib/connect.php");
                                  $curUser = $_SESSION["myUsername"];
                                  $sql     = "select Assessment_name from assessmentType";
                                  $result  = mysqli_query($connection, $sql);
                                  while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row["Assessment_name"] . '">' . $row['Assessment_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div class="row" id="seventhtable" name= "seventhtable" style="display:none;">
                            <p><b>SET:&nbsp;<input type="number" style="width: 30px" disabled="disabled" value="7"></b></p>
                            <div class="col-md-2">
                              <label for="reps">Reps:</label>
                              <input type="number" class="form-control" id="reps7W1" name="reps7W1" placeholder="# Of Reps">
                            </div>
                            <div class="col-md-2">
                              <label for="intensity">Weight:</label>
                              <input type="number" class="form-control" id="intensity7W1"
                                name="intensity7W1" placeholder="Weight EX. 150">
                            </div>
                            <div class="col-md-2">
                              <label for="percent">Percentage:</label>
                              <input type="number"  class="form-control" id="percent7W1"
                                name="percent7W1" placeholder="Percentage EX. 55">
                            </div>
                            <div class="col-md-4">
                              <label for="assessmentType">Select Assessment Type: (Percentage Required!)</label>
                              <select disabled class="form-control" name="assessment7W1" id="assessment7W1">
                                <option value="" selected disabled>Please Select An Assessment</option>
                                <?php
                                  include("../lib/connect.php");
                                  $curUser = $_SESSION["myUsername"];
                                  $sql     = "select Assessment_name from assessmentType";
                                  $result  = mysqli_query($connection, $sql);
                                  while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row["Assessment_name"] . '">' . $row['Assessment_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div class="row" id="eighthtable" name= "eighthtable" style="display:none;">
                            <p><b>SET:<input type="number" style="width: 30px" disabled="disabled" value="8"></b></p>
                            <div class="col-md-2">
                              <label for="reps">Reps:</label>
                              <input type="number" class="form-control" id="reps8W1" name="reps8W1" placeholder="# Of Reps">
                            </div>
                            <div class="col-md-2">
                              <label for="intensity">Weight:</label>
                              <input type="number" class="form-control" id="intensity8W1"
                                name="intensity8W1" placeholder="Weight EX. 150">
                            </div>
                            <div class="col-md-2">
                              <label for="percent">Percentage:</label>
                              <input type="number" class="form-control" id="percent8W1"
                                name="percent8W1" placeholder="Percentage EX. 55">
                            </div>
                            <div class="col-md-4">
                              <label for="assessmentType">Select Assessment Type: (Percentage Required!)</label>
                              <select disabled class="form-control" name="assessment8W1" id="assessment8W1">
                                <option value="" selected disabled>Please Select An Assessment</option>
                                <?php
                                  include("../lib/connect.php");
                                  $curUser = $_SESSION["myUsername"];
                                  $sql     = "select Assessment_name from assessmentType";
                                  $result  = mysqli_query($connection, $sql);
                                  while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row["Assessment_name"] . '">' . $row['Assessment_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div class="row" id="ninethtable" name= "ninethtable" style="display:none;">
                            <p><b>SET:<input type="number" style="width: 30px" disabled="disabled" value="9"></b></p>
                            <div class="col-md-2">
                              <label for="reps">Reps:</label>
                              <input type="number" class="form-control" id="reps9W1" name="reps9W1" placeholder="# Of Reps">
                            </div>
                            <div class="col-md-2">
                              <label for="intensity">Weight:</label>
                              <input type="number" class="form-control" id="intensity9W1"
                                name="intensity9W1" placeholder="Weight EX. 150">
                            </div>
                            <div class="col-md-2">
                              <label for="percent">Percentage:</label>
                              <input type="number" class="form-control" id="percent9W1"
                                name="percent9W1" placeholder="Percentage EX. 55">
                            </div>
                            <div class="col-md-4">
                              <label for="assessmentType">Select Assessment Type: (Percentage Required!)</label>
                              <select disabled class="form-control" name="assessment9W1" id="assessment9W1">
                                <option value="" selected disabled>Please Select An Assessment</option>
                                <?php
                                  include("../lib/connect.php");
                                  $curUser = $_SESSION["myUsername"];
                                  $sql     = "select Assessment_name from assessmentType";
                                  $result  = mysqli_query($connection, $sql);
                                  while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row["Assessment_name"] . '">' . $row['Assessment_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div class="row" id="tenthtable" name= "tenthtable" style="display:none;">
                            <p><b>SET:<input type="number" style="width: 40px" disabled="disabled" value="10"></b></p>
                            <div class="col-md-2">
                              <label for="reps">Reps:</label>
                              <input type="number" class="form-control" id="reps10W1" name="reps10W1" placeholder="# Of Reps">
                            </div>
                            <div class="col-md-2">
                              <label for="intensity">Weight:</label>
                              <input type="number" class="form-control" id="intensity10W1"
                                name="intensity10W1" placeholder="Weight EX. 150">
                            </div>
                            <div class="col-md-2">
                              <label for="percent">Percentage:</label>
                              <input type="number"  class="form-control" id="percent10W1"
                                name="percent10W1" placeholder="Percentage EX. 55">
                            </div>
                            <div class="col-md-4">
                              <label for="assessmentType">Select Assessment Type: (Percentage Required!)</label>
                              <select disabled class="form-control" name="assessment10W1" id="assessment10W1">
                                <option value="" selected disabled>Please Select An Assessment</option>
                                <?php
                                  include("../lib/connect.php");
                                  $curUser = $_SESSION["myUsername"];
                                  $sql     = "select Assessment_name from assessmentType";
                                  $result  = mysqli_query($connection, $sql);
                                  while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row["Assessment_name"] . '">' . $row['Assessment_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-md-2">
                              <label for="rest">Rest:</label>
                              <input type="number" required class="form-control" id="restW1" name="restW1" placeholder="Rest">
                            </div>
                            <div class="col-md-2">
                              <label for="tempo">Tempo:</label>
                              <input type="text" required class="form-control" id="tempoW1" name="tempoW1" placeholder="Tempo EX. 1-1-1-1">
                            </div>
                          </div>
                        </div>
                        <!-- End of Set Form -->
                        <!-- Duplicate the Forms here and rename 2..3..1 etc -->
                        <div class="tab-pane" id="weekTwo">
                          <div class="row">
                            <div class="col-md-5">
                              <h4><b><u> WEEK TWO </u></b></h4>
                              <label for="sets">Sets:</label>
                              <select class="form-control"  id="selectSets2" name="selectSets2">
                                <option value="" selected disabled>Select Number of Sets</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                              </select>
                            </div>
                          </div>
                          <!-- Start of Set Form -->
                          <div class="row" id="firsttable2" name= "firsttable2" style="display:none;">
                            <p><b>SET:&nbsp;<input type="number" style="width: 30px" disabled="disabled" value="1"></b></p>
                            <div class="col-md-2">
                              <label for="reps">Reps:</label>
                              <input type="number"  class="form-control" id="reps1W2" name="reps1W2" placeholder="# Of Reps">
                            </div>
                            <div class="col-md-2">
                              <label for="intensity">Weight:</label>
                              <input type="number" class="form-control" id="intensity1W2"
                                name="intensity1W2" placeholder="Weight EX. 150">
                            </div>
                            <div class="col-md-2">
                              <label for="percent">Percentage:</label>
                              <input type="number"  class="form-control" id="percent1W2"
                                name="percent1W2" placeholder="Percentage EX. 55">
                            </div>
                            <div class="col-md-4">
                              <label for="assessmentType">Select Assessment Type: (Percentage Required!)</label>
                              <select disabled class="form-control" name="assessment1W2" id="assessment1W2" onchange="run()">
                                <option value="" selected disabled>Please Select An Assessment</option>
                                <?php
                                  include("../lib/connect.php");
                                  $curUser = $_SESSION["myUsername"];
                                  $sql     = "select Assessment_name from assessmentType";
                                  $result  = mysqli_query($connection, $sql);
                                  while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row["Assessment_name"] . '">' . $row['Assessment_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div class="row" id="secondtable2" name= "secondtable2" style="display:none;">
                            <p><b>SET:&nbsp;<input type="number" style="width: 30px" disabled="disabled" value="2"></b></p>
                            <div class="col-md-2">
                              <label for="reps">Reps:</label>
                              <input type="number"  class="form-control" id="reps2W2" name="reps2W2" placeholder="# Of Reps">
                            </div>
                            <div class="col-md-2">
                              <label for="intensity">Weight:</label>
                              <input type="number"  class="form-control" id="intensity2W2"
                                name="intensity2W2" placeholder="Weight EX. 150">
                            </div>
                            <div class="col-md-2">
                              <label for="percent">Percentage:</label>
                              <input type="number" class="form-control" id="percent2W2"
                                name="percent2W2" placeholder="Percentage EX. 55">
                            </div>
                            <div class="col-md-4">
                              <label for="assessmentType">Select Assessment Type: (Percentage Required!)</label>
                              <select disabled class="form-control" name="assessment2W2" id="assessment2W2">
                                <option value="" selected disabled>Please Select An Assessment</option>
                                <?php
                                  include("../lib/connect.php");
                                  $curUser = $_SESSION["myUsername"];
                                  $sql     = "select Assessment_name from assessmentType";
                                  $result  = mysqli_query($connection, $sql);
                                  while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row["Assessment_name"] . '">' . $row['Assessment_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div class="row" id="thirdtable2" name= "thirdtable2" style="display:none;">
                            <p><b>SET:&nbsp;<input type="number" style="width: 30px" disabled="disabled" value="3"></b></p>
                            <div class="col-md-2">
                              <label for="reps">Reps:</label>
                              <input type="number"  class="form-control" id="reps3W2" name="reps3W2" placeholder="# Of Reps">
                            </div>
                            <div class="col-md-2">
                              <label for="intensity">Weight:</label>
                              <input type="number"  class="form-control" id="intensity3W2"
                                name="intensity3W2" placeholder="Weight EX. 150">
                            </div>
                            <div class="col-md-2">
                              <label for="percent">Percentage:</label>
                              <input type="number" class="form-control" id="percent3W2"
                                name="percent3W2" placeholder="Percentage EX. 55">
                            </div>
                            <div class="col-md-4">
                              <label for="assessmentType">Select Assessment Type: (Percentage Required!)</label>
                              <select disabled class="form-control" name="assessment3W2" id="assessment3W2">
                                <option value="" selected disabled>Please Select An Assessment</option>
                                <?php
                                  include("../lib/connect.php");
                                  $curUser = $_SESSION["myUsername"];
                                  $sql     = "select Assessment_name from assessmentType";
                                  $result  = mysqli_query($connection, $sql);
                                  while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row["Assessment_name"] . '">' . $row['Assessment_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div class="row" id="fourthtable2" name= "fourthtable2" style="display:none;">
                            <p><b>SET:&nbsp;<input type="number" style="width: 30px" disabled="disabled" value="4"></b></p>
                            <div class="col-md-2">
                              <label for="reps">Reps:</label>
                              <input type="number" class="form-control" id="reps4W2" name="reps4W2" placeholder="# Of Reps">
                            </div>
                            <div class="col-md-2">
                              <label for="intensity">Weight:</label>
                              <input type="number" class="form-control" id="intensity4W2"
                                name="intensity4W2" placeholder="Weight EX. 150">
                            </div>
                            <div class="col-md-2">
                              <label for="percent">Percentage:</label>
                              <input type="number" class="form-control" id="percent4W2"
                                name="percent4W2" placeholder="Percentage EX. 55">
                            </div>
                            <div class="col-md-4">
                              <label for="assessmentType">Select Assessment Type: (Percentage Required!)</label>
                              <select disabled class="form-control" name="assessment4W2" id="assessment4W2">
                                <option value="" selected disabled>Please Select An Assessment</option>
                                <?php
                                  include("../lib/connect.php");
                                  $curUser = $_SESSION["myUsername"];
                                  $sql     = "select Assessment_name from assessmentType";
                                  $result  = mysqli_query($connection, $sql);
                                  while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row["Assessment_name"] . '">' . $row['Assessment_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div class="row" id="fifthtable2" name= "fifthtable2" style="display:none;">
                            <p><b>SET:&nbsp;<input type="number" style="width: 30px" disabled="disabled" value="5"></b></p>
                            <div class="col-md-2">
                              <label for="reps">Reps:</label>
                              <input type="number" class="form-control" id="reps5W2" name="reps5W2" placeholder="# Of Reps">
                            </div>
                            <div class="col-md-2">
                              <label for="intensity">Weight:</label>
                              <input type="number" class="form-control" id="intensity5W2"
                                name="intensity5W2" placeholder="Weight EX. 150">
                            </div>
                            <div class="col-md-2">
                              <label for="percent">Percentage:</label>
                              <input type="number"  class="form-control" id="percent5W2"
                                name="percent5W2" placeholder="Percentage EX. 55">
                            </div>
                            <div class="col-md-4">
                              <label for="assessmentType">Select Assessment Type: (Percentage Required!)</label>
                              <select disabled class="form-control" name="assessment5W2" id="assessment5W2">
                                <option value="" selected disabled>Please Select An Assessment</option>
                                <?php
                                  include("../lib/connect.php");
                                  $curUser = $_SESSION["myUsername"];
                                  $sql     = "select Assessment_name from assessmentType";
                                  $result  = mysqli_query($connection, $sql);
                                  while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row["Assessment_name"] . '">' . $row['Assessment_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div class="row" id="sixthtable2" name= "sixthtable2" style="display:none;">
                            <p><b>SET:&nbsp;<input type="number" style="width: 30px" disabled="disabled" value="6"></b></p>
                            <div class="col-md-2">
                              <label for="reps">Reps:</label>
                              <input type="number" class="form-control" id="reps6W2" name="reps6W2" placeholder="# Of Reps">
                            </div>
                            <div class="col-md-2">
                              <label for="intensity">Weight:</label>
                              <input type="number" class="form-control" id="intensity6W2"
                                name="intensity6W2" placeholder="Weight EX. 150">
                            </div>
                            <div class="col-md-2">
                              <label for="percent">Percentage:</label>
                              <input type="number"  class="form-control" id="percent6W2"
                                name="percent6W2" placeholder="Percentage EX. 55">
                            </div>
                            <div class="col-md-4">
                              <label for="assessmentType">Select Assessment Type: (Percentage Required!)</label>
                              <select disabled class="form-control" name="assessment6W2" id="assessment6W2">
                                <option value="" selected disabled>Please Select An Assessment</option>
                                <?php
                                  include("../lib/connect.php");
                                  $curUser = $_SESSION["myUsername"];
                                  $sql     = "select Assessment_name from assessmentType";
                                  $result  = mysqli_query($connection, $sql);
                                  while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row["Assessment_name"] . '">' . $row['Assessment_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div class="row" id="seventhtable2" name= "seventhtable2" style="display:none;">
                            <p><b>SET:&nbsp;<input type="number" style="width: 30px" disabled="disabled" value="7"></b></p>
                            <div class="col-md-2">
                              <label for="reps">Reps:</label>
                              <input type="number" class="form-control" id="reps7W2" name="reps7W2" placeholder="# Of Reps">
                            </div>
                            <div class="col-md-2">
                              <label for="intensity">Weight:</label>
                              <input type="number" class="form-control" id="intensity7W2"
                                name="intensity7W2" placeholder="Weight EX. 150">
                            </div>
                            <div class="col-md-2">
                              <label for="percent">Percentage:</label>
                              <input type="number"  class="form-control" id="percent7W2"
                                name="percent7W2" placeholder="Percentage EX. 55">
                            </div>
                            <div class="col-md-4">
                              <label for="assessmentType">Select Assessment Type: (Percentage Required!)</label>
                              <select disabled class="form-control" name="assessment7W2" id="assessment7W2">
                                <option value="" selected disabled>Please Select An Assessment</option>
                                <?php
                                  include("../lib/connect.php");
                                  $curUser = $_SESSION["myUsername"];
                                  $sql     = "select Assessment_name from assessmentType";
                                  $result  = mysqli_query($connection, $sql);
                                  while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row["Assessment_name"] . '">' . $row['Assessment_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div class="row" id="eighthtable2" name= "eighthtable2" style="display:none;">
                            <p><b>SET:<input type="number" style="width: 30px" disabled="disabled" value="8"></b></p>
                            <div class="col-md-2">
                              <label for="reps">Reps:</label>
                              <input type="number" class="form-control" id="reps8W2" name="reps8W2" placeholder="# Of Reps">
                            </div>
                            <div class="col-md-2">
                              <label for="intensity">Weight:</label>
                              <input type="number" class="form-control" id="intensity8W2"
                                name="intensity8W2" placeholder="Weight EX. 150">
                            </div>
                            <div class="col-md-2">
                              <label for="percent">Percentage:</label>
                              <input type="number" class="form-control" id="percent8W2"
                                name="percent8W2" placeholder="Percentage EX. 55">
                            </div>
                            <div class="col-md-4">
                              <label for="assessmentType">Select Assessment Type: (Percentage Required!)</label>
                              <select disabled class="form-control" name="assessment8W2" id="assessment8W2">
                                <option value="" selected disabled>Please Select An Assessment</option>
                                <?php
                                  include("../lib/connect.php");
                                  $curUser = $_SESSION["myUsername"];
                                  $sql     = "select Assessment_name from assessmentType";
                                  $result  = mysqli_query($connection, $sql);
                                  while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row["Assessment_name"] . '">' . $row['Assessment_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div class="row" id="ninethtable2" name= "ninethtable2" style="display:none;">
                            <p><b>SET:<input type="number" style="width: 30px" disabled="disabled" value="9"></b></p>
                            <div class="col-md-2">
                              <label for="reps">Reps:</label>
                              <input type="number" class="form-control" id="reps9W2" name="reps9W2" placeholder="# Of Reps">
                            </div>
                            <div class="col-md-2">
                              <label for="intensity">Weight:</label>
                              <input type="number" class="form-control" id="intensity9W2"
                                name="intensity9W2" placeholder="Weight EX. 150">
                            </div>
                            <div class="col-md-2">
                              <label for="percent">Percentage:</label>
                              <input type="number" class="form-control" id="percent9W2"
                                name="percent9W2" placeholder="Percentage EX. 55">
                            </div>
                            <div class="col-md-4">
                              <label for="assessmentType">Select Assessment Type: (Percentage Required!)</label>
                              <select disabled class="form-control" name="assessment9W2" id="assessment9W2">
                                <option value="" selected disabled>Please Select An Assessment</option>
                                <?php
                                  include("../lib/connect.php");
                                  $curUser = $_SESSION["myUsername"];
                                  $sql     = "select Assessment_name from assessmentType";
                                  $result  = mysqli_query($connection, $sql);
                                  while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row["Assessment_name"] . '">' . $row['Assessment_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div class="row" id="tenthtable2" name= "tenthtable2" style="display:none;">
                            <p><b>SET:<input type="number" style="width: 40px" disabled="disabled" value="10"></b></p>
                            <div class="col-md-2">
                              <label for="reps">Reps:</label>
                              <input type="number" class="form-control" id="reps10W2" name="reps10W2" placeholder="# Of Reps">
                            </div>
                            <div class="col-md-2">
                              <label for="intensity">Weight:</label>
                              <input type="number" class="form-control" id="intensity10W2"
                                name="intensity10W2" placeholder="Weight EX. 150">
                            </div>
                            <div class="col-md-2">
                              <label for="percent">Percentage:</label>
                              <input type="number"  class="form-control" id="percent10W2"
                                name="percent10W2" placeholder="Percentage EX. 55">
                            </div>
                            <div class="col-md-4">
                              <label for="assessmentType">Select Assessment Type: (Percentage Required!)</label>
                              <select disabled class="form-control" name="assessment10W2" id="assessment10W2">
                                <option value="" selected disabled>Please Select An Assessment</option>
                                <?php
                                  include("../lib/connect.php");
                                  $curUser = $_SESSION["myUsername"];
                                  $sql     = "select Assessment_name from assessmentType";
                                  $result  = mysqli_query($connection, $sql);
                                  while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row["Assessment_name"] . '">' . $row['Assessment_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-md-2">
                              <label for="rest">Rest:</label>
                              <input type="number"  class="form-control" id="restW2" name="restW2" placeholder="Rest">
                            </div>
                            <div class="col-md-2">
                              <label for="tempo">Tempo:</label>
                              <input type="text"  class="form-control" id="tempoW2" name="tempoW2" placeholder="Tempo EX. 1-1-1-1">
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="weekThree">
                          <div class="row">
                            <div class="col-md-5">
                              <h4><b><u> WEEK THREE </u></b></h4>
                              <label for="sets">Sets:</label>
                              <select class="form-control"  id="selectSets3" name="selectSets3">
                                <option value="" selected disabled>Select Number of Sets</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                              </select>
                            </div>
                          </div>
                          <!-- Start of Set Form -->
                          <div class="row" id="firsttable3" name= "firsttable3" style="display:none;">
                            <p><b>SET:&nbsp;<input type="number" style="width: 30px" disabled="disabled" value="1"></b></p>
                            <div class="col-md-2">
                              <label for="reps">Reps:</label>
                              <input type="number"  class="form-control" id="reps1W1" name="reps1W3" placeholder="# Of Reps">
                            </div>
                            <div class="col-md-2">
                              <label for="intensity">Weight:</label>
                              <input type="number" class="form-control" id="intensity1W3"
                                name="intensity1W3" placeholder="Weight EX. 150">
                            </div>
                            <div class="col-md-2">
                              <label for="percent">Percentage:</label>
                              <input type="number"  class="form-control" id="percent1W3"
                                name="percent1W3" placeholder="Percentage EX. 55">
                            </div>
                            <div class="col-md-4">
                              <label for="assessmentType">Select Assessment Type: (Percentage Required!)</label>
                              <select disabled class="form-control" name="assessment1W3" id="assessment1W3" onchange="run()">
                                <option value="" selected disabled>Please Select An Assessment</option>
                                <?php
                                  include("../lib/connect.php");
                                  $curUser = $_SESSION["myUsername"];
                                  $sql     = "select Assessment_name from assessmentType";
                                  $result  = mysqli_query($connection, $sql);
                                  while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row["Assessment_name"] . '">' . $row['Assessment_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div class="row" id="secondtable3" name= "secondtable3" style="display:none;">
                            <p><b>SET:&nbsp;<input type="number" style="width: 30px" disabled="disabled" value="2"></b></p>
                            <div class="col-md-2">
                              <label for="reps">Reps:</label>
                              <input type="number"  class="form-control" id="reps2W3" name="reps2W3" placeholder="# Of Reps">
                            </div>
                            <div class="col-md-2">
                              <label for="intensity">Weight:</label>
                              <input type="number"  class="form-control" id="intensity2W3"
                                name="intensity2W3" placeholder="Weight EX. 150">
                            </div>
                            <div class="col-md-2">
                              <label for="percent">Percentage:</label>
                              <input type="number" class="form-control" id="percent2W3"
                                name="percent2W3" placeholder="Percentage EX. 55">
                            </div>
                            <div class="col-md-4">
                              <label for="assessmentType">Select Assessment Type: (Percentage Required!)</label>
                              <select disabled class="form-control" name="assessment2W3" id="assessment2W3">
                                <option value="" selected disabled>Please Select An Assessment</option>
                                <?php
                                  include("../lib/connect.php");
                                  $curUser = $_SESSION["myUsername"];
                                  $sql     = "select Assessment_name from assessmentType";
                                  $result  = mysqli_query($connection, $sql);
                                  while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row["Assessment_name"] . '">' . $row['Assessment_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div class="row" id="thirdtable3" name= "thirdtable3" style="display:none;">
                            <p><b>SET:&nbsp;<input type="number" style="width: 30px" disabled="disabled" value="3"></b></p>
                            <div class="col-md-2">
                              <label for="reps">Reps:</label>
                              <input type="number"  class="form-control" id="reps3W3" name="reps3W3" placeholder="# Of Reps">
                            </div>
                            <div class="col-md-2">
                              <label for="intensity">Weight:</label>
                              <input type="number"  class="form-control" id="intensity3W3"
                                name="intensity3W3" placeholder="Weight EX. 150">
                            </div>
                            <div class="col-md-2">
                              <label for="percent">Percentage:</label>
                              <input type="number" class="form-control" id="percent3W3"
                                name="percent3W3" placeholder="Percentage EX. 55">
                            </div>
                            <div class="col-md-4">
                              <label for="assessmentType">Select Assessment Type: (Percentage Required!)</label>
                              <select disabled class="form-control" name="assessment3W3" id="assessment3W3">
                                <option value="" selected disabled>Please Select An Assessment</option>
                                <?php
                                  include("../lib/connect.php");
                                  $curUser = $_SESSION["myUsername"];
                                  $sql     = "select Assessment_name from assessmentType";
                                  $result  = mysqli_query($connection, $sql);
                                  while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row["Assessment_name"] . '">' . $row['Assessment_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div class="row" id="fourthtable3" name= "fourthtable3" style="display:none;">
                            <p><b>SET:&nbsp;<input type="number" style="width: 30px" disabled="disabled" value="4"></b></p>
                            <div class="col-md-2">
                              <label for="reps">Reps:</label>
                              <input type="number" class="form-control" id="reps4W3" name="reps4W3" placeholder="# Of Reps">
                            </div>
                            <div class="col-md-2">
                              <label for="intensity">Weight:</label>
                              <input type="number" class="form-control" id="intensity4W3"
                                name="intensity4W3" placeholder="Weight EX. 150">
                            </div>
                            <div class="col-md-2">
                              <label for="percent">Percentage:</label>
                              <input type="number" class="form-control" id="percent4W3"
                                name="percent4W3" placeholder="Percentage EX. 55">
                            </div>
                            <div class="col-md-4">
                              <label for="assessmentType">Select Assessment Type: (Percentage Required!)</label>
                              <select disabled class="form-control" name="assessment4W3" id="assessment4W3">
                                <option value="" selected disabled>Please Select An Assessment</option>
                                <?php
                                  include("../lib/connect.php");
                                  $curUser = $_SESSION["myUsername"];
                                  $sql     = "select Assessment_name from assessmentType";
                                  $result  = mysqli_query($connection, $sql);
                                  while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row["Assessment_name"] . '">' . $row['Assessment_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div class="row" id="fifthtable3" name= "fifthtable3" style="display:none;">
                            <p><b>SET:&nbsp;<input type="number" style="width: 30px" disabled="disabled" value="5"></b></p>
                            <div class="col-md-2">
                              <label for="reps">Reps:</label>
                              <input type="number" class="form-control" id="reps5W3" name="reps5W3" placeholder="# Of Reps">
                            </div>
                            <div class="col-md-2">
                              <label for="intensity">Weight:</label>
                              <input type="number" class="form-control" id="intensity5W3"
                                name="intensity5W3" placeholder="Weight EX. 150">
                            </div>
                            <div class="col-md-2">
                              <label for="percent">Percentage:</label>
                              <input type="number"  class="form-control" id="percent5W3"
                                name="percent5W3" placeholder="Percentage EX. 55">
                            </div>
                            <div class="col-md-4">
                              <label for="assessmentType">Select Assessment Type: (Percentage Required!)</label>
                              <select disabled class="form-control" name="assessment5W3" id="assessment5W3">
                                <option value="" selected disabled>Please Select An Assessment</option>
                                <?php
                                  include("../lib/connect.php");
                                  $curUser = $_SESSION["myUsername"];
                                  $sql     = "select Assessment_name from assessmentType";
                                  $result  = mysqli_query($connection, $sql);
                                  while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row["Assessment_name"] . '">' . $row['Assessment_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div class="row" id="sixthtable3" name= "sixthtable3" style="display:none;">
                            <p><b>SET:&nbsp;<input type="number" style="width: 30px" disabled="disabled" value="6"></b></p>
                            <div class="col-md-2">
                              <label for="reps">Reps:</label>
                              <input type="number" class="form-control" id="reps6W3" name="reps6W3" placeholder="# Of Reps">
                            </div>
                            <div class="col-md-2">
                              <label for="intensity">Weight:</label>
                              <input type="number" class="form-control" id="intensity6W3"
                                name="intensity6W3" placeholder="Weight EX. 150">
                            </div>
                            <div class="col-md-2">
                              <label for="percent">Percentage:</label>
                              <input type="number"  class="form-control" id="percent6W3"
                                name="percent6W3" placeholder="Percentage EX. 55">
                            </div>
                            <div class="col-md-4">
                              <label for="assessmentType">Select Assessment Type: (Percentage Required!)</label>
                              <select disabled class="form-control" name="assessment6W3" id="assessment6W3">
                                <option value="" selected disabled>Please Select An Assessment</option>
                                <?php
                                  include("../lib/connect.php");
                                  $curUser = $_SESSION["myUsername"];
                                  $sql     = "select Assessment_name from assessmentType";
                                  $result  = mysqli_query($connection, $sql);
                                  while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row["Assessment_name"] . '">' . $row['Assessment_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div class="row" id="seventhtable3" name= "seventhtable3" style="display:none;">
                            <p><b>SET:&nbsp;<input type="number" style="width: 30px" disabled="disabled" value="7"></b></p>
                            <div class="col-md-2">
                              <label for="reps">Reps:</label>
                              <input type="number" class="form-control" id="reps7W3" name="reps7W3" placeholder="# Of Reps">
                            </div>
                            <div class="col-md-2">
                              <label for="intensity">Weight:</label>
                              <input type="number" class="form-control" id="intensity7W3"
                                name="intensity7W3" placeholder="Weight EX. 150">
                            </div>
                            <div class="col-md-2">
                              <label for="percent">Percentage:</label>
                              <input type="number"  class="form-control" id="percent7W3"
                                name="percent7W3" placeholder="Percentage EX. 55">
                            </div>
                            <div class="col-md-4">
                              <label for="assessmentType">Select Assessment Type: (Percentage Required!)</label>
                              <select disabled class="form-control" name="assessment7W3" id="assessment7W3">
                                <option value="" selected disabled>Please Select An Assessment</option>
                                <?php
                                  include("../lib/connect.php");
                                  $curUser = $_SESSION["myUsername"];
                                  $sql     = "select Assessment_name from assessmentType";
                                  $result  = mysqli_query($connection, $sql);
                                  while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row["Assessment_name"] . '">' . $row['Assessment_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div class="row" id="eighthtable3" name= "eighthtable3" style="display:none;">
                            <p><b>SET:<input type="number" style="width: 30px" disabled="disabled" value="8"></b></p>
                            <div class="col-md-2">
                              <label for="reps">Reps:</label>
                              <input type="number" class="form-control" id="reps8W3" name="reps8W3" placeholder="# Of Reps">
                            </div>
                            <div class="col-md-2">
                              <label for="intensity">Weight:</label>
                              <input type="number" class="form-control" id="intensity8W3"
                                name="intensity8W3" placeholder="Weight EX. 150">
                            </div>
                            <div class="col-md-2">
                              <label for="percent">Percentage:</label>
                              <input type="number" class="form-control" id="percent8W3"
                                name="percent8W3" placeholder="Percentage EX. 55">
                            </div>
                            <div class="col-md-4">
                              <label for="assessmentType">Select Assessment Type: (Percentage Required!)</label>
                              <select disabled class="form-control" name="assessment8W3" id="assessment8W3">
                                <option value="" selected disabled>Please Select An Assessment</option>
                                <?php
                                  include("../lib/connect.php");
                                  $curUser = $_SESSION["myUsername"];
                                  $sql     = "select Assessment_name from assessmentType";
                                  $result  = mysqli_query($connection, $sql);
                                  while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row["Assessment_name"] . '">' . $row['Assessment_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div class="row" id="ninethtable3" name= "ninethtable3" style="display:none;">
                            <p><b>SET:<input type="number" style="width: 30px" disabled="disabled" value="9"></b></p>
                            <div class="col-md-2">
                              <label for="reps">Reps:</label>
                              <input type="number" class="form-control" id="reps9W3" name="reps9W3" placeholder="# Of Reps">
                            </div>
                            <div class="col-md-2">
                              <label for="intensity">Weight:</label>
                              <input type="number" class="form-control" id="intensity9W3"
                                name="intensity9W3" placeholder="Weight EX. 150">
                            </div>
                            <div class="col-md-2">
                              <label for="percent">Percentage:</label>
                              <input type="number" class="form-control" id="percent9W3"
                                name="percent9W3" placeholder="Percentage EX. 55">
                            </div>
                            <div class="col-md-4">
                              <label for="assessmentType">Select Assessment Type: (Percentage Required!)</label>
                              <select disabled class="form-control" name="assessment9W3" id="assessment9W3">
                                <option value="" selected disabled>Please Select An Assessment</option>
                                <?php
                                  include("../lib/connect.php");
                                  $curUser = $_SESSION["myUsername"];
                                  $sql     = "select Assessment_name from assessmentType";
                                  $result  = mysqli_query($connection, $sql);
                                  while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row["Assessment_name"] . '">' . $row['Assessment_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div class="row" id="tenthtable3" name= "tenthtable3" style="display:none;">
                            <p><b>SET:<input type="number" style="width: 40px" disabled="disabled" value="10"></b></p>
                            <div class="col-md-2">
                              <label for="reps">Reps:</label>
                              <input type="number" class="form-control" id="reps10W3" name="reps10W3" placeholder="# Of Reps">
                            </div>
                            <div class="col-md-2">
                              <label for="intensity">Weight:</label>
                              <input type="number" class="form-control" id="intensity10W3"
                                name="intensity10W3" placeholder="Weight EX. 150">
                            </div>
                            <div class="col-md-2">
                              <label for="percent">Percentage:</label>
                              <input type="number"  class="form-control" id="percent10W3"
                                name="percent10W3" placeholder="Percentage EX. 55">
                            </div>
                            <div class="col-md-4">
                              <label for="assessmentType">Select Assessment Type: (Percentage Required!)</label>
                              <select disabled class="form-control" name="assessment10W3" id="assessment10W3">
                                <option value="" selected disabled>Please Select An Assessment</option>
                                <?php
                                  include("../lib/connect.php");
                                  $curUser = $_SESSION["myUsername"];
                                  $sql     = "select Assessment_name from assessmentType";
                                  $result  = mysqli_query($connection, $sql);
                                  while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row["Assessment_name"] . '">' . $row['Assessment_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-md-2">
                              <label for="rest">Rest:</label>
                              <input type="number"  class="form-control" id="restW3" name="restW3" placeholder="Rest">
                            </div>
                            <div class="col-md-2">
                              <label for="tempo">Tempo:</label>
                              <input type="text"  class="form-control" id="tempoW3" name="tempoW3" placeholder="Tempo EX. 1-1-1-1">
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="weekFour">
                          <div class="row">
                            <div class="col-md-5">
                              <h4><b><u> WEEK FOUR </u></b></h4>
                              <label for="sets">Sets:</label>
                              <select class="form-control"  id="selectSets4" name="selectSets4">
                                <option value="" selected disabled>Select Number of Sets</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                              </select>
                            </div>
                          </div>
                          <!-- Start of Set Form -->
                          <div class="row" id="firsttable4" name= "firsttable4" style="display:none;">
                            <p><b>SET:&nbsp;<input type="number" style="width: 30px" disabled="disabled" value="1"></b></p>
                            <div class="col-md-2">
                              <label for="reps">Reps:</label>
                              <input type="number"  class="form-control" id="reps1W4" name="reps1W4" placeholder="# Of Reps">
                            </div>
                            <div class="col-md-2">
                              <label for="intensity">Weight:</label>
                              <input type="number" class="form-control" id="intensity1W4"
                                name="intensity1W4" placeholder="Weight EX. 150">
                            </div>
                            <div class="col-md-2">
                              <label for="percent">Percentage:</label>
                              <input type="number"  class="form-control" id="percent1W4"
                                name="percent1W4" placeholder="Percentage EX. 55">
                            </div>
                            <div class="col-md-4">
                              <label for="assessmentType">Select Assessment Type: (Percentage Required!)</label>
                              <select disabled class="form-control" name="assessment1W4" id="assessment1W4" onchange="run()">
                                <option value="" selected disabled>Please Select An Assessment</option>
                                <?php
                                  include("../lib/connect.php");
                                  $curUser = $_SESSION["myUsername"];
                                  $sql     = "select Assessment_name from assessmentType";
                                  $result  = mysqli_query($connection, $sql);
                                  while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row["Assessment_name"] . '">' . $row['Assessment_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div class="row" id="secondtable4" name= "secondtable4" style="display:none;">
                            <p><b>SET:&nbsp;<input type="number" style="width: 30px" disabled="disabled" value="2"></b></p>
                            <div class="col-md-2">
                              <label for="reps">Reps:</label>
                              <input type="number"  class="form-control" id="reps2W4" name="reps2W4" placeholder="# Of Reps">
                            </div>
                            <div class="col-md-2">
                              <label for="intensity">Weight:</label>
                              <input type="number"  class="form-control" id="intensity2W4"
                                name="intensity2W4" placeholder="Weight EX. 150">
                            </div>
                            <div class="col-md-2">
                              <label for="percent">Percentage:</label>
                              <input type="number" class="form-control" id="percent2W4"
                                name="percent2W4" placeholder="Percentage EX. 55">
                            </div>
                            <div class="col-md-4">
                              <label for="assessmentType">Select Assessment Type: (Percentage Required!)</label>
                              <select disabled class="form-control" name="assessment2W4" id="assessment2W4">
                                <option value="" selected disabled>Please Select An Assessment</option>
                                <?php
                                  include("../lib/connect.php");
                                  $curUser = $_SESSION["myUsername"];
                                  $sql     = "select Assessment_name from assessmentType";
                                  $result  = mysqli_query($connection, $sql);
                                  while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row["Assessment_name"] . '">' . $row['Assessment_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div class="row" id="thirdtable4" name= "thirdtable4" style="display:none;">
                            <p><b>SET:&nbsp;<input type="number" style="width: 30px" disabled="disabled" value="3"></b></p>
                            <div class="col-md-2">
                              <label for="reps">Reps:</label>
                              <input type="number"  class="form-control" id="reps3W4" name="reps3W4" placeholder="# Of Reps">
                            </div>
                            <div class="col-md-2">
                              <label for="intensity">Weight:</label>
                              <input type="number"  class="form-control" id="intensity3W4"
                                name="intensity3W4" placeholder="Weight EX. 150">
                            </div>
                            <div class="col-md-2">
                              <label for="percent">Percentage:</label>
                              <input type="number" class="form-control" id="percent3W4"
                                name="percent3W4" placeholder="Percentage EX. 55">
                            </div>
                            <div class="col-md-4">
                              <label for="assessmentType">Select Assessment Type: (Percentage Required!)</label>
                              <select disabled class="form-control" name="assessment3W4" id="assessment3W4">
                                <option value="" selected disabled>Please Select An Assessment</option>
                                <?php
                                  include("../lib/connect.php");
                                  $curUser = $_SESSION["myUsername"];
                                  $sql     = "select Assessment_name from assessmentType";
                                  $result  = mysqli_query($connection, $sql);
                                  while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row["Assessment_name"] . '">' . $row['Assessment_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div class="row" id="fourthtable4" name= "fourthtable4" style="display:none;">
                            <p><b>SET:&nbsp;<input type="number" style="width: 30px" disabled="disabled" value="4"></b></p>
                            <div class="col-md-2">
                              <label for="reps">Reps:</label>
                              <input type="number" class="form-control" id="reps4W4" name="reps4W4" placeholder="# Of Reps">
                            </div>
                            <div class="col-md-2">
                              <label for="intensity">Weight:</label>
                              <input type="number" class="form-control" id="intensity4W4"
                                name="intensity4W4" placeholder="Weight EX. 150">
                            </div>
                            <div class="col-md-2">
                              <label for="percent">Percentage:</label>
                              <input type="number" class="form-control" id="percent4W4"
                                name="percent4W4" placeholder="Percentage EX. 55">
                            </div>
                            <div class="col-md-4">
                              <label for="assessmentType">Select Assessment Type: (Percentage Required!)</label>
                              <select disabled class="form-control" name="assessment4W4" id="assessment4W4">
                                <option value="" selected disabled>Please Select An Assessment</option>
                                <?php
                                  include("../lib/connect.php");
                                  $curUser = $_SESSION["myUsername"];
                                  $sql     = "select Assessment_name from assessmentType";
                                  $result  = mysqli_query($connection, $sql);
                                  while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row["Assessment_name"] . '">' . $row['Assessment_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div class="row" id="fifthtable4" name= "fifthtable4" style="display:none;">
                            <p><b>SET:&nbsp;<input type="number" style="width: 30px" disabled="disabled" value="5"></b></p>
                            <div class="col-md-2">
                              <label for="reps">Reps:</label>
                              <input type="number" class="form-control" id="reps5W4" name="reps5W4" placeholder="# Of Reps">
                            </div>
                            <div class="col-md-2">
                              <label for="intensity">Weight:</label>
                              <input type="number" class="form-control" id="intensity5W4"
                                name="intensity5W4" placeholder="Weight EX. 150">
                            </div>
                            <div class="col-md-2">
                              <label for="percent">Percentage:</label>
                              <input type="number"  class="form-control" id="percent5W4"
                                name="percent5W4" placeholder="Percentage EX. 55">
                            </div>
                            <div class="col-md-4">
                              <label for="assessmentType">Select Assessment Type: (Percentage Required!)</label>
                              <select disabled class="form-control" name="assessment5W4" id="assessment5W4">
                                <option value="" selected disabled>Please Select An Assessment</option>
                                <?php
                                  include("../lib/connect.php");
                                  $curUser = $_SESSION["myUsername"];
                                  $sql     = "select Assessment_name from assessmentType";
                                  $result  = mysqli_query($connection, $sql);
                                  while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row["Assessment_name"] . '">' . $row['Assessment_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div class="row" id="sixthtable4" name= "sixthtable4" style="display:none;">
                            <p><b>SET:&nbsp;<input type="number" style="width: 30px" disabled="disabled" value="6"></b></p>
                            <div class="col-md-2">
                              <label for="reps">Reps:</label>
                              <input type="number" class="form-control" id="reps6W4" name="reps6W4" placeholder="# Of Reps">
                            </div>
                            <div class="col-md-2">
                              <label for="intensity">Weight:</label>
                              <input type="number" class="form-control" id="intensity6W4"
                                name="intensity6W4" placeholder="Weight EX. 150">
                            </div>
                            <div class="col-md-2">
                              <label for="percent">Percentage:</label>
                              <input type="number"  class="form-control" id="percent6W4"
                                name="percent6W4" placeholder="Percentage EX. 55">
                            </div>
                            <div class="col-md-4">
                              <label for="assessmentType">Select Assessment Type: (Percentage Required!)</label>
                              <select disabled class="form-control" name="assessment6W4" id="assessment6W4">
                                <option value="" selected disabled>Please Select An Assessment</option>
                                <?php
                                  include("../lib/connect.php");
                                  $curUser = $_SESSION["myUsername"];
                                  $sql     = "select Assessment_name from assessmentType";
                                  $result  = mysqli_query($connection, $sql);
                                  while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row["Assessment_name"] . '">' . $row['Assessment_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div class="row" id="seventhtable4" name= "seventhtable4" style="display:none;">
                            <p><b>SET:&nbsp;<input type="number" style="width: 30px" disabled="disabled" value="7"></b></p>
                            <div class="col-md-2">
                              <label for="reps">Reps:</label>
                              <input type="number" class="form-control" id="reps7W4" name="reps7W4" placeholder="# Of Reps">
                            </div>
                            <div class="col-md-2">
                              <label for="intensity">Weight:</label>
                              <input type="number" class="form-control" id="intensity7W4"
                                name="intensity7W4" placeholder="Weight EX. 150">
                            </div>
                            <div class="col-md-2">
                              <label for="percent">Percentage:</label>
                              <input type="number"  class="form-control" id="percent7W4"
                                name="percent7W4" placeholder="Percentage EX. 55">
                            </div>
                            <div class="col-md-4">
                              <label for="assessmentType">Select Assessment Type: (Percentage Required!)</label>
                              <select disabled class="form-control" name="assessment7W4" id="assessment7W4">
                                <option value="" selected disabled>Please Select An Assessment</option>
                                <?php
                                  include("../lib/connect.php");
                                  $curUser = $_SESSION["myUsername"];
                                  $sql     = "select Assessment_name from assessmentType";
                                  $result  = mysqli_query($connection, $sql);
                                  while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row["Assessment_name"] . '">' . $row['Assessment_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div class="row" id="eighthtable4" name= "eighthtable4" style="display:none;">
                            <p><b>SET:<input type="number" style="width: 30px" disabled="disabled" value="8"></b></p>
                            <div class="col-md-2">
                              <label for="reps">Reps:</label>
                              <input type="number" class="form-control" id="reps8W4" name="reps8W4" placeholder="# Of Reps">
                            </div>
                            <div class="col-md-2">
                              <label for="intensity">Weight:</label>
                              <input type="number" class="form-control" id="intensity8W4"
                                name="intensity8W4" placeholder="Weight EX. 150">
                            </div>
                            <div class="col-md-2">
                              <label for="percent">Percentage:</label>
                              <input type="number" class="form-control" id="percent8W4"
                                name="percent8W4" placeholder="Percentage EX. 55">
                            </div>
                            <div class="col-md-4">
                              <label for="assessmentType">Select Assessment Type: (Percentage Required!)</label>
                              <select disabled class="form-control" name="assessment8W4" id="assessment8W4">
                                <option value="" selected disabled>Please Select An Assessment</option>
                                <?php
                                  include("../lib/connect.php");
                                  $curUser = $_SESSION["myUsername"];
                                  $sql     = "select Assessment_name from assessmentType";
                                  $result  = mysqli_query($connection, $sql);
                                  while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row["Assessment_name"] . '">' . $row['Assessment_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div class="row" id="ninethtable4" name= "ninethtable4" style="display:none;">
                            <p><b>SET:<input type="number" style="width: 30px" disabled="disabled" value="9"></b></p>
                            <div class="col-md-2">
                              <label for="reps">Reps:</label>
                              <input type="number" class="form-control" id="reps9W4" name="reps9W4" placeholder="# Of Reps">
                            </div>
                            <div class="col-md-2">
                              <label for="intensity">Weight:</label>
                              <input type="number" class="form-control" id="intensity9W4"
                                name="intensity9W4" placeholder="Weight EX. 150">
                            </div>
                            <div class="col-md-2">
                              <label for="percent">Percentage:</label>
                              <input type="number" class="form-control" id="percent9W4"
                                name="percent9W4" placeholder="Percentage EX. 55">
                            </div>
                            <div class="col-md-4">
                              <label for="assessmentType">Select Assessment Type: (Percentage Required!)</label>
                              <select disabled class="form-control" name="assessment9W4" id="assessment9W4">
                                <option value="" selected disabled>Please Select An Assessment</option>
                                <?php
                                  include("../lib/connect.php");
                                  $curUser = $_SESSION["myUsername"];
                                  $sql     = "select Assessment_name from assessmentType";
                                  $result  = mysqli_query($connection, $sql);
                                  while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row["Assessment_name"] . '">' . $row['Assessment_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div class="row" id="tenthtable4" name= "tenthtable4" style="display:none;">
                            <p><b>SET:<input type="number" style="width: 40px" disabled="disabled" value="10"></b></p>
                            <div class="col-md-2">
                              <label for="reps">Reps:</label>
                              <input type="number" class="form-control" id="reps10W4" name="reps10W4" placeholder="# Of Reps">
                            </div>
                            <div class="col-md-2">
                              <label for="intensity">Weight:</label>
                              <input type="number" class="form-control" id="intensity10W4"
                                name="intensity10W4" placeholder="Weight EX. 150">
                            </div>
                            <div class="col-md-2">
                              <label for="percent">Percentage:</label>
                              <input type="number"  class="form-control" id="percent10W4"
                                name="percent10W4" placeholder="Percentage EX. 55">
                            </div>
                            <div class="col-md-4">
                              <label for="assessmentType">Select Assessment Type: (Percentage Required!)</label>
                              <select disabled class="form-control" name="assessment10W4" id="assessment10W4">
                                <option value="" selected disabled>Please Select An Assessment</option>
                                <?php
                                  include("../lib/connect.php");
                                  $curUser = $_SESSION["myUsername"];
                                  $sql     = "select Assessment_name from assessmentType";
                                  $result  = mysqli_query($connection, $sql);
                                  while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row["Assessment_name"] . '">' . $row['Assessment_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-md-2">
                              <label for="rest">Rest:</label>
                              <input type="number"  class="form-control" id="restW4" name="restW4" placeholder="Rest">
                            </div>
                            <div class="col-md-2">
                              <label for="tempo">Tempo:</label>
                              <input type="text"  class="form-control" id="tempoW4" name="tempoW4" placeholder="Tempo EX. 1-1-1-1">
                            </div>
                          </div>
                        </div>
                      </div>
                      <br>
                      <button type="submit" class="btn btn-primary" value="Add Exercise"><span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp Add Exercise</button>
                    </form>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">Currently Used Orders</h3>
                  </div>
                  <div class="panel-body">
                    <form>
                    <div class="form-group">
                      <label for="workoutName">Macro Name:</label>
                      <select class="form-control" required id="workout" name="workout" onchange="printUsedExercises(this.value)">
                        <option value="" selected disabled>Select Macro Name</option>
                        <?php
                          include("../lib/connect.php");
                          $curUser = $_SESSION["myUsername"];
                          $sql     = "select workoutName from CurrentWorkouts where whosWorkout='$curUser'";
                          $result  = mysqli_query($connection, $sql);
                          while ($row = mysqli_fetch_array($result)) {
                          $tempName = $row["workoutName"];
                          $tempName = strstr($tempName, '-', true);
                          echo '<option value="' . $row["workoutName"] . '">' . $tempName . "</option>";
                          }
                          ?>
                      </select>
                    </div>
                  </form>
                    <div id="output"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--End of add exercise to workout tab-->
          <!--Remove workout tab-->
          <div class="tab-pane" id="removeWorkout">
            <div class="row">
              <div class="col-md-5">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">Remove Workout</h3>
                  </div>
                  <div class="panel-body">
                    <form role="form" method="POST" id="removeWorkoutForm" action="../lib/removeWorkout.php">
                      <div class="errorDiv">
                        <!--Print out errors from the add workout form-->
                        <?php
                          if (isset($_SESSION["removeWorkoutErrors"]) && isset($_SESSION["removeWorkoutAttempt"])) {
                            unset($_SESSION["removeWorkoutAttempt"]);
                            print "Errors occured <br>\n";

                            foreach ($_SESSION["removeWorkoutErrors"] as $error) {
                              print $error . "<br>\n";
                            }
                          }
                          ?>
                      </div>
                      <label for="workoutName">Select Workout To Remove:</label>
                      <select class="form-control" required id="workoutToRemove" name="workoutToRemove">
                        <option value="" selected disabled>Please Select A Macro Name</option>
                        <?php
                          include("../lib/connect.php");
                          $curUser = $_SESSION["myUsername"];
                          $sql     = "select workoutName from CurrentWorkouts where whosWorkout='$curUser'";
                          $result  = mysqli_query($connection, $sql);
                          while ($row = mysqli_fetch_array($result)) {
                          	$tempName = $row["workoutName"];
                          	$tempName = strstr($tempName, '-', true);
                            echo '<option value="' . $row["workoutName"] . '">' . $tempName . "</option>";
                          }
                          ?>
                      </select>
                      <br>
                      <button type="submit" name="submit" class="btn btn-primary" value="Remove Workout" onclick="return confirmWrkOutRmv()"><span class="glyphicon glyphicon-trash"></span>&nbsp&nbsp Remove Workout</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--End of tab-->
          <div class="tab-pane" id="previousWorkouts">
            <div class="row">
              <div class="col-md-6">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">Manage Workout(s)</h3>
                  </div>
                  <div class="panel-body">
                    <div class="form-group">
                      <form role="form" id="previousWorkoutForm1" >
                        <label for="workoutName">Select Workout:</label>
                        <select class="form-control" id="workouts" name="workouts" onchange="printWorkout(this.value)">
                          <option value="" selected disabled>Select A Workout</option>
                          <?php
                            include("../lib/connect.php");
                            $curUser = $_SESSION["myUsername"];
                            $sql     = "select workoutName from CurrentWorkouts where whosWorkout='$curUser'";
                            $result  = mysqli_query($connection, $sql);
                            while ($row = mysqli_fetch_array($result)) {
                            	$tempName = $row["workoutName"];
                            	$tempName = strstr($tempName, '-', true);
                              echo '<option value="' . $row["workoutName"] . '">' . $tempName . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                  </div>
                </div>
              </div>
              </form>
              <form role="form" method="POST" id="previousWorkoutForm" action="../lib/RmvExerciseFrmWrkout.php">
              <div id="output2"></div>
            </form>
              </div>
              </div>
            </div>
          </div>
        </div>
        <!--End of tab-->
      </div>
      </div>
      <!--End of container-->
    </section>
    <br><br>
    <?php
      require_once("../templates/printFooter.php");
      printFooter();
     ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
    <script src="../js/workoutFunctions.js"></script>
  </body>
</html>
