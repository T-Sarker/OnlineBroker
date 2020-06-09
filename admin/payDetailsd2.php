<?php
	include "inc/header.php"
?>

<?php
    include "inc/sidebar.php"
?>

<?php
        if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['payMonth']) && isset($_POST['payProof'])) {
            
            $month = $_POST['payMonth'];
            $proof = $_POST['payProof'];
            $companyName = $_POST['companyName'];
            $cid = $_POST['companyUid'];
            $totalAmount = $_POST['totalAmount'];
            $paidAmount = $_POST['paidAmount'];
            $fee = $_POST['fee'];
            $onlinePaid = $ad2->getJustTotalAmountByOnlineOfThisMonth($cid);

            $insertD2Proof = $ad2->insertD2ProofIntoDB($month,$proof,$companyName,$cid,$totalAmount,$paidAmount,$fee,$onlinePaid);
        }
?>

<!-- Modal -->
<div class="modal fade" id="payD2MODAL"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Company Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="d2payModal">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="page-content">
        <div class="container-default animated fadeInRight"> <br>
            <div class="viewheightWraper" style="min-height:100vh">
                
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Logo</th>
                      <th scope="col">Company</th>
                      <th scope="col">Owner</th>
                      <th scope="col">Monthly Total</th>
                      <th scope="col">Confirm Monthly Payment</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                          if (isset($insertD2Proof) && $insertD2Proof!=false) {
                              
                              echo $insertD2Proof;
                          }
                    ?>
                  <?php
                        $getCompanyd2 = $ad2->getAllCompanyFromDBForD2();

                        if (isset($getCompanyd2) && $getCompanyd2!=false) {
                            $x=1;
                            while ($company = $getCompanyd2->fetch_assoc()) {

                                $cid = $company['companyUid'];
                                $fee = $company['fee'];
                                $getTotal = $ad2->getJustTotalAmountOfThisMonth($cid);

                                $checkProof = $ad2->checkProofForThisCompany($cid);

                              

                                
                  ?>
                    <tr>
                      <th scope="row"><?php echo $x++; ?></th>
                      <td><img src="<?php echo $company['image'] ?>" style="width:100px;" alt=""></td>
                      <td><?php echo $company['company'] ?></td>
                      <td><?php echo $company['owner'] ?></td>
                      <td><?php echo $getTotal != false? $getTotal.' ৳':'0 ৳' ?></td>
                      <td>

                          <form action="" method="POST" id="form-<?php echo $company['companyUid'] ?>">
                              <div class="row">
                                <div class="col p-0 m-2 " style="flex-grow: 0 !important;">
                                  <input type="text" class="form-control" style="width:120px;" placeholder="Month Name" name="payMonth">
                                  <input type="hidden" name="totalAmount" value="<?php echo $getTotal != false? $getTotal:'0' ?>">
                                  <input type="hidden" name="companyName" value="<?php echo $company['company'] ?>">
                                  <input type="hidden" name="companyUid" value="<?php echo $company['companyUid'] ?>">
                                  <input type="hidden" name="fee" value="<?php echo $fee; ?>">
                                </div>
                                <div class="col p-0 m-2" style="flex-grow: 0 !important;">
                                  <input type="text" class="form-control" style="width:120px;" placeholder="Payment Proof" name="payProof">
                                </div>
                                <div class="col p-0 m-2" style="flex-grow: 0 !important;">
                                  <input type="text" class="form-control" style="width:120px;" placeholder="Pay Amount" name="paidAmount">
                                </div>
                              </div>
                            </form>
                            
                      </td>
                      <td>
                        
                      <a href="" class="btn btn-success" <?php echo isset($checkProof) && $checkProof==true? 'disabled':'' ?> id="submitPay" onclick="event.preventDefault();document.getElementById('form-<?php echo $company['companyUid'] ?>').submit();">
                          Save 
                        </a>

                      <a href="" class="btn btn-primary d2Modal" id="<?php echo $company['companyUid']; ?>" data-toggle="modal" data-target="#payD2MODAL">
                          Payment Details 
                        </a></td>
                        
                    </tr>
                    <?php

                            }
                        }
                    ?>
                  </tbody>
                </table>
                
            </div>
        </div>
        <div class="row footer">
            <div class="col-md-6 text-left"> Copyright &copy; 2017 Foxlabel All rights reserved. </div>
            <div class="col-md-6 text-right"> Design and Developed by Foxlabel </div>
        </div>
    </div>

<?php
    include "inc/rightbar.php"
?>
    
 

<?php
	include "inc/footer.php"
?>
   