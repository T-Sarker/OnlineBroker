<?php include "inc/header.php" ?>
<style>
  
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

          <div class="container text-center">
            <div style="height:100%;border:1px solid #000;background:#fff;margin:0 auto;"  id="monthlyReport">
              <div>
                <canvas id="ctx" aria-label="Hello ARIA World" role="img"></canvas>
              </div>
              <?php
                  $id = Session::get('branchUid');
                  $cid = Session::get('companyUid');
                  $getDailyReport = $aoc->getMonthlyReportFromDB($id,$cid);

                  if (isset($getDailyReport) && $getDailyReport!=false) {
                      
                      $orders = mysqli_num_rows($getDailyReport);

                      $tamount = 0;
                      while ($repo = $getDailyReport->fetch_assoc()) {
                          
                          $tamount += $repo['totalAmount'];
                      }
                  }else{
                    $tamount = 0;
                    $orders =0;
                  }
              ?>
              <div class="row m-2">
                <div class="col-6 card">
                  <div class="jumbotron text-center">
                    <div class="container">
                      <h3 class="display-6">Income</h3>
                      <p class="lead"><?php echo $tamount.' ৳'; ?></p>
                    </div>
                  </div>
                </div>
                <div class="col-6 card">
                  <div class="jumbotron text-center">
                    <div class="container">
                      <h3 class="display-6">Orders</h3>
                      <p class="lead"><?php echo $orders; ?></p>
                    </div>
                  </div>
                </div>
                <div class="col-6 card">
                  <div class="jumbotron text-center">
                    <div class="container">
                      <h3 class="display-6">Customers</h3>
                      <p class="lead"><?php echo $orders; ?></p>
                      <small>.</small>
                    </div>
                  </div>
                </div>
                <div class="col-6 card">
                  <div class="jumbotron text-center">
                    <div class="container">
                      <h3 class="display-6">Total</h3>
                      <p class="lead"><?php echo $tamount-($tamount*0.02).' ৳'; ?></p>
                      <small><?php echo $tamount*0.02.' ৳ Easho'; ?></small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <button class="btn btn-primary mt-3" onclick="saveAsPDF(1);">save as pdf</button>
          </div>
          </div>
        </div>
        <!-- main-panel ends -->
        
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <?php include 'inc/footer.php' ?>