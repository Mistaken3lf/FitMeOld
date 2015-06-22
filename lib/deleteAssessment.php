<?php

include '../lib/connect.php';

session_start();

$curUser = $_SESSION['myUsername'];


if(!empty($_POST["Index"]))
{
  #Get the form variables
  $indexArray = $_POST['Index']; #indexArray is an array (doesn't work with mysqli_real_escape_string)

foreach ($indexArray as $val) {
    $query = "DELETE from assessmentRecord WHERE AssessmentIndex ='$val'";

    $res = mysqli_query($connection, $query);

    if (!$res) {
        if ($_SESSION['myPermission'] == 'Trainer') {
            echo "<script>
               alert('Error removing assessment');
               window.location.href='../trainer/trainersAssessment.php';
               </script>";
        }
    }
}

if ($_SESSION['myPermission'] == 'Trainer') {
  header("location: ../trainer/trainersAssessment.php");
}
}

?>
