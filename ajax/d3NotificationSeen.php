<?php   
    include "../lib/session.php";
    Session::checkLogin();
?>
<?php

	include '../config/config.php';
	include "../lib/database.php";
	include "../helpers/formats.php";
	include '../classes/bookingClass.php';
?>

<?php
	$bc = new BookingClass();
?>

<?php
		$companyUid = Session::get('companyUid');
		$getBookingOrders = $bc->getAllBookingOrdersFromDB2seen($companyUid);
    
?>