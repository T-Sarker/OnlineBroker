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
                <h3>Payment Confirmed On Following Months</h3>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Paid By</th>
                      <th scope="col">Paid To</th>
                      <th scope="col">Total Amount</th>
                      <th scope="col">Paid Amount</th>
                      <th scope="col">Due</th>
                      <th scope="col">Paid For</th>
                      <th scope="col">Transection No</th>
                      <th scope="col">Paid Date</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                        $cid = Session::get('companyUid');
                        $getAllPayConfirmation = $aoc->getAllPayConfirmationFromDB($cid);

                        if (isset($getAllPayConfirmation) && $getAllPayConfirmation!=false) {
                            $x=1;
                            while ($confirm = $getAllPayConfirmation->fetch_assoc()) {
                                
                  ?>
                    <tr>
                      <th scope="row"><?php echo $x++; ?></th>
                      <td><?php echo $confirm['paidBy']; ?></td>
                      <td><?php echo $confirm['paidTo']; ?></td>
                      <td><?php echo $confirm['totalAmount']; ?></td>
                      <td><?php echo $confirm['paidAmount']; ?></td>
                      <td><?php echo $confirm['due']; ?></td>
                      <td><?php echo $confirm['paidMonth']; ?></td>
                      <td><?php echo $confirm['paidProof']; ?></td>
                      <td><?php echo $confirm['PaidDate']; ?></td>
                    </tr>
                    <?php

                            }
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