<?php

include '../lib/connect.php';

session_start();

$curUser = $_SESSION['myUsername'];


if(!empty($_POST["Index"]))
{
  #Get the form variables
  $indexArray = $_POST['Index']; #indexArray is an array (doesn't work with mysqli_real_escape_string)

foreach ($indexArray as $val) {
    $getAthlete = "select * from Athlete where remIndex='$val' and athletesCoachID = '$curUser'";
    $athlete = mysqli_query($connection, $getAthlete);
    $row = mysqli_fetch_assoc($athlete);
    $username = $row["athleteUsername"];
    $query2 = "delete from users where username = '$username'";

    $result = mysqli_query($connection, $query2);

    $query = "delete from Athlete where remIndex ='$val'";
    $res = mysqli_query($connection, $query);


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
