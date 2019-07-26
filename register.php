<?php
session_start();
require ("functions.php");
$alert="";
if(isset($_POST["reg"]))
{
$username=mysqli_real_escape_string($connect,$_POST["uneme"]);
$email=mysqli_real_escape_string($connect,$_POST["email"]);
$pass1=mysqli_real_escape_string($connect,$_POST["pass"]);
$pass2=mysqli_real_escape_string($connect,$_POST["pass2"]);
$fname=mysqli_real_escape_string($connect,$_POST["nami"]);
$bday=mysqli_real_escape_string($connect,$_POST["bday"]);
$gender=mysqli_real_escape_string($connect,$_POST["gender"]);
$contact=mysqli_real_escape_string($connect,$_POST["contact"]);
if($gender==""){  //when gender is equal to nothing
  echo '<script type="text/javascript">alert("Please Choose Your Gender.");</script>';
  }
else{
  if($pass1!=$pass2){  //condition to know if the pass is match
    echo '<script type="text/javascript">alert("Password does not match.")</script>';
   // header("location:login.php#register-hide");
    }
    else{
        $sql="select user_email from user_account where user_email='".$email."'";
        $result=mysqli_query($connect,$sql)  or die('Invalid query' . mysqli_error());
        if($row=mysqli_num_rows($result)){
                    // if($row["user_email"]==$email){
             echo '<script type="text/javascript">alert("The email is existing Please try another email.")</script>';
           }
           else{
             $passlegit=md5($pass1);//encrypter
      $sql="insert into user_account (user_full_name,user_username,user_email,user_contact_no,user_password,user_bday,user_gender) values ('".$fname."','".$username."','".$email."','".$contact."','".$passlegit."','".$bday."','".$gender."')";
      $result=mysqli_query($connect,$sql) or die('Invalid query' . mysqli_error());
      echo '<script type="text/javascript">alert("Register Successful")</script>';
      echo '<script>window.location.href="login.php";</script>';
        }
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
    <link rel="stylesheet"
        href="ccss/bootstrap-material-design.min.css"/>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/css/ripples.min.css"/>

    <link rel="stylesheet" href="css/bootstrap-material-datetimepicker.css" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/designs.css">
    <!-- <script src="https://code.jquery.com/jquery-1.12.3.min.js" integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ=" crossorigin="anonymous"></script> -->
   
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/ripples.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/material.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/js/material.min.js"></script>
    <script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-material-datetimepicker.js"></script>
  </head>
  <body class="login">
  <div>
  		<div class="container">
  			<div class="col-lg-4"></div><!--col1-->
  			<div class="col-lg-10">
  				<div class="jumbotron logjum">
          <section class="login_content">
            <form id="register-hide" action="" method="post">
              <h3 class="log-para">SIGNUP</h3>
                 <!--USERNAME AND NAME-->
              <div class="col-sm-6">
                <div>
                  <h5 class="log-para">Name:</h5>
                <input type="text" class="form-control" placeholder="Name" name="nami" required="" value="<?php echo isset($_POST["nami"]) ? $_POST["nami"]: ''; ?>" />
                  <h5 class="log-para">Username:</h5>
                <input type="text" class="form-control" placeholder="Username" name="uneme" required="" value="<?php echo isset($_POST["uneme"]) ? $_POST["uneme"]: ''; ?>" /> 
              </div>
               <!---EMAIL-->
              <div>
                <h5 class="log-para">Email Address:</h5>
                 <div class="input-group">
                <input type="email" class="form-control" placeholder="Email" name="email" required="" value="<?php echo isset($_POST["email"]) ? $_POST["email"]: ''; ?>" />
                 <span class="input-group-addon">
                  <span class="glyphicon glyphicon-envelope"></span>
                </span>
            </div>
              </div>
                 <!---CONTACT-->
              <div>
                <h5 class="log-para">Phone Number:</h5>
                <div class="input-group">
                <input type="number" class="form-control" placeholder="Phone Number" name="contact" required="" value="<?php echo isset($_POST["contact"]) ? $_POST["contact"]: ''; ?>" />
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-phone"></span>
                </span>
            </div>
              </div>
        </div>
              <div class="col-sm-6">
               <!---pass-->
              <div>
                <h5 class="log-para">Password:</h5>
                <input type="password" class="form-control" placeholder="Password" name="pass" required="" value="<?php echo isset($_POST["pass"]) ? $_POST["pass"]: ''; ?>" /> 
              </div>
              <!---confirmation pass-->
              <div>
                <h5 class="log-para">Confirm your Password:</h5>
                <input type="password" class="form-control" placeholder="Password" name="pass2" required=""
                value="<?php echo isset($_POST["pass2"]) ? $_POST["pass2"]: ''; ?>" /> 
              </div>
            
              <!--BIRTHDAY-->
              <h5 class="log-para">Birthday:</h5>
              <div class="input-group" >
              <input type="text" class="form-control floating-label"  name="bday" required="" id="date" 
              value="" />
              <span class="input-group-addon">
              <span class="glyphicon glyphicon-calendar" id="cele"></span>
              </span>
            </div>
               <!---GENDER-->
            <div>
                <div class="form-group">
                  <h5 class="log-para">Gender:</h5>
                      <select class="form-control" id="sel1" name="gender" required="" 
                      value="<?php echo isset($_POST["gender"]) ? $_POST["gender"]: ''; ?>" />
                        <option  value="<?php echo isset($_POST["gender"]) ? $_POST["gender"]: ''; ?>" hidden></option>
                        <option>Male</option>
                        <option>Female</option>
                      </select>
                  </div>
            </div><!--gender-->
          </div><!--col-sm-6-->
            <div class="clearfix"></div>
            <br>
              <div class="rows">
                <input type="submit" class="btn btn-dark col-lg-4 col-sm-offset-4" value="Submit" name="reg"/>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="login.php" id="signin" class="to_register btn btn-xs btn-primary"> Log in </a>
                </p>
              </div>
            </form>
          </section>
      </div><!--jumbotron-->
  				<img src="img/kagahin1.png" class="image-responsive logo">
  			</div><!--col2-->
  			<div class="col-lg-4"></div><!--col3-->
  			</div><!--container-->
      </div>
  <script type="text/javascript">
     
      $(document).ready(function(){
       $('#date').bootstrapMaterialDatePicker
      ({
        time: false,
        clearButton: true,
        format: 'MM/DD/YYYY'
      });
    });
    </script>
  </body>
  </html>