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
	
	if ($_SERVER['REQUEST_METHOD']=='POST' && $_POST['id'] !=null) {
		
		$id = $_POST['id'];

		$getBooking = $ad3->getThisBookingDataFromDB($id);

		if (isset($getBooking) && $getBooking != null) {
			
			while ($book = $getBooking->fetch_assoc()) {
?>
				<h4><span class="mr-3 p-3"><i class="fa fa-bullhorn" aria-hidden="true"></i> </span><?php echo $book['packageName'] ?></h4>
				<div class="container">
					<p><b>Package Id: </b><?php echo $book['packageUid'] ?></p>
					<p><b>Requested By:</b> <?php echo $book['userName'] ?></p>
					<p><b>Contact No:</b> <?php echo $book['userPhone'] ?></p>
					<p><b>Total Amount:</b> <span class="text-primary" style="font-size:20px;"> <?php echo $book['totalAmount'].' ৳' ?></span></p>
					<p><b>Requirements:</b><br><?php echo $book['details'] ?></p>
					<p><b>Request Time:</b><br><?php echo $book['orderDateTime'] ?></p>
					<p><b>Request Id:</b><br><?php echo $book['bookingUid'] ?></p>
				</div>

<?php
			}
		}
	}

	


?>