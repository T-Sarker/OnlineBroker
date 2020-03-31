<?php

class AllCompany{

	private $db;
	private $fm;
	
	function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
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


	public function insertCompanyDetailsIntoDB($post,$files){

		$category = $this->fm->validator($post['category']);
		$category = mysqli_real_escape_string($this->db->link,$category);

		$company = $this->fm->validator($post['company']);
		$company = mysqli_real_escape_string($this->db->link,$company);

		$owner = $this->fm->validator($post['owner']);
		$owner = mysqli_real_escape_string($this->db->link,$owner);

		$address = $this->fm->validator($post['address']);
		$address = mysqli_real_escape_string($this->db->link,$address);

		$location = $this->fm->validator($post['location']);
		$location = mysqli_real_escape_string($this->db->link,$location);

		$email = $this->fm->validator($post['email']);
		$email = mysqli_real_escape_string($this->db->link,$email);

		$phone = $this->fm->validator($post['phone']);
		$phone = mysqli_real_escape_string($this->db->link,$phone);

		$password = $this->fm->validator($post['password']);
		$password = mysqli_real_escape_string($this->db->link,$password);

		$password = md5($password);
		$companyUid = substr(md5($email),rand(0,9),15);

		$joindate = $this->fm->validator($post['joindate']);
		$joindate = mysqli_real_escape_string($this->db->link,$joindate);

		$check = "SELECT * FROM tbl_company WHERE email='$email' OR phone='$phone' OR companyUid='$companyUid'";

			$res = $this->db->select($check);

			if (mysqli_num_rows($res)>0) {
				
				return '<div class="alert alert-danger" role="alert">
									  User Data Matched With another User. User Already Exists.
									</div>';
			}else{

			if (empty($company) && empty($email) && empty($phone)&& empty($category)&& empty($location)&& empty($address)&& empty($owner)) {
				

					return '<div class="alert alert-danger" role="alert">
									  Fill The Input Field Carefully!
									</div>';
			}else{

				$uploadDirectory = "uploads/";

			    $errors = []; // Store all foreseen and unforseen errors here

			    $fileExtensions = ['jpeg','jpg','png']; // Get all the file extensions

			    $fileName = $files['myfile']['name'];
			    $fileSize = $files['myfile']['size'];
			    $fileTmpName  = $files['myfile']['tmp_name'];
			    $fileType = $files['myfile']['type'];
			    $uploadPath = $uploadDirectory . basename($fileName);

			    $fileType = pathinfo($uploadPath,PATHINFO_EXTENSION);

			        if (! in_array($fileType,$fileExtensions) && $fileSize > 2000000) {
			            $errors[] = "This file size or extension is not allowed.";
			        }else{
			            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

			            $query = "INSERT INTO tbl_company(company,owner,address,location,email,phone,password,image,companyUid,category,status,joinDate) VALUES('$company','$owner','$address','$location','$email','$phone','$password','$uploadPath','$companyUid','$category',0,'$joindate')";

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


?>