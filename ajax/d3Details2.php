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

		$getBooking = $ad3->getThisBookingDataFromDBForAdmin($id);

		if (isset($getBooking) && $getBooking != null) {
			
			while ($book = $getBooking->fetch_assoc()) {
?>
				<h4><span class="mr-3 p-3"><i class="fa fa-bullhorn" aria-hidden="true"></i> </span><?php echo $book['packageName'] ?></h4>
				<div class="container">
					<p><b>Package Id: </b><?php echo $book['packageUid'] ?></p>
					<p><b>Requested By:</b> <?php echo $book['userName'] ?></p>
					<p><b>Contact No:</b> <?php echo $book['userPhone'] ?></p>
					<p><b>Total Amount:</b> <span class="text-primary" style="font-size:20px;"> <?php echo $book['totalAmount']." ৳" ?></span></p>
					<p><b>Total Amount:</b> <span class="text-primary" style="font-size:20px;"> <?php echo $book['paidAmount'] !=null? $book['paidAmount'].' ৳': '0'.' ৳'; ?></span></p>
					<p><b>Requirements:</b><br><?php echo $book['details'] ?></p>
					<p><b>Request Time:</b><br><?php echo $book['orderDateTime'] ?></p>
					<p><b>Request Id:</b><br><?php echo $book['bookingUid'] ?></p>
					<p>
						<?php 

                                    if ($book['status']==0 && $book['bookVendorStatus']==1 && $book['bookUserStatus']==1) {
                                        
                                        echo "<span class='badge badge-pill badge-success'>Accepted But Vendor Unpaid</span>";

                                    }elseif ($book['status']==2 && $book['bookVendorStatus']==2 && $book['bookUserStatus']==2) {
                                        
                                        echo "<span class='badge badge-pill badge-danger'>Booking Canceled</span>";

                                    }elseif ($book['status']==3 && $book['bookVendorStatus']==1 && $book['bookUserStatus']==1) {
                                        
                                        echo "<span class='badge badge-pill badge-info'>Accepted And Vendor Paid</span>";
                                    }

                               ?>
					</p>
				</div>

<?php
			}
		}
	}

	


?>