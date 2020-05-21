<div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li>
                        <a class="has-arrow" href="index.php" aria-expanded="false">
                            <i class="fa fa-bar-chart-o"></i> <span class="nav-text">Dashboard</span>
                        </a>
                        
                    </li>

                    <li class="nav-label">Branch Info</li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-user-plus"></i><span class="nav-text">Branch</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="addBranch.php">Add A Branch</a></li>
                            <li><a href="manageBranch.php">Manage Branch</a></li>
                        </ul>
                    </li>
                    <?php
                        if (Session::get('acType') != null && Session::get('acType')=='d3') {
                        
                    ?>
                    <li class="nav-label">Package Info</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-suitcase"></i><span class="nav-text">Package</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="addPackage.php">Add A Package</a></li>
                            <li><a href="managePackage.php">Manage Package</a></li>
                            <li><a href="form-step.html">Step Form</a></li>
                            <li><a href="form-editor.html">Editor</a></li>
                            <li><a href="form-picker.html">Picker</a></li>
                        </ul>
                    </li>
                    <?php

                        }
                    ?>
                    <li class="nav-label">Company Features</li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-square"></i> <span class="nav-text">Slider</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="companySlider.php">Add Slider</a></li>
                            <li><a href="manageSlider.php">Manage Slider</a></li>
                        </ul>
                    </li>
                    <?php
                        if (Session::get('acType') != null && Session::get('acType')=='d3') {
                    ?>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-line-chart" aria-hidden="true"></i><span class="nav-text">Reports</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="fullReportd3.php">Full Report</a></li>
                        </ul>
                    </li>
                    <?php
                            }else{

                    ?>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-line-chart" aria-hidden="true"></i><span class="nav-text">Reports</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="dailyReport.php">Daily Report</a></li>
                            <li><a href="fullReport.php">Full Report</a></li>
                        </ul>
                    </li>
                    <?php
                            }
                    ?>
                    <?php
                        if (Session::get('acType') != null && Session::get('acType')=='d3') {
                    ?>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-diamond" aria-hidden="true"></i> <span class="nav-text">Accounts</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="monthEarnings.php">Monthly Earnings</a></li>
                            <li><a href="yearEarnings.php">Early Earning</a></li>
                        </ul>
                    </li>


                    <li class="nav-label">Order Info</li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-trophy"></i><span class="nav-text">Orders</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="bookingOrders.php">Current Orders</a></li>
                            <li><a href="allBookingOrderas.php">All Orders</a></li>
                        </ul>
                    </li>
                    <?php
                            }else{
                    ?>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-diamond" aria-hidden="true"></i> <span class="nav-text">Accounts</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="branchEarnings.php">Branch Earnings</a></li>
                        </ul>
                    </li>
                    <?php
                            }
                    ?>


                    
                    
                    
                    <li class="nav-label">Table</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i><span class="nav-text">Table</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="table-basic.html" aria-expanded="false">Basic Table</a></li>
                            <li><a href="table-datatable.html" aria-expanded="false">Data Table</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Pages</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-notebook menu-icon"></i><span class="nav-text">Pages</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="page-login.html">Login</a></li>
                            <li><a href="page-register.html">Register</a></li>
                            <li><a href="page-lock.html">Lock Screen</a></li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
                                <ul aria-expanded="false">
                                    <li><a href="page-error-404.html">Error 404</a></li>
                                    <li><a href="page-error-403.html">Error 403</a></li>
                                    <li><a href="page-error-400.html">Error 400</a></li>
                                    <li><a href="page-error-500.html">Error 500</a></li>
                                    <li><a href="page-error-503.html">Error 503</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>