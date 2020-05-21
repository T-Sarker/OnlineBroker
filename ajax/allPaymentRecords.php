<?php

	include '../config/config.php';
	include "../lib/database.php";
	include "../helpers/formats.php";
	include '../classes/admind3Class.php';
?>

<?php
	$ad3 = new AdminD3Class();
?>

<?php
	
	if ($_SERVER['REQUEST_METHOD']=='POST' && $_POST['bid'] !=null) {
		
		$bid = $_POST['bid'];
		echo "<script>console.log(".$bid.")</script>";

		$updateBooking = $ad3->getUpdateBookingDataFromDB($bid);

		echo $updateBooking;

	}
?>