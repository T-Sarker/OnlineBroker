<?php
    include "inc/header.php"
?>
<?php 
    
    include '../classes/categoryClass.php';

    $cc = new allCategory();
 ?>

<?php
    if (isset($_GET['pause']) && $_GET['pause'] != null && is_numeric($_GET['pause'])) {
        
        $id = $_GET['pause'];

        $pauseCategory = $cc->pauseCategoryIntoDB($id);
    }


    if (isset($_GET['active']) && $_GET['active'] != null && is_numeric($_GET['active'])) {
        
        $id = $_GET['active'];

        $pauseCategory = $cc->activeCategoryIntoDB($id);
    }


    if (isset($_GET['delete']) && $_GET['delete'] != null && is_numeric($_GET['delete'])) {
        
        $id = $_GET['delete'];

        $pauseCategory = $cc->deleteCategoryIntoDB($id);
    }
?>

<?php
    include "inc/sidebar.php"
?>
<div class="page-content">
    <div class="container-default animated fadeInRight"> <br>
        <div class="viewheightWraper" style="min-height:100vh">
            <h3>Manage Category</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category</th>
                        <th scope="col">Category Id</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $getCategory = $cc->getCategoryFromDB();

                    if (isset($getCategory) && $getCategory != false) {
                        $i =1;
                        
                        while ($cate = $getCategory->fetch_assoc()) {
                            
              ?>
                    <tr style="border-bottom:1px solid #ddd;">
                        <th scope="row" style="vertical-align:middle;">
                            <?php echo $i++; ?>
                        </th>
                        <td style="vertical-align:middle;">
                            <?php echo $cate['category']; ?>
                        </td>
                        <td style="vertical-align:middle;">
                            <?php echo $cate['cateUid']; ?>
                        </td>
                        <td style="vertical-align:middle;">
                            <?php 
                        if ($cate['category']==0) {
                            echo '<span class="badge badge-success">Active</span>';
                        }
                   ?>
                        </td>
                        <td STYLE="width:150px;vertical-align:middle;">
                            <nav aria-label="...">
                                <ul class="pagination pagination-lg">
                                    <li class="page-item">
                                    <?php
                                        if ($cate['status']==0) {
                                    ?>
                                        <a class="page-link" href="?pause=<?php echo $cate['cateId']; ?>"><i class="fa fa-pause" aria-hidden="true" style="color:red;"></i></a>
                                    <?php
                                        }else{
                                    ?>
                                        <a class="page-link" href="?active=<?php echo $cate['cateId']; ?>"><i class="fa fa-play" aria-hidden="true"></i></a>
                                        <?php
                                            }
                                        ?>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="editCategory.php?edit=<?php echo $cate['cateId']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></li>
                                    <li class="page-item"><a class="page-link" href="?delete=<?php echo $cate['cateId']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></li>
                                </ul>
                            </nav>
                        </td>
                    </tr>
                    <?php

                        }
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