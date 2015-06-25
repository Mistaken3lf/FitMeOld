<?php

include '../lib/connect.php';
session_start();
$curUser = $_SESSION['myUsername'];
$workout = $_GET['listOfWorkouts'];

$sql = "select * from `" . $workout . "` order by exerciseOrder";

$result = mysqli_query($connection, $sql);

#Print the assessment table.
print " <div class='table-responsive'>
                <table class='table table-striped table-bordered'>
                <thead>
                <tr>
                <th>Order</th>
                <th>Exercise Name</th>
                </tr>
                </thead>";
print "<tbody>";

while ($row = mysqli_fetch_array($result)) {
  $tempExercise = strstr($row["exerciseName"], '-', true);
  print "<tr>";
  print "<td>" . $row['exerciseOrder'] . "</td>";
  print "<td>" . $tempExercise . "</td>";
  print "</tr>";
}

print "</tbody>";
print "</table>";

?>
