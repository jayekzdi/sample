<?php
session_start();
require ("db.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.min.css">
<link rel="stylesheet" href="css/designs.css">
  </head>
  <body class="login" onload="$('#register-hide').hide();">
  <div>
      <div class="container">
        <div class="col-lg-4"></div><!--col1-->
        <div class="col-lg-4">
          <div class="jumbotron logjum">
              <center><img src="img/error.png" style="height: 100px; width: 100px;">
                <h3 class="log-para">ERROR 404</h3>
                <div class="form-group">
                <h5 class="log-para">PAGE NOT FOUND</h5>
                </div>
                  <p class="change_link">
                  <a href="index.php" id="signin" class="to_register btn btn-xs btn-primary">GO TO HOME</a>
                </p>
                </center>
      </div><!--jumbotron-->
          <img src="img/kagahin1.png" class="image-responsive logo" style="
  width:300px;
  height:88px;
  margin-left:20px;
  margin-top:-20px;">
        </div><!--col2-->
        <div class="col-lg-4"></div><!--col3-->
        </div><!--container-->
      </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="js/jquery.js"></script>
  <script src="js/jquery.datetimepicker.full.js"></script>
  <script type="text/javascript">
      $('#bday-dtpicker').datetimepicker({
        format:'M/d/Y'
      });
    </script>
  </body>
  </html>