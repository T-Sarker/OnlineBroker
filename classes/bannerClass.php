<?php

class AllBannerClass{

	private $db;
	private $fm;
	
	function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}


	public function insertBannerImageIntoDB($post,$files){

			$altText = $post['altText'];

			$altText = $this->fm->validator($altText);
			$altText = mysqli_real_escape_string($this->db->link,$altText);


			$query = "SELECT * FROM tbl_bannerone";

				$result = $this->db->select($query);

				$rows = mysqli_num_rows($result) ;


				if (isset($result) && $rows > 0 && $result != false) {

					if ($result && $result!=false) {
					
						while ($imgs = $result->fetch_assoc()) {
							
							$img = $imgs['images'];
							$imgName = chop($img,'uploads/');
							$unLink = unlink($imgName);														
						}

					}
					$delQuery = "DELETE FROM tbl_bannerone";
					$outputx = $this->db->delete($delQuery);
				}

			$targetDir = "uploads/";
		    $allowTypes = array('jpg','png','jpeg','gif');

		    if(!empty(array_filter($_FILES['files']['name']))){

		        foreach($_FILES['files']['name'] as $key=>$val){
		            // File upload path
		            $fileName = basename($_FILES['files']['name'][$key]);
		            $targetFilePath = $targetDir . $fileName;
		            
		            // Check whether file type is valid
		            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

		            if(in_array($fileType, $allowTypes)){

		                // Upload file to server
		                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){

		                	$query = "INSERT INTO tbl_bannerone(images,bannerName) VALUES('$targetFilePath','$altText')";

		                	$result = $this->db->insert($query);

		                	if ($result && $result!=false) {
		                		echo "<script>window.location.href = 'manageBanner1.php';</script>";
		                	}else{
		                		return '<div class="alert alert-danger" role="alert">
												  Something Went Wrong. Upload Failed !
												</div>';
		                	}

		                }else{

		                	return '<div class="alert alert-danger" role="alert">
									  Something Went Wrong. Moving Failed !
									</div>';
		                }
		            }else{
		                return '<div class="alert alert-danger" role="alert">
									  Wrong Format. Action Failed !
									</div>';
		            }
		        }		 
			}
		}



		public function getAllBannerOneDataFromDB(){

			$query = "SELECT * FROM tbl_bannerone ORDER BY bannerId";

			$result = $this->db->select($query);

			if (isset($result) && $result != false) {
				
				return $result;
			}else{
				return false;
			}
		}


		// banner two........

			public function insertBannerTwoImageIntoDB($post,$files){

			$altText = $post['altText'];

			$altText = $this->fm->validator($altText);
			$altText = mysqli_real_escape_string($this->db->link,$altText);


			$query = "SELECT * FROM tbl_bannertwo";

				$result = $this->db->select($query);

				$rows = mysqli_num_rows($result) ;


				if (isset($result) && $rows > 0 && $result != false) {

					if ($result && $result!=false) {
					
						while ($imgs = $result->fetch_assoc()) {
							
							$img = $imgs['images'];
							$imgName = chop($img,'uploads/');
							$unLink = unlink($imgName);														
						}

					}
					$delQuery = "DELETE FROM tbl_bannertwo";
					$outputx = $this->db->delete($delQuery);
				}

			$targetDir = "uploads/";
		    $allowTypes = array('jpg','png','jpeg','gif');

		    if(!empty(array_filter($_FILES['files']['name']))){

		        foreach($_FILES['files']['name'] as $key=>$val){
		            // File upload path
		            $fileName = basename($_FILES['files']['name'][$key]);
		            $targetFilePath = $targetDir . $fileName;
		            
		            // Check whether file type is valid
		            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

		            if(in_array($fileType, $allowTypes)){

		                // Upload file to server
		                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){

		                	$query = "INSERT INTO tbl_bannertwo(images,bannerName) VALUES('$targetFilePath','$altText')";

		                	$result = $this->db->insert($query);

		                	if ($result && $result!=false) {
		                		// echo "<script>window.location.href = 'index.php';</script>";
		                	}else{
		                		return '<div class="alert alert-danger" role="alert">
												  Something Went Wrong. Upload Failed !
												</div>';
		                	}

		                }else{

		                	return '<div class="alert alert-danger" role="alert">
									  Something Went Wrong. Moving Failed !
									</div>';
		                }
		            }else{
		                return '<div class="alert alert-danger" role="alert">
									  Wrong Format. Action Failed !
									</div>';
		            }
		        }		 
			}
		}



		public function getAllBannerTwoDataFromDB(){

			$query = "SELECT * FROM tbl_bannertwo ORDER BY bannerId";

			$result = $this->db->select($query);

			if (isset($result) && $result != false) {
				
				return $result;
			}else{
				return false;
			}
		}


		// Slider Add........

			public function insertSliderImageIntoDB($post,$files){

			$altText = $post['altText'];

			$altText = $this->fm->validator($altText);
			$altText = mysqli_real_escape_string($this->db->link,$altText);


			$query = "SELECT * FROM tbl_slider";

				$result = $this->db->select($query);

				$rows = mysqli_num_rows($result) ;


				if (isset($result) && $rows > 0 && $result != false) {

					if ($result && $result!=false) {
					
						while ($imgs = $result->fetch_assoc()) {
							
							$img = $imgs['images'];
							$imgName = chop($img,'uploads/');
							$unLink = unlink($imgName);														
						}

					}
					$delQuery = "DELETE FROM tbl_slider";
					$outputx = $this->db->delete($delQuery);
				}

			$targetDir = "uploads/";
		    $allowTypes = array('jpg','png','jpeg','gif');

		    if(!empty(array_filter($_FILES['files']['name']))){

		        foreach($_FILES['files']['name'] as $key=>$val){
		            // File upload path
		            $fileName = basename($_FILES['files']['name'][$key]);
		            $targetFilePath = $targetDir . $fileName;
		            
		            // Check whether file type is valid
		            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

		            if(in_array($fileType, $allowTypes)){

		                // Upload file to server
		                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){

		                	$query = "INSERT INTO tbl_slider(images,sliderName) VALUES('$targetFilePath','$altText')";

		                	$result = $this->db->insert($query);

		                	if ($result && $result!=false) {
		                		echo "<script>window.location.href = 'manageSlider.php';</script>";
		                	}else{
		                		echo '<div class="alert alert-danger" role="alert">
												  Something Went Wrong. Upload Failed !
												</div>';
		                	}

		                }else{

		                	echo '<div class="alert alert-danger" role="alert">
									  Something Went Wrong. Moving Failed !
									</div>';
		                }
		            }else{
		                echo '<div class="alert alert-danger" role="alert">
									  Wrong Format. Action Failed !
									</div>';
		            }
		        }		 
			}
		}



		public function getAllSliderDataFromDB(){

			$query = "SELECT * FROM tbl_slider ORDER BY sliderId";

			$result = $this->db->select($query);

			if (isset($result) && $result != false) {
				
				return $result;
			}else{
				return false;
			}
		}


}

?>