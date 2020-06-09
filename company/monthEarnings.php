<?php
    include "inc/header.php";
?>


        <!--**********************************
            Sidebar start
        ***********************************-->
<?php
    include "inc/sidebar.php";
?>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <h3>All Booked Order Details</h3>

                <table class="table table-hover">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Booking No</th>
                      <th scope="col">Package</th>
                      <th scope="col">Total</th>
                      <th scope="col">Booked By</th>
                      <th scope="col">Paid</th>
                      <th scope="col">Detail</th>
                      <th scope="col">Date</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                        $companyUid = Session::get('companyUid');
                        $getBookingOrder = $bc->getAllBookingOrdersFromDB($companyUid);

                        if (isset($getBookingOrder) && $getBookingOrder != false) {

                        	$total =0;
                        	$paidTotal =0;
                            
                            while ($booking = $getBookingOrder->fetch_assoc()) {
                                
                  ?>
                    <tr>
                      <td style="padding:30px 0px;"><?php echo $booking['bookingUid']; ?></td>
                      <td style="padding:30px 0px;"><?php echo $booking['packageName']; ?></td>
                      <td style="padding:30px 0px;"><?php echo $booking['totalAmount'].' ৳'; ?></td>
                      <td style="padding:30px 0px;"><?php echo $booking['userName']; ?></td>
                      <td style="padding:30px 0px;"><?php echo $booking['paidAmount']!=null? $booking['paidAmount'].' ৳':"0".' ৳'; ?></td>
                      <td style="padding:30px 0px;" width='300' class="d-inline-block text-truncate"><?php echo $booking['details']; ?></td>
                      <td style="padding:30px 0px;"><?php echo $booking['orderDateTime']; ?></td>
                      <td style="padding:30px 0px;"><?php 
                      	if ($booking['status']==0) {
                      		
                      		echo '<span class="badge badge-pill badge-success">accepted</span>';
                      	}elseif ($booking['status']==1) {
                      		
                      		echo '<span class="badge badge-pill badge-info">Paid</span>';

                      	}elseif ($booking['status']==2){

                          echo '<span class="badge badge-pill badge-danger">canceled</span>';
                        }

                      ?></td>
                    </tr>
                    <?php
                    			
                    			if ($booking['status']!=3 && $booking['status']!=2) {
                      		
		                      		$total += $booking['totalAmount'];
                              $paidTotal += $booking['paidAmount'];

		                      	}
                    			// $paidTotal += $booking['paidAmount'];
                            }
                    ?>
                        <tr style="border-top: 2px solid #000;">
					      <td colspan="6" class=" text-right" style="border-right: 1px solid #cecece;"><h5>Total</h5></td>
					      <td colspan="2">
					      		<p>Earned: <b class="float-right"><?php echo $total.' ৳'; ?></b></p> <hr>


                    <p>EASHO Recieved Payment: <b class="float-right"><?php echo $paidTotal.' ৳'; ?></b></p>
					      		<p>Esho Charge <?php echo "( ".$fee."% ) "; ?>: <b class="float-right"><?php echo $total*($fee/100).' ৳'; ?></b></p>
					      		<hr>
					      		<p>EASHO Will Pay: <b class="float-right"><?php echo ($paidTotal-($total*($fee/100))).' ৳'; ?></b></p>
					      </td>
					    </tr>
					<?php
                        }else{

                            echo "<span class='alert alert-warning mt-3 mb-3'>No Booking Found!</span>";
                        }
                    ?>
                  </tbody>
                </table>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->
<?php
    include "inc/footer.php";
?>