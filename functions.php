<?php
include ("db.php");
function archiving_res($connect){
  $sql="update reservation set res_remarks='False' WHERE res_date = DATE_FORMAT(NOW(),'%Y-%m-%d') AND res_time BETWEEN res_time AND TIME_FORMAT(NOW(),'%h:%i %p')";
  $result=mysqli_query($connect,$sql);
$sql1="insert into archive_reservation(res_full_name,res_date,res_time,res_venue,res_contact,res_occasion,res_no_of_reservation,res_additional,res_package,res_theme,res_mottif,res_side_dish,res_dessert,res_drinks,res_soup,res_main_dish,res_price,res_remarks)
  select res_full_name,res_date,res_time,res_venue,res_contact,res_occasion,res_no_of_reservation,res_additional,res_package,res_theme,res_mottif,res_side_dish,res_dessert,res_drinks,res_soup,res_main_dish,res_price,res_remarks from reservation where res_remarks='False'";
$result=mysqli_query($connect,$sql1);
$sql2="delete from reservation where res_remarks='False'";
$result=mysqli_query($connect,$sql2);
$sql3="update archive_reservation set res_remarks='True' res_date=DATE_FORMAT(CURDATE(),'%Y-%m-%d') AND res_time=TIME_FORMAT(NOW(),'%h:%i %p')";
$result=mysqli_query($connect,$sql3);
}
function make_query($connect){
      $query="select * from event_img order by id asc";
      $result= mysqli_query($connect,$query);
      return $result;
    }
      function make_slide_indicators($connect)
{
 $output = ''; 
 $count = 0;
 $result = make_query($connect);
 while($row = mysqli_fetch_array($result))
 {
  if($count == 0)
  {
   $output .= '
   <li data-target="#carousel" data-slide-to="'.$count.'" class="active"></li>
   ';
  }
  else
  {
   $output .= '
   <li data-target="#carousel" data-slide-to="'.$count.'"></li>
   ';
  }
  $count = $count + 1;
 }
 return $output;
}

function make_slides($connect)
{
 $output = '';
 $count = 0;
 $result = make_query($connect);
 while($row = mysqli_fetch_array($result))
 {
  if($count == 0)
  {
   $output .= '<div class="item active">';
  }
  else
  {
   $output .= '<div class="item">';
  }
  $output .= '
   <img src="img/'.$row["img_url"].'" alt="'.$row["img_name"].'" class="image-responsive"/>
</div>';
  $count = $count + 1;
 }
 return $output;
}

function make_slides_user($connect)
{
 $output = '';
 $count = 0;
 $result = make_query($connect);
 while($row = mysqli_fetch_array($result))
 {
  if($count == 0)
  {
   $output .= '<div class="item active">';
  }
  else
  {
   $output .= '<div class="item">';
  }
  $output .= '
   <img src="../img/'.$row["img_url"].'" alt="'.$row["img_name"].'" class="image-responsive"/>
</div>';
  $count = $count + 1;
 }
 return $output;
}

function event_centre($connect){
                        $sql="select * from event_center";
                        $result=mysqli_query($connect,$sql);
                        while ($row=mysqli_fetch_array($result)) {
                         echo '<option value+"'.$row["ec_name"].'">'.$row["ec_name"].'</option>';
                        }
                }
