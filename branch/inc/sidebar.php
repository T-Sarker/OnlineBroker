<nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-profile">
                        <a href="#" class="nav-link">
                            <div class="nav-profile-image">
                                <img src="https://www.pngkit.com/png/full/824-8246267_time-left-user-icon-round-png.png" alt="profile">
                                <span class="login-status online"></span>
                                <!--change to offline or busy as needed-->
                            </div>
                            <div class="nav-profile-text d-flex flex-column">
                                <span class="font-weight-bold mb-2"><?php echo Session::get('userName') ?></span>
                                <span class="text-secondary text-small"><?php echo 'ID: '.Session::get('branchUid') ?></span>
                            </div>
                            <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <span class="menu-title mr-2">Dashboard </span>
                            <i class="fa fa-tachometer ml-auto"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false" aria-controls="page-layouts">
                            <span class="menu-title mr-2">Profiles</span>
                            <i class="fa fa-id-badge ml-auto"></i>
                        </a>
                        <div class="collapse" id="page-layouts">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="company.php">Company</a></li>
                                <li class="nav-item"> <a class="nav-link" href="profile.php">Profile</a></li>
                            </ul>
                        </div>
                    </li>
                    <?php
                        if (isset($acType) && $acType!='d3') {
                           
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#apps" aria-expanded="false" aria-controls="apps">
                            <span class="menu-title">Order</span>
                            <i class="fa fa-shopping-cart ml-auto"></i>
                        </a>
                        <div class="collapse" id="apps">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="orderList.php">Order List</a></li>
                                <li class="nav-item"> <a class="nav-link" href="orderHistory.php">Order History</a></li>
                            </ul>
                        </div>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#sidebar-layouts" aria-expanded="false" aria-controls="sidebar-layouts">
                            <span class="menu-title">Earning </span>
                            <i class="fa fa-trophy ml-auto"></i>
                        </a>
                        <div class="collapse" id="sidebar-layouts">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="dailyReport.php">Daily Report</a></li>
                                <li class="nav-item"> <a class="nav-link" href="fullReport.php">Full Report</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/layout/sidebar-hidden.html">Sidebar Hidden</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/layout/sidebar-hidden-overlay.html">Sidebar Overlay</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/layout/sidebar-fixed.html">Sidebar Fixed</a></li>
                            </ul>
                        </div>
                    </li>
                    <?php

                        }else{
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#apps" aria-expanded="false" aria-controls="apps">
                            <span class="menu-title">Order</span>
                            <i class="fa fa-shopping-cart ml-auto"></i>
                        </a>
                        <div class="collapse" id="apps">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="orderListd3.php">Order List</a></li>
                                <li class="nav-item"> <a class="nav-link" href="orderHistoryd3.php">Order History</a></li>
                            </ul>
                        </div>
                    </li>
                    <?php
                            }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                            <span class="menu-title">Basic UI Elements</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/accordions.html">Accordions</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/badges.html">Badges</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/breadcrumbs.html">Breadcrumbs</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/modals.html">Modals</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/progress.html">Progress bar</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/pagination.html">Pagination</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/tabs.html">Tabs</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/tooltips.html">Tooltip</a></li>
                            </ul>
                        </div>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-advanced" aria-expanded="false" aria-controls="ui-advanced">
                            <span class="menu-title">Package</span>
                            <i class="fa fa-suitcase ml-auto"></i>
                        </a>
                        <div class="collapse" id="ui-advanced">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="">Add A Package</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/clipboard.html">Clipboard</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/context-menu.html">Context menu</a></li>
                                
                            </ul>
                        </div>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="pages/ui-features/popups.html">
                            <span class="menu-title">Popups</span>
                            <i class="mdi mdi-forum menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/ui-features/notifications.html">
                            <span class="menu-title">Notifications</span>
                            <i class="mdi mdi-bell-ring menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                            <span class="menu-title">Icons</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-contacts menu-icon"></i>
                        </a>
                        <div class="collapse" id="icons">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Material</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/icons/flag-icons.html">Flag icons</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/icons/font-awesome.html">Font Awesome</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/icons/simple-line-icon.html">Simple line icons</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/icons/themify.html">Themify icons</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#forms" aria-expanded="false" aria-controls="forms">
                            <span class="menu-title">Forms</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                        </a>
                        <div class="collapse" id="forms">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/forms/basic_elements.html">Form Elements</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/forms/advanced_elements.html">Advanced Forms</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/forms/validation.html">Validation</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/forms/wizard.html">Wizard</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/forms/text_editor.html">
                            <span class="menu-title">Text editors</span>
                            <i class="mdi mdi-file-document menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/forms/code_editor.html">
                            <span class="menu-title">Code editors</span>
                            <i class="mdi mdi-code-not-equal-variant menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                            <span class="menu-title">Charts</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-chart-bar menu-icon"></i>
                        </a>
                        <div class="collapse" id="charts">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/charts/morris.html">Morris</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/charts/flot-chart.html">Flot</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/charts/google-charts.html">Google charts</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/charts/sparkline.html">Sparkline js</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/charts/c3.html">C3 charts</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/charts/chartist.html">Chartist</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/charts/justGage.html">JustGage</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                            <span class="menu-title">Tables</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-table-large menu-icon"></i>
                        </a>
                        <div class="collapse" id="tables">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/tables/data-table.html">Data table</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/tables/js-grid.html">Js-grid</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/tables/sortable-table.html">Sortable table</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#maps" aria-expanded="false" aria-controls="maps">
                            <span class="menu-title">Maps</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-map-marker-radius menu-icon"></i>
                        </a>
                        <div class="collapse" id="maps">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/maps/google-maps.html">Google Maps</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/maps/mapael.html">Mapael</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/maps/vector-map.html">Vector map</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                            <span class="menu-title">User Pages</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-lock menu-icon"></i>
                        </a>
                        <div class="collapse" id="auth">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2 </a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/multi-level-login.html"> Multi Level Login </a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register 2 </a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen </a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
                            <span class="menu-title">Error pages</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-security menu-icon"></i>
                        </a>
                        <div class="collapse" id="error">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
                            <span class="menu-title">General Pages</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-medical-bag menu-icon"></i>
                        </a>
                        <div class="collapse" id="general-pages">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/landing-page.html"> Landing Page </a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/profile.html"> Profile </a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/faq.html"> FAQ </a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/faq-2.html"> FAQ 2 </a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/news-grid.html"> News grid </a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/timeline.html"> Timeline </a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/search-results.html"> Search Results </a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/portfolio.html"> Portfolio </a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/user-listing.html"> User Listing </a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#e-commerce" aria-expanded="false" aria-controls="e-commerce">
                            <span class="menu-title">E-commerce</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-shopping menu-icon"></i>
                        </a>
                        <div class="collapse" id="e-commerce">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/email-template.html"> Email Templates </a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/invoice.html"> Invoice </a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/pricing-table.html"> Pricing Table </a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/product-catalogue.html"> Product Catalogue </a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/project-list.html"> Project List </a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/orders.html"> Orders </a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/apps/email.html">
                            <span class="menu-title">E-mail</span>
                            <i class="mdi mdi-email menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/apps/calendar.html">
                            <span class="menu-title">Calendar</span>
                            <i class="mdi mdi-calendar-today menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/apps/gallery.html">
                            <span class="menu-title">Gallery</span>
                            <i class="mdi mdi-image-filter-frames menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://www.bootstrapdash.com/demo/purple/jquery/documentation/documentation.html" target="_blank">
                            <span class="menu-title">Documentation</span>
                            <i class="mdi mdi-file-document-box menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item sidebar-actions">
                        <span class="nav-link">
                            <div class="border-bottom">
                                <h6 class="font-weight-normal mb-3">Projects</h6>
                            </div>
                            <button class="btn btn-block btn-lg btn-gradient-primary mt-4">+ Add a project</button>
                            <div class="mt-4">
                                <div class="border-bottom">
                                    <p class="text-secondary">Categories</p>
                                </div>
                                <ul class="gradient-bullet-list mt-4">
                                    <li>Free</li>
                                    <li>Pro</li>
                                </ul>
                            </div>
                        </span>
                    </li>
                </ul>
            </nav>