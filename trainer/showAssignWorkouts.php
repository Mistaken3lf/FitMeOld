<?php

include '../lib/connect.php';
session_start();
$curUser = $_SESSION['myUsername'];
$q       = $_GET['q'];

#Build dropdown of available workouts
$sql    = "select workoutName from CurrentWorkouts WHERE whosWorkout='$curUser'";
$result = mysqli_query($connection, $sql);

print '<label for="workout" style="float:left;">Select Workout:</label>';
print '<select class="form-control" required id="workoutName" name="workoutName">';
print '<option value="" selected disabled>Choose Workout</option>';
print '<option value="Off-test">Off</option>';

while ($row = mysqli_fetch_array($result)) {
    $tempWorkout = $row['workoutName'];
    $tempWorkout = strstr($tempWorkout, '-', true);
    echo '<option value="' . $row['workoutName'] . '">' . $tempWorkout . '</option>';
}

print '</select>';
print '<br>';
print '<label for="day" style="float:left;" >Select Day:</label>';
print '
                                       <select class="form-control" required id="workoutDays" name="workoutDays">
                                       <option value="" selected disabled>Choose Day</option>
                                       <option value="currentWorkoutOne">Day 1</option>
                                       <option value="currentWorkoutTwo">Day 2</option>
                                       <option value="currentWorkoutThree">Day 3</option>
                                       <option value="currentWorkoutFour">Day 4</option>
                                       <option value="currentWorkoutFive">Day 5</option>
                                       <option value="currentWorkoutSix">Day 6</option>
                                       <option value="currentWorkoutSeven">Day 7</option>
                                     </select>';
print '</div>';

print '<br>';
print "<div class='table-responsive'>

                             <table class='table table-striped table-bordered'>
                                 <thead>
                                     <tr>
                                         <th>First Name</th>
                                         <th>Last Name</th>
                                         <th>Sport</th>
                                         <th>Current Workouts</th>
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
    $tempOne   = strstr($row['currentWorkoutOne'], '-', true);
    $tempTwo   = strstr($row['currentWorkoutTwo'], '-', true);
    $tempThree = strstr($row['currentWorkoutThree'], '-', true);
    $tempFour  = strstr($row['currentWorkoutFour'], '-', true);
    $tempFive  = strstr($row['currentWorkoutFive'], '-', true);
    $tempSix   = strstr($row['currentWorkoutSix'], '-', true);
    $tempSeven = strstr($row['currentWorkoutSeven'], '-', true);
    print '<tr>';
    print '<td>' . $row['firstName'] . '</td>';
    print '<td>' . $row['lastName'] . '</td>';
    print '<td>' . $row['sport'] . '</td>';
    print '<td>Day 1: ' . $tempOne . ' <br>
      Day 2: ' . $tempTwo . ' <br>
      Day 3: ' . $tempThree . ' <br>
      Day 4: ' . $tempFour . ' <br>
      Day 5: ' . $tempFive . ' <br>
      Day 6: ' . $tempSix . ' <br>
      Day 7: ' . $tempSeven . ' <br>
      </td>';

    echo '<td align=center><input type="checkbox" name="Athlete[]" id="Athlete" value="' . $row['username'] . '"/></td>';
    print '</tr>';
}

print '</tbody>';
print '</table>';
