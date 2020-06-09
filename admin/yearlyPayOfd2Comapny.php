<?php
    include "inc/header.php"
?>

<?php
    include "inc/sidebar.php"
?>

<!-- Modal -->
<div class="modal fade" id="payD2MODAL2"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Company Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="d2payModal2">

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
                      <th scope="col">Email</th>
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
                      <td><?php echo $company['email'] ?></td>
                      
                      <td>

                      <a href="" class="btn btn-primary d2Modal2" id="<?php echo $company['companyUid']; ?>" data-toggle="modal" data-target="#payD2MODAL2">
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
   