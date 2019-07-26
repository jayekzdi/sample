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
  echo'
  <a href="user/reserve.php">RESERVE</a>
    </li>';
  }
else{
echo '<li class="nav-item">
  <a href="event.php">EVENTS</a>
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
<link rel="stylesheet" href="css/designs.css">
  </head>
  <body>

	 <nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
	
		<button class="navbar-toggle" data-toggle="collapse" data-target="#navbara">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="nav-item"><img src="img/kagahin1.png" style="width:175px;height:51px;"></a>
		</div>
		<div class="collapse navbar-collapse" id="navbara">
<ul class="nav navbar-nav navbar-right">
<li class="nav-item active">
  <a href="index.php"><?php print $txt; ?><span class="sr-only">(current)</a>
    </li>
  <li class="nav-item">
  <?php echo disp1(); ?>
    </li>
  <li class="nav-item">
  <a href="package.php"><?php print $txt2; ?></a>
    </li>
  <li class="nav-item">
  <a href="contactus.php"><?php print $txt4; ?></a>
</li>
<li class="nav-item">
  <?php echo disp(); ?>
</li>
    </ul>
    </div><!--.nav-header-->
  </div><!--container-fluid-->
</nav>
<header>
  <div class="row">
    <center><div>
<div id="carousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
    <?php echo make_slide_indicators($connect);?>
      </ol>
      <div class="carousel-inner">
        <?php echo make_slides($connect);?>
         <a class="left carousel-control" href="#carousel" data-slide="prev">
     <span class="glyphicon glyphicon-chevron-left"></span>
     <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel" data-slide="next">
     <span class="glyphicon glyphicon-chevron-right"></span>
     <span class="sr-only">Next</span>
    </a>
   </div>       
  </div><!--carousel-->
  </div><!--col-->
</center>
  </div><!--row-->
</header>
<br/>
<?php echo archiving_res($connect); ?>
<div class="col-sm-offset-2 col-lg-9">
      <div class="jumbotron">
		<div class="container">
     <?php echo display_img($connect); ?>
		</div><!--container-->
    
  </div><!--jumbtron-->
		</div><!-- col-md4 -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>