<?php
    include "inc/header.php";
?>

<?php 

    include "../classes/branchClass.php";

    $abc = new AllBranchClass();

    if (isset($_GET['delete']) && is_numeric($_GET['delete']) && !empty($_GET['delete'])) {
        
        $id = $_GET['delete'];
        $uid = $_GET['uid'];

        $deleteBranch = $abc->deleteBranchFromDB($id,$uid);
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
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Branch</th>
                    <th scope="col">Image</th>
                    <th scope="col">Email</th>
                    <th scope="col">Location</th>
                    <th scope="col">Offer</th>
                    <th scope="col">Offer Time</th>
                    <th scope="col">Off Day</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $cid = Session::get('companyUid');
                    $getBranchList = $abc->getBranchListFromDB($cid);

                    if (isset($getBranchList) && $getBranchList != false) {
                        
                        $x = 1;
                        while ($branch = $getBranchList->fetch_assoc()) {
                            
                ?>
                <tr>
                    <td style="width:30px;"><?php echo $x++; ?></td>
                    <td style="width:250px;"><?php echo $branch['branchName']; ?></td>
                    <td style="width:150px;height:60px;">
                        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                            <?php
                                $uid = $branch['branchdUid'];

                                $getImages = $abc->getBranchImagesFromDB($uid);

                                if (isset($getImages) && $getImages != false) {
                                    
                                    $z = 1;
                                    while ($img = $getImages->fetch_assoc()) {
                                        
                            ?>
                                <div class="carousel-item <?php echo $z==1 ? 'active':'' ?>">
                                    <img src="<?php echo $img['image'] ?>" class="d-block w-100" alt="<?php echo $img['imageName'].$z++; ?>">
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
                    <td><?php echo $branch['branchEmail']; ?></td>
                    <td><?php echo $branch['branchLocation']; ?></td>
                    <td><?php echo $branch['offerAmount']; ?></td>
                    <td><?php echo $branch['offerTime']; ?></td>
                    <td><?php echo $branch['branchOff']; ?></td>
                    <td>
                        <a href="editBranch.php?edit=<?php echo $branch['branchId']; ?>&&uid=<?php echo $branch['branchdUid'] ?>" class="btn btn-warning"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>

                        <a href="?delete=<?php echo $branch['branchId']; ?>&&uid=<?php echo $branch['branchdUid'] ?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        
                    </td>
                </tr>
                <?php

                        }
                    }else{
                        echo "Nothing To Show";
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