<?php
include '../functions.php';
session_start();
if(!isset($_SESSION["admin_name"])){
	echo '<script>window.location.href="../error.php"</script>';
}

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
                    		<li><a href="side_dish.php">Side Dishes</a></li>
                 			<li><a id="main_toggle">Main Dishes</a></li>
                 			<li class="nav">
                 			<ul id="main_id">
                    		<li><a href="main_dish_pork.php">Pork</a></li>
                 			<li><a href="main_dish_beef.php">Beef</a></li>
                 			<li><a href="main_dish_chicken.php">Chicken</a></li>
                 			<li><a href="main_dish_seafood.php">Seafoods</a></li>
                    	</ul>
                    </li>
                 			<li><a href="dessert.php">Dessert</a></li>
                 			<li><a href="drinks.php">Drinks</a></li>
                 			<li><a href="soup.php">Soup</a></li>
                    	</ul>
                    </li>
                    <li><a href="#" id="ads_toggle">ADS</a></li>
                     <li><ul id="ads_id">
                    		<li><a href="ads_events.php">Add Events</a></li>
                 			<li><a href="ads_image.php">Add Pictures</a></li>
                 			<li><a href="ads_video.php">Add Videos</a></li>
                    	</ul>
                    </li>
                    <li><a href="user_account.php">ACCOUNTS</a></li>
                    <li><a href="reports.php">REPORTS</a></li>
                    <li class="nav-divider"></li>
                </ul>
            </div>
            <!--/.well -->
        </div>
        <!--/span-->	
        <div class="col-lg-12 col-lg-9 col-md-6">
            <table class="table table-condensed">
            	<thead>
            	<tr>
            		<th>Image Title</th>
                <th>Image Category</th>
                <th>Image</th>
            	</tr>
            	</thead>
            	<?php echo ads_vid($connect);?>

            </table>
                
 <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal">Add Videos</button>
 <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Videos</h4>
      </div>
      <div class="modal-body">
       <form method="post" class="form-group" enctype="multipart/form-data">
       	<label>Video Title:</label>
       	<input type="text" name="input_title" placeholder="Title" class="form-control">
       	<label>Video Content:</label>
       	<input type="text" name="input_content" placeholder="Category" class="form-control">
       	<label>Video:</label>
       	<input type="file" name="input_vid">
       	<br>
       	<input type="submit" name="add_img" class="btn btn-info btn-xs" value="Submit">
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

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
	</body>
</html>
<?php 
if(isset($_POST["add_img"])){
 $add_title=$_POST["input_title"];
 $add_content=$_POST["input_content"];
 //$add_img=$_POST["input_img"];
 $folder="../uploads/";
 move_uploaded_file($_FILES["input_vid"]["tmp_name"], "$folder".$_FILES["input_vid"]["name"]);
 $imagename=$_FILES["input_vid"]["name"];
//Insert the image name and image content in image_table  
 echo  $imagename=$_FILES["input_vid"]["name"]; if ($_FILES["input_vid"]["size"] > 200000000000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
else{
$insert_image="INSERT INTO ads_vid(vid_title,vid_category,vid_path,vid_url) VALUES('".$add_title."','".$add_content."','$folder','".$imagename."')";
mysqli_query($connect,$insert_image);
}
 // echo '<script>alert("Video Added");
 // 	window.location.href="ads_image.php";
 // </script>';
}
?>