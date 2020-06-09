<?php
    include "inc/header.php";
?>
<?php
        include '../classes/alld2classes.php';

        $ad2 = new AdminD2Class();
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
            <?php

                $cid = Session::get('companyUid');
                (int) $total = $ad2->getJustTotalAmountOfThisMonth($cid);
                (int) $hand = $ad2->getJustTotalAmountByHandOfThisMonth($cid);
                (int) $online = $ad2->getJustTotalAmountByOnlineOfThisMonth($cid);
                (int) $lastMonthDue = $ad2->getLastMonthDueFromDB($cid);
            ?>
                <h3 class="mb-4">This <b class="text-info"><?php echo date('M'); ?></b>  Payment Between <b class='text-danger'><?php echo Session::get('company'); ?></b> &amp; <b class='text-danger'>EASHO</b> will Be.. </h3>
                <?php
                        
                    if ($total>0) {
                ?>
                <div class="card">
                  <div class="card-body">
                        <h5>Total Earned On <?php echo date('M'); ?><span class="float-right"><?php echo $total>0? $total.' ৳':'Nothing' ?></span></h5><br>

                        <h5>Total Hand-Cash Earned On <?php echo date('M'); ?> <span class="float-right"><?php echo $hand>0? $hand.' ৳':'Nothing' ?></span></h5><br>

                        <h5>Total Online Payment Via EASHO on <?php echo date('M'); ?> <span class="float-right"><?php echo $online>0? $online.' ৳':'Nothing' ?></span></h5><br>

                        <h5>EASHO % On Sale <span class="float-right"><?php echo $fee.'%' ?></span></h5>
                        <hr>
                        <br>
                        <h5>EASHO Payment On <?php echo date('M'); ?> <span class="float-right"><?php echo ($total*($fee/100)).' ৳' ?></span></h5><br>

                        <h5>Total Online Payment Via EASHO on <?php echo date('M'); ?> <span class="float-right"><?php echo $online>0? $online.' ৳':'Nothing' ?></span></h5><br>
                        
                        <h5>Last Month Due<span class="float-right"><?php echo $lastMonthDue>0? $lastMonthDue.' ৳':'Nothing' ?></span></h5><br>

                        <hr>
                            <?php
                                if (($total*($fee/100)) > $online) {
                                    
                            ?>
                                    
                                    <h5>You Have To Pay EASHO on <?php echo date('M'); ?> <span class="float-right"><?php echo $lastMonthDue+(($total*($fee/100)) - $online).' ৳' ?></span></h5><br>
                            <?php
                                }else{
                            ?>
                                    <h5>EASHO will Pay You On <?php echo date('M'); ?> <span class="float-right"><?php echo $online-($total*($fee/100)).' ৳' ?></span></h5><br>
                            <?php
                                }
                            ?>
                        <hr>
                  </div>
                </div>
                <?php

                    }else{
                        echo "No Payment Details To Show";
                    }
                ?>
                <a href="eashoPaymentDone.php" class="btn btn-info text-center w-100">Check Month Wise Payment Confirm Details</a>
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