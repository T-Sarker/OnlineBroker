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
                <input type="text" class="form-control" id="ticketSearch" style="width:200px;float:left" placeholder="Insert Token Number">
              </div>

            </div>
            </div>
            



            <table class="table">
              <thead class="bg-dark">
                <th class="text-secondary">Ticket Number</th>
                <th class="text-secondary">Customer Name</th>
                <th class="text-secondary">Amount</th>
                <th class="text-secondary">Date</th>
                <th class="text-secondary">Payment Method</th>
                <th class="text-secondary">Token Authorized</th>
              </thead>
              <tbody id="tokenSuggestion">
              <?php

                  $getTickets = $aoc->getAllAcceptedToken($bid,$cid);

                  if (isset($getTickets) && $getTickets != false) {
                    
                    while ($token = $getTickets->fetch_assoc()) {
                      
              ?>
                <tr>
                  <td><?php echo $token['orderNumber'] ?></td>
                  <td><?php echo $token['userName'] ?></td>
                  <td><?php echo $token['totalAmount']." ৳" ?></td>
                  <td><?php echo $token['orderDate'] ?></td>
                  <td><?php 
                      if ($token['orderMethod']==1) {
                        echo "Hand Cash";
                      }elseif ($token['orderMethod']==2) {
                        echo "Online Payment";
                      }else{
                        echo "Unverified";
                      }
                   ?></td>
                  <td><?php echo 'By: '.$token['authorizer'] ?></td>
                </tr>
                <?php

                    }
                  }else{
                    echo $getTickets;
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