<!DOCTYPE html>
<html lang="en">
  <head>
    <title>FitMe</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/paper/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/stylesheet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css">
  </head>
  <body>
    <header>
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <a class="navbar-brand" href="../index.php">FitMe</a>
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
                <h3 class="panel-title" >Please Enter Email Below</h3>
              </div>
              <?php
                include("connect.php");

                $email = "";
                $user  = "";
                $email = $_POST["email"];
                $sql   = "SELECT username FROM users WHERE email = '$email'";

                $result = mysqli_query($connection, $sql);

                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_array($result)) {
                    $user = $row['username'];
                  }
                  $emailSlice = substr($email, 0, 2);
                  $randNum    = rand(10000, 99999);
                  $tempPass   = "$emailSlice$randNum";
                  $hashit     = md5($tempPass);

                  $sql = "UPDATE users SET password = '$hashit' WHERE username = '$user'";

                  $result = mysqli_query($connection, $sql);

                  echo "Your Password Has Been Changed! <br>";
                  $to      = "$email";
                  $from    = "auto_responder@lustrength.com";
                  $headers = "From: $from\n";
                  $headers .= "Content-type: text/html; charset=iso-8859-1 \n";
                  $subject = "LU-Strength Temporary Password";
                  $msg     = "<h2>Hello $user!<br><br>
                                        Your temporary password is $tempPass! Go ahead and change it once you log in!";
                  if (mail($to, $subject, $msg, $headers)) {
                    echo "Check Your Email For A Temporary Password! <br><br>";
                    echo "<a href=\"index.php\">Login Page</a>";
                    exit();
                  } else {
                    echo "email_send_failed";
                    exit();
                  }

                } else {
                  echo "No Users Exist With That Email ID";
                }

                ?>
            </div>
          </div>
          <div class="col-md-3"></div>
        </div>
      </div>
      </div>
    </section>
    <?php
      require_once("../templates/printFooter.php");
      printFooter();
     ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
  <script type="text/javascript" src="../js/validateLogin.js"></script>
</html>
