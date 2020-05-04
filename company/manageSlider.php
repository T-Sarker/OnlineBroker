<?php
    include "inc/header.php";
?>

<?php include "../classes/companyClass.php" ?>

<?php
    $ac = new AllCompany();
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
                <div class="row">
                    <div class="col-4">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                    <?php
                        $uid = Session::get('companyUid');

                        $slider = $ac->getSliderData($uid);

                        if (isset($slider) && $slider != false) {
                            $x=1;
                            while ($slide = $slider->fetch_assoc()) {
                                
                    ?>
                    <div class="carousel-item <?php echo $x==1? 'active':''; ?>">
                      <img src="<?php echo $slide['image'] ?>" class="d-block" alt="<?php echo $slide['imageName'] ?>" style="width:100%;">
                    </div>
                    <?php
                            $x++;
                            }
                        }else{
                            echo "No Slider Found";
                        }
                    ?>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
                    </div>
                </div>
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