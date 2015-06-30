<?php

include '../lib/connect.php';

session_start();

$curUser = $_SESSION['myUsername'];


if (!empty($_POST["Index"])) {
  #Get the form variables
  $indexArray = $_POST['Index']; #indexArray is an array (doesn't work with mysqli_real_escape_string)

  foreach ($indexArray as $val) {
    $getAthlete = "select * from users where remIndex='$val' and coachID = '$curUser'";
    $athlete    = mysqli_query($connection, $getAthlete);
    $row        = mysqli_fetch_assoc($athlete);
    $username   = $row["username"];
    $query2     = "delete from users where username = '$username'";

    $result = mysqli_query($connection, $query2);


    if ((!$res && !$result)) {
      if ($_SESSION['myPermission'] == 'Trainer') {
        echo "<script>
               alert('Error removing exercise(s)');
               window.location.href='../trainer/trainersAthletes.php';
               </script>";
      }
    }
  }

  if ($_SESSION['myPermission'] == 'Trainer') {
    header("location: ../trainer/trainersAthletes.php");
  }
}

?>
