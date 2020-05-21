<?php
    include "inc/header.php";
?>

<?php

    $months = array( 'January', 'February', 'March', 'April', 'May', 'June', 'July ', 'August', 'September', 'October', 'November', 'December');
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
<!-- $months = array( 'January', 'February', 'March', 'April', 'May', 'June', 'July ', 'August', 'September', 'October', 'November', 'December', ); -->
            <div class="container-fluid">
                <h3>Yearly History</h3>

                <table class="table table-hover">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Months</th>
                      <th scope="col" class=" text-right">Earned</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $companyUid = Session::get('companyUid');
                        $getYearAccounts = $bc->getYearTotalAccountsForD3($companyUid);
                    ?>
                    <?php
                        $total =0;
                        for ($i=0; $i < 12; $i++) { 
                            $total+=$getYearAccounts[$i];
                    ?>
                    <tr>
                      <td><?php echo "Earned On <b class='text-primary'>".$months[$i]."</b>" ?></td>
                      <td class=" text-right"><span class="badge badge-primary p-2"><?php echo $getYearAccounts[$i].' ৳'; ?></span></td>
                    </tr>
                  <?php
                        }
                  ?>
                  <tr style="border-top:3px solid #000">
                      <th class="text-right">Total <small>Without Esho Charge</small></th>
                      <th class="text-right"><?php echo $total.' ৳'; ?></th>
                  </tr>
                    
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