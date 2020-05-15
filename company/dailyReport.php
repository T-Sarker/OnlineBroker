<?php
    include "inc/header.php";
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

          <div class="container text-center">
            <div style="height:100%;border:1px solid #000;background:#fff;margin:0 auto;"  id="weeklyReport">
              <div style="width:400px;height:400px;margin:0 auto;">
                <canvas id="myChart" width="400" height="300" aria-label="Hello ARIA World" role="img"></canvas>
              </div>
              <?php
                  $cid = Session::get('companyUid');
                  $getDailyReport = $aoc->getCompanyDailyReportFromDB($cid);

                  if (isset($getDailyReport) && $getDailyReport!=false) {
                      
                      $orders = mysqli_num_rows($getDailyReport);

                      $tamount = 0;
                      while ($repo = $getDailyReport->fetch_assoc()) {
                          
                          $tamount += $repo['totalAmount'];
                      }
                  }else{
                    $orders =0;
                    $tamount = 0;
                  }
              ?>
              <div class="row m-2">
                <div class="col-6 card">
                  <div class="jumbotron text-center">
                    <div class="container">
                      <h4>Income</h4>
                      <p class="lead"><?php echo $tamount.' ৳'; ?></p>
                    </div>
                  </div>
                </div>
                <div class="col-6 card">
                  <div class="jumbotron text-center">
                    <div class="container">
                      <h4>Orders</h4>
                      <p class="lead"><?php echo $orders; ?></p>
                    </div>
                  </div>
                </div>
                <div class="col-6 card">
                  <div class="jumbotron text-center">
                    <div class="container">
                      <h4>Customers</h4>
                      <p class="lead"><?php echo $orders; ?></p>
                      <small>.</small>
                    </div>
                  </div>
                </div>
                <div class="col-6 card">
                  <div class="jumbotron text-center">
                    <div class="container">
                      <h4>Total</h4>
                      <p class="lead"><?php echo $tamount-($tamount*0.02); ?></p>
                      <small><?php echo $tamount*0.02.' ৳ Easho'; ?></small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <button class="btn btn-primary mt-3" onclick="saveAsPDF(2);">save as pdf</button>
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