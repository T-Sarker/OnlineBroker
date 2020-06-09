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
                <h3 class="mb-4">Company Earnings On <?php echo date('Y'); ?></h3>
                <?php
                    $companyUid = Session::get('companyUid');
                    $getYearlyEarn = $aoc->getAllCurrentYearlyEASHOEarningsFromdbD2($companyUid);
                    $months = array( 'January', 'February', 'March', 'April', 'May', 'June', 'July ', 'August', 'September', 'October', 'November', 'December', );

                    if (isset($getYearlyEarn) && $getYearlyEarn!=false && !empty($getYearlyEarn)) {
                        
                ?>
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th style="text-align:start">Month</th>
                                <th style="text-align:end">Earning</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $total=0;
                            for ($i=0; $i < 12; $i++) { 

                                $total +=$getYearlyEarn[$i]; 
                                
                        ?>
                            <tr>
                                <td style="text-align:start;font-weight:600;padding:25px 5px;" class="text-primary"><?php echo $months[$i]; ?></td>
                                <td style="text-align:end;font-weight:600;padding:25px 5px;" class="text-primary"><?php echo $getYearlyEarn[$i].' ৳'; ?></td>
                            </tr>
                        <?php

                            }
                        ?>
                        <tr style="border-top:3px solid #000;">
                            <td style="text-align:start;font-weight:600" class="text-primary">Total <small>(Without EASHO Charges)</small></td>
                                <td style="text-align:end;font-weight:600" class="text-primary"><?php echo $total.' ৳'; ?></td>
                        </tr>
                        </tbody>
                    </table>
                <?php    
                    }else{
                        echo "<span class='alert alert-danger'>No Yearly Record Found</span>";
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