<?php
	include "inc/header.php"
?>

<?php 
    
    include '../classes/bannerClass.php';

    $abc = new AllBannerClass();
?>

<?php
    include "inc/sidebar.php"
?>
    

<div class="page-content">
        <div class="container-default animated fadeInRight"> <br>
            <div class="viewheightWraper" style="min-height:100vh">
                <h3>Manage Banner #1</h3>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Banner Image</th>
                      <th scope="col">Banner Name</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                        $getSlider = $abc->getAllSliderDataFromDB();

                        $x =1;

                        if (isset($getSlider) && $getSlider != false) {
                            
                            while ($banner = $getSlider->fetch_assoc()) {
                               
                  ?>
                    <tr>
                      <th scope="row"><?php echo $x++ ?></th>
                      <td><img src="<?php echo $banner['images']; ?>" alt="<?php echo $banner['sliderName'] ?>" style="width:100px;"></td>
                      <td><?php echo $banner['sliderName'] ?></td>

                    </tr>
                    <?php

                            }
                        }else{
                            echo '<div class="alert alert-danger" role="alert">
                    No Slider Found !
                  </div>';
                        }
                    ?>
                  </tbody>
                </table>
                
            </div>
        </div>
        <div class="row footer">
            <div class="col-md-6 text-left"> Copyright &copy; <?php echo date('Y'); ?> Tapos All rights reserved. </div>
            <div class="col-md-6 text-right"> Developed by Tapos </div>
        </div>
    </div>

<?php
    include "inc/rightbar.php"
?>
    
 

<?php
	include "inc/footer.php"
?>
   