<?php include "inc/header.php" ?>

<?php
    // if (isset($_GET['order']) && $_GET['order']=='list') {
        
        
    // }
?>

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
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <span id="resaultToast" class="mb-3"></span>
                    <h4 class="card-title" style="margin-top:15px;">Order Tickets</h4>
                    <p class="card-description"> Smile While New Tickets are arriving. </p>
                    <div class="confirmOrder">
                    </div>
                    <table class="table table-striped">
                      <thead class="bg-dark">
                        <tr>
                          <th class="text-secondary">#</th>
                          <th class="text-secondary"> User </th>
                          <th class="text-secondary"> Token No </th>
                          <th class="text-secondary"> Amount </th>
                          <th class="text-secondary"> Ticked Opend </th>
                          <th class="text-secondary"> Confirmation </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                          $bid = Session::get('branchUid');
                          $cid = Session::get('companyUid');
                          $getOrders = $aoc->getAllOnlyDetailsofOrderForD3Branch($bid,$cid);

                          if (isset($getOrders) && $getOrders!=false) {
                            $x = 1;
                              while ($order = $getOrders->fetch_assoc()) {
                              
                      ?>
                        <tr>
                          <td><?php echo $x++; ?></td>
                          <td><?php echo $order['userName']; ?></td>
                          <td><?php echo $order['bookingUid']; ?></td>
                          <td><?php echo $order['totalAmount']." ৳"; ?></td>
                          <td><?php echo $order['orderDateTime']; ?></td>
                          <td><?php echo $order['bookVendorStatus']==1 && $order['bookUserStatus']==1? 'Confirmed':'Nothing'; ?></td>
                          
                        </tr>
                        <?php

                              }
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <?php include 'inc/footer.php' ?>