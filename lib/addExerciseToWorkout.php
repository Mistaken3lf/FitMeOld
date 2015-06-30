<?php
include 'connect.php';

session_start();

$comment = "";

#initialize variables for sets
$setsW1 = 0;
$setsW2 = 0;
$setsW3 = 0;
$setsW4 = 0;

#**********************************************
#initialize variables for reps 1-10 in weeks 1-4
$reps1W1  = 0;
$reps2W1  = 0;
$reps3W1  = 0;
$reps4W1  = 0;
$reps5W1  = 0;
$reps6W1  = 0;
$reps7W1  = 0;
$reps8W1  = 0;
$reps9W1  = 0;
$reps10W1 = 0;

$reps1W2  = 0;
$reps2W2  = 0;
$reps3W2  = 0;
$reps4W2  = 0;
$reps5W2  = 0;
$reps6W2  = 0;
$reps7W2  = 0;
$reps8W2  = 0;
$reps9W2  = 0;
$reps10W2 = 0;

$reps1W3  = 0;
$reps2W3  = 0;
$reps3W3  = 0;
$reps4W3  = 0;
$reps5W3  = 0;
$reps6W3  = 0;
$reps7W3  = 0;
$reps8W3  = 0;
$reps9W3  = 0;
$reps10W3 = 0;

$reps1W4  = 0;
$reps2W4  = 0;
$reps3W4  = 0;
$reps4W4  = 0;
$reps5W4  = 0;
$reps6W4  = 0;
$reps7W4  = 0;
$reps8W4  = 0;
$reps9W4  = 0;
$reps10W4 = 0;

#**********************************************
#initialize variables for intensity 1-10 in weeks 1-4
$intensity1W1  = 0;
$intensity2W1  = 0;
$intensity3W1  = 0;
$intensity4W1  = 0;
$intensity5W1  = 0;
$intensity6W1  = 0;
$intensity7W1  = 0;
$intensity8W1  = 0;
$intensity9W1  = 0;
$intensity10W1 = 0;

$intensity1W2  = 0;
$intensity2W2  = 0;
$intensity3W2  = 0;
$intensity4W2  = 0;
$intensity5W2  = 0;
$intensity6W2  = 0;
$intensity7W2  = 0;
$intensity8W2  = 0;
$intensity9W2  = 0;
$intensity10W2 = 0;

$intensity1W3  = 0;
$intensity2W3  = 0;
$intensity3W3  = 0;
$intensity4W3  = 0;
$intensity5W3  = 0;
$intensity6W3  = 0;
$intensity7W3  = 0;
$intensity8W3  = 0;
$intensity9W3  = 0;
$intensity10W3 = 0;

$intensity1W4  = 0;
$intensity2W4  = 0;
$intensity3W4  = 0;
$intensity4W4  = 0;
$intensity5W4  = 0;
$intensity6W4  = 0;
$intensity7W4  = 0;
$intensity8W4  = 0;
$intensity9W4  = 0;
$intensity10W4 = 0;

#**********************************************
#initialize variables for percent 1-10 in weeks 1-4

$percent1W1  = 0;
$percent2W1  = 0;
$percent3W1  = 0;
$percent4W1  = 0;
$percent5W1  = 0;
$percent6W1  = 0;
$percent7W1  = 0;
$percent8W1  = 0;
$percent9W1  = 0;
$percent10W1 = 0;

$percent1W2  = 0;
$percent2W2  = 0;
$percent3W2  = 0;
$percent4W2  = 0;
$percent5W2  = 0;
$percent6W2  = 0;
$percent7W2  = 0;
$percent8W2  = 0;
$percent9W2  = 0;
$percent10W2 = 0;

$percent1W3  = 0;
$percent2W3  = 0;
$percent3W3  = 0;
$percent4W3  = 0;
$percent5W3  = 0;
$percent6W3  = 0;
$percent7W3  = 0;
$percent8W3  = 0;
$percent9W3  = 0;
$percent10W3 = 0;

$percent1W4  = 0;
$percent2W4  = 0;
$percent3W4  = 0;
$percent4W4  = 0;
$percent5W4  = 0;
$percent6W4  = 0;
$percent7W4  = 0;
$percent8W4  = 0;
$percent9W4  = 0;
$percent10W4 = 0;

#**********************************************
#initialize variables for caclulated Weight 1-10 in weeks 1-4
$calcWeight1W1  = 0;
$calcWeight2W1  = 0;
$calcWeight3W1  = 0;
$calcWeight4W1  = 0;
$calcWeight5W1  = 0;
$calcWeight6W1  = 0;
$calcWeight7W1  = 0;
$calcWeight8W1  = 0;
$calcWeight9W1  = 0;
$calcWeight10W1 = 0;

$calcWeight1W2  = 0;
$calcWeight2W2  = 0;
$calcWeight3W2  = 0;
$calcWeight4W2  = 0;
$calcWeight5W2  = 0;
$calcWeight6W2  = 0;
$calcWeight7W2  = 0;
$calcWeight8W2  = 0;
$calcWeight9W2  = 0;
$calcWeight10W2 = 0;

$calcWeight1W3  = 0;
$calcWeight2W3  = 0;
$calcWeight3W3  = 0;
$calcWeight4W3  = 0;
$calcWeight5W3  = 0;
$calcWeight6W3  = 0;
$calcWeight7W3  = 0;
$calcWeight8W3  = 0;
$calcWeight9W3  = 0;
$calcWeight10W3 = 0;

$calcWeight1W4  = 0;
$calcWeight2W4  = 0;
$calcWeight3W4  = 0;
$calcWeight4W4  = 0;
$calcWeight5W4  = 0;
$calcWeight6W4  = 0;
$calcWeight7W4  = 0;
$calcWeight8W4  = 0;
$calcWeight9W4  = 0;
$calcWeight10W4 = 0;

#**********************************************
#initialize variables for assessment 1-10 in weeks 1-4
$assessment1W1  = '';
$assessment2W1  = '';
$assessment3W1  = '';
$assessment4W1  = '';
$assessment5W1  = '';
$assessment6W1  = '';
$assessment7W1  = '';
$assessment8W1  = '';
$assessment9W1  = '';
$assessment10W1 = '';

$assessment1W2  = '';
$assessment2W2  = '';
$assessment3W2  = '';
$assessment4W2  = '';
$assessment5W2  = '';
$assessment6W2  = '';
$assessment7W2  = '';
$assessment8W2  = '';
$assessment9W2  = '';
$assessment10W2 = '';

$assessment1W3  = '';
$assessment2W3  = '';
$assessment3W3  = '';
$assessment4W3  = '';
$assessment5W3  = '';
$assessment6W3  = '';
$assessment7W3  = '';
$assessment8W3  = '';
$assessment9W3  = '';
$assessment10W3 = '';

$assessment1W4  = '';
$assessment2W4  = '';
$assessment3W4  = '';
$assessment4W4  = '';
$assessment5W4  = '';
$assessment6W4  = '';
$assessment7W4  = '';
$assessment8W4  = '';
$assessment9W4  = '';
$assessment10W4 = '';

$restW1 = 0;
$restW2 = 0;
$restW3 = 0;
$restW4 = 0;

$tempoW1 = '';
$tempoW2 = '';
$tempoW3 = '';
$tempoW4 = '';

$workoutName = '';
$order       = '';
$exercises   = '';

#Session variable to see if they are submitting the form.
$_SESSION['addExerciseAttempt'] = true;

#If there were currently any errors reset them.
if (isset($_SESSION['addExerciseErrors'])) {
  unset($_SESSION['addExerciseErrors']);
}

#Create an array of errors.
$_SESSION['addExerciseErrors'] = array();

#Make sure workout name is selected.
if (empty($_POST['comment'])) {
}

#workout name is not empty.
else {
  #Make sure the workout name is safe.
  $comment = test_input($_POST['comment']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9- ]+$/', $comment)) {
    #The user name had something other than characters in it.
    $_SESSION['addExerciseErrors'][] = 'Only letters and numbers in comment';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header("location: ../trainer/createWorkoutTrainers.php");
    }
  }
}

####################Validate Workout Name####################################

#Make sure workout name is selected.
if (empty($_POST['workoutName'])) {
  #Add the error to the array and go back to the workout page.
  $_SESSION['addExerciseErrors'][] = 'Workout Name is required';

  if ($_SESSION['myPermission'] == 'Trainer') {
    header('location: ../trainer/createWorkoutTrainers.php');
  }
}

