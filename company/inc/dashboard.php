<div class="content-body">
<style>
    #content {
  border: 2px solid black;
  border-top-left-radius: 4px;
  border-top-right-radius: 4px;
}
<?php
        include '../classes/companyClass.php';

        $cc = new AllCompany();

        $cid = Session::get('companyUid');
?>
#calendar_id {
  width: 100% !important;
}

.button-style {
  font-family: "Inconsolata", monospace;
  background-color: #e0f7fa;
  border-radius: 4px;
  color: black;
  border: 1px solid #e0f7fa;
  padding: 10px 24px;
  text-align: center;
  font-size: 16px;
}

.button-style:hover {
  background-color: #26c6da;
  color: white;
}

#previous {
  float: left;
  padding-top: 10px;
}

#next {
  float: right;
  padding-top: 10px;
}

.resultMonthAndYear {
  font-family: "Inconsolata", monospace;
  font-size: 20px;
  font-weight: 700;
  color: rgb(0, 0, 0);
  text-align: center;
  line-height: 40px;
  background-color: #e0f7fa;
}

th {
  font-family: "Inconsolata", monospace;
  border: 1px solid black;
  background-color: #00acc1;
  color: #ffffff;
}

td {
  font-family: "Inconsolata", monospace;
  border: 1px solid black;
  text-align: center;
  padding: 24px;
  width: 25px;
}

.currentDay {
  background-color: #F15C5C;
  color: #fff;
}

