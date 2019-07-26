<?php
include '../db.php';
$get=$_POST['res_venue'];
$sql="select * from event_center where ec_name='".$get."'";
                          $result=mysqli_query($connect,$sql);
                          $row=mysqli_fetch_array($result);
    $res_venue=$row["ec_price"];
    echo $res_venue;
 ?>