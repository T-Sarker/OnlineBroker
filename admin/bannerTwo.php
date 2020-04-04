<?php
	include "inc/header.php"
?>
<?php 
    
    include '../classes/bannerClass.php';

    $abc = new AllBannerClass();

    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['Imgsubmit']) ) {
        
            $insertBanner = $abc->insertBannerTwoImageIntoDB($_POST,$_FILES);
        }
 ?>

<?php
    include "inc/sidebar.php"
?>
    

<div class="page-content">
        <div class="container-default animated fadeInRight"> <br>
            <div class="viewheightWraper" style="height:100vh">
                <h3>Add Banner Info #2</h3>
                <?php
                    if (isset($insertBanner) && $insertBanner != false) {
                        
                        echo $insertBanner;
                    }
                ?>
                <form id="secForm" class="mt-3" action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="files">Banner Images </label>
                        <input type="file" name="files[]" multiple class="form-control" id="files" aria-describedby="files" placeholder="Enter Company Name" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="altText">Banner Name</label>
                        <input type="text" name="altText" class="form-control" id="altText" aria-describedby="altText" placeholder="Enter Image Name" required>
                    </div>
                </div>
            </div>
             <button type="submit" class="btn btn-primary" name="Imgsubmit">Submit</button>
         </form>
                
            </div>
        </div>
        <div class="row footer">
            <div class="col-md-6 text-left"> Copyright &copy; 2017 Foxlabel All rights reserved. </div>
            <div class="col-md-6 text-right"> Design and Developed by Foxlabel </div>
        </div>
    </div>

<?php
    include "inc/rightbar.php"
?>
    
 

<?php
	include "inc/footer.php"
?>
   