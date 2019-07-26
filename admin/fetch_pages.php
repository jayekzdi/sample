<?php
include '../db.php';
//sanitize post value
if(isset($_POST["page"])){
	$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
	if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
	$page_number = 1;
}

//get current starting point of records
$position = (($page_number-1) * $item_per_page);

//Limit our results within a specified range. 
$results = mysqli_query($connect, "SELECT * FROM archive_reservation ORDER BY res_id desc LIMIT $position, $item_per_page");

//output results from database
echo '<ul class="page_result">';
while($row = mysqli_fetch_array($results))
{
	echo '<li id="item_'.$row["res_id"].'">'.$row["res_id"].'. <span class="page_name">'.$row["res_full_name"].'</span><span class="page_message"></span></li>';
}
echo '</ul>';
?>

