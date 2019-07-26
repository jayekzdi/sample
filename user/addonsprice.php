<?php
include '../db.php';
$get=$_POST['pax_add_ons'];
$sql="select * from pax_add_ons where addons_name='".$get."'";
                          $result=mysqli_query($connect,$sql);
                          $row=mysqli_fetch_array($result);
    $pax_add_ons=$row["addons_price"];
    echo $pax_add_ons;
 ?>