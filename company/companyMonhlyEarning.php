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
                <div style="margin:0 auto;max-width: fit-content;">
                    <div class="card" style="width: 30rem;">
                      <img src="https://thumbs.gfycat.com/UnluckySecondaryGuernseycow-small.gif" class="card-img-top" alt="...">
                      <hr>
                      <div class="card-body">
                        <div class="card-text">
                            <h4>Current Month Earning</h4>
                            <?php
                                $companyUid = Session::get('companyUid');
                                $getMontlyEarn = $aoc->getAllCurrentMonthlyEarningsFromdbD2($companyUid);

                                $monthEarn =0;

                                if (isset($getMontlyEarn) && $getMontlyEarn!=false) {
                                    
                                    $rows = mysqli_fetch_assoc($getMontlyEarn);

                                    $monthEarn = $rows['monthEarn'];
                                }else{
                                    $monthEarn = 0;
                                }
                            ?>
                            <p>Company Earned On <b><?php echo date('M'); ?></b> <span class="float-right"><?php echo $monthEarn.' ৳'; ?></span></p>

                            <p>Charge For EASHO (<?php echo $fee.'%' ?>) <span class="float-right"><?php echo $monthEarn*($fee/100).' ৳'; ?></span></p>
                            <hr>
                            <p>Company Earning <span class="float-right"><?php echo ($monthEarn - $monthEarn*($fee/100)).' ৳'; ?></span></p>

                        </div>
                      </div>
                    </div>
                </div>
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