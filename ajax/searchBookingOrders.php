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

	$searchValue = $_POST['searchKey'];

	if (isset($searchValue) && $searchValue != null && !is_numeric($searchValue)) {
		$companyUid = Session::get('companyUid');
		$getSearchedValue = $bc->getSearchedValueFromDB($companyUid,$searchValue);

		if (isset($getSearchedValue) && $getSearchedValue != false) {
			
			while ($booking = $getSearchedValue->fetch_assoc()) {
?>
			
			<tr>
                      <td style="padding:30px 0px;"><?php echo $booking['bookingUid']; ?></td>
                      <td style="padding:30px 0px;"><?php echo $booking['packageName']; ?></td>
                      <td style="padding:30px 0px;"><?php echo $booking['totalAmount'].' ৳'; ?></td>
                      <td style="padding:30px 0px;"><?php echo $booking['userName']; ?></td>
                      <td style="padding:30px 0px;"><?php echo $booking['paidAmount'].' ৳'; ?></td>
                      <td style="padding:30px 0px;" width='300' class="d-inline-block text-truncate"><?php echo $booking['details']; ?></td>
                      <td style="padding:30px 0px;"><?php echo $booking['orderDateTime']; ?></td>
                      <td style="padding:30px 0px;"><?php echo $booking['status']==1? '<span class="badge badge-pill badge-success">accepted</span>':'<span class="badge badge-pill badge-danger">canceled</span>' ?></td>
                    </tr>

<?php
			}
		}
	}


?>