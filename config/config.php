<?php
ob_start(); //saves data when php is loaded
session_start(); //store values

$timezone = date_default_timezone_set("Asia/Kathmandu");
$con = mysqli_connect("localhost","root","","social");


if (mysqli_connect_errno()) {
	echo "Failed to conect" . mysqli_connect_errno();
}
?>