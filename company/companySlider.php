<?php
    include "inc/header.php";
?>

<?php include "../classes/companyClass.php" ?>

<?php
    $ac = new AllCompany();


    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {

        $id = Session::get('companyUid');
        
        $insertSlider = $ac->insertSliderIntoDB($_FILES,$_POST,$id);
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
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="companySlider.php">Slider</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <h3>Add a Slider</h3>
                <?php
                    if (isset($insertSlider)) {
                        echo $insertSlider;
                    }
                ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="files">Slider Images</label>
                        <input type="file" name="files[]" id="BranchImage" class="form-control" multiple>
                        <small id="imageResult">Image Size:800px X 600px</small>
                    </div>
                    <div class="form-group">
                        <label for="name">Image Name</label>
                        <input type="text" name="imageName" id="name" class="form-control" >
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