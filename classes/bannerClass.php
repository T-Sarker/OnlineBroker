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
		                		echo "<script>window.location.href = 'index.php';</script>";
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


}

?>