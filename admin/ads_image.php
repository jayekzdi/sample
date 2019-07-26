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
            <table class="table table-condensed">
            	<thead>
            	<tr>
            		<th>Image Title</th>
                <th>Image Category</th>
                <th>Image</th>
                <th></th>
                <th></th>
            	</tr>
            	</thead>
              <tbody>
            	<?php echo ads_img($connect);?>
</tbody>
            </table>
                
 <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal">Add Image</button>
 <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Image</h4>
      </div>
      <div class="modal-body">
       <form method="post" class="form-group" enctype="multipart/form-data">
       	<label>Image Title:</label>
       	<input type="text" name="input_title" placeholder="Title" class="form-control">
       	<label>Image Content:</label>
       	<input type="text" name="input_content" placeholder="Category" class="form-control">
       	<label>Image:</label>
       	<input type="file" name="input_img">
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
if(isset($_POST["add_img"])){
 $add_title=$_POST["input_title"];
 $add_content=$_POST["input_content"];
 //$add_img=$_POST["input_img"];
 $folder="../uploads/";
 move_uploaded_file($_FILES["input_img"]["tmp_name"], "$folder".$_FILES["input_img"]["name"]);
 $imagename=$_FILES["input_img"]["name"];   
//Insert the image name and image content in image_table
$insert_image="INSERT INTO ads_img(img_title,img_category,img_path,img_url) VALUES('".$add_title."','".$add_content."','$folder','$imagename')";
mysqli_query($connect,$insert_image);
 echo '<script>alert("Image Added");
 	window.location.href="ads_image.php";
 </script>';
}
?>