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

	$id = Session::get('branchUid');
	$cid = Session::get('companyUid');

	$token = $_POST['searchKey'];

	if (isset($id) && isset($cid) && $_SERVER['REQUEST_METHOD']=='POST' && $token != null) {

		$getSuggestion = $aoc->getTokenSuggestionFromDBForD3Branch($id,$cid,$token);

		if (isset($getSuggestion) && $getSuggestion != false) {
			$x=1;
			while ($token = $getSuggestion->fetch_assoc()) {
?>
				<tr>
                  <td><?php echo $x++; ?></td>
                  <td><?php echo $token['userName'] ?></td>
                  <td><?php echo $token['bookingUid'] ?></td>
                  <td><?php echo $token['totalAmount']." ৳" ?></td>
                  <td><?php echo $token['orderDateTime'] ?></td>
                  <td><?php echo $token['bookVendorStatus']==1 && $token['bookUserStatus']==1? 'Confirmed':'Nothing'; ?></td>
                </tr>

<?php
			}
		}

	}
?>


