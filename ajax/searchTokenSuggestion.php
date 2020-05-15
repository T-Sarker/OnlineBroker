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

		$getSuggestion = $aoc->getTokenSuggestionFromDB($id,$cid,$token);

		if (isset($getSuggestion) && $getSuggestion != false) {
			
			while ($token = $getSuggestion->fetch_assoc()) {
?>
				<tr>
                  <td><?php echo $token['orderNumber'] ?></td>
                  <td><?php echo $token['userName'] ?></td>
                  <td><?php echo $token['totalAmount']." ৳" ?></td>
                  <td><?php echo $token['orderDate'] ?></td>
                  <td><?php 
                      if ($token['orderMethod']==1) {
                        echo "Hand Cash";
                      }elseif ($token['orderMethod']==2) {
                        echo "Online Payment";
                      }else{
                        echo "Unverified";
                      }
                   ?></td>
                  <td><?php echo 'By: '.$token['authorizer'] ?></td>
                </tr>

<?php
			}
		}

	}
?>


