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
          <li class="active"><a href="#currentUsers" data-toggle="tab">Manage Athletes</a></li>
          <li><a href="#assignWorkout" data-toggle="tab">Assign Workout</a></li>
        </ul>
        <br>
        <div class="tab-content">
          <!--End of second tab-->
          <div class="tab-pane active" id="currentUsers">
            <!-- Modal buttons -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".current-users-modal-lg">Manage Athletes Demo</button>
            <!--Demo modal-->
            <div class="modal fade current-users-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><font color="#2196f3">Manage Athletes Tab</font></h4>
                    <hr class="colored">
                  </div>
                  <div class="modal-body">
                    <img class="center-block img-responsive" src="../img/FitMe-CreateAthleteTab.jpg" width="800" height="1000">
                    <ul class="modalList1">
                      <h6>
                        <li>The Manage Athletes Tab will show the Current Athletes for the Administrator that is currently signed in.</li>
                        <li>This tab will give a Trainer the following information for each Athlete:</li>
                        <ul class="modalList2">
                          <li>Username</li>
                          <li>First Name</li>
                          <li>Last Name</li>
                          <li>Email Address</li>
                          <li>Height</li>
                          <li>Weight</li>
                          <li>Sport</li>
                        </ul>
                        <li>Trainers will also be able to click on the Athlete’s Username to view their current workout(s) and profile.</li>
                        <li>Trainers can also delete any Athlete that they choose.</li>
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
            <!--End of demo modal-->
            <!--Start of create athlete modal-->
            <div class="modal add-users-modal-lg" tabindex="-1" role="dialog" aria-labelledby="addAthleteModal" aria-hidden="true">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                  <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="addAthleteModal"><font color="#2196f3">Create Athlete/User</font></h4>
                    <hr class="colored">
                  </div>
                  <div class="modal-body">
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
                      <button type="submit" class="btn btn-success" value="Create Athlete"><span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp Create Athlete</button>
                    </form>
                  </div>
                  <!--.modal-body-->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            <!--End of create athlete modal-->
            <!--PHP script to print out the current athletes-->
            <h3>Manage Athletes</h3>
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
              <button type="button" class="btn btn-success" data-toggle="modal" data-target=".add-users-modal-lg"><span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp Add Athlete</button>
              <button type="submit" class="btn btn-danger" value="Remove Athlete"><span class="glyphicon glyphicon-trash"></span>&nbsp&nbsp Remove Athlete(s)</button>
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
                      <h5> Screen Shot #1</h5>
                      <ul class="modalList1">
                        <h6>
                        <li>The Assign Workout Tab makes it easy for Trainers to assign workouts to their Athletes.</li>
                        <li>First, choose a Sport from the dropdown list which is shown in Screen Shot #1.</li>
                        <li>The list of Sports will only consist of the Sports that the Trainer currently has athletes for.</li>
                      </ul>
                      <h5> Screen Shot #2</h5>
                      <ul class="modalList1">
                        <h6>
                          <li>After choosing a Sport, a table will automatically appear below the dropdowns displaying all of the athletes for the Sport you chose.  This is shown in Screen Shot #2.</li>
                          <li>Next, the Trainer can choose a workout that they have previously created along with a day that they want to assign the workout too.</li>
                          <li>In the table, there is a column titled Select that has little checkboxes, one for each athlete.  The Trainer has the ability to checkbox each athlete individually or if the workout applies to the whole team, they can click the <b>CHECK ALL</b> button at the bottom of the column and all of the athletes will be checked.</li>
                          <li>After filling out all required information from the steps above, click the <b>ASSIGN WORKOUT</b> button and a message will be displayed saying that your Workout has been successfully assigned.</li>
                          <li>The Trainer can then go back to the Manage Athletes Tab, click on the Athlete’s Username, and view the current workout(s) for that Athlete.</li>
                          <ul class="modalList2">
                            <li>** NOTE: AFTER CLICKING ON THE ATHLETE’S USERNAME, YOU SHOULD BE ABLE TO SEE TABLES CONSISTING OF THE WORKOUT NAME, THE EXERCISES, SETS, REPS, WEIGHT, PERCENTAGE, REST, AND TEMPO THAT YOU HAVE ASSIGNED THAT PARTICULAR ATHLETE FOR DAYS 1 - 7.  IF FOR SOME REASON YOU ONLY SEE THE WORKOUT NAME LISTED FOR THAT DAY, THIS MEANS THAT YOU ASSIGNED THIS ATHLETE A WORKOUT THAT DOES NOT HAVE ANY EXERCISES ASSOCIATED WITH THEIR NAME.  YOU WILL HAVE TO GO BACK TO THE MANAGE WORKOUT(S) TAB, CHOOSE A WORKOUT, CHOOSE A SPORT (OPTIONAL), AND CLICK THE  SHOW WORKOUT  BUTTON.  THIS WILL SHOW YOU ALL OF THE EXERCISES FOR THAT WORKOUT ALONG WITH THE DETAILED INFORMATION FOR EACH EXERCISE ON EACH ATHLETE.  IF YOU DO NOT SEE AN EXERCISE FOR THAT ATHLETE, GO TO THE ADD EXERCISES TAB AND CREATE ONE. **</li>
                          </ul>
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
                      <button type="submit" class="btn btn-success" value="Assign Workout"><span class="glyphicon glyphicon-share-alt"></span>&nbsp&nbsp Assign Workout</button>
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
