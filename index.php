<?php
session_start();
include ("functions.php");  
function disp(){  
if(!isset($_SESSION["dispname"])){
  echo '<li class="nav-item">
<button class="btn btn-inverse navbar-btn">
      <a href="login.php"style="color:#222;">
<span class="glyphicon glyphicon-log-in"></span>
    &nbsp;LOGIN
        </a>
    </button></li>';
  }
  else{
    echo '<li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">'.$_SESSION['dispname'].'<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="logout.php">LOGOUT</a></li>
        </li>';
}
}
?>
<?php $txt="HOME";
function disp1(){
if(isset($_SESSION["dispname"])){
  echo'<li class="nav-item">
 <a href="user/reserve.php">RESERVE</a>
    </li>
    <li class="nav-item">
  <a href="event.php">GALLERY</a>
    </li>';
  }
else{
echo '<li class="nav-item">
  <a href="event.php">GALLERY</a>
    </li>';
  }
}
$txt2="PACKAGES";
$txt4="CONTACT US";
$txt3="ABOUT US";
echo archiving_res($connect);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style type="text/css">
      body{
        text-align: justify;
      }
    </style>
    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/designs.css">
  </head>
  <body>
<?php include'header.php'; ?>
    <div class="header1">
      <div class=" col-md-12">
        <img src="img/divided5.png" style="padding-left: 400px; width:70%;">
        <h1 class="text-center head-content">Kagahin Catering Service</h1>
        <p class="text-center">Committed to value, service and style<br>Create. Inspire. Innovate.</p>
        <img src="img/divided4.png" style="padding-left: 400px; width:70%;">
        </div><!--col-->
      </div>
      <br>
      <section>
        <div class="container">

           <div class="row">
              <div class="col-md-6">
                <h3>About Us</h3>
                <h5><p>&nbsp;Kagahin Restaurant and Catering services was born in year 2003 at the month of october, before the town fiesta of Luisiana, Laguna. 

The owner have natural fashion and talent in cooking so that, he use that talent to helped his studies. He become a working student in Manila Hotel.

He took up Bachelor of Science in Electrical Engineering at TIP in year 1986-1988.

The catering usually cooked home made and nee foods everyday. Catering starts in one client that offers, if the restaurant accommodate a catering with 50 persons. And the time goes by they rent catering equipment and many clients make reservation because of their good service. And kagahin's become famous and known as one of the good catering services in their municipality and the other places in Laguna because of their hardwork.</p></h5>
              </div>
              <div class="col-md-6">
                <img src="img/owner.jpg" class="img-responsive img-rounded about-img">
        </div>
      </div>
            <div class="row">
              <div class="col-md-4">
                <img src="img/about2.jpg" class="img-responsive img-rounded about-img">
        </div>              
        <div class="col-md-4">
                <h3>Services</h3>
                <h4>Kagahin Catering Services offers Service for more details</h4>
                <a href="services.php"><button class="btn btn-default">Read More.</button></a>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <h3>Packages</h3>
                <h4>Kagahin Catering Services offers Packages and the Foods</h4>
                <a href="package.php"><button class=" btn btn-default">Read More.</button></a>
              </div>
              <div class="col-md-6">
                <img src="img/owner1.jpg" class="img-responsive img-rounded about-img">
              </div>
            </div>
        </div>
      </section>
      <br>
  <?php include'footer.php'; ?>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>