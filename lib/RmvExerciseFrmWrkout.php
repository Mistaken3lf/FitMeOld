<?php

include '../lib/connect.php';

session_start();

$curUser = $_SESSION['myUsername'];

#Get the form variables
$workoutName = $_SESSION['workoutNameForDeletion'];

if(!empty($_POST["Index"]))
{

$workoutId = $_POST['Index']; #nameArray is an array (doesn't work with mysqli_real_escape_string)

foreach ($workoutId as $val) {
    $query = "DELETE FROM `$workoutName` WHERE `id` =$val";

    $res = mysqli_query($connection, $query);

    if (!$res) {
        if ($_SESSION['myPermission'] == 'Trainer') {
            echo "<script>
               alert('Error removing exercise $workoutName + $val');
               window.location.href='../trainer/createWorkoutTrainers.php';
               </script>";
        }
    }
}
  if ($_SESSION['myPermission'] == 'Trainer') {
      echo "<script>
               alert('Removed exercise');
               window.location.href='../trainer/createWorkoutTrainers.php';
               </script>";
  }
}

else {
  echo "<script>
           alert('Select an exercise to remove');
           window.location.href='../trainer/createWorkoutTrainers.php';
           </script>";
}
