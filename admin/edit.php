<?php
include '../functions.php';
session_start();
if(!isset($_SESSION["admin_name"])){
	echo '<script>window.location.href="../error.php"</script>';
}

echo archiving_res($connect);

$id=$_GET["side_dish_id"];
						$sql="select * from pax_main_dish where side_dish_id='".$id."'";
                        $result=mysqli_query($connect,$sql);
                      while ($row=mysqli_fetch_array($result)){                          
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
<style type="text/css">
	a{
		color: black;
	}
</style>
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
				<li class="nav-item">
						<input type="text" name="search" placeholder="Search" class="form-control" style="margin-top: 10px;">
				</li>
			<li class="dropdown">
				<button data-toggle="dropdown" href="#" class="dropdown-toggle btn btn-circle btn-sm" style="margin-top:10px; margin-left: 10px;"><span class="glyphicon glyphicon-bell"></span></a></button>
				<ul class="dropdown-menu">
						<li></li>
</ul>
				</li>   
				<li class="dropdown">
	 <a class="dropdown-toggle" data-toggle="dropdown" href="#">
		<?php
			echo $_SESSION["admin_name"];
		 ?>
			 <span class="caret"></span>
		 </a>
		<ul class="dropdown-menu">
			<li><a href="admin_logout.php"><?php echo " LOGOUT "; ?></a></li>
			</ul>
		</li>
		</ul>
		</div><!--.nav-header-->
	</div><!--container-fluid-->
	</nav>
    <div class="row row-offcanvas row-offcanvas-left">
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
            <div class="sidebar-nav">
                <ul class="nav">
                    <li class="active" id="res_toggle"><a href="#">RESERVATIONS</a></li>
                    <li>
                    	<ul id="res_id">
                    		<li><a href="pending_res.php">Pending Resevations</a></li>
                 			<li><a href="admin_res.php">View Reservations</a></li>

                    	</ul>
                    </li>
                    <li><a href="#" id="pax_toggle">PACKAGE</a></li>
                    <li>
                    	<ul id="pax_id">
                    		<li><a href="#">Side Dishes</a></li>
                 			<li><a id="main_toggle">Main Dishes</a></li>
                 			<li class="nav">
                 			<ul id="main_id">
                    		<li><a href="main_dish_pork.php">Pork</a></li>
                 			<li><a href="main_dish_beef.php">Beef</a></li>
                 			<li><a href="main_dish_chicken.php">Chicken</a></li>
                 			<li><a href="main_dish_seafood.php">Seafoods</a></li>
                    	</ul>
                    </li>
                 			<li><a href="#">Dessert</a></li>
                 			<li><a href="#">Drinks</a></li>
                 			<li><a href="#">Soup</a></li>
                    	</ul>
                    </li>
                    <li><a href="#" id="ads_toggle">ADS</a></li>
                     <li><ul id="ads_id">
                    		<li><a href="#">Add Events</a></li>
                 			<li><a href="#">Add Pictures</a></li>
                 			<li><a href="#">Add Videos</a></li>
                    	</ul>
                    </li>
                    <li><a href="#">ACCOUNTS</a></li>
                    <li><a href="#">REPORTS</a></li>
                    <li class="nav-divider"></li>
                </ul>
            </div>
            <!--/.well -->
        </div>
        <!--/span-->	
        <div class="col-lg-12 col-lg-9 col-md-6">
           <LABEL>EDIT MAIN DISH</LABEL>
          <div class="well">
          	<form role="form" method="POST" class="form-inline">
          	<label>Main Dish:</label>
          	<input type="text" name="input_edit" class="form-control" value="<?php echo $row["side_dish_name"];?>">
          	<input type="submit" name="edit_main_dish" class="btn btn-md btn-inverse" value="Update">
          	</form>
          </div>
          <button class="btn btn-md btn-inverse"><a href="main_dish_pork.php">Back</a></button>
</div>
<!--/.container-->
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#res_id").hide();
			$("#pax_id").hide();
			$("#ads_id").hide();
			$("#main_id").hide();
			$("#res_toggle").click(function(){
			$("#pax_id").hide(500);
			$("#res_id").toggle(500);
			$("#ads_id").hide(500);
			});
			$("#pax_toggle").click(function(){
				$("#ads_id").hide(500);
				$("#res_id").hide(500);
			$("#pax_id").toggle(500);
			$("#main_id").hide(500);
			});
			$("#ads_toggle").click(function(){
			$("#pax_id").hide(500);
				$("#res_id").hide(500);
			$("#ads_id").toggle(500);
			});
			$("#main_toggle").click(function(){
				$("#main_id").toggle(500);
			});
		});
	</script>
	<script type="text/javascript">
	$(document).ready(function(){
		$("#nbell").click(function(){
			<?php $sql="update notification set notif_remarks=1 where notif_remarks=0";
                        $result=mysqli_query($connect,$sql);
            ?>
		$("#count").hide();
		});
	});
</script>
	</body>
</html>
<?php } 
echo archive_res($connect);
if(isset($_POST["edit_main_dish"])){
	$update=$_POST["input_edit"];
	$sql="update pax_side_dish set side_dish_name='".$update."' where side_dish_id='".$id."'";
	$result=mysqli_query($connect,$sql);
	echo '<script>alert("UPDATE SUCCESS")
	window.location.href="main_dish_pork.php";</script>';
}
 ?>