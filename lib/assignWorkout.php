<?php
include '../lib/connect.php';

session_start();
$curUser = $_SESSION['myUsername'];

// Get the form variables

$workoutName = mysqli_real_escape_string($connection, $_POST['workoutName']);
$workoutDays = mysqli_real_escape_string($connection, $_POST['workoutDays']);
$nameArray   = $_POST['Athlete']; //nameArray is an array (doesn't work with mysqli_real_escape_string)

foreach ($nameArray as $val) {
  $query = "UPDATE users SET $workoutDays = '$workoutName' WHERE username='$val'";
  $res   = mysqli_query($connection, $query);
  if (!$res) {
    if ($_SESSION['myPermission'] == 'Trainer') {
      echo "<script>
           alert('Error Assigning Workout');
           window.location.href='../trainer/trainersAthletes.php';
           </script>";
    }
  }
}

if ($_SESSION['myPermission'] == 'Trainer') {
  echo "<script>
alert('Workout Assigned');
           window.location.href='../trainer/trainersAthletes.php';

           </script>";
}

?>
