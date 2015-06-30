<?php

include '../lib/connect.php';

$currentPass = '';
$newPass1    = '';
$newPass2    = '';

session_start();

#Session variable to see if they are submitting the form.
$_SESSION['changeAttempt'] = true;

#If there were currently any errors reset them.
if (isset($_SESSION['changeErrors'])) {
  unset($_SESSION['changeErrors']);
}

#Create an array of errors.
$_SESSION['changeErrors'] = array();

####################Validate Current Password####################################

#Check that the password is not empty.
if (empty($_POST['curPassword'])) {
  #Add the error to the array and go back to the change password page..
  $_SESSION['changeErrors'][] = 'Password is required';

  if ($_SESSION['myPermission'] == 'Trainer') {
    header('location: ../trainer/changePassFormTrainer.php');
  }

  if ($_SESSION['myPermission'] == 'Athlete') {
    header('location: ../athlete/changePassFormAthlete.php');
  }
}

#Password is not empty.
else {
  #Send the password to test the input and strip characters from it.
  $currentPass = test_input($_POST['curPassword']);

  #Make sure it contains only letters and numbers.
  if (!preg_match('/^[a-zA-Z0-9]+$/', $currentPass)) {
    #Something other than letters number in password.
    $_SESSION['changeErrors'][] = 'Only numbers and letters in current password';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/changePassFormTrainer.php');
    }

    if ($_SESSION['myPermission'] == 'Athlete') {
      header('location: ../athlete/changePassFormAthlete.php');
    }
  }
}

####################Validate New Password####################################

#Check that the password is not empty.
if (empty($_POST['newPassword1'])) {
  #Add the error to the array and go back to the change password page..
  $_SESSION['changeErrors'][] = 'Password is required';

  if ($_SESSION['myPermission'] == 'Trainer') {
    header('location: ../trainer/changePassFormTrainer.php');
  }

  if ($_SESSION['myPermission'] == 'Athlete') {
    header('location: ../athlete/changePassFormAthlete.php');
  }
}

#Password is not empty.
else {
  #Send the password to test the input and strip characters from it.
  $newPass1 = test_input($_POST['newPassword1']);

  #Make sure it contains only letters and numbers.
  if (!preg_match('/^[a-zA-Z0-9]+$/', $newPass1)) {
    #Something other than letters number in password.
    $_SESSION['changeErrors'][] = 'Only numbers and letters in first new password field';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/changePassFormTrainer.php');
    }

    if ($_SESSION['myPermission'] == 'Athlete') {
      header('location: ../athlete/changePassFormAthlete.php');
    }
  }
}

####################Validate New Password Again####################################

#Check that the password is not empty.
if (empty($_POST['newPassword2'])) {
  #Add the error to the array and go back to the change password page..
  $_SESSION['changeErrors'][] = 'Password is required';

  if ($_SESSION['myPermission'] == 'Trainer') {
    header('location: ../trainer/changePassFormTrainer.php');
  }

  if ($_SESSION['myPermission'] == 'Athlete') {
    header('location: ../athlete/changePassFormAthlete.php');
  }
}

#Password is not empty.
else {
  #Send the password to test the input and strip characters from it.
  $newPass2 = test_input($_POST['newPassword2']);

  #Make sure it contains only letters and numbers.
  if (!preg_match('/^[a-zA-Z0-9]+$/', $newPass2)) {
    #Something other than letters number in password.
    $_SESSION['changeErrors'][] = 'Only numbers and letters in second new password field';

    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/changePassFormTrainer.php');
    }

    if ($_SESSION['myPermission'] == 'Athlete') {
      header('location: ../athlete/changePassFormAthlete.php');
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
if (count($_SESSION['changeErrors']) > 0) {

  if ($_SESSION['myPermission'] == 'Trainer') {
    header('location: ../trainer/changePassFormTrainer.php');
  }

  if ($_SESSION['myPermission'] == 'Athlete') {
    header('location: ../athlete/changePassFormAthlete.php');
  }
} else {
  #unset the errors since there are none.
  unset($_SESSION['changeErrors']);

  $curPassword  = mysqli_real_escape_string($connection, $currentPass);
  $newPassword1 = mysqli_real_escape_string($connection, $newPass1);
  $newPassword2 = mysqli_real_escape_string($connection, $newPass2);

  if ($newPassword1 != $newPassword2) {
    if ($_SESSION['myPermission'] == 'Trainer') {
      echo "<script>
                        alert('New Passwords Do Not Match. Try Again.');
                        window.location.href='..trainer/changePassFormTrainer.php';
                       </script>";
    } else {
      echo "<script>
                        alert('New Passwords Do Not Match. Try Again.');
                        window.location.href='../athlete/changePassFormAthlete.php';
                       </script>";
    }
  } else {
    $curUser      = $_SESSION['myUsername'];
    $checkCurPass = md5($curPassword);
    $sql          = "select username from users where password = '$checkCurPass' AND username = '$curUser'";
    $result       = mysqli_query($connection, $sql);

    if ($result) {
      $hashit = md5($newPassword2);

      $sql = "update users SET password = '$hashit' WHERE username = '$curUser'";

      $result2 = mysqli_query($connection, $sql);

      if ($_SESSION['myPermission'] == 'Trainer') {
        echo "<script>
                              alert('Password Changed!');
                              window.location.href='../trainer/trainersLanding.php';
                              </script>";
      }
      if ($_SESSION['myPermission'] == 'Athlete') {
        echo "<script>
                              alert('Password Changed!');
                              window.location.href='../athlete/athleteLanding.php';
                              </script>";
      }
    } else {
      if ($_SESSION['myPermission'] == 'Trainer') {
        echo "<script>
                              alert('Current Password Incorrect!');
                              window.location.href='../trainer/changePassFormTrainer.php';
                              </script>";
      }
      if ($_SESSION['myPermission'] == 'Athlete') {
        echo "<script>
                              alert('Current Password Incorrect!');
                              window.location.href='../athlete/changePassFormAthlete.php';
                              </script>";
      }
    }
  }
}
