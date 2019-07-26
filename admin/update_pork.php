<?php
include '../functions.php';
session_start();
echo archiving_res($connect);

if(!isset($_SESSION["admin_name"])){
	echo '<script>window.location.href="../error.php"</script>';
}
$id=$_GET["main_dish_id"];
						$sql="select * from pax_main_dish where main_dish_id='".$id."'";
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
<?php include 'nav.php';
include 'leftnav.php';
 ?>
        <div class="col-lg-12 col-lg-9 col-md-6">
           <LABEL>EDIT MAIN DISH</LABEL>
          <div class="well">
          	<form role="form" method="POST" class="form-inline">
          	<label>Main Dish:</label>
          	<input type="text" name="input_edit" class="form-control" value="<?php echo $row["main_dish_name"];?>">
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
<?php 
} 
if(isset($_POST["edit_main_dish"])){
	$update=$_POST["input_edit"];
	$sql="update pax_main_dish set main_dish_name='".$update."' where main_dish_id='".$id."'";
	$result=mysqli_query($connect,$sql);
	echo '<script>alert("UPDATE SUCCESS")
	window.location.href="main_dish_pork.php";</script>';
}
 ?>