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
		
    if ($_SERVER['REQUEST_METHOD']=='POST' && !empty($_POST['cid'])) {
          
          $cid = $_POST['cid'];

          $getUpdated = $bc->updateConfirmationToMakeProofOnVandorPayment($cid);

          if (isset($getUpdated) && $getUpdated!=false) {
              
              echo true;
          }else{
            echo false;
          }
    }
	


?>