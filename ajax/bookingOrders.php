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
		$getBookingOrders = $bc->getAllBookingOrdersForajaxFromDB($companyUid);

		if (isset($getBookingOrders) && $getBookingOrders != false) {
			
			while ($booking = $getBookingOrders->fetch_assoc()) {
?>
			
			<tr>
                      <td style="padding:30px 0px;"><?php echo $booking['bookingUid']; ?></td>
                      <td style="padding:30px 0px;"><?php echo $booking['packageName']; ?></td>
                      <td style="padding:30px 0px;"><?php echo $booking['totalAmount'].' ৳'; ?></td>
                      <td style="padding:30px 0px;"><?php echo $booking['userName']; ?></td>
                      <td style="padding:30px 0px;"><?php echo $booking['paidAmount'].' ৳'; ?></td>
                      <td style="padding:30px 0px;" width='300' class="d-inline-block text-truncate"><?php echo $booking['details']; ?></td>
                      <td style="padding:30px 0px;"><?php echo $booking['orderDateTime']; ?></td>
                      <td style="padding:30px 0px;"><?php 
                        if ($booking['status']==0) {
                            
                            echo '<span class="badge badge-pill badge-success">accepted</span>';
                        }elseif ($booking['status']==2) {
                            
                            echo '<span class="badge badge-pill badge-danger">canceled</span>';
                        }else{
                        	echo '<span class="badge badge-pill badge-primary">Dissmissed</span>';
                        }

                      ?></td>
                    </tr>

<?php
			}
		}
	


?>