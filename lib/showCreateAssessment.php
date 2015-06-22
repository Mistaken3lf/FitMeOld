<?php

include '../lib/connect.php';
session_start();
$curUser = $_SESSION['myUsername'];
$q = $_GET['q'];

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
$sql = "select athleteUsername, athleteFirstName, athleteLastName, athleteSport, currentWorkoutOne,
  currentWorkoutTwo, currentWorkoutThree, currentWorkoutFour, currentWorkoutFive, currentWorkoutSix,
     currentWorkoutSeven
  from Athlete
  where athletesCoachID='$curUser'
  AND athleteSport = '$q'";

$result = mysqli_query($connection, $sql);

while ($row = mysqli_fetch_array($result)) {
    print '<tr>';
    print '<td>'.$row['athleteFirstName'].'</td>';
    print '<td>'.$row['athleteLastName'].'</td>';
    print '<td>'.$row['athleteSport'].'</td>';
    echo '<td><input type="number" name="score[]" placeholder="Enter Score  EX. 150" id="score"></td>';

    echo '<td><input type="checkbox" name="Athlete[]" id="Athlete" value="'.$row['athleteFirstName'].' '.$row['athleteLastName'].'"/></td>';
}

print '</tbody>';
print '</table>';
