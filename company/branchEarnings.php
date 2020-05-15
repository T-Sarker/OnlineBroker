<?php
    include "inc/header.php";
?>

<?php include "../classes/companyClass.php"; ?>

<?php
    $cc = new AllCompany();
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

        <h3 style="margin-bottom:30px;">Earning Report of This Month</h3>
        <div class="branchReports">
            <div class="row">
                <div class="col-4">
                    <div class="list-group" id="list-tab" role="tablist">
                    <?php
                        $cid = Session::get('companyUid');
                        $getBranch = $cc->getAllBranchFromDB($cid);

                        if (isset($getBranch) && $getBranch != false) {
                            
                            while ($branch = $getBranch->fetch_assoc()) {
                                
                    ?>
                        <a class="list-group-item list-group-item-action pt-3 pb-3 pl-2 " id="<?php echo "branch".$branch['branchId'] ?>" data-toggle="list" href="#<?php echo "branchs".$branch['branchId'] ?>" role="tab" aria-controls="profile"><?php echo $branch['branchName'] ?></a>

                        <?php
                                
                            }
                        }
                ?>
                    </div>
                </div>
                <div class="col-8">
                    <div class="tab-content" id="nav-tabContent">
                    <?php
                            $cid = Session::get('companyUid');
                            $getBranchs = $cc->getAllBranchFromDB($cid);
                                     if (isset($getBranchs) && $getBranchs != false) {
                                        
                                        $i = 1;
                                         while ($branchs = $getBranchs->fetch_assoc()) {

                    ?>
                        <div class="tab-pane fade show <?php echo $i==1 ? 'active':'' ?>" id="<?php echo 'branchs'.$branchs['branchId'] ?>" role="tabpanel" aria-labelledby="<?php echo 'branch'.$branchs['branchId'] ?>">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">User Name</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Payment Media</th>
                                        <th scope="col">Authorized By</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                     

                                            $branchUid = $branchs['branchdUid'];

                                            $getSingleBranchData = $cc->getSingleBranchDataFromDB($branchUid,$cid);
                                            
                                            $totalMoney = 0;
                                            if (isset($getSingleBranchData) && $getSingleBranchData!=false) {
                                                
                                                while ( $data = $getSingleBranchData->fetch_assoc()) {
                                                    $totalMoney+=$data['totalAmount'];
                                ?>
                                    <tr>
                                        <td><?php echo $data['userName']; ?></td>
                                        <td><?php echo $data['totalAmount']; ?></td>
                                        <td><?php echo $data['orderDate']; ?></td>
                                        <td><?php echo $data['orderMethod']==1 ? 'Hand Cash':'Online Payment' ?></td>
                                        <td><?php echo $data['authorizer']; ?></td>
                                        <td><?php echo $data['status']==1? '<i class="fa fa-check-square-o" style="color:green;" aria-hidden="true"></i>':'<i class="fa fa-window-close-o" style="color:red;" aria-hidden="true"></i>' ?></td>
                                    </tr>

                                    <?php

                                                }
                                            }else{
                                    ?>
                                                    <tr>
                                                        <td><?php echo "Nothing Found"; ?></td>
                                                        <td><?php echo "Nothing Found"; ?></td>
                                                        <td><?php echo "Nothing Found"; ?></td>
                                                        <td><?php echo "Nothing Found"; ?></td>
                                                        <td><?php echo "Nothing Found"; ?></td>
                                                        <td><?php echo "Nothing Found"; ?></td>
                                                    </tr>

                                    <?php
                                            }

                                    ?>
                                    
                                </tbody>
                            </table>
                            <div class="col-12">
                                <div class="accountCalculations card p-2">
                                    <?php  
                                        if (isset($totalMoney)) {
                                            echo "Total Amount: ".$totalMoney.' ৳'."<br>";
                                            echo "Esho Charge:  ".$totalMoney*0.02." ৳"."</br>";
                                            echo "<h4>Company Earned:".($totalMoney-($totalMoney*0.02))." ৳"." </h4>";
                                        }
                                    ?>
                                </div>
                            </div>
                            
                        </div>
                        <?php
                                $i++;
                                        }

                                    }
                            ?>
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