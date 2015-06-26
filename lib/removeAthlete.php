<?php

include '../lib/connect.php';

session_start();

$curUser = $_SESSION['myUsername'];


if(!empty($_POST["Index"]))
{
  #Get the form variables
  $indexArray = $_POST['Index']; #indexArray is an array (doesn't work with mysqli_real_escape_string)

foreach ($indexArray as $val) {
    $query = "DELETE from Athlete WHERE remIndex ='$val'";

    $res = mysqli_query($connection, $query);

    if($res) {
      while($row = mysqli_fetch_row($res)) {
        $username = $row[0];
      }
    }

    $query2 = "delete from users where username = '$username'";
    $result = mysqli_query($connection, $query2);

    if (!$res && !$result) {
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
