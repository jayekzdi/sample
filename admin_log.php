<?php
session_start();
require ("db.php");
$alert="";
if(isset($_POST['log-btn'])){
if(($_POST['uname']=="")&&($_POST['pwd']=="")){
  $alert="Please Enter the fields";
}
elseif(($_POST['uname']=="")&&($_POST['pwd']!="")){
  $alert="Please Enter your Username";
}
elseif(($_POST['uname']!="")&&($_POST['pwd']=="")){
  $alert="Please Enter your Password";
}
else{
$us= $_POST['uname'];
$pw= $_POST['pwd'];
$role="";
$alert="";
// $username=stripcslashes($username);
// $password=stripcslashes($password);
$username=mysqli_real_escape_string($connect,$us);
$password=mysqli_real_escape_string($connect,$pw);
$role='administrator';
  $query="select * from account where account_username='".$username."' and account_password='".$password."'";
  $result=mysqli_query($connect,$query) or die('Invalid query' . mysqli_error());
 $row = mysqli_fetch_array($result);
  if(($row['account_username']==$username)&&($row['account_password']==$password)){
    $_SESSION["admin_user"]=$username;
    if(isset($_SESSION["admin_user"])){
  $query="select account_full_name from account where account_username='".$_SESSION["admin_user"]."'";
  $result=mysqli_query($connect,$query) or die('Invalid query' . mysqli_error());
 $row = mysqli_fetch_array($result);
 $_SESSION["admin_name"]=$row["account_full_name"];
 header("location:admin/admin_index.php");
    }
    
  }
  else{
       $alert= "Login Failed";
      }
}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="css/designs.css">
  </head>
  <body class="login">
  <div>
  		<div class="container">
  			<div class="col-lg-4"></div><!--col1-->
  			<div class="col-lg-4">
  				<div class="jumbotron logjum">
  						<form id="login-show" method="post">
                <h3 class="log-para">LOGIN</h3>
  							<div class="form-group">
  							<h5 class="log-para">Username:</h5>
  							<input type="Username" class="form-control" placeholder="Username" name="uname" id="uname">
  							</div>
  								<div class="form-group">
  							<h5 class="log-para">Password:</h5>
  							<input type="Password" class="form-control" placeholder="Password" name="pwd" id="pwd">
  						</div>
  								<div class="checkbox">
      						<label><input type="checkbox" value="">Remember Password?</label>
    							</div>
  								<div>
      						<input type="submit" class="btn btn-primary btn-log1 btn-sm" value="<?php print "LOGIN";?>" name="log-btn">
    						<a href="#" class="pull-right log-para"><h5 class="lp"><?php print "Lost Password?" ?></h5></a>
    							</div>
    						<div class="clearfix"></div>
  						<div class="separator">
                <p class="change_link"><h4 class="text-danger pull-center"><?php echo $alert; ?></h4></p>
              </div>
  		</form>

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
        <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="js/jquery.datetimepicker.full.js"></script>
  <script type="text/javascript">
      $('#bday-dtpicker').datetimepicker({
        format:'M/d/Y'
      });
    </script>
  </body>
  </html>