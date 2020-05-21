<?php
    include "inc/header.php";
?>
<?php
    include "../classes/companyClass.php";
?>

<?php
    $ac = new AllCompany();

    if (isset($_GET['pause']) && $_GET['pause'] != null) {
        
        $companyUid = Session::get('companyUid');
        $id = $_GET['pause'];

        $pausePackage = $ac->makeStatusPauseForPackage($id,$companyUid);
    }

    if (isset($_GET['unpause']) && $_GET['unpause'] != null) {
        
        $companyUid = Session::get('companyUid');
        $id = $_GET['unpause'];

        $unpausePackage = $ac->makeStatusUnPauseForPackage($id,$companyUid);
    }

    if (isset($_GET['delete']) && $_GET['delete'] != null) {
        
        $companyUid = Session::get('companyUid');
        $id = $_GET['delete'];

        $deletePackage = $ac->deletePackageFromDB($id,$companyUid);
    }
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
                <h3>Manage Packages</h3>
                <?php
                    if (isset($pausePackage) && $pausePackage) {
                        echo $pausePackage;
                    }
                    if (isset($unpausePackage) && $unpausePackage) {
                        echo $unpausePackage;
                    }
                ?>
                <table class="table table-hover">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Image</th>
                      <th scope="col">Package</th>
                      <th scope="col">Price</th>
                      <th scope="col">Discount</th>
                      <th scope="col">Package For</th>
                      <th scope="col">Status</th>
                      <th scope="col">Handle</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                        $companyName = Session::get('company');
                        $companyUid = Session::get('companyUid');
                        $acType = Session::get('acType');

                        $getPackages = $ac->getAllPackagesFromDB($companyName,$companyUid,$acType);

                        if (isset($getPackages) && $getPackages!=false) {
                            $x = 1;
                            while ($package = $getPackages->fetch_assoc()) {
                                
                  ?>
                    <tr>
                      <th scope="row"><?php echo $x++; ?></th>
                      <td style="width:100px;height:60px;">
                        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                            <?php
                                $id = $package['packageUid'];

                                $getImages = $ac->getPackageImagesFromDB($id);

                                if (isset($getImages) && $getImages != false) {
                                    
                                    $z = 1;
                                    while ($img = $getImages->fetch_assoc()) {
                                        
                            ?>
                                <div class="carousel-item <?php echo $z==1 ? 'active':'' ?>">
                                    <img src="<?php echo $img['packageImg'] ?>" class="d-block w-100" alt="<?php echo $img['altText'].$z++; ?>">
                                </div>
                            <?php

                                    }
                                }else{

                                    echo "No Image To Show";
                                }
                            ?>
                            </div>
                        </div>
                    </td>
                      <td><?php echo $package['packageName'] ?></td>
                      <td><?php echo $package['packagePrice'].' ৳' ?></td>
                      <td><?php echo $package['packageDiscount'].' %' ?></td>
                      <td><?php echo $package['packagePerson'] ?></td>
                      <td><?php echo $package['status']==0? '<i class="fa fa-circle text-success" aria-hidden="true"></i>':'<i class="fa fa-circle text-danger" aria-hidden="true"></i>' ?></td>

                      <td>
                          <?php
                                if (isset($package['status']) && $package['status']==0) {
                            ?>
                            <a class="p-2" href="?pause=<?php echo $package['packageUid']; ?>"><i class="fa fa-pause text-primary" aria-hidden="true"></i></a>
                        <?php
                             }else{
                          ?>
                          <a class="p-2" href="?unpause=<?php echo $package['packageUid']; ?>"><i class="fa fa-play text-success" aria-hidden="true"></i></a>
                          <?php
                                }
                          ?>
                          <a class="p-2" href="editPackage.php?edit=<?php echo $package['packageUid']; ?>"><i class="fa fa-pencil-square-o text-warning" aria-hidden="true"></i></a>
                          <a class="p-2" href="?delete=<?php echo $package['packageUid']; ?>"><i class="fa fa-trash-o text-danger" aria-hidden="true"></i></a>
                      </td>
                    </tr>
                    <?php

                            }
                        }
                    ?>
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