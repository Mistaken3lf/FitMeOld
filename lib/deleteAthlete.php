<?php

include '../lib/connect.php';

session_start();

$deleteMe = '';

#Session variable to see if they are submitting the form.
$_SESSION['userDeleteAttempt'] = true;

#If there were currently any errors reset them.
if (isset($_SESSION['userDeleteErrors'])) {
    unset($_SESSION['userDeleteErrors']);
}

#Create an array of errors.
$_SESSION['userDeleteErrors'] = array();

####################Validate Username####################################

#Check that the username is not empty.
if (empty($_POST['removeUserName'])) {
    #Add the error to the array and go back to the athletes page.
    $_SESSION['userDeleteErrors'][] = 'Username is required';

    if ($_SESSION['myPermission'] == 'Trainer') {
        header('location: trainersAthletes.php');
    }
}

#User name is entered.
else {
    #Send the username to test the input and strip characters from it.
    $deleteMe = test_input($_POST['removeUserName']);

    #Make sure it contains only letters.
    if (!preg_match('/^[a-zA-Z0-9]+$/', $deleteMe)) {

        #Invalid username.
        $_SESSION['userDeleteErrors'][] = 'Only letters allowed in username';

        if ($_SESSION['myPermission'] == 'Trainer') {
            header('location: trainersAthletes.php');
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

#If there were any errors go back to the athletes page.
if (count($_SESSION['userErrors']) > 0) {
  if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: trainersAthletes.php');
  }
}
#No Errors so delete the athlete.
else {
    #Unset the errors since there are none.
    unset($_SESSION['userDeleteErrors']);

    #Get the username to delete.
    $usernameToDelete = mysqli_real_escape_string($connection, $deleteMe);

    #Build the delete query.
    $sql = "delete from users where username='$usernameToDelete'";

    #Get the name of the athlete to delete.
    $removeAthlete = "delete from Athlete where athleteUsername='$usernameToDelete' LIMIT 1";

    #Make sure we can actually delete them from the users table.
    $result1 = mysqli_query($connection, $sql);
    $count1 = mysqli_num_rows($result1);

    #Make sure we can delete them from the athletes table.
    $result2 = mysqli_query($connection, $removeAthlete);
    $count2 = mysqli_num_rows($result2);

    #Athlete removed from the users table.
    if (($result1 == true) and ($result2 == true)) {
        if ($_SESSION['myPermission'] == 'Trainer') {
            echo "<script>
                alert('Athlete Removed');
                window.location.href='../trainer/trainersAthletes.php';
                </script>";
        }
    } else {
        if ($_SESSION['myPermission'] == 'Trainer') {
            echo "<script>
                alert('Athlete Does Not Exist');
                window.location.href='../traine/trainersAthletes.php';
                </script>";
        }
    }
}
