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
    <link rel="icon" type="image/png" sizes="96x96" href="../img/logo/FitMe-favicon-96x96.png">
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
            <b><a class="navbar-brand" href="index.html">FitMe</a></b>
          </div>
        </div>
      </nav>
    </header>
    <div class="container-fluid">
      <img class="center-block img-responsive" src="../img/headers/fitMeCreateAccount.png" width="550" height="350">
      <hr class="colored">
      <div class="row">
        <div class="col-md-5">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Create New User</h3>
            </div>
            <div class="panel-body">
              <form role="form" method="POST" id="addUserForm" action="lib/addUser.php">
                <div class="errorDiv">
                  <!--Print out errors from the add user form.-->
                  <?php
                    session_start();

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
                  </select>
                </div>
                <button type="submit" class="btn btn-primary" value="Create User"><span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp Create User</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
      require_once("templates/printFooter.php");
      printFooter();
      ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
    <script src="js/validateNewUser.js"></script>
    <script src="js/tabReload.js"></script>
  </body>
</html>