function dessert($connect){
                        $sql="select * from pax_dessert";
                        $result=mysqli_query($connect,$sql);
                        while ($row=mysqli_fetch_array($result)) {
                         echo '<option>'.$row["des_name"].'</option>';
                        }
}
function side_dishes($connect){
                        $sql="select * from pax_side_dish";
                        $result=mysqli_query($connect,$sql);
                        while ($row=mysqli_fetch_array($result)) {
                         echo '<option>'.$row["side_dish_name"].'</option>';
                        }

}
  function drinks($connect){
                      $sql="select * from pax_drinks";
                        $result=mysqli_query($connect,$sql);
                        while ($row=mysqli_fetch_array($result)) {
                         echo '<option>'.$row["dr_name"].'</option>';
                        }
}
 function soup($connect){
                      $sql="select * from pax_soup";
                        $result=mysqli_query($connect,$sql);
                        while ($row=mysqli_fetch_array($result)){
                         echo '<option value="'.$row["soup_name"].'">'.$row["soup_name"].'</option>';
                        }

                        
}
 function main_dish_pork($connect){
                     $sql="select * from pax_main_dish where main_dish_type='Pork'";
                        $result=mysqli_query($connect,$sql);
                        while ($row=mysqli_fetch_array($result)){
                         echo '<input type="checkbox"  name="pax_main[]" value="'.$row["main_dish_name"].'">'.$row["main_dish_name"].'<br>';
                        }
}
function main_dish_chicken($connect){
                      $sql="select * from pax_main_dish where main_dish_type='Chicken'";
                        $result=mysqli_query($connect,$sql);
                        while ($row=mysqli_fetch_array($result)){
                         echo '<input type="checkbox" name="pax_main[]" value="'.$row["main_dish_name"].'">'.$row["main_dish_name"].'<br>';
                        }
}
function main_dish_beef($connect){
                      $sql="select * from pax_main_dish where main_dish_type='Beef'";
                        $result=mysqli_query($connect,$sql);
                        while ($row=mysqli_fetch_array($result)){
                         echo '<input type="checkbox" name="pax_main[]" value="'.$row["main_dish_name"].'">'.$row["main_dish_name"].'<br>';
                        }
}
function main_dish_seafood($connect){
                      $sql="select * from pax_main_dish where main_dish_type='Seafoods'";
                        $result=mysqli_query($connect,$sql);
                        while ($row=mysqli_fetch_array($result)){
                         echo '<input type="checkbox" name="pax_main[]" value="'.$row["main_dish_name"].'">'.$row["main_dish_name"].'<br>';
                        }
}
function addons($connect){
                        $sql="select * from pax_add_ons";
                          $result=mysqli_query($connect,$sql);
                          while ($row=mysqli_fetch_array($result)){
                         echo '<input type="checkbox" name="pax_add_ons[]" class="addon" value="'.$row["addons_name"].'">'.$row["addons_name"].'
                        <br>';
                        }
                      }

