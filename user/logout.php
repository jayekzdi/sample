<?php
session_start();
unset($_SESSION["dispname"]);
header("location:../index.php");
?>