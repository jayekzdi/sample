<?php
session_start();
require ("../db.php");
if(isset($_POST["reserve"])){
	$res_full_name=$_SESSION["dispname"];
	$res_month=$_POST["res_month"];
	$res_day=mysqli_real_escape_string($connect,$_POST["res_day"]);
	$res_year=$_POST["res_year"];
	$res_reserve_time=$_POST["res_reserve_time"];
	$res_time_period=$_POST["res_time_period"];
	$res_occasion=$_POST["res_occasion"];
	$res_no_of_reservation=$_POST["res_no_of_reservation"];
	$current_month=date("m");
	$current_day=date("d");
	$current_year=date("Y");
	if(($res_month>=$current_month)){
		echo "true";
		}
	else{
		echo '<script>alert("false")</script>';
		$_SESSION["res_month"]=$res_month;

	}
	}
?>