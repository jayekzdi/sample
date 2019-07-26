<?php
session_start();
include ("functions.php");
$alert="";
if(isset($_POST['log-btn'])){
if(($_POST['uname']=="")&&($_POST['pwd']=="")){
  $alert="Please Enter the fields";
}
// elseif(($_POST['uname']=="")&&($_POST['pwd']!="")){
//   $alert="Please Enter your Username";
// }
// elseif(($_POST['uname']!="")&&($_POST['pwd']=="")){
//   $alert="Please Enter your Password";
// }
else{
$us= $_POST['uname'];
$pw= md5($_POST['pwd']);
$role="";
$alert="";
// $username=stripcslashes($username);
// $password=stripcslashes($password);
$username=mysqli_real_escape_string($connect,$us);
$password=mysqli_real_escape_string($connect,$pw);
$role='administrator';
  $query="select * from user_account where user_username='".$username."' and user_password='".$password."'";
  $result=mysqli_query($connect,$query) or die('Invalid query' . mysqli_error());
 $row = mysqli_fetch_array($result);
  if(($row['user_username']==$username)&&($row['user_password']==$password)){
    $_SESSION["log_user"]=$username;
    $_SESSION["user_contact"]=$row["user_contact_no"];
    if(isset($_SESSION["log_user"])){
  $query="select user_full_name from user_account where user_username='".$_SESSION["log_user"]."'";
  $result=mysqli_query($connect,$query) or die('Invalid query' . mysqli_error());
 $row = mysqli_fetch_array($result);
 $_SESSION["dispname"]=$row["user_full_name"];
 header("location:index.php");
    }
    
  }
  else{
       echo '<script type="text/javascript">alert("Login Failed")</script>';
      }
}
}
echo archiving_res($connect);
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
  <body class="login" onload="$('#register-hide').hide();">
  <div>
  		<div class="container">
  			<div class="col-lg-4"></div><!--col1-->
  			<div class="col-lg-4">
  				<div class="jumbotron logjum">
  						<form id="login-show" method="post">
                <h3 class="log-para">LOGIN</h3>
  							<div class="form-group">
  							<h5 class="log-para">Username:</h5>
  							<input type="Username" class="form-control" placeholder="Username" name="uname" id="uname" required="">
  							</div>
  								<div class="form-group">
  							<h5 class="log-para">Password:</h5>
  							<input type="Password" class="form-control" placeholder="Password" name="pwd" id="pwd" required="">
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
                <p class="change_link"><h5>You dont have an account?
                  <a href="register.php" class=" btn btn-primary btn-xs to_register">Create Account</a></h5>
                </p>
                <p class="change_link"><h4 class="text-danger pull-center"><?php echo $alert; ?></h4></p>
              </div>
  		</form>
      </div><!--jumbotron-->
  				<img src="img/kagahin1.png" class="image-responsive" style="
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
  </body>
  </html>