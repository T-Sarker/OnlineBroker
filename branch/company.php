<?php include "inc/header.php" ?>
<?php include '../classes/branchClass.php' ?>
<?php
    $bc = new AllBranchClass();
?>

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
                    <?php

              $uid = Session::get('companyUid');
              $getCompany = $bc->getCompanyDetailsInBranchFromDB($uid);

              if (isset($getCompany) && $getCompany != false) {
                while ($company = $getCompany->fetch_assoc()) {
                  
            ?>
                    <div class="media">
                        <img src="<?php echo '../'.$company['image'] ?>" class="mr-3" style="width:100px" alt="<?php echo $company['pxcompany'] ?>">
                        <div class="media-body">
                            <h5 class="mt-0"><?php echo $company['company'] ?></h5>
                            <small><?php echo $company['companyUid'] ?></small>
                        </div>
                    </div>
                    <hr>
                    <div class="details">
                        <h4 class="mt-4 mb-3">Company Details</h4>
                        <table class="table mt-4 ml-4">
                            <tbody>
                                <tr>
                                    <td><h6>Owner :</h6></td>
                                    <td><?php echo $company['owner'] ?></td>
                                </tr>
                                <tr>
                                    <td><h6>Email :</h6></td>
                                    <td><?php echo $company['email'] ?></td>
                                </tr>
                                <tr>
                                    <td><h6>Phone :</h6></td>
                                    <td><?php echo $company['phone'] ?></td>
                                </tr>
                                <tr>
                                    <td><h6>Location :</h6></td>
                                    <td><?php echo $company['location'] ?></td>
                                </tr>
                                <tr>
                                    <td><h6>Address :</h6></td>
                                    <td><?php echo $company['companyUid'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <?php

                          }
                        }else{
                          echo "<span class='alert alert-danger'>No Company To Show!</span>";
                        }
                    ?>
                </div>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <?php include 'inc/footer.php' ?>