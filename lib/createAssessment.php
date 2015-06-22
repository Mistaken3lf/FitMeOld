<?php
include '../lib/connect.php';

session_start();
$curUser = $_SESSION['myUsername'];
$date = '';
$athlete = '';
$sport = '';
$exercise = '';
$assessmentType = '';
$score = 0;

// Session variable to see if they are submitting the form.

$_SESSION['createAssessmentAttempt'] = true;

// If there were currently any errors reset them.

if (isset($_SESSION['createAssessmentErrors'])) {
  unset($_SESSION['createAssessmentErrors']);
}

// Create an array of errors.

$_SESSION['createAssessmentErrors'] = array();

// Check that the date is not empty.

if (empty($_POST['date'])) {

  // Add the error to the array and go back to the assessment page.

  $_SESSION['createAssessmentErrors'][] = 'Date is required';
  if ($_SESSION['myPermission'] == 'Trainer') {
    header('location: ../trainer/trainersAssessment.php');
  }
}

// date name is not empty.

else {

  // Send the date to test the input and strip characters from it.

  $date = test_input($_POST['date']);

  // Check for valid date..

  if (!preg_match('/\d{4}\-\d{2}-\d{2}/', $date)) {

    // Invalid Date.

    $_SESSION['createAssessmentErrors'][] = 'Invalid Date';
    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/trainersAssessment.php');
    }
  }
}

// ############################Validate Sport##################################
// Check that a sport was selected.

if (empty($_POST['sport'])) {

  // Add the error to the array and go back to the assessment page.

  $_SESSION['createAssessmentErrors'][] = 'Sport is required';
  if ($_SESSION['myPermission'] == 'Trainer') {
    header('location: ../trainer/trainersAssessment.php');
  }
}

// Sport was selected.

else {

  // Make the sport safe to insert.

  $sport = test_input($_POST['sport']);

  // Make sure it contains only letters.

  if (!preg_match('/^[a-zA-Z ]*$/', $sport)) {

    // Invalid sport..

    $_SESSION['createAssessmentErrors'][] = 'Only letters allowed in the sport.';
    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/trainersAssessment.php');
    }
  }
}

// ############################Validate Exercise##################################
// Check that an exercise was selected.

if (empty($_POST['exercise'])) {

  // Add the error to the array and go back to the assessment page.

  $_SESSION['createAssessmentErrors'][] = 'Exercise is required';
  if ($_SESSION['myPermission'] == 'Trainer') {
    header('location: ../trainer/trainersAssessment.php');
  }
}

// Exercise was selected.

else {

  // Make the exercise safe to insert.

  $exercise = test_input($_POST['exercise']);

  // Make sure it contains only letters.

  if (!preg_match('/^[a-zA-Z0-9- ]*$/', $exercise)) {

    // Invalid exercise.

    $_SESSION['createAssessmentErrors'][] = 'Only letters allowed in the exercise.';
    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/trainersAssessment.php');
    }
  }
}

// ############################Validate Assessment Type##################################
// Check that an assessment was selected.

if (empty($_POST['assessmentType'])) {

  // Add the error to the array and go back to the assessment page.

  $_SESSION['createAssessmentErrors'][] = 'Assessment Type is required';
  if ($_SESSION['myPermission'] == 'Trainer') {
    header('location: ../trainer/trainersAssessment.php');
  }
}

// Assessment type was selected.

else {

  // Make the assessment safe to insert.

  $assessmentType = test_input($_POST['assessmentType']);

  // Make sure it contains only letters.

  if (!preg_match('/^[a-zA-Z0-9 ]+$/', $assessmentType)) {

    // Invalid assessment.

    $_SESSION['createAssessmentErrors'][] = 'Only letters allowed in the assessment type.';
    if ($_SESSION['myPermission'] == 'Trainer') {
      header('location: ../trainer/trainersAssessment.php');
    }
  }
}

// ############################Validate Score##################################
// Check that a score is entered..

if (empty($_POST['score'])) {

  // Add the error to the array and go back to the assessment page.

  $_SESSION['createAssessmentErrors'][] = 'Score is required';
  if ($_SESSION['myPermission'] == 'Trainer') {
    header('location: ../trainer/trainersAssessment.php');
  }
}

// PREVENT SQL Injection and XSS!!!!!!!!!

function test_input($input)
{

  // trip white space

  $input = trim($input);

  // Remove all forward and backward slashes.

  $input = stripslashes($input);

  // Turn html code into safe letters.

  $input = htmlspecialchars($input);
  return $input;
}

// If there were any errors go back to the assessment page.

if (count($_SESSION['createAssessmentErrors']) > 0) {
  if ($_SESSION['myPermission'] == 'Trainer') {
    header('location: ../trainer/trainersAssessment.php');
  }
}
else {
  unset($_SESSION['createAssessmentErrors']);

  // Get all assessment information from the form.

  $assessmentDate = mysqli_real_escape_string($connection, $date);

  if(empty($_POST['Athlete']))
  {
    echo "<script>
    alert('Select which athlete to create assessment for');
    window.location.href='../trainer/trainersAssessment.php';
    </script>";
    exit(0);
  }

  else
  {
    $nameArray = $_POST['Athlete'];
  }

  $assessmentExercise = mysqli_real_escape_string($connection, $exercise);
  $assessmentType = mysqli_real_escape_string($connection, $assessmentType);
  $assessmentSport = mysqli_real_escape_string($connection, $sport);
  $scoreArray = $_POST['score'];

  $myAssessment = $_SESSION['myUsername'];

  $posArray = [];

  $N = count($scoreArray);
  for ($i = 0; $i < $N; $i++) {
    if ($scoreArray[$i] > 0) {
      $posArray[] = $i;
    }
  }

  $i = 0;
  foreach ($nameArray as $val) {
        #Build the insert assessment query..
      $pos = $posArray[$i++];
        $actualScore = $scoreArray[$pos];
        $query = "INSERT INTO assessmentRecord (date, Score, sport, Fname, exercise, assessmentType, whosAssessment) VALUES('$assessmentDate', '$actualScore', '$assessmentSport', '$val', '$assessmentExercise', '$assessmentType', '$myAssessment')";

      #Insert the assessment and go to assessment page.
      $res = mysqli_query($connection, $query);
        if (!$res) {
            if ($_SESSION['myPermission'] == 'Trainer') {
                echo "<script>
            alert('Error inserting assessment');
            window.location.href='../trainer/trainersAssessment.php';
            </script>";
            }
        }
    }

    if ($_SESSION['myPermission'] == 'Trainer') {
        echo "<script>
                alert('Assessment Created');
                window.location.href='../trainer/trainersAssessment.php';
                </script>";
    }
}

?>
