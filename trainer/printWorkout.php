<?php
  session_start();

  if (($_SESSION['loggedIn'] == false) || ($_SESSION["myPermission"] != "Trainer")) {
      header('location: ../index.php');
  }
  ?>

<!DOCTYPE html>
<html>
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
    <?php
      include("../lib/connect.php");

      session_start();

      $workout = $_POST["workouts"];
      $_SESSION["workoutNameForDeletion"] = $workout;
      $tempWorkout = $workout;
      $tempWorkout = strstr($tempWorkout, '-', true);

      #Get the current user.
      $curUser = $_SESSION["myUsername"];

      #Select from the assessment table.
      $sql = "select * from `" . $workout . "`";

      #Sport is the only thing selected.
      if (isset($_POST["workouts"]) and !isset($_POST["myAthlete"]) and !isset($_POST["mySport"])) {
        $sql .= " where whosWorkout='$curUser' order by date";
        $whatToPrint = $tempWorkout;

      }

      else if(isset($_POST["workouts"]) and isset($_POST["myAthlete"]) and !isset($_POST["mySport"])) {
        $athlete = $_POST["myAthlete"];
        $sql .= " where athlete='$athlete' and whosWorkout='$curUser'order by date";
        $whatToPrint = $tempWorkout;
      }

      else if(isset($_POST["workouts"]) and !isset($_POST["myAthlete"]) and isset($_POST["mySport"])) {
        $mySport = $_POST["mySport"];
        $sql .= " where sport='$mySport' and whosWorkout='$curUser' order by date";
        $whatToPrint = $tempWorkout;
      }

      else if(isset($_POST["workouts"]) and isset($_POST["myAthlete"]) and isset($_POST["mySport"])) {
        $athlete = $_POST["myAthlete"];
        $mySport = $_POST["mySport"];
        $sql .= " where athlete='$athlete' and sport='$mySport' and whosWorkout='$curUser' order by date";
        $whatToPrint = $tempWorkout;
      }


      #Else nothing was selected so clear out the query.
      else {
        $sql = "";
      }

      $result = mysqli_query($connection, $sql);

      #Print table heading.
      print "<h1> $whatToPrint </h1>";

      #Print the assessment table.
      print " <div class='table-responsive'>
                      <table class='table table-striped table-bordered'>
                      <thead>
                      <tr>
                      <th>Date</th>
                      <th>Name</th>
                      <th>Sport</th>
                      <th>Order</th>
                      <th>Exercise Name</th>
                      		  <th>Remove</th>
                      </tr>
                      </thead>";
      print "<tbody>";

      while ($row = mysqli_fetch_array($result)) {
        $tempExercise = strstr($row["exerciseName"], '-', true);
        print "<tr>";
        print "<td>" . $row['date'] . "</td>";
        print "<td>" . $row['athlete'] . "</td>";
        print "<td>" . $row['sport'] . "</td>";
        print "<td>" . $row['exerciseOrder'] . "</td>";
        print "<td>" . $tempExercise . "</td>";

        print '<td align=center><input type="checkbox" name="Index[]" id="Index" value="' . $row['id'] . '"/></td>';
        print "</tr>";
      }

      print "</tbody>";
      print "</table>";
      ?>
  </body>
</html>
