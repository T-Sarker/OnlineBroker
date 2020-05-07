<?php include "inc/header.php"; ?>

<?php include '../classes/branchClass.php'; ?>

<?php
    $abc = new AllBranchClass();
?>

<?php

    if (isset($_GET['edit']) && is_numeric($_GET['edit']) && !empty($_GET['edit'])) {
        
        $id = $_GET['edit'];
        $uid = $_GET['uid'];

        $getSignleBranchData = $abc->getSignleBranchDataFromDB($id);


    }

    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {

        $updateBranchDetails = $abc->updateBranchDetailsIntoDB($_POST,$_FILES,$uid,$id);

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
                    <h3 class="mb-3">Edit A Branch</h3>
                    <?php
                        if (isset($$updateBranchDetails)) {
                          echo $updateBranchDetails;
                            
                            // if ($insertBranchDetails==2) {
                            //   echo '<div class="alert alert-success" role="alert">
                            //           Successfull 
                            //         </div>';
                            // }elseif ($insertBranchDetails==1) {
                            //   echo '<div class="alert alert-danger" role="alert">
                            //       Something Went Wrong. Upload Failed !
                            //     </div>';
                            // }else{
                            //   echo $insertBranchDetails;
                            // }
                        }
                    ?>
                    <?php
                          if (isset($getSignleBranchData) && $getSignleBranchData != false) {

                              while ($branch = $getSignleBranchData->fetch_assoc()) {
                                

                    ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                      <div class="form-row mb-3">
                        <div class="col">
                          <label for="colFormLabelSm" class=" col-form-label col-form-label-sm">Branch Name</label>
                          <input type="text" class="form-control" name="branchName" value="<?php echo $branch['branchName']; ?>" placeholder="Branch Name">
                        </div>
                        <div class="col">
                        <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Branch Email</label>
                          <input type="text" class="form-control" name="branchEmail" value="<?php echo $branch['branchEmail']; ?>" placeholder="Branch Email">
                        </div>
                      </div>

                      
                      <div class="form-row mb-3">
                        <div class="col">
                        <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Branch Location</label>
                          <input type="text" class="form-control" name="branchLocation" value="<?php echo $branch['branchLocation'];; ?>" placeholder="Example: mirpur">
                        </div>
                        <div class="col">
                        <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Branch Address</label>
                          <input type="text" class="form-control" name="branchAddress" value="<?php echo $branch['branchAddress']; ?>" placeholder="Example:House 2/A,road:d,mirpur 13,Dhaka">
                        </div>
                      </div>

                      <div class="form-row mb-3">
                        <div class="col">
                        <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Branch Latitude</label>
                          <input type="text" class="form-control" name="branchlatitude" value="<?php echo $branch['branchlatitude']; ?>" placeholder="Branch Latitude">
                        </div>
                        <div class="col">
                        <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Branch Longitude</label>
                          <input type="text" class="form-control" name="branchlongitude" value="<?php echo $branch['branchlongitude']; ?>" placeholder="Branch Longitude">
                        </div>
                      </div>
                      
                      <div class="form-row mb-3">
                        <div class="col">
                        <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Branch Username</label>
                          <input type="text" class="form-control" name="branchUsername" value="<?php echo $branch['branchUsername'] ?>" placeholder="Username">
                        </div>
                        <div class="col">
                        <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Branch Password</label>
                          <input type="password" class="form-control" name="branchPassword" placeholder="Password">
                        </div>
                      </div>

                      
                      
                      <div class="form-row mb-3">
                        <div class="col">
                        <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Branch Image</label>
                          <input type="file" class="form-control" id="BranchImage" name="files[]" multiple>
                          <small id="imageResult">Image Size:800px X 600px</small>
                        </div>
                        <div class="col">
                        <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Image Name</label>
                        <?php

                            $id = $branch['branchdUid'];
                            $getalt = $abc->getAltTextFromDB($id);
                        ?>
                          <input type="text" class="form-control" name="altText" value="<?php echo $getalt; ?>" placeholder="Image Name ( Optimize Perpous )">
                        </div>
                      </div>

                      <div class="form-row mb-3">
                        <div class="col">
                        <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Offer Amount In %</label>
                          <input type="text" class="form-control" name="offerAmount" value="<?php echo $branch['offerAmount']; ?>" placeholder="Example: 45%">
                        </div>
                      </div>


                      <div class="form-row mb-3">
                        <div class="col">
                        <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Business Time</label>
                          <input type="text" class="form-control" name="BranchTime" value="<?php echo $branch['BranchTime'];; ?>" placeholder="Example: 9.00am-10.00pm">
                        </div>
                        <div class="col">
                        <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Branch Off Day</label>
                          <select class="form-control" name="branchOff">
                            <option value="Saterday" <?php echo $branch['branchOff']=='Saterday' ? 'selected':'' ?>>Saterday</option>
                            <option value="Sunday" <?php echo $branch['branchOff']=='Sunday' ? 'selected':'' ?>>Sunday</option>
                            <option value="Monday" <?php echo $branch['branchOff']=='Monday' ? 'selected':'' ?>>Monday</option>
                            <option value="Tuesday" <?php echo $branch['branchOff']=='Tuesday' ? 'selected':'' ?>>Tuesday</option>
                            <option value="Wednesday" <?php echo $branch['branchOff']=='Wednesday' ? 'selected':'' ?>>Wednesday</option>
                            <option value="Thursday" <?php echo $branch['branchOff']=='Thursday' ? 'selected':'' ?>>Thursday</option>
                            <option value="Friday" <?php echo $branch['branchOff']=='Friday' ? 'selected':'' ?>>Friday</option>
                          </select>
                        </div>
                      </div>


                      <div class="form-row mb-3">
                        <div class="col-6">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="offerTime" id="timeRadio1" value="0" onchange="SetOfferTime(1)" <?php echo $branch['offerTime']==0 ? 'checked':'' ?>>
                            <label class="form-check-label" for="timeRadio1">
                              Offer Runs Always
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio"  id="check2" name="offerTime" value="1" onchange="SetOfferTime(0)" <?php echo $branch['offerTime']==1 ? 'checked':'' ?>>
                            <label class="form-check-label" for="exampleRadios2">
                              Choose Offer Time
                            </label>
                          </div>
                        </div>
                      </div>


                      <div class="form-row mb-3 offerDateForm">
                        <div class="col">
                        <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Offer Start</label>
                          <input type="date" class="form-control" name="offerStart" value="<?php echo $branch['offerStart']; ?>">
                        </div>
                        <div class="col">
                        <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Offer End</label>
                          <input type="date" class="form-control" name="offerEnd" value="<?php echo $branch['offerEnd']; ?>">
                        </div>
                      </div>
                      <button type="submit" class="btn btn-success" id="addBranch" name="submit">Submit</button>
                    </form>
                    <?php

                              }
                          }else{
                            echo "No Data found With Id ".$id;
                          }
                    ?>
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