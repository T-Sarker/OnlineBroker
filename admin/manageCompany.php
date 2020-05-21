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


    if (isset($_GET['search']) && $_GET['search'] != null) {
        
        $search = $_GET['search'];
    }



?>


<?php
    include "inc/sidebar.php"
?>
<style>
    .searchSuggestion{
        display:none;
        justify-content: flex-end;
        align-items: center;
        float: right;
        background: #ddd;
        border:1px solid #eee;
        text-align: center;
        width: 200px;
        position: relative;
    }
    .searchSuggestion ul{
        width: 100%;
        padding: 0px;
        position: absolute;
        background: #ccdce9;
        z-index: 1111;

    }
    .searchSuggestion ul li {
        list-style: none;
        padding: 5px 0px;
        margin-bottom: 2px;
        margin-top: 2px;
        background: #ddd;
    }

    .searchSuggestion ul li:hover{
        border:1px solid;
    }

    .secTable{
        display: none;
    }
</style>
<div class="page-content">
    <div class="container-default animated fadeInRight"> <br>
        <div class="viewheightWraper" style="min-height:100vh">
            
            <div class="row">
                <div class="col-md-4 col-lg-3 col-sm-6 col-xs-12"><h3>Manage Company</h3></div>
                <div class="col-md-8 col-lg-9 col-sm-6 col-xs-12">
                    <form class="form-inline my-2 my-lg-0" style="justify-content: flex-end;align-items: center;">
                      <input class="form-control mr-sm-2" type="text" placeholder="Company Name" name="search" id="companySearch" autocomplete="off" oninput="searchingValue()">
                    </form>
                    <div class="searchSuggestion"  style="" id="searchSuggestion">
                        <ul class="showSuggestion">
                            
                        </ul>
                    </div>
                </div>
            </div>
            <table class="table" style="<?php  echo isset($search) && $search!=null ? 'display:none' : '' ?>">
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

            <table class="table secTable" style="<?php  echo isset($search) && $search!=null ? 'display:inline-table' : '' ?>">
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

                    if (isset($search)) {
                        
                        $getCompaniesx = $cc->getSingleCompaniesFromDB($search);

                        if (isset($getCompaniesx) && $getCompaniesx != false) {
                        
                            while ($companyx = $getCompaniesx->fetch_assoc()) {
                            
                ?>
                    <tr>
                        <td><img src="<?php echo $companyx['image'] ?>" alt="<?php echo $companyx['company'].' logo' ?>" style="width:60px"></td>
                        <td><?php echo $companyx['company']; ?></td>
                        <td><?php echo $companyx['owner']; ?></td>
                        <td><?php 
                                $category = $companyx['category'];
                                $getCatName = $cc->getThisCategoryName($category);
                                if (isset($getCatName) && $getCatName !=false) {
                                     
                                     while ($cat = $getCatName -> fetch_assoc()) {
                                         
                                         echo "".$cat['category'];
                                     }
                                 } 
                            ?></td>
                        <td><?php echo $companyx['location']; ?></td>
                        <td><?php echo $companyx['phone']; ?></td>
                        <td><?php 
                                $status = $companyx['status']; 

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
                                        if ($companyx['status']==0) {
                                    ?>
                                        <a class="page-link p-2" href="?pause=<?php echo $companyx['companyUid']; ?>"><i class="fa fa-pause" aria-hidden="true" style="color:red;"></i></a>
                                    <?php
                                        }else{
                                    ?>
                                        <a class="page-link p-2" href="?active=<?php echo $companyx['companyUid']; ?>"><i class="fa fa-play" aria-hidden="true"></i></a>
                                        <?php
                                            }
                                        ?>
                                    </li>
                                    <li class="page-item"><a class="page-link p-2" href="editCompany.php?edit=<?php echo $companyx['companyUid']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></li>
                                    <li class="page-item"><a class="page-link p-2" href="?delete=<?php echo $companyx['companyUid']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></li>
                                </ul>
                            </nav>
                        </td>
                    </tr>
                    <?php

                                }
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