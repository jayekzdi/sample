<?php
session_start();
   include ("../functions.php");
if(!isset($_SESSION["dispname"])){
   header("location:../error.php");
  }
  else{
   
}
?>
<?php $txt="HOME";
$txt1="EVENTS";
$txt2="PACKAGES";
$txt4="CONTACT US";
$txt3="ABOUT US";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="../css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="../css/designs.css">
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
			<a class="nav-item"><img src="../img/kagahin1.png" style="width:175px;height:51px;"></a>
		</div>
		<div class="collapse navbar-collapse" id="navbara">
<ul class="nav navbar-nav navbar-right">
<li class="nav-item active">
  <a href="#"><?php print $txt; ?><span class="sr-only">(current)</a>
    </li>
  <li class="nav-item">
  <a href="reserve.php"><?php print "RESERVE"; ?></a>
    </li>
  <li class="nav-item">
  <a href="#"><?php print $txt2; ?></a>
    </li>
  <li class="nav-item">
  <a href=""><?php print $txt3; ?></a>
    </li>
  <li class="nav-item">
  <a href="#"><?php print $txt4; ?></a>
</li>
<li class="dropdown">
   <a class="dropdown-toggle" data-toggle="dropdown" href="#">
    <?php
      echo $_SESSION["dispname"];
     ?>
       <span class="caret"></span>
     </a>
    <ul class="dropdown-menu">
      <li><a href="logout.php"><?php echo " LOGOUT "; ?></a></li>
      </ul>
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
        <?php echo make_slides_user($connect);?>
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
 <section id="about" class="section about">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                  <div class="well jm">
                    <h3 class="section-title"></h3>

                    <p>You've inspired new consumer, racked up click-thru's, blown-up brand enes. We can't give you back the weekends you worked, or erase the pain ebeing forced to make the logo bigger. But if you submit your best work we ajusts might be able to give the chance to show you best digital marketing.</p>
                    </div>
                </div><!-- /.col-sm-6 -->

                <div class="col-sm-offset-1 col-sm-3">
                    <div class="jumbotron jm">
                    <h3 class="section-title multiple-title">Kagahin's Events</h3>
                     <p>Birthdays</p>
                      <p>Debuts</p>
                       <p>Baptismals</p>
                        <p>Weddings</p>
                         <p>Seminars</p>
                         </div>
                </div><!-- /.col-sm-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>

<section>
  <div class="row">
    <div class="row">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>