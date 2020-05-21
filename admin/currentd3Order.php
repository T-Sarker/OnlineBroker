<?php
	include "inc/header.php"
?>

<?php
    include "inc/sidebar.php"
?>
<?php
    if (isset($_POST['bookingUidx']) && $_POST['bookingUidx']!=null && isset($_POST['paidAmount']) && $_POST['paidAmount']!=null) {
       
       $bid = $_POST['bookingUidx'];
       $pamount = $_POST['paidAmount'];

       $updateBooking = $ad3->updateBookingParameterOnAccept($bid,$pamount);
    }
?>


<!-- Modal -->
<div id="d3Modal" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Booking Request Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="d3ModalBody">
        
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
                <h3>Current D3 Booking Requests</h3>
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
                      <tbody>
                        <?php
                            $getAllBookingRequest = $ad3->getAllCurrentBookingRequest();

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
                               <form action="" method="POST" id="bookingUpdateForm<?php echo $req['bookId'] ?>">
                                    <input type="hidden" value="<?php echo $req['bookingUid']; ?>" name="bookingUidx">
                                   <input type="text" class="form-control" style="max-width:100px;" name="paidAmount">
                               </form>
                           </td>
                          <td>
                          <button type="button" id="<?php echo $req['bookId'] ?>" class="btn btn-primary alert_button" data-toggle="modal" data-target="#exampleModal">view</button>
                        
                          <a href="" class="btn btn-success" onclick="event.preventDefault();document.getElementById('bookingUpdateForm<?php echo $req['bookId'] ?>').submit();"><i class="fa fa-check-square text-secondary" aria-hidden="true"></i></a>

                          <span class="btn btn-danger cancel-booking" id="<?php echo $req['bookId'] ?>" ><i class="fa fa-window-close text-secondary" aria-hidden="true"></i></span>
                        
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
   