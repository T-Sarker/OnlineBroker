<?php
    include "inc/header.php"
?>

<?php
    include "inc/sidebar.php"
?>

<!-- Modal -->
<div id="d3Modal2" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Booking Request Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="d3ModalBody2">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<p id="showBook"></p>

<div class="page-content">
        <div class="container-default animated fadeInRight"> <br>
            <div class="viewheightWraper" style="min-height:100vh">
                <h3>All D3 Booking Requests <a href="" class="btn btn-info">Refresh</a></h3></br>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="input-group mb-3">
                              <div class="input-group-prepend" style="padding:0px 10px;background: #646363;color: #fff;">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-search mt-2"></i></span>
                              </div>
                              <input type="text" class="form-control" name="adminBookingSearch" id="adminBookingSearch" placeholder="Booking Id">
                            </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="d-md-flex text-center">
                            <div class="form-check mr-5">
                              <input class="form-check-input" type="radio" name="filterRadioButton" value="paid" id="radio1">
                              <label class="form-check-label" for="radio1">
                                Paid
                              </label>
                            </div>

                            <div class="form-check mr-5">
                              <input class="form-check-input" type="radio" name="filterRadioButton" value="unpaid" id="radio2">
                              <label class="form-check-label" for="radio2">
                                Unpaid
                              </label>
                            </div>

                            <div class="form-check mr-5">
                              <input class="form-check-input" type="radio" name="filterRadioButton" value="canceled" id="radio3">
                              <label class="form-check-label" for="radio3">
                                Canceled
                              </label>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table">
                      <thead class="thead-dark bg-dark">
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Package</th>
                          <th scope="col">User</th>
                          <th scope="col">Date</th>
                          <th scope="col">Company</th>
                          <th scope="col">Branch</th>
                          <th scope="col">Paid</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody id="searchResultForBooklist">
                        <?php
                            $getAllBookingRequest = $ad3->getAllBookingRequestFromDB();

                            if (isset($getAllBookingRequest) && $getAllBookingRequest != false) {
                                $x = 1;
                                while ($req = $getAllBookingRequest->fetch_assoc()) {
                                    
                        ?>
                        <tr>
                          <th scope="row"><?php echo $x++; ?></th>
                          <td width="200"><?php echo $req['packageName']; ?></td>
                          <td><?php echo $req['userName']; ?></td>
                          <td width="100"><?php echo $req['orderDateTime']; ?></td>
                          
                          <td><?php
                                    $cid = $req['companyUid'];
                                    $getCompany = $ad3->getThisCompanyName($cid);
                                    $company = mysqli_fetch_assoc($getCompany);

                                    echo $company['company'];
                           ?></td>
                          <td><?php
                                    $bid = $req['branchUid'];
                                    $getBranch = $ad3->getThisBranchName($bid);
                                    $branch = mysqli_fetch_assoc($getBranch);

                                    echo $branch['branchName'];
                           ?></td>
                           <td>
                               <?php 

                                    if ($req['status']==0 && $req['bookVendorStatus']==1 && $req['bookUserStatus']==1) {
                                        
                                        echo "<span class='badge badge-pill badge-success'>Accepted But Vendor Unpaid</span>";

                                    }elseif ($req['status']==2 && $req['bookVendorStatus']==2 && $req['bookUserStatus']==2) {
                                        
                                        echo "<span class='badge badge-pill badge-danger'>Booking Canceled</span>";

                                    }elseif ($req['status']==3 && $req['bookVendorStatus']==1 && $req['bookUserStatus']==1) {
                                        
                                        echo "<span class='badge badge-pill badge-info'>Accepted And Vendor Paid</span>";
                                    }elseif ($req['status']==1 && $req['bookVendorStatus']==1 && $req['bookUserStatus']==1) {
                                        
                                        echo "<span class='badge badge-pill badge-warning'>Vendor Paid But Not Confirmed Yet</span>";
                                    }else{
                                        echo "<span class='badge badge-pill badge-dark'>Data Is Not Right</span>";
                                    }

                               ?>
                           </td>
                          <td>
                          <button type="button" id="<?php echo $req['bookId'] ?>" class="btn btn-primary alert_button2" data-toggle="modal" data-target="#exampleModal">Check Booking Details</button>
                        
                                                  
                          </td>
                        </tr>
                        <?php

                                }
                            }else{
                                echo "Nothing On D3 Booking";
                            }
                        ?>
                      </tbody>
                    </table>
            </div>
        </div>
        <div class="row footer">
            <div class="col-md-12 text-center"> Copyright &copy; 2020 DEVELOPED BY TAPOS. </div>
        </div>
    </div>

<?php
    include "inc/rightbar.php"
?>
    
 

<?php
    include "inc/footer.php"
?>
   