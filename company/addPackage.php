<?php
    include "inc/header.php";
?>
<?php
    include "../classes/companyClass.php";
?>

<?php
    $ac = new AllCompany();

    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {

        $companyName = Session::get('company');
        $companyUid = Session::get('companyUid');
        $acType = Session::get('acType');
        
        $insertPackage = $ac->insertPackageIntoDB($_FILES,$_POST,$companyName,$companyUid,$acType);
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
                <h3>Add A Package</h3>

                <?php
                    if (isset($insertPackage) && gettype($insertPackage)=='string') {
                        
                        echo $insertPackage;
                    }elseif (isset($insertPackage) && is_int($insertPackage)) {
                       
                       echo "<span class='alert alert-success'>Successfull</span>";
                    }
                ?>

                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="packageName">Package Name</label>
                        <input type="text" name="packageName" id="packageName" class="form-control" value="<?php echo isset($insertPackage) && gettype($insertPackage)=='string'? $_POST['packageName']:'' ?>" placeholder="Package Name">
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="files">Package Images</label>
                            <input type="file" name="pckImage[]" id="BranchImage" class="form-control" multiple>
                            <small id="imageResult">Image Size:800px X 600px</small>
                        </div>
                        <div class="form-group col">
                            <label for="name">Image Name</label>
                            <input type="text" name="imageName" id="name" value="<?php echo isset($insertPackage) && gettype($insertPackage)=='string'? $_POST['imageName']:'' ?>" class="form-control" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="packageDetails">Package Details</label>
                        <textarea name="packageDetails" id="packageDetails" class="form-control" rows="3" placeholder="Package Details"><?php echo isset($insertPackage) && gettype($insertPackage)=='string'? $_POST['packageDetails']:'' ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="packagePrice">Package Price <b>(Without Discount)</b></label>
                        <input type="text" name="packagePrice" id="packagePrice" value="<?php echo isset($insertPackage) && gettype($insertPackage)=='string'? $_POST['packagePrice']:'' ?>" class="form-control" placeholder="Example: 20030">
                    </div>
                    <div class="form-group">
                        <label for="packageDiscount">Package Discount <b>(Without % Sign) <small class="text-success"><em>Optional</em></small></b></label>
                        <input type="text" name="packageDiscount" id="packageDiscount" value="<?php echo isset($insertPackage) && gettype($insertPackage)=='string'? $_POST['packageDiscount']:0 ?>" class="form-control" placeholder="Example: 40">
                    </div>
                    <div class="form-group">
                        <label for="packagePeople">Package Contains People</label>
                        <input type="text" name="packagePeople" id="packagePeople" value="<?php echo isset($insertPackage) && gettype($insertPackage)=='string'? $_POST['packagePeople']:'' ?>" class="form-control" placeholder="Examplae: 2 person">
                    </div>
                    <button type="submit" class="btn btn-success" id="addPackage" name="submit">Submit</button>
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