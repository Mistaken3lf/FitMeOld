<?php

include '../lib/connect.php';

session_start();

$deleteExercise = '';

#Session variable to see if they are submitting the form.
$_SESSION['exerciseDeleteAttempt'] = true;

#If there were currently any errors reset them.
if (isset($_SESSION['exerciseDeleteErrors'])) {
    unset($_SESSION['exerciseDeleteErrors']);
}

#Create an array of errors.
$_SESSION['exerciseDeleteErrors'] = array();

####################Validate Exercise####################################

#Check that the exercise name is not empty.
if (empty($_POST['removeExerciseName'])) {
    #Add the error to the array and go back to the exercise page.
  $_SESSION['exerciseDeleteErrors'][] = 'Exercise name is required';

    if ($_SESSION['myPermission'] == 'Trainer') {
        header('location: ../trainer/createExerciseTrainers.php');
    }
}

#exercise name is not empty.
else {
    #Send the username to test the input and strip characters from it.
  $deleteExercise = test_input($_POST['removeExerciseName']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z- ]*$/', $deleteExercise)) {
      #The exercise name contains something other than letters so create
    #an error and send the user back to the create exercise page.
    $_SESSION['exerciseDeleteErrors'][] = 'Only letters allowed in exercise name';

    if ($_SESSION['myPermission'] == 'Trainer') {
        header('location: ../trainer/createExerciseTrainers.php');
    }
  }
}

#PREVENT SQL Injection and XSS!!!!!!!!!
function test_input($input)
{
    #trip white space
  $input = trim($input);

  #Remove all forward and backward slashes.
  $input = stripslashes($input);

  #Turn html code into safe letters.
  $input = htmlspecialchars($input);

    return $input;
}

#If there were any errors go back to the exercise page.
if (count($_SESSION['exerciseDeleteErrors']) > 0) {
  if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createExerciseTrainers.php');
  }
} else {
    unset($_SESSION['exerciseDeleteErrors']);

  #Get the name of the exercise to remove from the form.
  $usernameToDelete = mysqli_real_escape_string($connection, $deleteExercise);

  #Build the delete exercise query and limit it to one.
  $sql = "delete from EXERCISES where exercise_name='$usernameToDelete' LIMIT 1";

  #Make sure we can delete the exercise.
  if (mysqli_query($connection, $sql)) {
      if ($_SESSION['myPermission'] == 'Trainer') {
          echo "<script>
            alert('Exercise Removed');
            window.location.href='../trainer/createExerciseTrainers.php';
            </script>";
      }
  }

  #Delete FAILED!!!
  else {
      if ($_SESSION['myPermission'] == 'Trainer') {
          echo "<script>
            alert('Exercise Does Not Exist');
            window.location.href='../trainer/createExerciseTrainers.php';
            </script>";
      }
  }
}
