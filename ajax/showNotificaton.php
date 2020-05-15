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

		$getNotification = $aoc->getNotificationFromDB($id,$cid);

		if (isset($getNotification) && $getNotification != false) {
			$x=1;
			while ($notify = $getNotification->fetch_assoc()) {
?>
				<a href="orderList.php" class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-success">
                                        <i class="fa fa-trophy"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="preview-subject font-weight-normal mb-1"><?php echo $notify['userName'] ?></h6>
                                    <p class="ellipsis mb-0" style="opacity:0.6"> <?php echo $notify['orderDate'] ?> </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>

<?php
			}
		}

	}
?>


