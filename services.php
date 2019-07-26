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

    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/designs.css">
<style type="text/css">
      body{
        text-align: justify;
      }
    </style>
  </head>
  <body>
<?php include'header.php'; ?>
   <div class="header1">
<div class=" col-md-12">
        <img src="img/divided5.png" style="padding-left: 400px; width:70%;">
        <p class="text-center" style="font-size: 50px;">S E R V I C E S</p>
        <img src="img/divided4.png" style="padding-left: 400px; width:70%;">
        </div><!--col-->
      </div>
      <br>
      <section>
        <div class="container">

           <div class="row">
              <div class="col-md-6">
                <h3>Services</h3>
                <h4><p>&nbsp;Catering is a personal business it needs a different and a beautiful ideas and concepts it entails nourishing people, making them people at home, and also making sure they enjoy the special event they are hosting or attending.

Kagahin's Catering come up to the ideas about catering to achieve a better satisfaction of the customers. Kagahin's Catering make it's clients event as delicious and memorable as possible and serves in various style to fit the clients need and wishes.
<br>
Kagahin's serves in the following:
<ul>
<li>platted services</li>
<li>Family or Lauriat</li>
<li>Buffet
<li>Other service styles available upon request</li>
</ul>
Lets kagahin makes you one of the best ever party that surely achieve your wishes whatever your occasions is. We done everything from small or family gatherings to grand weddings and corporate events.
</p>
<p>Events offered by Kagahin Catering Services:</p>
<ul>
                    <li>Anniversaries</li>
                    <li>Birthdays</li>
                      <li>Debuts</li>
                       <li>Baptismals</li>
                        <li>Weddings</li>
                           <li>Reunions</li>
                         <li>Seminars</li>
                    </ul>
</h4>
              </div>
              <div class="col-md-6">
                <img src="img/owner1.jpg" class="img-responsive img-rounded about-img">
        </div>
      </div>
                <a href="index.php"><button class="btn btn-default">BACK</button></a>
              
      </section>
      <br>
  <?php include'footer.php'; ?>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>