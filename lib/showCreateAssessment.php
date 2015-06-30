<?php

include '../lib/connect.php';
session_start();
$curUser = $_SESSION['myUsername'];
$q       = $_GET['q'];

print "<div class='table-responsive'>

                             <table class='table table-striped table-bordered'>
                                 <thead>
                                     <tr>
                                         <th>First Name</th>
                                         <th>Last Name</th>
                                         <th>Sport</th>
                                         <th>Score</th>
                                         <th>Select</th>
                                     </tr>
                                 </thead>";

print '<tbody>';
print '</div>';

#start filling in all of the athletes
$sql = "select username, firstName, lastName, sport, currentWorkoutOne,
  currentWorkoutTwo, currentWorkoutThree, currentWorkoutFour, currentWorkoutFive, currentWorkoutSix,
     currentWorkoutSeven
  from users
  where coachID='$curUser'
  AND sport = '$q'";

$result = mysqli_query($connection, $sql);

while ($row = mysqli_fetch_array($result)) {
  print '<tr>';
  print '<td>' . $row['firstName'] . '</td>';
  print '<td>' . $row['lastName'] . '</td>';
  print '<td>' . $row['sport'] . '</td>';
  echo '<td><input type="number" name="score[]" placeholder="Enter Score  EX. 150" id="score"></td>';

  echo '<td><input type="checkbox" name="Athlete[]" id="Athlete" value="' . $row['firstName'] . ' ' . $row['lastName'] . '"/></td>';
}

print '</tbody>';
print '</table>';
