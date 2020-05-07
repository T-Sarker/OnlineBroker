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

              $uid = Session::get('branchUid');
              $getBranch = $bc->getBranchDetailsFromDB($uid);

              if (isset($getBranch) && $getBranch != false) {
                while ($branch = $getBranch->fetch_assoc()) {
                  
            ?>      
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                      <div class="carousel-inner">
                        <?php
                            $id = $branch['branchdUid'];
                            $getImage = $bc->getBranchImagesFromDB($id);

                            if (isset($getImage) && $getImage != false) {

                                $x =1;                                
                                while($images = $getImage->fetch_assoc()){

                        ?>
                        <div class="carousel-item  <?php echo $x==1? 'active':''; ?>">
                          <img src="<?php echo $images['image'] ?>" class="d-block w-50" alt="...">
                        </div>
                        <?php
                                $x++;
                                }
                            }
                        ?>
                      </div>
                    </div>
                    <div class="media mt-4">
                        <div class="media-body">
                            <h5 class="mt-0"><?php echo $branch['branchName'] ?></h5>
                            <small><?php echo $branch['branchdUid'] ?></small>
                        </div>
                    </div>
                    <hr>
                    <div class="details">
                        <h4 class="mt-4 mb-3">Branch Details</h4>
                        <table class="table mt-4 ml-4">
                            <tbody>
                                <tr>
                                    <td><h6>Email :</h6></td>
                                    <td><?php echo $branch['branchEmail'] ?></td>
                                </tr>
                                <tr>
                                    <td><h6>Username :</h6></td>
                                    <td><?php echo $branch['branchUsername'] ?></td>
                                </tr>
                                <tr>
                                    <td><h6>Location :</h6></td>
                                    <td><?php echo $branch['branchLocation'] ?></td>
                                </tr>
                                <tr>
                                    <td><h6>Address :</h6></td>
                                    <td><?php echo $branch['branchAddress'] ?></td>
                                </tr>
                                <tr>
                                    <td><h6>Offer :</h6></td>
                                    <td><?php echo $branch['offerAmount'] ?></td>
                                </tr>
                                <tr>
                                    <td><h6>Branch Time :</h6></td>
                                    <td><?php echo $branch['BranchTime'] ?></td>
                                </tr>
                                <tr>
                                    <td><h6>Off Day :</h6></td>
                                    <td><?php echo $branch['branchOff'] ?></td>
                                </tr>
                                <tr>
                                    <td><h6>Offer Duration :</h6></td>
                                    <td>
                                      <?php
                                          if ($branch['offerTime']==0) {
                                            echo "Offer Is Active Always";
                                          }else{

                                            echo $branch['offerStart'].' <b>To</b> '.$branch['offerEnd'];
                                          }
                                      ?>
                                    </td>
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