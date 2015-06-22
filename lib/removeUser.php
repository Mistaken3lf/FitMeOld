<?php

include '../lib/connect.php';

session_start();

$username = '';

#Session variable to see if they are submitting the form.
$_SESSION['removeAttempt'] = true;

#If there were currently any errors reset them.
if (isset($_SESSION['removeErrors'])) {
    unset($_SESSION['removeErrors']);
}

#Create an array of errors.
$_SESSION['removeErrors'] = array();

#Check that the username is not empty.
if (empty($_POST['removeUserName'])) {
    #Add the error to the array and go back to the users page.
  $_SESSION['removeErrors'][] = 'Username is required';

    if ($_SESSION['myPermission'] == 'Trainer') {
        header('location: ../trainer/createUser.php');
    }
}

#Username is not empty.
else {
    #Send the username to test the input and strip characters from it.
  $username = test_input($_POST['removeUserName']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z0-9]+$/', $username)) {
      #The username contains something other than letters so create
    #an error and send the user back to the users page.
    $_SESSION['removeErrors'][] = 'Only letters allowed in username';

    if ($_SESSION['myPermission'] == 'Trainer') {
        header('location: ../trainer/createUser.php');
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

#If there were any errors go back to the create user page.
if (count($_SESSION['userErrors']) > 0) {
  if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/createUser.php');
  }
} else {
    unset($_SESSION['removeErrors']);

  #Get the name of the user to delete.
  $usernameToDelete = mysqli_real_escape_string($connection, $username);

  #Build the query to delete the user.
  $sql = "delete from users where username='$usernameToDelete' LIMIT 1";

  #Make sure that user exists and remove them.
  if (mysqli_query($connection, $sql)) {
      echo "<script>
              alert('User Removed');
              window.location.href='../trainer/createUser.php';
              </script>";
  } else {
      echo "<script>
          alert('User Does Not Exist');
          window.location.href='../trainer/createUser.php';
          </script>";
  }
}
