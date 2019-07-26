<?php
session_start();
include '../functions.php';
if(!isset($_SESSION["admin_name"])){
	echo '<script>window.location.href="../error.php"</script>';
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
<link rel="stylesheet" href="../css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="../css/designs.css">
<style type="text/css">
	a{
		color: black;
	}
</style>
	</head>
	<body>

<?php include 'nav.php';
 ?>
 <div class="container">
<div class="col-md-4">
 
				<div class="well adm-menu">
				<img src="img/calendar.png" style="width: 100%; height:50%;">
				<center>
				<br>
				<button class="btn btn-sm btn-inverse btn-log"><a href="admin_res.php" class="text-inverse" type="button">RESERVATION</a></button>
		</center>
				</div>
		</div>  
<div class="col-md-4">
 
				<div class="well adm-menu">
				<img src="img/package.png" style="width: 100%; height:50%;">
				<center>
				<br>
				<button class="btn btn-sm btn-inverse btn-log"><a href="main_dish_pork.php" class="text-inverse" type="button">PACKAGE</a></button>
		</center>
				</div>
		</div>
				 <div class="col-md-4"> 
				<div class="well adm-menu">
				<img src="img/ads.png" style="width: 100%; height:50%;">
				<center>
				<br>
				<button class="btn btn-sm btn-inverse btn-log"><a href="ads_evets.php class="text-inverse" type="button">ADS</a></button>
		</center>
				</div>
		</div>
		<div class="col-md-2"></div>
		 <div class="col-md-5"> 
				<div class="well adm-menu">
				<img src="img/user.png" style="width: 100%; height:50%;">
				<center>
				<br>
				<button class="btn btn-sm btn-inverse btn-log"><a href="user_account.php" class="text-inverse" type="button">ACCOUNTS</a></button>
		</center>
				</div>
		</div>
		 <div class="col-md-2"></div>
		 <div class="col-md-5">  
				<div class="well adm-menu">
				<img src="img/report.png" style="width: 100%; height:50%;">
				<center>
				<br>
				<button class="btn btn-sm btn-inverse btn-log"><a href="report.php" class="text-inverse" type="button">REPORTS</a></button>
		</center>
				</div>
		</div>
</div>  

</div>  

		 <script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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