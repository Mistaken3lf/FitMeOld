<?php

include '../lib/connect.php';

session_start();

$macro = '';
$sport = '';

#Session variable to see if they are submitting the form.
$_SESSION['workoutAttempt'] = true;

#If there were currently any errors reset them.
if (isset($_SESSION['workoutErrors'])) {
    unset($_SESSION['workoutErrors']);
}

#Create an array of errors.
$_SESSION['workoutErrors'] = array();

####################Validate Macro####################################

#Check that the macro name is not empty.
if (empty($_POST['macro'])) {
    #Add the error to the array and go back to the workout page.
  $_SESSION['workoutErrors'][] = 'Workout name is required';

    if ($_SESSION['myPermission'] == 'Trainer') {
        header('location: ../trainer/createWorkoutTrainers.php');
    }
}

#Macro name is entered.
else {
    #Send the macro name to test the input and strip characters from it.
  $macro = test_input($_POST['macro']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9- ]*$/', $macro)) {
      #Invalid macro name.
    $_SESSION['workoutErrors'][] = 'Only letters allowed in macro';

    if ($_SESSION['myPermission'] == 'Trainer') {
        header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

#######################PREVENT HACKERS!!!!###########################################

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

#If there were any errors go back to the workout page.
if (count($_SESSION['workoutErrors']) > 0) {
  if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
  }
} else {
    #Unset the errors since there are none.
  unset($_SESSION['workoutErrors']);

    $macroName = mysqli_real_escape_string($connection, $macro);
    $whosWorkout = mysqli_real_escape_string($connection, $_SESSION['myUsername']);
    $macroName .= '-'.$whosWorkout;

  #Build query to insert the workkout into the currrent workouts table.
  $sql = "insert into CurrentWorkouts(workoutName, whosWorkout) values('$macroName', '$whosWorkout')";

  #Create a table for the newly created macro name.
  $sql2 = 'create table if not exists `'.$macroName.'` (id int not null auto_increment, macroName varchar(100) not null, exerciseOrder varchar(2) not null, exerciseName varchar(100) not null, setsW1 int(50) unsigned, setsW2 int(50) unsigned, setsW3 int(50) unsigned, setsW4 int(50) unsigned, reps1W1 int(50) unsigned, reps2W1 int(50) unsigned, reps3W1 int(50) unsigned, reps4W1 int(50) unsigned, reps5W1 int(50) unsigned, reps6W1 int(50) unsigned, reps7W1 int(50) unsigned, reps8W1 int(50) unsigned, reps9W1 int(50) unsigned, reps10W1 int(50) unsigned, reps1W2 int(50) unsigned, reps2W2 int(50) unsigned, reps3W2 int(50) unsigned, reps4W2 int(50) unsigned, reps5W2 int(50) unsigned, reps6W2 int(50) unsigned, reps7W2 int(50) unsigned, reps8W2 int(50) unsigned, reps9W2 int(50) unsigned, reps10W2 int(50) unsigned, reps1W3 int(50) unsigned, reps2W3 int(50) unsigned, reps3W3 int(50) unsigned, reps4W3 int(50) unsigned, reps5W3 int(50) unsigned, reps6W3 int(50) unsigned, reps7W3 int(50) unsigned, reps8W3 int(50) unsigned, reps9W3 int(50) unsigned, reps10W3 int(50) unsigned, reps1W4 int(50) unsigned, reps2W4 int(50) unsigned, reps3W4 int(50) unsigned, reps4W4 int(50) unsigned, reps5W4 int(50) unsigned, reps6W4 int(50) unsigned, reps7W4 int(50) unsigned, reps8W4 int(50) unsigned, reps9W4 int(50) unsigned, reps10W4 int(50) unsigned, intensity1W1 int(50) unsigned, intensity2W1 int(50) unsigned, intensity3W1 int(50) unsigned, intensity4W1 int(50) unsigned, intensity5W1 int(50) unsigned, intensity6W1 int(50) unsigned, intensity7W1 int(50) unsigned, intensity8W1 int(50) unsigned, intensity9W1 int(50) unsigned, intensity10W1 int(50) unsigned, intensity1W2 int(50) unsigned, intensity2W2 int(50) unsigned, intensity3W2 int(50) unsigned, intensity4W2 int(50) unsigned, intensity5W2 int(50) unsigned, intensity6W2 int(50) unsigned, intensity7W2 int(50) unsigned, intensity8W2 int(50) unsigned, intensity9W2 int(50) unsigned, intensity10W2 int(50) unsigned, intensity1W3 int(50) unsigned, intensity2W3 int(50) unsigned, intensity3W3 int(50) unsigned, intensity4W3 int(50) unsigned, intensity5W3 int(50) unsigned, intensity6W3 int(50) unsigned, intensity7W3 int(50) unsigned, intensity8W3 int(50) unsigned, intensity9W3 int(50) unsigned, intensity10W3 int(50) unsigned, intensity1W4 int(50) unsigned, intensity2W4 int(50) unsigned, intensity3W4 int(50) unsigned, intensity4W4 int(50) unsigned, intensity5W4 int(50) unsigned, intensity6W4 int(50) unsigned, intensity7W4 int(50) unsigned, intensity8W4 int(50) unsigned, intensity9W4 int(50) unsigned, intensity10W4 int(50) unsigned, percentage1W1 int(50) unsigned, percentage2W1 int(50) unsigned, percentage3W1 int(50) unsigned, percentage4W1 int(50) unsigned, percentage5W1 int(50) unsigned, percentage6W1 int(50) unsigned, percentage7W1 int(50) unsigned, percentage8W1 int(50) unsigned, percentage9W1 int(50) unsigned, percentage10W1 int(50) unsigned, percentage1W2 int(50) unsigned, percentage2W2 int(50) unsigned, percentage3W2 int(50) unsigned, percentage4W2 int(50) unsigned, percentage5W2 int(50) unsigned, percentage6W2 int(50) unsigned, percentage7W2 int(50) unsigned, percentage8W2 int(50) unsigned, percentage9W2 int(50) unsigned, percentage10W2 int(50) unsigned, percentage1W3 int(50) unsigned, percentage2W3 int(50) unsigned, percentage3W3 int(50) unsigned, percentage4W3 int(50) unsigned, percentage5W3 int(50) unsigned, percentage6W3 int(50) unsigned, percentage7W3 int(50) unsigned, percentage8W3 int(50) unsigned, percentage9W3 int(50) unsigned, percentage10W3 int(50) unsigned, percentage1W4 int(50) unsigned, percentage2W4 int(50) unsigned, percentage3W4 int(50) unsigned, percentage4W4 int(50) unsigned, percentage5W4 int(50) unsigned, percentage6W4 int(50) unsigned, percentage7W4 int(50) unsigned, percentage8W4 int(50) unsigned, percentage9W4 int(50) unsigned, percentage10W4 int(50) unsigned, assessment1W1 varchar(100) not null, assessment2W1 varchar(100) not null, assessment3W1 varchar(100) not null, assessment4W1 varchar(100) not null, assessment5W1 varchar(100) not null, assessment6W1 varchar(100) not null, assessment7W1 varchar(100) not null, assessment8W1 varchar(100) not null, assessment9W1 varchar(100) not null, assessment10W1 varchar(100) not null, assessment1W2 varchar(100) not null, assessment2W2 varchar(100) not null, assessment3W2 varchar(100) not null, assessment4W2 varchar(100) not null, assessment5W2 varchar(100) not null, assessment6W2 varchar(100) not null, assessment7W2 varchar(100) not null, assessment8W2 varchar(100) not null, assessment9W2 varchar(100) not null, assessment10W2 varchar(100) not null, assessment1W3 varchar(100) not null, assessment2W3 varchar(100) not null, assessment3W3 varchar(100) not null, assessment4W3 varchar(100) not null, assessment5W3 varchar(100) not null, assessment6W3 varchar(100) not null, assessment7W3 varchar(100) not null, assessment8W3 varchar(100) not null, assessment9W3 varchar(100) not null, assessment10W3 varchar(100) not null, assessment1W4 varchar(100) not null, assessment2W4 varchar(100) not null, assessment3W4 varchar(100) not null, assessment4W4 varchar(100) not null, assessment5W4 varchar(100) not null, assessment6W4 varchar(100) not null, assessment7W4 varchar(100) not null, assessment8W4 varchar(100) not null, assessment9W4 varchar(100) not null, assessment10W4 varchar(100) not null, restW1 int(50) unsigned, restW2 int(50) unsigned, restW3 int(50) unsigned, restW4 int(50) unsigned, tempoW1 varchar(100), tempoW2 varchar(100), tempoW3 varchar(100), tempoW4 varchar(100), calcWeight1W1 int(50) unsigned, calcWeight2W1 int(50) unsigned, calcWeight3W1 int(50) unsigned, calcWeight4W1 int(50) unsigned, calcWeight5W1 int(50) unsigned, calcWeight6W1 int(50) unsigned, calcWeight7W1 int(50) unsigned, calcWeight8W1 int(50) unsigned, calcWeight9W1 int(50) unsigned, calcWeight10W1 int(50) unsigned, calcWeight1W2 int(50) unsigned, calcWeight2W2 int(50) unsigned, calcWeight3W2 int(50) unsigned, calcWeight4W2 int(50) unsigned, calcWeight5W2 int(50) unsigned, calcWeight6W2 int(50) unsigned, calcWeight7W2 int(50) unsigned, calcWeight8W2 int(50) unsigned, calcWeight9W2 int(50) unsigned, calcWeight10W2 int(50) unsigned, calcWeight1W3 int(50) unsigned, calcWeight2W3 int(50) unsigned, calcWeight3W3 int(50) unsigned, calcWeight4W3 int(50) unsigned, calcWeight5W3 int(50) unsigned, calcWeight6W3 int(50) unsigned, calcWeight7W3 int(50) unsigned, calcWeight8W3 int(50) unsigned, calcWeight9W3 int(50) unsigned, calcWeight10W3 int(50) unsigned, calcWeight1W4 int(50) unsigned, calcWeight2W4 int(50) unsigned, calcWeight3W4 int(50) unsigned, calcWeight4W4 int(50) unsigned, calcWeight5W4 int(50) unsigned, calcWeight6W4 int(50) unsigned, calcWeight7W4 int(50) unsigned, calcWeight8W4 int(50) unsigned, calcWeight9W4 int(50) unsigned, calcWeight10W4 int(50) unsigned, whosWorkout varchar(50) not null, PRIMARY KEY(id, exerciseOrder))';

  #Actually insert the workokut and create the table.
  if (mysqli_query($connection, $sql) and mysqli_query($connection, $sql2)) {
      if ($_SESSION['myPermission'] == 'Trainer') {
          echo "<script>
            alert('Workout Created');
            window.location.href='../trainer/createWorkoutTrainers.php';
            </script>";
      }
  } else {
      if ($_SESSION['myPermission'] == 'Trainer') {
          echo "<script>
            alert('Workout Already Exists');
            window.location.href='../trainer/createWorkoutTrainers.php';
            </script>";
      }
  }
}
