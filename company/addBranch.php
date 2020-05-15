<?php include "inc/header.php"; ?>

<?php include '../classes/branchClass.php'; ?>

<?php
    $abc = new AllBranchClass();
?>

<?php
    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
        
        $insertBranchDetails = $abc->insertBranchDetailsIntoDB($_POST,$_FILES);

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
                    <h3 class="mb-3">Add A New Branch</h3>
                    <?php
                        if (isset($insertBranchDetails)) {
                            
                            if ($insertBranchDetails==2) {
                              echo '<div class="alert alert-success" role="alert">
                                      Successfull 
                                    </div>';
                            }elseif ($insertBranchDetails==1) {
                              echo '<div class="alert alert-danger" role="alert">
                                  Something Went Wrong. Upload Failed !
                                </div>';
                            }else{
                              echo $insertBranchDetails;
                            }
                        }
                    ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                      <div class="form-row mb-3">
                        <div class="col">
                          <label for="colFormLabelSm" class=" col-form-label col-form-label-sm">Branch Name</label>
                          <input type="text" class="form-control" name="branchName" value="<?php if(isset($_POST["branchName"]) && $insertBranchDetails!=2) echo $_POST["branchName"]; ?>" placeholder="Branch Name">
                        </div>
                        <div class="col">
                        <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Branch Email</label>
                          <input type="text" class="form-control" name="branchEmail" value="<?php if(isset($_POST["branchEmail"]) && $insertBranchDetails!=2) echo $_POST["branchEmail"]; ?>" placeholder="Branch Email">
                        </div>
                      </div>

                      
                      <div class="form-row mb-3">
                        <div class="col">
                        <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Branch Location</label>
                          <input type="text" class="form-control" name="branchLocation" value="<?php if(isset($_POST["branchLocation"]) && $insertBranchDetails!=2) echo $_POST["branchLocation"]; ?>" placeholder="Example: mirpur">
                        </div>
                        <div class="col">
                        <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Branch Address</label>
                          <input type="text" class="form-control" name="branchAddress" value="<?php if(isset($_POST["branchAddress"]) && $insertBranchDetails!=2) echo $_POST["branchAddress"]; ?>" placeholder="Example:House 2/A,road:d,mirpur 13,Dhaka">
                        </div>
                      </div>

                      
                      <div class="form-row mb-3">
                        <div class="col">
                        <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Branch Latitude</label>
                          <input type="text" class="form-control" name="branchlatitude" value="<?php if(isset($_POST["branchlatitude"]) && $insertBranchDetails!=2) echo $_POST["branchlatitude"]; ?>" placeholder="Branch Latitude">
                        </div>
                        <div class="col">
                        <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Branch Longitude</label>
                          <input type="text" class="form-control" name="branchlongitude" value="<?php if(isset($_POST["branchlongitude"]) && $insertBranchDetails!=2) echo $_POST["branchlongitude"]; ?>" placeholder="Branch Longitude">
                        </div>
                      </div>

                      
                      <div class="form-row mb-3">
                        <div class="col">
                        <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Branch Username</label>
                          <input type="text" class="form-control" name="branchUsername" value="<?php if(isset($_POST["branchUsername"]) && $insertBranchDetails!=2) echo $_POST["branchUsername"]; ?>" placeholder="Example: Tapos_branch_1">
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
                          <input type="text" class="form-control" name="altText" value="<?php if(isset($_POST["altText"]) && $insertBranchDetails!=2) echo $_POST["altText"]; ?>" placeholder="Image Name ( Optimize Perpous )">
                        </div>
                      </div>

                      <div class="form-row mb-3">
                        <div class="col">
                        <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Offer Amount In %</label>
                          <input type="text" class="form-control" name="offerAmount" value="<?php if(isset($_POST["offerAmount"]) && $insertBranchDetails!=2) echo $_POST["offerAmount"]; ?>" placeholder="Example: 45%">
                        </div>
                      </div>


                      <div class="form-row mb-3">
                        <div class="col">
                        <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Business Time</label>
                          <input type="text" class="form-control" name="BranchTime" value="<?php if(isset($_POST["BranchTime"]) && $insertBranchDetails!=2) echo $_POST["BranchTime"]; ?>" placeholder="Example: 9.00am-10.00pm">
                        </div>
                        <div class="col">
                        <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Branch Off Day</label>
                          <select class="form-control" name="branchOff">
                            <option value="Saterday">Saterday</option>
                            <option value="Sunday">Sunday</option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                          </select>
                        </div>
                      </div>


                      <div class="form-row mb-3">
                        <div class="col-6">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="offerTime" id="timeRadio1" value="0" onchange="SetOfferTime(1)" checked>
                            <label class="form-check-label" for="timeRadio1">
                              Offer Runs Always
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio"  id="check2" name="offerTime" value="1" onchange="SetOfferTime(0)" >
                            <label class="form-check-label" for="exampleRadios2">
                              Choose Offer Time
                            </label>
                          </div>
                        </div>
                      </div>


                      <div class="form-row mb-3 offerDateForm">
                        <div class="col">
                        <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Offer Start</label>
                          <input type="date" class="form-control" name="offerStart">
                        </div>
                        <div class="col">
                        <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Offer End</label>
                          <input type="date" class="form-control" name="offerEnd">
                        </div>
                      </div>
                      <button type="submit" class="btn btn-success" id="addBranch" name="submit">Submit</button>
                    </form>
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