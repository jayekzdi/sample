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
<link rel="stylesheet" type="text/css" href="dttable/css/datatables.css"/>
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
        	<table id="table" class="table table-condensed">
            	<thead>
            	<tr>
            		<th>NAME</th>
            		<th>DATE</th>
            		<th>TIME</th>
            		<th>VENUE</th>
            		<th>OCCASION</th>
            		<th>NUMBER OF GUESTS</th>
            		<th>TOTAL PRICE</th>
            	</tr>
            	</thead>
            	<tbody>
            	<?php echo reports($connect);?>
            		</tbody>
            </table>
        	</div>
<!--/.container-->
		 <script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		 <script src="dttable/js/datatables.js"></script>
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
			$(".table").DataTable({
				"search": false
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