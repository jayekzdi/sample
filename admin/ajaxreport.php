<?php 
$sql="select * from archive_reservation";
                          $result=mysqli_query($connect,$sql);
                          while($row=mysqli_fetch_array($result)){
                          	$report='<form action="approve.php" method="post">
                        	<tr id="results">
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
                              echo $report;
                          }
    
 ?>