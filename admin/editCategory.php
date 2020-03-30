<?php
	include "inc/header.php"
?>
<?php 
	
	include '../classes/categoryClass.php';

	$cc = new allCategory();
 ?>
<?php
    include "inc/sidebar.php"
?>

<?php

    if (isset($_GET['edit']) && is_numeric($_GET['edit']) && !empty($_GET['edit'])) {
        
        $id = $_GET['edit'];
    }

	if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
		
		$category = $_POST['category'];

		$insertCate = $cc->updateCategoryIntoDB($category,$id);
	}
?>

<div class="page-content">
    <div class="container-default animated fadeInRight"> <br>
        <div class="viewheightWraper" style="height:100vh">
            <h3>Update Category</h3>
            <?php
            	
                $getOneCategory = $cc->getSingleCategoryFromDB($id);

                if (isset($getOneCategory) && $getOneCategory != false) {
                    
                    while ($getCat = $getOneCategory->fetch_assoc()) {
                        

            ?>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="categoryName">Category</label>
                    <input type="text" class="form-control p-2" id="categoryName" name="category" value="<?php echo $getCat['category'] ?>">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success" name="submit" >Submit </button>
                </div>
            </form>
            <?php

                    }
                }
            ?>
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