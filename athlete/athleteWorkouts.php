<?php
  session_start();

  if ($_SESSION['loggedIn'] == false) {
      header('location: ../index.php');
  }
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>FitMe</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="PRAGMA" content="NO-CACHE">
    <!-- Latest compiled and minified CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/paper/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/stylesheet.css">
    <link rel="stylesheet" href="../css/print.css" type="text/css" media="print">
  </head>
  <body>
    <header>
      <!--Create the navigation bar. -->
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarCollapsed">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="athleteLanding.php">FitMe</a>
          </div>
          <div class="collapse navbar-collapse" id="navbarCollapsed">
            <ul class="nav navbar-nav">
              <li><a href="athleteLanding.php">Home</a></li>
              <li class="active"><a href="athleteWorkouts.php">Current Training Cycle</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                <?php
                  echo '<style>p{display:inline;}</style><p color="white"><span class="glyphicon glyphicon-user"></span></p>&nbsp&nbsp '.
                  $_SESSION['myUsername'];
                  ?>
                <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="athleteProfile.php">My Profile</a></li>
                  <li><a href="changePassFormAthlete.php">Change Password</a></li>
                  <li><a href="userGuide.pdf" target="_blank">User Guide</a></li>
                  <li><a href="../lib/logout.php">Logout</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!--End of the navigation bar.-->
    </header>
    <section>
      <div class="container-fluid">
        <img class="center-block img-responsive" id="printHeader" src="../img/fitMeTrainingCycle.png" width="500" height="300">
        <hr id="removeHr">
        <?php
          include '../lib/connect.php';

          #Get the username currently logged in
          $athleteFirstName = $_SESSION['myFirstName'];
          $athleteLastName = $_SESSION['myLastName'];
          print "<h3> $athleteFirstName $athleteLastName</h3>";
          ?>
        <!--<A HREF="javascript:window.print()">Print Workout</A>-->
        <br>
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Weekly Training Cycle</h3>
              </div>
              <div class="panel-body">
                <?php
                  include '../lib/connect.php';

                  #Get the username currently logged in
                  $curUser = $_SESSION['myUsername'];
                  $name = $athleteFirstName.' '.$athleteLastName;

                  $currentWorkoutOne = '';
                  $currentWorkoutTwo = '';
                  $currentWorkoutThree = '';
                  $currentWorkoutFour = '';
                  $currentWorkoutFive = '';
                  $currentWorkoutSix = '';
                  $currentWorkoutSeven = '';

                  #Gets the appropriate workout for the user
                  $sql = "SELECT currentWorkoutOne, currentWorkoutTwo, currentWorkoutThree, currentWorkoutFour, currentWorkoutFive, currentWorkoutSix, currentWorkoutSeven FROM Athlete WHERE athleteUsername = '$curUser'";

                  $result = mysqli_query($connection, $sql);

                   while ($row = mysqli_fetch_array($result)) {
                       $currentWorkoutOne = $row['currentWorkoutOne'];
                       $currentWorkoutTwo = $row['currentWorkoutTwo'];
                       $currentWorkoutThree = $row['currentWorkoutThree'];
                       $currentWorkoutFour = $row['currentWorkoutFour'];
                       $currentWorkoutFive = $row['currentWorkoutFive'];
                       $currentWorkoutSix = $row['currentWorkoutSix'];
                       $currentWorkoutSeven = $row['currentWorkoutSeven'];
                   }

                  $tempOne = strstr($currentWorkoutOne, '-', true);
                  $tempTwo = strstr($currentWorkoutTwo, '-', true);
                  $tempThree = strstr($currentWorkoutThree, '-', true);
                  $tempFour = strstr($currentWorkoutFour, '-', true);
                  $tempFive = strstr($currentWorkoutFive, '-', true);
                  $tempSix = strstr($currentWorkoutSix, '-', true);
                  $tempSeven = strstr($currentWorkoutSeven, '-', true);

                  #Gets the entire workout to be printed in a table
                  $sql = 'SELECT * FROM `'.$currentWorkoutOne."` where athlete='$name' ORDER BY exerciseOrder";

                  $result = mysqli_query($connection, $sql);

                  print '<h4><b><u> DAY ONE </u></b></h4>';

                  #Creates the table Header
                  print "<div class='table-responsive'>
                                       <div class=\"col-md-10\">
                                       	<table class='table table-striped table-bordered table-condensed'>
                                       		<thead>
                                       		</thead>";
                  print '<tbody>';

                  #Prints out the exercises
                  while ($row = mysqli_fetch_array($result)) {
                  $numOfSets = $row['sets'];
                  $tempOne = strtoupper($tempOne);

                  print '<thead>';
                  print '<tr>';
                  print "<th colspan=2 bgcolor=#000000><center><font color=#FFFFFF><u><b>$tempOne</b></u></font></center></h4></th>";
                  print '<td colspan=3 align=center bgcolor=#FFFF66><b>WEEK 1</b></td>';
                  print '<td colspan=3 align=center bgcolor=#E0E0D1><b>WEEK 2</b></td>';
                  print '<td colspan=3 align=center bgcolor=#FFFF66><b>WEEK 3</b></td>';
                  print '<td colspan=3 align=center bgcolor=#E0E0D1><b>WEEK 4</b></td>';

                  print '</tr>';
                  print '</thead>';

                  print '<thead>';
                  print '<tr>';
                  print '<th>Exercise Order</th>';
                  print '<td align=center>'.$row['exerciseOrder'].'</td>';
                  print '<td align=center><b>Set</b></td>';
                  print '<td align=center><b>Reps</b></td>';
                  print '<td align=center><b>Weight</b></td>';
                  print '<td align=center><b>Set</b></td>';
                  print '<td align=center><b>Reps</b></td>';
                  print '<td align=center><b>Weight</b></td>';
                  print '<td align=center><b>Set</b></td>';
                  print '<td align=center><b>Reps</b></td>';
                  print '<td align=center><b>Weight</b></td>';
                  print '<td align=center><b>Set</b></td>';
                  print '<td align=center><b>Reps</b></td>';
                  print '<td align=center><b>Weight</b></td>';
                  print '</tr>';
                  print '<tr>';
                  print '<th>Exercise Name</th>';
                  $tempExercise = strstr($row['exerciseName'], '-', true);
                  print '<td align=center>'.$tempExercise.'</td>';
                  if ($row['setsW1'] >= 1) {
                  print '<td align=center><b>1</b></td>';
                  print '<td align=center>'.$row['reps1W1'].'</td>';
                  if ($row['intensity1W1'] == 0 || $row['intensity1W1'] === 0) {
                     print '<td align=center>'.$row['calcWeight1W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity1W1'].'</td>';
                  }
                  } else {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  }
                  if ($row['setsW2'] >= 1) {
                  print '<td align=center><b>1</b></td>';
                  print '<td align=center>'.$row['reps1W2'].'</td>';
                  if ($row['intensity1W2'] == 0 || $row['intensity1W2'] === 0) {
                     print '<td align=center>'.$row['calcWeight1W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity1W2'].'</td>';
                  }
                  } else {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  }
                  if ($row['setsW3'] >= 1) {
                  print '<td align=center><b>1</b></td>';
                  print '<td align=center>'.$row['reps1W3'].'</td>';
                  if ($row['intensity1W3'] == 0 || $row['intensity1W3'] === 0) {
                     print '<td align=center>'.$row['calcWeight1W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity1W3'].'</td>';
                  }
                  } else {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  }
                  if ($row['setsW4'] >= 1) {
                  print '<td align=center><b>1</b></td>';
                  print '<td align=center>'.$row['reps1W4'].'</td>';
                  if ($row['intensity1W4'] == 0 || $row['intensity1W4'] === 0) {
                     print '<td align=center>'.$row['calcWeight1W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity1W4'].'</td>';
                  }
                  } else {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  }

                  print '</tr>';
                  print '<tr>';
                  if ($row['setsW1'] < 2 && $row['setsW2'] < 2 && $row['setsW3'] < 2 && $row['setsW4'] < 2) {
                  } else {
                  print '<th></th>';
                  print '<td align=center></td>';
                  if ($row['setsW1'] >= 2) {
                     print '<td align=center><b>2</b></td>';
                     print '<td align=center>'.$row['reps2W1'].'</td>';
                     if ($row['intensity2W1'] == 0 || $row['intensity2W1'] === 0) {
                         print '<td align=center>'.$row['calcWeight2W1'].'</td>';
                     } else {
                         print '<td align=center>'.$row['intensity2W1'].'</td>';
                     }
                  } else {
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                  }
                  if ($row['setsW2'] >= 2) {
                     print '<td align=center><b>2</b></td>';
                     print '<td align=center>'.$row['reps2W2'].'</td>';
                     if ($row['intensity2W2'] == 0 || $row['intensity2W2'] === 0) {
                         print '<td align=center>'.$row['calcWeight2W2'].'</td>';
                     } else {
                         print '<td align=center>'.$row['intensity2W2'].'</td>';
                     }
                  } else {
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                  }
                  if ($row['setsW3'] >= 2) {
                     print '<td align=center><b>2</b></td>';
                     print '<td align=center>'.$row['reps2W3'].'</td>';
                     if ($row['intensity2W3'] == 0 || $row['intensity2W3'] === 0) {
                         print '<td align=center>'.$row['calcWeight2W3'].'</td>';
                     } else {
                         print '<td align=center>'.$row['intensity2W3'].'</td>';
                     }
                  } else {
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                  }
                  if ($row['setsW4'] >= 2) {
                     print '<td align=center><b>2</b></td>';
                     print '<td align=center>'.$row['reps2W4'].'</td>';
                     if ($row['intensity2W4'] == 0 || $row['intensity2W4'] === 0) {
                         print '<td align=center>'.$row['calcWeight2W4'].'</td>';
                     } else {
                         print '<td align=center>'.$row['intensity2W4'].'</td>';
                     }
                  } else {
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($row['setsW1'] < 3 && $row['setsW2'] < 3 && $row['setsW3'] < 3 && $row['setsW4'] < 3) {
                  } else {
                  print '<th></th>';
                  print '<td align=center></td>';
                  if ($row['setsW1'] >= 3) {
                     print '<td align=center><b>3</b></td>';
                     print '<td align=center>'.$row['reps3W1'].'</td>';
                     if ($row['intensity3W1'] == 0 || $row['intensity3W1'] === 0) {
                         print '<td align=center>'.$row['calcWeight3W1'].'</td>';
                     } else {
                         print '<td align=center>'.$row['intensity3W1'].'</td>';
                     }
                  } else {
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                  }
                  if ($row['setsW2'] >= 3) {
                     print '<td align=center><b>3</b></td>';
                     print '<td align=center>'.$row['reps3W2'].'</td>';
                     if ($row['intensity3W2'] == 0 || $row['intensity3W2'] === 0) {
                         print '<td align=center>'.$row['calcWeight3W2'].'</td>';
                     } else {
                         print '<td align=center>'.$row['intensity3W2'].'</td>';
                     }
                  } else {
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                  }
                  if ($row['setsW3'] >= 3) {
                     print '<td align=center><b>3</b></td>';
                     print '<td align=center>'.$row['reps3W3'].'</td>';
                     if ($row['intensity3W3'] == 0 || $row['intensity3W3'] === 0) {
                         print '<td align=center>'.$row['calcWeight3W3'].'</td>';
                     } else {
                         print '<td align=center>'.$row['intensity3W3'].'</td>';
                     }
                  } else {
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                  }
                  if ($row['setsW4'] >= 3) {
                     print '<td align=center><b>3</b></td>';
                     print '<td align=center>'.$row['reps3W4'].'</td>';
                     if ($row['intensity3W4'] == 0 || $row['intensity3W4'] === 0) {
                         print '<td align=center>'.$row['calcWeight3W4'].'</td>';
                     } else {
                         print '<td align=center>'.$row['intensity3W4'].'</td>';
                     }
                  } else {
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($row['setsW1'] < 4 && $row['setsW2'] < 4 && $row['setsW3'] < 4 && $row['setsW4'] < 4) {
                  } else {
                  print '<th></th>';
                  print '<td align=center></td>';
                  if ($row['setsW1'] >= 4) {
                     print '<td align=center><b>4</b></td>';
                     print '<td align=center>'.$row['reps4W1'].'</td>';
                     if ($row['intensity4W1'] == 0 || $row['intensity4W1'] === 0) {
                         print '<td align=center>'.$row['calcWeight4W1'].'</td>';
                     } else {
                         print '<td align=center>'.$row['intensity4W1'].'</td>';
                     }
                  } else {
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                  }
                  if ($row['setsW2'] >= 4) {
                     print '<td align=center><b>4</b></td>';
                     print '<td align=center>'.$row['reps4W2'].'</td>';
                     if ($row['intensity4W2'] == 0 || $row['intensity4W2'] === 0) {
                         print '<td align=center>'.$row['calcWeight4W2'].'</td>';
                     } else {
                         print '<td align=center>'.$row['intensity4W2'].'</td>';
                     }
                  } else {
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                  }
                  if ($row['setsW3'] >= 4) {
                     print '<td align=center><b>4</b></td>';
                     print '<td align=center>'.$row['reps4W3'].'</td>';
                     if ($row['intensity4W3'] == 0 || $row['intensity4W3'] === 0) {
                         print '<td align=center>'.$row['calcWeight4W3'].'</td>';
                     } else {
                         print '<td align=center>'.$row['intensity4W3'].'</td>';
                     }
                  } else {
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                  }
                  if ($row['setsW4'] >= 4) {
                     print '<td align=center><b>4</b></td>';
                     print '<td align=center>'.$row['reps4W4'].'</td>';
                     if ($row['intensity4W4'] == 0 || $row['intensity4W4'] === 0) {
                         print '<td align=center>'.$row['calcWeight4W4'].'</td>';
                     } else {
                         print '<td align=center>'.$row['intensity4W4'].'</td>';
                     }
                  } else {
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($row['setsW1'] < 5 && $row['setsW2'] < 5 && $row['setsW3'] < 5 && $row['setsW4'] < 5) {
                  } else {
                  print '<th></th>';
                  print '<td align=center></td>';
                  if ($row['setsW1'] >= 5) {
                     print '<td align=center><b>5</b></td>';
                     print '<td align=center>'.$row['reps5W1'].'</td>';
                     print '<td align=center><b>5</b></td>';
                     print '<td align=center>'.$row['reps5W1'].'</td>';
                     if ($row['intensity5W1'] == 0 || $row['intensity5W1'] === 0) {
                         print '<td align=center>'.$row['calcWeight5W1'].'</td>';
                     } else {
                         print '<td align=center>'.$row['intensity5W1'].'</td>';
                     }
                  } else {
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                  }
                  if ($row['setsW2'] >= 5) {
                     print '<td align=center><b>5</b></td>';
                     print '<td align=center>'.$row['reps5W2'].'</td>';
                     if ($row['intensity5W2'] == 0 || $row['intensity5W2'] === 0) {
                         print '<td align=center>'.$row['calcWeight5W2'].'</td>';
                     } else {
                         print '<td align=center>'.$row['intensity5W2'].'</td>';
                     }
                  } else {
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                  }
                  if ($row['setsW3'] >= 5) {
                     print '<td align=center><b>5</b></td>';
                     print '<td align=center>'.$row['reps5W3'].'</td>';
                     if ($row['intensity5W3'] == 0 || $row['intensity5W3'] === 0) {
                         print '<td align=center>'.$row['calcWeight5W3'].'</td>';
                     } else {
                         print '<td align=center>'.$row['intensity5W3'].'</td>';
                     }
                  } else {
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                  }
                  if ($row['setsW4'] >= 5) {
                     print '<td align=center><b>5</b></td>';
                     print '<td align=center>'.$row['reps5W4'].'</td>';
                     if ($row['intensity5W4'] == 0 || $row['intensity5W4'] === 0) {
                         print '<td align=center>'.$row['calcWeight5W4'].'</td>';
                     } else {
                         print '<td align=center>'.$row['intensity5W4'].'</td>';
                     }
                  } else {
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($row['setsW1'] < 6 && $row['setsW2'] < 6 && $row['setsW3'] < 6 && $row['setsW4'] < 6) {
                  } else {
                  print '<th></th>';
                  print '<td align=center></td>';
                  if ($row['setsW1'] >= 6) {
                     print '<td align=center><b>6</b></td>';
                     print '<td align=center>'.$row['reps6W1'].'</td>';
                     if ($row['intensity6W1'] == 0 || $row['intensity6W1'] === 0) {
                         print '<td align=center>'.$row['calcWeight6W1'].'</td>';
                     } else {
                         print '<td align=center>'.$row['intensity6W1'].'</td>';
                     }
                  } else {
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                  }
                  if ($row['setsW2'] >= 6) {
                     print '<td align=center><b>6</b></td>';
                     print '<td align=center>'.$row['reps6W2'].'</td>';
                     if ($row['intensity6W2'] == 0 || $row['intensity6W2'] === 0) {
                         print '<td align=center>'.$row['calcWeight6W2'].'</td>';
                     } else {
                         print '<td align=center>'.$row['intensity6W2'].'</td>';
                     }
                  } else {
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                  }
                  if ($row['setsW3'] >= 6) {
                     print '<td align=center><b>6</b></td>';
                     print '<td align=center>'.$row['reps6W3'].'</td>';
                     if ($row['intensity6W3'] == 0 || $row['intensity6W3'] === 0) {
                         print '<td align=center>'.$row['calcWeight6W3'].'</td>';
                     } else {
                         print '<td align=center>'.$row['intensity6W3'].'</td>';
                     }
                  } else {
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                  }
                  if ($row['setsW4'] >= 6) {
                     print '<td align=center><b>6</b></td>';
                     print '<td align=center>'.$row['reps6W4'].'</td>';
                     if ($row['intensity6W4'] == 0 || $row['intensity6W4'] === 0) {
                         print '<td align=center>'.$row['calcWeight6W4'].'</td>';
                     } else {
                         print '<td align=center>'.$row['intensity6W4'].'</td>';
                     }
                  } else {
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($row['setsW1'] < 7 && $row['setsW2'] < 7 && $row['setsW3'] < 7 && $row['setsW4'] < 7) {
                  } else {
                  print '<th></th>';
                  print '<td align=center></td>';
                  if ($row['setsW1'] >= 7) {
                     print '<td align=center><b>7</b></td>';
                     print '<td align=center>'.$row['reps7W1'].'</td>';
                     if ($row['intensity7W1'] == 0 || $row['intensity7W1'] === 0) {
                         print '<td align=center>'.$row['calcWeight7W1'].'</td>';
                     } else {
                         print '<td align=center>'.$row['intensity7W1'].'</td>';
                     }
                  } else {
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                  }
                  if ($row['setsW2'] >= 7) {
                     print '<td align=center><b>7</b></td>';
                     print '<td align=center>'.$row['reps7W2'].'</td>';
                     if ($row['intensity7W2'] == 0 || $row['intensity7W2'] === 0) {
                         print '<td align=center>'.$row['calcWeight7W2'].'</td>';
                     } else {
                         print '<td align=center>'.$row['intensity7W2'].'</td>';
                     }
                  } else {
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                  }
                  if ($row['setsW3'] >= 7) {
                     print '<td align=center><b>7</b></td>';
                     print '<td align=center>'.$row['reps7W3'].'</td>';
                     if ($row['intensity7W3'] == 0 || $row['intensity7W3'] === 0) {
                         print '<td align=center>'.$row['calcWeight7W3'].'</td>';
                     } else {
                         print '<td align=center>'.$row['intensity7W3'].'</td>';
                     }
                  } else {
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                  }
                  if ($row['setsW4'] >= 7) {
                     print '<td align=center><b>7</b></td>';
                     print '<td align=center>'.$row['reps7W4'].'</td>';
                     if ($row['intensity7W4'] == 0 || $row['intensity7W4'] === 0) {
                         print '<td align=center>'.$row['calcWeight7W4'].'</td>';
                     } else {
                         print '<td align=center>'.$row['intensity7W4'].'</td>';
                     }
                  } else {
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($row['setsW1'] < 8 && $row['setsW2'] < 8 && $row['setsW3'] < 8 && $row['setsW4'] < 8) {
                  } else {
                  if ($row['setsW1'] >= 8) {
                     print '<th></th>';
                     print '<td align=center></td>';
                     print '<td align=center><b>8</b></td>';
                     print '<td align=center>'.$row['reps8W1'].'</td>';
                     if ($row['intensity8W1'] == 0 || $row['intensity8W1'] === 0) {
                         print '<td align=center>'.$row['calcWeight8W1'].'</td>';
                     } else {
                         print '<td align=center>'.$row['intensity8W1'].'</td>';
                     }
                  } else {
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                  }
                  if ($row['setsW2'] >= 8) {
                     print '<td align=center><b>8</b></td>';
                     print '<td align=center>'.$row['reps8W2'].'</td>';
                     if ($row['intensity8W2'] == 0 || $row['intensity8W2'] === 0) {
                         print '<td align=center>'.$row['calcWeight8W2'].'</td>';
                     } else {
                         print '<td align=center>'.$row['intensity8W2'].'</td>';
                     }
                  } else {
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                  }
                  if ($row['setsW3'] >= 8) {
                     print '<td align=center><b>8</b></td>';
                     print '<td align=center>'.$row['reps8W3'].'</td>';
                     if ($row['intensity8W3'] == 0 || $row['intensity8W3'] === 0) {
                         print '<td align=center>'.$row['calcWeight8W3'].'</td>';
                     } else {
                         print '<td align=center>'.$row['intensity8W3'].'</td>';
                     }
                  } else {
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                  }
                  if ($row['setsW4'] >= 8) {
                     print '<td align=center><b>8</b></td>';
                     print '<td align=center>'.$row['reps8W4'].'</td>';
                     if ($row['intensity8W4'] == 0 || $row['intensity8W4'] === 0) {
                         print '<td align=center>'.$row['calcWeight8W4'].'</td>';
                     } else {
                         print '<td align=center>'.$row['intensity8W4'].'</td>';
                     }
                  } else {
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($row['setsW1'] < 9 && $row['setsW2'] < 9 && $row['setsW3'] < 9 && $row['setsW4'] < 9) {
                  } else {
                  if ($row['setsW1'] >= 9) {
                     print '<th></th>';
                     print '<td align=center></td>';
                     print '<td align=center><b>9</b></td>';
                     print '<td align=center>'.$row['reps9W1'].'</td>';
                     if ($row['intensity9W1'] == 0 || $row['intensity9W1'] === 0) {
                         print '<td align=center>'.$row['calcWeight9W1'].'</td>';
                     } else {
                         print '<td align=center>'.$row['intensity9W1'].'</td>';
                     }
                  } else {
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                  }
                  if ($row['setsW2'] >= 9) {
                     print '<td align=center><b>9</b></td>';
                     print '<td align=center>'.$row['reps9W2'].'</td>';
                     if ($row['intensity9W2'] == 0 || $row['intensity9W2'] === 0) {
                         print '<td align=center>'.$row['calcWeight9W2'].'</td>';
                     } else {
                         print '<td align=center>'.$row['intensity9W2'].'</td>';
                     }
                  } else {
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                  }
                  if ($row['setsW3'] >= 9) {
                     print '<td align=center><b>9</b></td>';
                     print '<td align=center>'.$row['reps9W3'].'</td>';
                     if ($row['intensity9W3'] == 0 || $row['intensity9W3'] === 0) {
                         print '<td align=center>'.$row['calcWeight9W3'].'</td>';
                     } else {
                         print '<td align=center>'.$row['intensity9W3'].'</td>';
                     }
                  } else {
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                  }
                  if ($row['setsW4'] >= 9) {
                     print '<td align=center><b>9</b></td>';
                     print '<td align=center>'.$row['reps9W4'].'</td>';
                     if ($row['intensity9W4'] == 0 || $row['intensity9W4'] === 0) {
                         print '<td align=center>'.$row['calcWeight9W4'].'</td>';
                     } else {
                         print '<td align=center>'.$row['intensity9W4'].'</td>';
                     }
                  } else {
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($row['setsW1'] < 10 && $row['setsW2'] < 10 && $row['setsW3'] < 10 && $row['setsW4'] < 10) {
                  } else {
                  if ($row['setsW1'] >= 10) {
                     print '<th></th>';
                     print '<td align=center></td>';
                     print '<td align=center><b>10</b></td>';
                     print '<td align=center>'.$row['reps10W1'].'</td>';
                     if ($row['intensity10W1'] == 0 || $row['intensity10W1'] === 0) {
                         print '<td align=center>'.$row['calcWeight10W1'].'</td>';
                     } else {
                         print '<td align=center>'.$row['intensity10W1'].'</td>';
                     }
                  } else {
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                  }
                  if ($row['setsW2'] >= 10) {
                     print '<td align=center><b>10</b></td>';
                     print '<td align=center>'.$row['reps10W2'].'</td>';
                     if ($row['intensity10W2'] == 0 || $row['intensity10W2'] === 0) {
                         print '<td align=center>'.$row['calcWeight10W2'].'</td>';
                     } else {
                         print '<td align=center>'.$row['intensity10W2'].'</td>';
                     }
                  } else {
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                  }
                  if ($row['setsW3'] >= 10) {
                     print '<td align=center><b>10</b></td>';
                     print '<td align=center>'.$row['reps10W3'].'</td>';
                     if ($row['intensity10W3'] == 0 || $row['intensity10W3'] === 0) {
                         print '<td align=center>'.$row['calcWeight10W3'].'</td>';
                     } else {
                         print '<td align=center>'.$row['intensity10W3'].'</td>';
                     }
                  } else {
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                  }
                  if ($row['setsW3'] >= 10) {
                     print '<td align=center><b>10</b></td>';
                     print '<td align=center>'.$row['reps10W4'].'</td>';
                     if ($row['intensity10W4'] == 0 || $row['intensity10W4'] === 0) {
                         print '<td align=center>'.$row['calcWeight10W4'].'</td>';
                     } else {
                         print '<td align=center>'.$row['intensity10W4'].'</td>';
                     }
                  } else {
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                     print '<td align=center></td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  print '<th>Tempo</th>';
                  print '<td align=center></td>';
                  print '<td colspan=3 align=center>'.$row['tempoW1'].'</td>';
                  print '<td colspan=3 align=center>'.$row['tempoW2'].'</td>';
                  print '<td colspan=3 align=center>'.$row['tempoW3'].'</td>';
                  print '<td colspan=3 align=center>'.$row['tempoW4'].'</td>';
                  print '</tr>';
                  print '<tr>';
                  print '<th>Rest</th>';
                  print '<td align=center></td>';
                  print '<td colspan=3 align=center>'.$row['restW1'].'</td>';
                  print '<td colspan=3 align=center>'.$row['restW2'].'</td>';
                  print '<td colspan=3 align=center>'.$row['restW3'].'</td>';
                  print '<td colspan=3 align=center>'.$row['restW4'].'</td>';
                  print '</tr>';
                  print '<tr>';
                  print '<th>Comments</th>';
                  print '<td colspan=13>This is a test comment.  What do you think?</td>';
                  print '</tr>';
                  print '<tr>';
                  print '<td colspan=14 bgcolor=#000000>';
                  print '</td>';
                  print '</tr>';
                  print '</thead>';
                  }
                  print '</tbody>';
                  print '</table>';
                  print '</div>';
                  print '</div>';
                  echo '<p class="pageBreak"></p>';
                  print "<hr id='removeHr'>";

                  $sql = 'SELECT * FROM `'.$currentWorkoutTwo."` where athlete='$name' ORDER BY exerciseOrder";

                  $result = mysqli_query($connection, $sql);

                  print '<h4><b><u> DAY TWO </u></b></h4>';

                  #Creates the table Header
                  print "<div class='table-responsive'>
                                       <div class=\"col-md-10\">
                                       	<table class='table table-striped table-bordered table-condensed'>
                                       		<thead>
                                       		</thead>";
                  print '<tbody>';

                  #Prints out the exercises
                  while ($row = mysqli_fetch_array($result)) {
                  $numOfSets = $row['sets'];
                  $tempTwo = strtoupper($tempTwo);

                  print '<thead>';
                  print '<tr>';
                  print "<th colspan=2 bgcolor=#000000><center><font color=#FFFFFF><u><b>$tempTwo</b></u></font></center></h4></th>";
                  print '<td colspan=3 align=center bgcolor=#FFFF66><b>WEEK 1</b></td>';
                  print '<td colspan=3 align=center bgcolor=#E0E0D1><b>WEEK 2</b></td>';
                  print '<td colspan=3 align=center bgcolor=#FFFF66><b>WEEK 3</b></td>';
                  print '<td colspan=3 align=center bgcolor=#E0E0D1><b>WEEK 4</b></td>';

                  print '</tr>';
                  print '</thead>';

                  print '<thead>';
                  print '<tr>';
                  print '<th>Exercise Order</th>';
                  print '<td align=center>'.$row['exerciseOrder'].'</td>';
                  print '<td align=center><b>Set</b></td>';
                  print '<td align=center><b>Reps</b></td>';
                  print '<td align=center><b>Weight</b></td>';
                  print '<td align=center><b>Set</b></td>';
                  print '<td align=center><b>Reps</b></td>';
                  print '<td align=center><b>Weight</b></td>';
                  print '<td align=center><b>Set</b></td>';
                  print '<td align=center><b>Reps</b></td>';
                  print '<td align=center><b>Weight</b></td>';
                  print '<td align=center><b>Set</b></td>';
                  print '<td align=center><b>Reps</b></td>';
                  print '<td align=center><b>Weight</b></td>';
                  print '</tr>';
                  print '<tr>';
                  print '<th>Exercise Name</th>';
                  $tempExercise = strstr($row['exerciseName'], '-', true);
                  print '<td align=center>'.$tempExercise.'</td>';
                  if ($numOfSets <= $sets1) {
                  print '<td align=center><b>1</b></td>';
                  print '<td align=center>'.$row['reps1W1'].'</td>';
                  if ($row['intensity1W1'] == 0 || $row['intensity1W1'] === 0) {
                     print '<td align=center>'.$row['calcWeight1W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity1W1'].'</td>';
                  }
                  print '<td align=center><b>1</b></td>';
                  print '<td align=center>'.$row['reps1W2'].'</td>';
                  if ($row['intensity1W2'] == 0 || $row['intensity1W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage1W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity1W2'].'</td>';
                  }
                  print '<td align=center><b>1</b></td>';
                  print '<td align=center>'.$row['reps1W3'].'</td>';
                  if ($row['intensity1W3'] == 0 || $row['intensity1W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage1W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity1W3'].'</td>';
                  }
                  print '<td align=center><b>1</b></td>';
                  print '<td align=center>'.$row['reps1W4'].'</td>';
                  if ($row['intensity1W4'] == 0 || $row['intensity1W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage1W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity1W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  print '<th></th>';
                  print '<td align=center></td>';
                  if ($numOfSets <= 2) {
                  print '<td align=center><b>2</b></td>';
                  print '<td align=center>'.$row['reps2W1'].'</td>';
                  if ($row['intensity2W1'] == 0 || $row['intensity2W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage2W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity2W1'].'</td>';
                  }
                  print '<td align=center><b>2</b></td>';
                  print '<td align=center>'.$row['reps2W2'].'</td>';
                  if ($row['intensity2W2'] == 0 || $row['intensity2W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage2W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity2W2'].'</td>';
                  }
                  print '<td align=center><b>2</b></td>';
                  print '<td align=center>'.$row['reps2W3'].'</td>';
                  if ($row['intensity2W3'] == 0 || $row['intensity2W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage2W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity2W3'].'</td>';
                  }
                  print '<td align=center><b>2</b></td>';
                  print '<td align=center>'.$row['reps2W4'].'</td>';
                  if ($row['intensity2W4'] == 0 || $row['intensity2W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage2W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity2W4'].'</td>';
                  }
                  } else {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  }
                  print '</tr>';
                  print '<tr>';
                  print '<th></th>';
                  print '<td align=center></td>';
                  if ($numOfSets <= 3) {
                  print '<td align=center><b>3</b></td>';
                  print '<td align=center>'.$row['reps3W1'].'</td>';
                  if ($row['intensity3W1'] == 0 || $row['intensity3W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage3W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity3W1'].'</td>';
                  }
                  print '<td align=center><b>3</b></td>';
                  print '<td align=center>'.$row['reps3W2'].'</td>';
                  if ($row['intensity3W2'] == 0 || $row['intensity3W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage3W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity3W2'].'</td>';
                  }
                  print '<td align=center><b>3</b></td>';
                  print '<td align=center>'.$row['reps3W3'].'</td>';
                  if ($row['intensity3W3'] == 0 || $row['intensity3W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage3W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity3W3'].'</td>';
                  }
                  print '<td align=center><b>3</b></td>';
                  print '<td align=center>'.$row['reps3W4'].'</td>';
                  if ($row['intensity3W4'] == 0 || $row['intensity3W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage3W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity3W4'].'</td>';
                  }
                  } else {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($numOfSets <= 4) {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center><b>4</b></td>';
                  print '<td align=center>'.$row['reps4W1'].'</td>';
                  if ($row['intensity4W1'] == 0 || $row['intensity4W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage4W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity4W1'].'</td>';
                  }
                  print '<td align=center><b>4</b></td>';
                  print '<td align=center>'.$row['reps4W2'].'</td>';
                  if ($row['intensity4W2'] == 0 || $row['intensity4W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage4W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity4W2'].'</td>';
                  }
                  print '<td align=center><b>4</b></td>';
                  print '<td align=center>'.$row['reps4W3'].'</td>';
                  if ($row['intensity4W3'] == 0 || $row['intensity4W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage4W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity4W3'].'</td>';
                  }
                  print '<td align=center><b>4</b></td>';
                  print '<td align=center>'.$row['reps4W4'].'</td>';
                  if ($row['intensity4W4'] == 0 || $row['intensity4W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage4W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity4W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($numOfSets <= 5) {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center><b>5</b></td>';
                  print '<td align=center>'.$row['reps5W1'].'</td>';
                  if ($row['intensity5W1'] == 0 || $row['intensity5W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage5W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity5W1'].'</td>';
                  }
                  print '<td align=center><b>5</b></td>';
                  print '<td align=center>'.$row['reps5W2'].'</td>';
                  if ($row['intensity5W2'] == 0 || $row['intensity5W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage5W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity5W2'].'</td>';
                  }
                  print '<td align=center><b>5</b></td>';
                  print '<td align=center>'.$row['reps5W3'].'</td>';
                  if ($row['intensity5W3'] == 0 || $row['intensity5W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage5W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity5W3'].'</td>';
                  }
                  print '<td align=center><b>5</b></td>';
                  print '<td align=center>'.$row['reps5W4'].'</td>';
                  if ($row['intensity5W4'] == 0 || $row['intensity5W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage5W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity5W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($numOfSets <= 6) {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center><b>6</b></td>';
                  print '<td align=center>'.$row['reps6W1'].'</td>';
                  if ($row['intensity6W1'] == 0 || $row['intensity6W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage6W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity6W1'].'</td>';
                  }
                  print '<td align=center><b>6</b></td>';
                  print '<td align=center>'.$row['reps6W2'].'</td>';
                  if ($row['intensity6W2'] == 0 || $row['intensity6W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage6W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity6W2'].'</td>';
                  }
                  print '<td align=center><b>6</b></td>';
                  print '<td align=center>'.$row['reps6W3'].'</td>';
                  if ($row['intensity6W3'] == 0 || $row['intensity6W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage6W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity6W3'].'</td>';
                  }
                  print '<td align=center><b>6</b></td>';
                  print '<td align=center>'.$row['reps6W4'].'</td>';
                  if ($row['intensity6W4'] == 0 || $row['intensity6W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage6W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity6W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($numOfSets <= 7) {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center><b>7</b></td>';
                  print '<td align=center>'.$row['reps7W1'].'</td>';
                  if ($row['intensity7W1'] == 0 || $row['intensity7W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage7W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity7W1'].'</td>';
                  }
                  print '<td align=center><b>7</b></td>';
                  print '<td align=center>'.$row['reps7W2'].'</td>';
                  if ($row['intensity7W2'] == 0 || $row['intensity7W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage7W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity7W2'].'</td>';
                  }
                  print '<td align=center><b>7</b></td>';
                  print '<td align=center>'.$row['reps7W3'].'</td>';
                  if ($row['intensity7W3'] == 0 || $row['intensity7W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage7W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity7W3'].'</td>';
                  }
                  print '<td align=center><b>7</b></td>';
                  print '<td align=center>'.$row['reps7W4'].'</td>';
                  if ($row['intensity7W4'] == 0 || $row['intensity7W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage7W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity7W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($numOfSets <= 8) {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center><b>8</b></td>';
                  print '<td align=center>'.$row['reps8W1'].'</td>';
                  if ($row['intensity8W1'] == 0 || $row['intensity8W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage8W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity8W1'].'</td>';
                  }
                  print '<td align=center><b>8</b></td>';
                  print '<td align=center>'.$row['reps8W2'].'</td>';
                  if ($row['intensity8W2'] == 0 || $row['intensity8W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage8W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity8W2'].'</td>';
                  }
                  print '<td align=center><b>8</b></td>';
                  print '<td align=center>'.$row['reps8W3'].'</td>';
                  if ($row['intensity8W3'] == 0 || $row['intensity8W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage8W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity8W3'].'</td>';
                  }
                  print '<td align=center><b>8</b></td>';
                  print '<td align=center>'.$row['reps8W4'].'</td>';
                  if ($row['intensity8W4'] == 0 || $row['intensity8W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage8W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity8W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($numOfSets <= 9) {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center><b>9</b></td>';
                  print '<td align=center>'.$row['reps9W1'].'</td>';
                  if ($row['intensity9W1'] == 0 || $row['intensity9W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage9W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity9W1'].'</td>';
                  }
                  print '<td align=center><b>9</b></td>';
                  print '<td align=center>'.$row['reps9W2'].'</td>';
                  if ($row['intensity9W2'] == 0 || $row['intensity9W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage9W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity9W2'].'</td>';
                  }
                  print '<td align=center><b>9</b></td>';
                  print '<td align=center>'.$row['reps9W3'].'</td>';
                  if ($row['intensity9W3'] == 0 || $row['intensity9W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage9W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity9W3'].'</td>';
                  }
                  print '<td align=center><b>9</b></td>';
                  print '<td align=center>'.$row['reps9W4'].'</td>';
                  if ($row['intensity9W4'] == 0 || $row['intensity9W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage9W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity9W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($numOfSets <= 10) {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center><b>10</b></td>';
                  print '<td align=center>'.$row['reps10W1'].'</td>';
                  if ($row['intensity10W1'] == 0 || $row['intensity10W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage10W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity10W1'].'</td>';
                  }
                  print '<td align=center><b>10</b></td>';
                  print '<td align=center>'.$row['reps10W2'].'</td>';
                  if ($row['intensity10W2'] == 0 || $row['intensity10W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage10W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity10W2'].'</td>';
                  }
                  print '<td align=center><b>10</b></td>';
                  print '<td align=center>'.$row['reps10W3'].'</td>';
                  if ($row['intensity10W3'] == 0 || $row['intensity10W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage10W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity10W3'].'</td>';
                  }
                  print '<td align=center><b>10</b></td>';
                  print '<td align=center>'.$row['reps10W4'].'</td>';
                  if ($row['intensity10W4'] == 0 || $row['intensity10W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage10W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity10W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  print '<th>Tempo</th>';
                  print '<td align=center></td>';
                  print '<td colspan=3 align=center>'.$row['tempoW1'].'</td>';
                  print '<td colspan=3 align=center>'.$row['tempoW2'].'</td>';
                  print '<td colspan=3 align=center>'.$row['tempoW3'].'</td>';
                  print '<td colspan=3 align=center>'.$row['tempoW4'].'</td>';
                  print '</tr>';
                  print '<tr>';
                  print '<th>Rest</th>';
                  print '<td align=center></td>';
                  print '<td colspan=3 align=center>'.$row['restW1'].'</td>';
                  print '<td colspan=3 align=center>'.$row['restW2'].'</td>';
                  print '<td colspan=3 align=center>'.$row['restW3'].'</td>';
                  print '<td colspan=3 align=center>'.$row['restW4'].'</td>';
                  print '</tr>';
                  print '<tr>';
                  print '<td colspan=14 bgcolor=#000000>';
                  print '</td>';
                  print '</tr>';
                  print '</thead>';
                  }
                  print '</tbody>';
                  print '</table>';
                  print '</div>';
                  print '</div>';
                  echo '<p class="pageBreak"></p>';
                  print "<hr id='removeHr'>";

                  $sql = 'SELECT * FROM `'.$currentWorkoutThree."` where athlete='$name' ORDER BY exerciseOrder";

                  $result = mysqli_query($connection, $sql);

                  print '<h4><b><u> DAY THREE </u></b></h4>';

                  #Creates the table Header
                  print "<div class='table-responsive'>
                                       <div class=\"col-md-10\">
                                       	<table class='table table-striped table-bordered table-condensed'>
                                       		<thead>
                                       		</thead>";
                  print '<tbody>';

                  #Prints out the exercises
                  while ($row = mysqli_fetch_array($result)) {
                  $numOfSets = $row['sets'];
                  $tempThree = strtoupper($tempThree);

                  print '<thead>';
                  print '<tr>';
                  print "<th colspan=2 bgcolor=#000000><center><font color=#FFFFFF><u><b>$tempThree</b></u></font></center></h4></th>";
                  print '<td colspan=3 align=center bgcolor=#FFFF66><b>WEEK 1</b></td>';
                  print '<td colspan=3 align=center bgcolor=#E0E0D1><b>WEEK 2</b></td>';
                  print '<td colspan=3 align=center bgcolor=#FFFF66><b>WEEK 3</b></td>';
                  print '<td colspan=3 align=center bgcolor=#E0E0D1><b>WEEK 4</b></td>';

                  print '</tr>';
                  print '</thead>';

                  print '<thead>';
                  print '<tr>';
                  print '<th>Exercise Order</th>';
                  print '<td align=center>'.$row['exerciseOrder'].'</td>';
                  print '<td align=center><b>Set</b></td>';
                  print '<td align=center><b>Reps</b></td>';
                  print '<td align=center><b>Weight</b></td>';
                  print '<td align=center><b>Set</b></td>';
                  print '<td align=center><b>Reps</b></td>';
                  print '<td align=center><b>Weight</b></td>';
                  print '<td align=center><b>Set</b></td>';
                  print '<td align=center><b>Reps</b></td>';
                  print '<td align=center><b>Weight</b></td>';
                  print '<td align=center><b>Set</b></td>';
                  print '<td align=center><b>Reps</b></td>';
                  print '<td align=center><b>Weight</b></td>';
                  print '</tr>';
                  print '<tr>';
                  print '<th>Exercise Name</th>';
                  $tempExercise = strstr($row['exerciseName'], '-', true);
                  print '<td align=center>'.$tempExercise.'</td>';
                  if ($numOfSets <= $sets1) {
                  print '<td align=center><b>1</b></td>';
                  print '<td align=center>'.$row['reps1W1'].'</td>';
                  if ($row['intensity1W1'] == 0 || $row['intensity1W1'] === 0) {
                     print '<td align=center>'.$row['calcWeight1W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity1W1'].'</td>';
                  }
                  print '<td align=center><b>1</b></td>';
                  print '<td align=center>'.$row['reps1W2'].'</td>';
                  if ($row['intensity1W2'] == 0 || $row['intensity1W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage1W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity1W2'].'</td>';
                  }
                  print '<td align=center><b>1</b></td>';
                  print '<td align=center>'.$row['reps1W3'].'</td>';
                  if ($row['intensity1W3'] == 0 || $row['intensity1W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage1W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity1W3'].'</td>';
                  }
                  print '<td align=center><b>1</b></td>';
                  print '<td align=center>'.$row['reps1W4'].'</td>';
                  if ($row['intensity1W4'] == 0 || $row['intensity1W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage1W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity1W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  print '<th></th>';
                  print '<td align=center></td>';
                  if ($numOfSets <= 2) {
                  print '<td align=center><b>2</b></td>';
                  print '<td align=center>'.$row['reps2W1'].'</td>';
                  if ($row['intensity2W1'] == 0 || $row['intensity2W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage2W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity2W1'].'</td>';
                  }
                  print '<td align=center><b>2</b></td>';
                  print '<td align=center>'.$row['reps2W2'].'</td>';
                  if ($row['intensity2W2'] == 0 || $row['intensity2W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage2W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity2W2'].'</td>';
                  }
                  print '<td align=center><b>2</b></td>';
                  print '<td align=center>'.$row['reps2W3'].'</td>';
                  if ($row['intensity2W3'] == 0 || $row['intensity2W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage2W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity2W3'].'</td>';
                  }
                  print '<td align=center><b>2</b></td>';
                  print '<td align=center>'.$row['reps2W4'].'</td>';
                  if ($row['intensity2W4'] == 0 || $row['intensity2W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage2W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity2W4'].'</td>';
                  }
                  } else {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  }
                  print '</tr>';
                  print '<tr>';
                  print '<th></th>';
                  print '<td align=center></td>';
                  if ($numOfSets <= 3) {
                  print '<td align=center><b>3</b></td>';
                  print '<td align=center>'.$row['reps3W1'].'</td>';
                  if ($row['intensity3W1'] == 0 || $row['intensity3W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage3W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity3W1'].'</td>';
                  }
                  print '<td align=center><b>3</b></td>';
                  print '<td align=center>'.$row['reps3W2'].'</td>';
                  if ($row['intensity3W2'] == 0 || $row['intensity3W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage3W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity3W2'].'</td>';
                  }
                  print '<td align=center><b>3</b></td>';
                  print '<td align=center>'.$row['reps3W3'].'</td>';
                  if ($row['intensity3W3'] == 0 || $row['intensity3W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage3W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity3W3'].'</td>';
                  }
                  print '<td align=center><b>3</b></td>';
                  print '<td align=center>'.$row['reps3W4'].'</td>';
                  if ($row['intensity3W4'] == 0 || $row['intensity3W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage3W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity3W4'].'</td>';
                  }
                  } else {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($numOfSets <= 4) {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center><b>4</b></td>';
                  print '<td align=center>'.$row['reps4W1'].'</td>';
                  if ($row['intensity4W1'] == 0 || $row['intensity4W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage4W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity4W1'].'</td>';
                  }
                  print '<td align=center><b>4</b></td>';
                  print '<td align=center>'.$row['reps4W2'].'</td>';
                  if ($row['intensity4W2'] == 0 || $row['intensity4W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage4W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity4W2'].'</td>';
                  }
                  print '<td align=center><b>4</b></td>';
                  print '<td align=center>'.$row['reps4W3'].'</td>';
                  if ($row['intensity4W3'] == 0 || $row['intensity4W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage4W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity4W3'].'</td>';
                  }
                  print '<td align=center><b>4</b></td>';
                  print '<td align=center>'.$row['reps4W4'].'</td>';
                  if ($row['intensity4W4'] == 0 || $row['intensity4W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage4W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity4W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($numOfSets <= 5) {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center><b>5</b></td>';
                  print '<td align=center>'.$row['reps5W1'].'</td>';
                  if ($row['intensity5W1'] == 0 || $row['intensity5W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage5W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity5W1'].'</td>';
                  }
                  print '<td align=center><b>5</b></td>';
                  print '<td align=center>'.$row['reps5W2'].'</td>';
                  if ($row['intensity5W2'] == 0 || $row['intensity5W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage5W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity5W2'].'</td>';
                  }
                  print '<td align=center><b>5</b></td>';
                  print '<td align=center>'.$row['reps5W3'].'</td>';
                  if ($row['intensity5W3'] == 0 || $row['intensity5W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage5W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity5W3'].'</td>';
                  }
                  print '<td align=center><b>5</b></td>';
                  print '<td align=center>'.$row['reps5W4'].'</td>';
                  if ($row['intensity5W4'] == 0 || $row['intensity5W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage5W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity5W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($numOfSets <= 6) {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center><b>6</b></td>';
                  print '<td align=center>'.$row['reps6W1'].'</td>';
                  if ($row['intensity6W1'] == 0 || $row['intensity6W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage6W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity6W1'].'</td>';
                  }
                  print '<td align=center><b>6</b></td>';
                  print '<td align=center>'.$row['reps6W2'].'</td>';
                  if ($row['intensity6W2'] == 0 || $row['intensity6W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage6W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity6W2'].'</td>';
                  }
                  print '<td align=center><b>6</b></td>';
                  print '<td align=center>'.$row['reps6W3'].'</td>';
                  if ($row['intensity6W3'] == 0 || $row['intensity6W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage6W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity6W3'].'</td>';
                  }
                  print '<td align=center><b>6</b></td>';
                  print '<td align=center>'.$row['reps6W4'].'</td>';
                  if ($row['intensity6W4'] == 0 || $row['intensity6W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage6W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity6W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($numOfSets <= 7) {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center><b>7</b></td>';
                  print '<td align=center>'.$row['reps7W1'].'</td>';
                  if ($row['intensity7W1'] == 0 || $row['intensity7W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage7W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity7W1'].'</td>';
                  }
                  print '<td align=center><b>7</b></td>';
                  print '<td align=center>'.$row['reps7W2'].'</td>';
                  if ($row['intensity7W2'] == 0 || $row['intensity7W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage7W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity7W2'].'</td>';
                  }
                  print '<td align=center><b>7</b></td>';
                  print '<td align=center>'.$row['reps7W3'].'</td>';
                  if ($row['intensity7W3'] == 0 || $row['intensity7W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage7W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity7W3'].'</td>';
                  }
                  print '<td align=center><b>7</b></td>';
                  print '<td align=center>'.$row['reps7W4'].'</td>';
                  if ($row['intensity7W4'] == 0 || $row['intensity7W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage7W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity7W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($numOfSets <= 8) {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center><b>8</b></td>';
                  print '<td align=center>'.$row['reps8W1'].'</td>';
                  if ($row['intensity8W1'] == 0 || $row['intensity8W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage8W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity8W1'].'</td>';
                  }
                  print '<td align=center><b>8</b></td>';
                  print '<td align=center>'.$row['reps8W2'].'</td>';
                  if ($row['intensity8W2'] == 0 || $row['intensity8W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage8W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity8W2'].'</td>';
                  }
                  print '<td align=center><b>8</b></td>';
                  print '<td align=center>'.$row['reps8W3'].'</td>';
                  if ($row['intensity8W3'] == 0 || $row['intensity8W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage8W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity8W3'].'</td>';
                  }
                  print '<td align=center><b>8</b></td>';
                  print '<td align=center>'.$row['reps8W4'].'</td>';
                  if ($row['intensity8W4'] == 0 || $row['intensity8W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage8W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity8W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($numOfSets <= 9) {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center><b>9</b></td>';
                  print '<td align=center>'.$row['reps9W1'].'</td>';
                  if ($row['intensity9W1'] == 0 || $row['intensity9W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage9W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity9W1'].'</td>';
                  }
                  print '<td align=center><b>9</b></td>';
                  print '<td align=center>'.$row['reps9W2'].'</td>';
                  if ($row['intensity9W2'] == 0 || $row['intensity9W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage9W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity9W2'].'</td>';
                  }
                  print '<td align=center><b>9</b></td>';
                  print '<td align=center>'.$row['reps9W3'].'</td>';
                  if ($row['intensity9W3'] == 0 || $row['intensity9W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage9W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity9W3'].'</td>';
                  }
                  print '<td align=center><b>9</b></td>';
                  print '<td align=center>'.$row['reps9W4'].'</td>';
                  if ($row['intensity9W4'] == 0 || $row['intensity9W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage9W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity9W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($numOfSets <= 10) {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center><b>10</b></td>';
                  print '<td align=center>'.$row['reps10W1'].'</td>';
                  if ($row['intensity10W1'] == 0 || $row['intensity10W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage10W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity10W1'].'</td>';
                  }
                  print '<td align=center><b>10</b></td>';
                  print '<td align=center>'.$row['reps10W2'].'</td>';
                  if ($row['intensity10W2'] == 0 || $row['intensity10W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage10W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity10W2'].'</td>';
                  }
                  print '<td align=center><b>10</b></td>';
                  print '<td align=center>'.$row['reps10W3'].'</td>';
                  if ($row['intensity10W3'] == 0 || $row['intensity10W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage10W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity10W3'].'</td>';
                  }
                  print '<td align=center><b>10</b></td>';
                  print '<td align=center>'.$row['reps10W4'].'</td>';
                  if ($row['intensity10W4'] == 0 || $row['intensity10W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage10W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity10W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  print '<th>Tempo</th>';
                  print '<td align=center></td>';
                  print '<td colspan=3 align=center>'.$row['tempoW1'].'</td>';
                  print '<td colspan=3 align=center>'.$row['tempoW2'].'</td>';
                  print '<td colspan=3 align=center>'.$row['tempoW3'].'</td>';
                  print '<td colspan=3 align=center>'.$row['tempoW4'].'</td>';
                  print '</tr>';
                  print '<tr>';
                  print '<th>Rest</th>';
                  print '<td align=center></td>';
                  print '<td colspan=3 align=center>'.$row['restW1'].'</td>';
                  print '<td colspan=3 align=center>'.$row['restW2'].'</td>';
                  print '<td colspan=3 align=center>'.$row['restW3'].'</td>';
                  print '<td colspan=3 align=center>'.$row['restW4'].'</td>';
                  print '</tr>';
                  print '<tr>';
                  print '<td colspan=14 bgcolor=#000000>';
                  print '</td>';
                  print '</tr>';
                  print '</thead>';
                  }
                  print '</tbody>';
                  print '</table>';
                  print '</div>';
                  print '</div>';
                  echo '<p class="pageBreak"></p>';
                  print "<hr id='removeHr'>";

                  $sql = 'SELECT * FROM `'.$currentWorkoutFour."` where athlete='$name' ORDER BY exerciseOrder";

                  $result = mysqli_query($connection, $sql);

                  print '<h4><b><u> DAY FOUR </u></b></h4>';

                  #Creates the table Header
                  print "<div class='table-responsive'>
                                       <div class=\"col-md-10\">
                                       	<table class='table table-striped table-bordered table-condensed'>
                                       		<thead>
                                       		</thead>";
                  print '<tbody>';

                  #Prints out the exercises
                  while ($row = mysqli_fetch_array($result)) {
                  $numOfSets = $row['sets'];
                  $tempFour = strtoupper($tempFour);

                  print '<thead>';
                  print '<tr>';
                  print "<th colspan=2 bgcolor=#000000><center><font color=#FFFFFF><u><b>$tempFour</b></u></font></center></h4></th>";
                  print '<td colspan=3 align=center bgcolor=#FFFF66><b>WEEK 1</b></td>';
                  print '<td colspan=3 align=center bgcolor=#E0E0D1><b>WEEK 2</b></td>';
                  print '<td colspan=3 align=center bgcolor=#FFFF66><b>WEEK 3</b></td>';
                  print '<td colspan=3 align=center bgcolor=#E0E0D1><b>WEEK 4</b></td>';

                  print '</tr>';
                  print '</thead>';

                  print '<thead>';
                  print '<tr>';
                  print '<th>Exercise Order</th>';
                  print '<td align=center>'.$row['exerciseOrder'].'</td>';
                  print '<td align=center><b>Set</b></td>';
                  print '<td align=center><b>Reps</b></td>';
                  print '<td align=center><b>Weight</b></td>';
                  print '<td align=center><b>Set</b></td>';
                  print '<td align=center><b>Reps</b></td>';
                  print '<td align=center><b>Weight</b></td>';
                  print '<td align=center><b>Set</b></td>';
                  print '<td align=center><b>Reps</b></td>';
                  print '<td align=center><b>Weight</b></td>';
                  print '<td align=center><b>Set</b></td>';
                  print '<td align=center><b>Reps</b></td>';
                  print '<td align=center><b>Weight</b></td>';
                  print '</tr>';
                  print '<tr>';
                  print '<th>Exercise Name</th>';
                  $tempExercise = strstr($row['exerciseName'], '-', true);
                  print '<td align=center>'.$tempExercise.'</td>';
                  if ($numOfSets <= $sets1) {
                  print '<td align=center><b>1</b></td>';
                  print '<td align=center>'.$row['reps1W1'].'</td>';
                  if ($row['intensity1W1'] == 0 || $row['intensity1W1'] === 0) {
                     print '<td align=center>'.$row['calcWeight1W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity1W1'].'</td>';
                  }
                  print '<td align=center><b>1</b></td>';
                  print '<td align=center>'.$row['reps1W2'].'</td>';
                  if ($row['intensity1W2'] == 0 || $row['intensity1W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage1W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity1W2'].'</td>';
                  }
                  print '<td align=center><b>1</b></td>';
                  print '<td align=center>'.$row['reps1W3'].'</td>';
                  if ($row['intensity1W3'] == 0 || $row['intensity1W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage1W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity1W3'].'</td>';
                  }
                  print '<td align=center><b>1</b></td>';
                  print '<td align=center>'.$row['reps1W4'].'</td>';
                  if ($row['intensity1W4'] == 0 || $row['intensity1W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage1W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity1W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  print '<th></th>';
                  print '<td align=center></td>';
                  if ($numOfSets <= 2) {
                  print '<td align=center><b>2</b></td>';
                  print '<td align=center>'.$row['reps2W1'].'</td>';
                  if ($row['intensity2W1'] == 0 || $row['intensity2W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage2W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity2W1'].'</td>';
                  }
                  print '<td align=center><b>2</b></td>';
                  print '<td align=center>'.$row['reps2W2'].'</td>';
                  if ($row['intensity2W2'] == 0 || $row['intensity2W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage2W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity2W2'].'</td>';
                  }
                  print '<td align=center><b>2</b></td>';
                  print '<td align=center>'.$row['reps2W3'].'</td>';
                  if ($row['intensity2W3'] == 0 || $row['intensity2W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage2W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity2W3'].'</td>';
                  }
                  print '<td align=center><b>2</b></td>';
                  print '<td align=center>'.$row['reps2W4'].'</td>';
                  if ($row['intensity2W4'] == 0 || $row['intensity2W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage2W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity2W4'].'</td>';
                  }
                  } else {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  }
                  print '</tr>';
                  print '<tr>';
                  print '<th></th>';
                  print '<td align=center></td>';
                  if ($numOfSets <= 3) {
                  print '<td align=center><b>3</b></td>';
                  print '<td align=center>'.$row['reps3W1'].'</td>';
                  if ($row['intensity3W1'] == 0 || $row['intensity3W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage3W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity3W1'].'</td>';
                  }
                  print '<td align=center><b>3</b></td>';
                  print '<td align=center>'.$row['reps3W2'].'</td>';
                  if ($row['intensity3W2'] == 0 || $row['intensity3W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage3W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity3W2'].'</td>';
                  }
                  print '<td align=center><b>3</b></td>';
                  print '<td align=center>'.$row['reps3W3'].'</td>';
                  if ($row['intensity3W3'] == 0 || $row['intensity3W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage3W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity3W3'].'</td>';
                  }
                  print '<td align=center><b>3</b></td>';
                  print '<td align=center>'.$row['reps3W4'].'</td>';
                  if ($row['intensity3W4'] == 0 || $row['intensity3W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage3W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity3W4'].'</td>';
                  }
                  } else {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($numOfSets <= 4) {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center><b>4</b></td>';
                  print '<td align=center>'.$row['reps4W1'].'</td>';
                  if ($row['intensity4W1'] == 0 || $row['intensity4W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage4W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity4W1'].'</td>';
                  }
                  print '<td align=center><b>4</b></td>';
                  print '<td align=center>'.$row['reps4W2'].'</td>';
                  if ($row['intensity4W2'] == 0 || $row['intensity4W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage4W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity4W2'].'</td>';
                  }
                  print '<td align=center><b>4</b></td>';
                  print '<td align=center>'.$row['reps4W3'].'</td>';
                  if ($row['intensity4W3'] == 0 || $row['intensity4W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage4W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity4W3'].'</td>';
                  }
                  print '<td align=center><b>4</b></td>';
                  print '<td align=center>'.$row['reps4W4'].'</td>';
                  if ($row['intensity4W4'] == 0 || $row['intensity4W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage4W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity4W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($numOfSets <= 5) {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center><b>5</b></td>';
                  print '<td align=center>'.$row['reps5W1'].'</td>';
                  if ($row['intensity5W1'] == 0 || $row['intensity5W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage5W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity5W1'].'</td>';
                  }
                  print '<td align=center><b>5</b></td>';
                  print '<td align=center>'.$row['reps5W2'].'</td>';
                  if ($row['intensity5W2'] == 0 || $row['intensity5W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage5W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity5W2'].'</td>';
                  }
                  print '<td align=center><b>5</b></td>';
                  print '<td align=center>'.$row['reps5W3'].'</td>';
                  if ($row['intensity5W3'] == 0 || $row['intensity5W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage5W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity5W3'].'</td>';
                  }
                  print '<td align=center><b>5</b></td>';
                  print '<td align=center>'.$row['reps5W4'].'</td>';
                  if ($row['intensity5W4'] == 0 || $row['intensity5W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage5W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity5W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($numOfSets <= 6) {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center><b>6</b></td>';
                  print '<td align=center>'.$row['reps6W1'].'</td>';
                  if ($row['intensity6W1'] == 0 || $row['intensity6W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage6W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity6W1'].'</td>';
                  }
                  print '<td align=center><b>6</b></td>';
                  print '<td align=center>'.$row['reps6W2'].'</td>';
                  if ($row['intensity6W2'] == 0 || $row['intensity6W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage6W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity6W2'].'</td>';
                  }
                  print '<td align=center><b>6</b></td>';
                  print '<td align=center>'.$row['reps6W3'].'</td>';
                  if ($row['intensity6W3'] == 0 || $row['intensity6W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage6W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity6W3'].'</td>';
                  }
                  print '<td align=center><b>6</b></td>';
                  print '<td align=center>'.$row['reps6W4'].'</td>';
                  if ($row['intensity6W4'] == 0 || $row['intensity6W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage6W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity6W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($numOfSets <= 7) {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center><b>7</b></td>';
                  print '<td align=center>'.$row['reps7W1'].'</td>';
                  if ($row['intensity7W1'] == 0 || $row['intensity7W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage7W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity7W1'].'</td>';
                  }
                  print '<td align=center><b>7</b></td>';
                  print '<td align=center>'.$row['reps7W2'].'</td>';
                  if ($row['intensity7W2'] == 0 || $row['intensity7W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage7W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity7W2'].'</td>';
                  }
                  print '<td align=center><b>7</b></td>';
                  print '<td align=center>'.$row['reps7W3'].'</td>';
                  if ($row['intensity7W3'] == 0 || $row['intensity7W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage7W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity7W3'].'</td>';
                  }
                  print '<td align=center><b>7</b></td>';
                  print '<td align=center>'.$row['reps7W4'].'</td>';
                  if ($row['intensity7W4'] == 0 || $row['intensity7W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage7W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity7W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($numOfSets <= 8) {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center><b>8</b></td>';
                  print '<td align=center>'.$row['reps8W1'].'</td>';
                  if ($row['intensity8W1'] == 0 || $row['intensity8W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage8W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity8W1'].'</td>';
                  }
                  print '<td align=center><b>8</b></td>';
                  print '<td align=center>'.$row['reps8W2'].'</td>';
                  if ($row['intensity8W2'] == 0 || $row['intensity8W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage8W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity8W2'].'</td>';
                  }
                  print '<td align=center><b>8</b></td>';
                  print '<td align=center>'.$row['reps8W3'].'</td>';
                  if ($row['intensity8W3'] == 0 || $row['intensity8W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage8W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity8W3'].'</td>';
                  }
                  print '<td align=center><b>8</b></td>';
                  print '<td align=center>'.$row['reps8W4'].'</td>';
                  if ($row['intensity8W4'] == 0 || $row['intensity8W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage8W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity8W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($numOfSets <= 9) {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center><b>9</b></td>';
                  print '<td align=center>'.$row['reps9W1'].'</td>';
                  if ($row['intensity9W1'] == 0 || $row['intensity9W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage9W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity9W1'].'</td>';
                  }
                  print '<td align=center><b>9</b></td>';
                  print '<td align=center>'.$row['reps9W2'].'</td>';
                  if ($row['intensity9W2'] == 0 || $row['intensity9W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage9W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity9W2'].'</td>';
                  }
                  print '<td align=center><b>9</b></td>';
                  print '<td align=center>'.$row['reps9W3'].'</td>';
                  if ($row['intensity9W3'] == 0 || $row['intensity9W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage9W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity9W3'].'</td>';
                  }
                  print '<td align=center><b>9</b></td>';
                  print '<td align=center>'.$row['reps9W4'].'</td>';
                  if ($row['intensity9W4'] == 0 || $row['intensity9W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage9W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity9W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($numOfSets <= 10) {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center><b>10</b></td>';
                  print '<td align=center>'.$row['reps10W1'].'</td>';
                  if ($row['intensity10W1'] == 0 || $row['intensity10W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage10W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity10W1'].'</td>';
                  }
                  print '<td align=center><b>10</b></td>';
                  print '<td align=center>'.$row['reps10W2'].'</td>';
                  if ($row['intensity10W2'] == 0 || $row['intensity10W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage10W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity10W2'].'</td>';
                  }
                  print '<td align=center><b>10</b></td>';
                  print '<td align=center>'.$row['reps10W3'].'</td>';
                  if ($row['intensity10W3'] == 0 || $row['intensity10W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage10W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity10W3'].'</td>';
                  }
                  print '<td align=center><b>10</b></td>';
                  print '<td align=center>'.$row['reps10W4'].'</td>';
                  if ($row['intensity10W4'] == 0 || $row['intensity10W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage10W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity10W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  print '<th>Tempo</th>';
                  print '<td align=center></td>';
                  print '<td colspan=3 align=center>'.$row['tempoW1'].'</td>';
                  print '<td colspan=3 align=center>'.$row['tempoW2'].'</td>';
                  print '<td colspan=3 align=center>'.$row['tempoW3'].'</td>';
                  print '<td colspan=3 align=center>'.$row['tempoW4'].'</td>';
                  print '</tr>';
                  print '<tr>';
                  print '<th>Rest</th>';
                  print '<td align=center></td>';
                  print '<td colspan=3 align=center>'.$row['restW1'].'</td>';
                  print '<td colspan=3 align=center>'.$row['restW2'].'</td>';
                  print '<td colspan=3 align=center>'.$row['restW3'].'</td>';
                  print '<td colspan=3 align=center>'.$row['restW4'].'</td>';
                  print '</tr>';
                  print '<tr>';
                  print '<td colspan=14 bgcolor=#000000>';
                  print '</td>';
                  print '</tr>';
                  print '</thead>';
                  }
                  print '</tbody>';
                  print '</table>';
                  print '</div>';
                  print '</div>';
                  echo '<p class="pageBreak"></p>';
                  print "<hr id='removeHr'>";

                  $sql = 'SELECT * FROM `'.$currentWorkoutFive."` where athlete='$name' ORDER BY exerciseOrder";

                  $result = mysqli_query($connection, $sql);

                  print '<h4><b><u> DAY FIVE </u></b></h4>';

                  #Creates the table Header
                  print "<div class='table-responsive'>
                                       <div class=\"col-md-10\">
                                       	<table class='table table-striped table-bordered table-condensed'>
                                       		<thead>
                                       		</thead>";
                  print '<tbody>';

                  #Prints out the exercises
                  while ($row = mysqli_fetch_array($result)) {
                  $numOfSets = $row['sets'];
                  $tempFive = strtoupper($tempFive);

                  print '<thead>';
                  print '<tr>';
                  print "<th colspan=2 bgcolor=#000000><center><font color=#FFFFFF><u><b>$tempFive</b></u></font></center></h4></th>";
                  print '<td colspan=3 align=center bgcolor=#FFFF66><b>WEEK 1</b></td>';
                  print '<td colspan=3 align=center bgcolor=#E0E0D1><b>WEEK 2</b></td>';
                  print '<td colspan=3 align=center bgcolor=#FFFF66><b>WEEK 3</b></td>';
                  print '<td colspan=3 align=center bgcolor=#E0E0D1><b>WEEK 4</b></td>';

                  print '</tr>';
                  print '</thead>';

                  print '<thead>';
                  print '<tr>';
                  print '<th>Exercise Order</th>';
                  print '<td align=center>'.$row['exerciseOrder'].'</td>';
                  print '<td align=center><b>Set</b></td>';
                  print '<td align=center><b>Reps</b></td>';
                  print '<td align=center><b>Weight</b></td>';
                  print '<td align=center><b>Set</b></td>';
                  print '<td align=center><b>Reps</b></td>';
                  print '<td align=center><b>Weight</b></td>';
                  print '<td align=center><b>Set</b></td>';
                  print '<td align=center><b>Reps</b></td>';
                  print '<td align=center><b>Weight</b></td>';
                  print '<td align=center><b>Set</b></td>';
                  print '<td align=center><b>Reps</b></td>';
                  print '<td align=center><b>Weight</b></td>';
                  print '</tr>';
                  print '<tr>';
                  print '<th>Exercise Name</th>';
                  $tempExercise = strstr($row['exerciseName'], '-', true);
                  print '<td align=center>'.$tempExercise.'</td>';
                  if ($numOfSets <= $sets1) {
                  print '<td align=center><b>1</b></td>';
                  print '<td align=center>'.$row['reps1W1'].'</td>';
                  if ($row['intensity1W1'] == 0 || $row['intensity1W1'] === 0) {
                     print '<td align=center>'.$row['calcWeight1W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity1W1'].'</td>';
                  }
                  print '<td align=center><b>1</b></td>';
                  print '<td align=center>'.$row['reps1W2'].'</td>';
                  if ($row['intensity1W2'] == 0 || $row['intensity1W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage1W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity1W2'].'</td>';
                  }
                  print '<td align=center><b>1</b></td>';
                  print '<td align=center>'.$row['reps1W3'].'</td>';
                  if ($row['intensity1W3'] == 0 || $row['intensity1W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage1W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity1W3'].'</td>';
                  }
                  print '<td align=center><b>1</b></td>';
                  print '<td align=center>'.$row['reps1W4'].'</td>';
                  if ($row['intensity1W4'] == 0 || $row['intensity1W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage1W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity1W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  print '<th></th>';
                  print '<td align=center></td>';
                  if ($numOfSets <= 2) {
                  print '<td align=center><b>2</b></td>';
                  print '<td align=center>'.$row['reps2W1'].'</td>';
                  if ($row['intensity2W1'] == 0 || $row['intensity2W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage2W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity2W1'].'</td>';
                  }
                  print '<td align=center><b>2</b></td>';
                  print '<td align=center>'.$row['reps2W2'].'</td>';
                  if ($row['intensity2W2'] == 0 || $row['intensity2W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage2W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity2W2'].'</td>';
                  }
                  print '<td align=center><b>2</b></td>';
                  print '<td align=center>'.$row['reps2W3'].'</td>';
                  if ($row['intensity2W3'] == 0 || $row['intensity2W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage2W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity2W3'].'</td>';
                  }
                  print '<td align=center><b>2</b></td>';
                  print '<td align=center>'.$row['reps2W4'].'</td>';
                  if ($row['intensity2W4'] == 0 || $row['intensity2W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage2W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity2W4'].'</td>';
                  }
                  } else {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  }
                  print '</tr>';
                  print '<tr>';
                  print '<th></th>';
                  print '<td align=center></td>';
                  if ($numOfSets <= 3) {
                  print '<td align=center><b>3</b></td>';
                  print '<td align=center>'.$row['reps3W1'].'</td>';
                  if ($row['intensity3W1'] == 0 || $row['intensity3W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage3W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity3W1'].'</td>';
                  }
                  print '<td align=center><b>3</b></td>';
                  print '<td align=center>'.$row['reps3W2'].'</td>';
                  if ($row['intensity3W2'] == 0 || $row['intensity3W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage3W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity3W2'].'</td>';
                  }
                  print '<td align=center><b>3</b></td>';
                  print '<td align=center>'.$row['reps3W3'].'</td>';
                  if ($row['intensity3W3'] == 0 || $row['intensity3W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage3W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity3W3'].'</td>';
                  }
                  print '<td align=center><b>3</b></td>';
                  print '<td align=center>'.$row['reps3W4'].'</td>';
                  if ($row['intensity3W4'] == 0 || $row['intensity3W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage3W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity3W4'].'</td>';
                  }
                  } else {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($numOfSets <= 4) {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center><b>4</b></td>';
                  print '<td align=center>'.$row['reps4W1'].'</td>';
                  if ($row['intensity4W1'] == 0 || $row['intensity4W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage4W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity4W1'].'</td>';
                  }
                  print '<td align=center><b>4</b></td>';
                  print '<td align=center>'.$row['reps4W2'].'</td>';
                  if ($row['intensity4W2'] == 0 || $row['intensity4W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage4W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity4W2'].'</td>';
                  }
                  print '<td align=center><b>4</b></td>';
                  print '<td align=center>'.$row['reps4W3'].'</td>';
                  if ($row['intensity4W3'] == 0 || $row['intensity4W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage4W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity4W3'].'</td>';
                  }
                  print '<td align=center><b>4</b></td>';
                  print '<td align=center>'.$row['reps4W4'].'</td>';
                  if ($row['intensity4W4'] == 0 || $row['intensity4W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage4W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity4W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($numOfSets <= 5) {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center><b>5</b></td>';
                  print '<td align=center>'.$row['reps5W1'].'</td>';
                  if ($row['intensity5W1'] == 0 || $row['intensity5W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage5W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity5W1'].'</td>';
                  }
                  print '<td align=center><b>5</b></td>';
                  print '<td align=center>'.$row['reps5W2'].'</td>';
                  if ($row['intensity5W2'] == 0 || $row['intensity5W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage5W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity5W2'].'</td>';
                  }
                  print '<td align=center><b>5</b></td>';
                  print '<td align=center>'.$row['reps5W3'].'</td>';
                  if ($row['intensity5W3'] == 0 || $row['intensity5W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage5W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity5W3'].'</td>';
                  }
                  print '<td align=center><b>5</b></td>';
                  print '<td align=center>'.$row['reps5W4'].'</td>';
                  if ($row['intensity5W4'] == 0 || $row['intensity5W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage5W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity5W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($numOfSets <= 6) {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center><b>6</b></td>';
                  print '<td align=center>'.$row['reps6W1'].'</td>';
                  if ($row['intensity6W1'] == 0 || $row['intensity6W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage6W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity6W1'].'</td>';
                  }
                  print '<td align=center><b>6</b></td>';
                  print '<td align=center>'.$row['reps6W2'].'</td>';
                  if ($row['intensity6W2'] == 0 || $row['intensity6W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage6W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity6W2'].'</td>';
                  }
                  print '<td align=center><b>6</b></td>';
                  print '<td align=center>'.$row['reps6W3'].'</td>';
                  if ($row['intensity6W3'] == 0 || $row['intensity6W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage6W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity6W3'].'</td>';
                  }
                  print '<td align=center><b>6</b></td>';
                  print '<td align=center>'.$row['reps6W4'].'</td>';
                  if ($row['intensity6W4'] == 0 || $row['intensity6W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage6W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity6W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($numOfSets <= 7) {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center><b>7</b></td>';
                  print '<td align=center>'.$row['reps7W1'].'</td>';
                  if ($row['intensity7W1'] == 0 || $row['intensity7W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage7W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity7W1'].'</td>';
                  }
                  print '<td align=center><b>7</b></td>';
                  print '<td align=center>'.$row['reps7W2'].'</td>';
                  if ($row['intensity7W2'] == 0 || $row['intensity7W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage7W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity7W2'].'</td>';
                  }
                  print '<td align=center><b>7</b></td>';
                  print '<td align=center>'.$row['reps7W3'].'</td>';
                  if ($row['intensity7W3'] == 0 || $row['intensity7W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage7W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity7W3'].'</td>';
                  }
                  print '<td align=center><b>7</b></td>';
                  print '<td align=center>'.$row['reps7W4'].'</td>';
                  if ($row['intensity7W4'] == 0 || $row['intensity7W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage7W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity7W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($numOfSets <= 8) {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center><b>8</b></td>';
                  print '<td align=center>'.$row['reps8W1'].'</td>';
                  if ($row['intensity8W1'] == 0 || $row['intensity8W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage8W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity8W1'].'</td>';
                  }
                  print '<td align=center><b>8</b></td>';
                  print '<td align=center>'.$row['reps8W2'].'</td>';
                  if ($row['intensity8W2'] == 0 || $row['intensity8W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage8W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity8W2'].'</td>';
                  }
                  print '<td align=center><b>8</b></td>';
                  print '<td align=center>'.$row['reps8W3'].'</td>';
                  if ($row['intensity8W3'] == 0 || $row['intensity8W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage8W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity8W3'].'</td>';
                  }
                  print '<td align=center><b>8</b></td>';
                  print '<td align=center>'.$row['reps8W4'].'</td>';
                  if ($row['intensity8W4'] == 0 || $row['intensity8W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage8W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity8W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($numOfSets <= 9) {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center><b>9</b></td>';
                  print '<td align=center>'.$row['reps9W1'].'</td>';
                  if ($row['intensity9W1'] == 0 || $row['intensity9W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage9W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity9W1'].'</td>';
                  }
                  print '<td align=center><b>9</b></td>';
                  print '<td align=center>'.$row['reps9W2'].'</td>';
                  if ($row['intensity9W2'] == 0 || $row['intensity9W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage9W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity9W2'].'</td>';
                  }
                  print '<td align=center><b>9</b></td>';
                  print '<td align=center>'.$row['reps9W3'].'</td>';
                  if ($row['intensity9W3'] == 0 || $row['intensity9W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage9W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity9W3'].'</td>';
                  }
                  print '<td align=center><b>9</b></td>';
                  print '<td align=center>'.$row['reps9W4'].'</td>';
                  if ($row['intensity9W4'] == 0 || $row['intensity9W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage9W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity9W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($numOfSets <= 10) {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center><b>10</b></td>';
                  print '<td align=center>'.$row['reps10W1'].'</td>';
                  if ($row['intensity10W1'] == 0 || $row['intensity10W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage10W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity10W1'].'</td>';
                  }
                  print '<td align=center><b>10</b></td>';
                  print '<td align=center>'.$row['reps10W2'].'</td>';
                  if ($row['intensity10W2'] == 0 || $row['intensity10W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage10W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity10W2'].'</td>';
                  }
                  print '<td align=center><b>10</b></td>';
                  print '<td align=center>'.$row['reps10W3'].'</td>';
                  if ($row['intensity10W3'] == 0 || $row['intensity10W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage10W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity10W3'].'</td>';
                  }
                  print '<td align=center><b>10</b></td>';
                  print '<td align=center>'.$row['reps10W4'].'</td>';
                  if ($row['intensity10W4'] == 0 || $row['intensity10W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage10W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity10W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  print '<th>Tempo</th>';
                  print '<td align=center></td>';
                  print '<td colspan=3 align=center>'.$row['tempoW1'].'</td>';
                  print '<td colspan=3 align=center>'.$row['tempoW2'].'</td>';
                  print '<td colspan=3 align=center>'.$row['tempoW3'].'</td>';
                  print '<td colspan=3 align=center>'.$row['tempoW4'].'</td>';
                  print '</tr>';
                  print '<tr>';
                  print '<th>Rest</th>';
                  print '<td align=center></td>';
                  print '<td colspan=3 align=center>'.$row['restW1'].'</td>';
                  print '<td colspan=3 align=center>'.$row['restW2'].'</td>';
                  print '<td colspan=3 align=center>'.$row['restW3'].'</td>';
                  print '<td colspan=3 align=center>'.$row['restW4'].'</td>';
                  print '</tr>';
                  print '<tr>';
                  print '<td colspan=14 bgcolor=#000000>';
                  print '</td>';
                  print '</tr>';
                  print '</thead>';
                  }
                  print '</tbody>';
                  print '</table>';
                  print '</div>';
                  print '</div>';
                  echo '<p class="pageBreak"></p>';
                  print "<hr id='removeHr'>";

                  $sql = 'SELECT * FROM `'.$currentWorkoutSix."` where athlete='$name' ORDER BY exerciseOrder";

                  $result = mysqli_query($connection, $sql);

                  print '<h4><b><u> DAY SIX </u></b></h4>';

                  #Creates the table Header
                  print "<div class='table-responsive'>
                                       <div class=\"col-md-10\">
                                       	<table class='table table-striped table-bordered table-condensed'>
                                       		<thead>
                                       		</thead>";
                  print '<tbody>';

                  #Prints out the exercises
                  while ($row = mysqli_fetch_array($result)) {
                  $numOfSets = $row['sets'];
                  $tempSix = strtoupper($tempSix);

                  print '<thead>';
                  print '<tr>';
                  print "<th colspan=2 bgcolor=#000000><center><font color=#FFFFFF><u><b>$tempSix</b></u></font></center></h4></th>";
                  print '<td colspan=3 align=center bgcolor=#FFFF66><b>WEEK 1</b></td>';
                  print '<td colspan=3 align=center bgcolor=#E0E0D1><b>WEEK 2</b></td>';
                  print '<td colspan=3 align=center bgcolor=#FFFF66><b>WEEK 3</b></td>';
                  print '<td colspan=3 align=center bgcolor=#E0E0D1><b>WEEK 4</b></td>';

                  print '</tr>';
                  print '</thead>';

                  print '<thead>';
                  print '<tr>';
                  print '<th>Exercise Order</th>';
                  print '<td align=center>'.$row['exerciseOrder'].'</td>';
                  print '<td align=center><b>Set</b></td>';
                  print '<td align=center><b>Reps</b></td>';
                  print '<td align=center><b>Weight</b></td>';
                  print '<td align=center><b>Set</b></td>';
                  print '<td align=center><b>Reps</b></td>';
                  print '<td align=center><b>Weight</b></td>';
                  print '<td align=center><b>Set</b></td>';
                  print '<td align=center><b>Reps</b></td>';
                  print '<td align=center><b>Weight</b></td>';
                  print '<td align=center><b>Set</b></td>';
                  print '<td align=center><b>Reps</b></td>';
                  print '<td align=center><b>Weight</b></td>';
                  print '</tr>';
                  print '<tr>';
                  print '<th>Exercise Name</th>';
                  $tempExercise = strstr($row['exerciseName'], '-', true);
                  print '<td align=center>'.$tempExercise.'</td>';
                  if ($numOfSets <= $sets1) {
                  print '<td align=center><b>1</b></td>';
                  print '<td align=center>'.$row['reps1W1'].'</td>';
                  if ($row['intensity1W1'] == 0 || $row['intensity1W1'] === 0) {
                     print '<td align=center>'.$row['calcWeight1W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity1W1'].'</td>';
                  }
                  print '<td align=center><b>1</b></td>';
                  print '<td align=center>'.$row['reps1W2'].'</td>';
                  if ($row['intensity1W2'] == 0 || $row['intensity1W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage1W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity1W2'].'</td>';
                  }
                  print '<td align=center><b>1</b></td>';
                  print '<td align=center>'.$row['reps1W3'].'</td>';
                  if ($row['intensity1W3'] == 0 || $row['intensity1W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage1W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity1W3'].'</td>';
                  }
                  print '<td align=center><b>1</b></td>';
                  print '<td align=center>'.$row['reps1W4'].'</td>';
                  if ($row['intensity1W4'] == 0 || $row['intensity1W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage1W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity1W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  print '<th></th>';
                  print '<td align=center></td>';
                  if ($numOfSets <= 2) {
                  print '<td align=center><b>2</b></td>';
                  print '<td align=center>'.$row['reps2W1'].'</td>';
                  if ($row['intensity2W1'] == 0 || $row['intensity2W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage2W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity2W1'].'</td>';
                  }
                  print '<td align=center><b>2</b></td>';
                  print '<td align=center>'.$row['reps2W2'].'</td>';
                  if ($row['intensity2W2'] == 0 || $row['intensity2W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage2W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity2W2'].'</td>';
                  }
                  print '<td align=center><b>2</b></td>';
                  print '<td align=center>'.$row['reps2W3'].'</td>';
                  if ($row['intensity2W3'] == 0 || $row['intensity2W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage2W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity2W3'].'</td>';
                  }
                  print '<td align=center><b>2</b></td>';
                  print '<td align=center>'.$row['reps2W4'].'</td>';
                  if ($row['intensity2W4'] == 0 || $row['intensity2W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage2W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity2W4'].'</td>';
                  }
                  } else {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  }
                  print '</tr>';
                  print '<tr>';
                  print '<th></th>';
                  print '<td align=center></td>';
                  if ($numOfSets <= 3) {
                  print '<td align=center><b>3</b></td>';
                  print '<td align=center>'.$row['reps3W1'].'</td>';
                  if ($row['intensity3W1'] == 0 || $row['intensity3W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage3W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity3W1'].'</td>';
                  }
                  print '<td align=center><b>3</b></td>';
                  print '<td align=center>'.$row['reps3W2'].'</td>';
                  if ($row['intensity3W2'] == 0 || $row['intensity3W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage3W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity3W2'].'</td>';
                  }
                  print '<td align=center><b>3</b></td>';
                  print '<td align=center>'.$row['reps3W3'].'</td>';
                  if ($row['intensity3W3'] == 0 || $row['intensity3W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage3W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity3W3'].'</td>';
                  }
                  print '<td align=center><b>3</b></td>';
                  print '<td align=center>'.$row['reps3W4'].'</td>';
                  if ($row['intensity3W4'] == 0 || $row['intensity3W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage3W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity3W4'].'</td>';
                  }
                  } else {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($numOfSets <= 4) {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center><b>4</b></td>';
                  print '<td align=center>'.$row['reps4W1'].'</td>';
                  if ($row['intensity4W1'] == 0 || $row['intensity4W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage4W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity4W1'].'</td>';
                  }
                  print '<td align=center><b>4</b></td>';
                  print '<td align=center>'.$row['reps4W2'].'</td>';
                  if ($row['intensity4W2'] == 0 || $row['intensity4W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage4W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity4W2'].'</td>';
                  }
                  print '<td align=center><b>4</b></td>';
                  print '<td align=center>'.$row['reps4W3'].'</td>';
                  if ($row['intensity4W3'] == 0 || $row['intensity4W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage4W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity4W3'].'</td>';
                  }
                  print '<td align=center><b>4</b></td>';
                  print '<td align=center>'.$row['reps4W4'].'</td>';
                  if ($row['intensity4W4'] == 0 || $row['intensity4W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage4W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity4W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($numOfSets <= 5) {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center><b>5</b></td>';
                  print '<td align=center>'.$row['reps5W1'].'</td>';
                  if ($row['intensity5W1'] == 0 || $row['intensity5W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage5W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity5W1'].'</td>';
                  }
                  print '<td align=center><b>5</b></td>';
                  print '<td align=center>'.$row['reps5W2'].'</td>';
                  if ($row['intensity5W2'] == 0 || $row['intensity5W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage5W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity5W2'].'</td>';
                  }
                  print '<td align=center><b>5</b></td>';
                  print '<td align=center>'.$row['reps5W3'].'</td>';
                  if ($row['intensity5W3'] == 0 || $row['intensity5W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage5W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity5W3'].'</td>';
                  }
                  print '<td align=center><b>5</b></td>';
                  print '<td align=center>'.$row['reps5W4'].'</td>';
                  if ($row['intensity5W4'] == 0 || $row['intensity5W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage5W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity5W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($numOfSets <= 6) {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center><b>6</b></td>';
                  print '<td align=center>'.$row['reps6W1'].'</td>';
                  if ($row['intensity6W1'] == 0 || $row['intensity6W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage6W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity6W1'].'</td>';
                  }
                  print '<td align=center><b>6</b></td>';
                  print '<td align=center>'.$row['reps6W2'].'</td>';
                  if ($row['intensity6W2'] == 0 || $row['intensity6W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage6W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity6W2'].'</td>';
                  }
                  print '<td align=center><b>6</b></td>';
                  print '<td align=center>'.$row['reps6W3'].'</td>';
                  if ($row['intensity6W3'] == 0 || $row['intensity6W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage6W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity6W3'].'</td>';
                  }
                  print '<td align=center><b>6</b></td>';
                  print '<td align=center>'.$row['reps6W4'].'</td>';
                  if ($row['intensity6W4'] == 0 || $row['intensity6W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage6W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity6W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($numOfSets <= 7) {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center><b>7</b></td>';
                  print '<td align=center>'.$row['reps7W1'].'</td>';
                  if ($row['intensity7W1'] == 0 || $row['intensity7W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage7W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity7W1'].'</td>';
                  }
                  print '<td align=center><b>7</b></td>';
                  print '<td align=center>'.$row['reps7W2'].'</td>';
                  if ($row['intensity7W2'] == 0 || $row['intensity7W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage7W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity7W2'].'</td>';
                  }
                  print '<td align=center><b>7</b></td>';
                  print '<td align=center>'.$row['reps7W3'].'</td>';
                  if ($row['intensity7W3'] == 0 || $row['intensity7W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage7W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity7W3'].'</td>';
                  }
                  print '<td align=center><b>7</b></td>';
                  print '<td align=center>'.$row['reps7W4'].'</td>';
                  if ($row['intensity7W4'] == 0 || $row['intensity7W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage7W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity7W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($numOfSets <= 8) {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center><b>8</b></td>';
                  print '<td align=center>'.$row['reps8W1'].'</td>';
                  if ($row['intensity8W1'] == 0 || $row['intensity8W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage8W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity8W1'].'</td>';
                  }
                  print '<td align=center><b>8</b></td>';
                  print '<td align=center>'.$row['reps8W2'].'</td>';
                  if ($row['intensity8W2'] == 0 || $row['intensity8W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage8W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity8W2'].'</td>';
                  }
                  print '<td align=center><b>8</b></td>';
                  print '<td align=center>'.$row['reps8W3'].'</td>';
                  if ($row['intensity8W3'] == 0 || $row['intensity8W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage8W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity8W3'].'</td>';
                  }
                  print '<td align=center><b>8</b></td>';
                  print '<td align=center>'.$row['reps8W4'].'</td>';
                  if ($row['intensity8W4'] == 0 || $row['intensity8W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage8W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity8W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($numOfSets <= 9) {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center><b>9</b></td>';
                  print '<td align=center>'.$row['reps9W1'].'</td>';
                  if ($row['intensity9W1'] == 0 || $row['intensity9W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage9W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity9W1'].'</td>';
                  }
                  print '<td align=center><b>9</b></td>';
                  print '<td align=center>'.$row['reps9W2'].'</td>';
                  if ($row['intensity9W2'] == 0 || $row['intensity9W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage9W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity9W2'].'</td>';
                  }
                  print '<td align=center><b>9</b></td>';
                  print '<td align=center>'.$row['reps9W3'].'</td>';
                  if ($row['intensity9W3'] == 0 || $row['intensity9W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage9W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity9W3'].'</td>';
                  }
                  print '<td align=center><b>9</b></td>';
                  print '<td align=center>'.$row['reps9W4'].'</td>';
                  if ($row['intensity9W4'] == 0 || $row['intensity9W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage9W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity9W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($numOfSets <= 10) {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center><b>10</b></td>';
                  print '<td align=center>'.$row['reps10W1'].'</td>';
                  if ($row['intensity10W1'] == 0 || $row['intensity10W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage10W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity10W1'].'</td>';
                  }
                  print '<td align=center><b>10</b></td>';
                  print '<td align=center>'.$row['reps10W2'].'</td>';
                  if ($row['intensity10W2'] == 0 || $row['intensity10W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage10W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity10W2'].'</td>';
                  }
                  print '<td align=center><b>10</b></td>';
                  print '<td align=center>'.$row['reps10W3'].'</td>';
                  if ($row['intensity10W3'] == 0 || $row['intensity10W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage10W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity10W3'].'</td>';
                  }
                  print '<td align=center><b>10</b></td>';
                  print '<td align=center>'.$row['reps10W4'].'</td>';
                  if ($row['intensity10W4'] == 0 || $row['intensity10W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage10W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity10W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  print '<th>Tempo</th>';
                  print '<td align=center></td>';
                  print '<td colspan=3 align=center>'.$row['tempoW1'].'</td>';
                  print '<td colspan=3 align=center>'.$row['tempoW2'].'</td>';
                  print '<td colspan=3 align=center>'.$row['tempoW3'].'</td>';
                  print '<td colspan=3 align=center>'.$row['tempoW4'].'</td>';
                  print '</tr>';
                  print '<tr>';
                  print '<th>Rest</th>';
                  print '<td align=center></td>';
                  print '<td colspan=3 align=center>'.$row['restW1'].'</td>';
                  print '<td colspan=3 align=center>'.$row['restW2'].'</td>';
                  print '<td colspan=3 align=center>'.$row['restW3'].'</td>';
                  print '<td colspan=3 align=center>'.$row['restW4'].'</td>';
                  print '</tr>';
                  print '<tr>';
                  print '<td colspan=14 bgcolor=#000000>';
                  print '</td>';
                  print '</tr>';
                  print '</thead>';
                  }
                  print '</tbody>';
                  print '</table>';
                  print '</div>';
                  print '</div>';
                  echo '<p class="pageBreak"></p>';
                  print "<hr id='removeHr'>";

                  $sql = 'SELECT * FROM `'.$currentWorkoutSeven."` where athlete='$name' ORDER BY exerciseOrder";

                  $result = mysqli_query($connection, $sql);

                  print '<h4><b><u> DAY SEVEN </u></b></h4>';

                  #Creates the table Header
                  print "<div class='table-responsive'>
                                       <div class=\"col-md-10\">
                                       	<table class='table table-striped table-bordered table-condensed'>
                                       		<thead>
                                       		</thead>";
                  print '<tbody>';

                  #Prints out the exercises
                  while ($row = mysqli_fetch_array($result)) {
                  $numOfSets = $row['sets'];
                  $tempSeven = strtoupper($tempSeven);

                  print '<thead>';
                  print '<tr>';
                  print "<th colspan=2 bgcolor=#000000><center><font color=#FFFFFF><u><b>$tempSeven</b></u></font></center></h4></th>";
                  print '<td colspan=3 align=center bgcolor=#FFFF66><b>WEEK 1</b></td>';
                  print '<td colspan=3 align=center bgcolor=#E0E0D1><b>WEEK 2</b></td>';
                  print '<td colspan=3 align=center bgcolor=#FFFF66><b>WEEK 3</b></td>';
                  print '<td colspan=3 align=center bgcolor=#E0E0D1><b>WEEK 4</b></td>';

                  print '</tr>';
                  print '</thead>';

                  print '<thead>';
                  print '<tr>';
                  print '<th>Exercise Order</th>';
                  print '<td align=center>'.$row['exerciseOrder'].'</td>';
                  print '<td align=center><b>Set</b></td>';
                  print '<td align=center><b>Reps</b></td>';
                  print '<td align=center><b>Weight</b></td>';
                  print '<td align=center><b>Set</b></td>';
                  print '<td align=center><b>Reps</b></td>';
                  print '<td align=center><b>Weight</b></td>';
                  print '<td align=center><b>Set</b></td>';
                  print '<td align=center><b>Reps</b></td>';
                  print '<td align=center><b>Weight</b></td>';
                  print '<td align=center><b>Set</b></td>';
                  print '<td align=center><b>Reps</b></td>';
                  print '<td align=center><b>Weight</b></td>';
                  print '</tr>';
                  print '<tr>';
                  print '<th>Exercise Name</th>';
                  $tempExercise = strstr($row['exerciseName'], '-', true);
                  print '<td align=center>'.$tempExercise.'</td>';
                  if ($numOfSets <= $sets1) {
                  print '<td align=center><b>1</b></td>';
                  print '<td align=center>'.$row['reps1W1'].'</td>';
                  if ($row['intensity1W1'] == 0 || $row['intensity1W1'] === 0) {
                     print '<td align=center>'.$row['calcWeight1W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity1W1'].'</td>';
                  }
                  print '<td align=center><b>1</b></td>';
                  print '<td align=center>'.$row['reps1W2'].'</td>';
                  if ($row['intensity1W2'] == 0 || $row['intensity1W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage1W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity1W2'].'</td>';
                  }
                  print '<td align=center><b>1</b></td>';
                  print '<td align=center>'.$row['reps1W3'].'</td>';
                  if ($row['intensity1W3'] == 0 || $row['intensity1W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage1W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity1W3'].'</td>';
                  }
                  print '<td align=center><b>1</b></td>';
                  print '<td align=center>'.$row['reps1W4'].'</td>';
                  if ($row['intensity1W4'] == 0 || $row['intensity1W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage1W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity1W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  print '<th></th>';
                  print '<td align=center></td>';
                  if ($numOfSets <= 2) {
                  print '<td align=center><b>2</b></td>';
                  print '<td align=center>'.$row['reps2W1'].'</td>';
                  if ($row['intensity2W1'] == 0 || $row['intensity2W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage2W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity2W1'].'</td>';
                  }
                  print '<td align=center><b>2</b></td>';
                  print '<td align=center>'.$row['reps2W2'].'</td>';
                  if ($row['intensity2W2'] == 0 || $row['intensity2W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage2W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity2W2'].'</td>';
                  }
                  print '<td align=center><b>2</b></td>';
                  print '<td align=center>'.$row['reps2W3'].'</td>';
                  if ($row['intensity2W3'] == 0 || $row['intensity2W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage2W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity2W3'].'</td>';
                  }
                  print '<td align=center><b>2</b></td>';
                  print '<td align=center>'.$row['reps2W4'].'</td>';
                  if ($row['intensity2W4'] == 0 || $row['intensity2W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage2W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity2W4'].'</td>';
                  }
                  } else {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  }
                  print '</tr>';
                  print '<tr>';
                  print '<th></th>';
                  print '<td align=center></td>';
                  if ($numOfSets <= 3) {
                  print '<td align=center><b>3</b></td>';
                  print '<td align=center>'.$row['reps3W1'].'</td>';
                  if ($row['intensity3W1'] == 0 || $row['intensity3W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage3W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity3W1'].'</td>';
                  }
                  print '<td align=center><b>3</b></td>';
                  print '<td align=center>'.$row['reps3W2'].'</td>';
                  if ($row['intensity3W2'] == 0 || $row['intensity3W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage3W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity3W2'].'</td>';
                  }
                  print '<td align=center><b>3</b></td>';
                  print '<td align=center>'.$row['reps3W3'].'</td>';
                  if ($row['intensity3W3'] == 0 || $row['intensity3W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage3W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity3W3'].'</td>';
                  }
                  print '<td align=center><b>3</b></td>';
                  print '<td align=center>'.$row['reps3W4'].'</td>';
                  if ($row['intensity3W4'] == 0 || $row['intensity3W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage3W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity3W4'].'</td>';
                  }
                  } else {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($numOfSets <= 4) {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center><b>4</b></td>';
                  print '<td align=center>'.$row['reps4W1'].'</td>';
                  if ($row['intensity4W1'] == 0 || $row['intensity4W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage4W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity4W1'].'</td>';
                  }
                  print '<td align=center><b>4</b></td>';
                  print '<td align=center>'.$row['reps4W2'].'</td>';
                  if ($row['intensity4W2'] == 0 || $row['intensity4W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage4W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity4W2'].'</td>';
                  }
                  print '<td align=center><b>4</b></td>';
                  print '<td align=center>'.$row['reps4W3'].'</td>';
                  if ($row['intensity4W3'] == 0 || $row['intensity4W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage4W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity4W3'].'</td>';
                  }
                  print '<td align=center><b>4</b></td>';
                  print '<td align=center>'.$row['reps4W4'].'</td>';
                  if ($row['intensity4W4'] == 0 || $row['intensity4W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage4W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity4W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($numOfSets <= 5) {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center><b>5</b></td>';
                  print '<td align=center>'.$row['reps5W1'].'</td>';
                  if ($row['intensity5W1'] == 0 || $row['intensity5W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage5W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity5W1'].'</td>';
                  }
                  print '<td align=center><b>5</b></td>';
                  print '<td align=center>'.$row['reps5W2'].'</td>';
                  if ($row['intensity5W2'] == 0 || $row['intensity5W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage5W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity5W2'].'</td>';
                  }
                  print '<td align=center><b>5</b></td>';
                  print '<td align=center>'.$row['reps5W3'].'</td>';
                  if ($row['intensity5W3'] == 0 || $row['intensity5W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage5W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity5W3'].'</td>';
                  }
                  print '<td align=center><b>5</b></td>';
                  print '<td align=center>'.$row['reps5W4'].'</td>';
                  if ($row['intensity5W4'] == 0 || $row['intensity5W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage5W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity5W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($numOfSets <= 6) {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center><b>6</b></td>';
                  print '<td align=center>'.$row['reps6W1'].'</td>';
                  if ($row['intensity6W1'] == 0 || $row['intensity6W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage6W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity6W1'].'</td>';
                  }
                  print '<td align=center><b>6</b></td>';
                  print '<td align=center>'.$row['reps6W2'].'</td>';
                  if ($row['intensity6W2'] == 0 || $row['intensity6W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage6W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity6W2'].'</td>';
                  }
                  print '<td align=center><b>6</b></td>';
                  print '<td align=center>'.$row['reps6W3'].'</td>';
                  if ($row['intensity6W3'] == 0 || $row['intensity6W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage6W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity6W3'].'</td>';
                  }
                  print '<td align=center><b>6</b></td>';
                  print '<td align=center>'.$row['reps6W4'].'</td>';
                  if ($row['intensity6W4'] == 0 || $row['intensity6W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage6W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity6W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($numOfSets <= 7) {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center><b>7</b></td>';
                  print '<td align=center>'.$row['reps7W1'].'</td>';
                  if ($row['intensity7W1'] == 0 || $row['intensity7W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage7W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity7W1'].'</td>';
                  }
                  print '<td align=center><b>7</b></td>';
                  print '<td align=center>'.$row['reps7W2'].'</td>';
                  if ($row['intensity7W2'] == 0 || $row['intensity7W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage7W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity7W2'].'</td>';
                  }
                  print '<td align=center><b>7</b></td>';
                  print '<td align=center>'.$row['reps7W3'].'</td>';
                  if ($row['intensity7W3'] == 0 || $row['intensity7W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage7W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity7W3'].'</td>';
                  }
                  print '<td align=center><b>7</b></td>';
                  print '<td align=center>'.$row['reps7W4'].'</td>';
                  if ($row['intensity7W4'] == 0 || $row['intensity7W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage7W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity7W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($numOfSets <= 8) {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center><b>8</b></td>';
                  print '<td align=center>'.$row['reps8W1'].'</td>';
                  if ($row['intensity8W1'] == 0 || $row['intensity8W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage8W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity8W1'].'</td>';
                  }
                  print '<td align=center><b>8</b></td>';
                  print '<td align=center>'.$row['reps8W2'].'</td>';
                  if ($row['intensity8W2'] == 0 || $row['intensity8W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage8W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity8W2'].'</td>';
                  }
                  print '<td align=center><b>8</b></td>';
                  print '<td align=center>'.$row['reps8W3'].'</td>';
                  if ($row['intensity8W3'] == 0 || $row['intensity8W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage8W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity8W3'].'</td>';
                  }
                  print '<td align=center><b>8</b></td>';
                  print '<td align=center>'.$row['reps8W4'].'</td>';
                  if ($row['intensity8W4'] == 0 || $row['intensity8W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage8W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity8W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($numOfSets <= 9) {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center><b>9</b></td>';
                  print '<td align=center>'.$row['reps9W1'].'</td>';
                  if ($row['intensity9W1'] == 0 || $row['intensity9W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage9W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity9W1'].'</td>';
                  }
                  print '<td align=center><b>9</b></td>';
                  print '<td align=center>'.$row['reps9W2'].'</td>';
                  if ($row['intensity9W2'] == 0 || $row['intensity9W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage9W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity9W2'].'</td>';
                  }
                  print '<td align=center><b>9</b></td>';
                  print '<td align=center>'.$row['reps9W3'].'</td>';
                  if ($row['intensity9W3'] == 0 || $row['intensity9W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage9W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity9W3'].'</td>';
                  }
                  print '<td align=center><b>9</b></td>';
                  print '<td align=center>'.$row['reps9W4'].'</td>';
                  if ($row['intensity9W4'] == 0 || $row['intensity9W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage9W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity9W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  if ($numOfSets <= 10) {
                  print '<td align=center></td>';
                  print '<td align=center></td>';
                  print '<td align=center><b>10</b></td>';
                  print '<td align=center>'.$row['reps10W1'].'</td>';
                  if ($row['intensity10W1'] == 0 || $row['intensity10W1'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage10W1'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity10W1'].'</td>';
                  }
                  print '<td align=center><b>10</b></td>';
                  print '<td align=center>'.$row['reps10W2'].'</td>';
                  if ($row['intensity10W2'] == 0 || $row['intensity10W2'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage10W2'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity10W2'].'</td>';
                  }
                  print '<td align=center><b>10</b></td>';
                  print '<td align=center>'.$row['reps10W3'].'</td>';
                  if ($row['intensity10W3'] == 0 || $row['intensity10W3'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage10W3'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity10W3'].'</td>';
                  }
                  print '<td align=center><b>10</b></td>';
                  print '<td align=center>'.$row['reps10W4'].'</td>';
                  if ($row['intensity10W4'] == 0 || $row['intensity10W4'] === 0) {
                     print '<td align=center>'.$row['calculatedPercentage10W4'].'</td>';
                  } else {
                     print '<td align=center>'.$row['intensity10W4'].'</td>';
                  }
                  }
                  print '</tr>';
                  print '<tr>';
                  print '<th>Tempo</th>';
                  print '<td align=center></td>';
                  print '<td colspan=3 align=center>'.$row['tempoW1'].'</td>';
                  print '<td colspan=3 align=center>'.$row['tempoW2'].'</td>';
                  print '<td colspan=3 align=center>'.$row['tempoW3'].'</td>';
                  print '<td colspan=3 align=center>'.$row['tempoW4'].'</td>';
                  print '</tr>';
                  print '<tr>';
                  print '<th>Rest</th>';
                  print '<td align=center></td>';
                  print '<td colspan=3 align=center>'.$row['restW1'].'</td>';
                  print '<td colspan=3 align=center>'.$row['restW2'].'</td>';
                  print '<td colspan=3 align=center>'.$row['restW3'].'</td>';
                  print '<td colspan=3 align=center>'.$row['restW4'].'</td>';
                  print '</tr>';
                  print '<tr>';
                  print '<td colspan=14 bgcolor=#000000>';
                  print '</td>';
                  print '</tr>';
                  print '</thead>';
                  }
                  print '</tbody>';
                  print '</table>';
                  print '</div>';
                  print '</div>';

                  ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h5 style="color: white;">FitMe</h5>
            <p>You can use rows and columns here to organize your footer content.</p>
          </div>
          <div class="col-md-6">
            <h5 style="color: white;">About Us</h5>
            <ul>
              <li style="color: white;"><a style="color: white;" href="#!">Link 1</a></li>
              <li style="color: white;"><a style="color: white;" href="#!">Link 2</a></li>
              <li style="color: white;"><a style="color: white;" href="#!">Link 3</a></li>
              <li style="color: white;"><a style="color: white;" href="#!">Link 4</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
          © 2015 FitMe
        </div>
      </div>
    </footer>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
  <script src="../js/validateAthletesPage.js"></script>
</html>