function reservations($connect){
                      $sql="select * from reservation where res_remarks='Pending'";
                        $result=mysqli_query($connect,$sql);
                        while ($row=mysqli_fetch_array($result)){
                        echo '<form action="approve.php" method="post">
                        <tr>
                              <td>'.$row["res_full_name"].'</td>
                              <input type="hidden" name="name" value="'.$row["res_full_name"].'">
                              <td>'.$row["res_date"].'</td>
                              <input type="hidden" name="reserve_date" value="'.$row["res_date"].'">
                              <td>'.$row["res_time"].'</td>
                              <input type="hidden" name="reserve_time" value="'.$row["res_time"].'">
                              <td>'.$row["res_venue"].'</td>
                              <input type="hidden" name="reserve_venue" value="'.$row["res_venue"].'">
                              <td>'.$row["res_occasion"].'</td>
                              <input type="hidden" name="reserve_occasion" value="'.$row["res_occasion"].'">
                              <td style="width:50px;">'.$row["res_no_of_reservation"].'</td>
                              <td>'.$row["res_additional"].'</td>
                              <td>'.$row["res_remarks"].'</td>

                              <input type="hidden" name="reserve_guest" value="'.$row["res_no_of_reservation"].'">
                              <td><input type="submit" name="approve" value="Approve"></td>
                              <td><input type="submit" name="disapprove" value="Disapprove"></td>
                              </tr>
                              </form>';
                              
                        }
}
function reservation($connect){
                      $sql="select * from reservation";
                        $result=mysqli_query($connect,$sql);
                        while ($row=mysqli_fetch_array($result)){
                        echo '<form action="approve.php" method="post">
                        <tr>
                              <td>'.$row["res_full_name"].'</td>
                              <input type="hidden" name="name" value="'.$row["res_full_name"].'">
                              <td>'.$row["res_date"].'</td>
                              <input type="hidden" name="reserve_date" value="'.$row["res_date"].'">
                              <td>'.$row["res_time"].'</td>
                              <input type="hidden" name="reserve_time" value="'.$row["res_time"].'">
                              <td>'.$row["res_venue"].'</td>
                              <input type="hidden" name="reserve_venue" value="'.$row["res_venue"].'">
                              <td>'.$row["res_occasion"].'</td>
                              <input type="hidden" name="reserve_occasion" value="'.$row["res_occasion"].'">
                              <td>'.$row["res_no_of_reservation"].'</td>
                              <td>'.$row["res_remarks"].'</td>
                              <input type="hidden" name="reserve_guest" value="'.$row["res_no_of_reservation"].'">
                              </tr>
                              </form>';
                              
                        }
}
function approve($connect){
  if(isset($_POST["approve"])){
    $sql="update reservation set res_remarks='Approved' where res_full_name='".$_POST["name"]."' and res_date='".$_POST["reserve_date"]."' and res_time='".$_POST["reserve_time"]."' and res_venue='".$_POST["reserve_venue"]."' and res_occasion='".$_POST["reserve_occasion"]."'and res_no_of_reservation='".$_POST["reserve_guest"]."'";
$result=mysqli_query($connect,$sql);
$sql1="select user_email from user_account where user_full_name='".$_POST["name"]."'";
$result1=mysqli_query($connect,$sql1);
$row=mysqli_fetch_array($result1);
$to=$row["user_email"];
$subject="Reservation";
$msg="Good Day Sir/Maam Your Reservation has been Approved 
Thank You for Supporting and Have a Great Day.
From: Administrator
https://www.kagahincs.com";
$header="From:administrator@kagahincs.com";
mail($to, $subject, $msg,$header);
echo '<script>alert("Approved Succeed")
window.location.href="admin_res.php";
</script>';
  }
if(isset($_POST["disapprove"])){
   $sql="update reservation set res_remarks='False' where res_full_name='".$_POST["name"]."' and res_date='".$_POST["reserve_date"]."' and res_time='".$_POST["reserve_time"]."' and res_venue='".$_POST["reserve_venue"]."' and res_occasion='".$_POST["reserve_occasion"]."'and res_no_of_reservation='".$_POST["reserve_guest"]."'";
$result=mysqli_query($connect,$sql);
$sql1="insert into archive_reservation(res_full_name,res_date,res_time,res_venue,res_contact,res_occasion,res_no_of_reservation,res_package,res_mottif,res_side_dish,res_dessert,res_drinks,res_soup,res_main_dish,res_price,res_remarks) select res_full_name,res_date,res_time,res_venue,res_contact,res_occasion,res_no_of_reservation,res_package,res_mottif,res_side_dish,res_dessert,res_drinks,res_soup,res_main_dish,res_price,res_remarks from reservation where res_remarks='False'";
$result=mysqli_query($connect,$sql1);
$sql2="select user_email from user_account where user_full_name='".$_POST["name"]."'";
$result1=mysqli_query($connect,$sql2);
$row=mysqli_fetch_array($result1);
$to=$row["user_email"];
$subject="Reservation";
$msg="Im Sorry Sir/Maam Your Reservation has been Disapproved due to some instances.
From: Administrator
https://www.kagahincs.com";
$header="From:administrator@kagahincs.com";
mail($to, $subject, $msg,$header);
$sql2="delete from reservation where res_remarks='False'";
$result=mysqli_query($connect,$sql2);
echo '<script>alert("Disapproved Success")
window.location.href="admin_res.php";
</script>';
}
}

