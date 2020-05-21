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
	
	if ($_SERVER['REQUEST_METHOD']=='POST' && $_POST['checkValue'] !=null) {
		
		$checkValue = $_POST['checkValue'];

		switch ($checkValue) {
			case 0:
				$getResult = $ad3->getFilterValueOfAllBookingRequestUnpaid($checkValue);
				if (isset($getResult) && $getResult != false) {
					$x=1;
					while ($req = $getResult->fetch_assoc()) {
				?>
						<tr>
                          <th scope="row"><?php echo !empty($req['packageName']) ? $x++:''; ?></th>
                          <td width="200"><?php echo $req['packageName']; ?></td>
                          <td><?php echo $req['userName']; ?></td>
                          <td width="100"><?php echo $req['orderDateTime']; ?></td>
                          
                          <td><?php
                                    $cid = $req['companyUid'];
                                    $getCompany = $ad3->getThisCompanyName($cid);
                                    $company = mysqli_fetch_assoc($getCompany);

                                    echo $company['company'];
                           ?></td>
                          <td><?php
                                    $bid = $req['branchUid'];
                                    $getBranch = $ad3->getThisBranchName($bid);
                                    $branch = mysqli_fetch_assoc($getBranch);

                                    echo $branch['branchName'];
                           ?></td>
                           <td>
                               <?php 

                                    if ($req['status']==0 && $req['bookVendorStatus']==1 && $req['bookUserStatus']==1) {
                                        
                                        echo "<span class='badge badge-pill badge-success'>Accepted But Vendor Unpaid</span>";

                                    }elseif ($req['status']==2 && $req['bookVendorStatus']==2 && $req['bookUserStatus']==2) {
                                        
                                        echo "<span class='badge badge-pill badge-danger'>Booking Canceled</span>";

                                    }elseif ($req['status']==3 && $req['bookVendorStatus']==1 && $req['bookUserStatus']==1) {
                                        
                                        echo "<span class='badge badge-pill badge-info'>Accepted And Vendor Paid</span>";
                                    }

                               ?>
                           </td>
                          <td>
                          <button type="button" id="<?php echo $req['bookId'] ?>" class="btn btn-primary alert_button2" data-toggle="modal" data-target="#exampleModal">Check Booking Details</button>
                        
                                                  
                          </td>
                        </tr>
				<?php
					}
				}else{
					echo "<span class='alert alert-warning'>Nothing To Show </spn>";
				}
				break;
			case 2:
				$getResult = $ad3->getFilterValueOfAllBookingRequestCancled($checkValue);
				if (isset($getResult) && $getResult != false) {
					$x=1;
					while ($req = $getResult->fetch_assoc()) {
				?>
						<tr>
                          <th scope="row"><?php echo !empty($req['packageName']) ? $x++:''; ?></th>
                          <td width="200"><?php echo $req['packageName']; ?></td>
                          <td><?php echo $req['userName']; ?></td>
                          <td width="100"><?php echo $req['orderDateTime']; ?></td>
                          
                          <td><?php
                                    $cid = $req['companyUid'];
                                    $getCompany = $ad3->getThisCompanyName($cid);
                                    $company = mysqli_fetch_assoc($getCompany);

                                    echo $company['company'];
                           ?></td>
                          <td><?php
                                    $bid = $req['branchUid'];
                                    $getBranch = $ad3->getThisBranchName($bid);
                                    $branch = mysqli_fetch_assoc($getBranch);

                                    echo $branch['branchName'];
                           ?></td>
                           <td>
                               <?php 

                                    if ($req['status']==0 && $req['bookVendorStatus']==1 && $req['bookUserStatus']==1) {
                                        
                                        echo "<span class='badge badge-pill badge-success'>Accepted But Vendor Unpaid</span>";

                                    }elseif ($req['status']==2 && $req['bookVendorStatus']==2 && $req['bookUserStatus']==2) {
                                        
                                        echo "<span class='badge badge-pill badge-danger'>Booking Canceled</span>";

                                    }elseif ($req['status']==3 && $req['bookVendorStatus']==1 && $req['bookUserStatus']==1) {
                                        
                                        echo "<span class='badge badge-pill badge-info'>Accepted And Vendor Paid</span>";
                                    }

                               ?>
                           </td>
                          <td>
                          <button type="button" id="<?php echo $req['bookId'] ?>" class="btn btn-primary alert_button2" data-toggle="modal" data-target="#exampleModal">Check Booking Details</button>
                        
                                                  
                          </td>
                        </tr>
				<?php
					}
				}else{
					echo "<span class='alert alert-warning'>Nothing To Show<br> </spn>";
				}
				break;
			case 3:
				$getResult = $ad3->getFilterValueOfAllBookingRequestPaid($checkValue);
				if (isset($getResult) && $getResult != false) {
					$x=1;
					while ($req = $getResult->fetch_assoc()) {
				?>
						<tr>
                          <th scope="row"><?php echo !empty($req['packageName']) ? $x++:''; ?></th>
                          <td width="200"><?php echo $req['packageName']; ?></td>
                          <td><?php echo $req['userName']; ?></td>
                          <td width="100"><?php echo $req['orderDateTime']; ?></td>
                          
                          <td><?php
                                    $cid = $req['companyUid'];
                                    $getCompany = $ad3->getThisCompanyName($cid);
                                    $company = mysqli_fetch_assoc($getCompany);

                                    echo $company['company'];
                           ?></td>
                          <td><?php
                                    $bid = $req['branchUid'];
                                    $getBranch = $ad3->getThisBranchName($bid);
                                    $branch = mysqli_fetch_assoc($getBranch);

                                    echo $branch['branchName'];
                           ?></td>
                           <td>
                               <?php 

                                    if ($req['status']==0 && $req['bookVendorStatus']==1 && $req['bookUserStatus']==1) {
                                        
                                        echo "<span class='badge badge-pill badge-success'>Accepted But Vendor Unpaid</span>";

                                    }elseif ($req['status']==2 && $req['bookVendorStatus']==2 && $req['bookUserStatus']==2) {
                                        
                                        echo "<span class='badge badge-pill badge-danger'>Booking Canceled</span>";

                                    }elseif ($req['status']==3 && $req['bookVendorStatus']==1 && $req['bookUserStatus']==1) {
                                        
                                        echo "<span class='badge badge-pill badge-info'>Accepted And Vendor Paid</span>";
                                    }

                               ?>
                           </td>
                          <td>
                          <button type="button" id="<?php echo $req['bookId'] ?>" class="btn btn-primary alert_button2" data-toggle="modal" data-target="#exampleModal">Check Booking Details</button>
                        
                                                  
                          </td>
                        </tr>
				<?php
					}
				}else{
					echo "<span class='alert alert-warning'>Nothing To Show </spn>";
				}
				break;
			
			default:
				$getResult = $ad3->getFilterValueOfAllBookingRequestOnSearch($checkValue);
				if (isset($getResult) && $getResult != false) {
					$x=1;
					while ($req = $getResult->fetch_assoc()) {
				?>
						<tr>
                          <th scope="row"><?php echo !empty($req['packageName']) ? $x++:''; ?></th>
                          <td width="200"><?php echo $req['packageName']; ?></td>
                          <td><?php echo $req['userName']; ?></td>
                          <td width="100"><?php echo $req['orderDateTime']; ?></td>
                          
                          <td><?php
                                    $cid = $req['companyUid'];
                                    $getCompany = $ad3->getThisCompanyName($cid);
                                    $company = mysqli_fetch_assoc($getCompany);

                                    echo $company['company'];
                           ?></td>
                          <td><?php
                                    $bid = $req['branchUid'];
                                    $getBranch = $ad3->getThisBranchName($bid);
                                    $branch = mysqli_fetch_assoc($getBranch);

                                    echo $branch['branchName'];
                           ?></td>
                           <td>
                               <?php 

                                    if ($req['status']==0 && $req['bookVendorStatus']==1 && $req['bookUserStatus']==1) {
                                        
                                        echo "<span class='badge badge-pill badge-success'>Accepted But Vendor Unpaid</span>";

                                    }elseif ($req['status']==2 && $req['bookVendorStatus']==2 && $req['bookUserStatus']==2) {
                                        
                                        echo "<span class='badge badge-pill badge-danger'>Booking Canceled</span>";

                                    }elseif ($req['status']==3 && $req['bookVendorStatus']==1 && $req['bookUserStatus']==1) {
                                        
                                        echo "<span class='badge badge-pill badge-info'>Accepted And Vendor Paid</span>";
                                    }else{
                                    	echo "<span class='badge badge-pill badge-dark'>Data Is Not Right</span>";
                                    }

                               ?>
                           </td>
                          <td>
                          <button type="button" id="<?php echo $req['bookId'] ?>" class="btn btn-primary alert_button2" data-toggle="modal" data-target="#exampleModal">Check Booking Details</button>
                        
                                                  
                          </td>
                        </tr>
				<?php
					}
				}else{
					echo "<span class='alert alert-warning'>Nothing To Show </spn>";
				}
				break;
		}

	}
?>