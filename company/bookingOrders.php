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
                            
                            echo '<span class="badge badge-pill badge-danger">canceled</span>';
                        }

                      ?></td>
                    </tr>
                    <?php

                            }
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