function manage_seafood($connect){
                      $sql="select * from pax_main_dish where main_dish_type='Seafoods'";
                        $result=mysqli_query($connect,$sql);
                         while ($row=mysqli_fetch_array($result)){
                         echo '<form method="post">
                         <tr>
                         <td>'.$row["main_dish_name"].'</td>
                         <input type="hidden" name="main_dish_name" value="'.$row["main_dish_name"].'">
                         <td><input type="submit" name="edit" value="Edit"></td>
                         <td><input type="submit" name="delete" value="Delete"></td>
                         <input type="hidden" name="main_dish_id" value="'.$row["main_dish_id"].'">
                         </tr>
                         </form>';
                        }
                        if(isset($_POST["edit"])){
                      $id=$_POST["main_dish_id"];
    echo '<script>window.location.href="update_seafood.php?main_dish_id='.$id.'";</script>';
                    }
                    if(isset($_POST["delete"])){

                      $sql="delete from pax_main_dish where main_dish_name='".$_POST["main_dish_name"]."'";
                       $result=mysqli_query($connect,$sql);
                       echo '<script>alert("delete")
                       window.location.href="main_dish_seafood.php"</script>';
                    }
}
function manage_pork($connect){
                      $sql="select * from pax_main_dish where main_dish_type='Pork'";
                        $result=mysqli_query($connect,$sql);
                        while ($row=mysqli_fetch_array($result)){
                          echo '<form method="post">
                         <tr>
                         <input type="hidden" name="main_dish_id" value="'.$row["main_dish_id"].'">
                         <td>'.$row["main_dish_name"].'</td>
                          <input type="hidden" name="main_dish_name" value="'.$row["main_dish_name"].'">
                         <td>
                         <input type="submit" name="edit" value="Edit"></td>
                         <td><input type="submit" name="delete" value="Delete"></td>
                         </tr>
                         </form>';
                        
  }
   if(isset($_POST["edit"])){
                      $id=$_POST["main_dish_id"];
    echo '<script>window.location.href="update_pork.php?main_dish_id='.$id.'";</script>';
                    }
                    if(isset($_POST["delete"])){

                      $sql="delete from pax_main_dish where main_dish_name='".$_POST["main_dish_name"]."'";
                       $result=mysqli_query($connect,$sql);
                       echo '<script>alert("delete")
                       window.location.href="main_dish_pork.php"</script>';
                    }
                    
}
function manage_beef($connect){
                      $sql="select * from pax_main_dish where main_dish_type='Beef'";
                        $result=mysqli_query($connect,$sql);
                         while ($row=mysqli_fetch_array($result)){
                          echo '<form method="post">
                         <tr>
                         <input type="hidden" name="main_dish_id" value="'.$row["main_dish_id"].'">
                         <td>'.$row["main_dish_name"].'</td>
                         <input type="hidden" name="main_dish_name" value="'.$row["main_dish_name"].'">
                         <td><input type="submit" name="edit" value="Edit"></td>
                         <td><input type="submit" name="delete" value="Delete"></td>
                         </tr>
                         </form>';
                        }
                    if(isset($_POST["delete"])){

                      $sql="delete from pax_main_dish where main_dish_name='".$_POST["main_dish_name"]."'";
                       $result=mysqli_query($connect,$sql);
                       echo '<script>alert("delete")
                       window.location.href="main_dish_pork.php"</script>';
                    }
                    if(isset($_POST["edit"])){
                      $id=$_POST["main_dish_id"];
    echo '<script>window.location.href="update_beef.php?main_dish_id='.$id.'";</script>';
                    }
}
function manage_chicken($connect){
    $sql="select * from pax_main_dish where main_dish_type='Chicken'";
                        $result=mysqli_query($connect,$sql);
                      while ($row=mysqli_fetch_array($result)){
                          echo '<form method="post">
                         <tr>
                         <input type="hidden" name="main_dish_id" value="'.$row["main_dish_id"].'">
                         <td>'.$row["main_dish_name"].'</td>
                         <input type="hidden" name="main_dish_name" value="'.$row["main_dish_name"].'">
                         <td><input type="submit" name="edit" value="Edit"></td>
                         <td><input type="submit" name="delete" value="Delete"></td>
                         </tr>
                         </form>';
                        }
                    if(isset($_POST["delete"])){

                      $sql="delete from pax_main_dish where main_dish_name='".$_POST["main_dish_name"]."'";
                       $result=mysqli_query($connect,$sql);
                       echo '<script>alert("delete")
                       window.location.href="main_dish_pork.php"</script>';
                    }
                    if(isset($_POST["edit"])){
                      $id=$_POST["main_dish_id"];
    echo '<script>window.location.href="update_chicken.php?main_dish_id='.$id.'";</script>';
                    }
}
function manage_side_dish($connect){
                       $sql="select * from pax_side_dish";
                        $result=mysqli_query($connect,$sql);
                        while ($row=mysqli_fetch_array($result)) {
                          echo '<form method="post">
                         <tr>
                         <input type="hidden" name="side_dish_id" value="'.$row["side_dish_id"].'">
                         <td>'.$row["side_dish_name"].'</td>
                         <input type="hidden" name="main_dish_name" value="'.$row["side_dish_name"].'">
                         <td><input type="submit" name="edit" value="Edit"></td>
                         <td><input type="submit" name="delete" value="Delete"></td>
                         </tr>
                         </form>';
                        }
                    if(isset($_POST["edit"])){
                      $id=$_POST["side_dish_id"];
    echo '<script>window.location.href="update_side_dish.php?side_dish_id='.$id.'";</script>';
                    }
                    if(isset($_POST["delete"])){
                       $id=$_POST["side_dish_id"];
                       $sql="delete from pax_side_dish where side_dish_id='".$id."'";
                       $result=mysqli_query($connect,$sql);
                       echo '<script>alert("delete")
                       window.location.href="side_dish.php"</script>';
                    }
}

