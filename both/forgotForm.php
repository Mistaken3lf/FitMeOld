<!DOCTYPE html>
<html lang="en">
  <head>
    <title>FitMe</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/paper/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/stylesheet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css">
  </head>
  <body>
    <header>
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php"><img class="img-responsive" id="logo" src="../img/logo/FitMe-logo.png"></a>
        </div>
      </nav>
    </header>
    <section>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title" >Please Enter Email Below</h3>
              </div>
              <div class="panel-body">
                <div class="form-group">
                  <form action="forgot.php" method="POST" id="forgotForm" name="forgotForm">
                    <label for="email">Enter Your Email:</label><input type="text" class="form-control" name="email" id="email">
                    <br>
                    <button type="submit" name="submit" class="btn btn-primary" value="Send">Send</button>
                  </form>
                </div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
</html>
