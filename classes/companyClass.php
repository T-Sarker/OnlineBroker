<?php
class AllCompany {
    private $db;
    private $fm;
    function __construct() {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function getCategoryFromDB() {
        $query = "SELECT * FROM tbl_category ORDER BY cateId DESC";
        $result = $this->db->select($query);
        if (isset($result) && !empty($result) && $result != false) {
            return $result;
        } else {
            return '<div class="alert alert-danger" role="alert">
				  Something Went Wrong !
				</div>';
        }
    }
    public function insertCompanyDetailsIntoDB($post, $files) {
        $category = $this->fm->validator($post['category']);
        $category = mysqli_real_escape_string($this->db->link, $category);
        $company = $this->fm->validator($post['company']);
        $company = mysqli_real_escape_string($this->db->link, $company);
        $owner = $this->fm->validator($post['owner']);
        $owner = mysqli_real_escape_string($this->db->link, $owner);
        $address = $this->fm->validator($post['address']);
        $address = mysqli_real_escape_string($this->db->link, $address);
        $location = $this->fm->validator($post['location']);
        $location = mysqli_real_escape_string($this->db->link, $location);
        $email = $this->fm->validator($post['email']);
        $email = mysqli_real_escape_string($this->db->link, $email);
        $phone = $this->fm->validator($post['phone']);
        $phone = mysqli_real_escape_string($this->db->link, $phone);
        $password = $this->fm->validator($post['password']);
        $password = mysqli_real_escape_string($this->db->link, $password);
        $password = md5($password);
        $companyUid = substr(md5($email), rand(0, 9), 15);
        $joindate = $this->fm->validator($post['joindate']);
        $joindate = mysqli_real_escape_string($this->db->link, $joindate);
        $check = "SELECT * FROM tbl_company WHERE email='$email' OR phone='$phone' OR companyUid='$companyUid'";
        $res = $this->db->select($check);
        if (mysqli_num_rows($res) > 0) {
            return '<div class="alert alert-danger" role="alert">
									  User Data Matched With another User. User Already Exists.
									</div>';
        } else {
            if (empty($company) && empty($email) && empty($phone) && empty($category) && empty($location) && empty($address) && empty($owner)) {
                return '<div class="alert alert-danger" role="alert">
									  Fill The Input Field Carefully!
									</div>';
            } else {
                $uploadDirectory = "uploads/";
                $errors = []; // Store all foreseen and unforseen errors here
                $fileExtensions = ['jpeg', 'jpg', 'png']; // Get all the file extensions
                $fileName = $files['myfile']['name'];
                $fileSize = $files['myfile']['size'];
                $fileTmpName = $files['myfile']['tmp_name'];
                $fileType = $files['myfile']['type'];
                $uploadPath = $uploadDirectory . basename($fileName);
                $fileType = pathinfo($uploadPath, PATHINFO_EXTENSION);
                if (!in_array($fileType, $fileExtensions) && $fileSize > 2000000) {
                    $errors[] = "This file size or extension is not allowed.";
                } else {
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
    public function getAllCompaniesFromDB() {
        $query = "SELECT * FROM tbl_company ORDER BY companyId DESC";
        $result = $this->db->select($query);
        if (isset($result) && !empty($result) && $result != false) {
            return $result;
        } else {
            return '<div class="alert alert-danger" role="alert">
						  Something Went Wrong !
						</div>';
        }
    }
    public function getThisCategoryName($category) {
        $category = $this->fm->validator($category);
        $category = mysqli_real_escape_string($this->db->link, $category);
        $query = "SELECT * FROM tbl_category WHERE cateUid = '$category' AND status=0";
        $result = $this->db->select($query);
        if (isset($result) && !empty($result) && $result != false) {
            return $result;
        } else {
            return '<div class="alert alert-danger" role="alert">
						  Something Went Wrong !
						</div>';
        }
    }
    public function pauseCompanyIntoDB($id) {
        $id = $this->fm->validator($id);
        $id = mysqli_real_escape_string($this->db->link, $id);
        $query = "UPDATE tbl_company SET status=1 WHERE companyUid='$id'";
        $result = $this->db->update($query);
        if (isset($result) && !empty($result) && $result != false) {
            echo "<script>window.location.href = 'manageCompany.php';</script>";
        } else {
            return '<div class="alert alert-danger" role="alert">
						  Something Went Wrong !
						</div>';
        }
    }
    public function activeCompanyIntoDB($id) {
        $id = $this->fm->validator($id);
        $id = mysqli_real_escape_string($this->db->link, $id);
        $query = "UPDATE tbl_company SET status=0 WHERE companyUid='$id'";
        $result = $this->db->update($query);
        if (isset($result) && !empty($result) && $result != false) {
            echo "<script>window.location.href = 'manageCompany.php';</script>";
        } else {
            return '<div class="alert alert-danger" role="alert">
						  Something Went Wrong !
						</div>';
        }
    }
    public function deleteCompanyIntoDB($id) {
        $id = $this->fm->validator($id);
        $id = mysqli_real_escape_string($this->db->link, $id);
        $query = "SELECT * FROM tbl_company WHERE companyUid='$id'";
        $result = $this->db->select($query);
        if ($result && $result != false) {
            while ($imgs = $result->fetch_assoc()) {
                $img = $imgs['image'];
                $imgName = chop($img, 'uploads/');
                $unLink = unlink($imgName);
                $query1 = "DELETE FROM tbl_company WHERE companyUid='$id'";
                $res = $this->db->delete($query1);
                if ($res && $res != false) {
                    echo "<script>window.location.href = 'manageCompany.php';</script>";
                } else {
                    echo "Couldnot Delete!!";
                }
            }
        }
    }
    public function getDataOfEditedRowFeomDB($id) {
        $id = $this->fm->validator($id);
        $id = mysqli_real_escape_string($this->db->link, $id);
        $query = "SELECT * FROM tbl_company WHERE companyUid='$id'";
        $result = $this->db->select($query);
        if (isset($result) && !empty($result) && $result != false) {
            return $result;
        } else {
            return '<div class="alert alert-danger" role="alert">
						  Something Went Wrong !
						</div>';
        }
    }
    public function updateCompanyDetailsIntoDB($post, $files, $id) {
        $category = $this->fm->validator($post['category']);
        $category = mysqli_real_escape_string($this->db->link, $category);
        $company = $this->fm->validator($post['company']);
        $company = mysqli_real_escape_string($this->db->link, $company);
        $owner = $this->fm->validator($post['owner']);
        $owner = mysqli_real_escape_string($this->db->link, $owner);
        $address = $this->fm->validator($post['address']);
        $address = mysqli_real_escape_string($this->db->link, $address);
        $location = $this->fm->validator($post['location']);
        $location = mysqli_real_escape_string($this->db->link, $location);
        $email = $this->fm->validator($post['email']);
        $email = mysqli_real_escape_string($this->db->link, $email);
        $phone = $this->fm->validator($post['phone']);
        $phone = mysqli_real_escape_string($this->db->link, $phone);
        $password = $this->fm->validator($post['password']);
        $password = mysqli_real_escape_string($this->db->link, $password);
        $password = md5($password);
        $joindate = $this->fm->validator($post['joindate']);
        $joindate = mysqli_real_escape_string($this->db->link, $joindate);
        $id = $this->fm->validator($id);
        $id = mysqli_real_escape_string($this->db->link, $id);
        $uploadDirectory = "uploads/";
        $errors = []; // Store all foreseen and unforseen errors here
        $fileExtensions = ['jpeg', 'jpg', 'png']; // Get all the file extensions
        $fileName = $files['myfile']['name'];
        $fileSize = $files['myfile']['size'];
        $fileTmpName = $files['myfile']['tmp_name'];
        $fileType = $files['myfile']['type'];
        $uploadPath = $uploadDirectory . basename($fileName);
        $fileType = pathinfo($uploadPath, PATHINFO_EXTENSION);
        if (empty($fileName) && empty($password)) {
            $queryx = "UPDATE tbl_company SET 
													company = '$company',
													owner = '$owner',
													address = '$address',
													location = '$location',
													email = '$email',
													phone = '$phone',
													category = '$category',
													joinDate = '$joindate' WHERE companyUid='$id' 
			    	";
            $resultx = $this->db->update($queryx);
        } elseif (empty($fileName) && !empty($password)) {
            $queryx = "UPDATE tbl_company SET 
													company = '$company',
													owner = '$owner',
													address = '$address',
													location = '$location',
													email = '$email',
													phone = '$phone',
													password = '$password',
													category = '$category',
													joinDate = '$joindate' WHERE companyUid='$id' 
			    	";
            $resultx = $this->db->update($queryx);
        } elseif (!empty($fileName) && empty($password)) {
            if (!in_array($fileType, $fileExtensions) && $fileSize > 21951724) {
                $errors[] = "This file size or extension is not allowed.";
            } else {
                $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
                $queryx = "UPDATE tbl_company SET 
														company = '$company',
														owner = '$owner',
														address = '$address',
														location = '$location',
														email = '$email',
														phone = '$phone',
														image = '$uploadPath',
														category = '$category',
														joinDate = '$joindate' WHERE companyUid='$id'";
                $resultx = $this->db->update($queryx);
            }
        } elseif (!empty($fileName) && !empty($password)) {
            if (!in_array($fileType, $fileExtensions) && $fileSize > 21951724) {
                $errors[] = "This file size or extension is not allowed.";
            } else {
                $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
                $queryx = "UPDATE tbl_company SET 
														company = '$company',
														owner = '$owner',
														address = '$address',
														location = '$location',
														email = '$email',
														phone = '$phone',
														password = '$password',
														image = '$uploadPath',
														category = '$category',
														joinDate = '$joindate' WHERE companyUid='$id'";
                $resultx = $this->db->update($queryx);
            }
        } else {
            return '<div class="alert alert-danger" role="alert">
						  Something Went Wrong !
						</div>';
        }
        if (isset($resultx) && $resultx != false) {
            echo "<script>window.location.href = 'manageCompany.php';</script>";
        } else {
            return '<div class="alert alert-danger" role="alert">
						  Something Went Wrong !
						</div>';
        }
    }
    public function getSearchedSuggestionFromDB($searchValue) {
        $searchValue = $this->fm->validator($searchValue);
        $searchValue = mysqli_real_escape_string($this->db->link, $searchValue);
        $query = "SELECT * FROM tbl_company WHERE company LIKE '%$searchValue%'";
        $result = $this->db->select($query);
        if (isset($result) && !empty($result) && $result != false) {
            return $result;
        } else {
            return false;
        }
    }
    public function getSingleCompaniesFromDB($search) {
        $search = $this->fm->validator($search);
        $search = mysqli_real_escape_string($this->db->link, $search);
        $query = "SELECT * FROM tbl_company WHERE companyUid='$search'";
        $result = $this->db->select($query);
        if (isset($result) && !empty($result) && $result != false) {
            return $result;
        } else {
            return false;
        }
    }
    public function getCompanyProfileFromDB($uid) {
        $uid = $this->fm->validator($uid);
        $uid = mysqli_real_escape_string($this->db->link, $uid);
        $query = "SELECT * FROM tbl_company WHERE companyUid='$uid' AND status=0";
        $result = $this->db->select($query);
        return $result;
    }
    public function insertSliderIntoDB($files, $post, $id) {

        $imageName = $this->fm->validator($post['imageName']);
        $imageName = mysqli_real_escape_string($this->db->link, $imageName);

        $id = $this->fm->validator($id);
        $id = mysqli_real_escape_string($this->db->link, $id);

        $p = $_FILES['files']['size'];

        if (empty($imageName)) {

            return '<div class="alert alert-danger" role="alert">
					  Fields Must not be empty !!
					</div>';

        } elseif ($p[0] == 0) {

            return '<div class="alert alert-danger" role="alert">
				  Image Must Be Included !!
				</div>';

        } else {


        	$queryx = "SELECT * FROM tbl_comslider WHERE companyUid='$id'";
        	$resultx = $this->db->select($queryx);

        	if (isset($resultx) && $resultx != false && mysqli_num_rows($resultx)>0) {
        		
        		while ($images = $resultx->fetch_assoc()) {
        			
        			$img = $images['image'];
					$imgName = chop($img,'../uploads/');
					$unLink = unlink($imgName);
        		}

        		$querydel = "DELETE FROM tbl_comslider WHERE companyUid='$id'";
				$delete = $this->db->delete($querydel);

        	}

            $targetDir = "../uploads/";

            $allowTypes = array('jpg', 'png', 'jpeg', 'JPG', 'PNG');

            if (!empty(array_filter($_FILES['files']['name']))) {

                foreach ($_FILES['files']['name'] as $key => $val) {
                    // File upload path
                    $fileName = basename($_FILES['files']['name'][$key]);

                    $targetFilePath = $targetDir . $fileName;

                    // Check whether file type is valid
                    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

                    if (in_array($fileType, $allowTypes)) {

                        // Upload file to server
                        if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)) {

                            $query = "INSERT INTO tbl_comslider(image,companyUid,imageName) VALUES('$targetFilePath','$id','$imageName')";
                            
                            $result = $this->db->insert($query);

                            if ($result && $result != false) {
			                    echo "<script>window.location.href = 'manageSlider.php';</script>";
			                } else {
			                    return '<div class="alert alert-danger" role="alert">
													  Something Went Wrong. image Upload Failed !
													</div>';
			                }

                        } else {
                            return '<div class="alert alert-danger" role="alert">
													  Something Went Wrong. image Upload Failed !
													</div>';
                        }
                    } else {
                        return '<div class="alert alert-danger" role="alert">
													  Wrong Format. Action Failed !
													</div>';
                    }
                }
                
            }
        }
    }


    public function getSliderData($uid){

    	$uid = $this->fm->validator($uid);
        $uid = mysqli_real_escape_string($this->db->link, $uid);

        $query = "SELECT * FROM tbl_comslider WHERE companyUid='$uid'";

        $result = $this->db->select($query);

        return $result;
    }
}
?>