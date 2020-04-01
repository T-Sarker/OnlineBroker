<?php
    include "inc/header.php"
?>

<?php include '../classes/companyClass.php' ?>

<?php
    $cc = new AllCompany();
?>

<?php
    if (isset($_GET['pause']) && $_GET['pause'] != null) {
        
        $id = $_GET['pause'];

        $pauseCompany = $cc->pauseCompanyIntoDB($id);
    }


    if (isset($_GET['active']) && $_GET['active'] != null) {
        
        $id = $_GET['active'];

        $pauseCompany = $cc->activeCompanyIntoDB($id);
    }


    if (isset($_GET['delete']) && $_GET['delete'] != null) {
        
        $id = $_GET['delete'];

        $pauseCompany = $cc->deleteCompanyIntoDB($id);
    }
?>


<?php
    include "inc/sidebar.php"
?>
<div class="page-content">
    <div class="container-default animated fadeInRight"> <br>
        <div class="viewheightWraper" style="height:100vh">
            <h3>Manage Company</h3>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Logo</th>
                        <th scope="col">Company</th>
                        <th scope="col">Owner</th>
                        <th scope="col">Category</th>
                        <th scope="col">Location</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php

                    $getCompanies = $cc->getAllCompaniesFromDB();

                    if (isset($getCompanies) && $getCompanies != false) {
                        
                        while ($company = $getCompanies->fetch_assoc()) {
                            
                ?>
                    <tr>
                        <td><img src="<?php echo $company['image'] ?>" alt="<?php echo $company['company'].' logo' ?>" style="width:60px"></td>
                        <td><?php echo $company['company']; ?></td>
                        <td><?php echo $company['owner']; ?></td>
                        <td><?php 
                                $category = $company['category'];
                                $getCatName = $cc->getThisCategoryName($category);
                                if (isset($getCatName) && $getCatName !=false) {
                                     
                                     while ($cat = $getCatName -> fetch_assoc()) {
                                         
                                         echo "".$cat['category'];
                                     }
                                 } 
                            ?></td>
                        <td><?php echo $company['location']; ?></td>
                        <td><?php echo $company['phone']; ?></td>
                        <td><?php 
                                $status = $company['status']; 

                                if ($status != null && $status==0) {
                                    
                                    echo "Active";
                                }elseif ($status != null && $status > 0) {
                                    
                                    echo "Not Active";
                                }else{
                                    echo "Something Wrong";
                                }

                            ?></td>
                        <td style="vertical-align:middle;">
                            <nav aria-label="...">
                                <ul class="pagination pagination-lg">
                                    <li class="page-item">
                                    <?php
                                        if ($company['status']==0) {
                                    ?>
                                        <a class="page-link p-2" href="?pause=<?php echo $company['companyUid']; ?>"><i class="fa fa-pause" aria-hidden="true" style="color:red;"></i></a>
                                    <?php
                                        }else{
                                    ?>
                                        <a class="page-link p-2" href="?active=<?php echo $company['companyUid']; ?>"><i class="fa fa-play" aria-hidden="true"></i></a>
                                        <?php
                                            }
                                        ?>
                                    </li>
                                    <li class="page-item"><a class="page-link p-2" href="editCompany.php?edit=<?php echo $company['companyUid']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></li>
                                    <li class="page-item"><a class="page-link p-2" href="?delete=<?php echo $company['companyUid']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></li>
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