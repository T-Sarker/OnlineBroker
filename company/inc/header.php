<?php   
    include "../lib/session.php";
    Session::checkLogin();
    date_default_timezone_set("Asia/Dhaka");
?>

<?php include '../config/config.php'; ?>
<?php include '../lib/database.php'; ?>
<?php include '../helpers/formats.php'; ?>

<?php include '../classes/companyLogin.php'; ?>
<?php include '../classes/orderClass.php'; ?>

<?php

  $cl = new CompanyLogin();
  $aoc = new AllOrderClass();
?>

<?php
    $af= new Format();
?>

<?php
    include "../classes/bookingClass.php";

    $bc = new BookingClass();

    $fee = Session::get('fee');
?>

<?php
    if (Session::get('CompanyLogin') != true && empty($_COOKIE['companyId'])) {
        
        echo "<script>window.location.href = 'login.php';</script>";
    }

    if (isset($_GET['action'])) {
        if ($_GET['action']=='logout') {
        // Session::destroy();
        unset($_SESSION['company']);
        unset($_SESSION['companyUid']);
        Session::set('CompanyLogin','false');
        echo "<script>window.location.href = 'login.php';</script>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>

<body>

 
    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.php">
                    <b class="logo-abbr">Tapos </b>
                    <span class="logo-compact">Tapos</span>
                    <span class="brand-title">
                        <h1>Tapos</h1>
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="fa fa-arrows-h"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    <div class="input-group icons">
                        <!-- <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="fa fa-search"></i></span>
                        </div>
                        <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                        <div class="drop-down animated flipInX d-md-none">
                            <form action="#">
                                <input type="text" class="form-control" placeholder="Search">
                            </form>
                        </div> -->
                        <h2>WELCOME <?php echo Session::get('company'); ?></h2>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown" data-toggle="tooltip" data-placement="bottom" title="Message">
                                <i class="fa fa-envelope"></i>
                                <span class="badge badge-pill gradient-1">3</span>
                            </a>
                            <div class="drop-down  dropdown-menu">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class="">3 New Messages</span>  
                                    <a href="javascript:void()" class="d-inline-block">
                                        <span class="badge badge-pill gradient-1">3</span>
                                    </a>
                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li class="notification-unread">
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/1.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Saiful Islam</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="notification-unread">
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/2.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Adam Smith</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Can you do me a favour?</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/3.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Barak Obama</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/4.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Hilari Clinton</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hello</div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </li>

                        <?php
                            if (Session::get('acType') != null && Session::get('acType')=='d3') {
                        ?>
                        <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown" data-toggle="tooltip" data-placement="bottom" title="Payment Confirm">
                                <i class="fa fa-heart"></i>
                                <span class="badge badge-pill gradient-2" id="d3numNotification2"></span>
                            </a>
                            <div class="drop-down  dropdown-menu dropdown-notfication">
                                
                                <div class="dropdown-content-body">
                                    <ul id="d3Notification2" style="max-height:300px;overflow-y: scroll;">
                                        
                                        
                                    </ul>
                                    <div class="text-center">
                                        <a href="monthlyPayConfirm.php" class="mr-auto">SEE ALL</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php
                                }
                        ?>


                        <?php
                            if (Session::get('acType') != null && Session::get('acType')=='d3') {
                        ?>
                        <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown" data-toggle="tooltip" data-placement="bottom" title="Notification" onclick="notificationSeen()">
                                <i class="fa fa-bell"></i>
                                <span class="badge badge-pill gradient-2" id="d3numNotification"></span>
                            </a>
                            <div class="drop-down  dropdown-menu dropdown-notfication">
                                
                                <div class="dropdown-content-body">
                                    <ul id="d3Notification" style="max-height:300px;overflow-y: scroll;">
                                        
                                        
                                    </ul>
                                    <div class="text-center">
                                        <a href="bookingOrders.php" class="mr-auto">SEE ALL</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php
                                }
                        ?>
                        <?php

                            $id = Session::get('companyUid');
                            $getLoginDetails = $cl->getLogedInUsersDetail($id);

                            if (isset($getLoginDetails) && $getLoginDetails != false) {
                                
                                while ($loginDetails = $getLoginDetails->fetch_assoc()) {
                                    
                        ?>
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="https://www.pngkit.com/png/full/824-8246267_time-left-user-icon-round-png.png" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile  dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <i class="icon-user"></i> <span><?php echo $loginDetails['company'] ?></span>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <i class="fa fa-envelope-open"></i> <span>Inbox</span> <div class="badge gradient-3 badge-pill gradient-1">3</div>
                                            </a>
                                        </li>
                                        
                                        <hr class="my-2">
                                        <li>
                                            <a href="companyProfile.php"><i class="fa fa-bell-o"></i> <span>Profile</span></a>
                                        </li>
                                        <li><a href="?action=logout"><i class="fa fa-lock"></i> <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <?php

                                }
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->