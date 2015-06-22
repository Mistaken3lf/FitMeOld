<?php

include '../lib/connect.php';

session_start();

$birth = '';
$office = '';
$cell = '';
$work = '';
$otherNumber = '';
$otherMail = '';
$bio = '';

#Session variable to see if they are submitting the form.
$_SESSION['profileAttempt'] = true;

#If there were currently any errors reset them.
if (isset($_SESSION['profileErrors'])) {
    unset($_SESSION['profileErrors']);
}

#Create an array of errors.
$_SESSION['profileErrors'] = array();

#Check to see if the date of birth is entered.
if (empty($_POST['DOB'])) {
}

#DOB is entered
else {
    #Sanitize the date of birth.
  $birth = test_input($_POST['DOB']);

  #Check for valid date.
  if (!preg_match('/^(19|20)\d\d[\-\/.](0[1-9]|1[012])[\-\/.](0[1-9]|[12][0-9]|3[01])$/', $birth)) {
      #Invalid date of birth.
    $_SESSION['profileErrors'][] = 'Invalid date of birth';
      if ($_SESSION['myPermission'] == 'Trainer') {
          header('location: ../trainer/trainersProfile.php');
      } else {
          header('location: ../athlete/athletesProfile.php');
      }
  }
}

#Phone number is not entered
if (empty($_POST['officeNumber'])) {
}

#Phone number is entered.
else {
    #Sanitize the phone number.
  $office = test_input($_POST['officeNumber']);

  #Check for valid phone number.
  if (!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $office)) {
      #Invalid phone number.
    $_SESSION['profileErrors'][] = 'Phone number can only consist of numbers';

    if ($_SESSION['myPermission'] == 'Trainer') {
        header('location: ../trainer/trainersProfile.php');
    } else {
        header('location: ../athlete/athletesProfile.php');
    }
  }
}

#Check if the cell is entered.
if (empty($_POST['cellPhone'])) {
}

#Cell is entered.
else {
    #Sanitize the cell number.
  $cell = test_input($_POST['cellPhone']);

  #Check to make sure the cell is valid.
  if (!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $cell)) {
      #Invalid phone number.
    $_SESSION['profileErrors'][] = 'Phone number can only consist of numbers';

    if ($_SESSION['myPermission'] == 'Trainer') {
        header('location: ../trainer/trainersProfile.php');
    } else {
        header('location: ../athlete/athletesProfile.php');
    }
  }
}

############################################################################

#Check for work number..
if (empty($_POST['workPhone'])) {
}

#Work phone was entered.
else {
    #Sanitize the work phone.
  $work = test_input($_POST['workPhone']);

  #Make sure the phone is valid.
  if (!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $work)) {
      #Password container something other than letters so send them back to the login.
    $_SESSION['profileErrors'][] = 'Phone number can only consist of numbers';

    if ($_SESSION['myPermission'] == 'Trainer') {
        header('location: ../trainer/trainersProfile.php');
    } else {
        header('location: ../athlete/athletesProfile.php');
    }
  }
}

############################################################################

#Check if the other phone is empty.
if (empty($_POST['otherPhone'])) {
}

#Phone was entered..
else {
    #Sanitize the phone number.
  $otherNumber = test_input($_POST['otherPhone']);

  #Make sure its a valid number.
  if (!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $otherNumber)) {
      #Invalid phone.
    $_SESSION['profileErrors'][] = 'Phone number can only consist of numbers';

    if ($_SESSION['myPermission'] == 'Trainer') {
        header('location: ../trainer/trainersProfile.php');
    } else {
        header('location: ../athlete/athletesProfile.php');
    }
  }
}

############################################################################
#Check if email is entered.
if (empty($_POST['otherEmail'])) {
}

#Email is entered.
else {
    #Send the email to test the input and strip characters from it.
  $otherMail = test_input($_POST['otherEmail']);

  #Make sure its a valid email.
  if (!filter_var($otherMail, FILTER_VALIDATE_EMAIL)) {
      #Invalid email.
    $_SESSION['profileErrors'][] = 'Invalid email format';

    if ($_SESSION['myPermission'] == 'Trainer') {
        header('location: ../trainer/trainersProfile.php');
    } else {
        header('location: ../athlete/athletesProfile.php');
    }
  }
}

############################################################################
#Check if a biography is entered.
if (empty($_POST['biography'])) {
}

#Bio was entered.
else {
    #Sanitize the bio.
  $bio = test_input($_POST['biography']);

  #Make sure it contains only letters.
  if (!preg_match('/^[a-zA-Z ]*$/', $bio)) {
      #Invalid bio.
    $_SESSION['profileErrors'][] = 'Only letters allowed in Last Name';

    if ($_SESSION['myPermission'] == 'Trainer') {
        header('location: ../trainer/trainersProfile.php');
    } else {
        header('location: ../athlete/athletesProfile.php');
    }
  }
}

############################################################################

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

#If there were any errors go back to the profile.
if (count($_SESSION['profileErrors']) > 0) {
  if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/trainersProfile.php');
  } else {
      header('location: ../athlete/athletesProfile.php');
  }
} else {
    #Unset the erros.
  unset($_SESSION['profileErrors']);

  #Gather all profile information.
  $DOB = mysqli_real_escape_string($connection, $birth);
    $officeNumber = mysqli_real_escape_string($connection, $office);
    $cellPhone = mysqli_real_escape_string($connection, $cell);
    $workPhone = mysqli_real_escape_string($connection, $work);
    $otherPhone = mysqli_real_escape_string($connection, $otherNumber);
    $otherEmail = mysqli_real_escape_string($connection, $otherMail);
    $biography = mysqli_real_escape_string($connection, $bio);
    $myUserName = $_SESSION['myUsername'];

    $sql = "UPDATE users
            SET otherEmail = '$otherEmail', DOB = '$DOB', officeNumber = '$officeNumber',
            cellPhone = '$cellPhone', workPhone = '$workPhone', otherPhone = '$otherPhone', biography = '$biography'
            WHERE username = '$myUserName';";

  #Check if the update is going to work.
  if (mysqli_query($connection, $sql)) {
      if ($_SESSION['myPermission'] == 'Trainer') {
          echo "<script>
            alert('Profile Updated');
            window.location.href='../trainer/trainersProfile.php';
            </script>";
      } else {
          echo "<script>
            alert('Profile Updated');
            window.location.href='../athlete/athleteProfile.php';
            </script>";
      }
  } else {
      if ($_SESSION['myPermission'] == 'Trainer') {
          echo "<script>
            alert('Profile Update Failed');
            window.location.href='../trainer/trainersProfile.php';
            </script>";
      } else {
          echo "<script>
            alert('Profile Update Failed');
            window.location.href='../athlete/athleteProfile.php';
            </script>";
      }
  }
}
