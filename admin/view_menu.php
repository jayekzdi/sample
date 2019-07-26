<?php
include '../functions.php';
session_start();
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
include 'leftnav.php';
 ?>
        <div class="col-lg-12 col-lg-9 col-md-6">
        	<?php 	if (isset($_POST["view_menu"])){
        		$full_name=$_POST['name'];
        		$res_date=$_POST['reserve_date'];
        		$res_time=$_POST['reserve_time'];
        		$sql1="select * from reservation where res_full_name='".$full_name."' and  res_time='".$res_time."' and res_date='".$res_date."'";
        		 $result=mysqli_query($connect,$sql1);
                 $row=mysqli_fetch_array($result);?>
               	<div class="col-md-6">
               		<div class="col-md-6">
               <div class="form-inline">
                <h5><label>Name:</label>
              <?php echo $row["res_full_name"];?></h5>
               </div>
               		<div class="form-inline">
                <h5><label>Date:</label>
              <?php echo $row["res_date"];?></h5>
               </div>
               		<div class="form-inline">
                <h5><label>Time:</label>
              <?php echo $row["res_time"];?></h5>
               </div>
             </div>
               <div class="col-md-6">
             		<h5><label>Venue:</label>
              <?php echo $row["res_venue"];?></h5>
              <h5><label>Occasion:</label>
              <?php echo $row["res_occasion"];?></h5>
              <h5><label>Number per Pax:</label>
              <?php echo $row["res_no_of_reservation"];
              ?></h5>
               </div>
             		</div><!-- col-md-6 -->

             	
             		<div class="col-md-8">
             		 <h5><label>Theme:</label>
             		 	<?php 	echo $row["res_theme"]; ?></h5>
             		 	 <h5><label>Mottif:</label>
             		 	<?php 	echo $row["res_mottif"]; ?></h5>
             		 	 <h5><label>Side Dish:</label>
             		 	<?php 	echo $row["res_side_dish"]; ?></h5>
             		 	<h5><label>Dessert:</label>
             		 	<?php 	echo $row["res_dessert"]; ?></h5>
             		 	<h5><label>Juice:</label>
             		 	<?php 	echo $row["res_drinks"]; ?></h5>
             		 	<h5><label>Main Dish:</label>
             		 	<?php 	$array=explode(",",$row["res_main_dish"]);
             		 					echo '<ul class="navbar nav" style="margin:10px;">';
             		 				foreach ($array as $res_main_dish) {
             		 						echo '<li>'.$res_main_dish.'</li>';
             		 					}	
             		 				echo '</ul>';?></h5>
             		 		<h5><label>Additional Concern:</label><br>	
             		 	<?php 	echo $row["res_additional"]; ?></h5><br>
             		 	<a href="pax_menu.php"><button class="btn btn-md btn-default">BACK</button></a>
             		</div>
             		
             	</div>
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

<?php
}//condition ?>