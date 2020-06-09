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
                
                <h3 class="mb-5">Confirm Your Monthly Payment</h3>
                <?php
                    $companyUid = Session::get('companyUid');
                    $getPayConfirm = $bc->getvendorPaymentDetails($companyUid);
                    if (isset($getPayConfirm) && $getPayConfirm!=false) {
                        
                        while ($confirm = $getPayConfirm->fetch_assoc()) {
                            
                ?>
                <div class="card" style="width: 25rem;margin:0 auto;">
                  <img class="card-img-top" src="https://thumbs.gfycat.com/PracticalAdoredGuanaco-small.gif" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">Monthly Payment Confirmation</h5>
                    <p class="card-text">Your Monthly payment Has been Paid For <?php echo '<b>'. date('M').'</b>' ?>. You need to Confirm this To verify That You have been Informed/Notified About This Payment And Recieved The Payment Successfully.</p>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><h5>Confirmation Details For <?php echo '<b>'. date('M').'</b>' ?></h5></li>
                    <div class="container mt-3">
                        <p>Payment Money: <span class="float-right text-primary"><?php echo $confirm['paidAmount'].' ৳'; ?></span></p>
                        <p>Transection No: <span class="float-right text-primary"><?php echo $confirm['transactionNo']; ?></span></p>
                        <p>Transection Made By: <span class="float-right text-primary"><?php echo $confirm['payerName']; ?></span></p>
                        <p>Paid To: <span class="float-right text-primary"><?php echo $confirm['paidTo']; ?></span></p>
                    </div>
                  </ul>
                  <div class="card-body text-center">
                    <a href="" class="btn btn-success monthVendorPayConfirm" id="<?php echo $confirm['paidTo']; ?>"> Confirm Your Payment Authorization </a>
                  </div>
                </div><br><br>
                <?php

                        }
                    }else{

                        echo "<span class='alert alert-info'>All Payment Confirmed</span>";
                    }
                ?>
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