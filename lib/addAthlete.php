<?php

include '../lib/connect.php';

session_start();

#Set new variables to empty strings so we can get the POST
#data and then strip it and set it to these variables.
$user      = '';
$pass      = '';
$email     = '';
$sport     = '';
$firstName = '';
$lastName  = '';
$height    = 0;
$weight    = 0;

#Session variable to see if they are submitting the form.
$_SESSION['addAthleteAttempt'] = true;

#If there were currently any errors reset them.
if (isset($_SESSION['addAthleteErrors'])) {
  unset($_SESSION['addAthleteErrors']);
}

#Create an array of errors.
$_SESSION['addAthleteErrors'] = array();

####################Validate Username####################################

#Check that the username for the athlete is not blank.
if (empty($_POST['newUsername'])) {
  #Add the error to the array and go back to the athletes page.
  $_SESSION['addAthleteErrors'][] = 'Username is required';

  if ($_SESSION['myPermission'] == 'Trainer') {
    header('location: ../trainer/trainersAthletes.php');
  }
}

#username is not empty.
else {
  #Send the username to test the input and strip characters from it.
  $user = test_input($_POST['newUsername']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9]+$/', $user)) {
    #The user name had something other than characters in it.
    $_SESSION['addAthleteErrors'][] = 'Only letters allowed in username';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/trainersAthletes.php');
    }
  }
}

############################Validate Password##############################

#Check that the password is not empty.
if (empty($_POST['userPassword'])) {
  #Add the error to the array and go back to the athletes page.
  $_SESSION['addAthleteErrors'][] = 'Password is required';

  if ($_SESSION['myPermission'] == 'Trainer') {
    header('location: ../trainer/trainersAthletes.php');
  }
}

#Password was entered.
else {
  #Send the password to test the input and strip characters from it.
  $pass = test_input($_POST['userPassword']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9]+$/', $pass)) {
    #The password had something other than letters.
    $_SESSION['addAthleteErrors'][] = 'Only letters allowed in password';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/trainersAthletes.php');
    }
  }
}

##################################Validate First Name###########################

#Check that the first name is not empty.
if (empty($_POST['firstName'])) {
  #Add the error to the array and go back to the athletes page.
  $_SESSION['addAthleteErrors'][] = 'First Name is required';

  if ($_SESSION['myPermission'] == 'Trainer') {
    header('location: ../trainer/trainersAthletes.php');
  }
}

#First name is not empty.
else {
  #Strip unecessary stuff from the first name.
  $firstName = test_input($_POST['firstName']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9]+$/', $firstName)) {
    #Contained something other than letters.
    $_SESSION['addAthleteErrors'][] = 'Only letters allowed in First Name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/trainersAthletes.php');
    }
  }
}

##############################Validate Last Name###################################

#Check that the last name is not empty.
if (empty($_POST['lastName'])) {
  #Add the error to the array and go back to the athletes page.
  $_SESSION['addAthleteErrors'][] = 'Last Name is required';

  if ($_SESSION['myPermission'] == 'Trainer') {
    header('location: ../trainer/trainersAthletes.php');
  }
}

#Last name was not empty.
else {
  #Send the last name to test the input and strip characters from it.
  $lastName = test_input($_POST['lastName']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z ]*$/', $lastName)) {
    #The last name had something other than letters in it.
    $_SESSION['addAthleteErrors'][] = 'Only letters allowed in Last Name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/trainersAthletes.php');
    }
  }
}

###############################Validate Email######################################

#Check that the email is not empty.
if (empty($_POST['athleteEmail'])) {
  #Add the error to the array and go back to the athletes page.
  $_SESSION['addAthleteErrors'][] = 'Email is required';

  if ($_SESSION['myPermission'] == 'Trainer') {
    header('location: ../trainer/trainersAthletes.php');
  }
}

#Email is entered.
else {
  #Send the email to test the input and strip characters from it.
  $email = test_input($_POST['athleteEmail']);

  #Make sure it is a valid email format.
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    #The email was not in a valid format.
    $_SESSION['addAthleteErrors'][] = 'Invalid email format';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/trainersAthletes.php');
    }
  }
}
############################Validate Sport##############################

