<?php

class allCategory{

	private $db;
	private $fm;
	
	function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}


	public function insertCategoryIntoDB($category){

		$category = $this->fm->validator($category);
		$category = mysqli_real_escape_string($this->db->link,$category);

		$cateUid = substr(md5($category),rand(0,4),10);

		$query = "INSERT INTO tbl_category(category,cateUid,status) VALUES('$category','$cateUid',0)";

		$result = $this->db->insert($query);

		if (isset($result) && !empty($result) && $result !=false) {
			
			return '<div class="alert alert-success" role="alert">
				  	Successfull
				  </div>';
		}else{

			return '<div class="alert alert-danger" role="alert">
				  Something Went Wrong !
				</div>';
		}
	}


	public function getCategoryFromDB(){
		
		$query ="SELECT * FROM tbl_category ORDER BY cateId DESC";

		$result = $this->db->select($query);

		if (isset($result) && !empty($result) && $result !=false) {
			
			return $result;
		}else{

			return '<div class="alert alert-danger" role="alert">
				  Something Went Wrong !
				</div>';
		}
	}


	public function pauseCategoryIntoDB($id){

		$id = $this->fm->validator($id);
		$id = mysqli_real_escape_string($this->db->link,$id);

		$query = "UPDATE tbl_category SET status=1 WHERE cateId='$id'";

		$result = $this->db->update($query);

		if (isset($result) && !empty($result) && $result !=false) {
			
			echo "<script>window.location.href = 'manageCategory.php';</script>";
		}else{

			return '<div class="alert alert-danger" role="alert">
				  Something Went Wrong !
				</div>';
		}
	}


	public function activeCategoryIntoDB($id){

		$id = $this->fm->validator($id);
		$id = mysqli_real_escape_string($this->db->link,$id);

		$query = "UPDATE tbl_category SET status=0 WHERE cateId='$id'";

		$result = $this->db->update($query);

		if (isset($result) && !empty($result) && $result !=false) {
			
			echo "<script>window.location.href = 'manageCategory.php';</script>";
		}else{

			return '<div class="alert alert-danger" role="alert">
				  Something Went Wrong !
				</div>';
		}
	}


	public function deleteCategoryIntoDB($id){

		$id = $this->fm->validator($id);
		$id = mysqli_real_escape_string($this->db->link,$id);

		$query = "DELETE FROM tbl_category WHERE cateId='$id'";

		$result = $this->db->delete($query);

		if (isset($result) && !empty($result) && $result !=false) {
			
			echo "<script>window.location.href = 'manageCategory.php';</script>";
		}else{

			return '<div class="alert alert-danger" role="alert">
				  Something Went Wrong !
				</div>';
		}
	}

	public function getSingleCategoryFromDB($id){

		$id = $this->fm->validator($id);
		$id = mysqli_real_escape_string($this->db->link,$id);

		$query = "SELECT * FROM tbl_category WHERE cateId='$id'";

		$result = $this->db->select($query);

		if (isset($result) && !empty($result) && $result !=false) {
			
			return $result;
		}else{

			return false;
		}
	}

	public function updateCategoryIntoDB($category,$id){

		$category = $this->fm->validator($category);
		$category = mysqli_real_escape_string($this->db->link,$category);

		$id = $this->fm->validator($id);
		$id = mysqli_real_escape_string($this->db->link,$id);

		$query = "UPDATE tbl_category SET category='$category' WHERE cateId='$id'";

		$result = $this->db->update($query);

		if (isset($result) && !empty($result) && $result !=false) {
			
			echo "<script>window.location.href = 'manageCategory.php';</script>";
		}else{

			return '<div class="alert alert-danger" role="alert">
				  Something Went Wrong !
				</div>';
		}
	}
}

?>