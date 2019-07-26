<?php
session_start();
include ("../functions.php");  
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
  <a href="reserve.php">RESERVE</a>
    </li>
    <li class="nav-item">
  <a href="../event.php">GALLERY</a>
    </li>';
  }
else{
echo '<script>window.location.href="../error.php"</script>';
  }
}
?>
<?php $txt="HOME";
$txt1="RESERVE";
$txt2="PACKAGES";
$txt4="CONTACT US";
$txt3="ABOUT US";
?>
<!DOCTYPE html>
<html>
<head>

<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<!-- <link rel="stylesheet"
			  href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/css/bootstrap-material-design.min.css"/> -->
		<link rel="stylesheet"
			  href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/css/ripples.min.css"/>

		<link rel="stylesheet" href="../css/bootstrap-material-datetimepicker.css" />
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script src="https://code.jquery.com/jquery-1.12.3.min.js" integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ=" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="..js/bootstrap-material-datetimepicker.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/material.min.js"></script>
		<script type="text/javascript" src="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/js/material.min.js"></script>
		<script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
		<script type="text/javascript" src="../js/bootstrap-material-datetimepicker.js"></script>

<style>

  body {
    margin: 40px 10px;
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 14px;
  }
  a{
    color: black;
  }
  #calendar {
    max-width: 900px;
    margin: 0 auto;
    color: black;  
  }

</style>
<?php include'header.php'; ?>
<br/>
<?php echo archiving_res($connect); ?>
<div class="col-sm-offset-2 col-lg-9">
      <div class="jumbotron">
		<div class="container">
      <p class="txtstep"><a hreh="#">Reservation</a></p>
      <div class="col-lg-3">
			<form class="form-group" method="post">
          	<h5 class="res-color"><strong>Date:</strong></h5>
						<input type="text" id="date" class="form-control floating-label"  name="res_date" style="width: 150px;" required>
 
      	<h5 class="res-color"><strong>Time:</strong></h5>
            <input type="text" id="time" class="form-control floating-label" name="res_time" style="width: 150px;"  required>
        <h5 class="res-color"><strong>Venue:</strong></h5> </label>
  <select class="form-control" id="venue-sel" name="res_venue"
                      value="<?php echo $_POST["res_venue"]; ?>" style="width: 150px;" 
                        required>
                        <option selected="selected" hidden></option>
                         <?php echo event_centre($connect); ?>
                      </select>
  <h5 class="res-color venue-specify"><strong>Please Specify:</strong></h5> 
<input class="form-control venue-specify" type="text"  id="venue" name="res_svenue" style="width: 150px;">
      
<label class="checkbox-inline"><input type="checkbox" class="checkme">
        <h5 class="res-color"><strong>Use other Phone Number:</strong></h5>
 </label>
<input class="form-control" type="Number" id="contact-number" name="res_contact2" value="<?php echo isset($_POST["res_contact2"]) ? $_POST["res_contact2"]: ''; ?> " style="width: 150px;">
                  <label for="sel1">Occasion:</label>
                      <select class="form-control" id="sel1" name="res_occasion"
                      value="<?php echo $_POST["res_occasion"]; ?> " style="width: 150px;" 
                        required>
                        <option selected="selected" hidden></option>
                        <option>Anniversary</option>
                        <option>Baptismal</option>
                        <option>Birthday</option>
                        <option>Debut</option>
                        <option>Reunion</option>
                        <option>Seminar</option>
                        <option>Wedding</option>
                        <option>Others</option>
                      </select>

                 <h5 class="res-color Occasion-specify"><strong>Please Specify:</strong></h5> 
