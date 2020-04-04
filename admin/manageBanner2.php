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
            <div class="viewheightWraper" style="height:100vh">
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
                        $getBannerOne = $abc->getAllBannerTwoDataFromDB();

                        $x =1;

                        if (isset($getBannerOne) && $getBannerOne != false) {
                            
                            while ($banner = $getBannerOne->fetch_assoc()) {
                               
                  ?>
                    <tr>
                      <th scope="row"><?php echo $x++ ?></th>
                      <td><img src="<?php echo $banner['images']; ?>" alt="<?php echo $banner['bannerName'] ?>" style="width:100px;"></td>
                      <td><?php echo $banner['bannerName'] ?></td>

                    </tr>
                    <?php

                            }
                        }else{
                            echo "Nothing to Show!";
                        }
                    ?>
                  </tbody>
                </table>
                
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
   