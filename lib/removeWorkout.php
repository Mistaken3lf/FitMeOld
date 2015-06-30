<?php

include 'connect.php';

session_start();

#Session variable to see if they are submitting the form.
$_SESSION['removeWorkoutAttempt'] = true;

#If there were currently any errors reset them.
if (isset($_SESSION['removeWorkoutErrors'])) {
  unset($_SESSION['removeWorkoutErrors']);
}

#Create an array of errors.
$_SESSION['removeWorkoutErrors'] = array();

if (empty($_POST['workoutToRemove'])) {
  $_SESSION['removeWorkoutErrors'][] = 'You must select a workout is required';

  if ($_SESSION['myPermission'] == 'Trainer') {
    header('location: ../trainer/createWorkoutTrainers.php');
  }
}

#If there were any errors go back to the workout page.
if (count($_SESSION['removeWorkoutErrors']) > 0) {
  if ($_SESSION['myPermission'] == 'Trainer') {
    header('location: ../trainer/createWorkoutTrainers.php');
  }
} else {
  #NO ERRORS!!!
  unset($_SESSION['removeWorkoutErrors']);

  #Get the name of the workout table to drop.
  $tableToDrop = $_POST['workoutToRemove'];

  #Build query to remove table and from the table of workouts.
  $removeWorkout             = 'drop table `' . $tableToDrop . '`';
  $deleteFromCurrentWorkouts = "delete from CurrentWorkouts where workoutName='$tableToDrop'";

  #Run the queries.
  $result1 = mysqli_query($connection, $removeWorkout);
  $result2 = mysqli_query($connection, $deleteFromCurrentWorkouts);

  #Make sure they can both go through.
  if (($result1 == true) and ($result2 == true)) {
    if ($_SESSION['myPermission'] == 'Trainer') {
      echo "<script>
            alert('Workout Removed');
            window.location.href='../trainer/createWorkoutTrainers.php';
            </script>";
    }
  } else {
    if ($_SESSION['myPermission'] == 'Trainer') {
      echo "<script>
                alert('Workout Does Not Exist');
                window.location.href='../trainer/createWorkoutTrainers.php';
                </script>";
    }
  }
}