<input class="form-control Occasion-specify" type="text" name="res_occasion" style="width: 150px;">
                  <div class="form-inline">
                  <h5 class="res-color"><strong>Number of Guest</strong></h5>
                  <input class="form-control" type="Number" name="res_no_of_reservation" value="<?php echo $_POST["res_no_of_reservation"]; ?> "  style="width: 150px;" required><h6>Disclaimer:Kagahin Catering Services Accepts minimum of 50 guests.</h6>
                </div>
                <input type="hidden" name="price" id="price/">
                  <input type="submit" name="reserve" class="btn btn-md btn-primary" value="Reserve" >
				</form>
    </div>
        <div class="col-lg-9">
        <?php include 'json.php'; ?>
        </div>
		</div><!--container-->
    
  </div><!--jumbtron-->
		</div><!-- col-md4 -->
    <?php include 'footer.php' ?>
    <script type="text/javascript">

  $(document).ready(function() {

    $('#date').bootstrapMaterialDatePicker
      ({
        time: false,
        clearButton: true,
        format: 'YYYY-MM-DD'
      });

$('#time').bootstrapMaterialDatePicker
      ({
        date: false,
        shortTime: true,
        format: 'hh:mm A',
        clearButton:true
      });
      $("#contact-number").prop('disabled',true);
      $('.checkme').click(function(){
        if($('.checkme').prop('checked')==true){
          $("#contact-number").prop('disabled',false);
          $("#contact-number").prop('required',true);
        }
        else{
          $("#contact-number").prop('disabled',true);
        }
    });
    $('.venue-specify').hide();
    $('.Occasion-specify').hide();
    $("#venue-sel").click(function(){  
      if($("#venue-sel option:selected").text()=="Others"){
         $('.venue-specify').show(500); 
         $(".venue-specify").prop('disabled',false);
          $.ajax({
        url:"venueprice.php",
        type:'POST',
        data:{res_venue:res_venue},
        success: function(data){
          $venue=data;
          $('#price').val("P "+$venue);
        }
      });
      }
       else{
        $('.venue-specify').hide(500); 
         $(".venue-specify").prop('disabled',true);
         $.ajax({
        url:"venueprice.php",
        type:'POST',
        data:{res_venue:res_venue},
        success: function(data){
          $venue=data;
          $('#price').val("P "+$venue);
        }
      });
      }
    });

    $("#sel1").click(function(){
      if($("#sel1 option:selected").text()=="Others"){
         $(".Occasion-specify").show(500); 
         $(".Occasion-specify").prop('disabled',false);

       }
       else{
        $(".Occasion-specify").hide(500); 
         $(".Occasion-specify").prop('disabled',true);
       }
    });
  });
</script>
</body>
</html>

