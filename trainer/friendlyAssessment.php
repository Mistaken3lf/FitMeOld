<?php
  session_start();

  if ($_SESSION["loggedIn"] == false) {
    header("location: ../index.php");
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
    <link rel="stylesheet" href="../css/stylesheet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css">
  </head>
  <body>
    <div class="container-fluid">
      <img class="center-block img-responsive" src="../img/headers/fitMeAssessmentManagement2.png" width="550" height="350">
      <hr>
      <?php
        include("../lib/connect.php");
        session_start();

        #Get the current user.
        $curUser = $_SESSION["myUsername"];

        #Select from the assessment table.
        $sql = "select * from assessmentRecord where whosAssessment = '$curUser'";

        $result = mysqli_query($connection, $sql);

        #Print table heading.
        print "<h1> My Assessments </h1>";

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
    </div>
    <?php
      if ($_SESSION["myPermission"] == "Trainer") {
        print "<a href='trainersAssessment.php'>Go Back</a>";
      }
      ?>
    <br>
    <A HREF="javascript:window.print()">Print Assessment</A>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  </body>
</html>
