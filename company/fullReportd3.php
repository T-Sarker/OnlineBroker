<?php
    include "inc/header.php";
?>
<?php
    
    $months = array( 'January', 'February', 'March', 'April', 'May', 'June', 'July ', 'August', 'September', 'October', 'November', 'December');
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
            <div style="height:100%;border:1px solid #000;background-color:#fff;margin:0 auto;"  id="d3monthlyReport">
              <div>
                <canvas id="ctxt" aria-label="Hello ARIA World" role="img"></canvas>
                <small>Yearly report Of Each Branch</small>


              </div>

              <table class="table table-hover">
                  <thead class="thead-dark">
                    <tr>
                      <th class="text-left" scope="col">Months</th>
                      <th scope="col" class=" text-right">Earned</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $companyUid = Session::get('companyUid');
                        $getYearAccounts = $bc->getYearTotalAccountsForD3($companyUid);
                    ?>
                    <?php
                        for ($i=0; $i < 12; $i++) { 
                
                    ?>
                    <tr>
                      <td class="text-left"><?php echo "Earned On <b class='text-primary'>".$months[$i]."</b>" ?></td>
                      <td class=" text-right"><span class="badge badge-primary p-2"><?php echo $getYearAccounts[$i].' ৳'; ?></span></td>
                    </tr>
                  <?php
                        }
                  ?>
                    
                  </tbody>
                </table>
          </div>
              <button class="btn btn-primary mt-3" onclick="saveAsPDF(3);">save as pdf</button>
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