<?php
if(isset($_POST["reserve"])){
	$res_full_name=$_SESSION["dispname"];
  $res_date=$_POST["res_date"];
  $date1=date_create($res_date);
  $res_contact=$_SESSION["user_contact"];
	$res_occasion=$_POST["res_occasion"];
  $res_time=$_POST["res_time"];
  $res_venue=$_POST["res_venue"];
	$res_no_of_reservation=$_POST["res_no_of_reservation"];
	$current_date=date_create(date("m/d/y"));
  $date=date_diff($current_date,$date1);
  $interval=$date->format('%r%a');
if($interval<=3){
  echo '<script>alert("You must reserve 3 days before the event")</script>';
}
else{
  if($res_no_of_reservation<50){
     echo '<script>alert("The number of guest we aquire is 50 and above.")</script>';
  }
    else{
      $sql="select * from reservation where res_date='".$res_date."' and res_time='".$res_time."'";
       $result=mysqli_query($connect,$sql);
       if(mysqli_num_rows($result)){
         echo '<script>alert("Sorry you have the same reservation.")</script>';
        }
      else{
      if(isset($_POST['res_contact2'])&&!empty($_POST['res_contact2'])){
         $res_contact2=$_POST['res_contact2'];
        if(isset($_POST['res_svenue'])&&!empty($_POST['res_svenue'])){
        $res_svenue=$_POST['res_svenue'];
        $sql="insert into reservation(res_full_name,res_date,res_time,res_venue,res_contact,res_occasion,res_no_of_reservation,res_price,res_remarks)value('".$res_full_name."','".$res_date."','".$res_time."','".$res_contact2."','".$res_svenue."','".$res_occasion."','".$res_no_of_reservation."','True')";
        $result=mysqli_query($connect,$sql);
        $sql1="insert into notification(notif_content,notif_date,notif_time,notif_name,notif_link,notif_remarks)value('".$res_full_name." has been reserve ',DATE_FORMAT(now(),'%m/%d/%Y'),DATE_FORMAT(now(),'%h:%i %p'),'Administrator','pending_res.php',0)";
        $result1=mysqli_query($connect,$sql1);
       echo '<script>
       window.location.href="package_pick.php?res_full_name='.$res_full_name.'&res_date='.$res_date.'&res_time='.$res_time.'";</script>';
     }//specified venue
     else{
      $sql="insert into reservation(res_full_name,res_date,res_time,res_venue,res_contact,res_occasion,res_no_of_reservation,res_remarks)value('".$res_full_name."','".$res_date."','".$res_time."','".$res_contact2."','".$res_venue."','".$res_occasion."','".$res_no_of_reservation."','True')";
        $result=mysqli_query($connect,$sql);
        $sql1="insert into notification(notif_content,notif_date,notif_time,notif_name,notif_link,notif_remarks)value('".$res_full_name." has been reserve ',DATE_FORMAT(now(),'%m/%d/%Y'),DATE_FORMAT(now(),'%h:%i %p'),'Administrator','pending_res.php',0)";
        $result1=mysqli_query($connect,$sql1);
       echo '<script>
       window.location.href="package_pick.php?res_full_name='.$res_full_name.'&res_date='.$res_date.'&res_time='.$res_time.'";</script>';
     }//venue   
      }//contact 2
      else{
        if(isset($_POST['res_svenue'])&&!empty($_POST['res_svenue'])){
        $res_contact2=null;
        $res_svenue=$_POST["res_svenue"];
        $sql="insert into reservation(res_full_name,res_date,res_time,res_venue,res_contact,res_occasion,res_no_of_reservation,res_remarks)value('".$res_full_name."','".$res_date."','".$res_time."','".$res_svenue."','".$res_contact."','".$res_occasion."','".$res_no_of_reservation."','Pending')";
        $result=mysqli_query($connect,$sql);
         $sql1="insert into notification(notif_content,notif_date,notif_time,notif_name,notif_link,notif_remarks)value('".$res_full_name." has been reserve ',DATE_FORMAT(now(),'%m/%d/%Y'),DATE_FORMAT(now(),'%h:%i %p'),'Administrator','pending_res.php',0)";
        $result1=mysqli_query($connect,$sql1);
        echo '<script>
       window.location.href="package_pick.php?res_full_name='.$res_full_name.'&res_date='.$res_date.'&res_time='.$res_time.'";</script>';
          }
            else{
              $res_contact2=null;
        $sql="insert into reservation(res_full_name,res_date,res_time,res_venue,res_contact,res_occasion,res_no_of_reservation,res_remarks)value('".$res_full_name."','".$res_date."','".$res_time."','".$res_venue."','".$res_contact."','".$res_occasion."','".$res_no_of_reservation."','Pending')";
        $result=mysqli_query($connect,$sql);
         $sql1="insert into notification(notif_content,notif_date,notif_time,notif_name,notif_link,notif_remarks)value('".$res_full_name." has been reserve ',DATE_FORMAT(now(),'%m/%d/%Y'),DATE_FORMAT(now(),'%h:%i %p'),'Administrator','pending_res.php',0)";
        $result1=mysqli_query($connect,$sql1);
        echo '<script>
       window.location.href="package_pick.php?res_full_name='.$res_full_name.'&res_date='.$res_date.'&res_time='.$res_time.'";</script>';
          }
            }//contact 1
        }//for the condition of comparisson
    }//for the no of visitors
}//for the date interval
}// for the isset of submition
?>