.currentDay:hover {
  background-color: rgb(189, 105, 105);
}
</style>
            <div class="container-fluid mt-3">
                <div class="row">
                <?php
                    if (Session::get('acType')=='d2') {

                ?>
                    <div class="col-lg-4">
                        <div class="card">
                        <?php
                                
                            
                            $branch=0;
                            $totalBranch = $cc->getAllBranchFromDB($cid);

                            if (isset($totalBranch) && $totalBranch!=false) {
                                
                                $branch = mysqli_num_rows($totalBranch);
                            
                        ?>
                            <div class="stat-widget-one">
                                <div class="stat-content d-flex justify-content-between">
                                    <div class="stat-text text-danger">
                                        <i class="fa fa-cube"></i>
                                    </div>
                                    
                                    <div class="stat-digit">
                                        <p class="mb-2">Total Branch</p>
                                        <h3><?php echo $branch>0? $branch:0 ?></h3>
                                    </div>
                                </div>
                            </div>
                            <?php
                                    }
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="stat-widget-one">
                                <div class="stat-content d-flex justify-content-between">
                                    <div class="stat-text text-warning">
                                        <i class="fa fa-file-text-o"></i>
                                    </div>
                                    <?php
                                        $getTotalEarning = $cc->getTotalEarningOfCompanyFromDB($cid);
                                    ?>
                                    <div class="stat-digit">
                                        <p class="mb-2">Total Earning <?php echo date('Y') ?></p>
                                        <h3><?php echo $getTotalEarning.' ৳'; ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="stat-widget-one">
                                <div class="stat-content d-flex justify-content-between">
                                    <div class="stat-text text-success">
                                        <i class="fa fa-cart-arrow-down"></i>
                                    </div>
                                    <?php
                                        $getSales = $cc->getTotalOrderCount($cid);
                                    ?>
                                    <div class="stat-digit">
                                        <p class="mb-2">Total Sales</p>
                                        <h3><?php echo $getSales; ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                            }else{
                    ?>


                    <div class="col-lg-4">
                        <div class="card">
                        <?php
                                
                            
                            $branch=0;
                            $totalBranch = $cc->getAllBranchFromDB($cid);

                            if (isset($totalBranch) && $totalBranch!=false) {
                                
                                $branch = mysqli_num_rows($totalBranch);
                            
                        ?>
                            <div class="stat-widget-one">
                                <div class="stat-content d-flex justify-content-between">
                                    <div class="stat-text text-danger">
                                        <i class="fa fa-cube"></i>
                                    </div>
                                    
                                    <div class="stat-digit">
                                        <p class="mb-2">Total Branch</p>
                                        <h3><?php echo $branch>0? $branch:0 ?></h3>
                                    </div>
                                </div>
                            </div>
                            <?php
                                    }
                            ?>
                        </div>
                    </div>


                    <div class="col-lg-4">
                        <div class="card">
                            <div class="stat-widget-one">
                                <div class="stat-content d-flex justify-content-between">
                                    <div class="stat-text text-warning">
                                        <i class="fa fa-file-text-o"></i>
                                    </div>
                                    <?php
                                        $getTotalEarningd3 = $cc->getTotalEarningOfCompanyd3FromDB($cid);
                                    ?>
                                    <div class="stat-digit">
                                        <p class="mb-2">Total Earning <?php echo date('Y') ?></p>
                                        <h3><?php echo $getTotalEarningd3.' ৳'; ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="stat-widget-one">
                                <div class="stat-content d-flex justify-content-between">
                                    <div class="stat-text text-success">
                                        <i class="fa fa-cart-arrow-down"></i>
                                    </div>
                                    <?php
                                        $getSalesd3 = $cc->getTotalOrderCountd3($cid);
                                    ?>
                                    <div class="stat-digit">
                                        <p class="mb-2">Total Sales</p>
                                        <h3><?php echo $getSalesd3; ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                            }
                    ?>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="row bg-light mb-5">
                                    <div class="col-6">
                                        <div id="content">

                                            <div class="buttons" id="container">
                                                <button style="border: none;background: transparent;" id="previous"><i class="fa fa-arrow-circle-left p-2" aria-hidden="true"></i></button>

                                                <button style="border: none;background: transparent;" id="next"><i class="fa fa-arrow-circle-right p-2" aria-hidden="true"></i></button>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="showWeather text-center">
                                            <div class="card" style="width: 22rem;margin:0 auto">
                                              <img src="https://media3.giphy.com/media/tljpZTVJoo0JW/source.gif" class="card-img-top" alt="...">
                                              <div class="card-body">
                                                <h5 class="card-title" id="cityName"></h5>
                                                <hr>
                                                <div class="row" id="day5Weather">
                                                    
                                                    
                                              </div>
                                            </div>
                                        <!-- </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="row">
                    <div class="col-xl-4 col-lg-6">
                        <div class="card card-widget">
                            <div class="card-body">
                                <h5 class="text-muted">This Month</h5>
                                <h2 class="mt-4">$6,932.60</h2>
                                <span>Total Revenue</span>
                                <div class="mt-4">
                                    <h4>2,365</h4>
                                    <h6>Online Earning <span class="pull-right">80%</span></h6>
                                    <div class="progress mb-3" style="height: 7px">
                                        <div class="progress-bar bg-primary" style="width: 80%;" role="progressbar"><span class="sr-only">80% Complete</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <h4>1,250</h4>
                                    <h6 class="m-t-10 text-muted">Offline Earning <span class="pull-right">50%</span></h6>
                                    <div class="progress mb-3" style="height: 7px">
                                        <div class="progress-bar bg-success" style="width: 50%;" role="progressbar"><span class="sr-only">50% Complete</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <h4>1,250</h4>
                                    <h6 class="m-t-10 text-muted">Yearly Saving <span class="pull-right">35%</span></h6>
                                    <div class="progress" style="height: 7px">
                                        <div class="progress-bar bg-danger" style="width: 35%;" role="progressbar"><span class="sr-only">35% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-8 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Order Summary</h4>
                                <div id="morris-bar-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-0">
                                <h4 class="card-title px-4 mb-3">Todo</h4>
                                <div class="todo-list">
                                    <div class="tdl-holder">
                                        <div class="tdl-content">
                                            <ul id="todo_list">
                                                <li><label><input type="checkbox"><i></i><span>Get up</span><a href='#' class="ti-trash"></a></label></li>
                                                <li><label><input type="checkbox" checked><i></i><span>Stand up</span><a href='#' class="ti-trash"></a></label></li>
                                                <li><label><input type="checkbox"><i></i><span>Don't give up the fight.</span><a href='#' class="ti-trash"></a></label></li>
                                                <li><label><input type="checkbox" checked><i></i><span>Do something else</span><a href='#' class="ti-trash"></a></label></li>
                                            </ul>
                                        </div>
                                        <div class="px-4">
                                            <input type="text" class="tdl-new form-control" placeholder="Write new item and hit 'Enter'...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Activity</h4>
                                <div id="activity">
                                    <div class="media border-bottom pt-3 pb-3">
                                        <img width="35" src="https://interactive-examples.mdn.mozilla.net/media/examples/grapefruit-slice-332-332.jpg" class="mr-3 rounded-circle">
                                        <div class="media-body">
                                            <h6>Received New Order</h6>
                                            <p class="mb-0">I shared this on my fb wall a few months back,</p>
                                        </div><span class="text-muted ">April 24, 2018</span>
                                    </div>
                                    <div class="media border-bottom pt-3 pb-3">
                                        <img width="35" src="https://interactive-examples.mdn.mozilla.net/media/examples/grapefruit-slice-332-332.jpg" class="mr-3 rounded-circle">
                                        <div class="media-body">
                                            <h6>iPhone develered</h6>
                                            <p class="mb-0">I shared this on my fb wall a few months back,</p>
                                        </div><span class="text-muted ">April 24, 2018</span>
                                    </div>
                                    <div class="media border-bottom pt-3 pb-3">
                                        <img width="35" src="https://interactive-examples.mdn.mozilla.net/media/examples/grapefruit-slice-332-332.jpg" class="mr-3 rounded-circle">
                                        <div class="media-body">
                                            <h6>3 Order Pending</h6>
                                            <p class="mb-0">I shared this on my fb wall a few months back,</p>
                                        </div><span class="text-muted ">April 24, 2018</span>
                                    </div>
                                    <div class="media border-bottom pt-3 pb-3">
                                        <img width="35" src="https://interactive-examples.mdn.mozilla.net/media/examples/grapefruit-slice-332-332.jpg" class="mr-3 rounded-circle">
                                        <div class="media-body">
                                            <h6>Join new Manager</h6>
                                            <p class="mb-0">I shared this on my fb wall a few months back,</p>
                                        </div><span class="text-muted ">April 24, 2018</span>
                                    </div>
                                    <div class="media border-bottom pt-3 pb-3">
                                        <img width="35" src="https://interactive-examples.mdn.mozilla.net/media/examples/grapefruit-slice-332-332.jpg" class="mr-3 rounded-circle">
                                        <div class="media-body">
                                            <h6>Branch open 5 min Late</h6>
                                            <p class="mb-0">I shared this on my fb wall a few months back,</p>
                                        </div><span class="text-muted ">April 24, 2018</span>
                                    </div>
                                    <div class="media border-bottom pt-3 pb-3">
                                        <img width="35" src="https://interactive-examples.mdn.mozilla.net/media/examples/grapefruit-slice-332-332.jpg" class="mr-3 rounded-circle">
                                        <div class="media-body">
                                            <h6>New support ticket received</h6>
                                            <p class="mb-0">I shared this on my fb wall a few months back,</p>
                                        </div><span class="text-muted ">April 24, 2018</span>
                                    </div>
                                    <div class="media pt-3 pb-3">
                                        <img width="35" src="https://interactive-examples.mdn.mozilla.net/media/examples/grapefruit-slice-332-332.jpg" class="mr-3 rounded-circle">
                                        <div class="media-body">
                                            <h6>Facebook Post 30 Comments</h6>
                                            <p class="mb-0">I shared this on my fb wall a few months back,</p>
                                        </div><span class="text-muted ">April 24, 2018</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="card card-widget">
                            <div class="card-body">
                                <h5 class="card-title">Order Overview </h5>
                                <div class="mt-4">
                                    <p class="mb-2 text-muted">Smartphone</p>
                                    <div class="progress mb-3" style="height: 7px">
                                        <div class="progress-bar bg-primary" style="width: 30%;" role="progressbar"><span class="sr-only">30% Order</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <p class="mb-2 text-muted">Tab</p>
                                    <div class="progress mb-3" style="height: 7px">
                                        <div class="progress-bar bg-primary" style="width: 50%;" role="progressbar"><span class="sr-only">50% Order</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <p class="mb-2 text-muted">Samsung</p>
                                    <div class="progress mb-3" style="height: 7px">
                                        <div class="progress-bar bg-warning" style="width: 20%;" role="progressbar"><span class="sr-only">20% Order</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <p class="mb-2 text-muted">iPhone</p>
                                    <div class="progress mb-3" style="height: 7px">
                                        <div class="progress-bar bg-primary" style="width: 20%;" role="progressbar"><span class="sr-only">20% Order</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <p class="mb-2 text-muted">Computer</p>
                                    <div class="progress mb-3" style="height: 7px">
                                        <div class="progress-bar bg-danger" style="width: 20%;" role="progressbar"><span class="sr-only">20% Order</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <p class="mb-2 text-muted">Graphic</p>
                                    <div class="progress mb-3" style="height: 7px">
                                        <div class="progress-bar bg-primary" style="width: 20%;" role="progressbar"><span class="sr-only">20% Order</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="social-graph-wrapper widget-facebook">
                                <span class="s-icon"><i class="fa fa-facebook"></i></span>
                            </div>
                            <div class="row">
                                <div class="col-6 border-right">
                                    <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                        <h4 class="m-1">89k</h4>
                                        <p class="m-0">Friends</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                        <h4 class="m-1">119k</h4>
                                        <p class="m-0">Followers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="social-graph-wrapper widget-linkedin">
                                <span class="s-icon"><i class="fa fa-linkedin"></i></span>
                            </div>
                            <div class="row">
                                <div class="col-6 border-right">
                                    <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                        <h4 class="m-1">89k</h4>
                                        <p class="m-0">Friends</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                        <h4 class="m-1">119k</h4>
                                        <p class="m-0">Followers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="social-graph-wrapper widget-googleplus">
                                <span class="s-icon"><i class="fa fa-google-plus"></i></span>
                            </div>
                            <div class="row">
                                <div class="col-6 border-right">
                                    <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                        <h4 class="m-1">89k</h4>
                                        <p class="m-0">Friends</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                        <h4 class="m-1">119k</h4>
                                        <p class="m-0">Followers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="social-graph-wrapper widget-twitter">
                                <span class="s-icon"><i class="fa fa-twitter"></i></span>
                            </div>
                            <div class="row">
                                <div class="col-6 border-right">
                                    <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                        <h4 class="m-1">89k</h4>
                                        <p class="m-0">Friends</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                        <h4 class="m-1">119k</h4>
                                        <p class="m-0">Followers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="./images/users/8.jpg" class="rounded-circle" alt="">
                                    <h5 class="mt-3 mb-1">Ana Liem</h5>
                                    <p class="m-0">Senior Manager</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="./images/users/5.jpg" class="rounded-circle" alt="">
                                    <h5 class="mt-3 mb-1">John Abraham</h5>
                                    <p class="m-0">Store Manager</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="./images/users/7.jpg" class="rounded-circle" alt="">
                                    <h5 class="mt-3 mb-1">John Doe</h5>
                                    <p class="m-0">Sales Man</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="./images/users/1.jpg" class="rounded-circle" alt="">
                                    <h5 class="mt-3 mb-1">Mehedi Titas</h5>
                                    <p class="m-0">Online Marketer</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> -->
                
                

                <!-- <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="active-member">
                                    <div class="table-responsive">
                                        <table class="table table-xs mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Customers</th>
                                                    <th>Product</th>
                                                    <th>Country</th>
                                                    <th>Status</th>
                                                    <th>Payment Method</th>
                                                    <th>Activity</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><img src="https://interactive-examples.mdn.mozilla.net/media/examples/grapefruit-slice-332-332.jpg" class=" rounded-circle mr-3" alt="">Sarah Smith</td>
                                                    <td>iPhone X</td>
                                                    <td>
                                                        <span>United States</span>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <div class="progress" style="height: 6px">
                                                                <div class="progress-bar bg-primary" style="width: 50%"></div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><i class="fa fa-circle-o text-primary  mr-2"></i> Paid</td>
                                                    <td>
                                                        <span>Last Login</span>
                                                        <span class="m-0 pl-3">10 sec ago</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><img src="https://interactive-examples.mdn.mozilla.net/media/examples/grapefruit-slice-332-332.jpg" class=" rounded-circle mr-3" alt="">Walter R.</td>
                                                    <td>Pixel 2</td>
                                                    <td><span>Canada</span></td>
                                                    <td>
                                                        <div>
                                                            <div class="progress" style="height: 6px">
                                                                <div class="progress-bar bg-primary" style="width: 50%"></div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><i class="fa fa-circle-o text-primary  mr-2"></i> Paid</td>
                                                    <td>
                                                        <span>Last Login</span>
                                                        <span class="m-0 pl-3">50 sec ago</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><img src="https://interactive-examples.mdn.mozilla.net/media/examples/grapefruit-slice-332-332.jpg" class=" rounded-circle mr-3" alt="">Andrew D.</td>
                                                    <td>OnePlus</td>
                                                    <td><span>Germany</span></td>
                                                    <td>
                                                        <div>
                                                            <div class="progress" style="height: 6px">
                                                                <div class="progress-bar bg-warning" style="width: 50%"></div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><i class="fa fa-circle-o text-warning  mr-2"></i> Pending</td>
                                                    <td>
                                                        <span>Last Login</span>
                                                        <span class="m-0 pl-3">10 sec ago</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><img src="https://interactive-examples.mdn.mozilla.net/media/examples/grapefruit-slice-332-332.jpg" class=" rounded-circle mr-3" alt=""> Megan S.</td>
                                                    <td>Galaxy</td>
                                                    <td><span>Japan</span></td>
                                                    <td>
                                                        <div>
                                                            <div class="progress" style="height: 6px">
                                                                <div class="progress-bar bg-primary" style="width: 50%"></div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><i class="fa fa-circle-o text-primary  mr-2"></i> Paid</td>
                                                    <td>
                                                        <span>Last Login</span>
                                                        <span class="m-0 pl-3">10 sec ago</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><img src="https://interactive-examples.mdn.mozilla.net/media/examples/grapefruit-slice-332-332.jpg" class=" rounded-circle mr-3" alt=""> Doris R.</td>
                                                    <td>Moto Z2</td>
                                                    <td><span>England</span></td>
                                                    <td>
                                                        <div>
                                                            <div class="progress" style="height: 6px">
                                                                <div class="progress-bar bg-primary" style="width: 50%"></div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><i class="fa fa-circle-o text-primary  mr-2"></i> Paid</td>
                                                    <td>
                                                        <span>Last Login</span>
                                                        <span class="m-0 pl-3">10 sec ago</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><img src="https://interactive-examples.mdn.mozilla.net/media/examples/grapefruit-slice-332-332.jpg" class=" rounded-circle mr-3" alt="">Elizabeth W.</td>
                                                    <td>Notebook Asus</td>
                                                    <td><span>China</span></td>
                                                    <td>
                                                        <div>
                                                            <div class="progress" style="height: 6px">
                                                                <div class="progress-bar bg-warning" style="width: 50%"></div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><i class="fa fa-circle-o text-warning  mr-2"></i> Pending</td>
                                                    <td>
                                                        <span>Last Login</span>
                                                        <span class="m-0 pl-3">10 sec ago</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div> -->
            </div>
            <!-- #/ container -->
        </div>