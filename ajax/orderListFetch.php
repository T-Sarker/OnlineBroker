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
		
		$getOrderList = $aoc->getAllOrderListFromDB($id,$cid);

		if (isset($getOrderList) && $getOrderList != false) {
			
			while ($list = $getOrderList->fetch_assoc()) {
				
	?>
				<tr style="padding:10px 10px;margin-left:10px;">
	              <td class="py-1" style="padding:25px 0px;">
	                <img src="https://lh3.googleusercontent.com/T0s4x_LSr9Og0_ZDrp1Myqw6yd2URgSeZXA5wxZCIIqJHQ4jxz0hilOhNugDWKckhVg" alt="image">
	              </td>
	              <td style="padding:25px 0px;margin-left:10px;border-right:1px solid #e7e7e7;text-align:center"><?php echo $list['userName'] ?></td>
	              <td style="padding:25px 0px;margin-left:10px;border-right:1px solid #e7e7e7;text-align:center"><?php echo $list['orderNumber'] ?></td>
	              <td style="padding:25px 0px;margin-left:10px;border-right:1px solid #e7e7e7;text-align:center"><?php echo $list['totalAmount'].' ৳' ?></td>
	              <td style="padding:25px 0px;margin-left:10px;border-right:1px solid #e7e7e7;text-align:center">
	                <?php
	                	$buid = $list['branchUid'];
	                	$getBranch = $aoc->getBranchName($buid);

	                	if (isset($getBranch) && $getBranch != false) {
	                		
	                		while ($branch = $getBranch->fetch_assoc()) {
	                			
	                			echo "".$branch['branchName'];
	                		}
	                	}
	                ?>
	              </td>
	              <td style="padding:25px 0px;margin-left:10px;border-right:1px solid #e7e7e7;text-align:center"> <?php echo Session::get('companyName'); ?> </td>
	              <td style="padding:25px 0px;margin-left:10px;border-right:1px solid #e7e7e7;text-align:center"><?php echo $list['orderDate']; ?></td>
	              
	              <td width="10%">
	              	<a href="" class="btn btn-success p-2" id="<?php echo $list['orderId']; ?>" onclick="confirmTicket(this.id)">Confirm</a>
	              	<!-- <a href="" class="btn btn-danger p-2" id="alala">Cancel</a> -->
	              </td>
	            </tr>
	<?php
			}
		}

	}
?>