function manage_dessert($connect){
                       $sql="select * from pax_dessert";
                        $result=mysqli_query($connect,$sql);
                        while ($row=mysqli_fetch_array($result)) {
                          echo '<form method="post">
                         <tr>
                         <input type="hidden" name="des_id" value="'.$row["des_id"].'">
                         <td>'.$row["des_name"].'</td>
                         <input type="hidden" name="main_dish_name" value="'.$row["des_name"].'">
                         <td><input type="submit" name="edit" value="Edit"></td>
                         <td><input type="submit" name="delete" value="Delete"></td>
                         </tr>
                         </form>';
                        }
                    if(isset($_POST["edit"])){
                      $id=$_POST["des_id"];
    echo '<script>window.location.href="update_dessert.php?des_id='.$id.'";</script>';
                    }
                    if(isset($_POST["delete"])){
                       $id=$_POST["des_id"];
                       $sql="delete from pax_dessert where des_id='".$id."'";
                       $result=mysqli_query($connect,$sql);
                       echo '<script>alert("delete")
                       window.location.href="dessert.php"</script>';
                    }
}

function manage_drinks($connect){
                       $sql="select * from pax_drinks";
                        $result=mysqli_query($connect,$sql);
                        while ($row=mysqli_fetch_array($result)) {
                          echo '<form method="post">
                         <tr>
                         <input type="hidden" name="dr_id" value="'.$row["dr_id"].'">
                         <td>'.$row["dr_name"].'</td>
                         <input type="hidden" name="main_dish_name" value="'.$row["dr_name"].'">
                         <td><input type="submit" name="edit" value="Edit"></td>
                         <td><input type="submit" name="delete" value="Delete"></td>
                         </tr>
                         </form>';
                        }
                    if(isset($_POST["edit"])){
                      $id=$_POST["dr_id"];
    echo '<script>window.location.href="update_drinks.php?dr_id='.$id.'";</script>';
                    }
                    if(isset($_POST["delete"])){
                       $id=$_POST["dr_id"];
                       $sql="delete from pax_drinks where dr_id='".$id."'";
                       $result=mysqli_query($connect,$sql);
                       echo '<script>alert("delete")
                       window.location.href="drinks.php"</script>';
                    }
}
function manage_soup($connect){
                       $sql="select * from pax_soup";
                        $result=mysqli_query($connect,$sql);
                        while ($row=mysqli_fetch_array($result)) {
                          echo '<form method="post">
                         <tr>
                         <input type="hidden" name="soup_id" value="'.$row["soup_id"].'">
                         <td>'.$row["soup_name"].'</td>
                         <input type="hidden" name="main_dish_name" value="'.$row["soup_name"].'">
                         <td><input type="submit" name="edit" value="Edit"></td>
                         <td><input type="submit" name="delete" value="Delete"></td>
                         </tr>
                         </form>';
                        }
                    if(isset($_POST["edit"])){
                      $id=$_POST["soup_id"];
    echo '<script>window.location.href="update_soup.php?soup_id='.$id.'";</script>';
                    }
                    if(isset($_POST["delete"])){
                       $id=$_POST["des_id"];
                       $sql="delete from pax_soup where soup_id='".$id."'";
                       $result=mysqli_query($connect,$sql);
                       echo '<script>alert("delete")
                       window.location.href="soup.php"</script>';
                    }
}

function ads_event($connect){
                      $sql="select * from ads_event";
                        $result=mysqli_query($connect,$sql);
                         while ($row=mysqli_fetch_array($result)){
                           $dot=".";
                          $pos=stripos($row["event_content"],$dot);
                          $off=$pos+1;
                          $pos1=stripos($row["event_content"],$dot,$off);
                          $cont=substr($row["event_content"],0,$pos1);
                          echo '<form method="post">
                          <tr>
                          <td>'.$row["event_title"].'</td>
                            <td>'.$cont.'.</td>
                          <td><input type="submit" name="edit" value="Edit"></td>
                          <td><input type="submit" name="delete" value="Delete"></td>
                            </tr>
                            </form>';
        }
  }
