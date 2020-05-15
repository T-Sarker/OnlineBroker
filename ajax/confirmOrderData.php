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
	$id = $_POST['id'];

	$bid = Session::get('branchUid');
	$cid = Session::get('companyUid');
	$Uname = Session::get('userName');

	$getUpdate = $aoc->updateOrderStatusToConfirm($id,$bid,$cid,$Uname);

	if ($getUpdate != false && isset($getUpdate)) {
		
		echo "<script>window.location.href = 'orderList.php';</script>";

	}else{
		echo "<span class='alert alert-danger'>Something Went Wrong!! Failed</span>";
	}

?>