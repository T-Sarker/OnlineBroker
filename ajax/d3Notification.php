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
    $getBookingOrders = $bc->getAllBookingOrdersFromDB2($companyUid);
		$getBookingOrders3 = $bc->getAllBookingOrdersFromDB3($companyUid);
    $output ="";
    $count = 0;
		if (isset($getBookingOrders) && $getBookingOrders != false) {
			
			while ($booking = $getBookingOrders->fetch_assoc()) {
        
			
			$output .= '<li>
          <a href="bookingOrders.php">
              <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="fa fa-gift"></i></span>
              <div class="notification-content">'.$booking["userName"].
              '<p class="notification-text">'.$booking["orderDateTime"].'</p> 
              </div>
          </a>
      </li>';


			}

      
		}else{
      $output .="Nothing";
    }

    if (isset($getBookingOrders3) && $getBookingOrders3 != false) {
        
        if (mysqli_num_rows($getBookingOrders3) >0) {
            
            $count = mysqli_num_rows($getBookingOrders3);
        }else{
          $count = 0;
        }
    }

    $data = array(
       'notification' => $output,
       'unseen_notification'  => $count
    );

    echo json_encode($data);
	


?>