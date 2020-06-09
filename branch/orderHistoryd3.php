<?php include "inc/header.php" ?>
<?php
  
  $bid = Session::get('branchUid');
  $cid = Session::get('companyUid');
?>
<style>
  .searchTokenC{
    display: none;
  }
</style>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      <?php include "inc/navbar.php" ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_settings-panel.html -->
        <!-- partial -->
        <!-- partial:../../partials/_sidebar.html -->
        <?php include "inc/sidebar.php" ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="historyHeader d-flex">
              <h3>Ticket History</h3>
            <div class="ml-auto mb-3">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text bg-dark" id="basic-addon1"><i class="fa fa-search text-secondary" aria-hidden="true"></i></span>
                </div>
                <input type="text" class="form-control" id="ticketSearch2" style="width:200px;float:left" placeholder="Insert Token Number">
              </div>

            </div>
            </div>
            



            <table class="table">
              <thead class="bg-dark">
                <th class="text-secondary">#</th>
                <th class="text-secondary"> User </th>
                <th class="text-secondary"> Token No </th>
                <th class="text-secondary"> Amount </th>
                <th class="text-secondary"> Ticked Opend </th>
                <th class="text-secondary"> Confirmation </th>
              </thead>
              <tbody id="tokenSuggestion2">
              <?php

                  $getTickets = $aoc->getAllAcceptedTokenForD3Branch($bid,$cid);

                  if (isset($getTickets) && $getTickets != false) {
                    $x= 1;
                    while ($token = $getTickets->fetch_assoc()) {
                      
              ?>
                <tr>
                  <td><?php echo $x++; ?></td>
                  <td><?php echo $token['userName'] ?></td>
                  <td><?php echo $token['bookingUid'] ?></td>
                  <td><?php echo $token['totalAmount']." ৳" ?></td>
                  <td><?php echo $token['orderDateTime'] ?></td>
                  <td><?php echo $token['bookVendorStatus']==1 && $token['bookUserStatus']==1? 'Confirmed':'Nothing'; ?></td>
                </tr>
                <?php

                    }
                  }else{
                    // echo $getTickets;
                    echo "<p class='alert alert-warning mt-3 mb-3'>No Data To Show</p>";
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <?php include 'inc/footer.php' ?>