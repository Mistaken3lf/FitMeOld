<?php

include '../lib/connect.php';

session_start();

#Create a blank username and password.
$username = '';
$password = '';

#Session variable to see if they are submitting the form.
$_SESSION['formAttempt'] = true;

#If there were currently any errors reset them.
if (isset($_SESSION['errors'])) {
    unset($_SESSION['errors']);
}

#Create an array of errors.
$_SESSION['errors'] = array();

#Check that the user name is not empty.
if (empty($_POST['username'])) {
    #Add the error to the array and go back to the login.
  $_SESSION['errors'][] = 'username is required';
    header('location: ../index.php');
}

#Username is not empty.
else {
    #Send the username to test the input and strip characters from it.
  $username = test_input($_POST['username']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9]+$/', $username)) {
      #The username containers something other than letters so create
    #an error and send the user back to the login.
    $_SESSION['errors'][] = 'Only letters allowed in username';
      header('location: ../index.php');
  }
}

#Check if the password is empty.
if (empty($_POST['password'])) {
    #Add a password error to the array and redirect back to the login.
  $_SESSION['errors'][] = 'password is required';
    header('location: ../index.php');
}

#Password is not blank.
else {
    #Send the password off to be stripped of characters.
  $password = test_input($_POST['password']);

  #Make sure password contains only letters.
  if (!preg_match('/^[a-zA-Z0-9]+$/', $password)) {
      #Password container something other than letters so send them back to the login.
    $_SESSION['errors'][] = 'Only letters allowed in password';
      header('location: ../index.php');
  }
}

#Prevent HACKERS!!! XSS and SQL Injection
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

#If there were any errors go back to the login.
if (count($_SESSION['errors']) > 0) {
    header('location: ../index.php');
}

#No errors, so let them login.
else {
    unset($_SESSION['errors']);

  #Escape the username and password.
  $user = mysqli_real_escape_string($connection, $username);
    $pass = mysqli_real_escape_string($connection, $password);

    $pass = md5($pass);

  #Build the check login query.
  $sql = "select * from users where username=\"$user\" and password=\"$pass\"";

  #Run the query.
  $result = mysqli_query($connection, $sql);

  #Get the number of results found.
  $count = mysqli_num_rows($result);

  #The user was found.
  if ($count > 0) {
      while ($row = mysqli_fetch_array($result)) {
          #Get all the users information.
      $_SESSION['myUsername'] = $row['username'];
          $_SESSION['myPassword'] = $row['password'];
          $_SESSION['myEmail'] = $row['email'];
          $_SESSION['myFirstName'] = $row['firstName'];
          $_SESSION['myLastName'] = $row['lastName'];
          $_SESSION['myPermission'] = $row['permissions'];
      #They are now logged in.
      $_SESSION['loggedIn'] = true;
      }


    #Check if they are a trainer and direct accordingly.
    if ($_SESSION['myPermission'] == 'Trainer') {
        header('location: ../trainer/trainersLanding.php');
    }

    #Check if they are an athlete and direct accordingly.
    else {
        header('location: ../athlete/athleteLanding.php');
    }
  }

  #The user is not registered so take them back to the login.
  else {
      echo "<script>
        alert('You are not registered, please contact your trainer or administrator');
        window.location.href='../index.php';
        </script>";
  }
}
