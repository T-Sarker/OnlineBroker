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
	
	if ($_SERVER['REQUEST_METHOD']=='POST' && $_POST['cid'] !=null) {
		
		$cid = $_POST['cid'];

		$allRecord = $ad3->getPaymentRecordsDataFromDB($cid);

		if (isset($allRecord) && $allRecord != false) {
			
			$records = mysqli_fetch_assoc($allRecord);
		
			$holdData = array();
		?>
			<table class="table">
				  <thead>
				    <tr>
				      <th scope="col">Amount</th>
				      <th scope="col">Month</th>
				      <th scope="col">Transection No</th>
				      <th scope="col">Date</th>
				      <th scope="col">Paid By</th>
				    </tr>
				  </thead>
				  <tbody>
				    
				  

		<?php
			$monthList = array( 'January', 'February', 'March', 'April', 'May', 'June', 'July ', 'August', 'September', 'October', 'November', 'December', );
			for ($i=0; $i < 12; $i++) { 

				$month = explode('-',$records['payDate']);

				$month[1];

				if ($month[1] == $i) {
					echo '<tr>
				      <td>'.$records["paidAmount"]." ৳".'</td>
				      <td>'.$monthList[$i].'</td>
				      <td>'.$records["transactionNo"].'</td>
				      <td>'.$records["payDate"].'</td>
				      <td>'.$records["payerName"].'</td>
				    </tr>';

				}else{
					echo '<tr>
				      <td>'."0 ৳".'</td>
				      <td>'.$monthList[$i].'</td>
				      <td>'."Nothing".'</td>
				      <td>'."No Payment".'</td>
				      <td>'."None".'</td>
				    </tr>';
				}
			}

			?>
			</tbody>
				</table>
			<?php
		}

	}
?>