#workout name is not empty.
else {
  #Make sure the workout name is safe.
  $workoutName = test_input($_POST['workoutName']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9- ]+$/', $workoutName)) {
    #The user name had something other than characters in it.
    $_SESSION['addExerciseErrors'][] = 'Only letters allowed in workout name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

####################Validate Order####################################

#Make sure an order is selected
if (empty($_POST['order'])) {
  #Add the error to the array and go back to the workout page.
  $_SESSION['addExerciseErrors'][] = 'Order is required';

  if ($_SESSION['myPermission'] == 'Trainer') {
    header('location: ../trainer/createWorkoutTrainers.php');
  }
}

#Order is selected
else {
  #Make sure the workout name is safe.
  $order = test_input($_POST['order']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9]+$/', $order)) {
    #The user name had something other than characters in it.
    $_SESSION['addExerciseErrors'][] = 'Only letters allowed in order';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

####################Validate Exercises####################################

#Make sure an exercise is selected.
if (empty($_POST['exercises'])) {
  #Add the error to the array and go back to the workout page.
  $_SESSION['addExerciseErrors'][] = 'An exercise is required';

  if ($_SESSION['myPermission'] == 'Trainer') {
    header('location: ../trainer/createWorkoutTrainers.php');
  }
}

#Exercise is selected
else {
  #Make sure the exercise is safe.
  $exercises = test_input($_POST['exercises']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9- ]+$/', $exercises)) {
    #The user name had something other than characters in it.
    $_SESSION['addExerciseErrors'][] = 'Only letters allowed in exercise name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

###################### WEEK ONE #####################################
####################Validate Sets1###################################

#Check if sets is empty.
if (empty($_POST['selectSets'])) {
  #Add the error to the array and go back to the workout page.
  $_SESSION['addExerciseErrors'][] = '# of sets is required';

  if ($_SESSION['myPermission'] == 'Trainer') {
    header('location: ../trainer/createWorkoutTrainers.php');
  }
}

#Sets is not empty.
else {
  #Make sure sets is safe.
  $setsW1 = test_input($_POST['selectSets']);

  #Make sure its numeric.
  if (!is_numeric($setsW1)) {
    #Sets is invalid.
    $_SESSION['addExerciseErrors'][] = 'Sets must be a number';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

###################### WEEK TWO #####################################
####################Validate Sets2###################################

#Check if sets is empty.
if (empty($_POST['selectSets2'])) {
  #Add the error to the array and go back to the workout page.
}

#Sets is not empty.
else {
  #Make sure sets is safe.
  $setsW2 = test_input($_POST['selectSets2']);

  #Make sure its numeric.
  if (!is_numeric($setsW2)) {
    #Sets is invalid.
    $_SESSION['addExerciseErrors'][] = 'Sets must be a number';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

###################### WEEK THREE ###################################
####################Validate Sets3###################################

#Check if sets is empty.
if (empty($_POST['selectSets3'])) {
  #Add the error to the array and go back to the workout page.
}

#Sets is not empty.
else {
  #Make sure sets is safe.
  $setsW3 = test_input($_POST['selectSets3']);

  #Make sure its numeric.
  if (!is_numeric($setsW3)) {
    #Sets is invalid.
    $_SESSION['addExerciseErrors'][] = 'Sets must be a number';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

###################### WEEK FOUR ####################################
####################Validate Sets4###################################

#Check if sets is empty.
if (empty($_POST['selectSets4'])) {
  #Add the error to the array and go back to the workout page.
}

#Sets is not empty.
else {
  #Make sure sets is safe.
  $setsW4 = test_input($_POST['selectSets4']);

  #Make sure its numeric.
  if (!is_numeric($setsW4)) {
    #Sets is invalid.
    $_SESSION['addExerciseErrors'][] = 'Sets must be a number';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

################################ WEEK ONE ###########################################
############################## Validate Reps1 #######################################

#Check that the number of reps is not empty.
if (empty($_POST['reps1W1'])) {
}

#Number of reps is entered.
else {
  #Make sure reps is empty.
  $reps1W1 = test_input($_POST['reps1W1']);

  #Make sure it is a valid number.
  if (!is_numeric($reps1W1)) {
    #Invalid reps.
    $_SESSION['addExerciseErrors'][] = 'Reps must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

##############################Validate Reps2#########################################

#Check that the number of reps is not empty.
if (empty($_POST['reps2W1'])) {
}

#Number of reps is entered.
else {
  #Make sure reps is empty.
  $reps2W1 = test_input($_POST['reps2W1']);

  #Make sure it is a valid number.
  if (!is_numeric($reps2W1)) {
    #Invalid reps.
    $_SESSION['addExerciseErrors'][] = 'Reps must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################## Validate Reps 3#########################################

#Check that the number of reps is not empty.
if (empty($_POST['reps3W1'])) {
}

#Number of reps is entered.
else {
  #Make sure reps is empty.
  $reps3W1 = test_input($_POST['reps3W1']);

  #Make sure it is a valid number.
  if (!is_numeric($reps3W1)) {
    #Invalid reps.
    $_SESSION['addExerciseErrors'][] = 'Reps must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################## Validate Reps 4#########################################

#Check that the number of reps is not empty.
if (empty($_POST['reps4W1'])) {
}

#Number of reps is entered.
else {
  #Make sure reps is empty.
  $reps4W1 = test_input($_POST['reps4W1']);

  #Make sure it is a valid number.
  if (!is_numeric($reps4W1)) {
    #Invalid reps.
    $_SESSION['addExerciseErrors'][] = 'Reps must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################## Validate Reps 5#########################################

#Check that the number of reps is not empty.
if (empty($_POST['reps5W1'])) {
}

#Number of reps is entered.
else {
  #Make sure reps is empty.
  $reps5W1 = test_input($_POST['reps5W1']);

  #Make sure it is a valid number.
  if (!is_numeric($reps5W1)) {
    #Invalid reps.
    $_SESSION['addExerciseErrors'][] = 'Reps must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################## Validate Reps 6#########################################

#Check that the number of reps is not empty.
if (empty($_POST['reps6W1'])) {
}

#Number of reps is entered.
else {
  #Make sure reps is empty.
  $reps6W1 = test_input($_POST['reps6W1']);

  #Make sure it is a valid number.
  if (!is_numeric($reps6W1)) {
    #Invalid reps.
    $_SESSION['addExerciseErrors'][] = 'Reps must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################## Validate Reps 7#########################################

#Check that the number of reps is not empty.
if (empty($_POST['reps7W1'])) {
}

#Number of reps is entered.
else {
  #Make sure reps is empty.
  $reps7W1 = test_input($_POST['reps7W1']);

  #Make sure it is a valid number.
  if (!is_numeric($reps7W1)) {
    #Invalid reps.
    $_SESSION['addExerciseErrors'][] = 'Reps must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################## Validate Reps 8#########################################

#Check that the number of reps is not empty.
if (empty($_POST['reps8W1'])) {
}

#Number of reps is entered.
else {
  #Make sure reps is empty.
  $reps8W1 = test_input($_POST['reps8W1']);

  #Make sure it is a valid number.
  if (!is_numeric($reps8W1)) {
    #Invalid reps.
    $_SESSION['addExerciseErrors'][] = 'Reps must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################## Validate Reps 9#########################################

#Check that the number of reps is not empty.
if (empty($_POST['reps9W1'])) {
}

#Number of reps is entered.
else {
  #Make sure reps is empty.
  $reps9W1 = test_input($_POST['reps9W1']);

  #Make sure it is a valid number.
  if (!is_numeric($reps9W1)) {
    #Invalid reps.
    $_SESSION['addExerciseErrors'][] = 'Reps must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################## Validate Reps 10#########################################

#Check that the number of reps is not empty.
if (empty($_POST['reps10W1'])) {
}

#Number of reps is entered.
else {
  #Make sure reps is empty.
  $reps10W1 = test_input($_POST['reps10W1']);

  #Make sure it is a valid number.
  if (!is_numeric($reps10W1)) {
    #Invalid reps.
    $_SESSION['addExerciseErrors'][] = 'Reps must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

################################ WEEK TWO ###########################################
############################## Validate Reps #########################################

#Check that the number of reps is not empty.
if (empty($_POST['reps1W2'])) {
}

#Number of reps is entered.
else {
  #Make sure reps is empty.
  $reps1W2 = test_input($_POST['reps1W2']);

  #Make sure it is a valid number.
  if (!is_numeric($reps1W2)) {
    #Invalid reps.
    $_SESSION['addExerciseErrors'][] = 'Reps must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

##############################Validate Reps2#########################################

#Check that the number of reps is not empty.
if (empty($_POST['reps2W2'])) {
}

#Number of reps is entered.
else {
  #Make sure reps is empty.
  $reps2W2 = test_input($_POST['reps2W2']);

  #Make sure it is a valid number.
  if (!is_numeric($reps2W2)) {
    #Invalid reps.
    $_SESSION['addExerciseErrors'][] = 'Reps must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################## Validate Reps 3#########################################

#Check that the number of reps is not empty.
if (empty($_POST['reps3W2'])) {
}

#Number of reps is entered.
else {
  #Make sure reps is empty.
  $reps3W2 = test_input($_POST['reps3W2']);

  #Make sure it is a valid number.
  if (!is_numeric($reps3W2)) {
    #Invalid reps.
    $_SESSION['addExerciseErrors'][] = 'Reps must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################## Validate Reps 4#########################################

#Check that the number of reps is not empty.
if (empty($_POST['reps4W2'])) {
}

#Number of reps is entered.
else {
  #Make sure reps is empty.
  $reps4W2 = test_input($_POST['reps4W2']);

  #Make sure it is a valid number.
  if (!is_numeric($reps4W2)) {
    #Invalid reps.
    $_SESSION['addExerciseErrors'][] = 'Reps must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################## Validate Reps 5#########################################

#Check that the number of reps is not empty.
if (empty($_POST['reps5W2'])) {
}

#Number of reps is entered.
else {
  #Make sure reps is empty.
  $reps5W2 = test_input($_POST['reps5W2']);

  #Make sure it is a valid number.
  if (!is_numeric($reps5W2)) {
    #Invalid reps.
    $_SESSION['addExerciseErrors'][] = 'Reps must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################## Validate Reps 6#########################################

#Check that the number of reps is not empty.
if (empty($_POST['reps6W2'])) {
}

#Number of reps is entered.
else {
  #Make sure reps is empty.
  $reps6W2 = test_input($_POST['reps6W2']);

  #Make sure it is a valid number.
  if (!is_numeric($reps6W2)) {
    #Invalid reps.
    $_SESSION['addExerciseErrors'][] = 'Reps must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################## Validate Reps 7#########################################

#Check that the number of reps is not empty.
if (empty($_POST['reps7W2'])) {
}

#Number of reps is entered.
else {
  #Make sure reps is empty.
  $reps7W2 = test_input($_POST['reps7W2']);

  #Make sure it is a valid number.
  if (!is_numeric($reps7W2)) {
    #Invalid reps.
    $_SESSION['addExerciseErrors'][] = 'Reps must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################## Validate Reps 8#########################################

#Check that the number of reps is not empty.
if (empty($_POST['reps8W2'])) {
}

#Number of reps is entered.
else {
  #Make sure reps is empty.
  $reps8W2 = test_input($_POST['reps8W2']);

  #Make sure it is a valid number.
  if (!is_numeric($reps8W2)) {
    #Invalid reps.
    $_SESSION['addExerciseErrors'][] = 'Reps must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################## Validate Reps 9#########################################

#Check that the number of reps is not empty.
if (empty($_POST['reps9W2'])) {
}

#Number of reps is entered.
else {
  #Make sure reps is empty.
  $reps9W2 = test_input($_POST['reps9W2']);

  #Make sure it is a valid number.
  if (!is_numeric($reps9W2)) {
    #Invalid reps.
    $_SESSION['addExerciseErrors'][] = 'Reps must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################## Validate Reps 10#########################################

#Check that the number of reps is not empty.
if (empty($_POST['reps10W2'])) {
}

#Number of reps is entered.
else {
  #Make sure reps is empty.
  $reps10W2 = test_input($_POST['reps10W2']);

  #Make sure it is a valid number.
  if (!is_numeric($reps10W2)) {
    #Invalid reps.
    $_SESSION['addExerciseErrors'][] = 'Reps must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

################################ WEEK THREE ###########################################
############################## Validate Reps #########################################

#Check that the number of reps is not empty.
if (empty($_POST['reps1W3'])) {
}

#Number of reps is entered.
else {
  #Make sure reps is empty.
  $reps1W3 = test_input($_POST['reps1W3']);

  #Make sure it is a valid number.
  if (!is_numeric($reps1W3)) {
    #Invalid reps.
    $_SESSION['addExerciseErrors'][] = 'Reps must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

##############################Validate Reps2#########################################

#Check that the number of reps is not empty.
if (empty($_POST['reps2W3'])) {
}

#Number of reps is entered.
else {
  #Make sure reps is empty.
  $reps2W3 = test_input($_POST['reps2W3']);

  #Make sure it is a valid number.
  if (!is_numeric($reps2W3)) {
    #Invalid reps.
    $_SESSION['addExerciseErrors'][] = 'Reps must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################## Validate Reps 3#########################################

#Check that the number of reps is not empty.
if (empty($_POST['reps3W3'])) {
}

#Number of reps is entered.
else {
  #Make sure reps is empty.
  $reps3W3 = test_input($_POST['reps3W3']);

  #Make sure it is a valid number.
  if (!is_numeric($reps3W3)) {
    #Invalid reps.
    $_SESSION['addExerciseErrors'][] = 'Reps must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################## Validate Reps 4#########################################

#Check that the number of reps is not empty.
if (empty($_POST['reps4W3'])) {
}

#Number of reps is entered.
else {
  #Make sure reps is empty.
  $reps4W3 = test_input($_POST['reps4W3']);

  #Make sure it is a valid number.
  if (!is_numeric($reps4W3)) {
    #Invalid reps.
    $_SESSION['addExerciseErrors'][] = 'Reps must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################## Validate Reps 5#########################################

#Check that the number of reps is not empty.
if (empty($_POST['reps5W3'])) {
}

#Number of reps is entered.
else {
  #Make sure reps is empty.
  $reps5W3 = test_input($_POST['reps5W3']);

  #Make sure it is a valid number.
  if (!is_numeric($reps5W3)) {
    #Invalid reps.
    $_SESSION['addExerciseErrors'][] = 'Reps must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################## Validate Reps 6#########################################

#Check that the number of reps is not empty.
if (empty($_POST['reps6W3'])) {
}

#Number of reps is entered.
else {
  #Make sure reps is empty.
  $reps6W3 = test_input($_POST['reps6W3']);

  #Make sure it is a valid number.
  if (!is_numeric($reps6W3)) {
    #Invalid reps.
    $_SESSION['addExerciseErrors'][] = 'Reps must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################## Validate Reps 7#########################################

#Check that the number of reps is not empty.
if (empty($_POST['reps7W3'])) {
}

#Number of reps is entered.
else {
  #Make sure reps is empty.
  $reps7W3 = test_input($_POST['reps7W3']);

  #Make sure it is a valid number.
  if (!is_numeric($reps7W3)) {
    #Invalid reps.
    $_SESSION['addExerciseErrors'][] = 'Reps must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################## Validate Reps 8#########################################

#Check that the number of reps is not empty.
if (empty($_POST['reps8W3'])) {
}

#Number of reps is entered.
else {
  #Make sure reps is empty.
  $reps8W3 = test_input($_POST['reps8W3']);

  #Make sure it is a valid number.
  if (!is_numeric($reps8W3)) {
    #Invalid reps.
    $_SESSION['addExerciseErrors'][] = 'Reps must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################## Validate Reps 9#########################################

#Check that the number of reps is not empty.
if (empty($_POST['reps9W3'])) {
}

#Number of reps is entered.
else {
  #Make sUre reps is empty.
  $reps9W3 = test_input($_POST['reps9W3']);

  #Make sure it is a valid number.
  if (!is_numeric($reps9W3)) {
    #Invalid reps.
    $_SESSION['addExerciseErrors'][] = 'Reps must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################## Validate Reps 10#########################################

#Check that the number of reps is not empty.
if (empty($_POST['reps10W3'])) {
}

#Number of reps is entered.
else {
  #Make sure reps is empty.
  $reps10W3 = test_input($_POST['reps10W3']);

  #Make sure it is a valid number.
  if (!is_numeric($reps10W3)) {
    #Invalid reps.
    $_SESSION['addExerciseErrors'][] = 'Reps must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

################################ WEEK FOUR ###########################################
############################## Validate Reps #########################################

#Check that the number of reps is not empty.
if (empty($_POST['reps1W4'])) {
}

#Number of reps is entered.
else {
  #Make sure reps is empty.
  $reps1W4 = test_input($_POST['reps1W4']);

  #Make sure it is a valid number.
  if (!is_numeric($reps1W4)) {
    #Invalid reps.
    $_SESSION['addExerciseErrors'][] = 'Reps must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

##############################Validate Reps2#########################################

#Check that the number of reps is not empty.
if (empty($_POST['reps2W4'])) {
}

#Number of reps is entered.
else {
  #Make sure reps is empty.
  $reps2W4 = test_input($_POST['reps2W4']);

  #Make sure it is a valid number.
  if (!is_numeric($reps2W4)) {
    #Invalid reps.
    $_SESSION['addExerciseErrors'][] = 'Reps must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################## Validate Reps 3#########################################

#Check that the number of reps is not empty.
if (empty($_POST['reps3W4'])) {
}

#Number of reps is entered.
else {
  #Make sure reps is empty.
  $reps3W4 = test_input($_POST['reps3W4']);

  #Make sure it is a valid number.
  if (!is_numeric($reps3W4)) {
    #Invalid reps.
    $_SESSION['addExerciseErrors'][] = 'Reps must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################## Validate Reps 4#########################################

#Check that the number of reps is not empty.
if (empty($_POST['reps4W4'])) {
}

#Number of reps is entered.
else {
  #Make sure reps is empty.
  $reps4W4 = test_input($_POST['reps4W4']);

  #Make sure it is a valid number.
  if (!is_numeric($reps4W4)) {
    #Invalid reps.
    $_SESSION['addExerciseErrors'][] = 'Reps must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################## Validate Reps 5#########################################

#Check that the number of reps is not empty.
if (empty($_POST['reps5W4'])) {
}

#Number of reps is entered.
else {
  #Make sure reps is empty.
  $reps5W4 = test_input($_POST['reps5W4']);

  #Make sure it is a valid number.
  if (!is_numeric($reps5W4)) {
    #Invalid reps.
    $_SESSION['addExerciseErrors'][] = 'Reps must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################## Validate Reps 6#########################################

#Check that the number of reps is not empty.
if (empty($_POST['reps6W4'])) {
}

#Number of reps is entered.
else {
  #Make sure reps is empty.
  $reps6W4 = test_input($_POST['reps6W4']);

  #Make sure it is a valid number.
  if (!is_numeric($reps6W4)) {
    #Invalid reps.
    $_SESSION['addExerciseErrors'][] = 'Reps must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################## Validate Reps 7#########################################

#Check that the number of reps is not empty.
if (empty($_POST['reps7W4'])) {
}

#Number of reps is entered.
else {
  #Make sure reps is empty.
  $reps7W4 = test_input($_POST['reps7W4']);

  #Make sure it is a valid number.
  if (!is_numeric($reps7W4)) {
    #Invalid reps.
    $_SESSION['addExerciseErrors'][] = 'Reps must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################## Validate Reps 8#########################################

#Check that the number of reps is not empty.
if (empty($_POST['reps8W4'])) {
}

#Number of reps is entered.
else {
  #Make sure reps is empty.
  $reps8W4 = test_input($_POST['reps8W4']);

  #Make sure it is a valid number.
  if (!is_numeric($reps8W4)) {
    #Invalid reps.
    $_SESSION['addExerciseErrors'][] = 'Reps must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################## Validate Reps 9#########################################

#Check that the number of reps is not empty.
if (empty($_POST['reps9W4'])) {
}

#Number of reps is entered.
else {
  #Make sure reps is empty.
  $reps9W4 = test_input($_POST['reps9W4']);

  #Make sure it is a valid number.
  if (!is_numeric($reps9W4)) {
    #Invalid reps.
    $_SESSION['addExerciseErrors'][] = 'Reps must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################## Validate Reps 10#########################################

#Check that the number of reps is not empty.
if (empty($_POST['reps10W4'])) {
}

#Number of reps is entered.
else {
  #Make sure reps is empty.
  $reps10W4 = test_input($_POST['reps10W4']);

  #Make sure it is a valid number.
  if (!is_numeric($reps10W4)) {
    #Invalid reps.
    $_SESSION['addExerciseErrors'][] = 'Reps must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################WEEK ONE##############################################
############################Validate Intensity####################################

#Is intensity empty???
if (empty($_POST['intensity1W1'])) {
  #Not required so do nothing.
}

#Guess its not empty.
else {
  #Make sure the intensity is safe.
  $intensity1W1 = test_input($_POST['intensity1W1']);

  #Make sure its a valid number.
  if (!is_numeric($intensity1W1)) {
    #Invalid intensity.
    $_SESSION['addExerciseErrors'][] = 'Intensity must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################Validate Intensity2##############################################

#Is intensity empty???
if (empty($_POST['intensity2W1'])) {
  #Not required so do nothing.
}

#Guess its not empty.
else {
  #Make sure the intensity is safe.
  $intensity2W1 = test_input($_POST['intensity2W1']);

  #Make sure its a valid number.
  if (!is_numeric($intensity2W1)) {
    #Invalid intensity.
    $_SESSION['addExerciseErrors'][] = 'Intensity must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################Validate Intensity3##############################################

#Is intensity empty???
if (empty($_POST['intensity3W1'])) {
  #Not required so do nothing.
}

#Guess its not empty.
else {
  #Make sure the intensity is safe.
  $intensity3W1 = test_input($_POST['intensity3W1']);

  #Make sure its a valid number.
  if (!is_numeric($intensity3W1)) {
    #Invalid intensity.
    $_SESSION['addExerciseErrors'][] = 'Intensity must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################Validate Intensity4##############################################

#Is intensity empty???
if (empty($_POST['intensity4W1'])) {
  #Not required so do nothing.
}

#Guess its not empty.
else {
  #Make sure the intensity is safe.
  $intensity4W1 = test_input($_POST['intensity4W1']);

  #Make sure its a valid number.
  if (!is_numeric($intensity4W1)) {
    #Invalid intensity.
    $_SESSION['addExerciseErrors'][] = 'Intensity must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################Validate Intensity5##############################################

#Is intensity empty???
if (empty($_POST['intensity5W1'])) {
  #Not required so do nothing.
}

#Guess its not empty.
else {
  #Make sure the intensity is safe.
  $intensity5W1 = test_input($_POST['intensity5W1']);

  #Make sure its a valid number.
  if (!is_numeric($intensity5W1)) {
    #Invalid intensity.
    $_SESSION['addExerciseErrors'][] = 'Intensity must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################Validate Intensity6##############################################

#Is intensity empty???
if (empty($_POST['intensity6W1'])) {
  #Not required so do nothing.
}

#Guess its not empty.
else {
  #Make sure the intensity is safe.
  $intensity6W1 = test_input($_POST['intensity6W1']);

  #Make sure its a valid number.
  if (!is_numeric($intensity6W1)) {
    #Invalid intensity.
    $_SESSION['addExerciseErrors'][] = 'Intensity must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################Validate Intensity7##############################################

#Is intensity empty???
if (empty($_POST['intensity7W1'])) {
  #Not required so do nothing.
}

#Guess its not empty.
else {
  #Make sure the intensity is safe.
  $intensity7W1 = test_input($_POST['intensity7W1']);

  #Make sure its a valid number.
  if (!is_numeric($intensity7W1)) {
    #Invalid intensity.
    $_SESSION['addExerciseErrors'][] = 'Intensity must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################Validate Intensity8##############################################

#Is intensity empty???
if (empty($_POST['intensity8W1'])) {
  #Not required so do nothing.
}

#Guess its not empty.
else {
  #Make sure the intensity is safe.
  $intensity8W1 = test_input($_POST['intensity8W1']);

  #Make sure its a valid number.
  if (!is_numeric($intensity8W1)) {
    #Invalid intensity.
    $_SESSION['addExerciseErrors'][] = 'Intensity must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################Validate Intensity9##############################################

#Is intensity empty???
if (empty($_POST['intensity9W1'])) {
  #Not required so do nothing.
}

#Guess its not empty.
else {
  #Make sure the intensity is safe.
  $intensity9W1 = test_input($_POST['intensity9W1']);

  #Make sure its a valid number.
  if (!is_numeric($intensity9W1)) {
    #Invalid intensity.
    $_SESSION['addExerciseErrors'][] = 'Intensity must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################Validate Intensity10##############################################

#Is intensity empty???
if (empty($_POST['intensity10W1'])) {
  #Not required so do nothing.
}

#Guess its not empty.
else {
  #Make sure the intensity is safe.
  $intensity10W1 = test_input($_POST['intensity10W1']);

  #Make sure its a valid number.
  if (!is_numeric($intensity10W1)) {
    #Invalid intensity.
    $_SESSION['addExerciseErrors'][] = 'Intensity must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################WEEK TWO##############################################
############################Validate Intensity######################################

#Is intensity empty???
if (empty($_POST['intensity1W2'])) {
  #Not required so do nothing.
}

#Guess its not empty.
else {
  #Make sure the intensity is safe.
  $intensity1W2 = test_input($_POST['intensity1W2']);

  #Make sure its a valid number.
  if (!is_numeric($intensity1W2)) {
    #Invalid intensity.
    $_SESSION['addExerciseErrors'][] = 'Intensity must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################Validate Intensity2##############################################

#Is intensity empty???
if (empty($_POST['intensity2W2'])) {
  #Not required so do nothing.
}

#Guess its not empty.
else {
  #Make sure the intensity is safe.
  $intensity2W2 = test_input($_POST['intensity2W2']);

  #Make sure its a valid number.
  if (!is_numeric($intensity2W2)) {
    #Invalid intensity.
    $_SESSION['addExerciseErrors'][] = 'Intensity must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################Validate Intensity3##############################################

#Is intensity empty???
if (empty($_POST['intensity3W2'])) {
  #Not required so do nothing.
}

#Guess its not empty.
else {
  #Make sure the intensity is safe.
  $intensity3W2 = test_input($_POST['intensity3W2']);

  #Make sure its a valid number.
  if (!is_numeric($intensity3W2)) {
    #Invalid intensity.
    $_SESSION['addExerciseErrors'][] = 'Intensity must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################Validate Intensity4##############################################

#Is intensity empty???
if (empty($_POST['intensity4W2'])) {
  #Not required so do nothing.
}

#Guess its not empty.
else {
  #Make sure the intensity is safe.
  $intensity4W2 = test_input($_POST['intensity4W2']);

  #Make sure its a valid number.
  if (!is_numeric($intensity4W2)) {
    #Invalid intensity.
    $_SESSION['addExerciseErrors'][] = 'Intensity must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################Validate Intensity5##############################################

#Is intensity empty???
if (empty($_POST['intensity5W2'])) {
  #Not required so do nothing.
}

#Guess its not empty.
else {
  #Make sure the intensity is safe.
  $intensity5W2 = test_input($_POST['intensity5W2']);

  #Make sure its a valid number.
  if (!is_numeric($intensity5W2)) {
    #Invalid intensity.
    $_SESSION['addExerciseErrors'][] = 'Intensity must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################Validate Intensity6##############################################

#Is intensity empty???
if (empty($_POST['intensity6W2'])) {
  #Not required so do nothing.
}

#Guess its not empty.
else {
  #Make sure the intensity is safe.
  $intensity6W2 = test_input($_POST['intensity6W2']);

  #Make sure its a valid number.
  if (!is_numeric($intensity6W2)) {
    #Invalid intensity.
    $_SESSION['addExerciseErrors'][] = 'Intensity must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################Validate Intensity7##############################################

#Is intensity empty???
if (empty($_POST['intensity7W2'])) {
  #Not required so do nothing.
}

#Guess its not empty.
else {
  #Make sure the intensity is safe.
  $intensity7W2 = test_input($_POST['intensity7W2']);

  #Make sure its a valid number.
  if (!is_numeric($intensity7W2)) {
    #Invalid intensity.
    $_SESSION['addExerciseErrors'][] = 'Intensity must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################Validate Intensity8##############################################

#Is intensity empty???
if (empty($_POST['intensity8W2'])) {
  #Not required so do nothing.
}

#Guess its not empty.
else {
  #Make sure the intensity is safe.
  $intensity8W2 = test_input($_POST['intensity8W2']);

  #Make sure its a valid number.
  if (!is_numeric($intensity8W2)) {
    #Invalid intensity.
    $_SESSION['addExerciseErrors'][] = 'Intensity must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################Validate Intensity9##############################################

#Is intensity empty???
if (empty($_POST['intensity9W2'])) {
  #Not required so do nothing.
}

#Guess its not empty.
else {
  #Make sure the intensity is safe.
  $intensity9W2 = test_input($_POST['intensity9W2']);

  #Make sure its a valid number.
  if (!is_numeric($intensity9W2)) {
    #Invalid intensity.
    $_SESSION['addExerciseErrors'][] = 'Intensity must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################Validate Intensity10##############################################

#Is intensity empty???
if (empty($_POST['intensity10W2'])) {
  #Not required so do nothing.
}

#Guess its not empty.
else {
  #Make sure the intensity is safe.
  $intensity10W2 = test_input($_POST['intensity10W2']);

  #Make sure its a valid number.
  if (!is_numeric($intensity10W2)) {
    #Invalid intensity.
    $_SESSION['addExerciseErrors'][] = 'Intensity must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################WEEK THREE##############################################
############################Validate Intensity##############################################

#Is intensity empty???
if (empty($_POST['intensity1W3'])) {
  #Not required so do nothing.
}

#Guess its not empty.
else {
  #Make sure the intensity is safe.
  $intensity1W3 = test_input($_POST['intensity1W3']);

  #Make sure its a valid number.
  if (!is_numeric($intensity1W3)) {
    #Invalid intensity.
    $_SESSION['addExerciseErrors'][] = 'Intensity must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################Validate Intensity2##############################################

#Is intensity empty???
if (empty($_POST['intensity2W3'])) {
  #Not required so do nothing.
}

#Guess its not empty.
else {
  #Make sure the intensity is safe.
  $intensity2W3 = test_input($_POST['intensity2W3']);

  #Make sure its a valid number.
  if (!is_numeric($intensity2W3)) {
    #Invalid intensity.
    $_SESSION['addExerciseErrors'][] = 'Intensity must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################Validate Intensity3##############################################

#Is intensity empty???
if (empty($_POST['intensity3W3'])) {
  #Not required so do nothing.
}

#Guess its not empty.
else {
  #Make sure the intensity is safe.
  $intensity3W3 = test_input($_POST['intensity3W3']);

  #Make sure its a valid number.
  if (!is_numeric($intensity3W3)) {
    #Invalid intensity.
    $_SESSION['addExerciseErrors'][] = 'Intensity must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################Validate Intensity4##############################################

#Is intensity empty???
if (empty($_POST['intensity4W3'])) {
  #Not required so do nothing.
}

#Guess its not empty.
else {
  #Make sure the intensity is safe.
  $intensity4W3 = test_input($_POST['intensity4W3']);

  #Make sure its a valid number.
  if (!is_numeric($intensity4W3)) {
    #Invalid intensity.
    $_SESSION['addExerciseErrors'][] = 'Intensity must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################Validate Intensity5##############################################

#Is intensity empty???
if (empty($_POST['intensity5W3'])) {
  #Not required so do nothing.
}

#Guess its not empty.
else {
  #Make sure the intensity is safe.
  $intensity5W3 = test_input($_POST['intensity5W3']);

  #Make sure its a valid number.
  if (!is_numeric($intensity5W3)) {
    #Invalid intensity.
    $_SESSION['addExerciseErrors'][] = 'Intensity must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################Validate Intensity6##############################################

#Is intensity empty???
if (empty($_POST['intensity6W3'])) {
  #Not required so do nothing.
}

#Guess its not empty.
else {
  #Make sure the intensity is safe.
  $intensity6W3 = test_input($_POST['intensity6W3']);

  #Make sure its a valid number.
  if (!is_numeric($intensity6W3)) {
    #Invalid intensity.
    $_SESSION['addExerciseErrors'][] = 'Intensity must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################Validate Intensity7##############################################

#Is intensity empty???
if (empty($_POST['intensity7W3'])) {
  #Not required so do nothing.
}

#Guess its not empty.
else {
  #Make sure the intensity is safe.
  $intensity7W3 = test_input($_POST['intensity7W3']);

  #Make sure its a valid number.
  if (!is_numeric($intensity7W3)) {
    #Invalid intensity.
    $_SESSION['addExerciseErrors'][] = 'Intensity must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################Validate Intensity8##############################################

#Is intensity empty???
if (empty($_POST['intensity8W3'])) {
  #Not required so do nothing.
}

#Guess its not empty.
else {
  #Make sure the intensity is safe.
  $intensity8W3 = test_input($_POST['intensity8W3']);

  #Make sure its a valid number.
  if (!is_numeric($intensity8W3)) {
    #Invalid intensity.
    $_SESSION['addExerciseErrors'][] = 'Intensity must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################Validate Intensity9##############################################

#Is intensity empty???
if (empty($_POST['intensity9W3'])) {
  #Not required so do nothing.
}

#Guess its not empty.
else {
  #Make sure the intensity is safe.
  $intensity9W3 = test_input($_POST['intensity9W3']);

  #Make sure its a valid number.
  if (!is_numeric($intensity9W3)) {
    #Invalid intensity.
    $_SESSION['addExerciseErrors'][] = 'Intensity must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################Validate Intensity10##############################################

#Is intensity empty???
if (empty($_POST['intensity10W3'])) {
  #Not required so do nothing.
}

#Guess its not empty.
else {
  #Make sure the intensity is safe.
  $intensity10W3 = test_input($_POST['intensity10W3']);

  #Make sure its a valid number.
  if (!is_numeric($intensity10W3)) {
    #Invalid intensity.
    $_SESSION['addExerciseErrors'][] = 'Intensity must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################WEEK FOUR##############################################
############################Validate Intensity##############################################

#Is intensity empty???
if (empty($_POST['intensity1W4'])) {
  #Not required so do nothing.
}

#Guess its not empty.
else {
  #Make sure the intensity is safe.
  $intensity1W4 = test_input($_POST['intensity1W4']);

  #Make sure its a valid number.
  if (!is_numeric($intensity1W4)) {
    #Invalid intensity.
    $_SESSION['addExerciseErrors'][] = 'Intensity must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################Validate Intensity2##############################################

#Is intensity empty???
if (empty($_POST['intensity2W4'])) {
  #Not required so do nothing.
}

#Guess its not empty.
else {
  #Make sure the intensity is safe.
  $intensity2W4 = test_input($_POST['intensity2W4']);

  #Make sure its a valid number.
  if (!is_numeric($intensity2W4)) {
    #Invalid intensity.
    $_SESSION['addExerciseErrors'][] = 'Intensity must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################Validate Intensity3##############################################

#Is intensity empty???
if (empty($_POST['intensity3W4'])) {
  #Not required so do nothing.
}

#Guess its not empty.
else {
  #Make sure the intensity is safe.
  $intensity3W4 = test_input($_POST['intensity3W4']);

  #Make sure its a valid number.
  if (!is_numeric($intensity3W4)) {
    #Invalid intensity.
    $_SESSION['addExerciseErrors'][] = 'Intensity must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################Validate Intensity4##############################################

#Is intensity empty???
if (empty($_POST['intensity4W4'])) {
  #Not required so do nothing.
}

#Guess its not empty.
else {
  #Make sure the intensity is safe.
  $intensity4W4 = test_input($_POST['intensity4W4']);

  #Make sure its a valid number.
  if (!is_numeric($intensity4W4)) {
    #Invalid intensity.
    $_SESSION['addExerciseErrors'][] = 'Intensity must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################Validate Intensity5##############################################

#Is intensity empty???
if (empty($_POST['intensity5W4'])) {
  #Not required so do nothing.
}

#Guess its not empty.
else {
  #Make sure the intensity is safe.
  $intensity5W4 = test_input($_POST['intensity5W4']);

  #Make sure its a valid number.
  if (!is_numeric($intensity5W4)) {
    #Invalid intensity.
    $_SESSION['addExerciseErrors'][] = 'Intensity must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################Validate Intensity6##############################################

#Is intensity empty???
if (empty($_POST['intensity6W4'])) {
  #Not required so do nothing.
}

#Guess its not empty.
else {
  #Make sure the intensity is safe.
  $intensity6W4 = test_input($_POST['intensity6W4']);

  #Make sure its a valid number.
  if (!is_numeric($intensity6W4)) {
    #Invalid intensity.
    $_SESSION['addExerciseErrors'][] = 'Intensity must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################Validate Intensity7##############################################

#Is intensity empty???
if (empty($_POST['intensity7W4'])) {
  #Not required so do nothing.
}

#Guess its not empty.
else {
  #Make sure the intensity is safe.
  $intensity7W4 = test_input($_POST['intensity7W4']);

  #Make sure its a valid number.
  if (!is_numeric($intensity7W4)) {
    #Invalid intensity.
    $_SESSION['addExerciseErrors'][] = 'Intensity must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################Validate Intensity8##############################################

#Is intensity empty???
if (empty($_POST['intensity8W4'])) {
  #Not required so do nothing.
}

#Guess its not empty.
else {
  #Make sure the intensity is safe.
  $intensity8W4 = test_input($_POST['intensity8W4']);

  #Make sure its a valid number.
  if (!is_numeric($intensity8W4)) {
    #Invalid intensity.
    $_SESSION['addExerciseErrors'][] = 'Intensity must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################Validate Intensity9##############################################

#Is intensity empty???
if (empty($_POST['intensity9W4'])) {
  #Not required so do nothing.
}

#Guess its not empty.
else {
  #Make sure the intensity is safe.
  $intensity9W4 = test_input($_POST['intensity9W4']);

  #Make sure its a valid number.
  if (!is_numeric($intensity9W4)) {
    #Invalid intensity.
    $_SESSION['addExerciseErrors'][] = 'Intensity must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################Validate Intensity10##############################################

#Is intensity empty???
if (empty($_POST['intensity10W4'])) {
  #Not required so do nothing.
}

#Guess its not empty.
else {
  #Make sure the intensity is safe.
  $intensity10W4 = test_input($_POST['intensity10W4']);

  #Make sure its a valid number.
  if (!is_numeric($intensity10W4)) {
    #Invalid intensity.
    $_SESSION['addExerciseErrors'][] = 'Intensity must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

######################## WEEK ONE ####################################
#########################Validate Percentage ####################################

#Check to make sure rest is entered.
if (empty($_POST['percent1W1'])) {
  #Add the error to the array and go back to the workout page.
}
#Rest is not empty.
else {
  #Send the rest to test the input and strip characters from it.
  $percent1W1 = test_input($_POST['percent1W1']);

  #Make sure it is numeric.
  if (!is_numeric($percent1W1)) {
    #Invalid sport name.
    $_SESSION['addExerciseErrors'][] = 'Percent must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

######################### Validate Percentage 2 ####################################

#Check to make sure rest is entered.
if (empty($_POST['percent2W1'])) {
  #Add the error to the array and go back to the workout page.
}
#Rest is not empty.
else {
  #Send the rest to test the input and strip characters from it.
  $percent2W1 = test_input($_POST['percent2W1']);

  #Make sure it is numeric.
  if (!is_numeric($percent2W1)) {
    #Invalid sport name.
    $_SESSION['addExerciseErrors'][] = 'Percent must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

######################### Validate Percentage 3 ####################################

#Check to make sure rest is entered.
if (empty($_POST['percent3W1'])) {
  #Add the error to the array and go back to the workout page.
}
#Rest is not empty.
else {
  #Send the rest to test the input and strip characters from it.
  $percent3W1 = test_input($_POST['percent3W1']);

  #Make sure it is numeric.
  if (!is_numeric($percent3W1)) {
    #Invalid sport name.
    $_SESSION['addExerciseErrors'][] = 'Percent must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

######################### Validate Percentage 4 ####################################

#Check to make sure rest is entered.
if (empty($_POST['percent4W1'])) {
  #Add the error to the array and go back to the workout page.
}
#Rest is not empty.
else {
  #Send the rest to test the input and strip characters from it.
  $percent4W1 = test_input($_POST['percent4W1']);

  #Make sure it is numeric.
  if (!is_numeric($percent4W1)) {
    #Invalid sport name.
    $_SESSION['addExerciseErrors'][] = 'Percent must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

######################### Validate Percentage 5 ####################################

#Check to make sure rest is entered.
if (empty($_POST['percent5W1'])) {
  #Add the error to the array and go back to the workout page.
}
#Rest is not empty.
else {
  #Send the rest to test the input and strip characters from it.
  $percent5W1 = test_input($_POST['percent5W1']);

  #Make sure it is numeric.
  if (!is_numeric($percent5W1)) {
    #Invalid sport name.
    $_SESSION['addExerciseErrors'][] = 'Percent must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

######################### Validate Percentage 6 ####################################

#Check to make sure rest is entered.
if (empty($_POST['percent6W1'])) {
  #Add the error to the array and go back to the workout page.
}
#Rest is not empty.
else {
  #Send the rest to test the input and strip characters from it.
  $percent6W1 = test_input($_POST['percent6W1']);

  #Make sure it is numeric.
  if (!is_numeric($percent6W1)) {
    #Invalid sport name.
    $_SESSION['addExerciseErrors'][] = 'Percent must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

######################### Validate Percentage 7 ####################################

#Check to make sure rest is entered.
if (empty($_POST['percent7W1'])) {
  #Add the error to the array and go back to the workout page.
}
#Rest is not empty.
else {
  #Send the rest to test the input and strip characters from it.
  $percent7W1 = test_input($_POST['percent7W1']);

  #Make sure it is numeric.
  if (!is_numeric($percent7W1)) {
    #Invalid sport name.
    $_SESSION['addExerciseErrors'][] = 'Percent must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

######################### Validate Percentage 8 ####################################

#Check to make sure rest is entered.
if (empty($_POST['percent8W1'])) {
  #Add the error to the array and go back to the workout page.
}
#Rest is not empty.
else {
  #Send the rest to test the input and strip characters from it.
  $percent8W1 = test_input($_POST['percent8W1']);

  #Make sure it is numeric.
  if (!is_numeric($percent8W1)) {
    #Invalid sport name.
    $_SESSION['addExerciseErrors'][] = 'Percent must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

######################### Validate Percentage 9 ####################################

#Check to make sure rest is entered.
if (empty($_POST['percent9W1'])) {
  #Add the error to the array and go back to the workout page.
}
#Rest is not empty.
else {
  #Send the rest to test the input and strip characters from it.
  $percent9W1 = test_input($_POST['percent9W1']);

  #Make sure it is numeric.
  if (!is_numeric($percent9W1)) {
    #Invalid sport name.
    $_SESSION['addExerciseErrors'][] = 'Percent must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

######################### Validate Percentage 10 ####################################

#Check to make sure rest is entered.
if (empty($_POST['percent10W1'])) {
  #Add the error to the array and go back to the workout page.
}
#Rest is not empty.
else {
  #Send the rest to test the input and strip characters from it.
  $percent10W1 = test_input($_POST['percent10W1']);

  #Make sure it is numeric.
  if (!is_numeric($percent10W1)) {
    #Invalid sport name.
    $_SESSION['addExerciseErrors'][] = 'Percent must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

######################## WEEK TWO ####################################
#########################Validate Percentage ####################################

#Check to make sure rest is entered.
if (empty($_POST['percent1W2'])) {
  #Add the error to the array and go back to the workout page.
}
#Rest is not empty.
else {
  #Send the rest to test the input and strip characters from it.
  $percent1W2 = test_input($_POST['percent1W2']);

  #Make sure it is numeric.
  if (!is_numeric($percent1W2)) {
    #Invalid sport name.
    $_SESSION['addExerciseErrors'][] = 'Percent must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

######################### Validate Percentage 2 ####################################

#Check to make sure rest is entered.
if (empty($_POST['percent2W2'])) {
  #Add the error to the array and go back to the workout page.
}
#Rest is not empty.
else {
  #Send the rest to test the input and strip characters from it.
  $percent2W2 = test_input($_POST['percent2W2']);

  #Make sure it is numeric.
  if (!is_numeric($percent2W2)) {
    #Invalid sport name.
    $_SESSION['addExerciseErrors'][] = 'Percent must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

######################### Validate Percentage 3 ####################################

#Check to make sure rest is entered.
if (empty($_POST['percent3W2'])) {
  #Add the error to the array and go back to the workout page.
}
#Rest is not empty.
else {
  #Send the rest to test the input and strip characters from it.
  $percent3W2 = test_input($_POST['percent3W2']);

  #Make sure it is numeric.
  if (!is_numeric($percent3W2)) {
    #Invalid sport name.
    $_SESSION['addExerciseErrors'][] = 'Percent must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

######################### Validate Percentage 4 ####################################

#Check to make sure rest is entered.
if (empty($_POST['percent4W2'])) {
  #Add the error to the array and go back to the workout page.
}
#Rest is not empty.
else {
  #Send the rest to test the input and strip characters from it.
  $percent4W2 = test_input($_POST['percent4W2']);

  #Make sure it is numeric.
  if (!is_numeric($percent4W2)) {
    #Invalid sport name.
    $_SESSION['addExerciseErrors'][] = 'Percent must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

######################### Validate Percentage 5 ####################################

#Check to make sure rest is entered.
if (empty($_POST['percent5W2'])) {
  #Add the error to the array and go back to the workout page.
}
#Rest is not empty.
else {
  #Send the rest to test the input and strip characters from it.
  $percent5W2 = test_input($_POST['percent5W2']);

  #Make sure it is numeric.
  if (!is_numeric($percent5W2)) {
    #Invalid sport name.
    $_SESSION['addExerciseErrors'][] = 'Percent must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

######################### Validate Percentage 6 ####################################

#Check to make sure rest is entered.
if (empty($_POST['percent6W2'])) {
  #Add the error to the array and go back to the workout page.
}
#Rest is not empty.
else {
  #Send the rest to test the input and strip characters from it.
  $percent6W2 = test_input($_POST['percent6W2']);

  #Make sure it is numeric.
  if (!is_numeric($percent6W2)) {
    #Invalid sport name.
    $_SESSION['addExerciseErrors'][] = 'Percent must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

######################### Validate Percentage 7 ####################################

#Check to make sure rest is entered.
if (empty($_POST['percent7W2'])) {
  #Add the error to the array and go back to the workout page.
}
#Rest is not empty.
else {
  #Send the rest to test the input and strip characters from it.
  $percent7W2 = test_input($_POST['percent7W2']);

  #Make sure it is numeric.
  if (!is_numeric($percent7W2)) {
    #Invalid sport name.
    $_SESSION['addExerciseErrors'][] = 'Percent must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

######################### Validate Percentage 8 ####################################

#Check to make sure rest is entered.
if (empty($_POST['percent8W2'])) {
  #Add the error to the array and go back to the workout page.
}
#Rest is not empty.
else {
  #Send the rest to test the input and strip characters from it.
  $percent8W2 = test_input($_POST['percent8W2']);

  #Make sure it is numeric.
  if (!is_numeric($percent8W2)) {
    #Invalid sport name.
    $_SESSION['addExerciseErrors'][] = 'Percent must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

######################### Validate Percentage 9 ####################################

#Check to make sure rest is entered.
if (empty($_POST['percent9W2'])) {
  #Add the error to the array and go back to the workout page.
}
#Rest is not empty.
else {
  #Send the rest to test the input and strip characters from it.
  $percent9W2 = test_input($_POST['percent9W2']);

  #Make sure it is numeric.
  if (!is_numeric($percent9W2)) {
    #Invalid sport name.
    $_SESSION['addExerciseErrors'][] = 'Percent must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

######################### Validate Percentage 10 ####################################

#Check to make sure rest is entered.
if (empty($_POST['percent10W2'])) {
  #Add the error to the array and go back to the workout page.
}
#Rest is not empty.
else {
  #Send the rest to test the input and strip characters from it.
  $percent10W2 = test_input($_POST['percent10W2']);

  #Make sure it is numeric.
  if (!is_numeric($percent10W2)) {
    #Invalid sport name.
    $_SESSION['addExerciseErrors'][] = 'Percent must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

######################## WEEK THREE ####################################
#########################Validate Percentage ####################################

#Check to make sure rest is entered.
if (empty($_POST['percent1W3'])) {
  #Add the error to the array and go back to the workout page.
}
#Rest is not empty.
else {
  #Send the rest to test the input and strip characters from it.
  $percent1W3 = test_input($_POST['percent1W3']);

  #Make sure it is numeric.
  if (!is_numeric($percent1W3)) {
    #Invalid sport name.
    $_SESSION['addExerciseErrors'][] = 'Percent must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

######################### Validate Percentage 2 ####################################

#Check to make sure rest is entered.
if (empty($_POST['percent2W3'])) {
  #Add the error to the array and go back to the workout page.
}
#Rest is not empty.
else {
  #Send the rest to test the input and strip characters from it.
  $percent2W3 = test_input($_POST['percent2W3']);

  #Make sure it is numeric.
  if (!is_numeric($percent2W3)) {
    #Invalid sport name.
    $_SESSION['addExerciseErrors'][] = 'Percent must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

######################### Validate Percentage 3 ####################################

#Check to make sure rest is entered.
if (empty($_POST['percent3W3'])) {
  #Add the error to the array and go back to the workout page.
}
#Rest is not empty.
else {
  #Send the rest to test the input and strip characters from it.
  $percent3W3 = test_input($_POST['percent3W3']);

  #Make sure it is numeric.
  if (!is_numeric($percent3W3)) {
    #Invalid sport name.
    $_SESSION['addExerciseErrors'][] = 'Percent must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

######################### Validate Percentage 4 ####################################

#Check to make sure rest is entered.
if (empty($_POST['percent4W3'])) {
  #Add the error to the array and go back to the workout page.
}
#Rest is not empty.
else {
  #Send the rest to test the input and strip characters from it.
  $percent4W3 = test_input($_POST['percent4W3']);

  #Make sure it is numeric.
  if (!is_numeric($percent4W3)) {
    #Invalid sport name.
    $_SESSION['addExerciseErrors'][] = 'Percent must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

######################### Validate Percentage 5 ####################################

#Check to make sure rest is entered.
if (empty($_POST['percent5W3'])) {
  #Add the error to the array and go back to the workout page.
}
#Rest is not empty.
else {
  #Send the rest to test the input and strip characters from it.
  $percent5W3 = test_input($_POST['percent5W3']);

  #Make sure it is numeric.
  if (!is_numeric($percent5W3)) {
    #Invalid sport name.
    $_SESSION['addExerciseErrors'][] = 'Percent must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

######################### Validate Percentage 6 ####################################

#Check to make sure rest is entered.
if (empty($_POST['percent6W3'])) {
  #Add the error to the array and go back to the workout page.
}
#Rest is not empty.
else {
  #Send the rest to test the input and strip characters from it.
  $percent6W3 = test_input($_POST['percent6W3']);

  #Make sure it is numeric.
  if (!is_numeric($percent6W3)) {
    #Invalid sport name.
    $_SESSION['addExerciseErrors'][] = 'Percent must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

######################### Validate Percentage 7 ####################################

#Check to make sure rest is entered.
if (empty($_POST['percent7W3'])) {
  #Add the error to the array and go back to the workout page.
}
#Rest is not empty.
else {
  #Send the rest to test the input and strip characters from it.
  $percent7W3 = test_input($_POST['percent7W3']);

  #Make sure it is numeric.
  if (!is_numeric($percent7W3)) {
    #Invalid sport name.
    $_SESSION['addExerciseErrors'][] = 'Percent must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

######################### Validate Percentage 8 ####################################

#Check to make sure rest is entered.
if (empty($_POST['percent8W3'])) {
  #Add the error to the array and go back to the workout page.
}
#Rest is not empty.
else {
  #Send the rest to test the input and strip characters from it.
  $percent8W3 = test_input($_POST['percent8W3']);

  #Make sure it is numeric.
  if (!is_numeric($percent8W3)) {
    #Invalid sport name.
    $_SESSION['addExerciseErrors'][] = 'Percent must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

######################### Validate Percentage 9 ####################################

#Check to make sure rest is entered.
if (empty($_POST['percent9W3'])) {
  #Add the error to the array and go back to the workout page.
}
#Rest is not empty.
else {
  #Send the rest to test the input and strip characters from it.
  $percent9W3 = test_input($_POST['percent9W3']);

  #Make sure it is numeric.
  if (!is_numeric($percent9W3)) {
    #Invalid sport name.
    $_SESSION['addExerciseErrors'][] = 'Percent must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

######################### Validate Percentage 10 ####################################

#Check to make sure rest is entered.
if (empty($_POST['percent10W3'])) {
  #Add the error to the array and go back to the workout page.
}
#Rest is not empty.
else {
  #Send the rest to test the input and strip characters from it.
  $percent10W3 = test_input($_POST['percent10W3']);

  #Make sure it is numeric.
  if (!is_numeric($percent10W3)) {
    #Invalid sport name.
    $_SESSION['addExerciseErrors'][] = 'Percent must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

######################## WEEK FOUR ####################################
#########################Validate Percentage ####################################

#Check to make sure rest is entered.
if (empty($_POST['percent1W4'])) {
  #Add the error to the array and go back to the workout page.
}
#Rest is not empty.
else {
  #Send the rest to test the input and strip characters from it.
  $percent1W4 = test_input($_POST['percent1W4']);

  #Make sure it is numeric.
  if (!is_numeric($percent1W4)) {
    #Invalid sport name.
    $_SESSION['addExerciseErrors'][] = 'Percent must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

######################### Validate Percentage 2 ####################################

#Check to make sure rest is entered.
if (empty($_POST['percent2W4'])) {
  #Add the error to the array and go back to the workout page.
}
#Rest is not empty.
else {
  #Send the rest to test the input and strip characters from it.
  $percent2W4 = test_input($_POST['percent2W4']);

  #Make sure it is numeric.
  if (!is_numeric($percent2W4)) {
    #Invalid sport name.
    $_SESSION['addExerciseErrors'][] = 'Percent must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

######################### Validate Percentage 3 ####################################

#Check to make sure rest is entered.
if (empty($_POST['percent3W4'])) {
  #Add the error to the array and go back to the workout page.
}
#Rest is not empty.
else {
  #Send the rest to test the input and strip characters from it.
  $percent3W4 = test_input($_POST['percent3W4']);

  #Make sure it is numeric.
  if (!is_numeric($percent3W4)) {
    #Invalid sport name.
    $_SESSION['addExerciseErrors'][] = 'Percent must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

######################### Validate Percentage 4 ####################################

#Check to make sure rest is entered.
if (empty($_POST['percent4W4'])) {
  #Add the error to the array and go back to the workout page.
}
#Rest is not empty.
else {
  #Send the rest to test the input and strip characters from it.
  $percent4W4 = test_input($_POST['percent4W4']);

  #Make sure it is numeric.
  if (!is_numeric($percent4W4)) {
    #Invalid sport name.
    $_SESSION['addExerciseErrors'][] = 'Percent must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

######################### Validate Percentage 5 ####################################

#Check to make sure rest is entered.
if (empty($_POST['percent5W4'])) {
  #Add the error to the array and go back to the workout page.
}
#Rest is not empty.
else {
  #Send the rest to test the input and strip characters from it.
  $percent5W4 = test_input($_POST['percent5W4']);

  #Make sure it is numeric.
  if (!is_numeric($percent5W4)) {
    #Invalid sport name.
    $_SESSION['addExerciseErrors'][] = 'Percent must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

######################### Validate Percentage 6 ####################################

#Check to make sure rest is entered.
if (empty($_POST['percent6W4'])) {
  #Add the error to the array and go back to the workout page.
}
#Rest is not empty.
else {
  #Send the rest to test the input and strip characters from it.
  $percent6W4 = test_input($_POST['percent6W4']);

  #Make sure it is numeric.
  if (!is_numeric($percent6W4)) {
    #Invalid sport name.
    $_SESSION['addExerciseErrors'][] = 'Percent must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

######################### Validate Percentage 7 ####################################

#Check to make sure rest is entered.
if (empty($_POST['percent7W4'])) {
  #Add the error to the array and go back to the workout page.
}
#Rest is not empty.
else {
  #Send the rest to test the input and strip characters from it.
  $percent7W4 = test_input($_POST['percent7W4']);

  #Make sure it is numeric.
  if (!is_numeric($percent7W4)) {
    #Invalid sport name.
    $_SESSION['addExerciseErrors'][] = 'Percent must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

######################### Validate Percentage 8 ####################################

#Check to make sure rest is entered.
if (empty($_POST['percent8W4'])) {
  #Add the error to the array and go back to the workout page.
}
#Rest is not empty.
else {
  #Send the rest to test the input and strip characters from it.
  $percent8W4 = test_input($_POST['percent8W4']);

  #Make sure it is numeric.
  if (!is_numeric($percent8W4)) {
    #Invalid sport name.
    $_SESSION['addExerciseErrors'][] = 'Percent must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

######################### Validate Percentage 9 ####################################

#Check to make sure rest is entered.
if (empty($_POST['percent9W4'])) {
  #Add the error to the array and go back to the workout page.
}
#Rest is not empty.
else {
  #Send the rest to test the input and strip characters from it.
  $percent9W4 = test_input($_POST['percent9W4']);

  #Make sure it is numeric.
  if (!is_numeric($percent9W4)) {
    #Invalid sport name.
    $_SESSION['addExerciseErrors'][] = 'Percent must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

######################### Validate Percentage 10 ####################################

#Check to make sure rest is entered.
if (empty($_POST['percent10W4'])) {
  #Add the error to the array and go back to the workout page.
}
#Rest is not empty.
else {
  #Send the rest to test the input and strip characters from it.
  $percent10W4 = test_input($_POST['percent10W4']);

  #Make sure it is numeric.
  if (!is_numeric($percent10W4)) {
    #Invalid sport name.
    $_SESSION['addExerciseErrors'][] = 'Percent must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################## WEEK ONE ####################################
####################Validate Assessment Name ####################################

#Make sure Assessment is selected.
if (empty($_POST['assessment1W1'])) {
  #Add the error to the array and go back to the workout page.
}

#sport is NOT empty.
else {
  #Make sure the assessment name is safe.
  $assessment1W1 = test_input($_POST['assessment1W1']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9 ]+$/', $assessment1W1)) {
    #The user name had something other than characters in it.
    $_SESSION['addExerciseErrors'][] = 'Only letters allowed in assessment name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

####################Validate Assessment Name 2####################################

#Make sure Assessment is selected.
if (empty($_POST['assessment2W1'])) {
  #Add the error to the array and go back to the workout page.
}

#sport is NOT empty.
else {
  #Make sure the assessment name is safe.
  $assessment2W1 = test_input($_POST['assessment2W1']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9 ]+$/', $assessment2W1)) {
    #The user name had something other than characters in it.
    $_SESSION['addExerciseErrors'][] = 'Only letters allowed in assessment name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

####################Validate Assessment Name 3####################################

#Make sure Assessment is selected.
if (empty($_POST['assessment3W1'])) {
  #Add the error to the array and go back to the workout page.
}

#sport is NOT empty.
else {
  #Make sure the assessment name is safe.
  $assessment3W1 = test_input($_POST['assessment3W1']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9 ]+$/', $assessment3W1)) {
    #The user name had something other than characters in it.
    $_SESSION['addExerciseErrors'][] = 'Only letters allowed in assessment name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

####################Validate Assessment Name 4####################################

#Make sure Assessment is selected.
if (empty($_POST['assessment4W1'])) {
  #Add the error to the array and go back to the workout page.
}

#sport is NOT empty.
else {
  #Make sure the assessment name is safe.
  $assessment4W1 = test_input($_POST['assessment4W1']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9 ]+$/', $assessment4W1)) {
    #The user name had something other than characters in it.
    $_SESSION['addExerciseErrors'][] = 'Only letters allowed in assessment name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

####################Validate Assessment Name 5####################################

#Make sure Assessment is selected.
if (empty($_POST['assessment5W1'])) {
  #Add the error to the array and go back to the workout page.
}

#sport is NOT empty.
else {
  #Make sure the assessment name is safe.
  $assessment5W1 = test_input($_POST['assessment5W1']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9 ]+$/', $assessment5W1)) {
    #The user name had something other than characters in it.
    $_SESSION['addExerciseErrors'][] = 'Only letters allowed in assessment name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

####################Validate Assessment Name 6####################################

#Make sure Assessment is selected.
if (empty($_POST['assessment6W1'])) {
  #Add the error to the array and go back to the workout page.
}

#sport is NOT empty.
else {
  #Make sure the assessment name is safe.
  $assessment6W1 = test_input($_POST['assessment6W1']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9 ]+$/', $assessment6W1)) {
    #The user name had something other than characters in it.
    $_SESSION['addExerciseErrors'][] = 'Only letters allowed in assessment name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

####################Validate Assessment Name 7####################################

#Make sure Assessment is selected.
if (empty($_POST['assessment7W1'])) {
  #Add the error to the array and go back to the workout page.
}

#sport is NOT empty.
else {
  #Make sure the assessment name is safe.
  $assessment7W1 = test_input($_POST['assessment7W1']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9 ]+$/', $assessment7W1)) {
    #The user name had something other than characters in it.
    $_SESSION['addExerciseErrors'][] = 'Only letters allowed in assessment name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

####################Validate Assessment Name 8####################################

#Make sure Assessment is selected.
if (empty($_POST['assessment8W1'])) {
  #Add the error to the array and go back to the workout page.
}

#sport is NOT empty.
else {
  #Make sure the assessment name is safe.
  $assessment8W1 = test_input($_POST['assessment8W1']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9 ]+$/', $assessment8W1)) {
    #The user name had something other than characters in it.
    $_SESSION['addExerciseErrors'][] = 'Only letters allowed in assessment name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

####################Validate Assessment Name 9####################################

#Make sure Assessment is selected.
if (empty($_POST['assessment9W1'])) {
  #Add the error to the array and go back to the workout page.
}

#sport is NOT empty.
else {
  #Make sure the assessment name is safe.
  $assessment9W1 = test_input($_POST['assessment9W1']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9 ]+$/', $assessment9W1)) {
    #The user name had something other than characters in it.
    $_SESSION['addExerciseErrors'][] = 'Only letters allowed in assessment name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

####################Validate Assessment Name 10####################################

#Make sure Assessment is selected.
if (empty($_POST['assessment10W1'])) {
  #Add the error to the array and go back to the workout page.
}

#sport is NOT empty.
else {
  #Make sure the assessment name is safe.
  $assessment10W1 = test_input($_POST['assessment10W1']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9 ]+$/', $assessment10W1)) {
    #The user name had something other than characters in it.
    $_SESSION['addExerciseErrors'][] = 'Only letters allowed in assessment name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################## WEEK TWO ####################################
####################Validate Assessment Name ####################################

#Make sure Assessment is selected.
if (empty($_POST['assessment1W2'])) {
  #Add the error to the array and go back to the workout page.
}

#sport is NOT empty.
else {
  #Make sure the assessment name is safe.
  $assessment1W2 = test_input($_POST['assessment1W2']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9 ]+$/', $assessment1W2)) {
    #The user name had something other than characters in it.
    $_SESSION['addExerciseErrors'][] = 'Only letters allowed in assessment name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

####################Validate Assessment Name 2####################################

#Make sure Assessment is selected.
if (empty($_POST['assessment2W2'])) {
  #Add the error to the array and go back to the workout page.
}

#sport is NOT empty.
else {
  #Make sure the assessment name is safe.
  $assessment2W2 = test_input($_POST['assessment2W2']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9 ]+$/', $assessment2W2)) {
    #The user name had something other than characters in it.
    $_SESSION['addExerciseErrors'][] = 'Only letters allowed in assessment name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

####################Validate Assessment Name 3####################################

#Make sure Assessment is selected.
if (empty($_POST['assessment3W2'])) {
  #Add the error to the array and go back to the workout page.
}

#sport is NOT empty.
else {
  #Make sure the assessment name is safe.
  $assessment3W2 = test_input($_POST['assessment3W2']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9 ]+$/', $assessment3W2)) {
    #The user name had something other than characters in it.
    $_SESSION['addExerciseErrors'][] = 'Only letters allowed in assessment name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

####################Validate Assessment Name 4####################################

#Make sure Assessment is selected.
if (empty($_POST['assessment4W2'])) {
  #Add the error to the array and go back to the workout page.
}

#sport is NOT empty.
else {
  #Make sure the assessment name is safe.
  $assessment4W2 = test_input($_POST['assessment4W2']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9 ]+$/', $assessment4W2)) {
    #The user name had something other than characters in it.
    $_SESSION['addExerciseErrors'][] = 'Only letters allowed in assessment name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

####################Validate Assessment Name 5####################################

#Make sure Assessment is selected.
if (empty($_POST['assessment5W2'])) {
  #Add the error to the array and go back to the workout page.
}

#sport is NOT empty.
else {
  #Make sure the assessment name is safe.
  $assessment5W2 = test_input($_POST['assessment5W2']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9 ]+$/', $assessment5W2)) {
    #The user name had something other than characters in it.
    $_SESSION['addExerciseErrors'][] = 'Only letters allowed in assessment name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

####################Validate Assessment Name 6####################################

#Make sure Assessment is selected.
if (empty($_POST['assessment6W2'])) {
  #Add the error to the array and go back to the workout page.
}

#sport is NOT empty.
else {
  #Make sure the assessment name is safe.
  $assessment6W2 = test_input($_POST['assessment6W2']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9 ]+$/', $assessment6W2)) {
    #The user name had something other than characters in it.
    $_SESSION['addExerciseErrors'][] = 'Only letters allowed in assessment name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

####################Validate Assessment Name 7####################################

#Make sure Assessment is selected.
if (empty($_POST['assessment7W2'])) {
  #Add the error to the array and go back to the workout page.
}

#sport is NOT empty.
else {
  #Make sure the assessment name is safe.
  $assessment7W2 = test_input($_POST['assessment7W2']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9 ]+$/', $assessment7W2)) {
    #The user name had something other than characters in it.
    $_SESSION['addExerciseErrors'][] = 'Only letters allowed in assessment name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

####################Validate Assessment Name 8####################################

#Make sure Assessment is selected.
if (empty($_POST['assessment8W2'])) {
  #Add the error to the array and go back to the workout page.
}

#sport is NOT empty.
else {
  #Make sure the assessment name is safe.
  $assessment8W2 = test_input($_POST['assessment8W2']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9 ]+$/', $assessment8W2)) {
    #The user name had something other than characters in it.
    $_SESSION['addExerciseErrors'][] = 'Only letters allowed in assessment name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

####################Validate Assessment Name 9####################################

#Make sure Assessment is selected.
if (empty($_POST['assessment9W2'])) {
  #Add the error to the array and go back to the workout page.
}

#sport is NOT empty.
else {
  #Make sure the assessment name is safe.
  $assessment9W2 = test_input($_POST['assessment9W2']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9 ]+$/', $assessment9W2)) {
    #The user name had something other than characters in it.
    $_SESSION['addExerciseErrors'][] = 'Only letters allowed in assessment name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

####################Validate Assessment Name 10####################################

#Make sure Assessment is selected.
if (empty($_POST['assessment10W2'])) {
  #Add the error to the array and go back to the workout page.
}

#sport is NOT empty.
else {
  #Make sure the assessment name is safe.
  $assessment10W2 = test_input($_POST['assessment10W2']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9 ]+$/', $assessment10W2)) {
    #The user name had something other than characters in it.
    $_SESSION['addExerciseErrors'][] = 'Only letters allowed in assessment name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################## WEEK THREE ####################################
####################Validate Assessment Name ####################################

#Make sure Assessment is selected.
if (empty($_POST['assessment1W3'])) {
  #Add the error to the array and go back to the workout page.
}

#sport is NOT empty.
else {
  #Make sure the assessment name is safe.
  $assessment1W3 = test_input($_POST['assessment1W3']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9 ]+$/', $assessment1W3)) {
    #The user name had something other than characters in it.
    $_SESSION['addExerciseErrors'][] = 'Only letters allowed in assessment name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

####################Validate Assessment Name 2####################################

#Make sure Assessment is selected.
if (empty($_POST['assessment2W3'])) {
  #Add the error to the array and go back to the workout page.
}

#sport is NOT empty.
else {
  #Make sure the assessment name is safe.
  $assessment2W3 = test_input($_POST['assessment2W3']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9 ]+$/', $assessment2W3)) {
    #The user name had something other than characters in it.
    $_SESSION['addExerciseErrors'][] = 'Only letters allowed in assessment name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

####################Validate Assessment Name 3####################################

#Make sure Assessment is selected.
if (empty($_POST['assessment3W3'])) {
  #Add the error to the array and go back to the workout page.
}

#sport is NOT empty.
else {
  #Make sure the assessment name is safe.
  $assessment3W3 = test_input($_POST['assessment3W3']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9 ]+$/', $assessment3W3)) {
    #The user name had something other than characters in it.
    $_SESSION['addExerciseErrors'][] = 'Only letters allowed in assessment name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

####################Validate Assessment Name 4####################################

#Make sure Assessment is selected.
if (empty($_POST['assessment4W3'])) {
  #Add the error to the array and go back to the workout page.
}

#sport is NOT empty.
else {
  #Make sure the assessment name is safe.
  $assessment4W3 = test_input($_POST['assessment4W3']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9 ]+$/', $assessment4W3)) {
    #The user name had something other than characters in it.
    $_SESSION['addExerciseErrors'][] = 'Only letters allowed in assessment name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

####################Validate Assessment Name 5####################################

#Make sure Assessment is selected.
if (empty($_POST['assessment5W3'])) {
  #Add the error to the array and go back to the workout page.
}

#sport is NOT empty.
else {
  #Make sure the assessment name is safe.
  $assessment5W3 = test_input($_POST['assessment5W3']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9 ]+$/', $assessment5W3)) {
    #The user name had something other than characters in it.
    $_SESSION['addExerciseErrors'][] = 'Only letters allowed in assessment name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

####################Validate Assessment Name 6####################################

#Make sure Assessment is selected.
if (empty($_POST['assessment6W3'])) {
  #Add the error to the array and go back to the workout page.
}

#sport is NOT empty.
else {
  #Make sure the assessment name is safe.
  $assessment6W3 = test_input($_POST['assessment6W3']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9 ]+$/', $assessment6W3)) {
    #The user name had something other than characters in it.
    $_SESSION['addExerciseErrors'][] = 'Only letters allowed in assessment name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

####################Validate Assessment Name 7####################################

#Make sure Assessment is selected.
if (empty($_POST['assessment7W3'])) {
  #Add the error to the array and go back to the workout page.
}

#sport is NOT empty.
else {
  #Make sure the assessment name is safe.
  $assessment7W3 = test_input($_POST['assessment7W3']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9 ]+$/', $assessment7W3)) {
    #The user name had something other than characters in it.
    $_SESSION['addExerciseErrors'][] = 'Only letters allowed in assessment name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

####################Validate Assessment Name 8####################################

#Make sure Assessment is selected.
if (empty($_POST['assessment8W3'])) {
  #Add the error to the array and go back to the workout page.
}

#sport is NOT empty.
else {
  #Make sure the assessment name is safe.
  $assessment8W3 = test_input($_POST['assessment8W3']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9 ]+$/', $assessment8W3)) {
    #The user name had something other than characters in it.
    $_SESSION['addExerciseErrors'][] = 'Only letters allowed in assessment name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

####################Validate Assessment Name 9####################################

#Make sure Assessment is selected.
if (empty($_POST['assessment9W3'])) {
  #Add the error to the array and go back to the workout page.
}

#sport is NOT empty.
else {
  #Make sure the assessment name is safe.
  $assessment9W3 = test_input($_POST['assessment9W3']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9 ]+$/', $assessment9W3)) {
    #The user name had something other than characters in it.
    $_SESSION['addExerciseErrors'][] = 'Only letters allowed in assessment name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

####################Validate Assessment Name 10####################################

#Make sure Assessment is selected.
if (empty($_POST['assessment10W3'])) {
  #Add the error to the array and go back to the workout page.
}

#sport is NOT empty.
else {
  #Make sure the assessment name is safe.
  $assessment10W3 = test_input($_POST['assessment10W3']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9 ]+$/', $assessment10W3)) {
    #The user name had something other than characters in it.
    $_SESSION['addExerciseErrors'][] = 'Only letters allowed in assessment name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################## WEEK FOUR ####################################
####################Validate Assessment Name ################################

#Make sure Assessment is selected.
if (empty($_POST['assessment1W4'])) {
  #Add the error to the array and go back to the workout page.
}

#sport is NOT empty.
else {
  #Make sure the assessment name is safe.
  $assessment1W4 = test_input($_POST['assessment1W4']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9 ]+$/', $assessment1W4)) {
    #The user name had something other than characters in it.
    $_SESSION['addExerciseErrors'][] = 'Only letters allowed in assessment name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

####################Validate Assessment Name 2####################################

#Make sure Assessment is selected.
if (empty($_POST['assessment2W4'])) {
  #Add the error to the array and go back to the workout page.
}

#sport is NOT empty.
else {
  #Make sure the assessment name is safe.
  $assessment2W4 = test_input($_POST['assessment2W4']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9 ]+$/', $assessment2W4)) {
    #The user name had something other than characters in it.
    $_SESSION['addExerciseErrors'][] = 'Only letters allowed in assessment name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

####################Validate Assessment Name 3####################################

#Make sure Assessment is selected.
if (empty($_POST['assessment3W4'])) {
  #Add the error to the array and go back to the workout page.
}

#sport is NOT empty.
else {
  #Make sure the assessment name is safe.
  $assessment3W4 = test_input($_POST['assessment3W4']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9 ]+$/', $assessment3W4)) {
    #The user name had something other than characters in it.
    $_SESSION['addExerciseErrors'][] = 'Only letters allowed in assessment name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

####################Validate Assessment Name 4####################################

#Make sure Assessment is selected.
if (empty($_POST['assessment4W4'])) {
  #Add the error to the array and go back to the workout page.
}

#sport is NOT empty.
else {
  #Make sure the assessment name is safe.
  $assessment4W4 = test_input($_POST['assessment4W4']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9 ]+$/', $assessment4W4)) {
    #The user name had something other than characters in it.
    $_SESSION['addExerciseErrors'][] = 'Only letters allowed in assessment name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

####################Validate Assessment Name 5####################################

#Make sure Assessment is selected.
if (empty($_POST['assessment5W4'])) {
  #Add the error to the array and go back to the workout page.
}

#sport is NOT empty.
else {
  #Make sure the assessment name is safe.
  $assessment5W4 = test_input($_POST['assessment5W4']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9 ]+$/', $assessment5W4)) {
    #The user name had something other than characters in it.
    $_SESSION['addExerciseErrors'][] = 'Only letters allowed in assessment name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

####################Validate Assessment Name 6####################################

#Make sure Assessment is selected.
if (empty($_POST['assessment6W4'])) {
  #Add the error to the array and go back to the workout page.
}

#sport is NOT empty.
else {
  #Make sure the assessment name is safe.
  $assessment6W4 = test_input($_POST['assessment6W4']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9 ]+$/', $assessment6W4)) {
    #The user name had something other than characters in it.
    $_SESSION['addExerciseErrors'][] = 'Only letters allowed in assessment name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

####################Validate Assessment Name 7####################################

#Make sure Assessment is selected.
if (empty($_POST['assessment7W4'])) {
  #Add the error to the array and go back to the workout page.
}

#sport is NOT empty.
else {
  #Make sure the assessment name is safe.
  $assessment7W4 = test_input($_POST['assessment7W4']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9 ]+$/', $assessment7W4)) {
    #The user name had something other than characters in it.
    $_SESSION['addExerciseErrors'][] = 'Only letters allowed in assessment name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

####################Validate Assessment Name 8####################################

#Make sure Assessment is selected.
if (empty($_POST['assessment8W4'])) {
  #Add the error to the array and go back to the workout page.
}

#sport is NOT empty.
else {
  #Make sure the assessment name is safe.
  $assessment8W4 = test_input($_POST['assessment8W4']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9 ]+$/', $assessment8W4)) {
    #The user name had something other than characters in it.
    $_SESSION['addExerciseErrors'][] = 'Only letters allowed in assessment name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

####################Validate Assessment Name 9####################################

#Make sure Assessment is selected.
if (empty($_POST['assessment9W4'])) {
  #Add the error to the array and go back to the workout page.
}

#sport is NOT empty.
else {
  #Make sure the assessment name is safe.
  $assessment9W4 = test_input($_POST['assessment9W4']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9 ]+$/', $assessment9W4)) {
    #The user name had something other than characters in it.
    $_SESSION['addExerciseErrors'][] = 'Only letters allowed in assessment name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

####################Validate Assessment Name 10####################################

#Make sure Assessment is selected.
if (empty($_POST['assessment10W4'])) {
  #Add the error to the array and go back to the workout page.
}

#sport is NOT empty.
else {
  #Make sure the assessment name is safe.
  $assessment10W4 = test_input($_POST['assessment10W4']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9 ]+$/', $assessment10W4)) {
    #The user name had something other than characters in it.
    $_SESSION['addExerciseErrors'][] = 'Only letters allowed in assessment name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################## WEEK ONE ####################################
############################Validate Rest###################################

#Is rest empty???
if (empty($_POST['restW1'])) {
  $_SESSION['addExerciseErrors'][] = 'Rest is required';

  if ($_SESSION['myPermission'] == 'Trainer') {
    header('location: ../trainer/createWorkoutTrainers.php');
  }
}

#Guess its not empty.
else {
  #Make sure the rest is safe.
  $restW1 = test_input($_POST['restW1']);

  #Make sure its a valid number.
  if (!is_numeric($restW1)) {
    #Invalid intensity.
    $_SESSION['addExerciseErrors'][] = 'Rest must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################## WEEK TWO ####################################
############################Validate Rest###################################

#Is rest empty???
if (empty($_POST['restW2'])) {
}

#Guess its not empty.
else {
  #Make sure the rest is safe.
  $restW2 = test_input($_POST['restW2']);

  #Make sure its a valid number.
  if (!is_numeric($restW2)) {
    #Invalid intensity.
    $_SESSION['addExerciseErrors'][] = 'Rest must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################## WEEK THREE ##################################
############################Validate Rest###################################

#Is rest empty???
if (empty($_POST['restW3'])) {
}

#Guess its not empty.
else {
  #Make sure the rest is safe.
  $restW3 = test_input($_POST['restW3']);

  #Make sure its a valid number.
  if (!is_numeric($restW3)) {
    #Invalid intensity.
    $_SESSION['addExerciseErrors'][] = 'Rest must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################## WEEK FOUR ###################################
############################Validate Rest###################################

#Is rest empty???
if (empty($_POST['restW4'])) {
}

#Guess its not empty.
else {
  #Make sure the rest is safe.
  $restW4 = test_input($_POST['restW4']);

  #Make sure its a valid number.
  if (!is_numeric($restW4)) {
    #Invalid intensity.
    $_SESSION['addExerciseErrors'][] = 'Rest must be numeric';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################## WEEK ONE ########################################
#########################Validate Tempo#########################################

#Check to make sure a tempo is entered.
if (empty($_POST['tempoW1'])) {
}

#Tempo is entered.
else {
  #Make sure tempo is safe.
  $tempoW1 = test_input($_POST['tempoW1']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9- ]+$/', $tempoW1)) {
    #Invalid tempo
    $_SESSION['addExerciseErrors'][] = 'Tempo in incorrect format';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################## WEEK TWO ########################################
#########################Validate Tempo#########################################

#Check to make sure a tempo is entered.
if (empty($_POST['tempoW2'])) {
}

#Tempo is entered.
else {
  #Make sure tempo is safe.
  $tempoW2 = test_input($_POST['tempoW2']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9- ]+$/', $tempoW2)) {
    #Invalid tempo
    $_SESSION['addExerciseErrors'][] = 'Tempo in incorrect format';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################## WEEK THREE ######################################
#########################Validate Tempo#########################################

#Check to make sure a tempo is entered.
if (empty($_POST['tempoW3'])) {
}

#Tempo is entered.
else {
  #Make sure tempo is safe.
  $tempoW3 = test_input($_POST['tempoW3']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9- ]+$/', $tempoW3)) {
    #Invalid tempo
    $_SESSION['addExerciseErrors'][] = 'Tempo in incorrect format';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

############################## WEEK FOUR #######################################
#########################Validate Tempo#########################################

#Check to make sure a tempo is entered.
if (empty($_POST['tempoW4'])) {
}

#Tempo is entered.
else {
  #Make sure tempo is safe.
  $tempoW4 = test_input($_POST['tempoW4']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9- ]+$/', $tempoW4)) {
    #Invalid tempo
    $_SESSION['addExerciseErrors'][] = 'Tempo in incorrect format';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createWorkoutTrainers.php');
    }
  }
}

#######################PREVENT HACKERS!!!!###########################################

#PREVENT SQL Injection and XSS!!!!!!!!!
function test_input($input) {
  #trip white space
  $input = trim($input);

  #Remove all forward and backward slashes.
  $input = stripslashes($input);

  #Turn html code into safe letters.
  $input = htmlspecialchars($input);

  return $input;
}

#If there were any errors go back to the workout page.
if (count($_SESSION['addExerciseErrors']) > 0) {
  header("location: ../trainer/createWorkoutTrainers.php");
} else {
  unset($_SESSION['addExerciseErrors']);

  $macroName     = mysqli_real_escape_string($connection, $workoutName);
  $orderBy       = mysqli_real_escape_string($connection, $order);
  $exerciseToAdd = mysqli_real_escape_string($connection, $exercises);

  $numSetsW1 = mysqli_real_escape_string($connection, $setsW1);
  $numSetsW2 = mysqli_real_escape_string($connection, $setsW2);
  $numSetsW3 = mysqli_real_escape_string($connection, $setsW3);
  $numSetsW4 = mysqli_real_escape_string($connection, $setsW4);

  $numReps1W1  = mysqli_real_escape_string($connection, $reps1W1);
  $numReps2W1  = mysqli_real_escape_string($connection, $reps2W1);
  $numReps3W1  = mysqli_real_escape_string($connection, $reps3W1);
  $numReps4W1  = mysqli_real_escape_string($connection, $reps4W1);
  $numReps5W1  = mysqli_real_escape_string($connection, $reps5W1);
  $numReps6W1  = mysqli_real_escape_string($connection, $reps6W1);
  $numReps7W1  = mysqli_real_escape_string($connection, $reps7W1);
  $numReps8W1  = mysqli_real_escape_string($connection, $reps8W1);
  $numReps9W1  = mysqli_real_escape_string($connection, $reps9W1);
  $numReps10W1 = mysqli_real_escape_string($connection, $reps10W1);

  $numReps1W2  = mysqli_real_escape_string($connection, $reps1W2);
  $numReps2W2  = mysqli_real_escape_string($connection, $reps2W2);
  $numReps3W2  = mysqli_real_escape_string($connection, $reps3W2);
  $numReps4W2  = mysqli_real_escape_string($connection, $reps4W2);
  $numReps5W2  = mysqli_real_escape_string($connection, $reps5W2);
  $numReps6W2  = mysqli_real_escape_string($connection, $reps6W2);
  $numReps7W2  = mysqli_real_escape_string($connection, $reps7W2);
  $numReps8W2  = mysqli_real_escape_string($connection, $reps8W2);
  $numReps9W2  = mysqli_real_escape_string($connection, $reps9W2);
  $numReps10W2 = mysqli_real_escape_string($connection, $reps10W2);

  $numReps1W3  = mysqli_real_escape_string($connection, $reps1W3);
  $numReps2W3  = mysqli_real_escape_string($connection, $reps2W3);
  $numReps3W3  = mysqli_real_escape_string($connection, $reps3W3);
  $numReps4W3  = mysqli_real_escape_string($connection, $reps4W3);
  $numReps5W3  = mysqli_real_escape_string($connection, $reps5W3);
  $numReps6W3  = mysqli_real_escape_string($connection, $reps6W3);
  $numReps7W3  = mysqli_real_escape_string($connection, $reps7W3);
  $numReps8W3  = mysqli_real_escape_string($connection, $reps8W3);
  $numReps9W3  = mysqli_real_escape_string($connection, $reps9W3);
  $numReps10W3 = mysqli_real_escape_string($connection, $reps10W3);

  $numReps1W4  = mysqli_real_escape_string($connection, $reps1W4);
  $numReps2W4  = mysqli_real_escape_string($connection, $reps2W4);
  $numReps3W4  = mysqli_real_escape_string($connection, $reps3W4);
  $numReps4W4  = mysqli_real_escape_string($connection, $reps4W4);
  $numReps5W4  = mysqli_real_escape_string($connection, $reps5W4);
  $numReps6W4  = mysqli_real_escape_string($connection, $reps6W4);
  $numReps7W4  = mysqli_real_escape_string($connection, $reps7W4);
  $numReps8W4  = mysqli_real_escape_string($connection, $reps8W4);
  $numReps9W4  = mysqli_real_escape_string($connection, $reps9W4);
  $numReps10W4 = mysqli_real_escape_string($connection, $reps10W4);

  $intensityAmt1W1  = mysqli_real_escape_string($connection, $intensity1W1);
  $intensityAmt2W1  = mysqli_real_escape_string($connection, $intensity2W1);
  $intensityAmt3W1  = mysqli_real_escape_string($connection, $intensity3W1);
  $intensityAmt4W1  = mysqli_real_escape_string($connection, $intensity4W1);
  $intensityAmt5W1  = mysqli_real_escape_string($connection, $intensity5W1);
  $intensityAmt6W1  = mysqli_real_escape_string($connection, $intensity6W1);
  $intensityAmt7W1  = mysqli_real_escape_string($connection, $intensity7W1);
  $intensityAmt8W1  = mysqli_real_escape_string($connection, $intensity8W1);
  $intensityAmt9W1  = mysqli_real_escape_string($connection, $intensity9W1);
  $intensityAmt10W1 = mysqli_real_escape_string($connection, $intensity10W1);

  $intensityAmt1W2  = mysqli_real_escape_string($connection, $intensity1W2);
  $intensityAmt2W2  = mysqli_real_escape_string($connection, $intensity2W2);
  $intensityAmt3W2  = mysqli_real_escape_string($connection, $intensity3W2);
  $intensityAmt4W2  = mysqli_real_escape_string($connection, $intensity4W2);
  $intensityAmt5W2  = mysqli_real_escape_string($connection, $intensity5W2);
  $intensityAmt6W2  = mysqli_real_escape_string($connection, $intensity6W2);
  $intensityAmt7W2  = mysqli_real_escape_string($connection, $intensity7W2);
  $intensityAmt8W2  = mysqli_real_escape_string($connection, $intensity8W2);
  $intensityAmt9W2  = mysqli_real_escape_string($connection, $intensity9W2);
  $intensityAmt10W2 = mysqli_real_escape_string($connection, $intensity10W2);

  $intensityAmt1W3  = mysqli_real_escape_string($connection, $intensity1W3);
  $intensityAmt2W3  = mysqli_real_escape_string($connection, $intensity2W3);
  $intensityAmt3W3  = mysqli_real_escape_string($connection, $intensity3W3);
  $intensityAmt4W3  = mysqli_real_escape_string($connection, $intensity4W3);
  $intensityAmt5W3  = mysqli_real_escape_string($connection, $intensity5W3);
  $intensityAmt6W3  = mysqli_real_escape_string($connection, $intensity6W3);
  $intensityAmt7W3  = mysqli_real_escape_string($connection, $intensity7W3);
  $intensityAmt8W3  = mysqli_real_escape_string($connection, $intensity8W3);
  $intensityAmt9W3  = mysqli_real_escape_string($connection, $intensity9W3);
  $intensityAmt10W3 = mysqli_real_escape_string($connection, $intensity10W3);

  $intensityAmt1W4  = mysqli_real_escape_string($connection, $intensity1W4);
  $intensityAmt2W4  = mysqli_real_escape_string($connection, $intensity2W4);
  $intensityAmt3W4  = mysqli_real_escape_string($connection, $intensity3W4);
  $intensityAmt4W4  = mysqli_real_escape_string($connection, $intensity4W4);
  $intensityAmt5W4  = mysqli_real_escape_string($connection, $intensity5W4);
  $intensityAmt6W4  = mysqli_real_escape_string($connection, $intensity6W4);
  $intensityAmt7W4  = mysqli_real_escape_string($connection, $intensity7W4);
  $intensityAmt8W4  = mysqli_real_escape_string($connection, $intensity8W4);
  $intensityAmt9W4  = mysqli_real_escape_string($connection, $intensity9W4);
  $intensityAmt10W4 = mysqli_real_escape_string($connection, $intensity10W4);

  $percentAmt1W1  = mysqli_real_escape_string($connection, $percent1W1);
  $percentAmt2W1  = mysqli_real_escape_string($connection, $percent2W1);
  $percentAmt3W1  = mysqli_real_escape_string($connection, $percent3W1);
  $percentAmt4W1  = mysqli_real_escape_string($connection, $percent4W1);
  $percentAmt5W1  = mysqli_real_escape_string($connection, $percent5W1);
  $percentAmt6W1  = mysqli_real_escape_string($connection, $percent6W1);
  $percentAmt7W1  = mysqli_real_escape_string($connection, $percent7W1);
  $percentAmt8W1  = mysqli_real_escape_string($connection, $percent8W1);
  $percentAmt9W1  = mysqli_real_escape_string($connection, $percent9W1);
  $percentAmt10W1 = mysqli_real_escape_string($connection, $percent10W1);

  $percentAmt1W2  = mysqli_real_escape_string($connection, $percent1W2);
  $percentAmt2W2  = mysqli_real_escape_string($connection, $percent2W2);
  $percentAmt3W2  = mysqli_real_escape_string($connection, $percent3W2);
  $percentAmt4W2  = mysqli_real_escape_string($connection, $percent4W2);
  $percentAmt5W2  = mysqli_real_escape_string($connection, $percent5W2);
  $percentAmt6W2  = mysqli_real_escape_string($connection, $percent6W2);
  $percentAmt7W2  = mysqli_real_escape_string($connection, $percent7W2);
  $percentAmt8W2  = mysqli_real_escape_string($connection, $percent8W2);
  $percentAmt9W2  = mysqli_real_escape_string($connection, $percent9W2);
  $percentAmt10W2 = mysqli_real_escape_string($connection, $percent10W2);

  $percentAmt1W3  = mysqli_real_escape_string($connection, $percent1W3);
  $percentAmt2W3  = mysqli_real_escape_string($connection, $percent2W3);
  $percentAmt3W3  = mysqli_real_escape_string($connection, $percent3W3);
  $percentAmt4W3  = mysqli_real_escape_string($connection, $percent4W3);
  $percentAmt5W3  = mysqli_real_escape_string($connection, $percent5W3);
  $percentAmt6W3  = mysqli_real_escape_string($connection, $percent6W3);
  $percentAmt7W3  = mysqli_real_escape_string($connection, $percent7W3);
  $percentAmt8W3  = mysqli_real_escape_string($connection, $percent8W3);
  $percentAmt9W3  = mysqli_real_escape_string($connection, $percent9W3);
  $percentAmt10W3 = mysqli_real_escape_string($connection, $percent10W3);

  $percentAmt1W4  = mysqli_real_escape_string($connection, $percent1W4);
  $percentAmt2W4  = mysqli_real_escape_string($connection, $percent2W4);
  $percentAmt3W4  = mysqli_real_escape_string($connection, $percent3W4);
  $percentAmt4W4  = mysqli_real_escape_string($connection, $percent4W4);
  $percentAmt5W4  = mysqli_real_escape_string($connection, $percent5W4);
  $percentAmt6W4  = mysqli_real_escape_string($connection, $percent6W4);
  $percentAmt7W4  = mysqli_real_escape_string($connection, $percent7W4);
  $percentAmt8W4  = mysqli_real_escape_string($connection, $percent8W4);
  $percentAmt9W4  = mysqli_real_escape_string($connection, $percent9W4);
  $percentAmt10W4 = mysqli_real_escape_string($connection, $percent10W4);

  $assessmentToAdd1W1  = mysqli_real_escape_string($connection, $assessment1W1);
  $assessmentToAdd2W1  = mysqli_real_escape_string($connection, $assessment2W1);
  $assessmentToAdd3W1  = mysqli_real_escape_string($connection, $assessment3W1);
  $assessmentToAdd4W1  = mysqli_real_escape_string($connection, $assessment4W1);
  $assessmentToAdd5W1  = mysqli_real_escape_string($connection, $assessment5W1);
  $assessmentToAdd6W1  = mysqli_real_escape_string($connection, $assessment6W1);
  $assessmentToAdd7W1  = mysqli_real_escape_string($connection, $assessment7W1);
  $assessmentToAdd8W1  = mysqli_real_escape_string($connection, $assessment8W1);
  $assessmentToAdd9W1  = mysqli_real_escape_string($connection, $assessment9W1);
  $assessmentToAdd10W1 = mysqli_real_escape_string($connection, $assessment10W1);

  $assessmentToAdd1W2  = mysqli_real_escape_string($connection, $assessment1W2);
  $assessmentToAdd2W2  = mysqli_real_escape_string($connection, $assessment2W2);
  $assessmentToAdd3W2  = mysqli_real_escape_string($connection, $assessment3W2);
  $assessmentToAdd4W2  = mysqli_real_escape_string($connection, $assessment4W2);
  $assessmentToAdd5W2  = mysqli_real_escape_string($connection, $assessment5W2);
  $assessmentToAdd6W2  = mysqli_real_escape_string($connection, $assessment6W2);
  $assessmentToAdd7W2  = mysqli_real_escape_string($connection, $assessment7W2);
  $assessmentToAdd8W2  = mysqli_real_escape_string($connection, $assessment8W2);
  $assessmentToAdd9W2  = mysqli_real_escape_string($connection, $assessment9W2);
  $assessmentToAdd10W2 = mysqli_real_escape_string($connection, $assessment10W2);

  $assessmentToAdd1W3  = mysqli_real_escape_string($connection, $assessment1W3);
  $assessmentToAdd2W3  = mysqli_real_escape_string($connection, $assessment2W3);
  $assessmentToAdd3W3  = mysqli_real_escape_string($connection, $assessment3W3);
  $assessmentToAdd4W3  = mysqli_real_escape_string($connection, $assessment4W3);
  $assessmentToAdd5W3  = mysqli_real_escape_string($connection, $assessment5W3);
  $assessmentToAdd6W3  = mysqli_real_escape_string($connection, $assessment6W3);
  $assessmentToAdd7W3  = mysqli_real_escape_string($connection, $assessment7W3);
  $assessmentToAdd8W3  = mysqli_real_escape_string($connection, $assessment8W3);
  $assessmentToAdd9W3  = mysqli_real_escape_string($connection, $assessment9W3);
  $assessmentToAdd10W3 = mysqli_real_escape_string($connection, $assessment10W3);

  $assessmentToAdd1W4  = mysqli_real_escape_string($connection, $assessment1W4);
  $assessmentToAdd2W4  = mysqli_real_escape_string($connection, $assessment2W4);
  $assessmentToAdd3W4  = mysqli_real_escape_string($connection, $assessment3W4);
  $assessmentToAdd4W4  = mysqli_real_escape_string($connection, $assessment4W4);
  $assessmentToAdd5W4  = mysqli_real_escape_string($connection, $assessment5W4);
  $assessmentToAdd6W4  = mysqli_real_escape_string($connection, $assessment6W4);
  $assessmentToAdd7W4  = mysqli_real_escape_string($connection, $assessment7W4);
  $assessmentToAdd8W4  = mysqli_real_escape_string($connection, $assessment8W4);
  $assessmentToAdd9W4  = mysqli_real_escape_string($connection, $assessment9W4);
  $assessmentToAdd10W4 = mysqli_real_escape_string($connection, $assessment10W4);

  $restPeriodW1 = mysqli_real_escape_string($connection, $restW1);
  $restPeriodW2 = mysqli_real_escape_string($connection, $restW2);
  $restPeriodW3 = mysqli_real_escape_string($connection, $restW3);
  $restPeriodW4 = mysqli_real_escape_string($connection, $restW4);

  $tempoAmtW1 = mysqli_real_escape_string($connection, $tempoW1);
  $tempoAmtW2 = mysqli_real_escape_string($connection, $tempoW2);
  $tempoAmtW3 = mysqli_real_escape_string($connection, $tempoW3);
  $tempoAmtW4 = mysqli_real_escape_string($connection, $tempoW4);

  $whosWorkout = $_SESSION['myUsername'];

  ####################### CALCULATE THE WEIGHT 1  BY PERCENT FOR WEEK ONE ###########################################
  if (isset($_POST['assessment1W1'])) {
    $query = "select Score from assessmentRecord where exercise = '$exerciseToAdd' and Fname = '$athleteToAdd' and assessmentType = '$assessmentToAdd1W1' ORDER BY AssessmentIndex DESC
LIMIT 1";

    $results1W1 = mysqli_query($connection, $query);

    $answer1W1 = mysqli_fetch_assoc($results1W1);

    $result1W1 = $answer1W1['Score'];

    $result1W1 = $result1W1 * $percentAmt1W1 / 100;

    $result1W1 = round($result1W1 / 5) * 5;
  }

  ####################### CALCULATE THE WEIGHT 1 BY PERCENT FOR WEEK TWO ###########################################
  if (isset($_POST['assessment1W2'])) {
    $query = "select Score from assessmentRecord where exercise = '$exerciseToAdd' and Fname = '$athleteToAdd' and assessmentType = '$assessmentToAdd1W2' ORDER BY AssessmentIndex DESC
LIMIT 1";

    $results1W2 = mysqli_query($connection, $query);

    $answer1W2 = mysqli_fetch_assoc($results1W2);

    $result1W2 = $answer1W2['Score'];

    $result1W2 = $result1W2 * $percentAmt1W2 / 100;

    $result1W2 = round($result1W2 / 5) * 5;
  }

  ####################### CALCULATE THE WEIGHT 1 BY PERCENT FOR WEEK THREE ###########################################
  if (isset($_POST['assessment1W3'])) {
    $query = "select Score from assessmentRecord where exercise = '$exerciseToAdd' and Fname = '$athleteToAdd' and assessmentType = '$assessmentToAdd1W3' ORDER BY AssessmentIndex DESC
LIMIT 1";

    $results1W3 = mysqli_query($connection, $query);

    $answer1W3 = mysqli_fetch_assoc($results1W3);

    $result1W3 = $answer1W3['Score'];

    $result1W3 = $result1W3 * $percentAmt1W3 / 100;

    $result1W3 = round($result1W3 / 5) * 5;
  }

  ####################### CALCULATE THE WEIGHT 1 BY PERCENT FOR WEEK FOUR ###########################################
  if (isset($_POST['assessment1W4'])) {
    $query = "select Score from assessmentRecord where exercise = '$exerciseToAdd' and Fname = '$athleteToAdd' and assessmentType = '$assessmentToAdd1W4' ORDER BY AssessmentIndex DESC
LIMIT 1";

    $results1W4 = mysqli_query($connection, $query);

    $answer1W4 = mysqli_fetch_assoc($results1W4);

    $result1W4 = $answer1W4['Score'];

    $result1W4 = $result1W4 * $percentAmt1W4 / 100;

    $result1W4 = round($result1W4 / 5) * 5;
  }

  ####################### CALCULATE THE WEIGHT 2 BY PERCENT FOR WEEK ONE ###########################################
  if (isset($_POST['assessment2W1'])) {
    $query = "select Score from assessmentRecord where exercise = '$exerciseToAdd' and Fname = '$athleteToAdd' and assessmentType = '$assessmentToAdd2W1' ORDER BY AssessmentIndex DESC
LIMIT 1";

    $results2W1 = mysqli_query($connection, $query);

    $answer2W1 = mysqli_fetch_assoc($results2W1);

    $result2W1 = $answer2W1['Score'];

    $result2W1 = $result2W1 * $percentAmt2W1 / 100;

    $result2W1 = round($result2W1 / 5) * 5;
  }

  ####################### CALCULATE THE WEIGHT 2 BY PERCENT FOR WEEK TWO ###########################################
  if (isset($_POST['assessment2W2'])) {
    $query = "select Score from assessmentRecord where exercise = '$exerciseToAdd' and Fname = '$athleteToAdd' and assessmentType = '$assessmentToAdd2W2' ORDER BY AssessmentIndex DESC
LIMIT 1";

    $results2W2 = mysqli_query($connection, $query);

    $answer2W2 = mysqli_fetch_assoc($results2W2);

    $result2W2 = $answer2W2['Score'];

    $result2W2 = $result2W2 * $percentAmt2W2 / 100;

    $result2W2 = round($result2W2 / 5) * 5;
  }

  ####################### CALCULATE THE WEIGHT 2 BY PERCENT FOR WEEK THREE ###########################################
  if (isset($_POST['assessment2W3'])) {
    $query = "select Score from assessmentRecord where exercise = '$exerciseToAdd' and Fname = '$athleteToAdd' and assessmentType = '$assessmentToAdd2W3' ORDER BY AssessmentIndex DESC
LIMIT 1";

    $results2W3 = mysqli_query($connection, $query);

    $answer2W3 = mysqli_fetch_assoc($results2W3);

    $result2W3 = $answer2W3['Score'];

    $result2W3 = $result2W3 * $percentAmt2W3 / 100;

    $result2W3 = round($result2W3 / 5) * 5;
  }

  ####################### CALCULATE THE WEIGHT 2 BY PERCENT FOR WEEK FOUR ###########################################
  if (isset($_POST['assessment2W4'])) {
    $query = "select Score from assessmentRecord where exercise = '$exerciseToAdd' and Fname = '$athleteToAdd' and assessmentType = '$assessmentToAdd2W4' ORDER BY AssessmentIndex DESC
LIMIT 1";

    $results2W4 = mysqli_query($connection, $query);

    $answer2W4 = mysqli_fetch_assoc($results2W4);

    $result2W4 = $answer2W4['Score'];

    $result2W4 = $result2W4 * $percentAmt2W4 / 100;

    $result2W4 = round($result2W4 / 5) * 5;
  }

  ####################### CALCULATE THE WEIGHT 3 BY PERCENT FOR WEEK ONE ###########################################
  if (isset($_POST['assessment3W1'])) {
    $query = "select Score from assessmentRecord where exercise = '$exerciseToAdd' and Fname = '$athleteToAdd' and assessmentType = '$assessmentToAdd3W1' ORDER BY AssessmentIndex DESC
LIMIT 1";

    $results3W1 = mysqli_query($connection, $query);

    $answer3W1 = mysqli_fetch_assoc($results3W1);

    $result3W1 = $answer3W1['Score'];

    $result3W1 = $result3W1 * $percentAmt3W1 / 100;

    $result3W1 = round($result3W1 / 5) * 5;
  }

  ####################### CALCULATE THE WEIGHT 3 BY PERCENT FOR WEEK TWO ###########################################
  if (isset($_POST['assessment3W2'])) {
    $query = "select Score from assessmentRecord where exercise = '$exerciseToAdd' and Fname = '$athleteToAdd' and assessmentType = '$assessmentToAdd3W2' ORDER BY AssessmentIndex DESC
LIMIT 1";

    $results3W2 = mysqli_query($connection, $query);

    $answer3W2 = mysqli_fetch_assoc($results3W2);

    $result3W2 = $answer3W2['Score'];

    $result3W2 = $result3W2 * $percentAmt3W2 / 100;

    $result3W2 = round($result3W2 / 5) * 5;
  }

  ####################### CALCULATE THE WEIGHT 3 BY PERCENT FOR WEEK THREE ###########################################
  if (isset($_POST['assessment3W3'])) {
    $query = "select Score from assessmentRecord where exercise = '$exerciseToAdd' and Fname = '$athleteToAdd' and assessmentType = '$assessmentToAdd3W3' ORDER BY AssessmentIndex DESC
LIMIT 1";

    $results3W3 = mysqli_query($connection, $query);

    $answer3W3 = mysqli_fetch_assoc($results3W3);

    $result3W3 = $answer3W3['Score'];

    $result3W3 = $result3W3 * $percentAmt3W3 / 100;

    $result3W3 = round($result3W3 / 5) * 5;
  }

  ####################### CALCULATE THE WEIGHT 3 BY PERCENT FOR WEEK FOUR ###########################################
  if (isset($_POST['assessment3W4'])) {
    $query = "select Score from assessmentRecord where exercise = '$exerciseToAdd' and Fname = '$athleteToAdd' and assessmentType = '$assessmentToAdd3W4' ORDER BY AssessmentIndex DESC
LIMIT 1";

    $results3W4 = mysqli_query($connection, $query);

    $answer3W4 = mysqli_fetch_assoc($results3W4);

    $result3W4 = $answer3W4['Score'];

    $result3W4 = $result3W4 * $percentAmt3W4 / 100;

    $result3W4 = round($result3W4 / 5) * 5;
  }

  ####################### CALCULATE THE WEIGHT 4 BY PERCENT FOR WEEK ONE ###########################################
  if (isset($_POST['assessment4W1'])) {
    $query = "select Score from assessmentRecord where exercise = '$exerciseToAdd' and Fname = '$athleteToAdd' and assessmentType = '$assessmentToAdd4W1' ORDER BY AssessmentIndex DESC
LIMIT 1";

    $results4W1 = mysqli_query($connection, $query);

    $answer4W1 = mysqli_fetch_assoc($results4W1);

    $result4W1 = $answer4W1['Score'];

    $result4W1 = $result4W1 * $percentAmt4W1 / 100;

    $result4W1 = round($result4W1 / 5) * 5;
  }

  ####################### CALCULATE THE WEIGHT 4 BY PERCENT FOR WEEK TWO ###########################################
  if (isset($_POST['assessment4W2'])) {
    $query = "select Score from assessmentRecord where exercise = '$exerciseToAdd' and Fname = '$athleteToAdd' and assessmentType = '$assessmentToAdd4W2' ORDER BY AssessmentIndex DESC
LIMIT 1";

    $results4W2 = mysqli_query($connection, $query);

    $answer4W2 = mysqli_fetch_assoc($results4W2);

    $result4W2 = $answer4W2['Score'];

    $result4W2 = $result4W2 * $percentAmt4W2 / 100;

    $result4W2 = round($result4W2 / 5) * 5;
  }

  ####################### CALCULATE THE WEIGHT 4 BY PERCENT FOR WEEK THREE ###########################################
  if (isset($_POST['assessment4W3'])) {
    $query = "select Score from assessmentRecord where exercise = '$exerciseToAdd' and Fname = '$athleteToAdd' and assessmentType = '$assessmentToAdd4W3' ORDER BY AssessmentIndex DESC
LIMIT 1";

    $results4W3 = mysqli_query($connection, $query);

    $answer4W3 = mysqli_fetch_assoc($results4W3);

    $result4W3 = $answer4W3['Score'];

    $result4W3 = $result4W3 * $percentAmt4W3 / 100;

    $result4W3 = round($result4W3 / 5) * 5;
  }

  ####################### CALCULATE THE WEIGHT 4 BY PERCENT FOR WEEK FOUR ###########################################
  if (isset($_POST['assessment4W4'])) {
    $query = "select Score from assessmentRecord where exercise = '$exerciseToAdd' and Fname = '$athleteToAdd' and assessmentType = '$assessmentToAdd4W4' ORDER BY AssessmentIndex DESC
LIMIT 1";

    $results4W4 = mysqli_query($connection, $query);

    $answer4W4 = mysqli_fetch_assoc($results4W4);

    $result4W4 = $answer4W4['Score'];

    $result4W4 = $result4W4 * $percentAmt4W4 / 100;

    $result4W4 = round($result4W4 / 5) * 5;
  }

  ####################### CALCULATE THE WEIGHT 5 BY PERCENT FOR WEEK ONE ###########################################
  if (isset($_POST['assessment5W1'])) {
    $query = "select Score from assessmentRecord where exercise = '$exerciseToAdd' and Fname = '$athleteToAdd' and assessmentType = '$assessmentToAdd5W1' ORDER BY AssessmentIndex DESC
LIMIT 1";

    $results5W1 = mysqli_query($connection, $query);

    $answer5W1 = mysqli_fetch_assoc($results5W1);

    $result5W1 = $answer5W1['Score'];

    $result5W1 = $result5W1 * $percentAmt5W1 / 100;

    $result5W1 = round($result5W1 / 5) * 5;
  }

  ####################### CALCULATE THE WEIGHT 5 BY PERCENT FOR WEEK TWO ###########################################
  if (isset($_POST['assessment5W2'])) {
    $query = "select Score from assessmentRecord where exercise = '$exerciseToAdd' and Fname = '$athleteToAdd' and assessmentType = '$assessmentToAdd5W2' ORDER BY AssessmentIndex DESC
LIMIT 1";

    $results5W2 = mysqli_query($connection, $query);

    $answer5W2 = mysqli_fetch_assoc($results5W2);

    $result5W2 = $answer5W['Score'];

    $result5W2 = $result5W2 * $percentAmt5W2 / 100;

    $result5W2 = round($result5W2 / 5) * 5;
  }

  ####################### CALCULATE THE WEIGHT 5 BY PERCENT FOR WEEK THREE ###########################################
  if (isset($_POST['assessment5W3'])) {
    $query = "select Score from assessmentRecord where exercise = '$exerciseToAdd' and Fname = '$athleteToAdd' and assessmentType = '$assessmentToAdd5W3' ORDER BY AssessmentIndex DESC
LIMIT 1";

    $results5W3 = mysqli_query($connection, $query);

    $answer5W3 = mysqli_fetch_assoc($results5W3);

    $result5W3 = $answer5W3['Score'];

    $result5W3 = $result5W3 * $percentAmt5W3 / 100;

    $result5W3 = round($result5W3 / 5) * 5;
  }

  ####################### CALCULATE THE WEIGHT 5 BY PERCENT FOR WEEK FOUR ###########################################
  if (isset($_POST['assessment5W4'])) {
    $query = "select Score from assessmentRecord where exercise = '$exerciseToAdd' and Fname = '$athleteToAdd' and assessmentType = '$assessmentToAdd5W4' ORDER BY AssessmentIndex DESC
LIMIT 1";

    $results5W4 = mysqli_query($connection, $query);

    $answer5W4 = mysqli_fetch_assoc($results5W4);

    $result5W4 = $answer5W4['Score'];

    $result5W4 = $result5W4 * $percentAmt5W4 / 100;

    $result5W4 = round($result5W4 / 5) * 5;
  }

  ####################### CALCULATE THE WEIGHT 6 BY PERCENT FOR WEEK ONE ###########################################
  if (isset($_POST['assessment6W1'])) {
    $query = "select Score from assessmentRecord where exercise = '$exerciseToAdd' and Fname = '$athleteToAdd' and assessmentType = '$assessmentToAdd6W1' ORDER BY AssessmentIndex DESC
LIMIT 1";

    $results6W1 = mysqli_query($connection, $query);

    $answer6W1 = mysqli_fetch_assoc($results6W1);

    $result6W1 = $answer6W1['Score'];

    $result6W1 = $result6W1 * $percentAmt6W1 / 100;

    $result6W1 = round($result6W1 / 5) * 5;
  }

  ####################### CALCULATE THE WEIGHT 6 BY PERCENT FOR WEEK TWO ###########################################
  if (isset($_POST['assessment6W2'])) {
    $query = "select Score from assessmentRecord where exercise = '$exerciseToAdd' and Fname = '$athleteToAdd' and assessmentType = '$assessmentToAdd6W2' ORDER BY AssessmentIndex DESC
LIMIT 1";

    $results6W2 = mysqli_query($connection, $query);

    $answer6W2 = mysqli_fetch_assoc($results6W2);

    $result6W2 = $answer6W2['Score'];

    $result6W2 = $result6W2 * $percentAmt6W2 / 100;

    $result6W2 = round($result6W2 / 5) * 5;
  }

  ####################### CALCULATE THE WEIGHT 6 BY PERCENT FOR WEEK THREE ###########################################
  if (isset($_POST['assessment6W3'])) {
    $query = "select Score from assessmentRecord where exercise = '$exerciseToAdd' and Fname = '$athleteToAdd' and assessmentType = '$assessmentToAdd6W3' ORDER BY AssessmentIndex DESC
LIMIT 1";

    $results6W3 = mysqli_query($connection, $query);

    $answer6W3 = mysqli_fetch_assoc($results6W3);

    $result6W3 = $answer6W3['Score'];

    $result6W3 = $result6W3 * $percentAmt6W3 / 100;

    $result6W3 = round($result6W3 / 5) * 5;
  }

  ####################### CALCULATE THE WEIGHT 6 BY PERCENT FOR WEEK FOUR ###########################################
  if (isset($_POST['assessment6W4'])) {
    $query = "select Score from assessmentRecord where exercise = '$exerciseToAdd' and Fname = '$athleteToAdd' and assessmentType = '$assessmentToAdd6W4' ORDER BY AssessmentIndex DESC
LIMIT 1";

    $results6W4 = mysqli_query($connection, $query);

    $answer6W4 = mysqli_fetch_assoc($results6W4);

    $result6W4 = $answer6W4['Score'];

    $result6W4 = $result6W4 * $percentAmt6W4 / 100;

    $result6W4 = round($result6W4 / 5) * 5;
  }

  ####################### CALCULATE THE WEIGHT 7 BY PERCENT FOR WEEK ONE ###########################################
  if (isset($_POST['assessment7W1'])) {
    $query = "select Score from assessmentRecord where exercise = '$exerciseToAdd' and Fname = '$athleteToAdd' and assessmentType = '$assessmentToAdd7W1' ORDER BY AssessmentIndex DESC
LIMIT 1";

    $results7W1 = mysqli_query($connection, $query);

    $answer7W1 = mysqli_fetch_assoc($results7W1);

    $result7W1 = $answer7W1['Score'];

    $result7W1 = $result7W1 * $percentAmt7W1 / 100;

    $result7W1 = round($result7W1 / 5) * 5;
  }

  ####################### CALCULATE THE WEIGHT 7 BY PERCENT FOR WEEK TWO ###########################################
  if (isset($_POST['assessment7W2'])) {
    $query = "select Score from assessmentRecord where exercise = '$exerciseToAdd' and Fname = '$athleteToAdd' and assessmentType = '$assessmentToAdd7W2' ORDER BY AssessmentIndex DESC
LIMIT 1";

    $results7W2 = mysqli_query($connection, $query);

    $answer7W2 = mysqli_fetch_assoc($results7W2);

    $result7W2 = $answer7W2['Score'];

    $result7W2 = $result7W2 * $percentAmt7W2 / 100;

    $result7W2 = round($result7W2 / 5) * 5;
  }

  ####################### CALCULATE THE WEIGHT 7 BY PERCENT FOR WEEK THREE ###########################################
  if (isset($_POST['assessment7W3'])) {
    $query = "select Score from assessmentRecord where exercise = '$exerciseToAdd' and Fname = '$athleteToAdd' and assessmentType = '$assessmentToAdd7W3' ORDER BY AssessmentIndex DESC
LIMIT 1";

    $results7W3 = mysqli_query($connection, $query);

    $answer7W3 = mysqli_fetch_assoc($results7W3);

    $result7W3 = $answer7W3['Score'];

    $result7W3 = $result7W3 * $percentAmt7W3 / 100;

    $result7W3 = round($result7W3 / 5) * 5;
  }

  ####################### CALCULATE THE WEIGHT 7 BY PERCENT FOR WEEK FOUR ###########################################
  if (isset($_POST['assessment7W4'])) {
    $query = "select Score from assessmentRecord where exercise = '$exerciseToAdd' and Fname = '$athleteToAdd' and assessmentType = '$assessmentToAdd7W4' ORDER BY AssessmentIndex DESC
LIMIT 1";

    $results7W4 = mysqli_query($connection, $query);

    $answer7W4 = mysqli_fetch_assoc($results7W4);

    $result7W4 = $answer7W4['Score'];

    $result7W4 = $result7W4 * $percentAmt7W4 / 100;

    $result7W4 = round($result7W4 / 5) * 5;
  }

  ####################### CALCULATE THE WEIGHT 8 BY PERCENT FOR WEEK ONE ###########################################
  if (isset($_POST['assessment8W1'])) {
    $query = "select Score from assessmentRecord where exercise = '$exerciseToAdd' and Fname = '$athleteToAdd' and assessmentType = '$assessmentToAdd8W1' ORDER BY AssessmentIndex DESC
LIMIT 1";

    $results8W1 = mysqli_query($connection, $query);

    $answer8W1 = mysqli_fetch_assoc($results8W1);

    $result8W1 = $answer8W1['Score'];

    $result8W1 = $result8W1 * $percentAmt8W1 / 100;

    $result8W1 = round($result8W1 / 5) * 5;
  }

  ####################### CALCULATE THE WEIGHT 8 BY PERCENT FOR WEEK TWO ###########################################
  if (isset($_POST['assessment8W2'])) {
    $query = "select Score from assessmentRecord where exercise = '$exerciseToAdd' and Fname = '$athleteToAdd' and assessmentType = '$assessmentToAdd8W2' ORDER BY AssessmentIndex DESC
LIMIT 1";

    $results8W2 = mysqli_query($connection, $query);

    $answer8W2 = mysqli_fetch_assoc($results8W2);

    $result8W2 = $answer8W2['Score'];

    $result8W2 = $result8W2 * $percentAmt8W2 / 100;

    $result8W2 = round($result8W2 / 5) * 5;
  }

  ####################### CALCULATE THE WEIGHT 8 BY PERCENT FOR WEEK THREE ###########################################
  if (isset($_POST['assessment8W3'])) {
    $query = "select Score from assessmentRecord where exercise = '$exerciseToAdd' and Fname = '$athleteToAdd' and assessmentType = '$assessmentToAdd8W3' ORDER BY AssessmentIndex DESC
LIMIT 1";

    $results8W3 = mysqli_query($connection, $query);

    $answer8W3 = mysqli_fetch_assoc($results8W3);

    $result8W3 = $answer8W3['Score'];

    $result8W3 = $result8W3 * $percentAmt8W3 / 100;

    $result8W3 = round($result8W3 / 5) * 5;
  }

  ####################### CALCULATE THE WEIGHT 8 BY PERCENT FOR WEEK FOUR ###########################################
  if (isset($_POST['assessment8W4'])) {
    $query = "select Score from assessmentRecord where exercise = '$exerciseToAdd' and Fname = '$athleteToAdd' and assessmentType = '$assessmentToAdd8W4' ORDER BY AssessmentIndex DESC
LIMIT 1";

    $results8W4 = mysqli_query($connection, $query);

    $answer8W4 = mysqli_fetch_assoc($results8W4);

    $result8W4 = $answer8W4['Score'];

    $result8W4 = $result8W4 * $percentAmt8W4 / 100;

    $result8W4 = round($result8W4 / 5) * 5;
  }

  ####################### CALCULATE THE WEIGHT 9 BY PERCENT FOR WEEK ONE ###########################################
  if (isset($_POST['assessment9W1'])) {
    $query = "select Score from assessmentRecord where exercise = '$exerciseToAdd' and Fname = '$athleteToAdd' and assessmentType = '$assessmentToAdd9W1' ORDER BY AssessmentIndex DESC
LIMIT 1";

    $results9W1 = mysqli_query($connection, $query);

    $answer9W1 = mysqli_fetch_assoc($results9W1);

    $result9W1 = $answer9W1['Score'];

    $result9W1 = $result9W1 * $percentAmt9W1 / 100;

    $result9W1 = round($result9W1 / 5) * 5;
  }

  ####################### CALCULATE THE WEIGHT 9 BY PERCENT FOR WEEK TWO ###########################################
  if (isset($_POST['assessment9W2'])) {
    $query = "select Score from assessmentRecord where exercise = '$exerciseToAdd' and Fname = '$athleteToAdd' and assessmentType = '$assessmentToAdd9W2' ORDER BY AssessmentIndex DESC
LIMIT 1";

    $results9W2 = mysqli_query($connection, $query);

    $answer9W2 = mysqli_fetch_assoc($results9W2);

    $result9W2 = $answer9W2['Score'];

    $result9W2 = $result9W2 * $percentAmt9W2 / 100;

    $result9W2 = round($result9W2 / 5) * 5;
  }

  ####################### CALCULATE THE WEIGHT 9 BY PERCENT FOR WEEK THREE ###########################################
  if (isset($_POST['assessment9W3'])) {
    $query = "select Score from assessmentRecord where exercise = '$exerciseToAdd' and Fname = '$athleteToAdd' and assessmentType = '$assessmentToAdd9W3' ORDER BY AssessmentIndex DESC
LIMIT 1";

    $results9W3 = mysqli_query($connection, $query);

    $answer9W3 = mysqli_fetch_assoc($results9W3);

    $result9W3 = $answer9W3['Score'];

    $result9W3 = $result9W3 * $percentAmt9W3 / 100;

    $result9W3 = round($result9W3 / 5) * 5;
  }

  ####################### CALCULATE THE WEIGHT 9 BY PERCENT FOR WEEK FOUR ###########################################
  if (isset($_POST['assessment9W4'])) {
    $query = "select Score from assessmentRecord where exercise = '$exerciseToAdd' and Fname = '$athleteToAdd' and assessmentType = '$assessmentToAdd9W4' ORDER BY AssessmentIndex DESC
LIMIT 1";

    $results9W4 = mysqli_query($connection, $query);

    $answer9W4 = mysqli_fetch_assoc($results9W4);

    $result9W4 = $answer9W4['Score'];

    $result9W4 = $result9W4 * $percentAmt9W4 / 100;

    $result9W4 = round($result9W4 / 5) * 5;
  }

  ####################### CALCULATE THE WEIGHT 10 BY PERCENT FOR WEEK ONE ###########################################
  if (isset($_POST['assessment10W1'])) {
    $query = "select Score from assessmentRecord where exercise = '$exerciseToAdd' and Fname = '$athleteToAdd' and assessmentType = '$assessmentToAdd10W1' ORDER BY AssessmentIndex DESC
LIMIT 1";

    $results10W1 = mysqli_query($connection, $query);

    $answer10W1 = mysqli_fetch_assoc($results10W1);

    $result10W1 = $answer10W1['Score'];

    $result10W1 = $result10W1 * $percentAmt10W1 / 100;

    $result10W1 = round($result10W1 / 5) * 5;
  }

  ####################### CALCULATE THE WEIGHT 10 BY PERCENT FOR WEEK TWO ###########################################
  if (isset($_POST['assessment10W2'])) {
    $query = "select Score from assessmentRecord where exercise = '$exerciseToAdd' and Fname = '$athleteToAdd' and assessmentType = '$assessmentToAdd10W2' ORDER BY AssessmentIndex DESC
LIMIT 1";

    $results10W2 = mysqli_query($connection, $query);

    $answer10W2 = mysqli_fetch_assoc($results10W2);

    $result10W2 = $answer10W2['Score'];

    $result10W2 = $result10W2 * $percentAmt10W2 / 100;

    $result10W2 = round($result10W2 / 5) * 5;
  }

  ####################### CALCULATE THE WEIGHT 10 BY PERCENT FOR WEEK THREE ###########################################
  if (isset($_POST['assessment10W3'])) {
    $query = "select Score from assessmentRecord where exercise = '$exerciseToAdd' and Fname = '$athleteToAdd' and assessmentType = '$assessmentToAdd10W3' ORDER BY AssessmentIndex DESC
LIMIT 1";

    $results10W3 = mysqli_query($connection, $query);

    $answer10W3 = mysqli_fetch_assoc($results10W3);

    $result10W3 = $answer10W3['Score'];

    $result10W3 = $result10W3 * $percentAmt10W3 / 100;

    $result10W3 = round($result10W3 / 5) * 5;
  }

  ####################### CALCULATE THE WEIGHT 10 BY PERCENT FOR WEEK FOUR ###########################################
  if (isset($_POST['assessment10W4'])) {
    $query = "select Score from assessmentRecord where exercise = '$exerciseToAdd' and Fname = '$athleteToAdd' and assessmentType = '$assessmentToAdd10W4' ORDER BY AssessmentIndex DESC
LIMIT 1";

    $results10W4 = mysqli_query($connection, $query);

    $answer10W4 = mysqli_fetch_assoc($results10W4);

    $result10W4 = $answer10W4['Score'];

    $result10W4 = $result10W4 * $percentAmt10W4 / 100;

    $result10W4 = round($result10W4 / 5) * 5;
  }

  $sql = "insert into `" . $macroName . "` (macroName, exerciseOrder, exerciseName, comment, setsW1, setsW2, setsW3, setsW4, reps1W1, reps2W1, reps3W1, reps4W1, reps5W1, reps6W1, reps7W1, reps8W1, reps9W1, reps10W1, reps1W2, reps2W2, reps3W2, reps4W2, reps5W2, reps6W2, reps7W2, reps8W2, reps9W2, reps10W2, reps1W3, reps2W3, reps3W3, reps4W3, reps5W3, reps6W3, reps7W3, reps8W3, reps9W3, reps10W3, reps1W4, reps2W4, reps3W4, reps4W4, reps5W4, reps6W4, reps7W4, reps8W4, reps9W4, reps10W4, intensity1W1, intensity2W1, intensity3W1, intensity4W1, intensity5W1, intensity6W1, intensity7W1, intensity8W1, intensity9W1, intensity10W1, intensity1W2, intensity2W2, intensity3W2, intensity4W2, intensity5W2, intensity6W2, intensity7W2, intensity8W2, intensity9W2, intensity10W2, intensity1W3, intensity2W3, intensity3W3, intensity4W3, intensity5W3, intensity6W3, intensity7W3, intensity8W3, intensity9W3, intensity10W3, intensity1W4, intensity2W4, intensity3W4, intensity4W4, intensity5W4, intensity6W4, intensity7W4, intensity8W4, intensity9W4, intensity10W4, percentage1W1, percentage2W1, percentage3W1, percentage4W1, percentage5W1, percentage6W1, percentage7W1, percentage8W1, percentage9W1, percentage10W1, percentage1W2, percentage2W2, percentage3W2, percentage4W2, percentage5W2, percentage6W2, percentage7W2, percentage8W2, percentage9W2, percentage10W2, percentage1W3, percentage2W3, percentage3W3, percentage4W3, percentage5W3, percentage6W3, percentage7W3, percentage8W3, percentage9W3, percentage10W3, percentage1W4, percentage2W4, percentage3W4, percentage4W4, percentage5W4, percentage6W4, percentage7W4, percentage8W4, percentage9W4, percentage10W4, assessment1W1, assessment2W1, assessment3W1, assessment4W1, assessment5W1, assessment6W1, assessment7W1, assessment8W1, assessment9W1, assessment10W1, assessment1W2, assessment2W2, assessment3W2, assessment4W2, assessment5W2, assessment6W2, assessment7W2, assessment8W2, assessment9W2, assessment10W2, assessment1W3, assessment2W3, assessment3W3, assessment4W3, assessment5W3, assessment6W3, assessment7W3, assessment8W3, assessment9W3, assessment10W3, assessment1W4, assessment2W4, assessment3W4, assessment4W4, assessment5W4, assessment6W4, assessment7W4, assessment8W4, assessment9W4, assessment10W4, restW1, restW2, restW3, restW4, tempoW1, tempoW2, tempoW3, tempoW4, calcWeight1W1, calcWeight2W1, calcWeight3W1, calcWeight4W1, calcWeight5W1, calcWeight6W1, calcWeight7W1, calcWeight8W1, calcWeight9W1, calcWeight10W1, calcWeight1W2, calcWeight2W2, calcWeight3W2, calcWeight4W2, calcWeight5W2, calcWeight6W2, calcWeight7W2, calcWeight8W2, calcWeight9W2, calcWeight10W2, calcWeight1W3, calcWeight2W3, calcWeight3W3, calcWeight4W3, calcWeight5W3, calcWeight6W3, calcWeight7W3, calcWeight8W3, calcWeight9W3, calcWeight10W3, calcWeight1W4, calcWeight2W4, calcWeight3W4, calcWeight4W4, calcWeight5W4, calcWeight6W4, calcWeight7W4, calcWeight8W4, calcWeight9W4, calcWeight10W4, whosWorkout) values ('$macroName', '$orderBy', '$exerciseToAdd', '$comment', '$numSetsW1', '$numSetsW2', '$numSetsW3', '$numSetsW4', '$numReps1W1', '$numReps2W1', '$numReps3W1', '$numReps4W1', '$numReps5W1', '$numReps6W1', '$numReps7W1', '$numReps8W1', '$numReps9W1', '$numReps10W1', '$numReps1W2', '$numReps2W2', '$numReps3W2', '$numReps4W2', '$numReps5W2', '$numReps6W2', '$numReps7W2', '$numReps8W2', '$numReps9W2', '$numReps10W2', '$numReps1W3', '$numReps2W3', '$numReps3W3', '$numReps4W3', '$numReps5W3', '$numReps6W3', '$numReps7W3', '$numReps8W3', '$numReps9W3', '$numReps10W3', '$numReps1W4', '$numReps2W4', '$numReps3W4', '$numReps4W4', '$numReps5W4', '$numReps6W4', '$numReps7W4', '$numReps8W4', '$numReps9W4', '$numReps10W4', '$intensityAmt1W1', '$intensityAmt2W1', '$intensityAmt3W1', '$intensityAmt4W1', '$intensityAmt5W1', '$intensityAmt6W1', '$intensityAmt7W1', '$intensityAmt8W1', '$intensityAmt9W1', '$intensityAmt10W1', '$intensityAmt1W2', '$intensityAmt2W2', '$intensityAmt3W2', '$intensityAmt4W2', '$intensityAmt5W2', '$intensityAmt6W2', '$intensityAmt7W2', '$intensityAmt8W2', '$intensityAmt9W2', '$intensityAmt10W2', '$intensityAmt1W3', '$intensityAmt2W3', '$intensityAmt3W3', '$intensityAmt4W3', '$intensityAmt5W3', '$intensityAmt6W3', '$intensityAmt7W3', '$intensityAmt8W3', '$intensityAmt9W3', '$intensityAmt10W3', '$intensityAmt1W4', '$intensityAmt2W4', '$intensityAmt3W4', '$intensityAmt4W4', '$intensityAmt5W4', '$intensityAmt6W4', '$intensityAmt7W4', '$intensityAmt8W4', '$intensityAmt9W4', '$intensityAmt10W4', '$percentAmt1W1', '$percentAmt2W1', '$percentAmt3W1', '$percentAmt4W1', '$percentAmt5W1', '$percentAmt6W1', '$percentAmt7W1', '$percentAmt8W1', '$percentAmt9W1', '$percentAmt10W1', '$percentAmt1W2', '$percentAmt2W2', '$percentAmt3W2', '$percentAmt4W2', '$percentAmt5W2', '$percentAmt6W2', '$percentAmt7W2', '$percentAmt8W2', '$percentAmt9W2', '$percentAmt10W2', '$percentAmt1W3', '$percentAmt2W3', '$percentAmt3W3', '$percentAmt4W3', '$percentAmt5W3', '$percentAmt6W3', '$percentAmt7W3', '$percentAmt8W3', '$percentAmt9W3', '$percentAmt10W3', '$percentAmt1W4', '$percentAmt2W4', '$percentAmt3W4', '$percentAmt4W4', '$percentAmt5W4', '$percentAmt6W4', '$percentAmt7W4', '$percentAmt8W4', '$percentAmt9W4', '$percentAmt10W4', '$assessmentToAdd1W1', '$assessmentToAdd2W1', '$assessmentToAdd3W1', '$assessmentToAdd4W1', '$assessmentToAdd5W1', '$assessmentToAdd6W1', '$assessmentToAdd7W1', '$assessmentToAdd8W1', '$assessmentToAdd9W1', '$assessmentToAdd10W1', '$assessmentToAdd1W2', '$assessmentToAdd2W2', '$assessmentToAdd3W2', '$assessmentToAdd4W2', '$assessmentToAdd5W2', '$assessmentToAdd6W2', '$assessmentToAdd7W2', '$assessmentToAdd8W2', '$assessmentToAdd9W2', '$assessmentToAdd10W2', '$assessmentToAdd1W3', '$assessmentToAdd2W3', '$assessmentToAdd3W3', '$assessmentToAdd4W3', '$assessmentToAdd5W3', '$assessmentToAdd6W3', '$assessmentToAdd7W3', '$assessmentToAdd8W3', '$assessmentToAdd9W3', '$assessmentToAdd10W3', '$assessmentToAdd1W4', '$assessmentToAdd2W4', '$assessmentToAdd3W4', '$assessmentToAdd4W4', '$assessmentToAdd5W4', '$assessmentToAdd6W4', '$assessmentToAdd7W4', '$assessmentToAdd8W4', '$assessmentToAdd9W4', '$assessmentToAdd10W4', '$restPeriodW1', '$restPeriodW2', '$restPeriodW3', '$restPeriodW4', '$tempoAmtW1', '$tempoAmtW2', '$tempoAmtW3', '$tempoAmtW4', '$result1W1', '$result2W1', '$result3W1', '$result4W1', '$result5W1', '$result6W1', '$result7W1', '$result8W1', '$result9W1', '$result10W1', '$result1W2', '$result2W2', '$result3W2', '$result4W2', '$result5W2', '$result6W2', '$result7W2', '$result8W2', '$result9W2', '$result10W2', '$result1W3', '$result2W3', '$result3W3', '$result4W3', '$result5W3', '$result6W3', '$result7W3', '$result8W3', '$result9W3', '$result10W3', '$result1W4', '$result2W4', '$result3W4', '$result4W4', '$result5W4', '$result6W4', '$result7W4', '$result8W4', '$result9W4', '$result10W4', '$whosWorkout')";

  if (mysqli_query($connection, $sql)) {
    if ($_SESSION['myPermission'] == 'Trainer') {
      echo "<script>
              alert('Exercise Added');
              window.location.href='../trainer/createWorkoutTrainers.php';
              </script>";
    }

  } else {
    if ($_SESSION['myPermission'] == 'Trainer') {
      echo "<script>
              alert('Add exercise failed');
              window.location.href='../trainer/createWorkoutTrainers.php';
              </script>";
    }
  }
}

?>
