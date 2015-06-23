<?php
  session_start();

  if ($_SESSION["loggedIn"] == false) {
    header("location: ../index.php");
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
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/paper/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/stylesheet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css">
  </head>
  <body>
    <header>
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarCollapsed">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <b><a class="navbar-brand" href="trainersLanding.php">FitMe</a></b>
          </div>
          <div class="collapse navbar-collapse" id="navbarCollapsed">
            <ul class="nav navbar-nav">
              <li><a href="trainersLanding.php">Home</a></li>
              <li><a href="trainersAthletes.php">Athletes</a></li>
              <li class="active" class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Manage
                <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="createExerciseTrainers.php">Exercise</a></li>
                  <li><a href="createWorkoutTrainers.php">Workout</a></li>
                  <li><a href="trainersAssessment.php">Assessment</a></li>
                  <li><a href="createUser.php">User</a></li>
                </ul>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  <?php
                    echo '<style>p{display:inline;}</style><p color="white"><span class="glyphicon glyphicon-user"></span></p>&nbsp&nbsp '.
                    $_SESSION["myFirstName"] . ' ' . $_SESSION["myLastName"];
                    ?>
                <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="trainersProfile.php">My Profile</a></li>
                  <li><a href="changePassFormTrainer.php">Change Password</a></li>
                  <li><a href="userGuide.pdf" target="_blank">User Guide</a></li>
                  <li><a href="logout.php">Logout</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <section>
      <div class="container-fluid">
        <h1>Create User</h1>
        <hr>
        <ul class="nav nav-tabs" id="myTab">
          <li id="addID" class="active"><a href="#addUser" data-toggle="tab">Create User</a></li>
          <li id="removeID"><a href="#removeUser" data-toggle="tab">Remove User</a></li>
          <li><a href="#currentUsers" data-toggle="tab">Current Users</a></li>
        </ul>
        <br>
        <div class="tab-content">
          <div class="tab-pane active" id="addUser">
            <div class="row">
              <div class="col-md-5">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">Create New User</h3>
                  </div>
                  <div class="panel-body">
                    <form role="form" method="POST" id="addUserForm" action="addUser.php">
                      <div class="errorDiv">
                        <!--Print out errors from the add user form.-->
                        <?php
                          if (isset($_SESSION["userErrors"]) && isset($_SESSION["userAttempt"])) {
                            unset($_SESSION["userAttempt"]);
                            print "Errors occured <br>\n";

                            foreach ($_SESSION["userErrors"] as $error) {
                              print $error . "<br>\n";
                            }
                          }
                          ?>
                      </div>
                      <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" required class="form-control" id="adminUser"
                          name="adminUser" placeholder="Username">
                      </div>
                      <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" required class="form-control" id="adminPass"
                          name="adminPass" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="firstName">First Name:</label>
                        <input type="text" required class="form-control" id="firstName" name="firstName"
                          placeholder="First Name">
                      </div>
                      <div class="form-group">
                        <label for="lastName">Last Name:</label>
                        <input type="text" required class="form-control" id="lastName" name="lastName"
                          placeholder="Last Name">
                      </div>
                      <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" required class="form-control" id="email"
                          name="email" placeholder="email@address.com">
                      </div>
                      <div class="form-group">
                        <label for="permissions">Select User Type:</label>
                        <select class="form-control" required name="userPermissions" id="userPermissions">
                          <option value="" selected disabled>Please Select User Type</option>
                          <option value="Trainer">Trainer</option>
                          <option value="Administrator">Administrator</option>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-primary" value="Create User"><span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp Create User</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!--End of first tab-->
          </div>
          <div class="tab-pane" id="removeUser">
            <div class="row">
              <div class="col-md-5">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">Remove User</h3>
                  </div>
                  <div class="panel-body">
                    <form role="form" method="post" id="removeUserForm" action="removeUser.php">
                      <div class="errorDiv">
                        <!--Print out errors from the remove user form.-->
                        <?php
                          if (isset($_SESSION["removeErrors"]) && isset($_SESSION["removeAttempt"])) {
                            unset($_SESSION["removeAttempt"]);
                            print "Errors occured <br>\n";

                            foreach ($_SESSION["removeErrors"] as $error) {
                              print $error . "<br>\n";
                            }
                          }
                          ?>
                      </div>
                      <div class="form-group">
                        <label for="username">Select User To Remove:</label>
                        <select class="form-control" required name="removeUserName" id="removeUserName">
                          <option value="" selected disabled>Please Select A User</option>
                          <?php
                            include("../lib/connect.php");
                            $curUser = $_SESSION["myUsername"];
                            $sql     = "select username, firstName, lastName from users where permissions='Administrator' or permissions='Trainer'";
                            $result  = mysqli_query($connection, $sql);
                            while ($row = mysqli_fetch_array($result)) {
                              echo '<option value="' . $row["username"] . '">' . $row['firstName'] . " " . $row['lastName'] . "</option>";
                            }
                            ?>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-primary" value="Remove User" onclick="changeClass()"><span class="glyphicon glyphicon-trash"></span>&nbsp&nbsp Remove User</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--End of second tab-->
          <div class="tab-pane" id="currentUsers">
            <h3>Current Users</h3>
            <?php
              #Print out all current users in the system.
              include("../lib/connect.php");

              $sql = "select username, firstName, lastName, email, permissions
                            from users where permissions='Administrator'
                            or permissions='Trainer' or permissions='Athlete' order by permissions";

              $result = mysqli_query($connection, $sql);

              print " <div class='table-responsive'>
                                <table class='table table-striped table-bordered'>
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Permissions</th>
                                        </tr>
                                    </thead>";
              print "<tbody>";

              while ($row = mysqli_fetch_array($result)) {
                print "<tr>";
                print '<td><u><a href="../both/printUserProfile.php?myProfile=' . $row['username'] . '" data-toggle="tooltip" data-placement="top" title="View ' . $row['firstName'] . ' ' . $row['lastName'] . ' Profile">' . $row['username'] . '</a></u></td>';
                //print '<td><u><a href="printUserProfile.php?myProfile=' . $row['username'] . '">' . $row['username'] . '</a></u></td>';
                print "<td>" . $row['firstName'] . "</td>";
                print "<td>" . $row['lastName'] . "</td>";
                print "<td>" . $row['email'] . "</td>";
                print "<td>" . $row['permissions'] . "</td>";
                print "</tr>";
              }

              print "</tbody>";
              print "</table>";
              ?>
          </div>
        </div>
      </div>
    </section>
    <br><br>
   <footer class="footer">
      <div class="container">
        <div class="row">
          <!--<div class="col-md-6">
            <h5 style="color: white;">FitMe</h5>
            <p>You can use rows and columns here to organize your footer content.</p>
            </div>-->
          <div class="col-md-6">
            <!--<h5 style="color: white;">FitMe</h5>-->
            <img class="img-responsive" class="footer image" src="../img/logo/FitMe-text-logo.png" width="100" height="50">
            <h6>
              <ul>
                <li style="color: white;"><a style="color: white;" href="#!">Help</a> &nbsp&nbsp &#124; &nbsp&nbsp </li>
                <li style="color: white;"><a style="color: white;" href="#!">Terms & Services</a> &nbsp&nbsp &#124; &nbsp&nbsp </li>
                <li style="color: white;"><a style="color: white;" href="contact.html">Contact Us</a></li>
              </ul>
            </h6>
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
          <!--©--> 2015 FitMe
        </div>
      </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
  <script src="../js/validateNewUser.js"></script>
  <script src="../js/tabReload.js"></script>
  <script>
    $(document).ready(function())
    {
      $('[data-toggle="tooltip"]').tooltip();
    };
  </script>
</html>
