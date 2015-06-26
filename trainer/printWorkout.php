  <div class="row">
    <div class="col-md-12">
      <div class="panel-body">
        <?php
          include("../lib/connect.php");

          session_start();

          $workout = $_GET["workout"];
          $_SESSION["workoutNameForDeletion"] = $workout;
          $tempWorkout = $workout;
          $tempWorkout = strstr($tempWorkout, '-', true);

          #Get the current user.
          $curUser = $_SESSION["myUsername"];

          #Select from the assessment table.
          $sql = "select * from `" . $workout . "` order by id";

          $result = mysqli_query($connection, $sql);

          #Print table heading.
          print "<h1> $whatToPrint </h1>";

          #Print the assessment table.
          print " <div class='table-responsive'>
                          <table class='table table-striped table-bordered' id='currentWorkoutsTable'>
                          <thead>
                          <tr>
                          <th>Exercise #</th>
                          <th>Order</th>
                          <th>Exercise Name</th>
                          <th>Remove</th>
                          </tr>
                          </thead>";
          print "<tbody>";

          while ($row = mysqli_fetch_array($result)) {
            $tempExercise = strstr($row["exerciseName"], '-', true);
            print "<tr>";
            print "<td>" . $row['id'] . "</td>";
            print "<td>" . $row['exerciseOrder'] . "</td>";
            print "<td>" . $tempExercise . "</td>";

            print '<td align=center><input type="checkbox" name="Index[]" id="Index" value="' . $row['id'] . '"/></td>';
            print "</tr>";
          }

          print "</tbody>";
          print "</table>";
          ?>
        <button type="submit" class="btn btn-primary" id="remove" value="Remove Exercise(s)"><span class="glyphicon glyphicon-trash"></span>&nbsp&nbsp Remove Exercise(s)</button>
      </div>
