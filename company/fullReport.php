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
        <div class="content-body" style="background-color:white;">

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
            <div style="height:100%;border:1px solid #000;background-color:#fff;margin:0 auto;"  id="monthlyReport">
              <div>
                <canvas id="ctx" aria-label="Hello ARIA World" role="img"></canvas>
                <small>Yearly report Of Each Branch</small>


              </div>

              <div class="row m-2">
              <?php
                  $cid = Session::get('companyUid');
                  $getReport = $aoc->getCompanyMonthlyTotalOrderCountOfAllBranch($cid);

                  if (isset($getReport) && $getReport!=false) {

                    $irange = sizeof($getReport);
                    $var[] = array_values($getReport);
                    $keys[] = array_keys($getReport);

                    for ($i=0; $i < $irange; $i++) { 
                      

                      
              ?>
              
                <div class="col-6 card">
                  <div class="jumbotron text-center">
                    <div class="container">
                      <h4><?php echo $keys[0][$i] ?></h4>
                      <p class="lead"><?php echo "Earned ".$var[0][$i].' ৳'; ?></p>
                      <small class="lead"><?php echo "ESHO charge <em>".$var[0][$i]*0.02.' ৳ </em>'; ?></small>
                      <p class="lead"><?php echo "Company Income <em>".($var[0][$i]-($var[0][$i]*0.02)).' ৳ </em>'; ?></p>

                    </div>
                  </div>
                </div>
              
              <?php

                    }
                  }else{
                    echo "<span class='alert alert-danger'>No Data To Show</span>";
                  }
              ?>
                </div>
            </div>
              <button class="btn btn-primary mt-3" onclick="saveAsPDF(1);">save as pdf</button>
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