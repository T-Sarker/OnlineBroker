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
	if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
		
		$category = $_POST['category'];

		$insertCate = $cc->insertCategoryIntoDB($category);
	}
?>

<div class="page-content">
    <div class="container-default animated fadeInRight"> <br>
        <div class="viewheightWraper" style="height:100vh">
            <h3>Add Category</h3>
            <?php
            	if (isset($insertCate)) {
            		echo $insertCate;
            	}
            ?>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="categoryName">Category</label>
                    <input type="text" class="form-control p-2" id="categoryName" name="category" placeholder="Category Name">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success" name="submit" >Submit </button>
                </div>
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