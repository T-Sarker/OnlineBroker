<?php   
    include "../lib/session.php";
    Session::checkLogin();
?>

<?php include '../config/config.php'; ?>
<?php include '../lib/database.php'; ?>
<?php include '../helpers/formats.php'; ?>

<?php
    $af= new Format();
?>
<?php
    if (Session::get('branchLogin') != true && empty($_COOKIE['branchUid'])) {
        
        echo "<script>window.location.href = '../company/login.php';</script>";
    }

    if (isset($_GET['action'])) {
        if ($_GET['action']=='logout') {
        // Session::destroy();
        unset($_SESSION['branch']);
        unset($_SESSION['branchUid']);
        unset($_SESSION['companyUid']);
        Session::set('branchLogin','false');
        echo "<script>window.location.href = '../company/login.php';</script>";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />

    <link rel="stylesheet" href="assets/css/style.css" />
    <!-- End layout styles -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>
