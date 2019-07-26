<?php
session_start();
include ("../functions.php");  
function disp(){  
if(!isset($_SESSION["dispname"])){
  echo '<script>window.location.href="../error.php"</script>';
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
  <a href="event.php">GALLERY</a>
    </li>';
  }
}
$full_name=$_GET['res_full_name'];
$date=$_GET["res_date"];
$time=$_GET["res_time"];
$sql="select * from reservation where res_full_name='".$full_name."' and res_date='".$date."' and res_time='".$time."'";
$result=mysqli_query($connect,$sql);
while($row=mysqli_fetch_array($result)){
$id=$row["res_id"];
$no_of_res=$row["res_no_of_reservation"];
?>
<?php $txt="HOME";
$txt1="RESERVE";
$txt2="PACKAGES";
$txt4="CONTACT US";
$txt3="ABOUT US";
$rate=195;
$total=$no_of_res*$rate;
$soup=0;
$cf=0;
?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="../css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<?php include 'header.php' ?>
<br/>
    <div class="col-sm-offset-2 col-lg-9">
      <div class="jumbotron">
    <div class="container">
      <p class="txtstep"><a hreh="#">Reservation</a> \ <a hreh="#">Packages</a></p> 
      <form class="form-group" method="post" name="pax">
        <div class="row">
            <div class="col-md-6">
              <label for="Mottif">Theme:</label><input type="text" name="pax_theme" class="form-control" style="width:200px;">
                  <label for="Mottif">Mottif:</label><input type="text" name="pax_mottif" class="form-control" style="width:200px;">
                 <label for="sel1">Side Dishes:</label>
                      <select class="form-control" id="bwan" name="pax_side_dishes" required style="width:200px;"  >
                        <option hidden></option>
                        <?php 
                        echo side_dishes($connect);
                        ?>
                      </select>
                         <label for="sel1">Dessert:</label>
                      <select class="form-control" id="pax_dessert" name="pax_dessert" required style="width:200px;" required >
                         <option value="" hidden></option>
                         <?php 
                        echo dessert($connect);
                        ?>
                      </select>

                    <label for="sel1">Drinks:</label>
                      <select class="form-control" id="bwan" name="pax_drinks" onchange="" required style="width:200px;" required >
                         <option hidden></option>
                        <?php 
                        echo drinks($connect);
                        ?>
                      </select>
                  </div>
                    <div class="col-md-6">
                      <h4 class="res-color">Main Dish:</h4>
                      <div class="main-dish">                      
                      <h5 class="res-color"><strong>Pork:</strong></h5>
                      <?php echo main_dish_pork($connect);?>
                      <h5 class="res-color"><strong>Chicken:</strong></h5>
                      <?php echo main_dish_chicken($connect);?>
                      <h5 class="res-color"><strong>Beef:</strong></h5>
                      <?php echo main_dish_beef($connect);?>
                      <h5 class="res-color"><strong>Seafood:</strong></h5>
                      <?php echo main_dish_seafood($connect);?>
                    </div><!--id-->
                    </div><!--md-6-->
                </div><!--rows-->
                <div class="rows">
          <div class="col-md-6"></div>
          <div class="col-md-6">
              <h5 class="res-color"><strong>Add Ons:</strong></h5>
              <div id="addons-chk">
              <?php echo addons($connect); ?> 
              </div>
              <p id="sample1">sasa</p>
              <!-- <div id="no-of-set">
                 <h5 class="res-color"><strong>No of Sets:</strong></h5>
                 <h6>(1 set is consist of 100 pax.)</h6>
                 <input type="text" name="pax_set" class="form-control">
              </div> -->
              <div id="pax-soup">
              <label for="sel1">Soup:</label><h6>(additional Php 25.00 per pax)</h6>  
                      <select class="form-control" id="soup" name="pax_soup"  style="width:200px;">
                         <option hidden value=""></option>
                        <?php 
                        echo soup($connect);
                        
                        $soup="";?>
                      </select><br>
                    </div><!--soup-->
            
          </div><!--md-6-->
        </div><!--rows-->
        <div class="rows">
          <div class="col-md-6">
                    <div class="form-inline">
                      <div id="fountain">
                      <h5 class="res-color">UPGRADE YOUR DESSERT TO CHOCOLATE FOUNTAIN:</h5>
                  <label class="radio-inline"><input type="radio"  id="fountain" name="fountain" value="YES">YES</label>
                  <label class="radio-inline"><input type="radio"  id="fountain" name="fountain" value="NO">NO</label>
                </div><!--id-->
                <label>Additional Concerns:</label>
                  <textarea rows="5" class="form-control" name="res_additional" style="width: 500px; resize: none;"></textarea> 
                <input type="submit" id="submit" name="set_package" class="btn btn-md btn-primary" value="Set Packages">
        <p id="pcal" name="calculated">show result</p>
        <input type="hidden" id="price" name="price">
        <input type="button" id="calculate" name="calculate" class="btn btn-md btn-primary" value="COMPUTE">  
            </div><!--inline-->
          </div><!--md-6-->
        <div class="col-md-6">
                  
      </div>
    </div>
        </form>
        <div class="rows">
        <div class="col-md-9">
        <h4>TERMS AND CONDITIONS:</h4>
          <ul type="disc">
            <li>The price in this packages is estimated only.</li>
            <li>Rates are subject to change without prior notice.</li>
          </ul>
        </div>
      </div>
    </div><!--container-->
  </div><!--jumbtron-->
    </div><!-- col-md4 -->
    <?php include 'footer.php'; 
  ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   <script src="../js/jquery.js"></script>
  <script src="../js/jquery.datetimepicker.full.js"></script>
    <script type="text/javascript">
  $(document).ready(function(){
     var $pac_soup;
     var $fountain;
    var $addons=0;
     var $total="<?php echo $total;?>";
     var $pax="<?php echo $no_of_res;?>";
     $("#fountain").show();
     $(".main-dish input:checkbox").click(function(){
 var choixe= $(".main-dish input:checkbox:checked").length>=3;
  $(".main-dish input:checkbox").not(":checked").attr("disabled",choixe);
  
   });
     $("#pax-soup").hide();
     $("#no-of-set").hide();
     $("#sample1").hide();
     $("#addons-chk input:checkbox[value*='Bar']").click(function(){
      if($(this).prop("checked")==true){
        $("#no-of-set").show(500);
        var pax_add_ons=$(this).val();
       $.ajax({
        url:"addonsprice.php",
        type:'POST',
        data:{pax_add_ons:pax_add_ons},
        success: function(data){
          $addons1=data;
          $addons=$addons+parseFloat($addons1,10);
          $('#price').val("P "+(parseFloat($addons,10)+parseFloat($fountain,10)+parseFloat($total,10)));
          $("#pcal").hide();
          $("#submit").hide();
          $("#calculate").show();
          $("#no-of-set").show(500);
        }
      });
      }
      else{
         var pax_add_ons=$(this).val();
         $.ajax({
        url:"addonsprice.php",
        type:'POST',
        data:{pax_add_ons:pax_add_ons},
        success: function(data){
          $addons1=data;
          $addons=$addons-parseFloat($addons1,10);
          $('#price').val("P "+(parseFloat($addons,10)+parseFloat($fountain,10)+parseFloat($total,10)));
          $("#pcal").hide();
          $("#submit").hide();
          $("#calculate").show();
        $("#no-of-set").hide(500);
          }
      });
      }
     });
      $("#addons-chk input:checkbox[value=Soup]").click(function(){
      if($(this).prop("checked")==true){
        $("#pax-soup").show(500);
        $("#soup").prop('disabled',false);
        var pax_add_ons=$(this).val();
        $.ajax({
        url:"addonsprice.php",
        type:'POST',
        data:{pax_add_ons:pax_add_ons},
        success: function(data){
          $pac_soup=data;
          $addons1=$pac_soup*$pax;
          $addons=$addons+parseFloat($addons1,10);
          $("#pcal").hide();
          $('#price').val("P "+(parseFloat($addons,10)+parseFloat($fountain,10)+parseFloat($total,10)));
          $("#pcal").hide();
          $("#submit").hide();
          $("#calculate").show();
        }
      });
        
  }//if
      else{
         $("#pax-soup").hide(500);
          var pax_add_ons=$(this).val();
        $.ajax({
        url:"addonsprice.php",
        type:'POST',
        data:{pax_add_ons:pax_add_ons},
        success: function(data){
          $pac_soup=data;
          $addons1=$pac_soup*$pax;
          $addons=$addons-parseFloat($addons1,10);
         $("#pcal").hide();
          $('#price').val("P "+(parseFloat($addons,10)+parseFloat($fountain,10)+parseFloat($total,10)));   
      }
    });
        $("#submit").hide();
          $("#calculate").show();
          $("#soup").val("");
          $("#soup").prop('disabled',true);  
      }
  });//click function soup
      $("#addons-chk input[Value$='Package']").click(function(){
        if($(this).prop("checked")==true){
        var pax_add_ons=$(this).val();
        $.ajax({
        url:"addonsprice.php",
        type:'POST',
        data:{pax_add_ons:pax_add_ons},
        success: function(data){
          var $kiddie=data;
          $total=$kiddie*$pax;
          $("#sample1").text($addons);
          $('#price').val("P "+(parseFloat($addons,10)+parseFloat($fountain,10)+parseFloat($total,10)));
        }
      });
        $("#pcal").hide();
          $("#submit").hide();
          $("#calculate").show();
      }
      else{
        $total="<?php echo $total; ?>";
        $('#price').val("P "+(parseFloat($addons,10)+parseFloat($fountain,10)+parseFloat($total,10)));
         $("#pcal").hide();
          $("#submit").hide();
          $("#calculate").show();
      }
       });
     $("#addons-chk input[Value$='Fountain']").click(function(){
      if($(this).prop("checked")==true){
       $("#fountain").hide(500);
        var pax_add_ons=$(this).val();
        $.ajax({
        url:"addonsprice.php",
        type:'POST',
        data:{pax_add_ons:pax_add_ons},
        success: function(data){
          $fountain=data;
         $('#price').val("P "+(parseFloat($addons,10)+parseFloat($fountain,10)+parseFloat($total,10)));
        }
      });
       $("input[type=radio][name=fountain]").prop('checked', false);
          $("#submit").hide();
           $("#pcal").hide();
           $("#calculate").show();
      }
      else{
        $("#fountain").show(500);
        $("#pcal").hide();
        $fountain=0;
       $("input[type=radio][name=fountain]").prop('checked', false);
       $('#price').val("P "+(parseFloat($addons,10)+parseFloat($fountain,10)+parseFloat($total,10)));
           $("#calculate").show();
          $("#submit").hide();
      }
  });
     if(("input[type=radio][name=fountain]").value==null && $('#soup option:first').text()==""){
       $fountain=0;
        $pac_soup=0;
        $kiddie=0;
        $bar=0;
        $soup_pax=0;
         $("#pcal").hide();
         $('#price').val("P "+(parseFloat($addons,10)+parseFloat($fountain,10)+parseFloat($total,10)));
          $("#submit").hide();
          $("#calculate").hide();
      }
      $("select").click(function(){
        $("#pcal").hide();
        $("#submit").hide();
        $("#calculate").show();
      });
     $("input[type=radio][name=fountain]").click(function(){
      if(this.value=="YES"){
         $fountain=1000;
          $("#pcal").hide();
          $('#price').val("P "+(parseFloat($addons,10)+parseFloat($fountain,10)+parseFloat($total,10)));
           $("#submit").hide();
          $("#calculate").show();
          $("#pax_dessert").val('');
          $("#pax_dessert").prop('selected',true);
          $("#pax_dessert").prop('disabled',true);

      }
      else{
         $fountain=0;
         $("#pcal").hide();
         $('#price').val("P "+(parseFloat($addons,10)+parseFloat($fountain,10)+parseFloat($total,10)));
          $("#submit").hide();
          $("#calculate").show();
           $("#pax_dessert").prop('disabled',false);
      }

    });
    $("#calculate").click(function(){
     $('#pcal').text($("#price").val());
        $("#pcal").show();
      $("#submit").show();
     $("#calculate").hide();
    });
  });
  </script>
</body>
</html>
<?php
}
if(isset($_POST["set_package"])){
$package=$_POST["pax_main"];
$chk="";
foreach ($package as $pck) {
 $chk.=$pck.",";
}
if(!isset($_POST["pax_add_ons"])){
  $pax_add_ons="No Addons";
}
else{
$ao=$_POST["pax_add_ons"];
$ao="";
foreach ($ao as $pao) {
 $pax_add_ons.=$pao.",";
}
}
$pax_mottif=$_POST["pax_mottif"];
$pax_side_dishes=$_POST["pax_side_dishes"];
$pax_drinks=$_POST["pax_drinks"];
$pax_soup="N/A";
$res_additional="No Additional Concerns";
  $price=$_POST['price'];
if(isset($_POST["pax_dessert"])and !empty($_POST["pax_dessert"])){
  $pax_dessert=$_POST["pax_dessert"];
 $sql="update reservation set res_package='Pacakage A',res_mottif='".$pax_mottif."',res_theme='".$pax_theme."',res_side_dish='".$pax_side_dishes."',res_dessert='".$pax_dessert."',res_drinks='".$pax_drinks."',res_main_dish='".$chk."',res_addons='".$pax_add_ons."',res_price='".$price."' where res_id='".$id."'";
        $result=mysqli_query($connect,$sql);
        if(isset($_POST["pax_soup"])and !empty($_POST["pax_soup"])){
          $pax_soup=$_POST["pax_soup"];
          $sql1="update reservation set res_soup='".$pax_soup."'where res_id='".$id."'";
        $result=mysqli_query($connect,$sql1);
        }
      else{
          $sql1="update reservation set res_soup='".$pax_soup."'where res_id='".$id."'";
        $result=mysqli_query($connect,$sql1);
      }
    if(isset($_POST["res_additional"])and !empty($_POST["res_additional"])){
      $res_additional=$_POST["res_additional"];
      $sql2="update reservation set res_additional='".$res_additional."'where res_id='".$id."'";
        $result=mysqli_query($connect,$sql2);
      }
      else{
        $sql2="update reservation set res_additional='".$res_additional."'where res_id='".$id."'";
        $result=mysqli_query($connect,$sql2);
      }
    }
else{
   $choco="Chocolate Fountain";
$sql="update reservation set res_package='Pacakage A',res_mottif='".$pax_mottif."',res_theme='".$pax_theme."',res_side_dish='".$pax_side_dishes."',res_dessert='".$choco."',res_drinks='".$pax_drinks."',res_drinks='".$pax_drinks."',res_main_dish='".$chk."',res_addons='".$pax_add_ons."',res_price='".$price."' where res_id='".$id."'";
        $result=mysqli_query($connect,$sql);
   if(isset($_POST["pax_soup"])and !empty($_POST["pax_soup"])){
          $pax_soup=$_POST["pax_soup"];
          $sql1="update reservation set res_soup='".$pax_soup."'where res_id='".$id."'";
        $result=mysqli_query($connect,$sql1);
        }
      else{
          $sql1="update reservation set res_soup='".$pax_soup."'where res_id='".$id."'";
        $result=mysqli_query($connect,$sql1);
      }
      if(isset($_POST["res_additional"])and !empty($_POST["res_additional"])){
      $res_additional=$_POST["res_additional"];
      $sql2="update reservation set res_additional='".$res_additional."'where res_id='".$id."'";
        $result=mysqli_query($connect,$sql2);
      }
      else{
        $sql2="update reservation set res_additional='".$res_additional."'where res_id='".$id."'";
        $result=mysqli_query($connect,$sql2);
      }
}
       echo '<script>alert("Please wait for the confirmation of your Reservation Thank you.")
      window.location.href="../index.php";</script>';

}
?>