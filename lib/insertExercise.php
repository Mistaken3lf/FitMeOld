<?php

include '../lib/connect.php';

session_start();

$excName = '';
$category = '';
$plane = '';
$movement = '';
$style = '';

#Session variable to see if they are submitting the form.
$_SESSION['exerciseAttempt'] = true;

#If there were currently any errors reset them.
if (isset($_SESSION['exerciseErrors'])) {
    unset($_SESSION['exerciseErrors']);
}

#Create an array of errors.
$_SESSION['exerciseErrors'] = array();

#Check that the exercise name is not empty.
if (empty($_POST['exerciseName'])) {
    #Add the error to the array and go back to the exercise page.
  $_SESSION['exerciseErrors'][] = 'Exercise name is required';

    if ($_SESSION['myPermission'] == 'Trainer') {
        header('location: ../trainer/createExerciseTrainers.php');
    }
}

#exercise name is not empty.
else {
    #Send the username to test the input and strip characters from it.
  $excName = test_input($_POST['exerciseName']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z ]*$/', $excName)) {
      #The exercise name contains something other than letters so create
    #an error and send the user back to the create exercise page.
    $_SESSION['exerciseErrors'][] = 'Only letters allowed in exercise name';

    if ($_SESSION['myPermission'] == 'Trainer') {
        header('location: ../trainer/createExerciseTrainers.php');
    }
  }
}

#############################Validate Category##################################

#Check that a category was selected.
if (empty($_POST['workoutCategory'])) {
    #Add the error to the array and go back to the exercise page.
  $_SESSION['exerciseErrors'][] = 'Category is required';

  if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createExerciseTrainers.php');
  }
}

#Category was selected.
else {
    #Make the category safe to insert.
  $category = test_input($_POST['workoutCategory']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z ]*$/', $category)) {

    #Invalid category.
    $_SESSION['exerciseErrors'][] = 'Only letters allowed in the category.';

    if ($_SESSION['myPermission'] == 'Trainer') {
        header('location: ../trainer/createExerciseTrainers.php');
    }
  }
}

#############################Validate Plane##################################

#Check that a plane was selected.
if (empty($_POST['workoutPlane'])) {
    #Add the error to the array and go back to the exercise page.
  $_SESSION['exerciseErrors'][] = 'Plane is required';

  if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createExerciseTrainers.php');
  }
}

#Plane was selected.
else {
    #Make the plane safe to insert.
  $plane = test_input($_POST['workoutPlane']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z- ]*$/', $plane)) {

    #Invalid plane.
    $_SESSION['exerciseErrors'][] = 'Only letters allowed in the plane.';

    if ($_SESSION['myPermission'] == 'Trainer') {
        header('location: ../trainer/createExerciseTrainers.php');
    }
  }
}

#############################Validate Movement##################################

#Check that a movement was selected.
if (empty($_POST['workoutMovement'])) {
}

#Movement was selected.
else {
    #Make the movement safe to insert.
  $movement = test_input($_POST['workoutMovement']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z ]*$/', $movement)) {

    #Invalid movement.
    $_SESSION['exerciseErrors'][] = 'Only letters allowed in the movement.';

    if ($_SESSION['myPermission'] == 'Trainer') {
        header('location: ../trainer/createExerciseTrainers.php');
    }
  }
}

#############################Validate Style##################################

#Check that a style was selected.
if (empty($_POST['workoutStyle'])) {
}

#Style was selected.
else {
    #Make the style safe to insert.
  $style = test_input($_POST['workoutStyle']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z ]*$/', $style)) {

    #Invalid style.
    $_SESSION['exerciseErrors'][] = 'Only letters allowed in the style.';

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
if (count($_SESSION['exerciseErrors']) > 0) {
  if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createExerciseTrainers.php');
  }
} else {
    unset($_SESSION['exerciseErrors']);

  #Get all workout information from the form.
  $exerciseName = mysqli_real_escape_string($connection, $excName);
    $workoutCategory = mysqli_real_escape_string($connection, $category);
    $workoutPlane = mysqli_real_escape_string($connection, $plane);
    $workoutMovement = mysqli_real_escape_string($connection, $movement);
    $workoutStyle = mysqli_real_escape_string($connection, $style);
    $myExercises = $_SESSION['myUsername'];

    $exerciseName .= '-'.$myExercises;

  #Build the insert exercise query.
  $query = "INSERT INTO EXERCISES (exercise_name, category, plane, movement, style, whosExercise) VALUES('$exerciseName', '$workoutCategory', '$workoutPlane', '$workoutMovement', '$workoutStyle', '$myExercises')";

  #Insert the exercise if possible and redirect the user.
  if (mysqli_query($connection, $query)) {
      if ($_SESSION['myPermission'] == 'Trainer') {
          echo "<script>
            alert('Exercise Created');
            window.location.href='../trainer/createExerciseTrainers.php';
            </script>";
      }
  } else {
      if ($_SESSION['myPermission'] == 'Trainer') {
          echo "<script>
                alert('Exercise Already Added');
                window.location.href='../trainer/createExerciseTrainers.php';
                </script>";
      }
  }
}
