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
                    <h3 style="margin-bottom:30px;">All Booked Order Details <a href="" class="btn btn-primary">Refresh</a></h3>
                    <!-- <input type="text" class="form-control" id="searchBooking" placeholder="Type Booking Id"> -->
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-primary" id="basic-addon1"><i class="fa fa-search text-secondary" aria-hidden="true"></i></span>
                      </div>
                      <input type="text" class="form-control" id="searchBooking" placeholder="Type Booking Id">
                    </div>
                    <table class="table table-hover">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">Booking No</th>
                          <th scope="col">Package</th>
                          <th scope="col">Total</th>
                          <th scope="col">Booked By</th>
                          <th scope="col">Paid</th>
                          <th scope="col">Detail</th>
                          <th scope="col">Date</th>
                          <th scope="col">Status</th>
                        </tr>
                      </thead>
                      <tbody id="bookingResults">
                      
                        
                        
                      </tbody>
                    </table>
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