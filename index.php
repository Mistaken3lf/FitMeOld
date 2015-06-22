<?php
  session_start();
  //arry of filnames
  $bg = array(
    './background/bg-01.jpg',
    './background/bg-02.jpg',
    './background/bg-03.jpg',
    './background/bg-04.jpg',
    './background/bg-05.jpg',
    './background/bg-06.jpg',
    './background/bg-07.jpg',
    './background/bg-08.jpg',
    './background/bg-09.jpg',
    './background/bg-10.jpg',
    './background/bg-11.jpg',
    './background/bg-12.jpg',
    './background/bg-13.jpg',
    './background/bg-14.jpg',
    './background/bg-15.jpg',
    './background/bg-16.jpg'
  );

  //generate random number size of the array
  $i          = rand(0, count($bg) - 1);
  // set variable equal to the random filename the was chosen
  $selectedBg = "$bg[$i]";
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <style type="text/css">
      body
      {
      background: url(<?php
        echo $selectedBg;
        ?>) no-repeat;
      background-size:cover;
      background-attachment:fixed;
      min-height: 100%;
      min-width:100%;
      height: 100%;
      width: 100%;
      margin-top:0px;
      margin-bottom:20px;
      }
    </style>
    <title>FitMe</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/paper/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/stylesheet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css">
    <link rel="icon" type="image/png" sizes="96x96" href="../img/logo/FitMe-favicon-96x96.png">
  </head>
  <body>
    <header>
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">FitMe</a>
        </div>
      </nav>
    </header>
    <section>
      <div class="container" id="formPadding">
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title" >WELCOME, PLEASE LOG IN</h3>
              </div>
              <div class="panel-body">
                <!--Login form to gain access to the site.-->
                <form role="form" name="loginForm" id="loginForm" method="POST" action="../lib/userLogin.php">
                  <div class="errorDiv">
                    <!--Print out all errors from the login form if there are any.-->
                    <?php
                      if (isset($_SESSION["errors"]) && isset($_SESSION["formAttempt"])) {
                        unset($_SESSION["formAttempt"]);
                        print "Errors occured <br>\n";

                        foreach ($_SESSION["errors"] as $error) {
                          print $error . "<br>\n";
                        }
                      }
                      ?>
                  </div>
                  <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" required id="username" name="username" placeholder="Enter Username">
                  </div>
                  <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" required id="password" name="password" placeholder="Enter Password">
                  </div>
                  <button type="submit" value="Log In" class="btn btn-primary">Log In</button>
                </form>
                <br>
                <a href="../lib/forgotForm.php">Forgot Password?</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
  <script type="text/javascript" src="../js/validateLogin.js"></script>
</html>