function display_ads($connect){
                      $sql="select * from ads_event";
                        $result=mysqli_query($connect,$sql);
                         while ($row=mysqli_fetch_array($result)){
                          $dot=".";
                          $pos=stripos($row["event_content"],$dot);
                          $off=$pos+1;
                          $pos1=stripos($row["event_content"],$dot,$off);
                          $cont=substr($row["event_content"],0,$pos1);
                          echo '<div class="col-sm-8">
                  <div class="well jm">
                  <img src="uploads/'.$row["event_img"].'" style="width:20%; height:20%; display:left;">
                    <h3 class="section-title"><a href="#" style="color:black;">'.$row["event_title"].'</a></h3>
                   <p> '. $cont.'.</p>
                    </div>
                </div>';
        }
  }
  function ads_img($connect){
                      $sql="select * from ads_img";
                        $result=mysqli_query($connect,$sql);
                         while ($row=mysqli_fetch_array($result)){
                          echo '<form method="post">
                          <tr>
                          <td>'.$row["img_title"].'</td>
                          <td>'.$row["img_category"].'</td>
                            <td>'.$row["img_url"].'</td>
                          <td><input type="submit" name="edit" value="Edit"></td>
                         <td><input type="submit" name="delete" value="Delete"></td>
                            </tr>
                            </form>';
        }
  }
 function user_account($connect){
                      $sql="select * from user_account";
                        $result=mysqli_query($connect,$sql);
                         while ($row=mysqli_fetch_array($result)){
                          echo '<form method="post">
                          <tr>
                          <td>'.$row["user_full_name"].'</td>
                         <td>'.$row["user_username"].'</td>
                         <td>'.$row["user_contact_no"].'</td>
                         <td>'.$row["user_email"].'</td>
                         <td>'.$row["user_bday"].'</td>
                         <td>'.$row["user_gender"].'</td>
                            </tr>
                            </form>';
        }
  }
  function notifs($connect){
                      $sql="select * from notification where notif_name='Administrator' order by notif_id desc limit 10";
                        $result=mysqli_query($connect,$sql);
                         while ($row=mysqli_fetch_array($result)){
                          echo '<li><a href="'.$row["notif_link"].'">'.$row["notif_content"].'</a></li>';
        }
  }
   function notifcount($connect){
                      $sql="select count(*) from notification where notif_name='Administrator'and notif_remarks=0  order by notif_id desc ";
                        $result=mysqli_query($connect,$sql);
                         while ($row=mysqli_fetch_array($result)){
                          echo '<span class="label label-danger" id="count">'.$row[0].'</span></h6>';
        }
  }
  function reports($connect){
                      $sql="select * from archive_reservation";
                        $result=mysqli_query($connect,$sql);
                        while ($row=mysqli_fetch_array($result)){
                        echo '<form action="approve.php" method="post">
                        <tr>
                              <td>'.$row["res_full_name"].'</td>
                              <input type="hidden" name="name" value="'.$row["res_full_name"].'">
                              <td>'.$row["res_date"].'</td>
                              <input type="hidden" name="reserve_date" value="'.$row["res_date"].'">
                              <td>'.$row["res_time"].'</td>
                              <input type="hidden" name="reserve_time" value="'.$row["res_time"].'">
                              <td>'.$row["res_venue"].'</td>
                              <input type="hidden" name="reserve_venue" value="'.$row["res_venue"].'">
                              <td>'.$row["res_occasion"].'</td>
                              <input type="hidden" name="reserve_occasion" value="'.$row["res_occasion"].'">
                              <td>'.$row["res_no_of_reservation"].'</td>
                              <input type="hidden" name="reserve_guest" value="'.$row["res_no_of_reservation"].'">
                              <td>'.$row["res_price"].'</td>
                              <input type="hidden" name="reserve_price" value="'.$row["res_price"].'">
                              </tr>
                              </form>';
                              
                        }
}

function display_img($connect){
                      $sql="select * from ads_img";
                        $result=mysqli_query($connect,$sql);
                         while ($row=mysqli_fetch_array($result)){
                          echo '<div class="col-md-3">
                  <center><a href="uploads/'.$row["img_url"].'" data-lightbox="gallery"><img src="uploads/'.$row["img_url"].'" style="width:109%; margin-bottom:20px;"></a></center>
                    </div>';
        }
  }
