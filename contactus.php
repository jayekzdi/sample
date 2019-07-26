<?php
session_start();
include ("functions.php");  
function disp(){  
if(!isset($_SESSION["dispname"])){
  echo '<li class="nav-item">
<button class="btn btn-inverse navbar-btn">
      <a href="login.php" style="color:#222;">
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
<?php include 'header.php'; ?>
<br/>
<?php echo archiving_res($connect); ?>
  <div class="header1">
<div class=" col-md-12">
        <img src="img/divided5.png" style="padding-left: 400px; width:70%;">
        <p class="text-center" style="font-size: 50px;">C O N T A C T &nbsp; &nbsp;U S</p>
        <img src="img/divided4.png" style="padding-left: 400px; width:70%;">
        </div><!--col-->
      </div>
<div class="col-sm-offset-2 col-lg-9">
       <h2>Eral Building Bonifacio Street Luisiana,Laguna</h2>
    <h2>Phone Number:09267411824</h2>
    <h2>Facebook:<a href="https://www.facebook.com/enrico.natividad.5" target="_blank">Mr. Enrico Natividad</a>
    </h2>
		</div><!-- col-md4 -->
    <?php include'footer.php'; ?>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>