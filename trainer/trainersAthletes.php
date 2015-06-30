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
              <li class="active"><a href="trainersAthletes.php">Athletes</a></li>
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
        <!--<div class="page-header">-->
        <img class="center-block img-responsive" src="../img/headers/fitMeAthleteManagement2.png" width="550" height="350">
        <hr class="colored">
        <!--Create athlete tabs-->
        <ul class="nav nav-tabs" id="myTab">
          <li class="active"><a href="#addUser" data-toggle="tab">Create Athlete/User</a></li>
          <li><a href="#currentUsers" data-toggle="tab">Current Athletes</a></li>
          <li><a href="#assignWorkout" data-toggle="tab">Assign Workout</a></li>
        </ul>
        <br>
        <div class="tab-content">
          <div class="tab-pane active" id="addUser">
            <div class="row">
              <div class="col-md-5">
                <!-- Large modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Create Athlete Demo</button>
                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><font color="#2196f3">Create Athlete Tab</font></h4>
                        <hr class="colored">
                      </div>
                      <div class="modal-body">
                        <img class="center-block img-responsive" src="../img/FitMe-CreateAthleteTab.jpg" width="800" height="1000">
                        <ul class="modalList1">
                          <h6>
                            <li>Once you have clicked on the Athletes Page, you will see the four different tabs.</li>
                            <li>The Create Athlete Tab will require the Administrator to put in the following information for the Athlete:</li>
                            <ul class="modalList2">
                              <li>Username (Can include upper and lower case letters, numbers, and special characters)</li>
                              <li>Password (Can include upper and lower case letters, numbers, and special characters)</li>
                              <li>Email Address</li>
                              <li>First Name</li>
                              <li>Last Name</li>
                              <li>Select Sport (Select the sport that the athlete plays from the dropdown list)</li>
                              <li>Height (Height must be entered in inches)</li>
                              <li>Weight (Weight must be entered in pounds)</li>
                            </ul>
                            <li>After filling out all of the text fields, click the <b>Add Athlete</b> button and a message will be displayed saying that your Athlete has been successfully created.</li>
                            <li>If for some reason you forget to enter information into a text field or put in the incorrect information, the text field will have a red glow around it along with an error indicating that something is wrong.</li>
                          </h6>
                        </ul>
                      </div>
                      <!--.modal-body-->
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
                <br>
                <br>
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">Create New Athlete</h3>
                  </div>
                  <div class="panel-body">
                    <!--Form to collect all athletes information-->
                    <form role="form" method="POST" id="addAthleteForm" action="../lib/addAthlete.php">
                      <div class="errorDiv">
                        <!--Print any errors from the add athlete form-->
                        <?php
                          if (isset($_SESSION["addAthleteErrors"]) && isset($_SESSION["addAthleteAttempt"])) {
                            unset($_SESSION["addAthleteAttempt"]);
                            print "Errors occured <br>\n";

                            foreach ($_SESSION["addAthleteErrors"] as $error) {
                              print $error . "<br>\n";
                            }
                          }
                          ?>
                      </div>
                      <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" required class="form-control" id="newUsername"
                          name="newUsername" placeholder="Username">
                      </div>
                      <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" required class="form-control" id="userPassword"
                          name="userPassword" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" required class="form-control" id="athleteEmail"
                          name="athleteEmail" placeholder="email@address.com">
                      </div>
                      <div class="form-group">
                        <label for="firstName">First Name:</label>
                        <input type="text" required class="form-control" id="firstName" name="firstName"
                          placeholder="First Name">
                      </div>
                      <div class="form-group">
                        <label for="lastName">Last Name:</label>
                        <input type="text" required class="form-control" id="lastName" name="lastName" placeholder="Last Name">
                      </div>
                      <div class="form-group">
                        <label for="sport">Sport/Workout Type:</label>
                        <select class="form-control" required name="sport" id="sport">
                          <option value="" selected disabled>Please Select A Sport/Workout Type</option>
                          <?php
                            include("../lib/connect.php");
                            $curUser = $_SESSION["myUsername"];
                            $sql     = "select sport_name from sports where 1 order by sport_name";
                            $result  = mysqli_query($connection, $sql);
                            while ($row = mysqli_fetch_array($result)) {
                              echo '<option value="' . $row["sport_name"] . '">' . $row['sport_name'] . "</option>";
                            }
                            ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="athleteHeight">Height (In Inches):</label>
                        <input type="number" required class="form-control" id="athleteHeight"
                          name="athleteHeight" placeholder="Height">
                      </div>
                      <div class="form-group">
                        <label for="athleteWeight">Weight (In Pounds):</label>
                        <input type="number" required class="form-control" id="athleteWeight"
                          name="athleteWeight" placeholder="Weight">
                      </div>
                      <button type="submit" class="btn btn-primary" value="Create Athlete"><span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp Create Athlete</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!--End of first tab-->
          </div>
          <!--End of second tab-->
          <div class="tab-pane" id="currentUsers">
            <!-- Large modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".current-users-modal-lg">Current Athletes Demo</button>
            <div class="modal fade current-users-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><font color="#2196f3">Current Users Tab</font></h4>
                    <hr class="colored">
                  </div>
                  <div class="modal-body">
                    <img class="center-block img-responsive" src="../img/FitMe-CreateAthleteTab.jpg" width="800" height="1000">
                    <ul class="modalList1">
                      <h6>
                        <li>Once you have clicked on the Athletes Page, you will see the four different tabs.</li>
                        <li>The Create Athlete Tab will require the Administrator to put in the following information for the Athlete:</li>
                        <ul class="modalList2">
                          <li>Username (Can include upper and lower case letters, numbers, and special characters)</li>
                          <li>Password (Can include upper and lower case letters, numbers, and special characters)</li>
                          <li>Email Address</li>
                          <li>First Name</li>
                          <li>Last Name</li>
                          <li>Select Sport (Select the sport that the athlete plays from the dropdown list)</li>
                          <li>Height (Height must be entered in inches)</li>
                          <li>Weight (Weight must be entered in pounds)</li>
                        </ul>
                        <li>After filling out all of the text fields, click the <b>Add Athlete</b> button and a message will be displayed saying that your Athlete has been successfully created.</li>
                        <li>If for some reason you forget to enter information into a text field or put in the incorrect information, the text field will have a red glow around it along with an error indicating that something is wrong.</li>
                      </h6>
                    </ul>
                  </div>
                  <!--.modal-body-->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            <br>
            <br>
            <!--PHP script to print out the current athletes-->
            <h3>Current Athletes</h3>
            <form role="form" method="POST" id="removeAthleteForm" name="removeAthleteForm" action="../lib/removeAthlete.php">
              <!--<form role="form" method="GET" id="athletesForm" name="athletesForm" action="../lib/removeAthlete.php>-->
              <?php
                #Print out current users athletes.
                include("../lib/connect.php");

                $curUser = $_SESSION["myUsername"];
                $sql     = "select username, firstName, lastName, email, sport,
                              height, weight,remIndex from
                              users where coachID='$curUser' order by username";

                $result = mysqli_query($connection, $sql);

                print " <div class='table-responsive'>
                                  <table class='table table-striped table-bordered' id='currentAthletesTable'>
                                      <thead>
                                          <tr>
                                              <th>Username</th>
                                              <th>First Name</th>
                                              <th>Last Name</th>
                                              <th>Email</th>
                                              <th>Height</th>
                                              <th>Weight</th>
                                              <th>Sport</th>
                <th>Remove</th>
                                          </tr>
                                      </thead>";
                print "<tbody>";

                while ($row = mysqli_fetch_array($result)) {
                  print "<tr>";
                  print '<td><u><a href="../lib/printAthletesWorkout.php?myAthlete=' . $row['username'] . "@". $row['firstName'] . "," . $row['lastName'] . '">' . $row['username'] . '</a></u></td>';
                  print "<td>" . $row['firstName'] . "</td>";
                  print "<td>" . $row['lastName'] . "</td>";
                  print "<td>" . $row['email'] . "</td>";
                  print "<td>" . $row['height'] . "</td>";
                  print "<td>" . $row['weight'] . "</td>";
                  print "<td>" . $row['sport'] . "</td>";
                echo '<td><input type="checkbox" name="Index[]" id="Index" value="' . $row['remIndex'] . '"></td>';
                  print "</tr>";
                }

                print "</tbody>";
                print "</table>";
                ?>
              <button type="submit" class="btn btn-primary" value="Remove Athlete"><span class="glyphicon glyphicon-trash"></span>&nbsp&nbsp Remove Athlete(s)</button>
              <br><br>
            </form>
          </div>
        </div>
        <!--end of third tab -->
        <div class="tab-pane" id="assignWorkout">
          <div class="row">
            <div class="col-md-12">
              <!-- Large modal -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".assign-workout-modal-lg">Assign Workout Demo</button>
              <div class="modal fade assign-workout-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel"><font color="#2196f3">Assign Workout Tab</font></h4>
                      <hr class="colored">
                    </div>
                    <div class="modal-body">
                      <img class="center-block img-responsive" src="../img/FitMe-CreateAthleteTab.jpg" width="800" height="1000">
                      <ul class="modalList1">
                        <h6>
                          <li>Once you have clicked on the Athletes Page, you will see the four different tabs.</li>
                          <li>The Create Athlete Tab will require the Administrator to put in the following information for the Athlete:</li>
                          <ul class="modalList2">
                            <li>Username (Can include upper and lower case letters, numbers, and special characters)</li>
                            <li>Password (Can include upper and lower case letters, numbers, and special characters)</li>
                            <li>Email Address</li>
                            <li>First Name</li>
                            <li>Last Name</li>
                            <li>Select Sport (Select the sport that the athlete plays from the dropdown list)</li>
                            <li>Height (Height must be entered in inches)</li>
                            <li>Weight (Weight must be entered in pounds)</li>
                          </ul>
                          <li>After filling out all of the text fields, click the <b>Add Athlete</b> button and a message will be displayed saying that your Athlete has been successfully created.</li>
                          <li>If for some reason you forget to enter information into a text field or put in the incorrect information, the text field will have a red glow around it along with an error indicating that something is wrong.</li>
                        </h6>
                      </ul>
                    </div>
                    <!--.modal-body-->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
              <br>
              <br>
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title">Assign Workout</h3>
                </div>
                <div class="panel-body">
                  <script type="text/javascript">
                    var checkflag = "false";
                    function check(field)
                    {
                        if (checkflag == "false")
                        {
                            for (i = 0; i <= field.length; i++)
                            {
                                field[i].checked = true;
                            }
                            checkflag = "true";
                            return "Uncheck All";
                        }
                        else
                        {
                            for (i = 0; i <= field.length; i++)
                            {
                                field[i].checked = false;
                            }
                        checkflag = "false";
                        return "Check All";
                        }
                    }
                  </script>
                  <form action="../lib/assignWorkout.php" id="assignWorkoutForm" name="assignWorkoutForm" method="POST">
                    <div class="row">
                      <?php
                        include("../lib/connect.php");
                        $curUser = $_SESSION["myUsername"];

                        #Build dropdown of sports
                        echo '<div class="col-md-6">';
                        echo '<label for="sport">Select Sport:</label>';
                        echo '<select class="form-control" required name="sport" id="sport" onchange="showAvailableAthletes(this.value)">';
                        echo '<option value="" selected disabled>Select A Sport To Assign Workouts</option>';

                        $sql = "select Distinct sport from users where coachID='$curUser'";
                            $result = mysqli_query($connection, $sql);
                            while ($row = mysqli_fetch_array($result)) {
                            echo '<option value="'.$row["sport"].'">' . $row['sport'] . '</option>';
                            }
                        echo '</select>';
                        echo '<br>';


                        print "<center><div id=\"showTable\"></div></center>";

                        ?>
                      <button type="submit" class="btn btn-primary" value="Assign Workout"><span class="glyphicon glyphicon-share-alt"></span>&nbsp&nbsp Assign Workout</button>
                      <input type="button" class="btn btn-primary" style="float:right;" value="Check All" onClick="this.value=check(this.form.Athlete)">
                      <!--<button type="button" class="btn btn-primary" style="float:right;" value="Check All" onClick="this.value=check(this.form.Athlete)"><span class="glyphicon glyphicon-check"></span>Check</button>-->
                  </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php
      require_once("../templates/printFooter.php");
      printFooter();
      ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
    <script src="http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script src="http://cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    <script src="http://cdn.datatables.net/tabletools/2.2.4/js/dataTables.tableTools.min.js"></script>
    <script src="../js/athleteFunctions.js"></script>
  </body>
</html>
