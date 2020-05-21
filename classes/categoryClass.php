<?php

class allCategory{

	private $db;
	private $fm;
	
	function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}


	public function insertCategoryIntoDB($post,$files){

		$category = $this->fm->validator($post['category']);
        $category = mysqli_real_escape_string($this->db->link, $category);

		$cateUid = substr(md5($category),rand(0,4),10);

		$check = "SELECT * FROM tbl_category WHERE category='$category'";
		$checkResult = $this->db->select($check);

		if (isset($checkResult) && $checkResult!=false) {
			
			return '<div class="alert alert-danger" role="alert">
				  '.$category.' Category Already Exists!!
				</div>';
		}else{

			$p = $_FILES['categoryImage']['size'];
			

			if (empty($category)) {
                return '<div class="alert alert-danger" role="alert">
                                      Fill The Input Field Carefully!
                                    </div>';
            } else {

            	if ($p==0) {

                	return '<div class="alert alert-danger" role="alert">
                                      Fill The Input Field Carefully!
                                    </div>';
                }else{

	                $uploadDirectory = "../uploads/";
	                $errors = []; // Store all foreseen and unforseen errors here
	                $fileExtensions = ['jpeg', 'jpg', 'png','JPG','PNG','JPEG']; // Get all the file extensions
	                $fileName = $files['categoryImage']['name'];
	                $fileSize = $files['categoryImage']['size'];
	                $fileTmpName = $files['categoryImage']['tmp_name'];
	                $fileType = $files['categoryImage']['type'];
	                $uploadPath = $uploadDirectory . basename($fileName);
	                $fileType = pathinfo($uploadPath, PATHINFO_EXTENSION);
	                if (!in_array($fileType, $fileExtensions) && $fileSize > 2000000) {
	                    return "This file size or extension is not allowed.";
	                } else {
	                    $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
	                    $query = "INSERT INTO tbl_category(category,image,cateUid,status) VALUES('$category','$uploadPath','$cateUid',0)";
	                    $result = $this->db->insert($query);
	                    if ($result && $didUpload && $result != false) {
	                        return '<div class="alert alert-success" role="alert">
	                                      Successfull
	                                    </div>';
	                    } else {
	                        return '<div class="alert alert-danger" role="alert">
	                                      Something Went Wrong! Upload Failed.
	                                    </div>';
	                    }
	                }
	            }
        	}
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
        $id = mysqli_real_escape_string($this->db->link, $id);
        $query = "SELECT * FROM tbl_category WHERE cateId='$id'";
        $result = $this->db->select($query);
        if ($result && $result != false) {
            while ($imgs = $result->fetch_assoc()) {
                $img = $imgs['image'];
                $imgName = chop($img, 'uploads/');
                $unLink = unlink($imgName);
                $query1 = "DELETE FROM tbl_category WHERE cateId='$id'";
                $res = $this->db->delete($query1);
                if ($res && $res != false) {
                    echo "<script>window.location.href = 'manageCompany.php';</script>";
                } else {
                    echo "Couldnot Delete!!";
                }
            }
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

	public function updateCategoryIntoDB($post,$files,$id){

		$category = $this->fm->validator($post['category']);
        $category = mysqli_real_escape_string($this->db->link, $category);

		$id = $this->fm->validator($id);
		$id = mysqli_real_escape_string($this->db->link,$id);

		$p = $_FILES['categoryImage']['size'];

		if ($p==0) {
			
			$query = "UPDATE tbl_category SET category='$category' WHERE cateId='$id'";

			$result = $this->db->update($query);
			if ($result && $result != false) {
                echo "<script>window.location.href = 'manageCategory.php';</script>";
            } else {
                return '<div class="alert alert-danger" role="alert">
                              Something Went Wrong! Upload Failed.
                            </div>';
            }

		}elseif ($p!=0) {
			
			$query = "SELECT * FROM tbl_category WHERE cateId='$id'";
	        $result = $this->db->select($query);
	        if ($result && $result != false) {
	            while ($imgs = $result->fetch_assoc()) {
	                $img = $imgs['image'];
	                $imgName = chop($img, 'uploads/');
	                $unLink = unlink($imgName);
	                
	            }
	        }

	        $uploadDirectory = "../uploads/";
            $fileExtensions = ['jpeg', 'jpg', 'png','JPG','PNG','JPEG']; // Get all the file extensions
            $fileName = $files['categoryImage']['name'];
            $fileSize = $files['categoryImage']['size'];
            $fileTmpName = $files['categoryImage']['tmp_name'];
            $fileType = $files['categoryImage']['type'];
            $uploadPath = $uploadDirectory . basename($fileName);
            $fileType = pathinfo($uploadPath, PATHINFO_EXTENSION);
            if (!in_array($fileType, $fileExtensions) && $fileSize > 2000000) {
                return "This file size or extension is not allowed.";
            } else {
                $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
                $query = "UPDATE tbl_category SET category='$category',image='$uploadPath' WHERE cateId='$id'";
                $result = $this->db->update($query);
                if ($result && $didUpload && $result != false) {
                    echo "<script>window.location.href = 'manageCategory.php';</script>";
                } else {
                    return '<div class="alert alert-danger" role="alert">
                                  Something Went Wrong! Upload Failed.
                                </div>';
                }
            }


		}
	}
}

?>