#Check that the sport is not empty.
if (empty($_POST['sport'])) {
  #Add the error to the array and go back to the athletes page.
  $_SESSION['addAthleteErrors'][] = 'Sport is required';

  if ($_SESSION['myPermission'] == 'Trainer') {
    header('location: ../trainer/trainersAthletes.php');
  }
}

#Sport is not empty.
else {
  #Send the sport to test the input and strip characters from it.
  $sport = test_input($_POST['sport']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9- ]*$/', $sport)) {
    #Invalid sport name so add the error to the array.
    $_SESSION['addAthleteErrors'][] = 'Only letters allowed in Sport';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/trainersAthletes.php');
    }
  }
}

##################################Validate Height#################################

#Check that the athletes height is not empty.
if (empty($_POST['athleteHeight'])) {
  #Add the error to the array and go back to the athletes page.
  $_SESSION['addAthleteErrors'][] = 'Height is required';

  if ($_SESSION['myPermission'] == 'Trainer') {
    header('location: ../trainer/trainersAthletes.php');
  }
}

#Height is not empty.
else {
  #Send the height to test the input and strip characters from it.
  $height = test_input($_POST['athleteHeight']);

  #Make sure it is a valid number.
  if (!is_numeric($height)) {
    #A number was not entered.
    $_SESSION['addAthleteErrors'][] = 'Only number allowed in height';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/trainersAthletes.php');
    }
  }
}

##########################Validate Weight###########################################


#Check to make sure the weight is entered.
if (empty($_POST['athleteWeight'])) {
  #Add the error to the array and go back to the athletes page.
  $_SESSION['addAthleteErrors'][] = 'Weight is required';

  if ($_SESSION['myPermission'] == 'Trainer') {
    header('location: ../trainer/trainersAthletes.php');
  }
}

#Weight is not empty.
else {
  #Send the weight to test the input and strip characters from it.
  $weight = test_input($_POST['athleteWeight']);

  #Make sure it is a valid number.
  if (!is_numeric($weight)) {
    #A number was not entered.
    $_SESSION['addAthleteErrors'][] = 'Only number allowed in weight';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/trainersAthletes.php');
    }
  }
}

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

#If there were any errors go back to the athletes page.
if (count($_SESSION['addAthleteErrors']) > 0) {
  if ($_SESSION['myPermission'] == 'Trainer') {
    header('location: ../trainer/trainersAthletes.php');
  }
}

#No Errors so add to database.
else {
  #unset the errors since there are none.
  unset($_SESSION['addAthleteErrors']);

  #Get all the athletes info from the form.
  $newUsername      = mysqli_real_escape_string($connection, $user);
  $newUserPassword  = mysqli_real_escape_string($connection, $pass);
  $athleteEmail     = mysqli_real_escape_string($connection, $email);
  $athleteSport     = mysqli_real_escape_string($connection, $sport);
  $userPermissions  = 'Athlete';
  $athleteFirstName = mysqli_real_escape_string($connection, $firstName);
  $athleteLastName  = mysqli_real_escape_string($connection, $lastName);
  $athleteHeight    = mysqli_real_escape_string($connection, $height);
  $athleteWeight    = mysqli_real_escape_string($connection, $weight);

  $newUserPassword = md5($newUserPassword);

  #Set their trainer to the currently logged in trainer.
  $athletesTrainer = $_SESSION['myUsername'];

  #insert the athlete into the users table.
  $sql = "insert into users (username, password, email, firstName, lastName, permissions, sport, coachID, height, weight) values ('$newUsername', '$newUserPassword', '$athleteEmail', '$athleteFirstName', '$athleteLastName', '$userPermissions', '$athleteSport', '$athletesTrainer', '$athleteHeight', '$athleteWeight')";

  $result1 = mysqli_query($connection, $sql);

  #Insert into the athlete table query.
  if ($result1) {
    if ($_SESSION['myPermission'] == 'Trainer') {
      echo "<script>
            alert('Athlete Added');
            window.location.href='../trainer/trainersAthletes.php';
            </script>";
    }

  } else {
    if ($_SESSION['myPermission'] == 'Trainer') {
      echo "<script>
            alert('Athlete Already Exists');
            window.location.href='../trainersAthletes.php';
            </script>";
    }
  }
}
