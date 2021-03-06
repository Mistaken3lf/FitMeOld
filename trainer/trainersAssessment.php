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
      <div class="container-fluid">
        <img class="center-block img-responsive" src="../img/headers/fitMeAssessmentManagement2.png" width="550" height="350">
        <hr class="colored">
        <div class="row">
          <div class="col-md-12">
            <form role="form" method="POST" id="removeAssessmentForm" name="removeAssessmentForm" action="../lib/deleteAssessment.php">
              <?php
                include("../lib/connect.php");
                session_start();

                #Get the current user.
                $curUser = $_SESSION["myUsername"];

                #Select from the assessment table.
                $sql = "select * from assessmentRecord where whosAssessment = '$curUser'";

                $result = mysqli_query($connection, $sql);

                #Print table heading.
                print "<h3> Manage Assessments </h3>";

                #Print the assessment table.
                print " <div class='table-responsive'>
                                <table class='table table-striped table-bordered' id='currentAssessmentsTable'>
                                <thead>
                                <tr>
                                <th>Date</th>
                                <th>Sport</th>
                                <th>Athlete Name</th>
                                <th>Exercise</th>
                                <th>Assessment Type</th>
                                <th>Score</th>
                                <th>Remove</th>
                                </tr>
                                </thead>";
                print "<tbody>";

                while ($row = mysqli_fetch_array($result)) {
                  $temp = strstr($row["exercise"], '-', true);
                  print "<tr>";
                  print "<td>" . $row['date'] . "</td>";
                  print "<td>" . $row['sport'] . "</td>";
                  print "<td>" . $row['Fname'] . "</td>";
                  print "<td>" . $temp . "</td>";
                  print "<td>" . $row['assessmentType'] . "</td>";
                  print "<td>" . $row['Score'] . "</td>";
                  echo '<td><input type="checkbox" name="Index[]" id="Index" value="' . $row['AssessmentIndex'] . '"></td>';
                  print "</tr>";
                }

                print "</tbody>";
                print "</table>";
                ?>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target=".current-assessments-modal-lg"><span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp Create Assessment</button>
              <button type="submit" class="btn btn-danger" value="Remove Assessment(s)" id="deleteAssessment"><span class="glyphicon glyphicon-trash"></span>&nbsp&nbsp Remove Assessment</button>
              <br><br>
            </form>
          </div>
        </div>
      </div>
      <div class="modal fade current-assessments-modal-lg" tabindex="-1" role="dialog" aria-labelledby="createAssessment" aria-hidden="true">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="createAssessment"><font color="#2196f3">Create Assessment</font></h4>
              <hr class="colored">
            </div>
            <div class="modal-body">
              <form role="form" method="POST" id="createAssessmentForm" name="createAssessmentForm" action="../lib/createAssessment.php">
                <!--Print out all errors from the login form if there are any.-->
                <div class="errorDiv">
                  <?php
                    if (isset($_SESSION["createAssessmentErrors"]) && isset($_SESSION["createAssessmentAttempt"])) {
                      unset($_SESSION["createAssessmentAttempt"]);
                      print "Errors occured <br>\n";

                      foreach ($_SESSION["createAssessmentErrors"] as $error) {
                        print $error . "<br>\n";
                      }
                    }
                    ?>
                </div>
                <div class="form-group">
                  <label for="date">Date:</label>
                  <input type="date" required class="form-control" id="date" name="date" placeholder="Date">
                </div>
                <div class="form-group">
                  <label for="exercise">Select Exercise:</label>
                  <select class="form-control" required name="exercise" id="exercise">
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
                  <label for="assessmentType">Select Assessment Type:</label>
                  <select class="form-control" required name="assessmentType" id="assessmentType">
                    <option value="Please Select An Assessment" selected disabled>Please Select An Assessment
                    </option>
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
                <div class="form-group">
                  <?php
                    include("../lib/connect.php");
                    $curUser = $_SESSION["myUsername"];

                    echo '<label for="sport">Select Sport:</label>';
                    echo '<select class="form-control" required name="sport" id="sport" onchange="showAvailableAthletes(this.value)">';
                    echo '<option value="" selected disabled>Please Select A Sport</option>';

                    $sql     = "select distinct sport from users where coachID='$curUser'";
                    $result  = mysqli_query($connection, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                      echo '<option value="' . $row["sport"] . '">' . $row['sport'] . "</option>";
                    }
                    echo '</select>';
                    echo '<br>';

                    print "<center><div id=\"showTable\"></div></center>";
                    ?>
                </div>
                <button type="submit" class="btn btn-success" value="Create Assessment"><span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp Create Assessment</button>
                <input type="button" class="btn btn-primary" style="float:right;" value="Check All" onClick="this.value=check(this.form.Athlete)">
              </form>
            </div>
            <!--.modal-body-->
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </section>
    <br><br>
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
    <script src="../js/assessmentFunctions.js"></script>
  </body>
</html>
