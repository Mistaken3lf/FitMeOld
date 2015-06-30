<?php

include '../lib/connect.php';

session_start();

$usrName         = '';
$usrPass         = '';
$fstName         = '';
$lstName         = '';
$usrEmail        = '';
$userPermissions = '';

#Session variable to see if they are submitting the form.
$_SESSION['userAttempt'] = true;

#If there were currently any errors reset them.
if (isset($_SESSION['userErrors'])) {
  unset($_SESSION['userErrors']);
}

#Create an array of errors.
$_SESSION['userErrors'] = array();

####################Validate Username####################################

#Check that the username is not empty.
if (empty($_POST['adminUser'])) {
  #Add the error to the array and go back to the create user page.
  $_SESSION['userErrors'][] = 'Username is required';

  if ($_SESSION['myPermission'] == 'Trainer') {
    header('location: ../trainer/createUser.php');
  }
}

#Username is not empty.
else {
  #Send the username to test the input and strip characters from it.
  $usrName = test_input($_POST['adminUser']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9]+$/', $usrName)) {
    #Something other than letters were put in the username.
    $_SESSION['userErrors'][] = 'Only letters allowed in username';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createUser.php');
    }
  }
}

############################Validate Password##############################

#Check that the password is not empty.
if (empty($_POST['adminPass'])) {
  #Add the error to the array and go back to the create user page.
  $_SESSION['userErrors'][] = 'Password is required';

  if ($_SESSION['myPermission'] == 'Trainer') {
    header('location: ../trainer/createUser.php');
  }
}

#Password is not empty.
else {
  #Send the password to test the input and strip characters from it.
  $usrPass = test_input($_POST['adminPass']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9]+$/', $usrPass)) {
    #Invalid Password.
    $_SESSION['userErrors'][] = 'Only letters allowed in password';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createUser.php');
    }
  }
}

##################################Validate First Name###########################

#Check to make sure the first name is entered.
if (empty($_POST['firstName'])) {
  #Add the error to the array and go back to the create user page.
  $_SESSION['userErrors'][] = 'First Name is required';

  if ($_SESSION['myPermission'] == 'Trainer') {
    header('location: ../trainer/createUser.php');
  }
}

#First name is entered.
else {
  #Send the first name to test the input and strip characters from it.
  $fstName = test_input($_POST['firstName']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z ]*$/', $fstName)) {
    #Invalid first name.
    $_SESSION['userErrors'][] = 'Only letters allowed in First Name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createUser.php');
    }
  }
}

##############################Validate Last Name###################################

#Check that the last name is not empty.
if (empty($_POST['lastName'])) {
  #Add the error to the array and go back to the create user page.
  $_SESSION['userErrors'][] = 'Last Name is required';

  if ($_SESSION['myPermission'] == 'Trainer') {
    header('location: ../trainer/createUser.php');
  }
}

#Last name is entered.
else {
  #Send the last name to test the input and strip characters from it.
  $lstName = test_input($_POST['lastName']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z ]*$/', $lstName)) {
    #Invalid last name.
    $_SESSION['userErrors'][] = 'Only letters allowed in Last Name';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createUser.php');
    }
  }
}

###############################Validate Email######################################

#Check that the email is not empty.
if (empty($_POST['email'])) {
  #Add the error to the array and go back to the create user page.
  $_SESSION['userErrors'][] = 'Email is required';

  if ($_SESSION['myPermission'] == 'Trainer') {
    header('location: ../trainer/createUser.php');
  }
}

#Email is entered.
else {
  #Send the email to test the input and strip characters from it.
  $usrEmail = test_input($_POST['email']);

  #Make sure its a valid email.
  if (!filter_var($usrEmail, FILTER_VALIDATE_EMAIL)) {
    #Invalid email.
    $_SESSION['userErrors'][] = 'Invalid email format';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createUser.php');
    }
  }
}

##############################Validate Permissions#############################

#Make sure permissions are selected
if (empty($_POST['userPermissions'])) {
  #Add the error to the array and go back to the create user page.
  $_SESSION['userErrors'][] = 'Permissions are required';

  if ($_SESSION['myPermission'] == 'Trainer') {
    header('location: ../trainer/createUser.php');
  }
}

#Permissions have been selected
else {
  #Make the permissions safe.
  $userPermissions = test_input($_POST['userPermissions']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z ]*$/', $userPermissions)) {
    #Invalid last name.
    $_SESSION['userErrors'][] = 'Only letters allowed in permissions';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createUser.php');
    }
  }
}

###########################Prevent Hackers!!!###########################################

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

#If there were any errors go back to the create user page..
if (count($_SESSION['userErrors']) > 0) {
  if ($_SESSION['myPermission'] == 'Trainer') {
    header('location: ../trainer/createUser.php');
  }
}

#Create the user.
else {
  #unset the errors since there are none.
  unset($_SESSION['userErrors']);

  #Get all the new users info from the form.
  $user        = mysqli_real_escape_string($connection, $usrName);
  $pass        = mysqli_real_escape_string($connection, $usrPass);
  $firstName   = mysqli_real_escape_string($connection, $fstName);
  $lastName    = mysqli_real_escape_string($connection, $lstName);
  $email       = mysqli_real_escape_string($connection, $usrEmail);
  $permissions = mysqli_real_escape_string($connection, $userPermissions);

  $pass = md5($pass);

  #Build the query to add the new user.
  $sql = "insert into users (username, password, firstName, lastName, email, permissions)
      values ('$user', '$pass', '$firstName', '$lastName', '$email', '$permissions')";

  #Add the user.
  if (mysqli_query($connection, $sql)) {
    echo "<script>
              alert('User Added');
              window.location.href='../trainer/createUser.php';
              </script>";
  } else {
    echo "<script>
              alert('User Already Exists');
              window.location.href='../trainer/createUser.php';
              </script>";
  }
}
