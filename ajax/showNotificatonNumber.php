<?php   
    include "../lib/session.php";
    Session::checkLogin();
?>
<?php

	include '../config/config.php';
	include "../lib/database.php";
	include "../helpers/formats.php";
	include '../classes/orderClass.php';
?>

<?php
	$aoc = new AllOrderClass();
?>

<?php

	$id = Session::get('branchUid');;
	$cid = Session::get('companyUid');;

	if (isset($id) && isset($cid)) {

		$getNotification = $aoc->getNotificationNumberFromDB($id,$cid);

		if (isset($getNotification)) {
			
			echo $getNotification;
		}

		
	}
?>