function menu_side_dish($connect){
                           echo '<label class="menu-label">Side Dish:</label>
                           <h6>(Choose One)</h6>
                              <ul>';
                        $sql="select * from pax_side_dish";
                        $result=mysqli_query($connect,$sql);
                         while ($row=mysqli_fetch_array($result)){
                        echo '<li>'.$row["side_dish_name"].'</li>';
                      }
                      echo '</ul>';
}
function menu_soup($connect){
                          
                           echo '<label class="menu-label">Soup:</label>
                           <h6>Just add P25.00 per pax.</h6>
                           <h6>(Choose One)</h6>
                              <ul>';
                        $sql="select * from pax_soup";
                        $result=mysqli_query($connect,$sql);
                         while ($row=mysqli_fetch_array($result)){
                        echo '<li>'.$row["soup_name"].'</li>';
                      }
                      echo '</ul>';
}
function menu_dessert($connect){
                          echo '<label class="menu-label">Dessert:<h6>(Choose One)</h6></label>
                              <ul>';
                        $sql="select * from pax_dessert";
                        $result=mysqli_query($connect,$sql);
                         while ($row=mysqli_fetch_array($result)){
                        echo '<li>'.$row["des_name"].'</li>';
                      }
                      echo '</ul>';
}
function menu_drinks($connect){
                          echo '<label class="menu-label">Juice:</label>
                              <ul>';
                        $sql="select * from pax_drinks";
                        $result=mysqli_query($connect,$sql);
                         while ($row=mysqli_fetch_array($result)){
                        echo '<li>'.$row["dr_name"].'</li>';
                      }
                      echo '</ul>';
}
function menu_main($connect){
                          echo '<label class="menu-label">Main Dish:</label>
                                <h6>(Choose Three)</h6>
                                <label>Pork:</label>
                              <ul>';
                        $sql='select * from pax_main_dish where main_dish_type="Pork"';
                        $result=mysqli_query($connect,$sql);
                         while ($row=mysqli_fetch_array($result)){
                        echo '<li>'.$row["main_dish_name"].'</li>';
                      }
                      echo '</ul> <label>Beef:</label>
                              <ul>';
                        $sql='select * from pax_main_dish where main_dish_type="Beef"';
                        $result=mysqli_query($connect,$sql);
                         while ($row=mysqli_fetch_array($result)){
                        echo '<li>'.$row["main_dish_name"].'</li>';
                      }
                      echo '</ul><label>Chicken:</label>
                              <ul>';
                        $sql='select * from pax_main_dish where main_dish_type="Chicken"';
                        $result=mysqli_query($connect,$sql);
                         while ($row=mysqli_fetch_array($result)){
                        echo '<li>'.$row["main_dish_name"].'</li>';
                      }
                      echo '</ul><label>Seafoods:</label>
                              <ul>';
                        $sql='select * from pax_main_dish where main_dish_type="Seafoods"';
                        $result=mysqli_query($connect,$sql);
                         while ($row=mysqli_fetch_array($result)){
                        echo '<li>'.$row["main_dish_name"].'</li>';
                      }
                      echo '</ul>';


}
function menu_addons($connect){
                          echo '
                              <label class="menu-label">Addons:</label><ul>';
                        $sql="select * from pax_add_ons";
                        $result=mysqli_query($connect,$sql);
                         while ($row=mysqli_fetch_array($result)){
                        echo '<li>'.$row["addons_name"].'</li>';
                      }
                      echo '</ul>';
}

function pax_menus($connect){
                        $sql="select * from reservation where res_remarks='Approved'";
                        $result=mysqli_query($connect,$sql);
                         while ($row=mysqli_fetch_array($result)){
                         echo '<form action="view_menu.php" method="post">
                        <tr>
                              <td>'.$row["res_full_name"].'</td>
                              <input type="hidden" name="name" value="'.$row["res_full_name"].'">
                              <td>'.$row["res_date"].'</td>
                              <input type="hidden" name="reserve_date" value="'.$row["res_date"].'">
                              <td>'.$row["res_time"].'</td>
                              <input type="hidden" name="reserve_time" value="'.$row["res_time"].'">
                              <td>'.$row["res_venue"].'</td>
                              <input type="hidden" name="reserve_venue" value="'.$row["res_venue"].'">
                              <td>'.$row["res_occasion"].'</td>
                              <input type="hidden" name="reserve_occasion" value="'.$row["res_occasion"].'">
                              <td>'.$row["res_no_of_reservation"].'</td>
                              <td>'.$row["res_package"].'</td>
                              <input type="hidden" name="reserve_guest" value="'.$row["res_no_of_reservation"].'">
                              <td><input type="submit" name="view_menu" value="VIEW MENU" class="btn btn-sm btn-default"></td>
                              </tr>
                              </form>';
                              
                      }
                      echo '</ul>';
}
?>